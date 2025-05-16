@extends('layouts.app')

@section('title', 'Detail Platform')

@section('content')
<div class="container mt-4">
    <h2>Detail Platform</h2>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Nama Platform:</strong> {{ $platform->nama }}</li>
        <li class="list-group-item"><strong>Jenis Platform:</strong> {{ $platform->jenis }}</li>
    </ul>

    <a href="{{ route('platform.index') }}" class="btn btn-secondary">← Kembali ke daftar</a>
</div>
@endsection
