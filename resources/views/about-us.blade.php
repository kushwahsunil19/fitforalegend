@extends('layouts.master')
@section('content')
<style>

body{
    color:#424553 !important;
}
.card2 {
    height: 100%;
    border-radius: 2px;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.08);
}
.term-heading {
    font-size: 25px;
    font-weight: 600;
     margin-bottom:10px !important;
}
.term-pera{
    font-size: 15px;
    /*letter-spacing: 0.3px;*/
    margin-bottom:5px !important;
        color: #404040;
}

</style>
<div class="success"> </div>
<div class="page-content page-content2">
   <div class="holder">
      <div class="container">
          <div class="row">
              <div class="col-md-18 mt-5">
              <div class="card card2 p-3">
         <p class="term-heading">{{$row->title}}</p>
            <div> {!! $row->description !!}</div> 
         
         </div>
         </div>
         </div>
         </div>
   </div>
</div>
</div>


@endsection