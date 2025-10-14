<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Books</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
  <div class="container">
    <h2 class="text-center mb-4">Daftar Buku</h2>

    <table class="table table-bordered table-striped align-middle shadow-sm">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Judul Buku</th>
          <th>Deskripsi</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Cover</th>
          <th>Author</th>
        </tr>
      </thead>
      <tbody>
        @foreach($books as $book)
          <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->description }}</td>
            <td>Rp {{ number_format($book->price, 0, ',', '.') }}</td>
            <td>{{ $book->stock }}</td>
            <td><img src="{{ asset('images/' . $book->cover_photo) }}" width="60" alt="{{ $book->title }}"></td>
            <td>{{ $book->author->name }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <a href="/authors" class="btn btn-secondary mt-3">Lihat Data Penulis</a>
  </div>
</body>
</html>
