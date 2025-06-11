<?php
namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log; // Pastikan ini ada

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil total pemasukan dan pengeluaran
        $totalPemasukan = Pemasukan::sum('jumlah');
        $totalPengeluaran = Pengeluaran::sum('jumlah');
        $saldo = $totalPemasukan - $totalPengeluaran;

        // Ambil pemasukan dan pengeluaran bulan ini
        $pemasukan = Pemasukan::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->get();

        $pengeluaran = Pengeluaran::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->get();

        // Gabungkan pemasukan dan pengeluaran menjadi satu koleksi
        $transaksi = $pemasukan->map(function ($item) {
            return [
                'date' => $item->created_at,
                'type' => 'income',
                'amount' => $item->jumlah,
            ];
        })->merge($pengeluaran->map(function ($item) {
            return [
                'date' => $item->created_at,
                'type' => 'expense',
                'amount' => $item->jumlah,
            ];
        }));

        // Mengirim data ke view
        return view('home', compact('totalPemasukan', 'totalPengeluaran', 'saldo', 'transaksi'));
    }
}