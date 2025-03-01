<?php

namespace App\Http\Controllers\Salla;

use App\Http\Controllers\Controller;
use App\Models\Client;
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
            case 'user.update':
            case 'user.create':
                $this->handleUserUpdated($data);
                break;

            case 'product.created':
                $this->handleProductCreated($data);
                break;

            case 'product.updated':
                $this->handleProductUpdated($data);
                break;

            case 'product.deleted':
                $this->handleProductDeleted($data);
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

    /**
     * Handle product created event.
     */
    private function handleProductCreated($data)
    {
        Log::info('New product created:', $data);
        // Save product to database or perform other actions
    }

    /**
     * Handle product updated event.
     */
    private function handleProductUpdated($data)
    {
        Log::info('Product updated:', $data);
        // Update product in database
    }

    /**
     * Handle product deleted event.
     */
    private function handleProductDeleted($data)
    {
        Log::info('Product deleted:', $data);
        // Remove product from database
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
}
