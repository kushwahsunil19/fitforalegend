<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\DataTables;
use Modules\Admin\Entities\Sizes;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
         if ($request->ajax()) {        
        $data =  Sizes::latest()->get();
        return Datatables::of($data)
   
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $url =route('sizes.edit',$row->id);
            $actionBtn = '<a href="'.$url.'" class="edit btn btn-success btn-sm"><i class="fa fa-edit "></i></a>  <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Hapus User" onclick="deleted('.$row->id.')" ><i class="fa fa-trash "></i></a>';

            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
      }
         $data['title'] = 'user';       
          return view('admin::products.size.index', compact('data'));
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
        $size = Sizes::findOrFail($id);      
         return view('admin::products.size.edit',compact('size'));
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
            'size_name' => 'required',           
           
        ]);
        $input = $request->all();
        if($request->file()) {
            $path = public_path('uploads/masterCategories');
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public'); 
            $name = time().'_'.$request->image->getClientOriginalName(); 
            $request->image->move($path, $name);
            $data = array('size_name'=>$input['size_name'],'image'=> $name );
                 
        }else{
              $data = array('size_name'=>$input['size_name']);
        }
       
        Sizes::whereId($id)->update($data);   
        return back()
        ->with('success','Size has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $com = Sizes::where('id',$id)->delete();      
        return Response()->json($com);
    }
}
