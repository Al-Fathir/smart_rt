<?php defined('BASEPATH') or exit('No direct script access allowed');

class berita extends CI_Controller{
    public function __construct(){
        parent:: __construct();

        if(! $this->session->userdata('authenticated'))
        redirect('login');

        $this->load->model('Main_Model');

    }

    public function add(){

        $config = array (
        
            'upload_path' => './assets/dist/img/berita',
            'allowed_types' => 'jpg|jpeg|png|gif|',
                
        );
    
        $this->upload->initialize($config);

        $this->form_validation->set_rules('berita_judul', 'Input Judul Berita', 'required');
        $this->form_validation->set_rules('berita_isi', 'Input Isi Berita', 'required');
    
        if($this->form_validation->run() == FALSE){

            $this->template->load('template', 'input/berita');

        } else {

            $check_duplikasi_berita = $this->Main_Model->check_berita_duplikasi();

            if ($check_duplikasi_berita == 0){

                if($_FILES['upload_berita']['name']) 
            {
                if($this->upload->do_upload('upload_berita'))
                
                {
        
                    $file = $this->upload->data();
                      
                    $this->Main_Model->add_berita($file);
                    echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('lihat-berita')."';</script>";
    
                }
    
                else {
    
                    echo "<script>alert('Gagal Upload Data');window.location = '".base_url('input-berita')."';</script>";
                   
                }
        }

            } else {
                echo "<script>alert('Dilarang menduplikasi data');window.location = '".base_url('input-berita')."';</script>";
            }

            

    }

}
}