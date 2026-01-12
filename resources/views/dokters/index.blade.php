@extends('layouts.admin')
@section('title') Data Dokter @endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Dokter List</h3>
            <div class="card-tools">
                <a href="{{ route('dokters.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-1"></i> Add New Dokter
                </a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dokters as $dokter)
                        <tr>
                            <td>{{ $dokter->id }}</td>
                            <td>{{ $dokter->nama }}</td>
                            <td>{{ $dokter->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <a href="{{ route('dokters.edit', $dokter) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('dokters.destroy', $dokter) }}" method="POST" class="d-inline"
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
            {{ $dokters->links() }}
        </div>
    </div>
@endsection