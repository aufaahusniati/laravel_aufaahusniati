@extends('layouts.app')

@section('title', 'Detail Pasien')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="mb-0">Detail Pasien</h3>
                </div>
                <div class="card-body">
                    
                    <div class="mb-3">
                        <strong>Nama Pasien:</strong>
                        <p>{{ $pasien->nama }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Alamat:</strong>
                        <p>{{ $pasien->alamat }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>No Telepon:</strong>
                        <p>{{ $pasien->telepon }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Rumah Sakit:</strong>
                        <p>{{ $pasien->rumahSakit->nama ?? '-' }}</p>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                        <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning ms-2">
                            <i class="bi bi-pencil-square me-2"></i>Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
