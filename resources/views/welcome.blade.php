@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
				
                <div class="panel-body">
                    <div>
					  <label>Name:</label>
					  <input type="text" ng-model="yourName" placeholder="Enter a name here">
					  <hr>
					  <h1>Hello @{{ yourName }} !</h1>
						<div class="panel-body">
							<input type="text" ng-model="data.test" placeholder="What..">
								Hello @{{ data.test  }}
							<hr>
							<button class="@{{ data.test }} btn btn-lg"> I'm BTN</button>
						</div>
					</div>
                    @if(!Auth::guest() && Auth::user()->admin)
                    	<a class="btn btn-primary" href="{{ url('/orders') }}">Place Order</a>
                    	<a class="btn btn-primary" href="{{ url('/users/create') }}">Register</a>
                    	<a class="btn btn-primary" href="{{ url('/users/') }}">Show All Users</a>
                    	<a class="btn btn-primary" href="{{ url('/shop') }}">Shop</a>
                    	<a class="btn btn-primary" href="{{ url('/product') }}">Show All Products</a>
                    	<a class="btn btn-primary" href="{{ url('/product/create') }}">Add Product</a>
                    	<a class="btn btn-primary" href="{{ url('/category/create') }}">Add Category</a>
                    	<a class="btn btn-raised btn-primary" href="{{ url('/category') }}">Show All Categories</a>
                    	<hr>
                    	<a class="btn btn-raised btn-default" href="{{ url('/settings') }}"> Settings</a>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
