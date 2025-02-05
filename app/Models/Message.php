<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;

    protected $fillable =[
        'campaign_id',
        'context',
        'attachment'
    ];

    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }
}
