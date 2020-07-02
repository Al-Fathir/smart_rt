<?php defined('BASEPATH') or exit('No direct script access allowed');

class agenda extends CI_Controller{
    public function __construct(){
        parent::__construct();

    if(! $this->session->userdata('authenticated'))
    redirect('login');

    $this->load->model('Main_Model');

    }

    public function add(){
        $this->form_validation->set_rules('agenda_nama', 'Masukin Nama Agenda', 'required');
        $this->form_validation->set_rules('agenda_isi', 'Masukin Isi Agenda', 'required');
        $this->form_validation->set_rules('agenda_waktu', 'Masukin Waktu Agenda', 'required');

        if($this->form_validation->run() == FALSE){
            $this->template->load('template', 'input/agenda');

        } else {
            $check_agenda = $this->Main_Model->check_agenda_duplikasi();

            if($check_agenda == 0){

                $this->Main_Model->add_agenda();

                echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('lihat-agenda')."';</script>";

            } else {

            } echo "<script>alert('Dilarang menduplikasi data');window.location = '".base_url('input-agenda')."';</script>";
        }

    }

}