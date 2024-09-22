<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="container">
    <h2>Edit Buku</h2>

    <form method="post" action="{{ route('buku.update', $buku->id) }}">
        @csrf
        @method('PUT')  
        
        <div class="form-group mb-3">
            <label for="judul">Judul Buku</label>
            <input type="text" id="judul" name="judul" class="form-control" value="{{ $buku->judul }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="penulis">Penulis</label>
            <input type="text" id="penulis" name="penulis" class="form-control" value="{{ $buku->penulis }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga" class="form-control" value="{{ $buku->harga }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="tgl_terbit">Tanggal Terbit</label>
            <input type="date" id="tgl_terbit" name="tgl_terbit" class="form-control" value="{{ $buku->tgl_terbit->format('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ '/buku' }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
