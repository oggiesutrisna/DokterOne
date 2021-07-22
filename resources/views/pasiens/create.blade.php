@extends('layouts.admin')
@section('title') Create Data Pasien @endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Input Data Pasien :) </h3>
    </div>
    <!-- /.card-header -->
    <form action="{{ route('pasiens.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Nomor Surat</label>
                <input type="text" name="nosurat" class="form-control" placeholder="ex : UC/EX/2012">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Name Of Patient</label>
                        <input type="text" name="nama" class="form-control" placeholder="ex : Rahmat Joget">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Sampling Time</label>
                        <input type="text" name="sampling_time" class="form-control" placeholder="ex : Tanggal ; Waktu">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Date Of Birth</label>
                        <input type="text" name="dob" class="form-control" placeholder="ex : DD - MM - YYYY">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Passport ID Number</label>
                        <input type="text" name="nomor_pid" class="form-control" placeholder="numbers">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option value="#">Choose One</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Result</label>
                        <select class="form-control" name="result">
                            <option value="#">Choose One</option>
                            <option value="Negative">Negative</option>
                            <option value="Positive">Positive</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nationality</label>
                        <input class="form-control" type="text" name="nationality" placeholder="ex : Indo/Rus/India">
                    </div>
                    <div class="form-group">
                        <label>Jenis Pemeriksaan</label>
                        <select class="form-control" name="jenis_pemeriksaan">
                            <option value="#">Choose One</option>
                            <option value="Swab Antigen">Swab Antigen</option>
                            <option value="Polymerase Chain Reaction">Polymerase Chain Reaction</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn bg-gradient-primary">Buat Data Pasien</button>
        </div>
        <!-- input states -->
</div>
</form>
<!-- /.card-body -->
@endsection