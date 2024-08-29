@extends('admin::layouts.loginMaster')

@section('content')


<style>
.login-page{
    background: url('https://img.freepik.com/free-photo/laptop-near-smartphone-tags-tablet-packet_23-2147961975.jpg?w=740&t=st=1696501876~exp=1696502476~hmac=717ecccbb16930e902be790454365ba891a8fd21e2c3303bf2e8fe295923944f');
    background-size: cover;
    position: relative;
}
.login-page:before{
    content: '';
    background: #00000075;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
.btn-primary {
    color: #fff;
    background-color: #000000 !important;
    border-color: #000000 !important;
    box-shadow: none;
}
</style>


<div class="login-box">
    <div class="login-logo" style="background: #fff; padding-top: 25px; position: relative; margin-bottom: 0;">
        <a href="{{url('admin')}}"> <img style="width: 100%; max-width: 220px; margin-bottom: 0;" src="https://cloudwapptechnologies.com/TM/Fitforalegend/images/skins/fashion/logo5.png" />  </a>
    </div>

    <div class="card" style="box-shadow: none">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session
                <br>
                @if(session()->has('fails'))
                <span class="text text-danger">{{ session()->get('fails') }}</span>
                @endif
            </p>
            <form action="{{ route('authenticate') }}" method="post">
              @csrf
              @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif

              <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" autocomplete="email" autofocus>

                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>

            </div>            


            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="current-password">

                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
          

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>

            </div>
        </form>
    </div>

</div>
</div>
@endsection
