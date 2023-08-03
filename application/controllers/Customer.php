<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation', 'upload');
        $this->load->model('Mod_auth');
        date_default_timezone_set('Asia/Jakarta');
        if ($this->session->userdata('email3') == null) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert"> Sesi Anda Berakhir , Silahkan Masuk Kembali </div>');
            redirect('auth');
            die;
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();
        $email = $data['user']['email'];
        $alamat = $this->db->get_where('customer_alamat', ['email' => $email])->row_array();
        $produk = $this->Mod_auth->getalldatakedelai();
        $array  = array(
            'info' => $data['user'],
            'kedelai' => $produk
        );
        if ($alamat) {
        } else {
            $this->session->set_flashdata('cek', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
            $this->session->set_flashdata('top', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
        }
        if ($data['user']['no_telephone'] == '-' or $data['user']['foto'] == 'default.jpg') {
            $this->session->set_flashdata('profile', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
            $this->session->set_flashdata('top', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
        }

        $this->load->view('customer/header', $array);
        $this->load->view('customer/allproduk');
        $this->load->view('customer/footer');
    }
    public function cari()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();
        $email = $data['user']['email'];
        $alamat = $this->db->get_where('customer_alamat', ['email' => $email])->row_array();

        $this->form_validation->set_rules('cari', 'Cari', 'required|trim');
        if ($this->form_validation->run() == false) {
            redirect('customer');
        } else {
            $cari = $this->input->post('cari');
            $produk = $this->Mod_auth->cariproduk($cari);
            $array  = array(
                'info' => $data['user'],
                'kedelai' => $produk
            );
            if ($alamat) {
            } else {
                $this->session->set_flashdata('cek', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
                $this->session->set_flashdata('top', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
            }
            if ($data['user']['no_telephone'] == '-' or $data['user']['foto'] == 'default.jpg') {
                $this->session->set_flashdata('profile', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
                $this->session->set_flashdata('top', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
            }

            $this->load->view('customer/header', $array);
            $this->load->view('customer/allproduk');
            $this->load->view('customer/footer');
        }
    }
    public function detailproduk($id)
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();

        $email = $data['user']['email'];
        $alamat = $this->db->get_where('customer_alamat', ['email' => $email])->row_array();
        $detailproduk = $this->Mod_auth->getprodukdetail($id);
        $petani = $this->db->get_where('data_penjual', ['email' => $detailproduk->email])->row_array();
        $ulasan = $this->Mod_auth->getulasanproduk($id);

        $array  = array(
            'info' => $data['user'],
            'detail_produk' =>  $detailproduk,
            'petani' => $petani,
            'ulasan' => $ulasan
        );
        if ($alamat) {
        } else {
            $this->session->set_flashdata('cek', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
        }

        $this->load->view('customer/header', $array);
        $this->load->view('customer/detailproduk');
        $this->load->view('customer/footer');
    }
    public function pembelian($id)
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();
        $email = $data['user']['email'];
        $detailproduk = $this->Mod_auth->getprodukdetail($id);
        $alamat = $this->db->get_where('customer_alamat', ['email' => $email])->row_array();
        $email_penjual = $detailproduk->email;
        $alamatpenjual = $this->db->get_where('data_penjual', ['email' => $email_penjual])->row_array();
        $array  = array(
            'info' => $data['user'],
            'detail_produk' =>  $detailproduk,
            'alamat' => $alamat,
            'alamat_penjual' => $alamatpenjual,
        );
        if ($alamat) {
        } else {
            $this->session->set_flashdata('cek', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
        }

        $this->load->view('customer/header', $array);
        $this->load->view('customer/pembelian');
        $this->load->view('customer/footer');
    }
    public function profile()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();
        $email = $data['user']['email'];
        $alamat = $this->db->get_where('customer_alamat', ['email' => $email])->row_array();
        $array  = array(
            'info' => $data['user'],
        );
        if ($alamat) {
        } else {
            $this->session->set_flashdata('cek', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
        }

        $this->load->view('customer/header', $array);
        $this->load->view('customer/profile');
        $this->load->view('customer/footer');
    }

    public function halaman_edit_profile()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();
        $email = $data['user']['email'];
        $alamat = $this->db->get_where('customer_alamat', ['email' => $email])->row_array();
        $array  = array(
            'info' => $data['user'],
        );
        if ($alamat) {
        } else {
            $this->session->set_flashdata('cek', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
        }

        $this->load->view('customer/header', $array);
        $this->load->view('customer/edit_profile');
        $this->load->view('customer/footer');
    }

    public function edit_profile()
    {

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $foto_lm = $this->input->post('foto_lama');
        $namafoto = $id . '-' . $nama;
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path']          = './assets/img/profile/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name'] = $namafoto;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $foto = $foto_lm;
            } else {
                $foto = $this->upload->data('file_name');
            }
            //jika foto berhasil di upload


            $insert = [
                'nama' => $this->input->post('nama'),
                'no_telephone' => $this->input->post('no_tlp'),
                'foto' => $foto
            ];
            $this->Mod_auth->edit_profile($id, $insert);
            redirect('customer');
        }
    }
    public function alamat()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();
        $email = $data['user']['email'];
        $alamat = $this->db->get_where('customer_alamat', ['email' => $email])->row_array();
        $array  = array(
            'info' => $data['user'],
            'alamat' => $alamat
        );

        $this->load->view('customer/header', $array);
        $this->load->view('customer/alamat');
        $this->load->view('customer/footer');
    }

    public function tambah_alamat()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('detail_lainnya', 'Detail_lainnya', 'required|trim');
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();
        $array  = array(
            'info' => $data['user'],

        );
        if ($this->form_validation->run() == false) {
            $this->load->view('customer/header', $array);
            $this->load->view('customer/tambah_alamat');
            $this->load->view('customer/footer');
        } else {
            $insert = [
                'email' => $this->input->post('email'),
                'nama_penerima' => $this->input->post('nama'),
                'id_kota' => $this->input->post('id_kota'),
                'kota_kab' => $this->input->post('kota'),
                'kecamatan' => $this->input->post('kecamatan'),
                'detail_lainnya' => $this->input->post('detail_lainnya'),
                'no_telepon' => $this->input->post('no_tlp'),
            ];
            $this->Mod_auth->insertalamat($insert);
            redirect('customer');
        }
    }
    public function edit_alamat()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('detail_lainnya', 'Detail_lainnya', 'required|trim');
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();

        $email = $data['user']['email'];
        $alamat = $this->db->get_where('customer_alamat', ['email' => $email])->row_array();
        $array  = array(
            'info' => $data['user'],
            'alamat' => $alamat

        );
        if ($this->form_validation->run() == false) {
            $this->load->view('customer/header', $array);
            $this->load->view('customer/edit_alamat');
            $this->load->view('customer/footer');
        } else {

            $email = $this->input->post('email');
            $insert = [
                'nama_penerima' => $this->input->post('nama'),
                'id_kota' => $this->input->post('id_kota'),
                'kota_kab' => $this->input->post('kota'),
                'kecamatan' => $this->input->post('kecamatan'),
                'detail_lainnya' => $this->input->post('detail_lainnya'),
                'no_telepon' => $this->input->post('no_tlp'),
            ];
            $this->Mod_auth->edit_alamat($email, $insert);

            redirect('customer');
        }
    }
    //ajukan penjual
    public function ajukan_penjual()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();
        $email = $data['user']['email'];
        $alamat = $this->db->get_where('temp_ajuan', ['email' => $email])->row_array();
        if ($alamat) {
            redirect('Customer/menunggu');
        } else {



            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email3')])->row_array();
            $email = $data['user']['email'];
            $array  = array(
                'info' => $data['user'],
            );
            $this->load->view('customer/header', $array);
            $this->load->view('customer/ajukan_penjual');
            $this->load->view('customer/footer');
        }
    }

    public function form_ajuan()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');

        $nm = $this->input->post('nama_bank');
        $logo = $nm . '.png';

        $namafoto = $id . '-' . $nama . '- Ktp';
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path']          = './assets/img/profile/ktp';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name'] = $namafoto;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo 'gagal';
                die;
            } else {
                $foto = $this->upload->data('file_name');
            }
            //jika foto berhasil di upload


            $data_penjual = [
                'id' => $this->input->post('id'),
                'email' => $this->input->post('email'),
                'nik' => $this->input->post('nik'),
                'nama_penjual' => $this->input->post('nama'),
                'kelompok_tani' => $this->input->post('kelompok_tani'),
                'id_kota' => $this->input->post('id_kota'),
                'kota_kab' => $this->input->post('kota'),
                'kecamatan' => $this->input->post('kecamatan'),
                'detail_lainnya' => $this->input->post('detail_lainnya'),
                'no_telepon' => $this->input->post('no_tlp'),
                'foto' => $foto
            ];
            $info_bank = [
                'email' => $this->input->post('email'),
                'nama_bank' => $this->input->post('nama_bank'),
                'nama_rekening' => $this->input->post('nama_rekening'),
                'no_rekening' => $this->input->post('nomor_rekening'),
                'logo' => $logo

            ];
            $temp_ajuan = [

                'email' => $this->input->post('email'),
                'date' => time()
            ];
            $this->Mod_auth->ajuan_data_penjual($data_penjual);
            $this->Mod_auth->ajuan_bank_penjual($info_bank);
            $this->Mod_auth->ajuan_temp($temp_ajuan);
            redirect('customer/menunggu');
        }
    }
    public function menunggu()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();
        $email = $data['user']['email'];
        $alamat = $this->db->get_where('customer_alamat', ['email' => $email])->row_array();
        $array  = array(
            'info' => $data['user'],
        );
        if ($alamat) {
        } else {
            $this->session->set_flashdata('cek', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
        }

        $this->load->view('customer/header', $array);
        $this->load->view('customer/menunggu_konfirmasi');
        $this->load->view('customer/footer');
    }

    public function checkout()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();
        $id_user = $data['user']['id'];
        $time = time();
        $id_pesanan = $id_user . '-' . $time;

        $insert = [
            'id_pesanan' => $id_pesanan,
            'email_pembeli' => $this->input->post('email_pembeli'),
            'email_penjual' => $this->input->post('email_penjual'),
            'id_kedelai' => $this->input->post('id_produk'),
            'nama_kedelai' => $this->input->post('nama_produk'),
            'jumlah' => $this->input->post('jumlah'),
            'subtotal_pesanan' => $this->input->post('subtotal_pesanan'),
            'subtotal_pengiriman' => $this->input->post('subtotal_pengiriman'),
            'total_harga' => $this->input->post('total_harga'),
            'jasa_pengiriman' => $this->input->post('jasa_kirim'),
            'nama_penerima' => $this->input->post('nama_penerima'),
            'alamat_penerima' => $this->input->post('alamat_penerima'),
            'no_telepon' => $this->input->post('no_tlp'),
            'status' => 1,
            'foto' => '-',
            'tgl' => date('j'),
            'bln' => date('n'),
            'thn' => date('Y'),
            'date_created' => time()
        ];
        $varietas = strtoupper($this->input->post('nama_produk'));
        $jml = $this->input->post('jumlah');
        //notif
        $dari=$insert['email_pembeli'];
        $untuk=$insert['email_penjual'];
        $title="Pesanan Baru !!";
        $link= base_url('Admin/Pesanan');
        $text="Anda Mendapat Pesanan Baru dari ".$insert['nama_penerima']."  Silahkan Lihat Pesanan</a> ";
        $this->notifikasi($dari,$untuk,$title,$link,$text);
        //
        $this->_emailpesanan($insert, 'pesanan_baru');
        $this->Mod_auth->tambah_pesanan($insert);
        $this->demand($varietas, $jml);
        $this->menunggu_pembayaran($id_pesanan);
    }
    public function demand($varietas_kedelai, $jml)
    {


        $varietas = $varietas_kedelai;
        $tgl = date('j');
        $bln = date('n');
        $thn = date('Y');
        $time = time();

        $where = array(
            'varietas_kedelai' => $varietas,
            'tgl' => $tgl,
            'bln' => $bln,
            'tahun' => $thn,
            'tipe' => 'demand'
        );
        $this->db->where($where);
        $produk = $this->db->get('grafik')->row_array();

        // $produk = $this->Mod_auth->wheregrafik($where);
        if ($produk) {
            $ttl = $produk['stok'] + $jml;
            $array = [
                'stok' => $ttl
            ];

            $this->Mod_auth->updategrafik($where, $array);
        } else {
            $array = [
                'varietas_kedelai' => $varietas,
                'stok' => $jml,
                'tgl' => $tgl,
                'bln' => $bln,
                'tahun' => $thn,
                'tipe' => 'demand'
            ];
            $this->Mod_auth->insertgrafik($array);
        }
    }
    public function menunggu_pembayaran($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();
        $email = $data['user']['email'];
        $pesanan = $this->Mod_auth->konfirmasi_pembayaran($id);
        $email_penjual = $pesanan->email_penjual;
        $bank = $this->db->get_where('informasi_bank', ['email' => $email_penjual])->row_array();
        $alamat = $this->db->get_where('customer_alamat', ['email' => $email])->row_array();
        $array  = array(
            'info' => $data['user'],
            'pesanan' => $pesanan,
            'bank' => $bank
        );
        if ($alamat) {
        } else {
            $this->session->set_flashdata('cek', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
        }

        $this->load->view('customer/header', $array);
        $this->load->view('customer/menunggu_pembayaran');
        $this->load->view('customer/footer');
    }
    public function konfirmasi_pembayaran()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();
        $email = $data['user']['email'];
        //$pesanan = $this->db->get_where('pesanan', ['email_pembeli' => $email])->row_array();
        $id_pesanan = $this->input->post('id_pesanan');
        $status = 1;
        $foto = $_FILES['foto'];
        if (count($foto) == 0) {
        } else {
            $config['upload_path']          = './assets/img/bukti/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name'] = $id_pesanan;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $foto = '';
            } else {
                $foto = $this->upload->data('file_name');

                $status = 2;
            }
            //jika foto berhasil di upload

            $insert = [
                'status' => $status,
                'foto' => $foto
            ];
            $this->Mod_auth->bukti_pembayaran($id_pesanan, $insert);
            //notif
            $dari=$data['user']['email'];
            $eml=$this->db->get_where('pesanan', ['id_pesanan'=>$id_pesanan])->row_array();
            $untuk=$eml['email_penjual'];
            $title="Pesanan Telah Di bayar !!";
            $link= base_url('Admin/Pesanan');
            $text="Pesanan ".$id_pesanan." Telah Di Bayar !! . Silahkan Lihat Pesanan</a> ";
            $this->notifikasi($dari,$untuk,$title,$link,$text);
            $email=[
                'dari'=>  $dari,
                'email_penjual'=>  $untuk,
                'id_pesanan' => $id_pesanan
            ];
            $this->_emailpesanan($email, 'Pembayaran');
            $this->pembayaran_berhasil($id_pesanan);
        }
    }
    //pembayaran berhasil
    public function pembayaran_berhasil($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();
        $email = $data['user']['email'];
        $foto = $this->db->get_where('pesanan', ['id_pesanan' => $id])->row_array();

        $array  = array(
            'info' => $data['user'],
            'foto' => $foto
        );


        $this->load->view('customer/header', $array);
        $this->load->view('customer/pembayaran_berhasil');
        $this->load->view('customer/footer');
    }

    public function pesanan_saya()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email3')])->row_array();
        $email = $data['user']['email'];
        $cek = $this->Mod_auth->pesanan_saya($email);
        foreach ($cek as $row) {
            if ($row->status == 1) {
                if (time() - $row->date_created > (60 * 60 * 48)) {
                    $this->Mod_auth->deletepesanan($row->id_pesanan);
                }
            }
        }
        $status = $this->Mod_auth->pesanan_saya($email);
        $kedelai = $this->Mod_auth->join_pesanan_kedelai($email);


        $array  = array(
            'info' => $data['user'],
            'status' => $status,
            'kedelai' => $kedelai
        );


        $this->load->view('customer/header', $array);
        $this->load->view('customer/pesanan_saya');
        $this->load->view('customer/footer');
    }
    public function pesanan_diterima($id_pesanan)
    {
        $insert = [
            'status' => 5
        ];
        $this->Mod_auth->bukti_pembayaran($id_pesanan, $insert);
        $this->feedback($id_pesanan);
    }
    private function _emailpesanan($data, $type)
    {

        $this->load->library('email');
        $this->email->from('taningudimakmur2@gmail.com', 'Ngudi Makmur');
        if ($type == 'pesanan_baru') {
            $this->email->to($data['email_penjual']);
            $this->email->subject('Pesanan Baru Di Terima');
            $this->email->message('Anda Memiliki Pesanan Baru dengan id Pesanan ' . $data['id_pesanan'] . ' Segera Proses Pesanan !!! ');
        }else if ($type == 'pembayaran') {
            $this->email->to($data['email_penjual']);
            $this->email->subject('Pembayaran Telah Masuk');
            $this->email->message($data['dari'].' Telah Melakukan Pembayaran dengan id ' . $data['id_pesanan'] . ' Segera Proses Pesanan !!! ');
        }
        if ($this->email->send()) {
            return true;
        }
    }

    public function feedback($id_pesanan)
    {
        $pesanan = $this->db->get_where('pesanan', ['id_pesanan' => $id_pesanan])->row_array();
        $kedelai = $this->db->get_where('kedelai', ['id' => $pesanan['id_kedelai']])->row_array();

        $array = [
            'pembeli' => $pesanan,
            'pesanan' => $kedelai
        ];

        // $this->load->view('customer/header');
        $this->load->view('customer/rating', $array);
        // $this->load->view('customer/footer');
    }

    public function feedback_post()
    {
        $star = $this->input->post('star');
        $komen = $this->input->post('komentar');

        if ($star  || $komen) {
            $array = [
                'id_pesanan' => $this->input->post('id_pesanan'),
                'id_penjual' => $this->input->post('id_penjual'),
                'id_produk' => $this->input->post('id_kedelai'),
                'email_pembeli' => $this->input->post('email_pembeli'),
                'star' => $this->input->post('star'),
                'komentar' => $this->input->post('komentar'),

            ];
            $this->Mod_auth->insertfeedback($array);
        }

        redirect('customer/pesanan_saya');
    }
    public function notifikasi($dari,$untuk,$title,$link,$text){
        //untuk notif penjual
        $notif = array(
            'role'=>2,
            'from_email' =>$dari,
            'to_email' =>$untuk,
            'title' =>$title, 
            'link'=>$link,
            'text' =>$text,
            'time' =>time()
        );
       $this->Mod_auth->notifikasi($notif);

    }
    
}