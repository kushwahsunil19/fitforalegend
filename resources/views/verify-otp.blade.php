@extends('layouts.master')
@section('content')
<style>.disabled-link {
   pointer-events: none;
   }
   .forget-sec{
    
    background: #fff;
    margin-bottom: 70px;
    padding: 60px 30px;
    margin-top: 70px;
   }
   .holder {
    background: #f1f3f6;
    }
    .form-group {
    border: none;
    outline: none;
    box-shadow: none;
}
.btn a{
    color:#fff !important;
}
.page-content{
    
    background:#f1f2f6;
   padding-bottom: 0px;
}
.form-control {
    /*border: 1px solid #fff !important;*/
    border-radius: 3px !important;
    border:1px solid #f5f5f5;
     background:#fff;
}
.recovery-heading  {
    color: rgba(40,44,63,.7);
    font-size: 15px;
}
.resend{
    margin-top: 15px !important;
    color: #00c7ac;
    font-size: 16px;
    font-weight: 700;
}
label {
    font-weight: 700;
    font-size: 16px;
}
</style>
<div class="success"> </div>
<div class="page-content">
<div class="holder">
  <div class="container">
   <div class="row justify-content-center">
     <div class="col-md-18 col-lg-12">
         <div class="forget-sec">
       <!--<h2 class="text-center">Reset Password</h2>-->
       <div class="form-wrapper">
           <form action="{{ route('verify-otp')}}" method="POST">
            @csrf
           <div class="row ">
             <div class="col-sm-13 m-auto">
                  <h2 class="m-0">Verification required</h2>
                  <p class="recovery-heading">To continue the verification step, we've send an OTP to the email and mobile . please enter it below to complete verificaton. </p>
               </div>
             <div class="col-sm-13 m-auto">
               <div class="form-group">
                     @if (session('success'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                   <label>Enter OTP</label>
                 <input type="password" class="form-control" name="otp" placeholder="Enter Otp">
                    @if ($errors->has('otp'))
                      <span class="text-danger">{{ $errors->first('otp') }}</span>
                    @endif
               </div>
             </div>
             <div class="col-md-13 mt-2 w-100 m-auto mt-4" style="margin-top:25px !important;">
               <div class="text-center">
                 <button class="btn w-100" type="submit"> Continue</a></button>
               </div>
               
               <a href="{{ route('resend-otp',Session::get('email'))}}" class="text-center m-auto mt-4 d-block resend" >Resent OTP</a>
             </div>
         </form>
       </div>
      </div>
     </div>
   </div>
 </div>
</div>
</div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection