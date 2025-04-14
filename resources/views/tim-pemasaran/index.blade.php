<h1>Daftar Tim Pemasaran</h1>

<a href="{{ url('/tim-pemasaran/create') }}">➕ Tambah Anggota</a>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tim as $anggota)
        <tr>
            <td>{{ $anggota['id'] }}</td>
            <td>{{ $anggota['nama_anggota'] }}</td>
            <td>{{ $anggota['jabatan'] }}</td>
            <td>{{ $anggota['nama_pengguna'] }}</td>
            <td>
                <a href="{{ url('/tim-pemasaran/' . $anggota['id']) }}">🔍</a>
                <a href="{{ url('/tim-pemasaran/' . $anggota['id'] . '/edit') }}">✏️</a>
                <form action="{{ url('/tim-pemasaran/' . $anggota['id']) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin mau hapus?')">🗑️</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
