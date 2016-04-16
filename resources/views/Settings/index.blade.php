@extends('layouts.app')
@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Products</div>

                <div class="panel-body">
                   
                    <table class="table table-striped">
							<thead>
							  <tr>
								<th>ID</th>
								<th>Company Name</th>
								<th>Edit</th>
							  </tr>
							</thead>
							<tbody>
						  	
								  <tr>
								    <td>{!! $company->id !!}</td>
									<td>{!! $company->companyname !!}</td>
									<td>
										
										{!! Form::open(array('url' => "/settings/$company->id/edit" , 'method' => 'GET')) !!}
											{!! Form::hidden('id', $company->id) !!}
												<button type="submit" class="btn btn-default">Edit</button>
										{!! Form::close() !!}
									</td>
								
								  </tr>
							
							</tbody>
						  </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection