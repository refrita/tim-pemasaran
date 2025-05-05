@extends('layouts.app')

@section('title', 'Edit Platform')

@section('content')
<form action="/platform/{{ $platform->id }}" method="POST">
    @csrf
    @method('PUT')
    Nama Platform: <input type="text" name="nama_platform" value="{{ $platform->nama }}"><br>
    Jenis Platform: <input type="text" name="jenis_platform" value="{{ $platform->jenis }}"><br>
    <button type="submit">Update</button>
</form>

<a href="{{ route('platform.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection
