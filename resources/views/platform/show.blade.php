@extends('layouts.app')

@section('title', 'Detail Platform')

@section('content')
<div class="container mt-5">
    <div class="mb-4 border-bottom pb-2 d-flex align-items-center gap-2">
        <h2 class="fw-bold text-primary-emphasis">📱 Detail Platform</h2>
    </div>

    <div class="card shadow-sm rounded-4 border border-light-subtle mb-4">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <strong class="text-secondary">🆔 ID:</strong>
                    <span class="ms-2 text-dark">{{ $platform->id }}</span>
                </li>
                <li class="list-group-item">
                    <strong class="text-secondary">📛 Nama Platform:</strong>
                    <span class="ms-2 text-dark">{{ $platform->nama }}</span>
                </li>
                <li class="list-group-item">
                    <strong class="text-secondary">📂 Jenis Platform:</strong>
                    <span class="ms-2 text-dark">{{ $platform->jenis }}</span>
                </li>
            </ul>
        </div>
    </div>

    <a href="{{ route('platform.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
        ← Kembali ke Daftar
    </a>
</div>
@endsection
