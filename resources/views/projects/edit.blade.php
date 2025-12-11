<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: #f8f9fa">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-warning">
                <h4>Edit Project</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT') <div class="mb-3">
                        <label>Judul Project</label>
                        <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ $project->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Link Project</label>
                        <input type="url" name="link" class="form-control" value="{{ $project->link }}">
                    </div>

                    <div class="mb-3">
                        <label>Ganti Gambar (Biarkan kosong jika tidak ingin mengganti)</label>
                        <input type="file" name="image" class="form-control">
                        <small class="text-muted">Gambar saat ini: </small><br>
                        <img src="{{ asset('storage/' . $project->image) }}" width="100" class="mt-2 rounded">
                    </div>

                    <button type="submit" class="btn btn-warning">Update Data</button>
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>