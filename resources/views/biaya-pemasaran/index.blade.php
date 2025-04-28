@extends('layouts.app')

@section('title', 'Daftar Biaya Pemasaran')

@section('content')
<a href="/biaya-pemasaran/create">Tambah Biaya</a>
<ul>
@foreach ($biaya as $b)
    <li>
        Bulan: {{ $b['bulan_berlaku'] }} - Total: {{ number_format($b['total_anggaran']) }} - Status: {{ $b['status'] }}
        <a href="/biaya-pemasaran/{{ $b['id'] }}">Lihat</a>
        <a href="/biaya-pemasaran/{{ $b['id'] }}/edit">Edit</a>
        <a href="/biaya-pemasaran/{{ $b['id'] }}/delete">Hapus</a>
    </li>
@endforeach
</ul>
@endsection
