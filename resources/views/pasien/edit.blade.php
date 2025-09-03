@extends('layouts.app')


@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="mb-0">Edit Data Pasien</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Nama Pasien --}}
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                   value="{{ old('nama', $pasien->nama) }}" required>
                        </div>

                        {{-- Alamat --}}
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $pasien->alamat) }}</textarea>
                        </div>

                        {{-- No Telepon --}}
                        <div class="mb-3">
                            <label for="telepon" class="form-label">No Telepon</label>
                            <input type="tel" class="form-control" id="telepon" name="telepon"
                                   value="{{ old('telepon', $pasien->telepon) }}" required>
                        </div>

                        {{-- Rumah Sakit --}}
                        <div class="mb-3">
                            <label for="rumah_sakit_id" class="form-label">Rumah Sakit</label>
                            <select name="rumah_sakit_id" id="rumah_sakit_id" class="form-select" required>
                                <option value="">-- Pilih Rumah Sakit --</option>
                                @foreach ($rumahsakit as $rs)
                                    <option value="{{ $rs->id }}"
                                        {{ old('rumah_sakit_id', $pasien->rumah_sakit_id) == $rs->id ? 'selected' : '' }}>
                                        {{ $rs->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('pasien.index') }}" class="btn btn-secondary me-2">
                                <i class="bi bi-x-circle me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-2"></i>Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
