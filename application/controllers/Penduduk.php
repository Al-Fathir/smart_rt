<?php defined('BASEPATH') OR exit ('No direct script access allowed'); 

class penduduk extends CI_Controller{
    public function __construct(){
    parent::__construct();

        $this->load->model('Main_Model');

        if(! $this->session->userdata('authenticated'))
        redirect('login');
    }

    public function add(){
        $this->form_validation->set_rules('penduduk_ktp_no', 'Harap Masukin No KTP Penduduk', 'required');
        $this->form_validation->set_rules('penduduk_kk_no', 'Harap Masukin No Kartu Keluarga', 'required');
        $this->form_validation->set_rules('penduduk_nama', 'Harap Masukin Nama Penduduk', 'required');
        $this->form_validation->set_rules('penduduk_email', 'Harap Masukin email Penduduk', 'required|valid_email|trim');
        $this->form_validation->set_rules('penduduk_password', 'Harap Masukin Password Penduduk', 'required');
        $this->form_validation->set_rules('penduduk_pekerjaan', 'Harap Masukin Pekerjaan Penduduk', 'required');
        $this->form_validation->set_rules('penduduk_alamat', 'Harap Masukin Alamat Penduduk', 'required');
        $this->form_validation->set_rules('penduduk_gol', 'Harap Pilih Golongan Darah', 'required');
        $this->form_validation->set_rules('penduduk_agama', 'Harap Pilih Agama', 'required');
        $this->form_validation->set_rules('wn_status', 'Harap Pilih Status Warga Negara', 'required');
        $this->form_validation->set_rules('nikah_status', 'Harap Pilih Status Pernikahan', 'required');
        $this->form_validation->set_rules('penduduk_jns_kelamin', 'Harap Masukin Jenis Kelamin Penduduk', 'required');
        $this->form_validation->set_rules('penduduk_tgl_lahir', 'Harap Masukin Tanggal Lahir Penduduk', 'required');
        $this->form_validation->set_rules('penduduk_tempat_lahir', 'Harap Masukin Tempat Lahir Penduduk', 'required');

        if($this->form_validation->run()==FALSE){
            $this->template->load('template', 'input/penduduk');
        } else {

            $cek_duplikasi_ktp = $this->Main_Model->check_ktp_duplikasi_and_email();

            if($cek_duplikasi_ktp == 0){

                $this->Main_Model->add_penduduk();
                echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('lihat-penduduk')."';</script>";

            } else{
                echo "<script>alert('Dilarang menduplikasi no KTP');window.location = '".base_url('input-penduduk')."';</script>";
            }
        }
    }

    public function update(){
        $this->form_validation->set_rules('penduduk_ktp_no', 'Harap Masukin No KTP Penduduk', 'required');
        $this->form_validation->set_rules('penduduk_kk_no', 'Harap Masukin No Kartu Keluarga', 'required');
        $this->form_validation->set_rules('penduduk_nama', 'Harap Masukin Nama Penduduk', 'required');
        $this->form_validation->set_rules('penduduk_email', 'Harap Masukin email Penduduk', 'required|valid_email|trim');
        $this->form_validation->set_rules('penduduk_password', 'Harap Masukin Password Penduduk', 'required');
        $this->form_validation->set_rules('penduduk_pekerjaan', 'Harap Masukin Pekerjaan Penduduk', 'required');
        $this->form_validation->set_rules('penduduk_alamat', 'Harap Masukin Alamat Penduduk', 'required');
        $this->form_validation->set_rules('penduduk_gol', 'Harap Pilih Golongan Darah', 'required');
        $this->form_validation->set_rules('wn_status', 'Harap Pilih Status Warga Negara', 'required');
        $this->form_validation->set_rules('nikah_status', 'Harap Pilih Status Pernikahan', 'required');
        $this->form_validation->set_rules('penduduk_agama', 'Harap Pilih Agama', 'required');
        $this->form_validation->set_rules('penduduk_jns_kelamin', 'Harap Masukin Jenis Kelamin Penduduk', 'required');
        $this->form_validation->set_rules('penduduk_tgl_lahir', 'Harap Masukin Tanggal Lahir Penduduk', 'required');
        $this->form_validation->set_rules('penduduk_tempat_lahir', 'Harap Masukin Tempat Lahir Penduduk', 'required');

        if($this->form_validation->run()==FALSE){
            
            $this->template->load('template', 'edit/penduduk');
        } else {
            $this->Main_Model->update_penduduk();
            echo "<script>alert('Data berhasil di perbarui');window.location = '".base_url('lihat-penduduk')."';</script>";
        }
    }

    public function delete($penduduk_id){

        $this->Main_Model->delete_penduduk(decrypt_url($penduduk_id));
        redirect('lihat-penduduk');
    }

    public function approved($penduduk_id){
        
        $this->Main_Model->update_penduduk_approved(decrypt_url($penduduk_id));
        redirect('lihat-penduduk');
    }
}