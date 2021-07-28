@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
          <h5 class="m-0">Logged in as : {{Auth::user()->name}}</h5>
        </div>
        <div class="card-body">
          <h6 class="card-title">You Just Logged in</h6>

          <img src="{{asset('assets/img/undraw_Shared_workspace_re_3gsu.svg')}}">
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
          <!-- /.card -->
    </div>
@endsection
