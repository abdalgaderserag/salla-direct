<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Salla\SallaAccessToken;
use App\Models\Salla\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function stores() {
        return $this->hasMany(Store::class);
    }

    public function activeStore() {
        return $this->belongsTo(Store::class, 'id', 'active_id');
    }

    public function sallaAccessToken() {
        return $this->hasOneThrough(
            SallaAccessToken::class, // The target model
            Store::class,            // The intermediate model
            'user_id',               // Foreign key on the intermediate model (Store)
            'store_id',              // Foreign key on the target model (SallaAccessToken)
            'active_id',             // Local key on the current model (User)
            'id'                     // Local key on the intermediate model (Store)
        );
    }

    public function plans() {
        return $this->hasMany(Plan::class);
    }
}
