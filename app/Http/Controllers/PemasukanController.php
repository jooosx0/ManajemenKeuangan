<?php
namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        $pemasukans = Pemasukan::all();
        return view('pemasukan.index', compact('pemasukans'));
    }

    public function create()
    {
        return view('pemasukan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
        ]);

        Pemasukan::create($request->all());
        return redirect()->route('pemasukan.index')->with('success', 'Data Pemasukan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        return view('pemasukan.edit', compact('pemasukan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
        ]);

        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->update($request->all());
        return redirect()->route('pemasukan.index')->with('success', 'Data Pemasukan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->delete();
        return redirect()->route('pemasukan.index')->with('success', 'Data Pemasukan berhasil dihapus.');
    }
}