<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function peserta()
    {
        $peserta = Peserta::latest()->get();
        return view('peserta.show', compact('peserta'));
    }

    public function create()
    {
        return view('peserta.create');
    }

    public function detail($id)
    {
        $peserta = Peserta::findOrFail($id);

        return view('peserta.detail', compact('peserta'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
            'prodi' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'institusi' => 'required|string|max:255',
            'surat_pengantar' => 'required|file|mimes:pdf|max:2048',
            'cv' => 'required|file|mimes:pdf|max:2048',
            'mulai_magang' => 'required|date',
            'selesai_magang' => 'required|date|after_or_equal:mulai_magang',
            'status' => 'string|max:255',
        ]);

        $suratPengantarPath = $request->file('surat_pengantar')->store('public/files');

        $cvPath = $request->file('cv')->store('public/files');

        // Simpan data peserta ke dalam database
        Peserta::create([
            'nama' => $validatedData['nama'],
            'nim' => $validatedData['nim'],
            'prodi' => $validatedData['prodi'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'telepon' => $validatedData['telepon'],
            'alamat' => $validatedData['alamat'],
            'institusi' => $validatedData['institusi'],
            'surat_pengantar' => $suratPengantarPath,
            'cv' => $cvPath,
            'mulai_magang' => $validatedData['mulai_magang'],
            'selesai_magang' => $validatedData['selesai_magang'],
            'status' => 'pending'
        ]);

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('peserta.show')->with('success', 'Peserta berhasil ditambahkan!');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();
        return redirect()->route('peserta.show')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function edit(Peserta $peserta)
    {
        $title = "Edit Peserta";
        return view('peserta.edit', ['listtitle' => $title, 'peserta' => $peserta]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string',
            'prodi' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'telepon' => 'required|string',
            'alamat' => 'required|string',
            'institusi' => 'required|string',
            'surat_pengantar' => 'nullable|file|mimes:pdf', 
            'cv' => 'nullable|file|mimes:pdf', 
            'mulai_magang' => 'nullable|date',
            'selesai_magang' => 'nullable|date',
        ]);

        $peserta = Peserta::findOrFail($id); // Mengambil data peserta berdasarkan ID

        // Update data peserta sesuai dengan input dari form
        $peserta->nama = $request->nama;
        $peserta->nim = $request->nim;
        $peserta->prodi = $request->prodi;
        $peserta->jenis_kelamin = $request->jenis_kelamin;
        $peserta->telepon = $request->telepon;
        $peserta->alamat = $request->alamat;
        $peserta->institusi = $request->institusi;
        $peserta->mulai_magang = $request->mulai_magang;
        $peserta->selesai_magang = $request->selesai_magang;

        // Menghandle unggah surat pengantar jika ada
        if ($request->hasFile('surat_pengantar')) {
            $suratPengantarPath = $request->file('surat_pengantar')->store('public/files');
            $peserta->surat_pengantar = $suratPengantarPath;
        }

        // Menghandle unggah CV jika ada
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('public/files');
            $peserta->cv = $cvPath;
        }

        // Simpan perubahan
        $peserta->save();

        return redirect()->route('peserta.show', $peserta->id)
            ->with('success', 'Data peserta berhasil diperbarui.');
    }

    public function indexTerima()
    {
    $pesertaTerima = Peserta::where('status', 'Diterima')->get();
    return view('peserta.terima', compact('pesertaTerima'));
    }

    public function indexTolak()
    {
        $pesertaTolak = Peserta::where('status', 'Ditolak')->get();
        return view('peserta.tolak', compact('pesertaTolak'));
    }

    public function terima(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->update(['status' => 'Diterima']);

        return redirect()->route('peserta.terima', ['id' => $peserta->id]);
    }

    public function tolak(Request $request, $id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->update(['status' => 'Ditolak']);

        return redirect()->route('peserta.tolak', ['id' => $peserta->id]);
    }

    private $nomorSuratAwal = "2212/PKL/ARKA/0001"; // Nomor surat awal

    private function generateNomorSurat()
    {
        // Memisahkan nomor urut dari nomor surat sebelumnya
        preg_match('/(\d+)$/', $this->nomorSuratAwal, $matches);

        // Mendapatkan nomor urut sebelumnya
        $lastNumber = (int)$matches[1];

        // Menambahkan satu ke nomor urut sebelumnya
        $newNumber = $lastNumber + 1;

        // Membuat nomor surat baru dengan format yang diinginkan
        $newNomorSurat = sprintf("2212/PKL/ARKA/%04d", $newNumber);

        return $newNomorSurat;
    }

    public function cetak(Request $request, $id)
    {
        $tanggalHariIni = Carbon::now()->format('d F Y');
    
        $query = Peserta::find($id);
        $nomorSuratBaru = $this->generateNomorSurat();
        $this->nomorSuratAwal = $nomorSuratBaru;
        

        $image=file_get_contents("assets/images/logo.png");
        $imagedata=base64_encode($image);

        // Ukuran gambar yang ingin ditampilkan di halaman PDF (dalam piksel)
        $imageWidth = 200; // Ubah dengan lebar gambar yang diinginkan
        $imageHeight = 100; // Ubah dengan tinggi gambar yang diinginkan
        $imageLogo = '<img src="data:image/png;base64, ' . $imagedata . '" width="' . $imageWidth . '" height="' . $imageHeight . '">';

        // ttd 
        $image2=file_get_contents("assets/images/ttd1.png");
        $imagedata2=base64_encode($image2);

        // Ukuran gambar yang ingin ditampilkan di halaman PDF (dalam piksel)
        $imageWidth2 = 100; // Ubah dengan lebar gambar yang diinginkan
        $imageHeight2 = 100; // Ubah dengan tinggi gambar yang diinginkan
        $imageTtd = '<img src="data:image/png;base64, ' . $imagedata2 . '" width="' . $imageWidth2 . '" height="' . $imageHeight2 . '">';

        $image3=file_get_contents("assets/images/ttd2.png");
        $imagedata3=base64_encode($image3);

        // Ukuran gambar yang ingin ditampilkan di halaman PDF (dalam piksel)
        $imageWidth3 = 100; // Ubah dengan lebar gambar yang diinginkan
        $imageHeight3 = 100; // Ubah dengan tinggi gambar yang diinginkan
        $imageTtd2 = '<img src="data:image/png;base64, ' . $imagedata3 . '" width="' . $imageWidth3 . '" height="' . $imageHeight3 . '">';

        $peserta = $query->select('institusi','nama','nim','prodi','status')
                    ->get();

        $html = view('peserta.cetak', compact('imageLogo','imageTtd','imageTtd2','tanggalHariIni','nomorSuratBaru','peserta'));
        $pdf = new Dompdf();
        $pdf -> loadHtml($html); 
        $pdf->render();
        $pdf->stream('Surat Balasan.pdf');
    
    }







}
