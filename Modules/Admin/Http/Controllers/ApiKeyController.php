<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Apikey;
use Illuminate\Support\Facades\Hash;
class ApiKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $data['title'] = 'API Key'; 
      $apikey = Apikey::whereId(1)->first();
       if(empty($apikey)){      
        $apikey = [];
       }
       return view('admin::apikey.apikey', compact('apikey'));
       
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
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
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $input = $request->all();
        $data = array('stripe_public_key'=>$input['stripe_public_key'],'stripe_secret_key'=>$input['stripe_secret_key'],'google_map_key'=>$input['google_map_key'],'email'=>$input['email'],'password'=>Hash::make($input['password']));

             $where = ['id'=>$input['id']];           
             Apikey::updateOrCreate($where,$data);
       // Apikey::whereId($input['id'])->update($data);    
        return back()->with('success','Api Key has been updated successfully.');

   
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
