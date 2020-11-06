<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function show($id=null)
    {
        $data = []; //to be sent to the view
        $product = Product::findOrFail($id);
        $listOfSizes = array("XS","S","M","L","XL");

        // if(!array_key_exists ($id , $listProducts) || is_null($id) ) {
        //     return redirect()->action('HomeController@index');
        // }

        $data["title"] = $product->getName();
        $data["product"] = $product;
        $data["sizes"] = $listOfSizes;
        return view('product.show')->with("data",$data);
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create product";
        $data["products"] = Product::all();

        return view('product.create')->with("data",$data);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|gt:0"
        ]);
        Product::create($request->only(["name","price"]));

        return back()->with('success','Item created successfully!');
    }
}