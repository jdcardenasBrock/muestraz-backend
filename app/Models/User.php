<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'has_completed_form'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    public function productRedemptions()
    {
        return $this->hasMany(ProductRedemption::class);
    }

    public function yaReclamoMuestra($productId)
    {
        return $this->productRedemptions()->where('product_id', $productId)->exists();
    }

    public function membership()
    {
        return $this->hasOne(Membership::class);
    }

    public function tieneMembresia()
    {
        return (bool) $this->membresia_activa;
    }

    public function latestMembership()
{
    return $this->membership()
        ->orderBy('end_date', 'desc')   // La más reciente por fecha final
        ->first();
}


    public function hasActiveMembership()
    {
        $latest = $this->latestMembership();

        return $latest && now()->between($latest->begin_date, $latest->end_date);
    }

    public function activeMembership()
    {
        return $this->membership()
            ->where('begin_date', '<=', now())
            ->where('end_date', '>=', now())
            ->orderBy('end_date', 'desc')
            ->first();
    }

    /*public function usuariostodos()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }*/
}
