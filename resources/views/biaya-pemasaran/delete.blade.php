@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Biaya Pemasaran')

@section('content')
<div class="card p-4 shadow-sm">
    <h2 class="mb-4 text-danger">Konfirmasi Hapus</h2>

    {{-- Error dari session --}}
    @if (session('error'))
        <div class="alert alert-danger mb-3">{{ session('error') }}</div>
    @endif

    {{-- Error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p>Yakin ingin menghapus biaya pemasaran bulan <strong>{{ \Carbon\Carbon::parse($biaya['bulan_berlaku'])->format('F Y') }}</strong>?</p>

    <form action="{{ route('biaya-pemasaran.destroy', $biaya['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        <a href="{{ route('biaya-pemasaran.index') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
