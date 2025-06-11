@extends('mainlayout')

@section('title', 'Home')
@include('components.header')

@section('maincontent')
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="container" style="background-color: rgba(58, 42, 149, 0.8); padding: 20px; border-radius: 8px;"> <!-- Mengubah warna latar belakang container -->
    <h2 class="text-center mb-4 text-white">Dashboard Keuangan</h2>
    
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-white" style="background-color: #F99413; padding: 10px;">
                <div class="card-header">Total Pemasukan</div>
                <div class="card-body" style="padding: 10px;">
                    <h5 class="card-title">Rp. {{ number_format($totalPemasukan, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white" style="background-color: #F99413; padding: 10px;">
                <div class="card-header">Total Pengeluaran</div>
                <div class="card-body" style="padding: 10px;">
                    <h5 class="card-title">Rp. {{ number_format($totalPengeluaran, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white" style="background-color: #F99413; padding: 10px;">
                <div class="card-header">Saldo Saat Ini</div>
                <div class="card-body" style="padding: 10px;">
                    <h5 class="card-title">Rp. {{ number_format($saldo, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>

    <h6 class="text-left mb-4 text-white">Riwayat Transaksi Bulan Ini</h6>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Jenis</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksi as $transaction)
            <tr>
                <td>{{ $transaction['date']->format('d-m-Y') }}</td>
                <td>{{ $transaction['type'] == 'income' ? 'Pemasukan' : 'Pengeluaran' }}</td>
                <td>Rp. {{ number_format($transaction['amount'], 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection