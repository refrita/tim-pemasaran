@extends('layouts.app')

@section('title', 'Detail Performa')

@section('content')
<p>Tanggal: {{ $item['tanggal'] }}</p>
<p>Iklan: {{ $item['nama_iklan'] }}</p>
<p>Jumlah Tayang: {{ $item['jumlah_tayang'] }}</p>
<p>Jumlah Klik: {{ $item['jumlah_klik'] }}</p>
<p>Konversi: {{ $item['konversi'] }}</p>
<a href="/performa">Kembali</a>
@endsection
