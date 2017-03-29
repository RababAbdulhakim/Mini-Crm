<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerActions extends Model
{
    //
    protected $fillable = ['action_type_id','customer_id'];
}
