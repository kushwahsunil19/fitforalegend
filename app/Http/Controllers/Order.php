<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\{Orders,OrderDetails,User,OrderRating};
use Illuminate\Support\Facades\Auth;
class Order extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        if(Auth::check()){   
        $user = User::where('id',Auth::user()->id)->with('order')->first();               
           return view('order-details',compact('user'));
        }  
        return redirect("login")->withSuccess('Opps! You do not have access'); 
       
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        if(Auth::check()){   
        $orders = OrderDetails::with('product')->with('order')->with('productVariation')->where('order_id',$id)->get();
        $order = Orders::with('user')->where('id',$id)->first();
       
         $ratings = OrderRating::with('product')->with('user')->where('order_id',$id)->get();                  
           return view('order-details',compact('order','orders','ratings'));
        }  
        return redirect("login")->withSuccess('Opps! You do not have access'); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
