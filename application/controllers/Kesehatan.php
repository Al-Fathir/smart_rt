<?php defined('BASEPATH') or exit('No direct script access allowed');

class kesehatan extends CI_Controller{
    public function __construct(){
        parent::__construct();

    if(! $this->session->userdata('authenticated'))
    redirect('login');

    $this->load->model('Main_Model');

    }

    public function add(){
        $this->form_validation->set_rules('penduduk', 'Masukin Nama Penduduk', 'required');
        $this->form_validation->set_rules('bpjs_no', 'Masukin No BPJS', 'required');
        $this->form_validation->set_rules('bpjs_kelas', 'Masukin Kelas BPJS', 'required');
    

        if($this->form_validation->run() == FALSE){
            $this->template->load('template', 'input/kesehatan');

        } else {
         //   $check_kesehatan = $this->Main_Model->check_kesehatan_duplikasi();

           // if($check_kesehatan == 0){

                $this->Main_Model->add_kesehatan();

                echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('lihat-kesehatan')."';</script>";

            //} else 
            
//            {

  //          } echo "<script>alert('Dilarang menduplikasi data');window.location = '".base_url('input-kesehatan')."';</script>";
        }

    }

}