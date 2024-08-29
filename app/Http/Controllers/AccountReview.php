<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\{Orders,User,Products,OrderRating};
use Illuminate\Support\Facades\Auth;
class AccountReview extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            $ratings = OrderRating::with('product')->with('user')->where('user_id',Auth::user()->id)->paginate(20);           
           return view('account-review',compact('ratings'));
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
        $com = OrderRating::where('id',$id)->delete();   
        return Response()->json($com);
    }
}
