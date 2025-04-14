<h1>Edit Anggota</h1>

<form method="POST" action="{{ url('/tim-pemasaran/' . $item['id']) }}">
    @csrf
    @method('PUT')
    <input name="nama_anggota" value="{{ $item['nama_anggota'] }}"><br>
    <input name="jabatan" value="{{ $item['jabatan'] }}"><br>
    <input name="nama_pengguna" value="{{ $item['nama_pengguna'] }}"><br>
    <input type="password" name="kata_sandi" placeholder="Password Baru"><br>
    <input name="id_platform" value="{{ $item['id_platform'] }}"><br>
    <input name="id_pemasaran" value="{{ $item['id_pemasaran'] }}"><br>
    <button type="submit">Update</button>
    <a href="{{ url('/tim-pemasaran') }}">⬅ Kembali</a>

</form>
