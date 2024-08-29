<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('admin::login');
    }
    
     public function authenticate(Request $request)
    {     

       $validate  =  $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $email = request()->input('email');
        $password = request()->input('password');
        if ($validate) {
            $admindata = Admin::where('email', $email)->first();
     
            if ($admindata) {
                $select  = Hash::check($request->password, $admindata->password);
         
                if ($select) {
                    $request->session()->regenerate();           
                    $request->session()->put('admin', $admindata['id']);
                    $request->session()->put('ADMINLOGIN', true);
                    $request->session()->put('admindata', $admindata);
                    return redirect('admin/dashboard');
                } else {
                    session()->flash('fails', 'Invalid Password');
                    return redirect('admin');
                }
            } else {
                session()->flash('fails', 'Invalid Username And Password');
                return redirect('admin');
            }
        }     
      

        

    } 
     /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');

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
        /* $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'error_message' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');*/
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
          Auth::logout();
          if($request->session()->has('admin'))
        {
            $request->session()->invalidate('admin');
            $request->session()->invalidate('ADMINLOGIN');
            $request->session()->invalidate('admindata');
            return redirect('admin');
        }
     

        
    }
}
