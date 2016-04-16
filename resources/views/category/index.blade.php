@extends('layouts.app')
@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All Categories</div>

                <div class="panel-body">
                   
                    <table class="table table-striped">
							<thead>
							  <tr>
								<th>ID</th>
								<th>Category Name</th>
								<th>Category Code</th>
								<th>Image</th>
								<th>Edit</th>
								<th>Delete</th>
							  </tr>
							</thead>
							<tbody>
						  	  @foreach($categories as $category)
								  <tr>
								    <td>{!! $category->id !!}</td>
									<td>{!! $category->name !!}</td>
									<td>{!! $category->code !!}</td>
									<td>{!! Html::image($category->image ,$category->title, array('width'=>'50','height' =>'50')) !!}</td>
									
									<td>
										
										{!! Form::open(array('url' => "/category/$category->id/edit" , 'method' => 'GET')) !!}
											{!! Form::hidden('id', $category->id) !!}
												<button type="submit" class="btn btn-default">Edit</button>
										{!! Form::close() !!}
									</td>
									<td>
										{!! Form::open(array('url' => '/category/destroy' ,  'method' => 'delete')) !!}
											{!! Form::hidden('id', $category->id) !!}
												<button type="submit" class="btn btn-default">Delete</button>
										{!! Form::close() !!}
									</td>
								  </tr>
							  @endforeach
							  <a type="submit" class="btn btn-default" href="http://localhost/pos/category/create">Add New Category</a>
							</tbody>
						  </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection