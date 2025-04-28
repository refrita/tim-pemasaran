@extends('layouts.app')

@section('title', 'Detail Platform')

@section('content')
<p>Nama Platform: {{ $item['nama_platform'] }}</p>
<p>Jenis Platform: {{ $item['jenis_platform'] }}</p>
<a href="/platform">Kembali</a>
@endsection
