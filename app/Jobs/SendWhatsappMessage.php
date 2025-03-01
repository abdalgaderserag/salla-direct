<?php

namespace App\Jobs;

use App\Models\Message;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendWhatsappMessage implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(Message $message, $receivers): void
    {
        if (is_array($receivers)) {
            foreach ($receivers as $receiver) {
                $this->processMessage($message,$receiver['phone']);
            }
        }else {
            $this->processMessage($message,$receivers['phone']);
        }
    }

    private function processMessage(Message $message, $phone){

    }
}
