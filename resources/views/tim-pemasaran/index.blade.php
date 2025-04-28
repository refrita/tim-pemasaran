@extends('layouts.app')

@section('title', 'Daftar Tim Pemasaran')

@section('content')
<a href="/tim-pemasaran/create">Tambah Anggota</a>
<ul>
@foreach ($tim as $t)
    <li>
        {{ $t['nama_anggota'] }} - {{ $t['jabatan'] }}
        <a href="/tim-pemasaran/{{ $t['id'] }}">Lihat</a>
        <a href="/tim-pemasaran/{{ $t['id'] }}/edit">Edit</a>
        <a href="/tim-pemasaran/{{ $t['id'] }}/delete">Hapus</a>
    </li>
@endforeach
</ul>
@endsection
