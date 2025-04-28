@extends('layouts.app')

@section('title', 'Detail Iklan')

@section('content')
<p>Judul: {{ $item['judul_iklan'] }}</p>
<p>Deskripsi: {{ $item['deskripsi'] }}</p>
<p>Tanggal: {{ $item['tanggal_mulai'] }} s/d {{ $item['tanggal_selesai'] }}</p>
<p>Status: {{ $item['status'] }}</p>
<p>Tim Pemasaran: {{ $item['nama_tim'] }}</p>
<a href="/iklan">Kembali</a>
@endsection
