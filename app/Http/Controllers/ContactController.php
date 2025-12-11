<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // 1. Fungsi Menampilkan Daftar Pesan (Admin)
    public function index()
    {
        // Ambil data terbaru dari database
        $contacts = Contact::latest()->get();
        return view('contacts.index', compact('contacts'));
    }

    // 2. Fungsi Simpan Pesan dari Pengunjung (Public)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim!');
    }

    // 3. Fungsi Hapus Pesan (BARU DITAMBAHKAN)
    public function destroy($id)
    {
        // Cari pesan berdasarkan ID
        $contact = Contact::findOrFail($id);
        
        // Hapus
        $contact->delete();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan berhasil dihapus!');
    }
}
