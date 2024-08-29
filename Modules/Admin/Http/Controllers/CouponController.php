<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Coupons;

use Yajra\DataTables\DataTables;
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $data = Coupons::latest()->get();
        return Datatables::of($data) 
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $url =route('coupons.edit',$row->id);
            $actionBtn = '<a href="'.$url.'" class="edit btn btn-success btn-sm"><i class="fa fa-edit "></i></a>  <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Hapus User" onclick="deleted('.$row->id.')" ><i class="fa fa-trash "></i></a>';
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
      }     
         return view('admin::products.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['title'] = 'Brands'; 
        return view('admin::products.coupon.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
         $request->validate([
            'code' => 'required',            
             'discount' => 'required',            
             
           
        ]);
        $input = $request->all();     
          Coupons::create( $input);         
        return back()
        ->with('success','coupon has been created successfully.');
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
        $coupon = Coupons::findOrFail($id);      
        return view('admin::products.coupon.edit', compact('coupon'));
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
         'code' => 'required',            
         'discount' => 'required', 
         ]);

      $input = $request->all();    
      unset($input['_token']);
       unset($input['_method']);  
     Coupons::whereId($id)->update($input);      
    
    return back()
    ->with('success','coupon has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $com = Coupons::where('id',$id)->delete();      
        return Response()->json($com);
    }
}
