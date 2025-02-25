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
        'activated_at',
        'time_lapse',
        'groups',
        'status'
    ];

    public function message() {
        return $this->hasOne(Message::class);
    }
}
