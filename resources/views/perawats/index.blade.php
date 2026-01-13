@extends('layouts.admin')
@section('title', 'Data Perawat')
@section('subtitle', 'Manage all nurse records')

@section('content')
<div class="table-card">
  <div class="table-header">
    <div class="table-title">
      <i class="fas fa-user-nurse text-primary"></i>
      Nurse Records
    </div>
    <a href="{{ route('perawats.create') }}" class="btn btn-primary btn-sm">
      <i class="fas fa-plus"></i> Add Nurse
    </a>
  </div>
  <div class="table-body">
    <table id="dataTable" class="display" style="width:100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Created</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($perawats as $perawat)
        <tr>
          <td><span class="font-semibold">#{{ $perawat->id }}</span></td>
          <td>
            <div class="avatar">
              <div class="avatar-img" style="background: linear-gradient(135deg, #c2185b, #ad1457);">
                {{ strtoupper(substr($perawat->nama, 0, 1)) }}
              </div>
              <div class="avatar-info">
                <div class="avatar-name">{{ $perawat->nama }}</div>
                <div class="avatar-sub">Nurse</div>
              </div>
            </div>
          </td>
          <td class="text-muted">{{ $perawat->created_at->format('d M Y, H:i') }}</td>
          <td>
            <div class="action-btns">
              <a href="{{ route('perawats.edit', $perawat) }}" class="action-btn action-btn-edit" title="Edit">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{ route('perawats.destroy', $perawat) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this nurse?')">
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
          <td colspan="4">
            <div class="empty-state">
              <div class="empty-state-icon"><i class="fas fa-user-nurse"></i></div>
              <div class="empty-state-title">No nurses yet</div>
              <div class="empty-state-text">Add your first nurse to get started</div>
              <a href="{{ route('perawats.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Nurse
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