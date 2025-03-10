<?php

namespace App\Jobs;

use App\Models\Message;
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

    }
}
