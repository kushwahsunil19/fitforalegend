@extends('layouts.master')
@section('content')
<style>.disabled-link {
   pointer-events: none;
   }
</style>
<div class="success"> </div>
<div class="page-content">
   <div class="holder breadcrumbs-wrap mt-0">
      <div class="container">
         <ul class="breadcrumbs">
            <li><a href="{{ route('home.index')}}">Home</a></li>
            <li><a href="{{ route('category.index')}}">Women</a></li>
            <li><span>Leather Pegged Pants</span></li>
         </ul>
      </div>
   </div>
   <div class="holder">
      <h1>test</h1>
   </div>
</div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection