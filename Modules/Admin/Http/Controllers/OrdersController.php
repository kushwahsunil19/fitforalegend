<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\{Orders,OrderDetails};
use Yajra\DataTables\DataTables;
use Stripe\Exception\CardException;
use Stripe;
use Stripe\Refund;
use Session;
class OrdersController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
     
     if ($request->ajax()) {
         $data = Orders::with('user')->latest()->get(); 

        return Datatables::of($data)     
        ->addIndexColumn()
        ->addColumn('user', function($row){       
         return $row->user->first_name. ' '.$row->user->last_name;
     })   
    
      


        ->addIndexColumn()
        ->addColumn('action', function($row){
            $url =route('orders.edit',$row->id);
             $urlView = route('orders.show',$row->id);
            $actionBtn = ' <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Hapus User" onclick="deleted('.$row->id.')" ><i class="fa fa-trash "></i></a><a href="'.$urlView.'" class=" btn btn-success btn-sm"><i class="fa fa-eye "></i></a>';
            return $actionBtn;
        })
        ->rawColumns(['user','action'])
        ->make(true);
      }     
         return view('admin::products.order.index');
    }
    public function allNotification(Request $request){
            
       
          $currentDate = date('Y-m-d',strtotime(now()));
          $orders = Orders::with('user')->with('orderDetail')->where('status','ORDERED')->where('read_status','Unread')->latest()->get(); 
          
          $data['orders'] = $orders;
          $data['orderCount'] =count($orders);
          return response()->json($data);
         
    }
    
      public function getAllNotification(Request $request)
    {
     
     if ($request->ajax()) {
         $data = Orders::with('user')->with('orderDetail')->where('status','ORDERED')->where('read_status','Unread')->latest()->get(); 

        return Datatables::of($data)     
        ->addIndexColumn()
        ->addColumn('user', function($row){       
         return $row->user->first_name. ' '.$row->user->last_name;
     })   
    
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $url =route('orders.edit',$row->id);
             $urlView = route('orders.show',$row->id);
            $actionBtn = '<a href="'.$urlView.'" class=" btn btn-success btn-sm"><i class="fa fa-eye "></i></a>';
            return $actionBtn;
        })
        ->rawColumns(['user','action'])
        ->make(true);
      }     
         return view('admin::products.notifications.index');
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['title'] = 'Brands'; 
        return view('admin::products.order.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function orderStatusUpdate(Request $request){
         $input = $request->all();
        
         unset($input['_token']);        
         if($input['status']=='CANCELLED'){
          
                 $order = Orders::where('id',$input['id'])->first();
             if($order->payment_type =='PayPal'){
                 
             }else if($order->payment_type =='Credit Card' || $order->payment_type =='Credit Card' ){
                
                 $stripe =  Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                 $charge_id = Session::get('charge_id');
                 $amount = Session::get('payment_amount');
                try {
                    // Create a refund
                    $refund = Refund::create([
                    'charge' => $order->transaction_id,
                    ]);
                    
                    // Access refund information
                    $refundId = $refund->id;
                    $refundAmount = $refund->amount;
                    $input['refund_id'] = $refundId;
                    // Your additional logic after successful refund
                   } catch (\Exception $e) {
                    // Handle refund failure
                    $error = $e->getMessage();
                    // Log or respond accordingly
                   }
             }
         }
      Orders::whereId($input['id'])->update($input);
         return true;
    }
    public function store(Request $request)
    {
         $request->validate([
            'brand_name' => 'required|unique:brands',            
           
        ]);
        $input = $request->all();
        if($request->file()) {
            $path = public_path('uploads/brands');
            if (!is_dir($path)) {
            mkdir($path, 0777, true);
            }    
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public'); 
            $name = time().'_'.$request->image->getClientOriginalName(); 
            $request->image->move($path, $name);
            $data = array('brand_name'=>$input['brand_name'],'slug'=>$input['slug'],'status'=>$input['status'],'image'=> $name );
           
        }else{
            $data = array('brand_name'=>$input['brand_name'],'slug'=>$input['slug'],'status'=>$input['status']);
        }
          Brands::create( $data);         
        return back()
        ->with('success','Brand has been created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
         
        $orderDetail = Orders::with('user')->findOrFail($id);
         Orders::where('status','ORDERED')->where('id',$id)->update(['read_status'=>'Read']);    
        $orderDetails = OrderDetails::with('productVariation')->with('product')->where('order_id',$id)->get();
          return view('admin::products.order.show',compact('orderDetails','orderDetail'));
      
       
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
         
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
         $request->validate([
         'brand_name' => 'required', 
         ]);

      $input = $request->all();

      if($request->file()) {
        $fileName = time().'_'.$request->image->getClientOriginalName();
        $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public'); 
        $name = time().'_'.$request->image->getClientOriginalName(); 
        $request->image->move(public_path('uploads/brands'), $name);
        $data = array('brand_name'=>$input['brand_name'],'slug'=>$input['slug'],'status'=>$input['status'],'image'=> $name );       
        }else{
        $data = array('brand_name'=>$input['brand_name'],'slug'=>$input['slug'],'status'=>$input['status'] );     
        }
     Brands::whereId($id)->update($data);      
    
    return back()
    ->with('success','brand has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
         $com = orders::where('id',$id)->delete();      
        return Response()->json($com);
    }
}
