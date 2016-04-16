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
								<th>Product Name</th>
								<th>Product Description</th>
								<th>Product Price</th>
								<th>Quantity</th>
								<th>Edit</th>
								<th>Delete</th>
							  </tr>
							</thead>
							<tbody>
						  	  @foreach($products as $product)
								  <tr>
								    <td>{!! $product->id !!}</td>
									<td>{!! $product->name !!}</td>
									<td>{!! $product->desc !!}</td>
									<td>{!! $product->price !!}</td>
									<td>{!! $product->quantity !!}</td>
									<td>
										
										{!! Form::open(array('url' => "/product/$product->id/edit" , 'method' => 'GET')) !!}
											{!! Form::hidden('id', $product->id) !!}
												<button type="submit" class="btn btn-default">Edit</button>
										{!! Form::close() !!}
									</td>
									<td>
										{!! Form::open(array('url' => '/product/destroy' ,  'method' => 'delete')) !!}
											{!! Form::hidden('id', $product->id) !!}
												<button type="submit" class="btn btn-default">Delete</button>
										{!! Form::close() !!}
									</td>
								  </tr>
							  @endforeach
							</tbody>
						  </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection