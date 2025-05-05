@extends('layouts.app')

@section('title', 'Daftar Iklan')

@section('content')
<a href="/iklan/create">Tambah Iklan</a>
<ul>
@foreach ($iklan as $i)
    <li>
        {{ $i->nama }} - {{ $i->kategori }}
        <a href="/iklan/{{ $i->id }}">Lihat</a>
        <a href="/iklan/{{ $i->id }}/edit">Edit</a>
        <a href="/iklan/{{ $i->id }}/delete">Hapus</a>
    </li>
@endforeach
</ul>
<a href="{{ url('/') }}">Kembali</a>
@endsection
