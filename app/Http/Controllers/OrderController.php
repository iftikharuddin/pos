<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Product;
use App\Order;
use App\OrderDetail;
class OrderController extends Controller
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
	$products = Product::all();
	$getid = OrderDetail::all();
        return view('orders.index')->with('products', $products)->with('orders', $getid)->with('orderby', $getid);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
		$input = Input::all();
		$order->name = Input::get('name');
		$order->location = Input::get('location');
		$order->save();
		$j = $order->id;
		if($j > 0){
			for($id = 0; $id < count($input['product_id']); $id++){
				$orderdetails = new OrderDetail;
				$orderdetails->order_id = $j;
				$orderdetails->product_id = $input['product_id'][$id];
				$orderdetails->quantity = $input['qty'][$id];
				$orderdetails->unitprice = $input['price'][$id];
				$orderdetails->discount = $input['dis'][$id];
				$orderdetails->amount = $input['amount'][$id];
				$orderdetails->save();
			}
			
		}
		$products = Product::all();
		$orderdetails = OrderDetail::where('order_id', $order->id)->get();
		$orderby = Order::where('id', $order->id)->get();
		return view('orders.index')->with('orders', $orderdetails)->with('products', $products)->with('orderby', $orderby);
		
    }

}
