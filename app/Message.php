<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function from()
    {
        return $this->belongsTo(User::class);
    }
}