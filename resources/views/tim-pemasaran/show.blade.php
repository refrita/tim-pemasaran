<h1>Detail Anggota</h1>

<p><strong>Nama:</strong> {{ $item['nama_anggota'] }}</p>
<p><strong>Jabatan:</strong> {{ $item['jabatan'] }}</p>
<p><strong>Username:</strong> {{ $item['nama_pengguna'] }}</p>
<p><strong>ID Platform:</strong> {{ $item['id_platform'] }}</p>
<p><strong>ID Pemasaran:</strong> {{ $item['id_pemasaran'] }}</p>

<a href="{{ url('/tim-pemasaran') }}">⬅ Kembali</a>
