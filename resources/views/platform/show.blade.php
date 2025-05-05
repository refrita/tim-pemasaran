@extends('layouts.app')

@section('title', 'Detail Platform')

@section('content')
<p>Nama Platform: {{ $platform['nama_platform'] }}</p>
<p>Jenis Platform: {{ $platform['jenis_platform'] }}</p>

<a href="{{ route('home.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection
