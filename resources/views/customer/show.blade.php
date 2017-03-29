@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Customer id #{{ $customers->id }}</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('customer.index') }}"> Back</a>
	        </div>
	    </div>
            
            <div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <h3>name</h3>
         <div class="">
              {{ $customers->name }}
             
         </div> 
            </div>
        </div>

       
   <div class="col-xs-12 col-sm-12 col-md-12">
         
   </div>
                
            </div>
            @endsection