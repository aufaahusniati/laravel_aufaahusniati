@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="mb-3">Selamat Datang di Laravel_aufaahusniati</h1>
    <p class="lead">Ini adalah aplikasi CRUD sederhana yang dibangun dengan Laravel, jQuery, dan Bootstrap.</p>

    <div>
        <a href="{{ route('rumahsakit.index') }}" class="btn btn-primary btn-lg mt-3">
            <i class="bi bi-hospital me-2"></i>Lihat Rumah Sakit
        </a>

        <a href="{{ route('pasien.index') }}" class="btn btn-success btn-lg mt-3 ms-2">
            <i class="bi bi-person-lines-fill me-2"></i>Lihat Pasien
        </a>
    </div>
</div>
@endsection