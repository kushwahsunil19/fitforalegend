<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\{Wishlist};
use Illuminate\Support\Facades\Auth;
class AccountWishlist extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         if(Auth::check()){
            $wishlists = Wishlist::where('user_id',auth()->user()->id)->with('product')->get();            
           return view('account-wishlist',compact('wishlists'));
        }  

        return redirect("login")->withSuccess('Opps! You do not have access');   
       
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $input = $request->all();
   
        if(Auth::check()){         
           $input['user_id'] = auth()->user()->id;
           if($input['likeStatus']>0){ 
            unset($input['likeStatus']);  
            unset($input['_token']); 
           
            Wishlist::updateOrCreate($input,$input); 
           }else{ 
          
            $where = array('user_id'=>auth()->user()->id, 'product_id'=>$input['product_id']);
             $res = Wishlist::where($where)->delete();     
            
           }
        }  
        return redirect("login")->withSuccess('Opps! You do not have access');   
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
        $com = Wishlist::where('id',$id)->delete();   
        return Response()->json($com);
    }
}
