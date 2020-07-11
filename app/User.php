<?php

namespace App;

use App\Inquiry;
use App\Product;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }

    public function userRoles()
    {
        // return [
        //     1 => 'super',
        //     2 => 'admin',
        //     3 => 'editor',
        //     4 => 'buyer',
        //     5 => 'seller',
        //     6 => 'both',
        //     7 => 'delivery',
        // ];
        if(auth()->role = 5){
            return 'seller';
        }
    }
}
