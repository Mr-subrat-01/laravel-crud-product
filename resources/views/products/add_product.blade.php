@extends('layouts.app')

@section('content')

 @if ($message=Session::get('success'))
   <div class="alert alert-success alert-block">
    {{$message}}
   </div>
 @endif

    <div class="container">
        <div class="text-center mt-3">
            <h2>NEW PRODUCT</h2>
        </div>
        <div class="row justify-content-center">

            <div class="col-sm-8">
                <div class="card mt-3 p-2">

                    <form action="/products/store" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" type="text" name="name" value="{{old('name')}}">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea  id="description" class="form-control" type="text" name="description" rows="4" >{{old('description')}}</textarea>
                            @if ($errors->has('description'))
                              <span class="text-danger">{{$errors->first('description')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input id="image" class="form-control" type="file" name="image">
                            @if ($errors->has('image'))
                                <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-dark ">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection