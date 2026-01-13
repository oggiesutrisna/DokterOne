@extends('layouts.admin')
@section('title', 'Data Absensi')
@section('subtitle', 'Manage attendance records')

@section('content')
<div class="table-card">
  <div class="table-header">
    <div class="table-title">
      <i class="fas fa-calendar-check text-primary"></i>
      Attendance Records
    </div>
    <a href="{{ route('absensis.create') }}" class="btn btn-primary btn-sm">
      <i class="fas fa-plus"></i> Add Record
    </a>
  </div>
  <div class="table-body">
    <table id="dataTable" class="display" style="width:100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>User</th>
          <th>Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($absensis as $absensi)
        <tr>
          <td><span class="font-semibold">#{{ $absensi->id }}</span></td>
          <td>
            <div class="avatar">
              <div class="avatar-img" style="background: linear-gradient(135deg, var(--info), #1d4ed8);">
                {{ strtoupper(substr($absensi->user->name ?? 'N', 0, 1)) }}
              </div>
              <div class="avatar-info">
                <div class="avatar-name">{{ $absensi->user->name ?? 'N/A' }}</div>
              </div>
            </div>
          </td>
          <td class="text-muted">{{ \Carbon\Carbon::parse($absensi->tanggal)->format('d M Y') }}</td>
          <td>
            @php
              $status = strtolower($absensi->status);
              $badgeClass = match($status) {
                'hadir' => 'success',
                'sakit' => 'warning',
                'izin' => 'info',
                default => 'danger'
              };
            @endphp
            <span class="badge badge-{{ $badgeClass }}">
              {{ ucfirst($absensi->status) }}
            </span>
          </td>
          <td>
            <div class="action-btns">
              <form action="{{ route('absensis.destroy', $absensi) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this record?')">
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
          <td colspan="5">
            <div class="empty-state">
              <div class="empty-state-icon"><i class="fas fa-calendar-check"></i></div>
              <div class="empty-state-title">No attendance records yet</div>
              <div class="empty-state-text">Add your first attendance record</div>
              <a href="{{ route('absensis.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Record
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
    order: [[2, 'desc']],
    columnDefs: [{ orderable: false, targets: -1 }]
  });
});
</script>
@endpush