@extends('mainlayout') 

@section('title', 'Edit Pengeluaran')
@include('components.header')

@section('maincontent')
<div class="container" style="background-color: rgba(58, 42, 149, 0.8); padding: 20px; border-radius: 8px;"> 
    <h1 class="text-left mb-4 text-white">Edit Pengeluaran</h1>

    <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST">
        @csrf
        @method('PUT') 
        
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $pengeluaran->jumlah }}" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $pengeluaran->keterangan }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection