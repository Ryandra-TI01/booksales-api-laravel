<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Genres</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
  <div class="container">
    <h2 class="text-center mb-4">Daftar Genres</h2>
    <table class="table table-bordered table-striped align-middle">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nama Genre</th>
          <th>Deskripsi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($genres as $genre)
          <tr>
            <td>{{ $genre['id'] }}</td>
            <td>{{ $genre['name'] }}</td>
            <td>{{ $genre['description'] }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
