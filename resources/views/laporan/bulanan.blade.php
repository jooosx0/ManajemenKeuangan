@extends('mainlayout')

@section('title', 'Laporan Bulanan')
@include('components.header')

@section('maincontent')
<div class="container" style="background-color: rgba(58, 42, 149, 0.8); padding: 20px; border-radius: 8px;"> <!-- Mengubah warna latar belakang container -->
    <h2 class="text-center mb-4 text-white">Laporan Bulanan</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Total Pemasukan</th>
                <th>Total Pengeluaran</th>
                <th>Saldo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataBulanan as $bulan => $data)
                <tr>
                    <td>{{ date('F', mktime(0, 0, 0, $bulan, 1)) }}</td>
                    <td>Rp. {{ number_format($data['pemasukan'], 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($data['pengeluaran'], 0, ',', '.') }}</td>
                    <td>Rp. {{ number_format($data['saldo'], 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('laporan.bulanan.detail', $bulan) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('laporan.bulanan.download', $bulan) }}" class="btn btn-success">Download</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection