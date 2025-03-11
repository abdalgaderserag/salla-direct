<?php

namespace App\Jobs;

use App\Models\Message;
use App\Models\Plan;
use App\Models\Salla\Store;
use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendWhatsappMessage implements ShouldQueue
{
    use Queueable;

    public Message $message, $receiver;

    /**
     * Create a new job instance.
     */
    public function __construct(Message $message, $receiver)
    {
        $this->message = $message;
        $this->receiver = $receiver;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        $client = new Client();
        $access_token = 'EAAQt7cNZBsFcBOy6IiyDCLPdraZCghCGLZCrEOYGhV4OOavzHWBFAR7RoAzlrAdRY0ZAm4HmHfH8QFe3WBVQcjxvCNH1VbCgZA57wjjiDdFRIOicxX1fNj3gb0qaOlZC0RyLf9qhrsKZAA6IATW7niiPPyh11XS2ejFSYZAHveFhahhu5dF25UVEgoG38WaU6xZAmZCQZDZD';
        $response = $client->post(
            "https://graph.facebook.com/v22.0/614741461713399/messages",
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . $access_token,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'messaging_product' => 'whatsapp',
                    'to' => $this->receiver,
                    'type' => 'text',
                    'text' => [
                        'body' => $this->message->context,
                        'preview_url' => true
                    ]
                ]
            ]
        );
        $holder = $this->message->campaign();
        if (!empty($holder)) {
            $store_id= $holder->store_id;
        }else{
            $holder = $this->message->auto();
            $store_id= $holder->store_id;
        }

        $store = Store::where('store_id',$store_id)->first();
        $plan = Plan::where('user_id',$store->user_id)->first();
        $plan->messages_count = $plan->messages_count -1;
        $plan->update();
    }
}
