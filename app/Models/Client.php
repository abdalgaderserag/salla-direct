<?php

namespace App\Models;

use App\Models\Salla\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'salla_id',
        'username',
        'groups',
        'gender',
        'city',
        'phone',
        'email',
        'register_date',
        'isBanned'
    ];

    public function store() {
        return $this->belongsTo(Store::class);
    }
}
