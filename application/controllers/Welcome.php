<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Mod_auth');
	}
	public function index()
	{
		$this->supply();
		$this->load->view('guest/header');
		$this->load->view('guest/utama');
		$this->load->view('guest/footer');
	}
	public function about()
	{
		$this->load->view('guest/header');
		$this->load->view('guest/about');
		$this->load->view('guest/footer');
	}
	public function varietas()
	{
		$this->load->view('guest/header');
		$this->load->view('guest/varietas');
		$this->load->view('guest/footer');
	}
	public function produk()
	{
		$produk = $this->Mod_auth->getalldatakedelai();
		$array  = array(
			'kedelai' => $produk,
		);

		$this->load->view('guest/produk/header', $array);
		$this->load->view('guest/produk/allproduk');
		$this->load->view('guest/produk/footer');
	}
	public function cari()
	{


		$this->form_validation->set_rules('cari', 'Cari', 'required|trim');
		if ($this->form_validation->run() == false) {
			redirect('welcome/produk');
		} else {
			$cari = $this->input->post('cari');
			$produk = $this->Mod_auth->cariproduk($cari);
			$array  = array(
				'kedelai' => $produk
			);

			$this->load->view('guest/produk/header', $array);
			$this->load->view('guest/produk/allproduk');
			$this->load->view('guest/produk/footer');
		}
	}
	public function detailproduk($id)
	{
		$detailproduk = $this->Mod_auth->getprodukdetail($id);
		$petani = $this->db->get_where('data_penjual', ['email' => $detailproduk->email])->row_array();
		$ulasan = $this->Mod_auth->getulasanproduk($id);

		$Data = [
			'detail_produk' => $detailproduk,
			'petani' => $petani,
			'ulasan' => $ulasan
		];
		$this->load->view('guest/produk/header', $Data);
		$this->load->view('guest/produk/detailproduk');
		$this->load->view('guest/produk/footer');
	}

	public function grafik()
	{

		$produk = $this->Mod_auth->getgrafik();
		$produk1 = $this->Mod_auth->getgrafikdmnd();
		$produk2 = $this->Mod_auth->getgrafik_selisih();
		$array  = array(
			'grafik' => $produk,
			'grafikdmnd' => $produk1,
			'grafik_selisih' => $produk2
		);

		$this->load->view('guest/header', $array);
		$this->load->view('guest/grafik');
		$this->load->view('guest/footer');
	}
	public function supply()
	{
		$tgl = date('j');
		$bln = date('n');
		$thn = date('Y');
		$where = array(
			'tgl' => $tgl,
			'bln' => $bln,
			'tahun' => $thn,
		);
		$this->db->where($where);
		$grfik = $this->db->get('grafik')->row_array();
		$this->Mod_auth->deletegrafik($bln);
		if (!$grfik) {
			$db = $this->Mod_auth->updatedmdgrafik();
			if ($db) {
				foreach ($db as $record) {
					$wh = array(
						'varietas_kedelai' => strtoupper($record->varietas_kedelai),
						'jenis_kedelai' => $record->jenis_kedelai
					);
					$this->db->where($wh);
					$dt = $this->db->get('kedelai')->result();

					//$dt = $this->db->get_where('kedelai', ['varietas_kedelai' => strtoupper($record->varietas_kedelai)])->result();
					$varietas = strtoupper($record->varietas_kedelai . ' ' . $record->jenis_kedelai);
					//$varietas = strtoupper($record->varietas_kedelai);

					if ($dt) {
						$jml = 0;
						foreach ($dt as $row) {
							$jml = $jml + $row->stok;
						}
						$jml_stok = $jml;

						$where = array(
							'varietas_kedelai' => $varietas,
							'tgl' => $tgl,
							'bln' => $bln,
							'tahun' => $thn
						);
						$produk = $this->Mod_auth->wheregrafik($where);

						if ($produk) {
							$array = [
								'stok' => $jml_stok
							];
							$this->Mod_auth->updategrafik($where, $array);
						} else {
							$array = [
								'varietas_kedelai' => $varietas,
								'stok' => $jml_stok,
								'tgl' => $tgl,
								'bln' => $bln,
								'tahun' => $thn,
								'tipe' => 'supply'
							];
							$this->Mod_auth->insertgrafik($array);
						}
					}
				}
			}
			$dm = $this->Mod_auth->updatedmdgrafik();
			if ($dm) {
				foreach ($dm as $record) {
					$varietas = strtoupper($record->varietas_kedelai . ' ' . $record->jenis_kedelai);
					$array = [
						'varietas_kedelai' => $varietas,
						'stok' => 0,
						'tgl' => $tgl,
						'bln' => $bln,
						'tahun' => $thn,
						'tipe' => 'demand'
					];
					$this->Mod_auth->insertgrafik($array);
				}
			}
		}
	}
	public function grafik_selisih()
	{
		$dt = $this->Mod_auth->wheregrafik_selisih();
		$tgl = date('j');
		$bln = date('n');

		for ($i = 1; $i <= $tgl; $i++) {
			$where = array(
				'tgl' => $i,
				'bln' => $bln
			);
			$this->db->where($where);
			$grfik_selisih = $this->db->get('grafik_selisih')->row_array();
			if ($grfik_selisih) {
			} else {
				foreach ($dt as $record) {
					//supply
					$wh = array(
						'varietas_kedelai' => $record->varietas_kedelai,
						'tgl' => $i,
						'bln' => $bln,
						'tipe' => 'supply'
					);
					$this->db->where($wh);
					$dtsupply = $this->db->get('grafik')->row_array();
					//demand
					$whr = array(
						'varietas_kedelai' => $record->varietas_kedelai,
						'tgl' => $i,
						'bln' => $bln,
						'tipe' => 'demand'
					);
					$this->db->where($whr);
					$dtdmd = $this->db->get('grafik')->row_array();
					if($dtsupply['stok'] && $dtdmd['stok']){
					$selisih = $dtsupply['stok'] - $dtdmd['stok'];
					};
					$varietas = $record->varietas_kedelai;
					$array = [
						'varietas_kedelai' => $varietas,
						'stok' => $selisih,
						'tgl' => $i,
						'bln' => $bln
					];
					$this->Mod_auth->insertgrafik_selisih($array);
				}
			}
		}
		redirect('welcome/grafik');
	}
	public function download_manual_book()
	{
		$this->load->helper('download');
		force_download('assets/manual_book/Panduan User.pdf', NULL);
	}

}