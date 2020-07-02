<?php defined ('BASEPATH') OR exit ('No Direct Script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('Main_Model');

    }

    public function index(){
        $this->load->view('templates/auth_header');
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    public function login_rt(){
       $rt_email = $this->input->post('rt_email');
       $rt_password = md5($this->input->post('rt_password'));
       $rt = $this->Main_Model->get_rt($rt_email);

       if(empty($rt)){
           $this->session->set_flashdata('message', 'email anda salah');
           redirect('login');
       } else {
        if($rt_password == $rt->password_rt){
 
            $session = array(
              'authenticated'=>true,
              'rt_email'=>$rt->email_rt,
              'rt_nama'=>$rt->nama_rt,
              'rt_no' =>$rt->no_rt,
              'rt_kelurahan' => $rt->nama_kelurahan,
              'rt_kecamatan' => $rt->nama_kecamatan,
              'rt_id' => $rt->id_rt
              
            );
        
              $this->session->set_userdata($session);
        
              redirect('home');
              
        
          } else {
            $this->session->set_flashdata('message', 'Password anda salah');
            redirect('login');
          }
        
        } 
        
         }
        
         public function logout(){
        
         $this->session->sess_destroy();
         redirect('login');
        
        }
       }

    

