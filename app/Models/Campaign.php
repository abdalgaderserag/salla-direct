<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    /** @use HasFactory<\Database\Factories\CampaignFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'store_id',
        'message_id',
        'clients',
        'activated_at',
    ];


    public function message() {
        return $this->belongsTo(Message::class);
    }
}
