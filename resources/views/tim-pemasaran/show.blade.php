@extends('layouts.app')

@section('title', 'Detail Anggota Tim')

@section('content')
<p>Nama: {{ $item['nama_anggota'] }}</p>
<p>Jabatan: {{ $item['jabatan'] }}</p>
<p>Nama Pengguna: {{ $item['nama_pengguna'] }}</p>
<p>ID Platform: {{ $item['id_platform'] }}</p>
<p>ID Pemasaran: {{ $item['id_pemasaran'] }}</p>
<a href="/tim-pemasaran">Kembali</a>
@endsection
