<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontaks = Kontak::all();

        return view('welcome', compact('kontaks')); // Pastikan ini ada
    }


public function index2()
{
    // $contact = Kontak::;
    $kontaks = Kontak::paginate(5);
    return view('kontak.index', compact('kontaks'));
}


    public function create()
    {
        return view('kontak.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_aplikasi' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:11048',
            'tautan' => 'required|url', // Validasi tautan
        ]);
        
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/upload/artikel'), $filename);
        }

        Kontak::create([
            'nama_aplikasi' => $request->nama_aplikasi,
            'gambar' => $filename,
            'tautan' => $request->tautan, // Simpan tautan
        ]);

        return redirect()->route('kontak.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit data
    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('kontak.edit', compact('kontak'));
    }


    // Memperbarui data yang ada
    public function update(Request $request, Kontak $kontak)
    {
        $request->validate([
            'nama_aplikasi' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tautan' => 'required|url', // Validasi tautan
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kontak->gambar && file_exists(public_path('artikel'.$kontak->gambar))) {
                unlink(public_path('storage/upload/artikel'.$kontak->gambar));
            }

            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('artikel'), $imageName);

            $kontak->gambar = $imageName;
        }

        $kontak->nama_aplikasi = $request->nama_aplikasi;
        $kontak->tautan = $request->tautan;
        $kontak->save();

        return redirect()->route('kontak.index')->with('success', 'Data berhasil diperbarui!');
    }

    // Menghapus data
    public function destroy(Kontak $kontak)
    {
        // Hapus gambar jika ada
        if ($kontak->gambar && file_exists(public_path('images/'.$kontak->gambar))) {
            unlink(public_path('images/'.$kontak->gambar));
        }

        $kontak->delete();

        return redirect()->route('kontak.index')->with('success', 'Data berhasil dihapus!');
    }

}
