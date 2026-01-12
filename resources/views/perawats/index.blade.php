@extends('layouts.admin')
@section('title') Data Perawat @endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Perawat List</h3>
            <div class="card-tools">
                <a href="{{ route('perawats.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus mr-1"></i> Add New Perawat
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
                    @foreach($perawats as $perawat)
                        <tr>
                            <td>{{ $perawat->id }}</td>
                            <td>{{ $perawat->nama }}</td>
                            <td>{{ $perawat->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <a href="{{ route('perawats.edit', $perawat) }}" class="btn btn-warning btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('perawats.destroy', $perawat) }}" method="POST" class="d-inline"
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
            {{ $perawats->links() }}
        </div>
    </div>
@endsection