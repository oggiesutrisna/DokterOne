@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Message from developer : </h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    Dear : <strong>{{Auth::user()->name}}</strong> . <strong>you just logged in. </strong><br>
                    <hr>
                    please report when you found an error in this app. <br>
                    we're gonna fix it immediately. <br>
                    <hr>
                        regards. <br>
                    Oggie Sutrisna.
                </div>
                <!-- /.card-body -->
              </div>
        </div>
          <!-- /.card -->
    </div>
@endsection
