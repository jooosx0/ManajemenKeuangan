@extends('mainlayout')

@section('title', 'Data Pengeluaran')
@include('components.header')

@section('maincontent')
<div class="container" style="background-color: rgba(58, 42, 149, 0.8); padding: 20px; border-radius: 8px;"> 
    <h2 class="text-center mb-4 text-white">Pengeluaran</h2> 
    <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary mb-3">Tambah Pengeluaran</a>
    

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
            @foreach($pengeluarans as $pengeluaran)
                <tr>
                    <td>{{ $pengeluaran->tanggal }}</td>
                    <td>{{ $pengeluaran->keterangan }}</td>
                    <td>{{ $pengeluaran->jumlah }}</td>
                    <td>
                        <a href="{{ route('pengeluaran.edit', $pengeluaran->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pengeluaran.destroy', $pengeluaran->id) }}" method="POST" style="display:inline;">
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