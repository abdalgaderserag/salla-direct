<?php

namespace App\Models\Salla;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_id',
        'merchant',
        'name',
        'email',
        'avatar',
        'domain'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function clients() {
        $this->hasMany(Client::class);
    }

    public function sallaAccessToken(){
        return $this->hasOne(SallaAccessToken::class);
    }
}
