<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ActionController extends Controller
{
    //
     public function store(Request $request) {
        
        $validators=  $this->validate($request, [
            'action_type_id' => 'required',
            'customer_id' => 'required',
        ]);
 
            $types = new CustomerActions;
            $types->action_type_id = Input::get('action_type_id');
            $types->customer_id = Input::get('customer_id');
            $types->save();
            return back();
            
        
        }
    
}
