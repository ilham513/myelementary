<div class="container mt-4">
  <h3>Hasil Keputusan Karyawan Terbaik (C4.5 Sederhana)</h3>
  <table class="table table-bordered table-striped">
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

  <h5 class="mt-4">Data Training (10 contoh)</h5>
  <table class="table table-sm table-bordered">
    <thead>
      <tr>
        <th>Kinerja</th>
        <th>Kehadiran</th>
        <th>Kreativitas</th>
        <th>Label</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data_training as $d): ?>
        <tr>
          <td><?= $d['kinerja'] ?></td>
          <td><?= $d['kehadiran'] ?></td>
          <td><?= $d['kreativitas'] ?></td>
          <td><strong><?= $d['label'] ?></strong></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
