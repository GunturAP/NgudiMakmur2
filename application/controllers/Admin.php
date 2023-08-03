<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation', 'upload');
        $this->load->model('Mod_auth');
        if ($this->session->userdata('email2') == null) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert"> Sesi Anda Berakhir , Silahkan Masuk </div>');
            redirect('auth');
            die;
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email2')])->row_array();
        $email = $data['user']['email'];
        $where=array(
            'email_penjual' => $email,
            'bln'=>date('n'),
            'thn'=>date('Y'),
            'status <' => 6  
          );
        $pendapatan=$this->Mod_auth->total_pendapatan_penjual($where);
        $transaksi=$this->Mod_auth->total_transaksi_penjual($where);
        
        $array  = array(
            'pendapatan'=>$pendapatan['subtotal_pesanan'],
            'total_transaksi'=>$transaksi,
            'info' => $data['user'],
            'nav'=> 'active',
            'notif'=> $this->Mod_auth->get_notif($email),
        );
        $this->load->view('admin/header', $array);
        $this->load->view('admin/topnav');
        $this->load->view('admin/dashboard', $array);
        $this->load->view('admin/footer');
    }
    public function persediaan()
    {
        
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email2')])->row_array();
        $nama = $data['user']['email'];
        $email = $data['user']['email'];
        $where1 = "email_penjual='" . $email . "' AND status <'3'";
        $pesanan = $this->Mod_auth->pesanan_baru($where1);
        
        $produk = $this->Mod_auth->getdatakedelai($nama);
        $stok_menipis=false;
        foreach ($produk as $stok) {
            if($stok->stok < 50){
                $stok_menipis=true;
            }
        };
        if ($stok_menipis) {
            $this->session->set_flashdata('top', '<div class="alert alert-warning alert-dismissible">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         <strong> Stok Kedelai Menipis Silahkan untuk  Cek dan Perbaharui Stok</strong> 
                     </div>');
        }
        $array  = array(
            'kedelai' => $produk,
            'info' => $data['user'],
            'pesanan' => $pesanan,
            'nav'=> 'active',
            'notif'=> $this->Mod_auth->get_notif($email),
        );

        $this->load->view('admin/header', $array);
        $this->load->view('admin/topnav');
        $this->load->view('admin/produk', $array);
        $this->load->view('admin/footer');
    }
    public function tambah_persediaan()
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email2')])->row_array();
        $email = $data['user']['email'];
        $array  = array(
            'info' => $data['user'],
            'notif'=> $this->Mod_auth->get_notif($email),
            
        );
        $this->form_validation->set_rules('jenis_kedelai', 'Jenis_kedelai', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|callback_validasi_harga');
      
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header', $array);
            $this->load->view('admin/topnav');
            $this->load->view('admin/tambahproduk');
            $this->load->view('admin/footer');
        } else {
            $id_petani = $data['user']['id'];
            $nama_petani = $data['user']['nama'];
            $jenis_kedelai = $this->input->post('jenis_kedelai');
            $varietas_kedelai = strtoupper($this->input->post('varietas_kedelai'));
            $namafoto = $id_petani . '-' . $varietas_kedelai . '-' . $jenis_kedelai;
            $foto = $_FILES['foto'];
            $waktu = time();

            if (!empty($_FILES['foto']['name'])) {
                $filesCount = count($_FILES['foto']['name']);

                for ($i = 0; $i < $filesCount; $i++) {
                    $nmfoto = $namafoto . '-' . $i;

                    $_FILES['file']['name']     = $_FILES['foto']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['foto']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['foto']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['foto']['size'][$i];
                    //upload config
                    $config['upload_path']          = './assets/img/produk/';
                    $config['allowed_types']        = 'jpg|png|jpeg';
                    $config['file_name'] = $nmfoto;
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo 'gagal';
                        die;
                    } else {
                        $fto[$i] = $this->upload->data('file_name');
                    }
                }
                $arrayfoto = serialize($fto);
                $insert = [
                    'email' => $email,
                    'nama_petani' => $nama_petani,
                    'jenis_kedelai' => $jenis_kedelai,
                    'varietas_kedelai' => $varietas_kedelai,
                    'grade' => $this->input->post('grade'),
                    'harga' => $this->input->post('harga'),
                    'stok' => $this->input->post('total_persediaan'),
                    'foto_kedelai' => $arrayfoto,
                    'info_lain' => $this->input->post('info_lain'),
                ];
                $this->Mod_auth->insertkedelai($insert);
                $this->supply();
                $this->grafik_selisih();
                $this->session->set_flashdata('msg', 'Berhasil Menambah Data Produk');
                redirect('admin/persediaan');
            }
        }
    }
    public function edit_persediaan($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email2')])->row_array();
        $produk = $this->db->get_where('kedelai', ['id' => $id])->row_array();
        
        $email = $data['user']['email'];
        $array  = array(
            'kedelai' => $produk,
            'info' => $data['user'],
            'notif'=> $this->Mod_auth->get_notif($email),

        );
        $this->load->view('admin/header', $array);
        $this->load->view('admin/topnav');
        $this->load->view('admin/edit_produk', $array);
        $this->load->view('admin/footer');
    }

    public function edit_persediaan_post()
    {
        $this->form_validation->set_rules('harga', 'Harga', 'required|callback_validasi_harga');
        if ($this->form_validation->run() == false) {
            $id = $this->input->post('id');
            $this->edit_persediaan($id);
        }else{
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email2')])->row_array();
            $id_petani = $data['user']['id'];

            $jenis_kedelai = $this->input->post('jenis_kedelai');
            $varietas_kedelai = strtoupper($this->input->post('varietas_kedelai'));
            $namafoto = $id_petani . '-' . $varietas_kedelai . '-' . $jenis_kedelai;
            $id = $this->input->post('id');
            $foto_lm = $this->input->post('foto_lama');
            $foto = $_FILES['foto'];

            if (!empty($_FILES['foto']['name']) and $_FILES['foto']['name']['0'] != '') {
                $filesCount = count($_FILES['foto']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $nmfoto = $namafoto . '-' . $i;
                    $_FILES['file']['name']     = $_FILES['foto']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['foto']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['foto']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['foto']['size'][$i];
                    //upload config
                    $config['upload_path']          = './assets/img/produk/';
                    $config['allowed_types']        = 'jpg|png|jpeg';
                    $config['file_name'] = $nmfoto;
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                    } else {
                        $fto[$i] = $this->upload->data('file_name');
                    }
                }
                $arrayfoto = serialize($fto);
                $insert = [
                    'jenis_kedelai' => $jenis_kedelai,
                    'varietas_kedelai' => $varietas_kedelai,
                    'grade' => $this->input->post('grade'),
                    'harga' => $this->input->post('harga'),
                    'stok' => $this->input->post('total_persediaan'),
                    'foto_kedelai' => $arrayfoto,
                    'info_lain' => $this->input->post('info_lain'),
                ];
            } else {

                $insert = [
                    'jenis_kedelai' => $jenis_kedelai,
                    'varietas_kedelai' => $varietas_kedelai,
                    'grade' => $this->input->post('grade'),
                    'harga' => $this->input->post('harga'),
                    'stok' => $this->input->post('total_persediaan'),
                    'info_lain' => $this->input->post('info_lain'),
                ];
            }

            $this->Mod_auth->editkedelai($id, $insert);
            $this->supply();
            $this->grafik_selisih();
            $this->session->set_flashdata('msg', 'Data Produk Berhasil Di Edit');

            redirect('admin/persediaan');
        }
    }
    public function supply()
    {
        $db = $this->Mod_auth->updatedmdgrafik();

        if ($db) {
            foreach ($db as $record) {
                $wh = array(
                    'varietas_kedelai' => strtoupper($record->varietas_kedelai),
                    'jenis_kedelai' => $record->jenis_kedelai
                );
                $this->db->where($wh);
                $dt = $this->db->get('kedelai')->result();
                // $dt = $this->db->get_where('kedelai', ['varietas_kedelai' => strtoupper($record->varietas_kedelai)])->result();
                $varietas = strtoupper($record->varietas_kedelai . ' ' . $record->jenis_kedelai);

                $tgl = date('j');
                $bln = date('n');
                $thn = date('Y');

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
                        'tahun' => $thn,
                        'tipe' => 'supply'
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

                        $arr = [
                            'varietas_kedelai' => $varietas,
                            'stok' => 0,
                            'tgl' => $tgl,
                            'bln' => $bln,
                            'tahun' => $thn,
                            'tipe' => 'demand'
                        ];
                        $this->Mod_auth->insertgrafik($arr);
                    }
                }
            }
        }
    }

    public function grafik_selisih()
    {
        $dt = $this->Mod_auth->wheregrafik_selisih();
        $tgl = date('j');
        $bln = date('n');
        $where = array(
            'tgl' => $tgl,
            'bln' => $bln
        );
        $this->db->where($where);
        $grfik_selisih = $this->db->get('grafik_selisih')->row_array();
        if ($grfik_selisih) {
            foreach ($dt as $record) {
                //supply
                $wh = array(
                    'varietas_kedelai' => $record->varietas_kedelai,
                    'tgl' => $tgl,
                    'bln' => $bln,
                    'tipe' => 'supply'
                );
                $this->db->where($wh);
                $dtsupply = $this->db->get('grafik')->row_array();
                //demand
                $whr = array(
                    'varietas_kedelai' => $record->varietas_kedelai,
                    'tgl' => $tgl,
                    'bln' => $bln,
                    'tipe' => 'demand'
                );
                $this->db->where($whr);
                $dtdmd = $this->db->get('grafik')->row_array();
                $selisih = $dtsupply['stok'] - $dtdmd['stok'];

                $varietas = $record->varietas_kedelai;
                $where = [
                    'varietas_kedelai' => $varietas,
                    'tgl' => $tgl,
                    'bln' => $bln
                ];
                $array = [
                    'stok' => $selisih
                ];
                $this->Mod_auth->updategrafik_selisih($where, $array);
            }
        } else {
            foreach ($dt as $record) {
                //supply
                $wh = array(
                    'varietas_kedelai' => $record->varietas_kedelai,
                    'tgl' => $tgl,
                    'bln' => $bln,
                    'tipe' => 'supply'
                );
                $this->db->where($wh);
                $dtsupply = $this->db->get('grafik')->row_array();
                //demand
                $whr = array(
                    'varietas_kedelai' => $record->varietas_kedelai,
                    'tgl' => $tgl,
                    'bln' => $bln,
                    'tipe' => 'demand'
                );
                $this->db->where($whr);
                $dtdmd = $this->db->get('grafik')->row_array();
                $selisih = $dtsupply['stok'] - $dtdmd['stok'];

                $varietas = $record->varietas_kedelai;
                $array = [
                    'varietas_kedelai' => $varietas,
                    'stok' => $selisih,
                    'tgl' => $tgl,
                    'bln' => $bln
                ];
                $this->Mod_auth->insertgrafik_selisih($array);
            }
        }
    }
    public function delete_persediaan($id)
    {
        $foto = $this->Mod_auth->caridatakedelai(['id' => $id]);
        $fotoall = unserialize($foto['foto_kedelai']);
        foreach ($fotoall as $fot) {
            unlink('assets/img/produk/' . $fot);
        }
        $this->Mod_auth->deletekedelai($id);
        $this->session->set_flashdata('msg', 'Data Produk Berhasil Di Hapus');
        redirect('admin/persediaan');
    }
    //edit Profile
    public function edit_profile($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email2')])->row_array();
        $produk = $this->db->get_where('user', ['id' => $id])->row_array();
        $alamat = $this->db->get_where('data_penjual', ['email' => $produk['email']])->row_array();
        $bank = $this->db->get_where('informasi_bank', ['email' => $produk['email']])->row_array();
        
        $email = $data['user']['email'];
        $array  = array(
            'bank' => $bank,
            'alamat' => $alamat,
            'penjual' => $produk,
            'info' => $data['user'],
            'notif'=> $this->Mod_auth->get_notif($email),
        );

        $this->load->view('admin/header', $array);
        $this->load->view('admin/topnav');
        $this->load->view('admin/edit_profile', $array);
        $this->load->view('admin/footer');
    }
    public function edit_profile_post()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email2')])->row_array();
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $namafoto = $id . '-' . $nama;
        $id = $this->input->post('id');
        $email = $this->input->post('email');

        $foto_lm = $this->input->post('foto_lama');
        $foto = $_FILES['foto'];
        if ($foto = '') {
            $foto = $foto_lm;
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


            $user = [
                'nama' => $this->input->post('nama'),
                'no_telephone' => $this->input->post('no_telepon'),
                'foto' => $foto
            ];
            $this->Mod_auth->editpenjual($id, $user);

            $alamat = [
                'nama_penjual' => $this->input->post('nama'),
                'kelompok_tani' => $this->input->post('kelompok_tani'),
                'id_kota' => $this->input->post('id_kota'),
                'kota_kab' => $this->input->post('kota'),
                'kecamatan' => $this->input->post('kecamatan'),
                'detail_lainnya' => $this->input->post('detail_lainnya'),
                'no_telepon' => $this->input->post('no_telepon'),

            ];
            $this->Mod_auth->edit_datapenjual($email, $alamat);

            $bank = [
                'nama_bank' => $this->input->post('nama_bank'),
                'nama_rekening' => $this->input->post('nama_rekening'),
                'no_rekening' => $this->input->post('no_rekening'),
                'logo' => $this->input->post('nama_bank') . '.png'

            ];
            $this->Mod_auth->editbank($email, $bank);

            redirect('admin/persediaan');
        }
    }



    //pesanan
    public function pesanan()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email2')])->row_array();
        $email = $data['user']['email'];

        $where = "email_penjual='" . $email . "' AND status <'3'";
        $produk = $this->Mod_auth->pesanan_baru($where);
        $array  = array(
            'pesanan' => $produk,
            'info' => $data['user'],
            'notif'=> $this->Mod_auth->get_notif($email),
        );


        $this->load->view('admin/header', $array);
        $this->load->view('admin/topnav');
        $this->load->view('admin/pesanan');
        $this->load->view('admin/footer');
    }
    public function proses_pesanan($id_pesanan)
    {

        $data = $this->db->get_where('pesanan', ['id_pesanan' => $id_pesanan])->row_array();
        $id_kedelai = $data['id_kedelai'];
        $kedelai = $this->db->get_where('kedelai', ['id' => $id_kedelai])->row_array();
        $jumlah = $kedelai['stok'] - $data['jumlah'];

        $insert = [
            'status' => 3
        ];
        $stok = [
            'stok' => $jumlah,
        ];
        $this->Mod_auth->bukti_pembayaran($id_pesanan, $insert);
        $this->Mod_auth->editkedelai($id_kedelai, $stok);
        redirect('admin/pesanan');
    }
    public function tolak_pesanan($id_pesanan)
    {
        // $this->Mod_auth->deletepesanan($id_pesanan);
        $data = $this->db->get_where('pesanan', ['id_pesanan' =>
        $id_pesanan])->row_array();
        $penjual = $this->db->get_where('data_penjual', ['email' =>
        $data['email_penjual']])->row_array();
        $no_penjual = $penjual['no_telepon'];
        $insert = [
            'status' => 6
        ];
        $this->Mod_auth->bukti_pembayaran($id_pesanan, $insert);
        $this->_emailpesanan($data, $no_penjual, 'tolak_pesanan');
        redirect('admin/pesanan');
    }
    public function pesanan_di_proses()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email2')])->row_array();

        $email = $data['user']['email'];
        $where = "email_penjual='" . $email . "' AND status BETWEEN '3' AND '4'";

        $produk = $this->Mod_auth->pesanan_baru($where);
        $array  = array(
            'pesanan' => $produk,
            'info' => $data['user'],
            'notif'=> $this->Mod_auth->get_notif($email),
        );

        $this->load->view('admin/header', $array);
        $this->load->view('admin/topnav');
        $this->load->view('admin/pesanan_diproses');
        $this->load->view('admin/footer');
    }
    public function pesanan_dikirim()
    {
        $id_pesanan = $this->input->post('id_pesanan');
        $no_resi = $this->input->post('no_resi');
        $data = $this->db->get_where('pesanan', ['id_pesanan' =>
        $id_pesanan])->row_array();
        $insert = [
            'status' => 4,
            'no_resi' => $no_resi
        ];
        $this->Mod_auth->bukti_pembayaran($id_pesanan, $insert);
        $this->_emailpesanan($data, $no_resi, 'kirim_pesanan');

        redirect('admin/pesanan_di_proses');
    }
    public function pesanan_selesai()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email2')])->row_array();
        $email = $data['user']['email'];
        
        $this->form_validation->set_rules('bulan', 'Bulan', 'required');
        if ($this->form_validation->run() == false) {
           
            $where = "email_penjual='" . $email . "' AND status ='5'";

        }else{
            $where = array(
                'email_penjual ' => $email,
                'bln' => $this->input->post('bulan'),
                'thn'=> $this->input->post('tahun'),
                'status ='=>5,
            );
        }
        $produk = $this->Mod_auth->pesanan_baru($where);
        $array  = array(
            'pesanan' => $produk,
            'info' => $data['user'],
            'notif'=> $this->Mod_auth->get_notif($email),
        );

        $this->load->view('admin/header', $array);
        $this->load->view('admin/topnav');
        $this->load->view('admin/riwayat_pesanan');
        $this->load->view('admin/footer');
    }

    public function ulasan()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email2')])->row_array();
        
        $email = $data['user']['email'];
        $id = $this->db->get_where('data_penjual', ['email' =>
        $this->session->userdata('email2')])->row_array();
        $ulasan = $this->Mod_auth->getulasan($id['id']);
        $array  = array(
            'ulasan' => $ulasan,
            'info' => $data['user'],
            'notif'=> $this->Mod_auth->get_notif($email),
        );

        $this->load->view('admin/header', $array);
        $this->load->view('admin/topnav');
        $this->load->view('admin/ulasan', $array);
        $this->load->view('admin/footer');
    }

    public function alamat_pdf($id_pesanan)
    {
        $this->load->library('dompdf_gen');
        $pesanan = $this->db->get_where('pesanan', ['id_pesanan' => $id_pesanan])->row_array();
        $pengirim = $this->db->get_where('data_penjual', ['email' => $pesanan['email_penjual']])->row_array();

        $array = [
            'pesanan' => $pesanan,
            'pengirim' => $pengirim

        ];

        $this->load->view('admin/alamat_pdf', $array);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream($id_pesanan . ".pdf", array('Attachment' => 0));
    }
    public function tes($id_pesanan)
    {
        //$this->load->library('mypdf');

        $pesanan = $this->db->get_where('pesanan', ['id_pesanan' => $id_pesanan])->row_array();
        $pengirim = $this->db->get_where('data_penjual', ['email' => $pesanan['email_penjual']])->row_array();
        $array = [
            'pesanan' => $pesanan,
            'pengirim' => $pengirim
        ];
        $this->load->view('admin/alamat_pdf', $array);
        // $this->mypdf->generate('Admin/alamat_pdf', $array, $id_pesanan, 'A4', 'potrait');
    }
    private function _emailpesanan($data, $no, $type)
    {

        $this->load->library('email');
        $this->email->from('taningudimakmur2@gmail.com', 'Ngudi Makmur');
        if ($type == 'tolak_pesanan') {
            $link_wa = 'https://wa.me/+62' . $no;

            $this->email->to($data['email_pembeli']);
            $this->email->subject('Pesanan Anda Di Tolak');
            $this->email->message('Pesanan Anda dengan id Pesanan ' . $data['id_pesanan'] . ' Di tolak, Dikarenakan Bukti Pembayaran yang anda kirimkan tidak Sesuai. Jika Ada Kekeliruan Silahkan <a class="btn btn-primary" href="' . $link_wa . '" role="button"> Hubungi Penjual </a> ');
        } elseif ($type == 'kirim_pesanan') {
            $this->email->to($data['email_pembeli']);
            $this->email->subject('Pesanan Anda Di Telah Dikirimkan');
            $this->email->message('Pesanan Anda dengan id Pesanan ' . $data['id_pesanan'] . '  Telah Dikirimkan Dengan Nomor Resi ' . $no);
        }
        if ($this->email->send()) {
            return true;
        }
    }
    public function download_manual_book()
    {
        $this->load->helper('download');
        force_download('assets/manual_book/Panduan penjual.pdf', NULL);
    }
    public function prediksi(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email2')])->row_array();
        $email = $data['user']['email'];
        $produk = $this->Mod_auth->getdatakedelai($email);
        $this->form_validation->set_rules('bln', 'Bln', 'required');
        if ($this->form_validation->run() == false) {
            $array  = array(
                'data_penjualan' => null,
                'data_perhitungan' => null,
                'title'=>'Silahkan Pilih Bulan dan Produk Yang Akan Di Prediksi',
                'info' => $data['user'],
                'produk'=>$produk,
                'notif'=> $this->Mod_auth->get_notif($email),
            );
        } else {
            $bln=$this->input->post('bln');
            $thn=$this->input->post('thn');
            $id_kedelai=$this->input->post('produk');
            $time=strtotime('1-'.$bln.'-'.$thn);
            $where=array(
              'id_kedelai'=>$id_kedelai,
              'email_penjual'=>$email,
              'status '=> 5,
              'date_created  < '=>$time
                
            );
            // $where = "status ='5' AND date_created < ".$time;
            $data_awal = $this->Mod_auth->data_aktual($where);
            $penjualan = $this->Mod_auth->data_perhitungan($where);
            if(!empty($penjualan)){
                $perhitungan=$this->_perhitungan($penjualan);
                //Total MAD, MSE, MAPE
                $total_mad=array_sum(array_column($perhitungan,'mad'));
                $total_mse=array_sum(array_column($perhitungan,'mse'));
                $total_mape=array_sum(array_column($perhitungan,'mape'));
                //rata rata 
                $hasil_mad=$total_mad/count(array_column($perhitungan,'mad'));
                $hasil_mse=$total_mse/count(array_column($perhitungan,'mse'));
                $hasil_mape=$total_mape/count(array_column($perhitungan,'mape'));
                $array  = array(
                'data_penjualan' => $data_awal,
                'data_perhitungan' => $perhitungan,
                'hasil_mad'=>$hasil_mad,
                'hasil_mse'=>$hasil_mse,
                'hasil_mape'=>$hasil_mape,
                'waktu_diramal'=>$time,
                'info' => $data['user'],
                'produk'=>$produk,
                'notif'=> $this->Mod_auth->get_notif($email),
                );
                
            }else{
                $array  = array(
                    'data_penjualan' => null,
                    'data_perhitungan' => null,
                    'title'=>'Tidak Ada Penjualan untuk Produk Tersebut',
                    'info' => $data['user'],
                    'produk'=>$produk,
                    'notif'=> $this->Mod_auth->get_notif($email),
                );
            }
           
            
            
        }
        $this->load->view('Admin/header', $array);
        $this->load->view('Admin/topnav');
        $this->load->view('Admin/prediksi');
        $this->load->view('Admin/footer');
    }
    private function _perhitungan($penjualan){
        
        $penjualan = $penjualan;
        $pergerakan=4;
        $literasi=[];
        $no=0;
        $posisi_sma=$pergerakan-1;
        $posisi_dma=($pergerakan*2)-2;
        $periode=1;
        // periode 1 untuk bulan depan , 2 untuk 2 bulan depan dst.
    
        // Literasi SMA
        foreach ($penjualan as $key) {
            $sicedata =  array_slice($penjualan,$no,$pergerakan);
            //  print_r($sicedata);
            if(count($sicedata)==$pergerakan){
                $hasil = array_sum(array_column($sicedata,'jumlah'))/count($sicedata);
                $SMA[$posisi_sma]=$hasil;
                $literasi[$posisi_sma]['hasil_sma']=$hasil;
                $posisi_sma++;
                $no++;
            }else{
                break;
            }
        }
        //Literasi  DMA
        $no=0;
        foreach ($SMA as $sma ) {
            $sicedata =  array_slice($SMA,$no,$pergerakan);
            // print_r($sicedata);
                if(count($sicedata)==$pergerakan){
                    $hasil_dma = array_sum($sicedata)/count($sicedata);
                    $literasi[$posisi_dma]['hasil_dma']=$hasil_dma;
                    // Mencari Nilai At
                    $at=2*$SMA[$posisi_dma]-$hasil_dma;
                    // Mencari Nilai Bt
                    $bt=2/($pergerakan-1)*($SMA[$posisi_dma]-$hasil_dma);
                    // Mencari Nilai Peramalan Bulan Depan
                    $literasi[$posisi_dma]['nilai_at']=$at;
                    $literasi[$posisi_dma]['nilai_bt']=$bt;
                    //untuk posisi nilai array ramalan
                    if($posisi_dma < count($penjualan)-1){
                    $ramalan=$at+$bt*1;
                    $literasi[$posisi_dma+1]['hasil_ramalan']=$ramalan;
                    
                    }else if($posisi_dma >= count($penjualan)-1){
                    $ramalan=$at+$bt*$periode;
                    $literasi[$posisi_dma+$periode]['hasil_ramalan']=$ramalan;
                    }
                    

                    // Hitung nilai akurasi
                    if($posisi_dma+1 <= count($penjualan)-1){
                    $posisi_eror=$posisi_dma+1;
                    $error = $penjualan[$posisi_eror]['jumlah'] -$ramalan;
                    $mad=abs($error); //nilai absolut
                    $mse=pow($error,2); //mse di kuadrat
                    $mape=($mad/$penjualan[$posisi_eror]['jumlah'])*100;
                    $literasi[$posisi_eror]['mse']=$mse;
                    $literasi[$posisi_eror]['error']=$error;
                    $literasi[$posisi_eror]['mad']=$mad;
                    $literasi[$posisi_eror]['mape']=$mape;
                    }
                    $no++;
                }else{
                    break;
                }
            $posisi_dma ++;
        }
        return $literasi;
        
    }

    public function hapus_notif()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email2')])->row_array();
        $email = $data['user']['email'];
        $this->Mod_auth->hapus_notif($email);
        redirect('Admin');
    } 
    public function validasi_harga($str){

        $pos = strpos($str,'.');
        $pos1 = strpos($str,',');

        // The !== operator can also be used.  Using != would not work as expected
        // because the position of 'a' is 0. The statement (0 != false) evaluates
        // to false.
        if ($pos !== false || $pos1 !== false ) {
            $this->session->set_flashdata('msgeror', 'Masukan Harga tanpa tanda titik atau Koma');
            $this->form_validation->set_message('validasi_harga', 'Masukan Harga Tanpa Simbol Titik "." atau koma ","');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}