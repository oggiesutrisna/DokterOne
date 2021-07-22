@extends('layouts.admin')
@section('title') Index Data Pasien @endsection
@section('content')

<div class="row">
  <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Pasien</span>
        <span class="info-box-number">{{ $count = DB::table('pasiens')->count()}}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-success"><i class="fas fa-user-minus"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Negatif</span>
        <span class="info-box-number">{{ $count1 = DB::table('pasiens')->where('result', 'negative')->count() }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-danger"><i class="fas fa-user-plus"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Positif</span>
        <span class="info-box-number">{{ $count2 = DB::table('pasiens')->where('result', 'positive')->count()}}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
      <span class="info-box-icon bg-primary"><i class="far fa-star"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Admin</span>
        <span class="info-box-number">{{ $count3 = DB::table('users')->count() }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<div class="card">
  <div class="card-header">
    Total Data Pasien : {{ $count = DB::table('pasiens')->count(); }}
    <div class="card-tools">
      <div class="input-group input-group-sm" style="width: 150px;">
        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

        <div class="input-group-append">
          <button type="submit" class="btn btn-default">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- /.card-header -->
  <div class="card-body table-responsive p-0" style="height: 400px; font-size: 14px;">
    <table class="table table-head-fixed text-wrap">
      <thead>
        <tr>
          {{-- <th style="width: 10px">No.</th> --}}
          <th>Nomor Surat</th>
          <th>Name Of Patient</th>
          <th>Sampling Time</th>
          <th>Date Of Birth</th>
          <th>Passport Id Number</th>
          <th>Gender</th>
          <th>Nationality</th>
          <th>Jenis Pemeriksaan</th>
          <th>Result</th>
          <th style="width: 50px; text: no-wrap;">Qr Code</th>
          <th style="width: 10px">Actions</th>
        </tr>
      </thead>
      @foreach($pasiens as $pasien)
      <tbody>
        <tr>
          {{-- <td>{{ $pasien->id }}</td> --}}
          <td>{{ $pasien->nosurat }}</td>
          <td>{{ $pasien->nama }}</td>
          <td>{{ $pasien->sampling_time }}</td>
          <td>{{ $pasien->dob }}</td>
          <td>{{ $pasien->nomor_pid }}</td>
          <td>{{ $pasien->jenis_kelamin }}</td>
          <td>{{ $pasien->nationality }}</td>
          <td>{{ $pasien->jenis_pemeriksaan }}</td>
          <td>
            <span class="badge badge-{{ $pasien->result === 'Positive' ? 'danger' : 'success' }} px-3 py-3"
              data-toggle="tooltip" data-placement="top" title="{{ $pasien->result }}">
              <i class="fas {{ $pasien->result === 'Positive' ? 'fa-plus-circle' : 'fa-minus-circle' }}"></i>
            </span>
          </td>
          <td>
            <div class="card px-3 py-3">
              {{ QrCode::size(100)->generate(route('pasiens.show', $pasien->id)) }}
            </div>
          </td>
          <form action="{{ route('pasiens.destroy', $pasien->id )}}" method="POST" id="form">
            @csrf
            @method('DELETE')
            <td>
              <div class="btn-group">
                <a href="{{ route('pasiens.show', $pasien->id) }}" type="button" class="btn btn-primary">
                  <i class="fas fa-search"></i>
                </a>
                <a href="{{ route('pasiens.edit', $pasien->id) }}" type="button" class="btn btn-warning">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="{{route('createPDF', $pasien->id)}}" type="button" class="btn btn-success">
                  <i class="fas fa-print"></i>
                </a>
                <button type="submit" class="btn btn-danger delete-button">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
        </tr>
        </form>
      </tbody>
      @endforeach
    </table>
  </div>
  <!-- /.card-body -->
</div>

@endsection