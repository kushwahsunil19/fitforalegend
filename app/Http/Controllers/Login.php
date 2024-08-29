<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Entities\{Categories,Subcategories,MasterCategories,User};
use Illuminate\Support\Facades\Auth;
use Hash;
use Session; 
class Login extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        return view('login');
        
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        $input = $request->all();
        if (Auth::attempt($credentials)) {
            $userData = User::where('email', $input['email'])->first();  
             Session::put('userData', $userData);            
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully logged in');
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
       
       

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
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();  
       // return Redirect('login');
           return redirect()->back();
    }
}
