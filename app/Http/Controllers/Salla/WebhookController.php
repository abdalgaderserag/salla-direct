<?php

namespace App\Http\Controllers\Salla;

use App\Http\Controllers\Controller;
use App\Jobs\SendWhatsappMessage;
use App\Models\Auto;
use App\Models\Client;
use App\Models\Message;
use App\Models\Salla\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        Log::info('Salla Webhook Received:', $request->all());

        if (!$this->verifySignature($request)) {
            Log::warning('Invalid Salla webhook signature', ['ip' => $request->ip()]);
            return response()->json(['error' => 'Invalid signature'], 401);
        }

        $event = $request->input('event');
        $data = $request->input('data');
        $store = Store::where('merchant', $request->input('merchant'))->first();

        switch ($event) {

            case 'abandoned.cart':
            case 'customer.created':
            case 'customer.login':
            case 'order.created':
            case 'order.refunded':
            case 'order.cancelled':
            case 'shipment.created':
            case 'shipment.completed':
            case 'shipment.updated':
            case 'review.added':
                $this->handleSoloEvent($data, $event, $store);
                break;

            case 'order.updated':
                $this->handleOrderUpdated($data, $event, $store);
                break;
            case 'order.payment.updated':
                $this->handleOrderPayment($data, $event, $store);
                break;



            case 'user.update':
                $this->handleUserUpdated($data, $store);
                break;

            case 'user.created':
                $this->handleUserUpdated($data, $store);
                break;

            default:
                Log::warning("Unhandled Salla webhook event: $event");
                return response()->json(['message' => 'Event not handled'], 400);
        }

        return response()->json(['message' => 'Webhook processed successfully']);
    }

    private function verifySignature(Request $request): bool
    {
        $signature = $request->header('X-Salla-Signature');
        $payload = $request->getContent();
        $secret = config('salla.webhook_secret');

        $computedSignature = hash_hmac('sha256', $payload, $secret);

        return hash_equals($signature, $computedSignature);
    }

    private function handleUserUpdated($data, Store $store)
    {
        $user = Client::updateOrCreate(
            ['salla_id' => $store->id],
            [
                'username' => $data['first_name'] . ' ' . $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['mobile'],
                'groups' => json_encode($data['groups']),
                'gender' => $data['gender'],
                'city' => $data['city'],
                'register_date' => $data['register_date']
            ]
        );
    }

    private function handleSoloEvent($data, $event, Store $store)
    {
        $auto = Auto::where('store_id', $store->id)
            ->where('event', $event)
            ->first();
        $client = $store->clients->where('salla_id',$data['customer']['id'])->first();
        $this->fireMessage($auto->message,$client);
    }

    private function handleOrderUpdated($data, $event, Store $store)
    {
        $autos = Auto::all()->where('store_id', '=', $store->id)->where('event', '=', $event);
        switch ($data['status']) {
            case 'تم التنفيذ':
                $auto = $autos->where('type', '=', 'order.completed')->first();
                break;
            case 'refunding order':
                $auto = $autos->where('type', '=', 'refunding.order')->first();
                break;
        }
        $client = $store->clients->where('salla_id',$data['customer']['id'])->first();

        $this->fireMessage($auto->message, $client);
    }

    private function handleOrderPayment($data, $event, $merchant)
    {
        $store = Store::where('merchant', $merchant)->first();

        $autos = Auto::all()->where('store_id', '=', $store->id)->where('event', '=', $event);
        switch ($data['status']) {
            case 'payment on arrival confirmation':
                $auto = $autos->where('type', '=', 'payment-arrival')->first();
                break;
            case 'order is waiting for payment':
                $auto = $autos->where('type', '=', 'payment-waiting')->first();
                break;
        }
        $this->fireMessage($auto->message, $data['customer_id']);
    }


    private function fireMessage(Message $message, Client $client)
    {
        dispatch(new SendWhatsappMessage($message, $client->phone));
    }
}
