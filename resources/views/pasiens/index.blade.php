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
                <div class="stat-value" id="total-pasien-count">{{ DB::table('pasiens')->count() }}</div>
                <div class="stat-label">Total Pasien</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon green">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value"
                     id="negatif-count">{{ DB::table('pasiens')->whereIn('result', ['Negative', 'negative'])->count() }}</div>
                <div class="stat-label">Negatif</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon red">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value"
                     id="positif-count">{{ DB::table('pasiens')->whereIn('result', ['Positive', 'positive'])->count() }}</div>
                <div class="stat-label">Positif</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon blue">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value" id="admin-count">{{ DB::table('users')->count() }}</div>
                <div class="stat-label">Admin</div>
            </div>
        </div>
    </div>

    @include('partials.flash-message')

    <!-- Table -->
    <div class="table-card">
        <div class="table-header">
            <div class="table-title">
                <i class="fas fa-list text-primary"></i>
                Patient Records
            </div>
            <a href="{{ route('pasiens.create') }}" class="btn btn-primary btn-sm">
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
                    <th>QR Code</th>
                    <th>Nationality</th>
                    <th>Pemeriksaan</th>
                    <th>Result</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pasiens as $pasien)
                    <tr>
                        <td><span class="font-semibold">{{ $pasien->nosurat }}</span></td>
                        <td>
                            <div class="avatar">
                                <div class="avatar-img"
                                     style="background: linear-gradient(135deg, var(--primary), var(--primary-hover));">
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
                        <td>
                            <div style="display: inline-block; background: #fff; padding: 2px; border-radius: 4px; border: 1px solid var(--border);">
                                {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(40)->margin(0)->generate(route('pasiens.show', $pasien)) !!}
                            </div>
                        </td>
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
                                <a href="{{ route('pasiens.show', $pasien) }}" class="action-btn action-btn-view"
                                   title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('pasiens.edit', $pasien) }}" class="action-btn action-btn-edit"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('previewPDF', $pasien) }}" class="action-btn action-btn-pdf"
                                   target="_blank" title="PDF">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                                <a href="{{ route('createPDF', $pasien) }}" class="action-btn action-btn-download"
                                   title="Download">
                                    <i class="fas fa-download"></i>
                                </a>
                                <form action="{{ route('pasiens.destroy', $pasien) }}" method="POST"
                                      style="display:inline" onsubmit="return confirm('Delete this patient?')">
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
        $(document).ready(function () {
            var table = $('#dataTable').DataTable({
                responsive: true,
                language: {
                    emptyTable: 'No patients yet'
                },
                columnDefs: [{orderable: false, targets: -1}]
            });

            // Dynamically update the count cards when table is filtered or searched
            table.on('draw', function () {
                var total = 0;
                var negativeCount = 0;
                var positiveCount = 0;

                table.rows({filter: 'applied'}).every(function () {
                    var rowNode = this.node();
                    // Result cell is in the 10th column (index 9)
                    var resultText = $(rowNode).find('td').eq(9).text().trim().toLowerCase();
                    total++;
                    if (resultText.includes('negative')) {
                        negativeCount++;
                    } else if (resultText.includes('positive')) {
                        positiveCount++;
                    }
                });

                $('#total-pasien-count').text(total);
                $('#negatif-count').text(negativeCount);
                $('#positif-count').text(positiveCount);
            });
        });
    </script>
@endpush
