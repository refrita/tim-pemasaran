<h1>Hapus Anggota</h1>

<p>Yakin ingin menghapus <strong>{{ $item['nama_anggota'] }}</strong>?</p>

<form action="{{ url('/tim-pemasaran/' . $item['id']) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Ya, Hapus</button>
    <a href="{{ url('/tim-pemasaran') }}">Batal</a>
</form>
