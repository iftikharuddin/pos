@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Category</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/category' , $catToUpdate->id) }}">
                        {!! csrf_field() !!}
						 <input type="hidden" name="_method" value="PUT">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">New Category Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{!! $catToUpdate->name !!}">

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">New Category Code</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="code" value="{!! $catToUpdate->code !!}">
                               
                            </div>
                        </div>
						
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                
                                {!! Form::label('image','Choose an Image') !!}
						  		{!! Form::file('image') !!}
                           
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Update Category
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
