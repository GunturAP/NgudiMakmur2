<?php
defined('BASEPATH') or exit('No direct Script Allowed');
class Mod_auth extends CI_Model
{
    //daftar user
    function insertuser($Data)
    {
        $this->db->insert('user', $Data);
    }
    function insertuser_token($Data)
    {
        $this->db->insert('user_token', $Data);
    }
    //dasboard suadmin
    public function total_pelanggan()
    {
        $this->db->where('role_id', '3');
        $query = $this->db->get('user');
        return $query->num_rows();
    }
    public function total_penjual()
    {
        $this->db->where('role_id', '2');
        $query = $this->db->get('user');
        return $query->num_rows();
    }
    public function total_transaksi($data)
    {
        $this->db->where($data);
        $query = $this->db->get('pesanan');
        return $query->num_rows();
    }
//super admin 
    public function getdatapetani()
    {
        $this->db->where('role_id', '2');
        $query = $this->db->get('user');
        return $query->result();
    }
    public function getdatapelanggan()
    {
        $this->db->where('role_id', '3');
        $query = $this->db->get('user');
        return $query->result();
    }
    function deletepenjual($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
    function delete_datapenjual($id)
    {
        $this->db->where('email', $id);
        $this->db->delete('data_penjual');
    }
    function delete_bankpenjual($id)
    {
        $this->db->where('email', $id);
        $this->db->delete('informasi_bank');
    }
     function block_user($id)
     {
         $this->db->set('role_id',4);
         $this->db->where('id', $id);
         $this->db->update('user');
     }
    // 
    function insertkedelai($insert)
    {
        $this->db->insert('kedelai', $insert);
    }
    function editkedelai($id, $Data)
    {
        $this->db->set($Data);
        $this->db->where('id', $id);
        $this->db->update('kedelai');
    }
    function deletekedelai($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kedelai');
    }

    function caridatakedelai($where)
    {
        $this->db->where($where);
        $query = $this->db->get('kedelai');
        return $query->row_array();
    }
    function updatedbgrafik()
    {
        $this->db->group_by("varietas_kedelai");
        //$this->db->group_by("jenis_kedelai");
        $this->db->from('kedelai');
        $query = $this->db->get();
        return $query->result();
    }
    function updatedmdgrafik()
    {
        $this->db->group_by("varietas_kedelai");
        $this->db->group_by("jenis_kedelai");
        $this->db->from('kedelai');
        $query = $this->db->get();
        return $query->result();
    }
    function sudeletekedelai($id)
    {
        $this->db->where('email', $id);
        $this->db->delete('kedelai');
    }

    function getdatakedelai($nama)
    {
        $this->db->where('email', $nama);
        $query = $this->db->get('kedelai');
        return $query->result();
    }
    //
    function getalldatakedelai()
    {
        $this->db->select('*');
        $this->db->from('kedelai');
        $query = $this->db->get();
        return $query->result();
    }
    function cariproduk($cari)
    {
        $this->db->like('nama_petani', $cari);
        $this->db->or_like('jenis_kedelai', $cari);
        $this->db->or_like('varietas_kedelai', $cari);
        $this->db->or_like('grade', $cari);
        $this->db->or_like('info_lain', $cari);
        $this->db->from('kedelai');
        $query = $this->db->get();
        return $query->result();
    }

    function getdataajuan()
    {
        $this->db->select('*');
        $this->db->from('temp_ajuan');
        $query = $this->db->get();
        return $query->result();
    }
    function getdatapenjual()
    {
        $this->db->select('*');
        $this->db->from('temp_ajuan');
        $query = $this->db->get();
        return $query->result();
    }
    //acc data
    function accdata($email, $Data)
    {
        $this->db->set($Data);
        $this->db->where('email', $email);
        $this->db->update('user');
    }
    function deleteajuan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('temp_ajuan');
    }
    function deleteemaillama($id)
    {
        $this->db->where('email', $id);
        $this->db->delete('customer_alamat');
    }

    // edit profile penjual
    function editpenjual($id, $Data)
    {
        $this->db->set($Data);
        $this->db->where('id', $id);
        $this->db->update('user');
    }
    function edit_datapenjual($id, $Data)
    {
        $this->db->set($Data);
        $this->db->where('email', $id);
        $this->db->update('data_penjual');
    }
    function editbank($id, $Data)
    {
        $this->db->set($Data);
        $this->db->where('email', $id);
        $this->db->update('informasi_bank');
    }



    //detailrpoduk front end
    function getprodukdetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('kedelai');
        return $query->row();
    }

    //edit-profile-customer
    function edit_profile($id, $Data)
    {
        $this->db->set($Data);
        $this->db->where('id', $id);
        $this->db->update('user');
    }
    // data alamat
    function getalamat($id)
    {
        $this->db->where('email', $id);
        $query = $this->db->get('kedelai');
        return $query->row();
    }
    //insert alamat
    function insertalamat($insert)
    {
        $this->db->insert('customer_alamat', $insert);
    }
    function edit_alamat($email, $Data)
    {
        $this->db->set($Data);
        $this->db->where('email', $email);
        $this->db->update('customer_alamat');
    }
    //ajuan menjadi penjual
    function ajuan_data_penjual($Data)
    {
        $this->db->insert('data_penjual', $Data);
    }
    function ajuan_bank_penjual($Data)
    {
        $this->db->insert('informasi_bank', $Data);
    }
    function ajuan_temp($Data)
    {
        $this->db->insert('temp_ajuan', $Data);
    }
    //pesanan
    function tambah_pesanan($insert)
    {
        $this->db->insert('pesanan', $insert);
    }
    function bukti_pembayaran($id, $Data)
    {
        $this->db->set($Data);
        $this->db->where('id_pesanan', $id);
        $this->db->update('pesanan');
    }
    //konfirmasi Pembayaran
    function konfirmasi_pembayaran($id)
    {
        $this->db->where('id_pesanan', $id);
        $query = $this->db->get('pesanan');
        return $query->row();
    }

    //waktu pembayaran hapus data
    function deletepesanan($id)
    {
        $this->db->where('id_pesanan', $id);
        $this->db->delete('pesanan');
    }

    function pesanan_baru($where)
    {
        $this->db->where($where);
        $query = $this->db->get('pesanan');
        return $query->result();
    }
    public function pesanan_saya($data)
    {
        $this->db->where('email_pembeli', $data);
        $query = $this->db->get('pesanan');
        return $query->result();
    }
    public function join_pesanan_kedelai($data)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('email_pembeli', $data);
        $this->db->join('kedelai', 'kedelai.id = pesanan.id_kedelai');
        $query = $this->db->get();
        return $query->result();
    }
    function insertfeedback($Data)
    {
        $this->db->insert('feedback', $Data);
    }
    function getulasan($nama)
    {
        $this->db->where('id_penjual', $nama);
        $query = $this->db->get('feedback');
        return $query->result();
    }
    function getulasanproduk($id)
    {
        $this->db->where('id_produk', $id);
        $query = $this->db->get('feedback');
        return $query->result();
    }
    //grafik
    function insertgrafik($insert)
    {
        $this->db->insert('grafik', $insert);
    }

    function updategrafik($id, $Data)
    {
        $this->db->set($Data);
        $this->db->where($id);
        $this->db->update('grafik');
    }
    function wheregrafik($where)
    {
        $this->db->where($where);
        $this->db->order_by('tgl', 'ASC');
        $query = $this->db->get('grafik');
        return $query->result();
    }
    function getgrafik()
    {
        $this->db->where('tipe', 'supply');
        $this->db->group_by("varietas_kedelai");
        $this->db->from('grafik');
        $query = $this->db->get();
        return $query->result();
    }
    function getgrafikdmnd()
    {
        $this->db->where('tipe', 'demand');
        $this->db->group_by("varietas_kedelai");
        $this->db->from('grafik');
        $query = $this->db->get();
        return $query->result();
    }
    function deletegrafik($id)
    {
        $this->db->where('bln !=', $id);
        $this->db->delete('grafik');
    }
    //selisih
    //grafik
    function insertgrafik_selisih($insert)
    {
        $this->db->insert('grafik_selisih', $insert);
    }
    function getgrafik_selisih()
    {
        $this->db->group_by("varietas_kedelai");
        $this->db->from('grafik_selisih');
        $query = $this->db->get();
        return $query->result();
    }
    function wheregrafik_selisih()
    {
        $this->db->group_by("varietas_kedelai");
        // $this->db->group_by("jenis_kedelai");
        $this->db->from('grafik');
        $query = $this->db->get();
        return $query->result();
    }
    function updategrafik_selisih($id, $Data)
    {
        $this->db->set($Data);
        $this->db->where($id);
        $this->db->update('grafik_selisih');
    }
    function show_grafik_selisih($where)
    {
        $this->db->where($where);
        $this->db->order_by('tgl', 'ASC');
        $query = $this->db->get('grafik_selisih');
        return $query->result();
    }

    // Notifikasi
    public function notifikasi($data){
        $this->db->insert('notifikasi', $data);
      }
    public function get_notif($email)
    {
        $this->db->where('to_email',$email);
        $this->db->order_by('time', 'DESC');
        $query = $this->db->get('notifikasi');
        return $query->result();
    }
    function hapus_notif($email)
    {
        $this->db->where('to_email', $email);
        $this->db->delete('notifikasi');
    }
    //
    function data_perhitungan($where)
    {
        $this->db->where($where);
        $this->db->select_sum('jumlah');
        $this->db->group_by('bln');
        $this->db->group_by('thn');
      $this->db->order_by('thn ASC, bln ASC');
        $query = $this->db->get('pesanan');
        return $query->result_array();
    }
    function data_aktual($where)
    {
        $this->db->where($where);
        $this->db->select('bln,thn');
        $this->db->select_sum('jumlah');
        $this->db->group_by('bln');
        $this->db->group_by('thn');
      $this->db->order_by('thn ASC, bln ASC');
        $query = $this->db->get('pesanan');
        return $query->result();
    }
    //
    public function total_pendapatan_penjual($data)
    {
        $this->db->where($data);
        $this->db->select_sum('subtotal_pesanan');
        $query = $this->db->get('pesanan');
        return $query->row_array();
    }
    public function total_transaksi_penjual($data)
    {
        $this->db->where($data);
        $query = $this->db->get('pesanan');
        return $query->num_rows();
    }
    
}