@extends('layouts.admin')
@section('title') Edit Data Pasien @endsection
@section('content')
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit Data Pasien</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('pasiens.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="nosurat">Nomor Surat <span class="text-danger">*</span></label>
                    <input type="text" name="nosurat" id="nosurat"
                        class="form-control @error('nosurat') is-invalid @enderror" placeholder="ex: UC/EX/2012"
                        value="{{ old('nosurat', $pasien->nosurat) }}" required>
                    @error('nosurat')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nama">Name Of Patient <span class="text-danger">*</span></label>
                            <input type="text" name="nama" id="nama"
                                class="form-control @error('nama') is-invalid @enderror" placeholder="ex: Rahmat Joget"
                                value="{{ old('nama', $pasien->nama) }}" required>
                            @error('nama')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="sampling_time">Sampling Time <span class="text-danger">*</span></label>
                            <input type="datetime-local" name="sampling_time" id="sampling_time"
                                class="form-control @error('sampling_time') is-invalid @enderror"
                                value="{{ old('sampling_time', $pasien->sampling_time) }}" required>
                            @error('sampling_time')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="dob">Date Of Birth <span class="text-danger">*</span></label>
                            <input type="date" name="dob" id="dob" class="form-control @error('dob') is-invalid @enderror"
                                value="{{ old('dob', $pasien->dob) }}" required>
                            @error('dob')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nomor_pid">Passport / ID Number <span class="text-danger">*</span></label>
                            <input type="text" name="nomor_pid" id="nomor_pid"
                                class="form-control @error('nomor_pid') is-invalid @enderror"
                                placeholder="Enter passport or ID number" value="{{ old('nomor_pid', $pasien->nomor_pid) }}"
                                required>
                            @error('nomor_pid')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="jenis_kelamin">Gender <span class="text-danger">*</span></label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                                id="jenis_kelamin" required>
                                <option value="">-- Choose Gender --</option>
                                <option value="Male" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="nationality">Nationality <span class="text-danger">*</span></label>
                            <input type="text" name="nationality" id="nationality"
                                class="form-control @error('nationality') is-invalid @enderror"
                                placeholder="ex: Indonesian, Russian, Indian"
                                value="{{ old('nationality', $pasien->nationality) }}" required>
                            @error('nationality')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="jenis_pemeriksaan">Jenis Pemeriksaan <span class="text-danger">*</span></label>
                            <select class="form-control @error('jenis_pemeriksaan') is-invalid @enderror"
                                name="jenis_pemeriksaan" id="jenis_pemeriksaan" required>
                                <option value="">-- Choose Type --</option>
                                <option value="Swab Antigen" {{ old('jenis_pemeriksaan', $pasien->jenis_pemeriksaan) == 'Swab Antigen' ? 'selected' : '' }}>Swab Antigen</option>
                                <option value="PCR" {{ old('jenis_pemeriksaan', $pasien->jenis_pemeriksaan) == 'PCR' ? 'selected' : '' }}>Polymerase Chain Reaction (PCR)</option>
                            </select>
                            @error('jenis_pemeriksaan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="result">Result <span class="text-danger">*</span></label>
                            <select class="form-control @error('result') is-invalid @enderror" name="result" id="result"
                                required>
                                <option value="">-- Choose Result --</option>
                                <option value="Negative" {{ old('result', $pasien->result) == 'Negative' ? 'selected' : '' }}>
                                    Negative</option>
                                <option value="Positive" {{ old('result', $pasien->result) == 'Positive' ? 'selected' : '' }}>
                                    Positive</option>
                            </select>
                            @error('result')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save mr-1"></i> Update Data Pasien
                </button>
            </div>
        </form>
    </div>
@endsection