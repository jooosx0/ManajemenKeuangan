@extends('mainlayout')

@section('title', 'Data Pemasukan')
@include('components.header')

@section('maincontent')
<div class="container" style="background-color: rgba(58, 42, 149, 0.8); padding: 20px; border-radius: 8px;"> <!-- Mengubah warna latar belakang container -->
    <h2 class="text-center mb-4 text-white">Pemasukan</h2> <!-- Menambahkan kelas text-white -->
    <a href="{{ route('pemasukan.create') }}" class="btn btn-primary mb-3">Tambah Pemasukan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemasukans as $pemasukan)
                <tr>
                    <td>{{ $pemasukan->tanggal }}</td>
                    <td>{{ $pemasukan->keterangan }}</td>
                    <td>{{ $pemasukan->jumlah }}</td>
                    <td>
                        <a href="{{ route('pemasukan.edit', $pemasukan->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pemasukan.destroy', $pemasukan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection