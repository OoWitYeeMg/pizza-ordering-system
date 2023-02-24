\<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    // return pizza list
    public function pizzaList(Request $request){
        if($request->status=='desc'){
            $data=Product::orderBy('created_at','desc')->get();
        }
        else if($request->status=='asc'){
            $data=Product::orderBy('created_at','asc')->get();
        }
        return $data;
    }
    // return pizza list
    public function addToCart(Request $request){
        $data=$this->getOrderData($request);
        Cart::create($data);
       return response()->json($data, 200);
    }
// get order data
private function getOrderData($request){
    return[
        'user_id'=>$request->userId,
        'product_id'=>$request->pizzaId,
        'qty'=>$request->count
    ];
}
}
