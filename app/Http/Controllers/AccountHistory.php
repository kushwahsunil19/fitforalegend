<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\{Orders,OrderDetails,User};
use Illuminate\Support\Facades\Auth;
class AccountHistory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $input = $request->all();
       
        if(Auth::check()){
             $search = isset($input['search'])?$input['search']:'';
            $orders = Orders::where(function($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%');
                /*->orWhere('variation_price', 'like', '%' . $search );*/

            })
            ->Where('user_id', '=',  Auth::user()->id)
            ->with('user')->latest()->get();
           
            return view('account-history',compact('orders'));
        }  
        return redirect("login")->withSuccess('Opps! You do not have access');       
        
      
    }
    public function filter(Request $request)
    {
        if ($request->ajax()) {
             $input = $request->all();
             $status = $input['status'];
              $year = $input['order_time'];
            
            
             $orders = Orders::where(function($query) use ($status, $year ) {
                $query->Where('user_id', '=',  Auth::user()->id);
                if(!empty($status)){
                     $status = explode(",",$status);
                     $query->whereIn('status', $status);
                }
               
                 $search = isset($input['search'])?$input['search']:'';
                if($search!=''){
                     $query->orWhere('id', 'like', '%' . $search );
                }
                if(!empty($year)){
                // $year = explode(",",$year);
                
                 /* foreach ($year as $key => $yr) {*/

                    if('last30Days' == $year){
                         $date = \Carbon\Carbon::today()->subDays(30);
                         $query->where('created_at','>=',$date); 
                        }elseif('Older' == $year){
                         $query->whereYear('created_at', '<=', \Carbon\Carbon::now()->subDays(2)->toDateTimeString() ); 
                        }else{
                          $query->whereYear('created_at', '=', $year ); 
                        }
                   /*  
                     } */        
                }
               /* echo $year;

                 $query->OrwhereIn('created_at',  $year );*/

            })
          
            ->with('user')->get();         
             return view('ajax.ordersFilter',compact('orders'));
                 die();
        }
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
