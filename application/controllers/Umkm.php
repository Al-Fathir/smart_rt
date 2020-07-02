<?php defined('BASEPATH') or exit('No direct script access allowed');

class umkm extends CI_Controller{
    public function __construct(){
        parent::__construct();

    if(! $this->session->userdata('authenticated'))
    redirect('login');

    $this->load->model('Main_Model');

    }

    public function add(){
        $this->form_validation->set_rules('penduduk', 'Masukin Nama Penduduk', 'required');
        $this->form_validation->set_rules('umkm_nama', 'Masukin Nama UMKM', 'required');
        $this->form_validation->set_rules('umkm_jenis', 'Masukin Jenis UMKM', 'required');
    

        if($this->form_validation->run() == FALSE){
            $this->template->load('template', 'input/umkm');

        } else {
         //   $check_umkm = $this->Main_Model->check_umkm_duplikasi();

           // if($check_umkm == 0){

                $this->Main_Model->add_umkm();

                echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('lihat-umkm')."';</script>";

            //} else 
            
//            {

  //          } echo "<script>alert('Dilarang menduplikasi data');window.location = '".base_url('input-umkm')."';</script>";
        }

    }

}