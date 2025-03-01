<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'messages_count',
        'price',
        'curr',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
