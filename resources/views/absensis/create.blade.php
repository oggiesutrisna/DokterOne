@extends('layouts.admin')
@section('title') Create Absensi @endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Absensi</h3>
        </div>
        <form action="{{ route('absensis.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id">
                        <option value="">Select User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                        id="tanggal" value="{{ old('tanggal') }}">
                    @error('tanggal') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                        <option value="alpa">Alpa</option>
                    </select>
                    @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('absensis.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@endsection