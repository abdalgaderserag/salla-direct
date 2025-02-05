<?php

namespace App\Models\Salla;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class SallaAccessToken extends Model
{
    protected $fillable = [
        'store_id',
        'name',
        'email',
        'avatar',
        'domain'
    ];

    public function store() {
        return $this->belongsTo(Store::class);
    }
}
