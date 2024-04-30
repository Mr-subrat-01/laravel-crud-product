@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mt-3">
            <h2>VIEW PRODUCT</h2>
        </div>
        <div class="row justify-content-center">

            <div class="col-sm-8 mt-4">
                <div class="card  p-4">
                    <p>Name : <b>{{ $product->name }}</b></p>
                    <p>Description : <b>{{ $product->description }}</b></p>
                    <p>Image:</p>
                    <b>
                        <img src="/products/{{ $product->img }}" width="300" height="300">
                    </b>
                </div>
            </div>
        </div>

    </div>
@endsection
