@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="mb-3">Welcome to Laravel_aufaahusniati</h1>
    <p class="lead">This is a simple CRUD application built with Laravel, jQuery, and Bootstrap.</p>

    <a href="{{ route('rumahsakit.index') }}" class="btn btn-primary btn-lg mt-3">
        View Rumah Sakit
    </a>
</div>
@endsection
