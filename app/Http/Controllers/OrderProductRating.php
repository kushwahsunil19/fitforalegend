<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\{Orders,User,Products,OrderRating};
use Illuminate\Support\Facades\Auth;
class OrderProductRating extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $input = $request->all();
       
        if(Auth::check()){
            $product = Products::where('id',$input['product_id'])->with('brand')->first();
            return view('order-poduct-rating',compact('product'));
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
        $validation = $request->validate([
            'user_comment' => 'required',
            'user_rating' => 'required',
        ]);
         
        $input = $request->all();
       // print_r($input);die;
      if(Auth::check()){
          $input['user_id'] = auth()->user()->id;
          $input['order_id'] = $input['order_id'];
         unset($input['star']);
        unset($input['_token']);
        
       $id = OrderRating::create($input,$input)->id;
       $rating = OrderRating::where('id',$id)->first();
       $data = getUserRatings( $rating->product_id);
       $id = Products::where('id',$rating->product_id)->update(['user_avg_rating'=>$data[0]->avg_rating]);
     
     return redirect()->route('order-details.show',$input['order_id']);
  
     }   

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {  
        if(Auth::check()){
            $order = Orders::where('id',$id)->with('user')->first();
            return view('order-poduct-rating',compact('order'));
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
        $com = OrderRating::where('id',$id)->delete();   
        return Response()->json($com);
    }
}
