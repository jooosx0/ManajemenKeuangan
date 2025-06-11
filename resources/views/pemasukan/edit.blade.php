@extends('mainlayout')

@section('title', 'Edit Pemasukan')
@include('components.header')

@section('maincontent')
<div class="container" style="background-color: rgba(58, 42, 149, 0.8); padding: 20px; border-radius: 8px;"> <!-- Mengubah warna latar belakang container -->
    <h2 class="text-center mb-4 text-white">Edit Pemasukan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pemasukan.update', $pemasukan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="{{ $pemasukan->tanggal }}" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" value="{{ $pemasukan->keterangan }}" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" value="{{ $pemasukan->jumlah }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection