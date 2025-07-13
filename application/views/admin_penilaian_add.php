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
      <h4 class="page-title mb-0">Input Jam Mengajar</h4>
      <a href="<?= site_url('admin/waktu')?>" class="btn btn-secondary btn-round">Kembali ke Tabel</a>
    </div>
    <div class="container p-4 bg-white mt-3 shadow-sm rounded">
<form action="<?= site_url('admin/penilaian_add_go') ?>" method="post">
  <div class="form-group mb-3">
    <label for="id_karyawan">Nama Karyawan</label>
    <select name="id_karyawan" id="id_karyawan" class="form-control" required>
      <option value="">-- Pilih Karyawan --</option>
      <?php foreach($list_karyawan as $karyawan): ?>
        <option value="<?= $karyawan->id_karyawan ?>"><?= $karyawan->nama_karyawan ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group mb-3">
    <label for="kinerja">Kinerja</label>
    <select name="kinerja" id="kinerja" class="form-control" required>
      <option value="">-- Pilih Kinerja --</option>
      <option value="Sangat Baik">Sangat Baik</option>
      <option value="Baik">Baik</option>
      <option value="Cukup">Cukup</option>
    </select>
  </div>

  <div class="form-group mb-3">
    <label for="kehadiran">Kehadiran</label>
    <select name="kehadiran" id="kehadiran" class="form-control" required>
      <option value="">-- Pilih Kehadiran --</option>
      <option value="Lengkap">Lengkap</option>
      <option value="Kurang">Kurang</option>
    </select>
  </div>

  <div class="form-group mb-3">
    <label for="kreativitas">Kreativitas</label>
    <select name="kreativitas" id="kreativitas" class="form-control" required>
      <option value="">-- Pilih Kreativitas --</option>
      <option value="Tinggi">Tinggi</option>
      <option value="Sedang">Sedang</option>
      <option value="Rendah">Rendah</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Simpan</button>
  <button type="reset" class="btn btn-danger">Reset</button>
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
