@extends('layouts.master')
@section('content')

<style>
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
    float:right;
}
label {
    font-weight: 700;
    font-size: 16px;
}
</style>
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="{{ route('home.index')}}">Home</a></li>
            <li><span>Login</span></li>
        </ul>
    </div>
</div>
    <div class="holder">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-18 col-lg-12">
                <div class="forget-sec">
                <h2 class="text-center">Login</h2>
             
                <div class="form-wrapper">
                       @if (session('success'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                       <form action="{{ route('login.store') }}" method="POST">
                          @csrf
                        <div class="row ">
                        <div class="col-sm-13 m-auto">
                        <div class="form-group">
                            <label>Enter Email</label>
                            {{ Form::text('email', '', array('placeholder'=>'Email', 'class'=>$errors->has('email') ? 'form-control has-error' : 'form-control')) }}
                             @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                        </div>
                    </div>
                    <div class="col-sm-13 m-auto">
                        <div class="form-group">
                            <label>Enter Password</label>
                           {{ Form::password('password', array('placeholder'=>'Password', 'class'=>$errors->has('password') ? 'form-control has-error' : 'form-control')) }}
                              @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                                  
                                  <a href="{{route('forgot-password.index')}}" class="resend"> Forget Password</a>
                        </div>
                    </div>
                       <div class="col-md-13 mt-2 w-100 m-auto mt-4" style="margin-top:25px !important;">
                        <div class="text-center"> 
                           <button class="btn w-100" type="submit">Login</button>
                           
                        </div>
                    </div>
                    <div class="col-md-18 m-auto text-center mt-2 pt-2"> 
                     <div class="clearfix">
                            <label for="checkbox1">Don't have an account ?  <a href="{{ route('account-create.index') }}" class="custom-color" > Sign Up here </a> 
                        </div>
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
    @endsection