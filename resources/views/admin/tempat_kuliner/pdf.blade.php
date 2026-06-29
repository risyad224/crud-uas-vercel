<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Tempat Kuliner</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Data Tempat Kuliner</h2>
    <p>Dicetak pada: {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Nama Tempat</th>
                <th>Jenis Makanan</th>
                <th>Jam Operasional</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tempatKuliners as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_tempat }}</td>
                    <td>{{ $item->jenis_makanan }}</td>
                    <td>{{ $item->jam_operasional }}</td>
                    <td>{{ $item->alamat }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
