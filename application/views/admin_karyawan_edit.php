<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin Panel</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="<?=base_url()?>assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

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

    <!-- CSS Just for demo purpose, don't include it in your project -->
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
      <h4 class="page-title mb-0">Edit Data Guru</h4>
      <a href="<?= site_url('admin/waktu')?>" class="btn btn-secondary btn-round">Kembali ke Tabel</a>
    </div>
    <div class="container p-4 bg-white mt-3 shadow-sm rounded">
        <form action="<?= site_url('admin/karyawan_edit_go') ?>" method="post">
  <!-- Simpan ID karyawan untuk proses update -->
  <input type="hidden" name="id_karyawan" value="<?= $obj_karyawan->id_karyawan ?>">

  <div class="form-group mb-3">
    <label for="nama_karyawan">Nama Karyawan</label>
    <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" value="<?= $obj_karyawan->nama_karyawan ?>" required>
  </div>

  <div class="form-group mb-3">
    <label for="jenis_kelamin">Jenis Kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
      <option value="">-- Pilih Jenis Kelamin --</option>
      <option value="Laki-laki" <?= ($obj_karyawan->jenis_kelamin == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
      <option value="Perempuan" <?= ($obj_karyawan->jenis_kelamin == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
    </select>
  </div>

  <div class="form-group mb-3">
    <label for="nomor_telpon">Nomor Telepon</label>
    <input type="text" name="nomor_telpon" id="nomor_telpon" class="form-control" value="<?= $obj_karyawan->nomor_telpon ?>" required>
  </div>

  <button type="submit" class="btn btn-primary">Perbarui</button>
  <a href="<?= site_url('admin/karyawan')?>" class="btn btn-danger">Batal</a>
</form>

    </div>
  </div>
</div>


<!-- Tambahkan script DataTables di bawah sebelum </body> -->
<script>
  $(document).ready(function () {
    $('#tabelPelajaran').DataTable();
  });
</script>

			</div>
          </div>
        </div>

        <footer class="footer d-none">
          <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="http://www.themekita.com">
                    ThemeKita
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Help </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Licenses </a>
                </li>
              </ul>
            </nav>
            <div class="copyright">
              2024, made with <i class="fa fa-heart heart text-danger"></i> by
              <a href="http://www.themekita.com">ThemeKita</a>
            </div>
            <div>
              Distributed by
              <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="<?=base_url()?>assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
    <script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?=base_url()?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="<?=base_url()?>assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="<?=base_url()?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="<?=base_url()?>assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="<?=base_url()?>assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="<?=base_url()?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="<?=base_url()?>assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Google Maps Plugin -->
    <script src="<?=base_url()?>assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Sweet Alert -->
    <script src="<?=base_url()?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="<?=base_url()?>assets/js/kaiadmin.min.js"></script>
  </body>
</html>
