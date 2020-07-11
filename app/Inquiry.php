<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $guarded = [];

    public function from()
    {
        return $this->belongsTo(User::class);
    }
}
