<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('akun_model');
		$this->load->model('crud_model');
		$this->load->model('jadwal_model');
	}

	public function index()
	{
		$data['jumlah_karyawan'] = $this->crud_model->menghitung_jumlah_row('karyawan');
		$data['jumlah_penilaian'] = $this->crud_model->menghitung_jumlah_row('penilaian');

		$this->load->view('admin_index.php', $data);
	}

public function generate() {
    $data_training = $this->db->get('data_training')->result_array();
    $atribut = ['nama_karyawan', 'hari', 'jam'];

    // Load library
    $this->load->library('C45');
    $this->c45->initialize([
        'data' => $data_training,
        'atribut' => $atribut
    ]);

    $tree = $this->c45->build_tree($data_training, $atribut);

    // Tes input
    $input = [
        'nama_karyawan' => 'Andi',
        'hari' => 'Senin',
        'jam' => '08:00'
    ];

    $hasil = $this->c45->classify($tree, $input);

    echo "Hasil klasifikasi: " . $hasil;
}


	public function karyawan()
	{
		$data['array_karyawan'] = $this->crud_model->mengambil_data('karyawan');

		$this->load->view('admin_karyawan.php',$data);
	}

	public function jadwal()
	{
		$data['array_jadwal'] = $this->crud_model->mengambil_data('jadwal');

		$this->load->view('admin_jadwal.php', $data);
	}

	public function waktu()
	{
		$data['array_waktu'] = $this->crud_model->mengambil_data('waktu');

		$this->load->view('admin_waktu.php',$data);
	}

	public function penilaian()
	{
		$data['array_penilaian'] = $this->crud_model->get_penilaian_with_karyawan();

		$this->load->view('admin_penilaian.php',$data);
	}

	public function waktu_add()
	{
		$this->load->view('admin_waktu_add.php');
	}

	public function penilaian_add()
	{
		$data['list_karyawan'] = $this->crud_model->mengambil_data('karyawan');
		$this->load->view('admin_penilaian_add.php',$data);
	}

	public function jadwal_add()
	{
		$this->load->view('admin_jadwal_add.php');
	}

	public function reset_jadwal()
	{
		$this->db->truncate('Jadwal');

		//redirect
		redirect('/admin/jadwal', 'refresh');		
	}

	public function karyawan_add()
	{
		$this->load->view('admin_karyawan_add.php');
	}

	public function waktu_add_go()
	{
		// var_dump($_POST);die();
		//variabel data
		$data = array(
			'hari' => $this->input->post('hari'),
			'jam' => $this->input->post('jam')
		);
		
		//tampilkan view
		$this->crud_model->masukan_data('waktu', $data);
		
		//redirect
		redirect('/admin/waktu', 'refresh');

	}

	public function penilaian_add_go()
	{
		//variabel data
		$data = array(
			'id_karyawan' => $this->input->post('id_karyawan'),
			'kinerja' => $this->input->post('kinerja'),
			'kehadiran' => $this->input->post('kehadiran'),
			'kreativitas' => $this->input->post('kreativitas')
		);
		
		//tampilkan view
		$this->crud_model->masukan_data('penilaian', $data);

		//redirect
		redirect('/admin/penilaian', 'refresh');
	}

	public function karyawan_add_go()
	{
		//variabel data

		$data = array(
			'nama_karyawan' => $this->input->post('nama_karyawan'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'nomor_telpon' => $this->input->post('nomor_telpon')
		);
		
		//tampilkan view
		$this->crud_model->masukan_data('karyawan', $data);

		$obj_karyawan = $this->crud_model->get_last_row('karyawan');

		$data = array(
			'id_user' => $this->input->post('id_user'),
			'password_user' => $this->input->post('password_user'),
			'id_karyawan' => $obj_karyawan->id_karyawan
		);

		// var_dump($data);die();
		
		//tampilkan view
		$this->crud_model->masukan_data('user', $data);

		//redirect
		redirect('/admin/karyawan', 'refresh');

	}

	public function waktu_delete($id)
	{
		//load model hapus data
		$this->crud_model->menghapus_data_id('waktu','id',$id);

		//redirect
		redirect('/admin/waktu', 'refresh');
	}

	public function karyawan_delete($id_karyawan)
	{
		//load model hapus data
		$this->crud_model->menghapus_data_id('karyawan','id_karyawan',$id_karyawan);

		//redirect
		redirect('/admin/karyawan', 'refresh');
	}

	public function waktu_edit($id)
	{
		//load model crud
		$data['array_waktu'] = $this->crud_model->mengambil_data_id('waktu','id',$id);
		$data['obj_waktu'] = $data['array_waktu'][0];
		
		// var_dump($data);die();

		$this->load->view('admin_waktu_edit', $data);
	}	

	public function penilaian_edit($id)
	{
		//load model crud
		$data['array_penilaian'] = $this->crud_model->mengambil_data_id('penilaian','id_penilaian',$id);
		$data['penilaian'] = $data['array_penilaian'][0];		
		// var_dump($data);die();

		$this->load->view('admin_penilaian_edit', $data);
	}	

	public function karyawan_edit($id_karyawan)
	{
		//load model crud
		$data['array_karyawan'] = $this->crud_model->mengambil_data_id('karyawan','id_karyawan',$id_karyawan);
		$data['obj_karyawan'] = $data['array_karyawan'][0];
		
		// var_dump($data);die();

		$this->load->view('admin_karyawan_edit', $data);
	}	

	public function penilaian_edit_go()
	{
		// Ambil data dari form
		$data = array(
			'kinerja' => $this->input->post('kinerja'),
			'kehadiran' => $this->input->post('kehadiran'),
			'kreativitas' => $this->input->post('kreativitas')
		);

		// Proses update ke database
		$this->crud_model->mengubah_data_id('penilaian', $data, 'id_penilaian', $this->input->post('id_penilaian'));

		// Redirect kembali ke halaman daftar penilaian
		redirect('admin/penilaian', 'refresh');
	}

	public function karyawan_edit_go()
	{
		// var_dump($_POST);die();

		//variabel data edit
		$data = array(
			'nama_karyawan' => $this->input->post('nama_karyawan'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'nomor_telpon' => $this->input->post('nomor_telpon')		
		);

		//load model mengubah data
		$this->crud_model->mengubah_data_id('karyawan', $data,'id_karyawan',$this->input->post('id_karyawan'));
		
		//redirect
		redirect('admin/karyawan', 'refresh');
	}	

	function jadwal_otomatis(){
		set_time_limit(120);
		$this->load->model('m_admin');
		$data['penyewa'] = $this->m_admin->tampil_data('karyawan')->result();
		$data['waktu'] = $this->m_admin->tampil_data('waktu')->result();

		// var_dump($data);die();
		$this->load->view('v_admin_jadwal_otomatis',$data);		
	}


}
