<?php

namespace App;

use App\Inquiry;
use App\Product;
use Illuminate\Support\Facades\Auth;
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
    // public function userRole()
    // {
    //       return [
    //         1 => 'super',
    //         2 => 'admin',
    //         3 => 'editor',
    //         4 => 'buyer',
    //         5 => 'seller',
    //         6 => 'both',
    //         7 => 'delivery',
    //     ];
    // }
    public function userRole()
    {
        if (Auth::check()){
            if(Auth::user()->role == 1){
                return 'super';
            }elseif(Auth::user()->role == 2){
                return 'admin';
            }elseif(Auth::user()->role == 3){
                return 'editor';
            }elseif(Auth::user()->role == 4){
                return 'buyer';
            }elseif(Auth::user()->role == 5){
                return 'seller';
            }elseif(Auth::user()->role == 6){
                return 'both';
            }elseif(Auth::user()->role == 7){
                return 'delivery';
            }
        }
        // return [
        //     1 => 'super',
        //     2 => 'admin',
        //     3 => 'editor',
        //     4 => 'buyer',
        //     5 => 'seller',
        //     6 => 'both',
        //     7 => 'delivery',
        // ];
        // if(auth()->role = 5){
        //     return 'seller';
        // }
      
    }
}
