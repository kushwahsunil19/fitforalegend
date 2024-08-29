<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\{Orders,Products};
use Illuminate\Support\Facades\Auth;
class AccountNotification extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       if(Auth::check()){
        
         $orders = Orders::with('orderDetail')->where('status','DELIVERED')->whereDate('updated_at', '=', now())->latest()->get();
         $products = Products::whereDate('created_at', '=', now())->latest()->get();
            return view('account-notification',compact('orders','products'));
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
        //
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
