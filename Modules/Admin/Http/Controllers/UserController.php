<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\User;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
         if ($request->ajax()) {        
        $data =  User::latest()->get();
        return Datatables::of($data)
         ->addIndexColumn()
        ->addColumn('name', function($row){       
         return $row->first_name.' '.$row->last_name;
     })
        ->addIndexColumn()
        ->addColumn('image', function($row){       
          $url=asset("public/uploads/$row->image"); 
         $image = '<img src="'. $url.'" border="0" width="40" class="img-rounded" align="center" />';
         return $image;
             })


        ->addIndexColumn()
        ->addColumn('action', function($row){
            $url = route('users.edit',$row->id);            
            $actionBtn = '<a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Hapus User" onclick="deleted('.$row->id.')" ><i class="fa fa-trash "></i></a> ';
            return $actionBtn;
        })
        ->rawColumns(['image','name','action'])
        ->make(true);
      }
         $data['title'] = 'user';       
          return view('admin::user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
       $data['title'] = 'User';   
        return view('admin::user.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required|min:11|numeric',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        $input = $request->all();
        if($request->file()) {

            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public'); 
            $name = time().'_'.$request->image->getClientOriginalName(); 
            $request->image->move(public_path('uploads'), $name);
            $data = array('name'=>$input['name'],'email'=>$input['email'],'password'=>Hash::make($input['password']),'phone'=>$input['phone'],'image'=> $name );
            User::create( $data);          
        }
        return back()->with('success','User has been created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request,$id)
    {

         $data['id'] = $id;
         $data['title'] = 'user';      
          return view('admin::user.show',compact('data'));
       
    }
   
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
         $user = User::findOrFail($id);      
         return view('admin::user.edit',compact('user'));
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
        'name' => 'required',
        'email' => 'required',           
        'phone' =>'required|min:11|numeric',

    ]);

      $input = $request->all();

      if($request->file()) {         
        $fileName = time().'_'.$request->image->getClientOriginalName();
        $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public'); 
        $name = time().'_'.$request->image->getClientOriginalName(); 
        $request->image->move(public_path('uploads'), $name);
        $data = array('name'=>$input['name'],'email'=>$input['email'],'phone'=>$input['phone'],'image'=> $name );
          
    }else{
        $data = array('name'=>$input['name'],'email'=>$input['email'],'phone'=>$input['phone'] );
    }
    User::whereId($id)->update($data);    
    return back()
    ->with('success','User has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
 
    public function destroy($id)
    {
        $com = User::where('id',$id)->delete();      
        return Response()->json($com);
    }
}
