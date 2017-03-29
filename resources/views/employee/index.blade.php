@extends('layouts.app')
  
@section('content')
<div class="panel-body" id="demo_eployee">	
    <a  class="btn btn-primary" href="{{ route('employee.create') }}">Add an employee</a>

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
	@foreach ($employees as $key => $employee)
	<tr>
		<td>{{ $employee->id }}</td>
		<td>{{ $employee->name }}</td>
		<td>{{ $employee->email }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('employee.show',$employee->id) }}">Show</a>
			<a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">Edit</a>
			{!! Form::open(['method' => 'DELETE','route' => ['employee.destroy', $employee->id],'style'=>'display:inline']) !!}
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