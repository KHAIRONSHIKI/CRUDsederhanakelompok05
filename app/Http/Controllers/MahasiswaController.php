<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Menampilkan halaman form tambah mahasiswa
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Menyimpan data mahasiswa baru ke database (Create)
     */
    public function store(Request $request)
    {
        // Validasi inputan form
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'jurusan' => 'required',
        ]);

        // Simpan data ke tabel mahasiswas
        Mahasiswa::create($request->all());

        // Kembali ke halaman utama dengan notifikasi sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail mahasiswa (Kosongkan jika tidak digunakan)
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Menampilkan halaman form edit berdasarkan ID mahasiswa
     */
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Memperbarui data mahasiswa di database (Update)
     */
    public function update(Request $request, string $id)
    {
        // Validasi inputan (Kecualikan NIM milik mahasiswa ini sendiri agar tidak bentrok saat di-update)
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $id,
            'nama' => 'required',
            'jurusan' => 'required',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    /**
     * Menghapus data mahasiswa dari database (Delete)
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}