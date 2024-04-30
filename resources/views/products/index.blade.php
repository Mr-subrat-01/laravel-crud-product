@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-right mt-2">
            <a href="products/add" class="btn btn-dark">Add New Product</a>
        </div>
        <h1>Products</h1>
        <table class="table table-hover   mt-4">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>S.NO</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                    <tr class="text-center">
                        <td>{{ $loop->index + 1 }}</td>
                        <td><a href="/products/{{ $product->id }}/show">{{ $product->name }}</a></td>
                        <td><img src="products/{{ $product->img }}" alt="" class="rounded-circle" width="30"
                                height="30"></td>
                        <td><a href="/products/{{ $product->id }}/edit" class="btn btn-dark btn-sm ">Edit</a>
                            <a href="/products/{{ $product->id }}/delete" class="btn btn-danger btn-sm ml-2">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {{$products->links()}}
    </div>
@endsection
