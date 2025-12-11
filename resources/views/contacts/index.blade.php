<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kotak Masuk Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: blueviolet;">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark"\>📩 Pesan Masuk</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="p-3">Tanggal</th>
                                <th class="p-3">Nama Pengirim</th>
                                <th class="p-3">Email</th>
                                <th class="p-3">Isi Pesan</th>
                                <th class="p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $contact)
                            <tr>
                                <td class="p-3 text-muted" style="white-space: nowrap;">
                                    {{ $contact->created_at->format('d M Y') }}
                                </td>
                                <td class="p-3 fw-bold">{{ $contact->name }}</td>
                                <td class="p-3">
                                    <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                        {{ $contact->email }}
                                    </a>
                                </td>
                                <td class="p-3">{{ $contact->message }}</td>
                                <td class="p-3 text-center">
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center p-5 text-muted">
                                    <h5>Belum ada pesan masuk 📭</h5>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>