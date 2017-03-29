@extends('layouts.app')
  
@section('content')
<div class="panel-body" id="demo_eployee">	
    <a  class="btn btn-primary" href="{{ route('customer.create') }}">Add an customer</a>

<table id="demo-table"
       data-show-refresh="true"
       data-show-toggle="true"
       data-toggle="table"
       data1-url="data1.json"
       data-pagination="true" 
       data-search="true"
       data-sort-order="desc"
        data-show-columns="false"
        class="table table-striped table-bordered bootstrap-datatable datatable responsive"
      
>
       

    <thead>
		<tr>
                    <th data-field="no" data-align="right" data-sortable="true"width="280px">No</th>
			<th data-field="name" data-align="right" data-sortable="true"width="280px">Name</th>
			<th data-field="email" data-align="right" data-sortable="true"width="280px">Email</th>
			<th data-field="action" data-align="right" data-sortable="true" width="280px">Action</th>
		</tr>
                </thead>
                <tbody>
	@foreach ($customers as $key => $customer)
	<tr>
		<td>{{ $customer->id }}</td>
		<td>{{ $customer->name }}</td>
		<td>{{ $customer->email }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('customer.show',$customer->id) }}">Show</a>
			<a class="btn btn-primary" href="{{ route('customer.edit',$customer->id) }}">Edit</a>
			{!! Form::open(['method' => 'DELETE','route' => ['customer.destroy', $customer->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
        </tbody>
	</table>
</div>

@push('scripts')
<script>

</script>
@endpush
                                </div>
                        </div>
                </div>
</div>
@endsection