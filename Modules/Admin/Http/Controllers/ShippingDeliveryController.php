<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shipping_Delivery;
use Yajra\DataTables\DataTables;
class ShippingDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
   public function index(Request $request)
    {
         if ($request->ajax()) {        
        $data =  Shipping_Delivery::latest()->get();
        return Datatables::of($data)
         ->addIndexColumn()
        ->addColumn('description', function($row){       
         return $row->description;
     })   
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $url =route('shipping-delivery.edit',$row->id);
            $actionBtn = '<a href="'.$url.'" class="edit btn btn-success btn-sm"><i class="fa fa-edit "></i></a> ';

            return $actionBtn;
        })
        ->rawColumns(['description','action'])
        ->make(true);
      }
        
      
           return view('admin::shippingDelivery.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
          $data['title'] = 'User';   
        return view('admin::products.size.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'size_name' => 'required|unique:sizes',            
           
        ]);

        $input = $request->all(); 
          $data = array('size_name'=>$input['size_name']);    

        Sizes::create($data);   
        return back()
        ->with('success','Size has been created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
          $about = Shipping_Delivery::findOrFail($id);      
         return view('admin::shippingDelivery.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
     
        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        Shipping_Delivery::whereId($id)->update($input);   
        return back()->with('success','Shipping and delivery has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $com = Shipping_Delivery::where('id',$id)->delete();      
        return Response()->json($com);
    }
}
