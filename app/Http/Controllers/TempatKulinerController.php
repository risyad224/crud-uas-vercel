<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TempatKuliner;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class TempatKulinerController extends Controller
{
    public function index()
    {
        $tempatKuliners = TempatKuliner::latest()->get();
        return view('admin.tempat_kuliner.index', compact('tempatKuliners'));
    }

    public function create()
    {
        return view('admin.tempat_kuliner.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jenis_makanan' => 'required|string|max:255',
            'jam_operasional' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('tempat_kuliners', 's3');
        }

        TempatKuliner::create($validated);
        return redirect()->route('admin.tempat-kuliner.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(TempatKuliner $tempatKuliner)
    {
        return view('admin.tempat_kuliner.edit', compact('tempatKuliner'));
    }

    public function update(Request $request, TempatKuliner $tempatKuliner)
    {
        $validated = $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jenis_makanan' => 'required|string|max:255',
            'jam_operasional' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($tempatKuliner->gambar) {
                Storage::disk('s3')->delete($tempatKuliner->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('tempat_kuliners', 's3');
        }

        $tempatKuliner->update($validated);
        return redirect()->route('admin.tempat-kuliner.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(TempatKuliner $tempatKuliner)
    {
        if ($tempatKuliner->gambar) {
            Storage::disk('s3')->delete($tempatKuliner->gambar);
        }
        $tempatKuliner->delete();
        return redirect()->route('admin.tempat-kuliner.index')->with('success', 'Data berhasil dihapus');
    }

    public function exportPdf()
    {
        $tempatKuliners = TempatKuliner::all();
        $pdf = Pdf::loadView('admin.tempat_kuliner.pdf', compact('tempatKuliners'));
        return $pdf->download('laporan-tempat-kuliner.pdf');
    }
}
