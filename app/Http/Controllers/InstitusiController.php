<?php

namespace App\Http\Controllers;

use App\Models\Institusi;
use Illuminate\Http\Request;

class InstitusiController extends Controller
{
    public function institusi()
    {
        $institusi = Institusi::latest()->get();
        return view('institusi.show', compact('institusi'));
    }

    public function create()
    {
        return view('institusi.create');
    }

    public function store(Request $request)
    {
        
        // Validasi input
        $validatedData = $request->validate([
            'nama_institusi' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nama_pembimbing' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'telepon' => 'required|string|max:20',
        ]);

        // Simpan data peserta ke dalam database
        Institusi::create([
            'nama_institusi' => $validatedData['nama_institusi'],
            'alamat' => $validatedData['alamat'],
            'nama_pembimbing' => $validatedData['nama_pembimbing'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'telepon' => $validatedData['telepon'],
        ]);

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('institusi.show')->with('success', 'Peserta berhasil ditambahkan!');
    }

    public function edit(Institusi $institusi)
    {
        $title = "Edit Institusi";
        return view('Institusi.edit', ['listtitle' => $title, 'institusi' => $institusi]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_institusi' => 'required|string',
            'alamat' => 'required|string',
            'nama_pembimbing' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'telepon' => 'required|string',
        ]);

        $institusi = Institusi::findOrFail($id); // Mengambil data peserta berdasarkan ID

        // Update data peserta sesuai dengan input dari form
        $institusi->nama_institusi = $request->nama_institusi;
        $institusi->alamat = $request->alamat;
        $institusi->nama_pembimbing = $request->nama_pembimbing;
        $institusi->jenis_kelamin = $request->jenis_kelamin;
        $institusi->telepon = $request->telepon;

        // Simpan perubahan
        $institusi->save();

        return redirect()->route('institusi.show', $institusi->id)
            ->with('success', 'Data peserta berhasil diperbarui.');
    }

    public function destroy(Institusi $institusi)
    {
        $institusi->delete();
        return redirect()->route('institusi.show')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}
