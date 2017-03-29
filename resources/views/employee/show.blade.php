@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Employee id #{{ $employees->id }}</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
	        </div>
	    </div>
	</div>

	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{ $employees->name }}
            </div>
        </div>
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">

            </div>
        </div>
       
   <div class="col-xs-12 col-sm-12 col-md-12">
         <h3>Customers</h3>
            <div class="">
              
                  {!! Form::open(['method'=>'GET','url'=>'/employees/show/'.$employees->id,'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
<div class="input-group custom-search-form">
    <select class="form-control"  id="search_field" name="action_type">
                     @foreach($actiontypes as $type)
                     <option value="{{$type->id}}"> {{$type->type}}</option>
                        @endforeach
                   </select>
    <span class="input-group-btn">
   
        <button type="submit" class="btn btn-input_type" <span class="caret">Search</span></button>
    </span>
</div>     
               
                                            @foreach($customers  as $cs)

                    <li>
                        <a class="btn btn-link" href="{{ route('customer.show',$cs->id) }}"><h4> {{ $cs->name }}</h4></a>{{$cs->type}}
                       @if($customer_id !== $cs->id)

                        <a class ="btn btn-primary" data-toggle="modal" data-target="#action">Add an Action</a>
                        <!-- Modal -->
<div class="modal fade" id="action" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">add an Action</h4>
      </div>
      <div class="modal-body">
        @if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
   {!! Form::open(array('url' => '/employees/show/'.$employees->id','method'=>'POST')) !!}


	<div class="row">
 
		<div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Action:</strong>
               
                <select name="action_type_id">
                     @foreach($actiontypes as $type)
                     <option value="{{$type->id}}"> {{$type->type}}</option>
                        @endforeach
                   </select>
                
                <input type="hidden" name="customer_id" value="{{$cs->id}}">
                
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button  class="btn btn-primary" type ="submit">Add</button>
      </div>
    {!! Form::close() !!}
    
    </div>
  </div>
</div>

@else   
<h1>mmmmmmmmmmmmmmmm</h1>
@endif
</li>
                </ul>
                        @endforeach
                        </div>
        </div>
	</div>

@endsection