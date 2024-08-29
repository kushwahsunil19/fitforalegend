<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\MasterCategories;
use Modules\Admin\Entities\User;
class MasterCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
       if ($request->ajax()) {        
        $data =  MasterCategories::latest()->get();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('image', function($row){       
          $url=asset("public/uploads/masterCategories/$row->image"); 
         $image = '<img src="'. $url.'" border="0" width="40" class="img-rounded" align="center" />';
         return $image;
             })


        ->addIndexColumn()
        ->addColumn('action', function($row){
            $url =route('master-categories.edit',$row->id);
            $actionBtn = '<a href="'.$url.'" class="edit btn btn-success btn-sm"><i class="fa fa-edit "></i></a>  <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Hapus User" onclick="deleted('.$row->id.')" ><i class="fa fa-trash "></i></a>';

            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
      }
         $data['title'] = 'user';       
          return view('admin::masterCatagory.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['title'] = 'User';   
        return view('admin::masterCatagory.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
          $request->validate([
            'master_category_name' => 'required|unique:master_categories',            
           
        ]);

        $input = $request->all();
        if($request->file()) {
            $path = public_path('uploads/masterCategories');
            if (!is_dir($path)) {
            mkdir($path, 0777, true);
            }    
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public'); 
            $name = time().'_'.$request->image->getClientOriginalName(); 
            $request->image->move($path, $name);
            $data = array('master_category_name'=>$input['master_category_name'],'image'=> $name );
                 
        }else{
            $data = array('master_category_name'=>$input['master_category_name'] );
        }
      MasterCategories::create( $data);   
        return back()
        ->with('success','Master Category has been created successfully.');
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
        $category = MasterCategories::findOrFail($id);      
         return view('admin::masterCatagory.edit',compact('category'));
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
            'master_category_name' => 'required',           
           
        ]);

        $input = $request->all();
        if($request->file()) {
            $path = public_path('uploads/masterCategories');
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public'); 
            $name = time().'_'.$request->image->getClientOriginalName(); 
            $request->image->move($path, $name);
            $data = array('master_category_name'=>$input['master_category_name'],'image'=> $name );
                 
        }else{
              $data = array('master_category_name'=>$input['master_category_name']);
        }
       
        MasterCategories::whereId($id)->update($data);   
        return back()
        ->with('success','Master Category has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
         $com = MasterCategories::where('id',$id)->delete();      
        return Response()->json($com);
    }
}
