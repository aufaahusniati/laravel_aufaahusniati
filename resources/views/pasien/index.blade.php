@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Data Pasien</h2>
            <a href="{{ route('pasien.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Tambah Data
            </a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-success">
                            <tr>
                                <th>ID</th>
                                <th>Nama Pasien</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Rumah Sakit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasiens as $pasien)
                                <tr id="row-{{ $pasien->id }}">
                                    <td>{{ $pasien->id }}</td>
                                    <td>{{ $pasien->nama }}</td>
                                    <td>{{ $pasien->alamat }}</td>
                                    <td>{{ $pasien->telepon }}</td>
                                    <td>{{ $pasien->rumahSakit->nama ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $pasien->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('.btn-delete').click(function(e) {
        e.preventDefault();
        let id = $(this).data('id');

        if (confirm('Yakin ingin menghapus data ini?')) {
            $.ajax({
                url: '/pasien/' + id,
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}'
                },
                success: function(res) {
                    // Hapus baris dari tabel
                    $('#row-' + id).remove();
                    alert('Data berhasil dihapus!');
                },
                error: function(err) {
                    alert('Gagal menghapus data!');
                }
            });
        }
    });
});
</script>
@endpush
