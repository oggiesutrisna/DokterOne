@extends('layouts.admin')
@section('title') Create Perawat @endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Perawat</h3>
        </div>
        <form action="{{ route('perawats.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        placeholder="Enter name" value="{{ old('nama') }}">
                    @error('nama') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('perawats.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@endsection