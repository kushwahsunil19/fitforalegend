<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Modules\Admin\Entities\{Categories,Subcategories,MasterCategories,User,Country};
use Illuminate\Support\Facades\Auth;
use Hash;
class AccountCreate extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::get();
        return view('account-create',compact('countries'));
        
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'phone' => 'required|min:12|numeric', 
          
        ]);
         
        $input = $request->all();
        $input['password'] = Hash::make($input['password']); 
         $input['country_code'] = 1;        
        $id = User::create($input)->id;
        $credentials = $request->only('email', 'password');     
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }        
    }

    /**
     * Display the specified resource.
     */
    public function show()
    { 
         $countries = Country::get();
         $id = auth()->user()->id;
         $user = User::findOrFail($id);
         return view('profile-edit',compact('user','countries'));
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
           $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',          
            'phone' => 'required|min:12|numeric', 
            
        ]);
           
        $input = $request->all();
         unset($input['_token']);
         unset($input['_method']);      
         User::whereId($id)->update($input);
        
         return redirect()->route('user.dashboard')->withSuccess('Great! You have Successfully loggedin');    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
