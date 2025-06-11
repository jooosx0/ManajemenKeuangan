<!DOCTYPE html>
<html>
<head>
    <title>Laporan Bulanan {{ date('F', mktime(0, 0, 0, $bulan, 1)) }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Laporan Bulanan {{ date('F', mktime(0, 0, 0, $bulan, 1)) }}</h2>

    <h4>Pemasukan</h4>
    <table>
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

    <h4>Pengeluaran</h4>
    <table>
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
                    <td>Rp. {{ number_format($pengeluaran->jumlah, 2, ',', '.') }}</td>
                    <td>{{ $pengeluaran->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>