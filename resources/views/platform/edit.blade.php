@extends('layouts.app')

@section('title', 'Edit Platform')

@section('content')
<form action="/platform/{{ $item['id'] }}" method="POST">
    @csrf
    @method('PUT')
    Nama Platform: <input type="text" name="nama_platform" value="{{ $item['nama_platform'] }}"><br>
    Jenis Platform: <input type="text" name="jenis_platform" value="{{ $item['jenis_platform'] }}"><br>
    <button type="submit">Update</button>
</form>
@endsection
