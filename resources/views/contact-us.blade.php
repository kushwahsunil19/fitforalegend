@extends('layouts.master')
@section('content')
<style>

body{
    background-color: #f1f3f6;
}


.contain {
  background-color: #fff;
  max-width: 1170px;
  padding: 1em;
    border-radius: 2px;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);
    margin:50px auto;
}

div.form {
  background-color: #fff;
}
.reset-btn {
  float: right;
}

.form-headline:after {
  content: "";
  display: block;
  width: 10%;
  padding-top: 10px;
  border-bottom: 3px solid #ec1c24;
}

.highlight-text {
  color: #212d31;
}

.hightlight-contact-info {
  font-weight: 400;
  font-size: 20px;
  /*line-height: 1.5;*/
}

.highlight-text-grey {
  font-weight: 500;
}

.email-info {
    margin-top: 20px;
}

.required-input {
  color: black;
}
@media (min-width: 600px) {
  .contain {
    padding: 0;
  }
}

h3,
ul {
  margin: 0;
}

h3 {
  margin-bottom: 1rem;
}

.form-input:focus,
textarea:focus{
  outline: 1.5px solid #ec1c24;
}

.form-input,
textarea {
  width: 100%;
  border: 1px solid #bdbdbd;
  border-radius: 5px;
}

.wrapper2 > * {
  padding: 1em;
}
@media (min-width: 700px) {
  .wrapper2 {
    display: grid;
    grid-template-columns: 2fr 1fr;
  }
  .wrapper2 > * {
    padding: 2em 2em;
  }
}

ul {
  list-style: none;
  padding: 0;
}

.contacts {
  color: #212d31;
}


form label {
  display: block;
}
form p {
  margin: 0;
}

.full-width {
  grid-column: 1 / 3;
}

.form-input,
textarea {
  padding: 1em;
}

button {
  background: transparent;
  border: 1px solid #ec1c24;
  color: #ec1c24;
  border-radius: 15px;
  padding: 5px 20px;
  text-transform: uppercase;
}
button:hover, .submit-btn:hover,
button:focus , .submit-btn:focus{
  background: #17c6aa;
  outline: 0;
  color: #fff;
}
.error {
  color: #ec1c24;
}
.term-heading {
    font-size: 25px;
    font-weight: 600;
     margin-bottom:20px !important;
}
 input:focus, input[type]:focus, input:focus, input[type]:focus{
    border-width: 1px;
    border-style: solid;
    border-color:  #bdbdbd !important;
    outline: 0 none;
    box-shadow: none !important;
 }
 .form-label{
         color: #000;
    font-weight: 500;
    font-size: 16px;
    margin-bottom: 5px;
 }
 .form-control{
     
     border:1px solid #bdbdbd !important;
 }
 
.location {
    display: block;
    font-size: 21px;
    font-weight: 500;
    margin-bottom: 10px;
}

textarea.form-control {
    height: auto;
    background: transparent !important;
    resize:none;
}
li {
    font-size: 16px;
}
i {
    font-size: 22px;
}

</style>
<div class="success"> </div>
<div class="container">
<div class="contain">

  <div class="wrapper2">

    <div class="form">
         <h2 class="term-heading mb-3">Contact Us </h2>
      
      <!--<h2 class="form-headline">Send us a message</h2>-->
                  @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
      <form id="submit-form" action="{{route('contact-us.store')}}" method="post">
          @csrf
           <div class="row">
        <div class="col-md-9 mb-3">
            <label class="form-label">Your Name</label>
          <input id="name" class="form-input" type="text"  name="name" placeholder="Enter Your Name">
          
        </div>
        <div class="col-md-9 mb-3">
            <label class="form-label">Your Email</label>
          <input id="email" class="form-input" type="email" name="email" placeholder="Your Email" required>
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="col-md-9 mb-3">
            <label class="form-label">Phone </label>
          <input id="phone" class="form-input" type="text" name="phone" placeholder="Enter Number" required>
          @if ($errors->has('phone'))
            <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
          
        </div>
        <div class="col-md-9 mb-3">
            <label class="form-label">Subject </label>
          <input id="suject" class="form-input" type="text" name="subject" placeholder="Your Subject" required>
           @if ($errors->has('subject'))
            <span class="text-danger">{{ $errors->first('subject') }}</span>
            @endif
        </div>
        
        <div class="col-md-18 mb-3">
            <label class="form-label">Massage </label>
         <textarea class="form-control" id="your-message" name="message" rows="5" ></textarea>
        </div>
        <div class="col-md-9">
          <input type="submit" class="submit-btn btn btn-primary w-100" value="Submit">
        </div>
         </div>
      </form>
     
    </div>

    <div class="contacts contact-wrapper2">

      <ul>
         <!-- <li><span class="location">Our Location</span><i class="fa-solid fa-location-dot"></i> Jl. Maleer Indah II, Maleer, Batununggal, Kota Bandung, Jawa Barat 40274</li>-->
          <li class="email-info"> <span class="location">Email </span> <i class="fa fa-envelope" aria-hidden="true"></i> Fitforalegend@gmail.com</li>
          <!--<li class="email-info"><span class="location">Phone </span><i class="fa fa-phone" aria-hidden="true"></i> <span class="highlight-text">+91 11 1111 2900</span></li>-->
        </span>
      </ul>
    </div>
  </div>
</div>
</div>


@endsection