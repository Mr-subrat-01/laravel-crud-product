<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products/index', ['products' => Product::latest()->paginate(5)]);
    }

    public function add()
    {
        return view('products.add_product');
    }

    public function store(Request $request)
    {
        // Validate

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jepg,gif|max:100000'
        ]);


        // upload image
        $imageName = time() . "." . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);


        // Upload data
        $product = new product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->img = $imageName;
        $product->save();

        return back()->withSuccess('Product Added..!!!');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.edit_product', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        // Validate

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:png,jpg,jepg,gif|max:100000'
        ]);

        $product = Product::where('id', $id)->first();

        if (isset($request->image)) {
            // upload image
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->img = $imageName;
        }


        // Upload data
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        return back()->withSuccess('Product Updated..!!!');
    }

    public function delete($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted..!!!');
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.show_product',['product'=>$product]);
    }
}
