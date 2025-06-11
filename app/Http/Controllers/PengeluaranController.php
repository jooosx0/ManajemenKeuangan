<?php
namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluarans = Pengeluaran::all();
        return view('pengeluaran.index', compact('pengeluarans'));
    }

    public function create()
    {
        return view('pengeluaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
        ]);

        Pengeluaran::create($request->all());
        return redirect()->route('pengeluaran.index')->with('success', 'Data Pengeluaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id); // Ambil data pengeluaran berdasarkan ID
        return view('pengeluaran.edit', compact('pengeluaran')); // Kirim data ke view
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'jumlah' => 'required|numeric',
        'keterangan' => 'required|string|max:255',
    ]);

    $pengeluaran = Pengeluaran::findOrFail($id);
    $pengeluaran->jumlah = $request->input('jumlah');
    $pengeluaran->keterangan = $request->input('keterangan');
    $pengeluaran->save();

    return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil diperbarui.');
}

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();
        return redirect()->route('pengeluaran.index')->with('success', 'Data Pengeluaran berhasil dihapus.');
    }
}