<?php

namespace App\Http\Controllers\Salla;

use App\Http\Controllers\Controller;
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

        // Validate Salla webhook signature (Optional, if Salla provides it)
        // You may need to compare a signature header with a known secret.

        // Extract event type and data
        $event = $request->input('event'); // e.g., "product.created"
        $data = $request->input('data');

        switch ($event) {
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
}
