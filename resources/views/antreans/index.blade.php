@extends('layouts.admin')
@section('title', 'Data Antrean')
@section('subtitle', 'Manage patient queue')

@section('content')
<div class="table-card">
  <div class="table-header">
    <div class="table-title">
      <i class="fas fa-clipboard-list text-primary"></i>
      Queue Records
    </div>
    <a href="{{ route('antreans.create') }}" class="btn btn-primary btn-sm">
      <i class="fas fa-plus"></i> Add Queue
    </a>
  </div>
  <div class="table-body">
    <table id="dataTable" class="display" style="width:100%">
      <thead>
        <tr>
          <th>Queue #</th>
          <th>Patient</th>
          <th>Created</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($antreans as $antrean)
        <tr>
          <td>
            <span style="
              display: inline-flex;
              align-items: center;
              justify-content: center;
              width: 40px;
              height: 40px;
              background: linear-gradient(135deg, var(--warning), #d97706);
              color: white;
              font-weight: 700;
              border-radius: var(--radius-sm);
            ">{{ $antrean->id }}</span>
          </td>
          <td>
            <div class="avatar">
              <div class="avatar-img" style="background: linear-gradient(135deg, var(--primary), var(--primary-hover));">
                {{ strtoupper(substr($antrean->pasien->nama ?? 'N', 0, 1)) }}
              </div>
              <div class="avatar-info">
                <div class="avatar-name">{{ $antrean->pasien->nama ?? 'N/A' }}</div>
                <div class="avatar-sub">{{ $antrean->pasien->nomor_pid ?? '-' }}</div>
              </div>
            </div>
          </td>
          <td>
            <div class="font-medium">{{ $antrean->created_at->format('d M Y') }}</div>
            <div class="text-muted" style="font-size: 0.75rem;">{{ $antrean->created_at->format('H:i') }}</div>
          </td>
          <td>
            <div class="action-btns">
              <form action="{{ route('antreans.destroy', $antrean) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this queue?')">
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
              <div class="empty-state-icon"><i class="fas fa-clipboard-list"></i></div>
              <div class="empty-state-title">No queue records yet</div>
              <div class="empty-state-text">Add your first queue entry</div>
              <a href="{{ route('antreans.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Queue
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