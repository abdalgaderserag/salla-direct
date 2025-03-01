<?php

namespace App\Http\Controllers\Salla;

use App\Http\Controllers\Controller;
use App\Jobs\SendWhatsappMessage;
use App\Models\Auto;
use App\Models\Client;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    /**
     * Handle incoming Salla webhook events.
     */
    public function handleWebhook(Request $request)
    {
        // Log the incoming request for debugging
        Log::info('Salla Webhook Received:', $request->all());

        // Verify the webhook signature
        if (!$this->verifySignature($request)) {
            Log::warning('Invalid Salla webhook signature', ['ip' => $request->ip()]);
            return response()->json(['error' => 'Invalid signature'], 401);
        }


        // Extract event type and data
        $event = $request->input('event'); // e.g., "product.created"
        $data = $request->input('data');

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
                $this->handleSoloEvent($data, $event);
                break;

            case 'order.updated':
                $this->handleOrderUpdated($data, $event);
                break;
            case 'order.payment.updated':
                $this->handleOrderPayment($data, $event);


            case 'user.update':
                $this->handleUserUpdated($data);
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

    private function handleUserUpdated($data)
    {
        $user = Client::updateOrCreate(
            ['salla_id' => $data['id']],
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

    private function handleSoloEvent($data, $event)
    {
        $auto = Auto::all()->where('store_id', '=', $data['store_id'])->where('event', '=', $event)->first();
        $this->fireMessage($auto->message, $data['customer_id']);
    }

    private function handleOrderUpdated($data, $event)
    {
        $autos = Auto::all()->where('store_id', '=', $data['store_id'])->where('event', '=', $event);
        switch ($data['status']) {
            case 'rating':
                $auto = $autos->where('type','=','rating')->first();
                break;
            case 'order completed':
                # code...
                $auto = $autos->where('type','=','order-completed')->first();
                break;
            case 'refunding order':
                $auto = $autos->where('type','=','refunding-order')->first();
                break;
        }
        $this->fireMessage($auto->message, $data['customer_id']);
    }

    private function handleOrderPayment($data, $event)
    {
        $autos = Auto::all()->where('store_id', '=', $data['store_id'])->where('event', '=', $event);
        switch ($data['status']) {
            case 'payment on arrival confirmation':
                $auto = $autos->where('type','=','payment-arrival')->first();
                break;
            case 'order is waiting for payment':
                $auto = $autos->where('type','=','payment-waiting')->first();
                break;
        }
        $this->fireMessage($auto->message, $data['customer_id']);
    }

    private function fireMessage(Message $message, $customer_id)
    {
        $client = Client::where('salla_id', '=', $customer_id)->first();
        new SendWhatsappMessage($message, $client->phone);
    }
}
