@extends('layouts.admin')
@section('title') Create Data Pasien @endsection
@section('subtitle', 'Add a new patient record and examination result')
@section('content')
<div class="patient-form-card">
    <div class="patient-form-header">
        <div class="patient-form-title">
            <span class="patient-form-icon"><i class="fas fa-user-plus"></i></span>
            <span>Patient Information</span>
        </div>
        <a href="{{ route('pasiens.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <form action="{{ route('pasiens.store') }}" method="POST">
        @csrf
        <div class="patient-form-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-section">
                <div class="form-section-title">
                    <i class="fas fa-id-card text-primary"></i>
                    Identity
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="nosurat">Nomor Surat <span class="text-danger">*</span></label>
                        <input type="text" name="nosurat" id="nosurat" class="form-control @error('nosurat') is-invalid @enderror" placeholder="ex: UC/EX/2012" value="{{ old('nosurat') }}" required>
                        @error('nosurat')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama">Name Of Patient <span class="text-danger">*</span></label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="ex: Rahmat Joget" value="{{ old('nama') }}" required>
                        @error('nama')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="dob">Date Of Birth <span class="text-danger">*</span></label>
                        <input type="date" name="dob" id="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}" required>
                        @error('dob')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nomor_pid">Passport / ID Number <span class="text-danger">*</span></label>
                        <input type="text" name="nomor_pid" id="nomor_pid" class="form-control @error('nomor_pid') is-invalid @enderror" placeholder="Enter passport or ID number" value="{{ old('nomor_pid') }}" required>
                        @error('nomor_pid')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Gender <span class="text-danger">*</span></label>
                        <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="">-- Choose Gender --</option>
                            <option value="Male" {{ old('jenis_kelamin') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('jenis_kelamin') == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('jenis_kelamin')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nationality">Nationality <span class="text-danger">*</span></label>
                        <input type="text" name="nationality" id="nationality" class="form-control @error('nationality') is-invalid @enderror" placeholder="ex: Indonesian, Russian, Indian" value="{{ old('nationality') }}" required>
                        @error('nationality')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="form-section-title">
                    <i class="fas fa-vial text-primary"></i>
                    Examination
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="sampling_time">Sampling Time <span class="text-danger">*</span></label>
                        <input type="datetime-local" name="sampling_time" id="sampling_time" class="form-control @error('sampling_time') is-invalid @enderror" value="{{ old('sampling_time') }}" required>
                        @error('sampling_time')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_pemeriksaan">Jenis Pemeriksaan <span class="text-danger">*</span></label>
                        <select class="form-control @error('jenis_pemeriksaan') is-invalid @enderror" name="jenis_pemeriksaan" id="jenis_pemeriksaan" required>
                            <option value="">-- Choose Type --</option>
                            <option value="Swab Antigen" {{ old('jenis_pemeriksaan') == 'Swab Antigen' ? 'selected' : '' }}>Swab Antigen</option>
                            <option value="PCR" {{ old('jenis_pemeriksaan') == 'PCR' ? 'selected' : '' }}>Polymerase Chain Reaction (PCR)</option>
                        </select>
                        @error('jenis_pemeriksaan')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="result">Result <span class="text-danger">*</span></label>
                        <select class="form-control @error('result') is-invalid @enderror" name="result" id="result" required>
                            <option value="">-- Choose Result --</option>
                            <option value="Negative" {{ old('result') == 'Negative' ? 'selected' : '' }}>Negative</option>
                            <option value="Positive" {{ old('result') == 'Positive' ? 'selected' : '' }}>Positive</option>
                        </select>
                        @error('result')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="patient-form-footer">
            <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Buat Data Pasien
            </button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<style>
    .patient-form-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        max-width: 980px;
    }

    .patient-form-header,
    .patient-form-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid var(--border);
    }

    .patient-form-footer {
        border-top: 1px solid var(--border);
        border-bottom: 0;
        justify-content: flex-end;
        background: var(--bg);
        flex-wrap: wrap;
    }

    .patient-form-title,
    .form-section-title {
        display: flex;
        align-items: center;
        gap: 0.625rem;
        color: var(--dark);
        font-weight: 600;
    }

    .patient-form-icon {
        width: 36px;
        height: 36px;
        border-radius: var(--radius-sm);
        background: var(--primary-light);
        color: var(--primary);
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .patient-form-body {
        padding: 1.25rem;
    }

    .form-section + .form-section {
        margin-top: 1.5rem;
        padding-top: 1.25rem;
        border-top: 1px solid var(--border);
    }

    .form-section-title {
        margin-bottom: 1rem;
        font-size: 0.9375rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 1rem;
    }

    .patient-form-card .form-group {
        margin-bottom: 0;
    }

    .patient-form-card label {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        margin-bottom: 0.5rem;
        color: var(--dark);
        font-size: 0.8125rem;
        font-weight: 600;
    }

    .patient-form-card .form-control {
        width: 100%;
        min-height: 42px;
        padding: 0.625rem 0.75rem;
        border: 1px solid var(--border);
        border-radius: var(--radius-sm);
        background: var(--bg-card);
        color: var(--text);
        font-size: 0.875rem;
        transition: var(--transition);
    }

    .patient-form-card .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-light);
    }

    .patient-form-card .form-control::placeholder {
        color: var(--text-muted);
    }

    .patient-form-card .is-invalid {
        border-color: var(--danger);
    }

    .patient-form-card .invalid-feedback {
        display: block;
        margin-top: 0.375rem;
        color: var(--danger);
        font-size: 0.75rem;
    }

    .patient-form-card .alert {
        align-items: flex-start;
    }

    .patient-form-card .alert ul {
        padding-left: 1rem;
    }

    @media (max-width: 768px) {
        .patient-form-header,
        .patient-form-footer {
            align-items: stretch;
            flex-direction: column;
        }

        .patient-form-header .btn,
        .patient-form-footer .btn,
        .patient-form-footer button {
            width: 100%;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush
