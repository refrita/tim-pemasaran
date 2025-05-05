@extends('layouts.app')

@section('title', 'Detail Performa')

@section('content')
<p>Tanggal: {{ $performa['tanggal'] }}</p>
<p>Jumlah Tayang: {{ $performa['jumlah_tayang'] }}</p>
<p>Jumlah Klik: {{ $performa['jumlah_klik'] }}</p>
<p>Konversi: {{ $performa['konversi'] }}</p>
<a href="/performa">Kembali</a>
@endsection
