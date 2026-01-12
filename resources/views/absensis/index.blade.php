@extends('layouts.admin')
@section('title') Data Absensi @endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Absensi List</h3>
            <div class="card-tools">
                <a href="{{ route('absensis.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-1"></i> Add Noted Absensi
                </a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($absensis as $absensi)
                        <tr>
                            <td>{{ $absensi->id }}</td>
                            <td>{{ $absensi->user->name ?? 'N/A' }}</td>
                            <td>{{ $absensi->tanggal }}</td>
                            <td>
                                <span
                                    class="badge badge-{{ $absensi->status == 'hadir' ? 'success' : ($absensi->status == 'sakit' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($absensi->status) }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('absensis.destroy', $absensi) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $absensis->links() }}
        </div>
    </div>
@endsection