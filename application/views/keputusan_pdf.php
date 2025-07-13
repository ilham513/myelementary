<!DOCTYPE html>
<html>
<head>
    <title>Laporan Karyawan Terbaik</title>
    <style>
        body { font-family: sans-serif; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; font-size: 12px; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h2>Laporan Hasil Keputusan Karyawan Terbaik</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Kinerja</th>
                <th>Kehadiran</th>
                <th>Kreativitas</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($hasil_klasifikasi as $row): ?>
            <tr>
                <td><?= $row['nama_karyawan'] ?></td>
                <td><?= $row['kinerja'] ?></td>
                <td><?= $row['kehadiran'] ?></td>
                <td><?= $row['kreativitas'] ?></td>
                <td><strong><?= $row['status'] ?></strong></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
