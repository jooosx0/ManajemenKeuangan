@extends('mainlayout')

@section('title', 'Detail Laporan Bulanan')
@include('components.header')

@section('maincontent')
<div class="container" style="background-color: rgba(58, 42, 149, 0.8); padding: 20px; border-radius: 8px;"> <!-- Mengubah warna latar belakang container -->
    <h2 class="text-center mb-4 text-white">Detail Laporan Bulan {{ date('F', mktime(0, 0, 0, $bulan, 1)) }}</h2>
    <h4 class="text-white">Pemasukan</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemasukans as $pemasukan)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($pemasukan->tanggal)->format('d-m-Y') }}</td>
                    <td>Rp. {{ number_format($pemasukan->jumlah, 2, ',', '.') }}</td>
                    <td>{{ $pemasukan->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="text-white">Pengeluaran</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengeluarans as $pengeluaran)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($pengeluaran->tanggal)->format('d-m-Y') }}</td>
                    <td>Rp. {{ number_format($pengeluaran->jumlah, 0, ',', '.') }}</td>
                    <td>{{ $pengeluaran->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('laporan.bulanan') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection