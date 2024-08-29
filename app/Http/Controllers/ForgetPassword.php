<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Admin\Entities\{User,Otp};
use Mail;
use Session; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class ForgetPassword extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        return view('forgot-password');
    }
    public function emailOtp(){
           return view('email-otp');
    }
    public function verifyOtp(){
         return view('verify-otp');
    }
    public function changePassword(){
        $otp = [];
        return view('change-password' );
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
            'email' => 'required',
        ]);
         $input = $request->all();
         $where = array('email'=>$input['email']);
         $user = User::where( $where)->OrWhere(['phone'=>$input['email']])->first();
            if(!empty($user)) 
            {
              $otp = rand(1000,9999);
              $data['otp'] =$otp ; 
              $data['email'] = $user->email; 
              $data['phone'] = $user->phone; 
              $email = $user->email;
              Session::put('email',  $email);
              // $msg_data = $this->send_sms($data);
               /*   $msg_data = Mail::send('mail', $data, function($message) {
                 $message->to($user->email, 'Test Eamil')->subject
                    ('Laravel Testing Mail');       
                 $message->from('xyz@gmail.com','Virat Gandhi');
                 });*/
                   Otp::updateOrCreate(['email'=>$user->email,'phone'=>$user->phone],$data);
                  Mail::send('verify-otp', ['Otp' => $otp], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
            
                return redirect("verify-otp");
            }else{
                return redirect("forgot-password")->withSuccess('Oppes! You have entered invalid credentials');
            }
        
    }
    
     public function resendOtp($email = null)
    {
     
       
         $where = array('email'=>$email);
         $user = User::where( $where)->OrWhere(['phone'=>$email])->first();
            if(!empty($user)) 
            {
              $otp = rand(1000,9999);
              $data['otp'] =$otp ; 
              $data['email'] = $user->email; 
              $data['phone'] = $user->phone; 
              // $msg_data = $this->send_sms($data);
               /*   $msg_data = Mail::send('mail', $data, function($message) {
                 $message->to($user->email, 'Test Eamil')->subject
                    ('Laravel Testing Mail');       
                 $message->from('xyz@gmail.com','Virat Gandhi');
                 });*/
                   Otp::updateOrCreate(['email'=>$user->email,'phone'=>$user->phone],$data);
                 $emailcheck= Mail::send('verify-otp', ['Otp' => $otp], function($message) use($email){
              $message->to($email);
              $message->subject('Reset Password');
          });
       
              return redirect("verify-otp");
            }else{
                return redirect("forgot-password")->withSuccess('Oppes! You have entered invalid credentials');
            }
        
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function verifyOtpMatch(Request $request)
    {
         $validation = $request->validate([
            'otp' => 'required',
        ]);
         $input = $request->all();
         $where = array('otp'=>$input['otp']);
         $otp = Otp::where( $where)->first();
        
        if(!empty($otp)) 
        {
             $email = $otp->email;
             Session::put('email',  $email);
             return redirect("change-password");
           // return view('change-password' ,compact('otp'));
        }else{
            return redirect("verify-otp")->withSuccess('Oppes! You have entered invalid otp');
        }
        
    }
    
    public function updatePassword(Request $request)
    {
         $validation = $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
     
           $input = $request->all();
           $where = array('email'=>$input['email']);
           $user = User::where( $where)->first();
            if(!empty($user)) 
            {
                user::where($where)->update(['password'=>Hash::make($input['password'])]);
               
                        $credentials = $request->only('email', 'password');     
                if (Auth::attempt($credentials)) {
                    return redirect()->intended('dashboard')
                                ->withSuccess('You have Successfully loggedin');
                }  
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
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
