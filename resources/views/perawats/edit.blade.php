@extends('layouts.admin')
@section('title') Edit Perawat @endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Perawat</h3>
        </div>
        <form action="{{ route('perawats.update', $perawat) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        value="{{ old('nama', $perawat->nama) }}">
                    @error('nama') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('perawats.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@endsection