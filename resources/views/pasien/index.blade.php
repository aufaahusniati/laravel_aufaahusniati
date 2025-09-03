@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Data Pasien</h2>
            <a href="{{ route('pasien.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Tambah Data
            </a>
        </div>

        {{-- Filter --}}
        <div class="mb-3">
            <label for="filter-rs" class="form-label">Filter berdasarkan Rumah Sakit:</label>
            <select id="filter-rs" class="form-select">
                <option value="all">Semua Rumah Sakit</option>
                @foreach($rumahSakits as $rs)
                    <option value="{{ $rs->id }}">{{ $rs->nama }}</option>
                @endforeach
            </select>
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
                        <tbody id="pasien-table-body">
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
$(document).ready(function () {
    $('#filter-rs').change(function () {
    });

    $('#pasien-table-body').on('click', '.btn-delete', function() {
        let pasienId = $(this).data('id');
        let token = $('meta[name="csrf-token"]').attr('content'); 

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data pasien yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/pasien/${pasienId}`,
                    type: 'POST', 
                    data: {
                        "_token": token,
                        "_method": "DELETE"
                    },
                    success: function(response) {
                        if(response.success) {
                            $(`#row-${pasienId}`).remove();

                            Swal.fire(
                                'Terhapus!',
                                'Data pasien berhasil dihapus.',
                                'success'
                            );
                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat menghapus data.',
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'Tidak dapat menghubungi server.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
</script>
@endpush
