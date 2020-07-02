<?php defined('BASEPATH') or exit('No direct script access allowed');

class kematian extends CI_Controller{
    public function __construct(){
        parent::__construct();

    if(! $this->session->userdata('authenticated'))
    redirect('login');

    $this->load->model('Main_Model');

    }

    public function add(){
        $this->form_validation->set_rules('penduduk', 'Masukin Nama Penduduk', 'required');
        $this->form_validation->set_rules('kematian_penyebab', 'Masukin Penyebab Kematian', 'required');
        $this->form_validation->set_rules('kematian_tgl', 'Masukin Tanggal kematian', 'required');
    

        if($this->form_validation->run() == FALSE){
            $this->template->load('template', 'input/kematian');

        } else {
         //   $check_kematian = $this->Main_Model->check_kematian_duplikasi();

           // if($check_kematian == 0){

                $this->Main_Model->add_kematian();

                echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('lihat-kematian')."';</script>";

            //} else 
            
//            {

  //          } echo "<script>alert('Dilarang menduplikasi data');window.location = '".base_url('input-kematian')."';</script>";
        }

    }

}