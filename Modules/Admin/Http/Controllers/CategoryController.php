<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\DataTables;
use Modules\Admin\Entities\Categories;
use Modules\Admin\Entities\MasterCategories;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $data['title'] = 'Category';       
        if ($request->ajax()) {
        $data = Categories::with(['masterCategory'])->latest()->get();
    //   dd($data);
        return Datatables::of($data)
         ->addIndexColumn()
        ->addColumn('master_category_name', function($row){       
         return $row->masterCategory->master_category_name;
     })
        ->addIndexColumn()
        ->addColumn('image', function($row){        
         $url = asset("public/uploads/categories/$row->image");
         $image = '<img src="'. $url.'" border="0" width="40" class="img-rounded" align="center" />';
         return $image;
     })


        ->addIndexColumn()
        ->addColumn('action', function($row){
            $url =route('categories.edit',$row->id);
            $actionBtn = '<a href="'.$url.'" class="edit btn btn-success btn-sm"><i class="fa fa-edit "></i></a><a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Hapus User" onclick="deleted('.$row->id.')" ><i class="fa fa-trash "></i></a>';
            return $actionBtn;
        })
        ->rawColumns(['master_category_name','image','action'])
        ->make(true);
      }
       return view('admin::category.index', compact('data'));
    }
   
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
         $data['title'] = 'Category';   
           $masterCategories = MasterCategories::get(); 
         
        return view('admin::category.add', compact('masterCategories'));
        
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
       $request->validate([
            'category_name' => 'required|unique:categories',            
           
        ]);

        $input = $request->all();
        if($request->file()) {

            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public'); 
            $name = time().'_'.$request->image->getClientOriginalName(); 
            $request->image->move(public_path('uploads/categories'), $name);
            $data = array('master_category_id'=>$input['master_category_id'],'category_name'=>$input['category_name'],'image'=> $name );
                  
        }else{
            $data = array('master_category_id'=>$input['master_category_id'],'category_name'=>$input['category_name'] );
        }
        Categories::create( $data);    
        return back()
        ->with('success','Category has been created successfully.');
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
        $category = Categories::with(['masterCategory'])->findOrFail($id); 
        $masterCategories = MasterCategories::get();              
        return view('admin::category.edit',compact('category','masterCategories'));      
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
            'category_name' => 'required',      

        ]);

          $input = $request->all();

          if($request->file()) {         
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public'); 
            $name = time().'_'.$request->image->getClientOriginalName(); 
            $request->image->move(public_path('uploads/categories'), $name);
            $data = array('master_category_id'=>$input['master_category_id'],'category_name'=>$input['category_name'],'image'=> $name );
              
             }else{
            $data = array('master_category_id'=>$input['master_category_id'],'category_name'=>$input['category_name']);
                    }
            Categories::whereId($id)->update($data);    
        return back()
        ->with('success','Category has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
       $com = Categories::where('id',$id)->delete();      
        return Response()->json($com);
    }
}
