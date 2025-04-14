<h1>Tambah Anggota</h1>

<form action="{{ url('/tim-pemasaran') }}" method="POST">
    @csrf
    <input name="nama_anggota" placeholder="Nama"><br>
    <input name="jabatan" placeholder="Jabatan"><br>
    <input name="nama_pengguna" placeholder="Username"><br>
    <input name="kata_sandi" type="password" placeholder="Password"><br>
    <input name="id_platform" placeholder="ID Platform"><br>
    <input name="id_pemasaran" placeholder="ID Pemasaran"><br>
    <button type="submit">Simpan</button>
    <a href="{{ url('/tim-pemasaran') }}">⬅ Kembali</a>

</form>
