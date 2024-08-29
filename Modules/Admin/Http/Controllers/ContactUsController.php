<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Contact;
use Yajra\DataTables\DataTables;
class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
      if ($request->ajax()) {
         $data = Contact::latest()->get(); 
        return Datatables::of($data)     
       
        ->addIndexColumn()
        ->addColumn('action', function($row){
           
             $urlView = route('contactus.show',$row->id);
            $actionBtn = ' <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Hapus User" onclick="deleted('.$row->id.')" ><i class="fa fa-trash "></i></a>';
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
      }     
         
       return view('admin::contact.index');
       
    }
  

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
         $data['title'] = 'User';   
        return view('admin::contact.add', compact('data'));
      
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
            'phone' => 'required|min:11|numeric',
            'message' => 'required',
        ]);

        $input = $request->all();
          Contact::create( $input);    
        return back()
        ->with('success','Contact has been created successfully.');
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
        $contact = Contact::findOrFail($id);      
        return view('admin::contact.edit',compact('contact'));
      
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
        'phone' => 'required|min:11|numeric',

    ]);

      $input = $request->all();
      $data = array('name'=>$input['name'],'email'=>$input['email'],'phone'=>$input['phone'],'message'=>$input['message']);
      Contact::whereId($id)->update($data);    
    return back()
    ->with('success','Contact has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
     public function destroy($id)
    {
         $com = Contact::where('id',$id)->delete();      
        return Response()->json($com);
    }
}
