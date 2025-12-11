<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: #f8f9fa">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Portfolio Saya</h2>
            <a href="{{ route('projects.create') }}" class="btn btn-primary">+ Tambah Project Baru</a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary ms-2">Kembali ke Dashboard</a>  
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Link</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            <td style="width: 15%">
                                <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid rounded" style="max-height: 100px">
                            </td>
                            <td>{{ $project->title }}</td>
                            <td>{{ Str::limit($project->description, 50) }}</td> <td>
                                @if($project->link)
                                    <a href="{{ $project->link }}" target="_blank" class="btn btn-sm btn-info text-white">Buka Link</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                        
                        @if($projects->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data project.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>