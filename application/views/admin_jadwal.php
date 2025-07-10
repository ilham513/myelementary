<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Jadwal Pelajaran</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="<?=base_url()?>assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?=base_url()?>assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["<?=base_url()?>assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets/css/plugins.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="<?=base_url()?>assets/css/demo.css" />
  </head>
  <body>
    <div class="wrapper">
      <?php $this->load->view('component/sidebar'); ?>
      <div class="main-panel">
        <div class="main-header">
          <?php $this->load->view('component/navbar'); ?>
        </div>

        <div class="container">
          <div class="page-inner">
<div class="page-header d-flex justify-content-between align-items-center">
  <h4 class="page-title mb-0">Jadwal Pelajaran</h4>
  <div>
    <a href="<?= site_url('admin/reset_jadwal') ?>" class="btn btn-danger btn-round mr-2" onclick="return confirm('Yakin ingin mereset semua jadwal?')">Reset Jadwal</a>
    <a href="<?= site_url('admin/jadwal_otomatis') ?>" class="btn btn-primary btn-round">Buat Jadwal Otomatis</a>
  </div>
</div>
            <div class="container p-3 bg-white mt-3">
              <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Guru</th>
                      <th>Jam Mengajar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach($array_jadwal as $row): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $row->nama_karyawan ?></td>
                      <td><?= $row->waktu_kerja ?></td>
                      <td>
                        <a href="<?= site_url('admin/jadwal_edit/'.$row->id_jadwal) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= site_url('admin/jadwal_delete/'.$row->id_jadwal) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">Hapus</a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <footer class="footer d-none">
          <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="http://www.themekita.com">ThemeKita</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Licenses</a></li>
              </ul>
            </nav>
            <div class="copyright">
              2024, made with <i class="fa fa-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
            </div>
            <div>
              Distributed by <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
            </div>
          </div>
        </footer>
      </div>
    </div>

    <!-- Core JS Files -->
    <script src="<?=base_url()?>assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
    <script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugin/datatables/datatables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#basic-datatables').DataTable({});
      });
    </script>
    <script src="<?=base_url()?>assets/js/kaiadmin.min.js"></script>
  </body>
</html>
