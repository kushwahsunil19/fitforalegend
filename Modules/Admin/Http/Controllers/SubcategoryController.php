<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Subcategories;
use Modules\Admin\Entities\Categories;
use Yajra\DataTables\DataTables;
class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
         $data['title'] = 'subcategory';  
          if ($request->ajax()) {
        $data = Subcategories::with(['category'])->latest()->get();

        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('category_name', function($row){       
         return $row->category->category_name;
     })
          ->addIndexColumn()
        ->addColumn('master_category_name', function($row){       
         return $row->category->masterCategory->master_category_name;
     })
        ->addIndexColumn()
        ->addColumn('image', function($row){                 
             $url=asset("public/uploads/subcategories/$row->image"); 
         $image = '<img src="'. $url.'" border="0" width="40" class="img-rounded" align="center" />';
         return $image;
     })


        ->addIndexColumn()
        ->addColumn('action', function($row){
            $url =route('sub-categories.edit',$row->id);
            $actionBtn = '<a href="'.$url.'" class="edit btn btn-success btn-sm"><i class="fa fa-edit "></i></a>  <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Hapus User" onclick="deleted('.$row->id.')" ><i class="fa fa-trash "></i></a>';
            return $actionBtn;
        })
        ->rawColumns(['category_name','master_category_name','image','action'])
        ->make(true);
      }     
         return view('admin::subcategory.index', compact('data'));
       
    }
   public function getsubcategory(Request $request)
     {

   
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
          $categories = Categories::with('masterCategory')->get(); 
         
        $data['title'] = 'subcategory';   

        return view('admin::subcategory.add', compact('data','categories'));
       
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required',            
           
        ]);
        $input = $request->all();
        if($request->file()) {

            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public'); 
            $name = time().'_'.$request->image->getClientOriginalName(); 
            $request->image->move(public_path('uploads/subcategories'), $name);
            $data = array('subcategory_name'=>$input['subcategory_name'],'category_id'=>$input['category_id'],'image'=> $name );
           
        }else{
            $data = array('subcategory_name'=>$input['subcategory_name'],'category_id'=>$input['category_id'] );
        }
          Subcategories::create( $data);         
        return back()
        ->with('success','Sub category has been created successfully.');
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
        $categories = Categories::get(); 
        $subcategory = Subcategories::with(['category'])->findOrFail($id);      
        return view('admin::subcategory.edit',compact('categories','subcategory'));
       
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
        'subcategory_name' => 'required',      

    ]);

      $input = $request->all();


      if($request->file()) {
        $fileName = time().'_'.$request->image->getClientOriginalName();
        $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public'); 
        $name = time().'_'.$request->image->getClientOriginalName(); 
        $request->image->move(public_path('uploads/subcategories'), $name);
        $data = array('subcategory_name'=>$input['subcategory_name'],'category_id'=>$input['category_id'],'image'=> $name );       
        }else{
         $data = array('subcategory_name'=>$input['subcategory_name'],'category_id'=>$input['category_id']);
        }
     Subcategories::whereId($id)->update($data);      
    
    return back()
    ->with('success','Sub category has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
       $com = Subcategories::where('id',$id)->delete();      
        return Response()->json($com);
    }
}
