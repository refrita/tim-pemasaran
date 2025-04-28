@extends('layouts.app')

@section('title', 'Daftar Platform')

@section('content')
<a href="/platform/create">Tambah Platform</a>
<ul>
@foreach ($platform as $p)
    <li>
        {{ $p['nama_platform'] }} - {{ $p['jenis_platform'] }}
        <a href="/platform/{{ $p['id'] }}">Lihat</a>
        <a href="/platform/{{ $p['id'] }}/edit">Edit</a>
        <a href="/platform/{{ $p['id'] }}/delete">Hapus</a>
    </li>
@endforeach
</ul>
@endsection
