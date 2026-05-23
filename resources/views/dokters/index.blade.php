@extends('layouts.admin')
@section('title', 'Data Dokter')
@section('subtitle', 'Manage all doctor records')

@section('content')
<div class="table-card">
  <div class="table-header">
    <div class="table-title">
      <i class="fas fa-user-md text-primary"></i>
      Doctor Records
    </div>
    <a href="{{ route('dokters.create') }}" class="btn btn-primary btn-sm">
      <i class="fas fa-plus"></i> Add Doctor
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
        @foreach($dokters as $dokter)
        <tr>
          <td><span class="font-semibold">#{{ $dokter->id }}</span></td>
          <td>
            <div class="avatar">
              <div class="avatar-img" style="background: linear-gradient(135deg, var(--secondary), #1a4a4d);">
                {{ strtoupper(substr($dokter->nama, 0, 1)) }}
              </div>
              <div class="avatar-info">
                <div class="avatar-name">{{ $dokter->nama }}</div>
                <div class="avatar-sub">Doctor</div>
              </div>
            </div>
          </td>
          <td class="text-muted">{{ $dokter->created_at->format('d M Y, H:i') }}</td>
          <td>
            <div class="action-btns">
              <a href="{{ route('dokters.edit', $dokter) }}" class="action-btn action-btn-edit" title="Edit">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{ route('dokters.destroy', $dokter) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this doctor?')">
                @csrf @method('DELETE')
                <button type="submit" class="action-btn action-btn-delete" title="Delete">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
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
    language: {
      emptyTable: 'No doctors yet'
    },
    columnDefs: [{ orderable: false, targets: -1 }]
  });
});
</script>
@endpush
