<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Brands;
use Yajra\DataTables\DataTables;
class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
     
     if ($request->ajax()) {
        $data = Brands::latest()->get();
        return Datatables::of($data)        
        ->addIndexColumn()
        ->addColumn('image', function($row){                 
             $url=asset("public/uploads/brands/$row->image"); 
         $image = '<img src="'. $url.'" border="0" width="40" class="img-rounded" align="center" />';
         return $image;
     })


        ->addIndexColumn()
        ->addColumn('action', function($row){
            $url =route('brands.edit',$row->id);
            $actionBtn = '<a href="'.$url.'" class="edit btn btn-success btn-sm"><i class="fa fa-edit "></i></a>  <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Hapus User" onclick="deleted('.$row->id.')" ><i class="fa fa-trash "></i></a>';
            return $actionBtn;
        })
        ->rawColumns(['image','action'])
        ->make(true);
      }     
         return view('admin::products.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['title'] = 'Brands'; 
        return view('admin::products.brand.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
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
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
         $brand = Brands::findOrFail($id);      
        return view('admin::products.brand.edit', compact('brand'));
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
         $com = Brands::where('id',$id)->delete();      
        return Response()->json($com);
    }
}
