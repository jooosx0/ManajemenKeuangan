<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Impor PDF facade

class LaporanController extends Controller
{
    public function index()
    {
        // Jika Anda ingin mengarahkan ke laporan bulanan
        return redirect()->route('laporan.bulanan');
    }

    public function bulanan()
    {
        // Ambil bulan yang memiliki pemasukan atau pengeluaran
        $dataBulanan = [];
        $monthsWithData = [];

        // Ambil semua pemasukan
        $pemasukans = Pemasukan::selectRaw('MONTH(tanggal) as month, SUM(jumlah) as total')
            ->groupBy('month')
            ->get();

        // Ambil semua pengeluaran
        $pengeluarans = Pengeluaran::selectRaw('MONTH(tanggal) as month, SUM(jumlah) as total')
            ->groupBy('month')
            ->get();

        // Gabungkan bulan dari pemasukan dan pengeluaran
        foreach ($pemasukans as $pemasukan) {
            $monthsWithData[$pemasukan->month] = [
                'pemasukan' => $pemasukan->total,
                'pengeluaran' => 0, // Default pengeluaran 0
            ];
        }

        foreach ($pengeluarans as $pengeluaran) {
            if (isset($monthsWithData[$pengeluaran->month])) {
                $monthsWithData[$pengeluaran->month]['pengeluaran'] = $pengeluaran->total;
            } else {
                $monthsWithData[$pengeluaran->month] = [
                    'pemasukan' => 0, // Default pemasukan 0
                    'pengeluaran' => $pengeluaran->total,
                ];
            }
        }

        // Siapkan data untuk view
        foreach ($monthsWithData as $month => $data) {
            $dataBulanan[$month] = [
                'pemasukan' => $data['pemasukan'],
                'pengeluaran' => $data['pengeluaran'],
                'saldo' => $data['pemasukan'] - $data['pengeluaran'],
            ];
        }

        return view('laporan.bulanan', compact('dataBulanan'));
    }
   
    public function detail($bulan)
{
    // Ambil pemasukan dan pengeluaran berdasarkan bulan
    $pemasukans = Pemasukan::whereMonth('tanggal', $bulan)->get();
    $pengeluarans = Pengeluaran::whereMonth('tanggal', $bulan)->get();

    // Pastikan bulan ditampilkan dengan format yang benar
    return view('laporan.detail', compact('pemasukans', 'pengeluarans', 'bulan'));
}

public function downloadPDF($bulan)
{
    // Ambil pemasukan dan pengeluaran berdasarkan bulan
    $pemasukans = Pemasukan::whereMonth('tanggal', $bulan)->get();
    $pengeluarans = Pengeluaran::whereMonth('tanggal', $bulan)->get();

    // Buat PDF dari view
    $pdf = Pdf::loadView('laporan.pdf', compact('pemasukans', 'pengeluarans', 'bulan'));
    
    // Download PDF
    return $pdf->download('laporan_bulanan_' . $bulan . '.pdf');
}
}