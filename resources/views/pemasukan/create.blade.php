@extends('mainlayout')

@section('title', 'Tambah Pemasukan')

@section('maincontent')
<div class="container" style="background-color: rgba(58, 42, 149, 0.8); padding: 20px; border-radius: 8px;">
    <h2 class="text-center mb-4 text-white">Tambah Pemasukan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pemasukan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tanggal" class="text-white">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" required>
        </div>
        <div class="form-group">
            <label for="keterangan" class="text-white">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" required>
        </div>
        <div class="form-group">
            <label for="jumlah" class="text-white">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('laporan.bulanan') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection