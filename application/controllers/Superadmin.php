<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Mod_auth');
        if ($this->session->userdata('email1') == null) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert"> Sesi Anda Berakhir , Silahkan Masuk Kembali </div>');
            redirect('auth');
            die;
        }
    }
    public function index()
    {
        // $this->petani();
        
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email1')])->row_array();

        $ajuan = $this->Mod_auth->getdataajuan();
        $total_pelanggan=$this->Mod_auth->total_pelanggan();
        $total_penjual=$this->Mod_auth->total_pelanggan();
        $where=array(
          'bln'=>date('n'),
          'thn'=>date('Y'),
            'status <' => 6  
        );
        $transaksi=$this->Mod_auth->total_transaksi($where);
        $array  = array(
            'total_pelanggan'=>$total_pelanggan,
            'total_penjual'=>$total_penjual,
            'total_transaksi'=>$transaksi,
            'info' => $data['user']
        );

        if ($ajuan) {
            $this->session->set_flashdata('cek', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
            $this->session->set_flashdata('top', '<div class="alert alert-success alert-dismissible">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         <strong>Ajuan Menjadi Penjual Diterima </strong> <a href=" ' . base_url('Superadmin/permintaan_ajuan') . ' " class="alert-link">Lihat Ajuan Data</a>
                     </div>');
        }

        $this->load->view('superadmin/header', $array);
        $this->load->view('superadmin/topnav');
        $this->load->view('superadmin/dashboard');
        $this->load->view('superadmin/footer');
    }
    public function pelanggan()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email1')])->row_array();
        $ajuan = $this->Mod_auth->getdataajuan();
        if ($ajuan) {
            $this->session->set_flashdata('cek', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
            $this->session->set_flashdata('top', '<div class="alert alert-success alert-dismissible">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         <strong>Ajuan Menjadi Penjual Diterima </strong> <a href=" ' . base_url('Superadmin/permintaan_ajuan') . ' " class="alert-link">Lihat Ajuan Data</a>
                     </div>');
        }
        $recordpelanggan = $this->Mod_auth->getdatapelanggan();
        $array  = array(
            'data_pelanggan' => $recordpelanggan,
            'info' => $data['user']
        );

        $this->load->view('superadmin/header', $array);
        $this->load->view('superadmin/topnav', $array);
        $this->load->view('superadmin/pelanggan');
        $this->load->view('superadmin/footer');
    }
    public function petani()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email1')])->row_array();
        $ajuan = $this->Mod_auth->getdataajuan();
        if ($ajuan) {
            $this->session->set_flashdata('cek', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
            $this->session->set_flashdata('top', '<div class="alert alert-success alert-dismissible">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         <strong>Ajuan Menjadi Penjual Diterima </strong> <a href=" ' . base_url('Superadmin/permintaan_ajuan') . ' " class="alert-link">Lihat Ajuan Data</a>
                     </div>');
        }
        $recordpetani = $this->Mod_auth->getdatapetani();
        $array  = array(
            'data_petani' => $recordpetani,
            'info' => $data['user']
        );

        $this->load->view('superadmin/header', $array);
        $this->load->view('superadmin/topnav', $array);
        $this->load->view('superadmin/petani');
        $this->load->view('superadmin/footer');
    }
    public function kedelai()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email1')])->row_array();
        $ajuan = $this->Mod_auth->getdataajuan();
        $recordkedelai = $this->Mod_auth->getalldatakedelai();
        $array  = array(
            'data_kedelai' => $recordkedelai,
            'info' => $data['user']
        );
        if ($ajuan) {
            $this->session->set_flashdata('cek', '&nbsp;<span class="badge badge-pill badge-danger">!</span>');
        }
        $this->load->view('superadmin/header', $array);
        $this->load->view('superadmin/topnav', $array);
        $this->load->view('superadmin/kedelai');
        $this->load->view('superadmin/footer');
    }
    public function permintaan_ajuan()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email1')])->row_array();
        $record = $this->Mod_auth->getdataajuan();
        $recorddtpjl = $this->Mod_auth->getdatapenjual();
        $array  = array(
            'ajuan' => $record,
            'info' => $data['user']
        );

        $this->load->view('superadmin/header', $array);
        $this->load->view('superadmin/topnav');
        $this->load->view('superadmin/ajuan');
        $this->load->view('superadmin/footer');
    }
    public function accdata($id)
    {
        $ajuan['data'] = $this->db->get_where('temp_ajuan', ['id' => $id])->row_array();
        $email = $ajuan['data']['email'];
        $no_hp = $ajuan['data']['no_telepon'];
        $data = [
            'no_telephone' => $no_hp,
            'role_id' => '2'
        ];
        $this->Mod_auth->accdata($email, $data);
        $this->Mod_auth->deleteajuan($id);
        $this->Mod_auth->deleteemaillama($email);
        redirect('Superadmin/permintaan_ajuan');
    }
    public function delete_penjual($id)
    {
        $user = $this->db->get_where('user', ['id' => $id])->row_array();
        $email = $user['email'];
        $this->Mod_auth->deletepenjual($id);
        $this->Mod_auth->delete_datapenjual($email);
        $this->Mod_auth->delete_bankpenjual($email);
        $this->Mod_auth->sudeletekedelai($email);
        redirect('Superadmin');
    }
    public function delete_pelanggan($id)
    {
        $user = $this->db->get_where('user', ['id' => $id])->row_array();
        $email = $user['email'];
        $this->Mod_auth->deletepenjual($id);;
        redirect('Superadmin');
    }
    public function block_user($id)
    {
        $user = $this->db->get_where('user', ['id' => $id])->row_array();
        $email = $user['email'];
        $this->Mod_auth->block_user($id);
        redirect('Superadmin');
    }
    public function download_manual_book()
    {
        $this->load->helper('download');
        force_download('assets/manual_book/Panduan Admin.pdf', NULL);
    }
    public function prediksi(){
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email1')])->row_array();
        $this->form_validation->set_rules('bln', 'Bln', 'required');
        if ($this->form_validation->run() == false) {
            $array  = array(
                'data_penjualan' => null,
                'data_perhitungan' => null,
                'info' => $data['user']
            );
        } else {
            $bln=$this->input->post('bln');
            $thn=$this->input->post('thn');
            $time=strtotime('1-'.$bln.'-'.$thn);
            $where = "status ='5' AND date_created < ".$time;
            $data_awal = $this->Mod_auth->data_aktual($where);
            $penjualan = $this->Mod_auth->data_perhitungan($where);
            $perhitungan=$this->_perhitungan($penjualan);
            //Total MAD, MSE, MAPE
            $total_mad=array_sum(array_column($perhitungan,'mad'));
            $total_mse=array_sum(array_column($perhitungan,'mse'));
            $total_mape=array_sum(array_column($perhitungan,'mape'));
            //rata rata 
            $hasil_mad=$total_mad/count(array_column($perhitungan,'mad'));
            $hasil_mse=$total_mse/count(array_column($perhitungan,'mse'));
            $hasil_mape=$total_mape/count(array_column($perhitungan,'mape'));
            // print_r($perhitungan);
            // die;
            $array  = array(
                'data_penjualan' => $data_awal,
                'data_perhitungan' => $perhitungan,
                'hasil_mad'=>$hasil_mad,
                'hasil_mse'=>$hasil_mse,
                'hasil_mape'=>$hasil_mape,
                'waktu_diramal'=>$time,
                'info' => $data['user']
            );
        }
        $this->load->view('superadmin/header', $array);
        $this->load->view('superadmin/topnav');
        $this->load->view('superadmin/prediksi');
        $this->load->view('superadmin/footer');
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
}