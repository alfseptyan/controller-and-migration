<body>
    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tanggal Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_buku as $index => $buku)
            <tr>
                <!-- Penomoran dinamis berdasarkan index perulangan -->
                <td>{{ $index + 1 }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ 'Rp. ' . number_format($buku->harga, 2, ',', '.') }}</td>
                <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                <td>

                    <!-- Tombol untuk menampilkan detail buku -->
                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <!-- Form untuk hapus buku -->
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Apakah Anda yakin?')" type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Jumlah Data:</strong> {{ $jumlah }}</p>
    <p><strong>Total Harga:</strong> {{ 'Rp ' . number_format($total_harga, 2, ',', '.') }}</p>
</body>
