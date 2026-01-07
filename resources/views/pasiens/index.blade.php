@extends('layouts.admin')
@section('title') Index Data Pasien @endsection
@section('content')

  <div class="row">
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>
        `
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
  @include('partials.flash-message')

  @if($count >= 4)
  <div class="row">
    <div class="col-12">
      <div class="card bg-gradient-warning">
        <div class="card-header border-0">
          <h3 class="card-title">
            <i class="fas fa-crown mr-1"></i>
            Upgrade to Full Version
          </h3>
        </div>
        <div class="card-body">
          You have reached the free limit of <strong>4 patients</strong>. To continue adding more patients and unlock all features, please upgrade to one of our premium packages.
        </div>
        <div class="card-footer border-0">
          <a href="{{ route('price') }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa-shopping-cart mr-1"></i> View Pricing & Upgrade
          </a>
        </div>
      </div>
    </div>
  </div>
  @endif
    <div class="card-header">
      <h3 class="card-title">Data Pasien List</h3>
      <div class="card-tools d-flex">
        <a href="{{ route('pasiens.create') }}" class="btn btn-primary btn-sm mr-2 {{ $count >= 4 ? 'disabled' : '' }}">
          <i class="fas fa-plus mr-1"></i> Create New Patient
        </a>
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Cari" name="search"
            value="search">

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
                  {{ QrCode::size(100)->generate(route('pasiens.show', $pasien)) }}
                </div>
              </td>
              <form action="{{ route('pasiens.destroy', $pasien)}}" method="POST" id="form">
                @csrf
                @method('DELETE')
                <td>
                  <div class="btn-group-vertical">
                    <a href="{{ route('pasiens.show', $pasien) }}" type="button" class="btn btn-primary" title="View Details">
                      <i class="fas fa-search"></i>
                    </a>
                    <a href="{{ route('pasiens.edit', $pasien) }}" type="button" class="btn btn-warning" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('previewPDF', $pasien) }}" type="button" class="btn btn-info" target="_blank" title="Preview PDF">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('createPDF', $pasien) }}" type="button" class="btn btn-success" title="Download PDF">
                      <i class="fas fa-download"></i>
                    </a>
                    <button type="submit" class="btn btn-danger delete-button" title="Delete">
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