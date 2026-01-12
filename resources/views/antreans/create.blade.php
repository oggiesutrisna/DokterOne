@extends('layouts.admin')
@section('title') Create Antrean @endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Antrean</h3>
        </div>
        <form action="{{ route('antreans.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="pasien_id">Pasien</label>
                    <select name="pasien_id" class="form-control @error('pasien_id') is-invalid @enderror" id="pasien_id">
                        <option value="">Select Pasien</option>
                        @foreach($pasiens as $pasien)
                            <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                        @endforeach
                    </select>
                    @error('pasien_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('antreans.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@endsection