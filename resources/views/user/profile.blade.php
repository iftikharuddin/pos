@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Your Profile </div>

					<div class="panel-body">
						
						<table class="table table-striped">
							<thead>
							  <tr>
								<th>ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Update</th>
								<th>Delete</th>
							  </tr>
							</thead>
							<tbody>
								  <tr>
								    <td>{!! $user->id !!}</td>
									<td>{!! $user->name !!}</td>
									<td>{!! $user->email !!}</td>
									<td>
										
										{!! Form::open(array('url' => "/users/$user->id/edit" , 'method' => 'GET')) !!}
											{!! Form::hidden('id', $user->id) !!}
												<button type="submit" class="btn btn-default">Edit</button>
										{!! Form::close() !!}
									</td>
									<td>
										{!! Form::open(array('url' => '/users/destroy' ,  'method' => 'delete')) !!}
											{!! Form::hidden('id', $user->id) !!}
												<button type="submit" class="btn btn-default">Delete</button>
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