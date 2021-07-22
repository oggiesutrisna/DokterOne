@extends('layouts.admin')
@section('title') Edit Data Pasien @endsection
@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Edit Your Data </h3>
    </div>
    <!-- /.card-header -->
    <form action="{{ route('pasiens.update', $pasien->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>Nomor Surat</label>
                <input type="text" name="nosurat" value="{{$pasien->nosurat}}" class="form-control"
                    placeholder="ex : UC/EX/2012">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Name Of Patient</label>
                        <input type="text" name="nama" value="{{$pasien->nama}}" class="form-control"
                            placeholder="ex : Rahmat Joget">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Sampling Time</label>
                        <input type="text" name="sampling_time" value="{{$pasien->sampling_time}}" class="form-control"
                            placeholder="ex : Tanggal ; Waktu">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Date Of Birth</label>
                        <input type="text" name="dob" value="{{$pasien->dob}}" class="form-control"
                            placeholder="ex : DD - MM - YYYY">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Passport ID Number</label>
                        <input type="text" name="nomor_pid" value="{{$pasien->nomor_pid}}" class="form-control"
                            placeholder="numbers">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option name="Laki-Laki">Laki-Laki</option>
                            <option name="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Result</label>
                        <input type="text" class="form-control" value="{{ $pasien->result }}" name="result"
                            placeholder="NEGATIVITY / POSITIVITY">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nationality</label>
                        <input class="form-control" type="text" value="{{ $pasien->nationality }}" name="nationality"
                            placeholder="ex : Indo/Rus/India">
                    </div>
                    <div class="form-group">
                        <label>Jenis Pemeriksaan</label>
                        <select class="form-control" name="jenis_pemeriksaan">
                            <option name="Swab-Antigen-Test">Swab Antigen</option>
                            <option name="PCR-Test">Polymerase Chain Reaction</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn bg-gradient-primary">Edit Data Pasien</button>
        </div>
        <!-- input states -->
</div>
</form>
<!-- /.card-body -->
@endsection