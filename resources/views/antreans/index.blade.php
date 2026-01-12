@extends('layouts.admin')
@section('title') Data Antrean @endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Antrean List</h3>
            <div class="card-tools">
                <a href="{{ route('antreans.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-1"></i> Add Antrean
                </a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pasien</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($antreans as $antrean)
                        <tr>
                            <td>{{ $antrean->id }}</td>
                            <td>{{ $antrean->pasien->nama ?? 'N/A' }}</td>
                            <td>{{ $antrean->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <form action="{{ route('antreans.destroy', $antrean) }}" method="POST" class="d-inline"
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
            {{ $antreans->links() }}
        </div>
    </div>
@endsection