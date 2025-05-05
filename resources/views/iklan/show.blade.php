@extends('layouts.app')

@section('title', 'Detail Iklan')

@section('content')
<p>Nama Iklan: {{ $iklan->nama }}</p>
<p>Kategori: {{ $iklan->kategori }}</p>
<p>Tanggal Peluncuran: {{ $iklan->tanggal_peluncuran }}</p>
<p>Tanggal Selesai: {{ $iklan->tanggal_selesai }}</p>
<p>ID Biaya Pemasaran: {{ $iklan->id_biaya_pemasaran }}</p>
<p>ID Platform: {{ $iklan->id_platform }}</p>

<a href="{{ route('iklan.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection
