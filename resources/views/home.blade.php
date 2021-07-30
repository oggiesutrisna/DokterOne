@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <img src="{{asset('assets/img/undraw_Shared_workspace_re_3gsu.svg')}}"> <br />
  </div> <br />
  <div class="card">
  <div class="card-header">
    <h5>Selamat Datang, Kamu Login Sebagai : <b>{{Auth::user()->name}}</b></h5>
  </div>
  <div class="card-body">
    <p> Selamat Datang di aplikasi ini </p>
  </div>
</div>
</div>
@endsection
