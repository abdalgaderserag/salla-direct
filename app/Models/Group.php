<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'group',
        'name'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
