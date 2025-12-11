<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Project Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: #f8f9fa">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Tambah Portfolio Baru</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf 

                    <div class="mb-3">
                        <label>Judul Project</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>


                    <div class="mb-3">
                        <label>Gambar Project</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>