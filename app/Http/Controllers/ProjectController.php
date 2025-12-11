<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Contact; // buat kommentar


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // Mengambil semua data project dari database
    $projects = Project::all();
    
    // Mengirim data ke view 'projects.index'
    return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('projects.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Data (Wajib diisi)
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maks 2MB
        'link' => 'nullable|url'
    ]);

    // 2. Upload Gambar
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('projects', 'public');
    }

    // 3. Simpan ke Database
    Project::create([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $imagePath,
        'link' => $request->link
    ]);

    // 4. Kembali ke halaman index
    return redirect()->route('projects.index')->with('success', 'Project berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   // Menampilkan halaman form edit
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    // Memproses update data ke database
    public function update(Request $request, string $id)
    {
        // 1. Validasi
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Gambar boleh kosong (nullable)
            'link' => 'nullable|url'
        ]);

        // 2. Ambil data project yang mau diedit
        $project = Project::findOrFail($id);

        // 3. Cek apakah user mengupload gambar baru
        if ($request->hasFile('image')) {
            
            // Hapus gambar lama jika ada di storage
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('projects', 'public');
            
            // Update path gambar di database
            $project->image = $imagePath;
        }

        // 4. Update data teks
        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;
        
        // 5. Simpan perubahan
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
    {
        // Cari data
        $project = Project::findOrFail($id);

        // Hapus file gambar dari storage
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        // Hapus data dari database
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project berhasil dihapus!');
    }

    // Fungsi untuk menampilkan halaman publik (Frontend)
   public function showHome()
{
    // Ambil project terbaru
    $projects = Project::latest()->get();
    
    // Ambil 6 komentar/pesan terbaru untuk ditampilkan sebagai Testimoni
    $comments = Contact::latest()->take(6)->get();
    
    // Kirim kedua data tersebut ke view 'home'
    return view('home', compact('projects', 'comments'));
}
// Fungsi untuk menampilkan halaman detail project (Frontend)
    public function showProject($id)
    {
        $project = Project::findOrFail($id);
        return view('project-detail', compact('project'));
    }
}
