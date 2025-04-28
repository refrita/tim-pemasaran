@extends('layouts.app')

@section('title', 'Performa Iklan')

@section('content')
<a href="/performa/create">Tambah Performa</a>
<ul>
@foreach ($performa as $p)
    <li>
        {{ $p['tanggal'] }} - {{ $p['nama_iklan'] }} | Tayang: {{ $p['jumlah_tayang'] }}, Klik: {{ $p['jumlah_klik'] }}, Konversi: {{ $p['konversi'] }}
        <a href="/performa/{{ $p['id'] }}">Lihat</a>
        <a href="/performa/{{ $p['id'] }}/edit">Edit</a>
        <a href="/performa/{{ $p['id'] }}/delete">Hapus</a>
    </li>
@endforeach
</ul>
@endsection
