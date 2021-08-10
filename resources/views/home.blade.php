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
    <p>Report bug di <a href="https://api.whatsapp.com/send?phone=087846048999"> sini </a> dan di <a href="https://twitter.com/@oggiesutrisna"> sini </a></p>
  </div>
</div>
</div>
@endsection
