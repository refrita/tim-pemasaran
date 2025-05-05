@extends('layouts.app')

@section('title', 'Performa Iklan')

@section('content')
<a href="/performa/create">Tambah Performa</a>
<ul>
@foreach ($performa as $p)
    <li>
        {{ $p->jumlah_tayang }} - {{ $p->jumlah_klik }} - {{ $p->konversi }} - {{ $p->tanggal }}
        <a href="/performa/{{ $p['id'] }}">Lihat</a>
        <a href="/performa/{{ $p['id'] }}/edit">Edit</a>
        <a href="/performa/{{ $p['id'] }}/delete">Hapus</a>
    </li>
@endforeach
</ul>
@endsection
