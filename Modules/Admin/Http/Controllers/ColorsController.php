<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\DataTables;
use Modules\Admin\Entities\Colors;
class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
       if ($request->ajax()) {        
        $data =  Colors::latest()->get();
        return Datatables::of($data)
   
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $url =route('colors.edit',$row->id);
            $actionBtn = '<a href="'.$url.'" class="edit btn btn-success btn-sm"><i class="fa fa-edit "></i></a>  <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Hapus User" onclick="deleted('.$row->id.')" ><i class="fa fa-trash "></i></a>';

            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
      }
         $data['title'] = 'user';       
          return view('admin::products.color.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
          $data['title'] = 'User';   
        return view('admin::products.color.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
         $request->validate([
            'color_name' => 'required|unique:colors',            
           
        ]);

        $input = $request->all(); 
        

        Colors::create( $input);   
        return back()
        ->with('success','Color has been created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $color = Colors::findOrFail($id);      
         return view('admin::products.color.edit',compact('color'));
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
            'color_name' => 'required',           
           
        ]);
        $input = $request->all();
         unset($input['_token']);
         unset($input['_method']);
       
        Colors::whereId($id)->update($input);   
        return back()
        ->with('success','Color has been created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $com = Colors::where('id',$id)->delete();      
        return Response()->json($com);
    }
}
