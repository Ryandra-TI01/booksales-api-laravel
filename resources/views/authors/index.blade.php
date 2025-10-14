<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Authors</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
  <div class="container">
    <h2 class="text-center mb-4">Daftar Penulis</h2>

    <table class="table table-bordered table-striped align-middle shadow-sm">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Foto</th>
          <th>Bio</th>
        </tr>
      </thead>
      <tbody>
        @foreach($authors as $author)
          <tr>
            <td>{{ $author->id }}</td>
            <td>{{ $author->name }}</td>
            <td><img src="{{ asset('images/' . $author->photo) }}" width="60" alt="{{ $author->name }}"></td>
            <td>{{ $author->bio }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <a href="/books" class="btn btn-primary mt-3">Lihat Data Buku</a>
  </div>
</body>
</html>
