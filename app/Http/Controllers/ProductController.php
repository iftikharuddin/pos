<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

use View;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
	public function __construct()
    {
        $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index')->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
		$product->name = Input::get('name');
		$product->desc = Input::get('desc');
		$product->price = Input::get('price');
		$product->quantity = Input::get('quantity');
		$product->save();		
		return Redirect::to('/product')->with('message', 'Product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$product = Product::find($id);
        return view('product.update')->with('productToUpdate', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
		$product->name = Input::get('name');
		$product->desc = Input::get('desc');
		$product->price = Input::get('price');
		$product->quantity = Input::get('quantity');
		$product->save();		
		return Redirect::to('/product')->with('message', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find(Input::get('id'));
		if($product){
			$product->delete();
			return Redirect::to('/product');
		}
    }
}
