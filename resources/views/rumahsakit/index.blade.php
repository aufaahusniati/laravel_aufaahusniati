@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Data Rumah Sakit</h2>
            <a href="{{ route('rumahsakit.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Tambah Data
            </a>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-success">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Rumah Sakit</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telepon</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rumahSakits as $rs)
                                <tr id="row-{{ $rs->id }}">
                                    <td>{{ $rs->id }}</td>
                                    <td>{{ $rs->nama }}</td>
                                    <td>{{ $rs->alamat }}</td>
                                    <td>{{ $rs->email }}</td>
                                    <td>{{ $rs->telepon }}</td>
                                    <td>
                                        <a href="{{ route('rumahsakit.edit', $rs->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $rs->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data</td>
                                </tr>
                            @endforelse
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
                url: '/rumahsakit/' + id,
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}'
                },
                success: function(res) {
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
