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
    $('tbody').on('click', '.btn-delete', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let token = $('meta[name="csrf-token"]').attr('content');
        let deleteUrlTemplate = "{{ route('rumahsakit.destroy', ['rumahsakit' => ':id']) }}";
        let url = deleteUrlTemplate.replace(':id', id);

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data rumah sakit yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url, 
                    type: 'POST',
                    data: {
                        "_token": token,
                        "_method": "DELETE" 
                    },
                    success: function(response) {
                        $('#row-' + id).fadeOut(500, function() {
                            $(this).remove();
                        });

                        Swal.fire(
                            'Berhasil!',
                            'Data rumah sakit telah dihapus.',
                            'success'
                        );
                    },
                    error: function(err) {
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat menghapus data.',
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
