@extends('layouts.app')

@section('title', 'Daftar Biaya Pemasaran')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Biaya Pemasaran</h2>
    <a href="/biaya-pemasaran/create" class="btn btn-primary">+ Tambah Biaya</a>
</div>

<ul class="list-group">
@foreach ($biaya as $b)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
            Bulan: {{ $b['bulan_berlaku'] }} - Total: {{ number_format($b['total_anggaran']) }} - Status: {{ $b['status'] }}
        </div>
        <div>
            <a href="/biaya-pemasaran/{{ $b['id'] }}" class="btn btn-sm btn-info">Lihat</a>
            <a href="/biaya-pemasaran/{{ $b['id'] }}/edit" class="btn btn-sm btn-warning">Edit</a>
            <a href="/biaya-pemasaran/{{ $b['id'] }}/delete" class="btn btn-sm btn-danger">Hapus</a>
        </div>
    </li>
@endforeach
</ul>

<a href="{{ url('/') }}" class="btn btn-secondary mt-4">← Kembali ke homepage</a>
@endsection
