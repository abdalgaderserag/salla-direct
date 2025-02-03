<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'group_id',
        'type',
        'city',
        'phone',
        'email',
        'register_date'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
