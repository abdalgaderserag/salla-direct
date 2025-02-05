<?php

namespace App\Models;

use App\Models\Salla\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'store_id',
        'groups',
        'gender',
        'city',
        'phone',
        'email',
        'update_date'
    ];

    public function store() {
        return $this->belongsTo(Store::class);
    }
}
