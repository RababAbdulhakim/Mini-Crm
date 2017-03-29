<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
     protected $fillable = [
        'name', 'email', 'user_id',
    ];
public function User() {
   return $this->belongsTo('App\User'); // or whatever the namespace to your class is
}
}
