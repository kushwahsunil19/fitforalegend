@extends('layouts.master')
@section('content')

<style>
    
    .intl-tel-input .selected-flag .iti-flag {
    
    display: none;
}
 .intl-tel-input {
    width: 100%;
}  
.intl-tel-input.separate-dial-code .selected-dial-code {

    padding-left: 10px !important;
}

.intl-tel-input .selected-flag .iti-arrow {
    position: absolute;
    top: 50%;
    margin-top: -2px;
    right: 15px !important;
}
.iti-flag{
    display:none;
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


<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="{{ route('home.index')}}">Home</a></li>
            <li><span>Create account</span></li>
        </ul>
    </div>
</div>
    <div class="holder">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-18 col-lg-12">
                <div class="forget-sec">
                <h2 class="text-center">Create an Account</h2>
                <div class="form-wrapper">
                    <p>To access your whishlist, address book and contact preferences and to take advantage of our speedy checkout, create an account with us now.</p>
                <form action="{{ route('account-create.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="form-group">
                                  {{ Form::text('first_name', '', array('placeholder'=>'First Name', 'class'=>$errors->has('first_name') ? 'form-control has-error' : 'form-control')) }}
                                    
                                      @if ($errors->has('first_name'))
                                      <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                  @endif
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                  {{ Form::text('last_name',  '', array('placeholder'=>'Last Name', 'class'=>$errors->has('last_name') ? 'form-control has-error' : 'form-control')) }}
                                  @if ($errors->has('last_name'))
                                      <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                  @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::text('email', '', array('placeholder'=>'Email', 'class'=>$errors->has('email') ? 'form-control has-error' : 'form-control')) }}
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                        </div>
                        <div class="form-group">
                          {{ Form::password('password', array('placeholder'=>'Password', 'class'=>$errors->has('password') ? 'form-control has-error' : 'form-control')) }}
                                 @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                        </div>
                        <div class="form-group">
                            
                            {{ Form::password('confirm_password', array('placeholder'=>'Password (again)', 'class'=>$errors->has('password_confirmation') ? 'form-control has-error' : 'form-control')) }}
                            @if ($errors->has('confirm_password'))
                                      <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                                    <!--<input type="text" id="mobile_code" class="form-control" placeholder="Phone Number" name="name">-->
                                    <div class="row">
                                       <div class="col-2 pr-0"> 
                                       <select style="border: 1px solid #cfcfcf !important; background: transparent; border-right: 0 !important;width: 100%;height: 100%;padding: 0; border: none;text-align: center;font-weight: bold; font-size: 17px;" disabled name="country_code">
                                           <option selected disabled value="1">+1</option>
                                       </select>
                                       </div>
                                        <div class="col-16 pl-0">
                                 
                                     {{ Form::text('phone', '', array('placeholder'=>'phone', 'class'=>$errors->has('phone') ? 'form-control has-error' : 'form-control')) }}
                                    </div>
                                    </div>
                              @if ($errors->has('phone'))
                                      <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                      
                        <div class="clearfix">
                            <input id="checkbox1" name="checkbox1" type="checkbox" checked="checked">
                            <label for="checkbox1">By registering your details you agree to our <a href="javascript:;" class="custom-color" >Terms and Conditions</a> and <a href="javascript:;" class="custom-color" >Cookie Policy</a></label>
                        </div>
                        <div class="text-center">
                            <button class="btn" >create an account</button> 

                        </div>
                            <div class="clearfix text-center">
                            <label for="checkbox1">Already have an account ? <a href="{{route('login.index')}}" class="custom-color" > Login here </a> </label>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
 
    
    
  @endsection