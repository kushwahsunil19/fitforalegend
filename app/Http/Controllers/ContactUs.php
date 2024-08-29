<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\{Contact};
use Mail;

use Session; 
class ContactUs extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('contact-us');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validation = $request->validate([
            'email' => 'required|email|unique:contacts',
            
        ]);
         $input = $request->all();
     
        $where = array('email'=>$input['email']);
        $contact = Contact::where( $where)->OrWhere(['email'=>$input['email']])->first();
            if(empty($contact)) 
            {
               
                Mail::send('contact-us',['name',$input['name']],function($message) use($request){
                $message->to($request->email)->subject($request->subject);
                $message->from('xyz@gmail.com','Virat Gandhi');
                });
                Contact::create($input);
                 return redirect("contact-us")->withSuccess('Thank you for conntecting');
            }else{
                
                 return redirect("contact-us")->withSuccess('Oppes! You have entered another email.');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
