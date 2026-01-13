@extends('layouts.admin')
@section('title', 'Data Pasien')
@section('subtitle', 'Manage all patient records')

@section('content')
<!-- Stats -->
<div class="stats-grid">
  <div class="stat-card">
    <div class="stat-icon orange">
      <i class="fas fa-users"></i>
    </div>
    <div class="stat-content">
      <div class="stat-value">{{ $count = DB::table('pasiens')->count() }}</div>
      <div class="stat-label">Total Pasien</div>
    </div>
  </div>
  <div class="stat-card">
    <div class="stat-icon green">
      <i class="fas fa-check-circle"></i>
    </div>
    <div class="stat-content">
      <div class="stat-value">{{ DB::table('pasiens')->where('result', 'negative')->count() }}</div>
      <div class="stat-label">Negatif</div>
    </div>
  </div>
  <div class="stat-card">
    <div class="stat-icon red">
      <i class="fas fa-exclamation-circle"></i>
    </div>
    <div class="stat-content">
      <div class="stat-value">{{ DB::table('pasiens')->where('result', 'positive')->count() }}</div>
      <div class="stat-label">Positif</div>
    </div>
  </div>
  <div class="stat-card">
    <div class="stat-icon blue">
      <i class="fas fa-user-shield"></i>
    </div>
    <div class="stat-content">
      <div class="stat-value">{{ DB::table('users')->count() }}</div>
      <div class="stat-label">Admin</div>
    </div>
  </div>
</div>

@include('partials.flash-message')

@if($count >= 4)
<div class="alert alert-warning">
  <i class="fas fa-crown"></i>
  <div style="flex: 1;">
    <strong>Upgrade Required</strong> - You've reached the free limit of 4 patients.
  </div>
  <a href="{{ route('price') }}" class="btn btn-primary btn-sm">Upgrade</a>
</div>
@endif

<!-- Table -->
<div class="table-card">
  <div class="table-header">
    <div class="table-title">
      <i class="fas fa-list text-primary"></i>
      Patient Records
    </div>
    <a href="{{ route('pasiens.create') }}" class="btn btn-primary btn-sm {{ $count >= 4 ? 'disabled' : '' }}">
      <i class="fas fa-plus"></i> Add Patient
    </a>
  </div>
  <div class="table-body">
    <table id="dataTable" class="display" style="width:100%">
      <thead>
        <tr>
          <th>No. Surat</th>
          <th>Nama</th>
          <th>Sampling</th>
          <th>DOB</th>
          <th>ID/Passport</th>
          <th>Gender</th>
          <th>Nationality</th>
          <th>Pemeriksaan</th>
          <th>Result</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($pasiens as $pasien)
        <tr>
          <td><span class="font-semibold">{{ $pasien->nosurat }}</span></td>
          <td>
            <div class="avatar">
              <div class="avatar-img" style="background: linear-gradient(135deg, var(--primary), var(--primary-hover));">
                {{ strtoupper(substr($pasien->nama, 0, 1)) }}
              </div>
              <div class="avatar-info">
                <div class="avatar-name">{{ $pasien->nama }}</div>
              </div>
            </div>
          </td>
          <td class="text-muted">{{ $pasien->sampling_time }}</td>
          <td class="text-muted">{{ $pasien->dob }}</td>
          <td>{{ $pasien->nomor_pid }}</td>
          <td>{{ $pasien->jenis_kelamin }}</td>
          <td>{{ $pasien->nationality }}</td>
          <td>{{ $pasien->jenis_pemeriksaan }}</td>
          <td>
            <span class="badge badge-{{ strtolower($pasien->result) === 'positive' ? 'danger' : 'success' }}">
              <i class="fas fa-{{ strtolower($pasien->result) === 'positive' ? 'plus' : 'minus' }}-circle"></i>
              {{ $pasien->result }}
            </span>
          </td>
          <td>
            <div class="action-btns">
              <a href="{{ route('pasiens.show', $pasien) }}" class="action-btn action-btn-view" title="View">
                <i class="fas fa-eye"></i>
              </a>
              <a href="{{ route('pasiens.edit', $pasien) }}" class="action-btn action-btn-edit" title="Edit">
                <i class="fas fa-edit"></i>
              </a>
              <a href="{{ route('previewPDF', $pasien) }}" class="action-btn action-btn-pdf" target="_blank" title="PDF">
                <i class="fas fa-file-pdf"></i>
              </a>
              <a href="{{ route('createPDF', $pasien) }}" class="action-btn action-btn-download" title="Download">
                <i class="fas fa-download"></i>
              </a>
              <form action="{{ route('pasiens.destroy', $pasien) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this patient?')">
                @csrf @method('DELETE')
                <button type="submit" class="action-btn action-btn-delete" title="Delete">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="10">
            <div class="empty-state">
              <div class="empty-state-icon"><i class="fas fa-users"></i></div>
              <div class="empty-state-title">No patients yet</div>
              <div class="empty-state-text">Add your first patient to get started</div>
              <a href="{{ route('pasiens.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Patient
              </a>
            </div>
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
  $('#dataTable').DataTable({
    responsive: true,
    columnDefs: [{ orderable: false, targets: -1 }]
  });
});
</script>
@endpush