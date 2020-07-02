<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Main_Model extends CI_Model{
    public function __construct(){
        parent:: __construct();
    }

    public function get_rt($rt_email){
        $this->db->join('tbl_kelurahan', 'tbl_rt.id_kelurahan = tbl_kelurahan.id_kelurahan');
        $this->db->join('tbl_kecamatan', 'tbl_kelurahan.id_kecamatan = tbl_kecamatan.id_kecamatan');
        $this->db->join('tbl_kota', 'tbl_kecamatan.id_kota = tbl_kota.id_kota');
        $this->db->where('username_rt', $rt_email);
        $result = $this->db->get('tbl_rt')->row();

        return $result;
    }

    public function get_penduduk_by_approved(){

        $rt_id = $this->session->userdata('rt_id');

        $data = array(
            'tbl_rt.id_rt' => $rt_id
        );

        $query = $this->db->join('tbl_kependudukan', 'tbl_approved_client.id_penduduk = tbl_kependudukan.id_penduduk', 'right');
        $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');
        $query = $this->db->get_where('tbl_approved_client', $data);

        return $query->result();
    }

    public function get_all_penduduk_by_id($penduduk_id){
        $query =$this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');
        $query = $this->db->get_where('tbl_kependudukan', ['tbl_kependudukan.id_penduduk'=>$penduduk_id]);

        return $query->row();
    }

    public function update_penduduk(){
        $penduduk_id = decrypt_url($this->input->post('penduduk_id', true));  
        $rt_id = decrypt_url($this->input->post('rt_id', true));  
        $penduduk_ktp_no = $this->input->post('penduduk_ktp_no', true);
        $penduduk_kk_no = $this->input->post('penduduk_kk_no', true);
        $penduduk_email = $this->input->post('penduduk_email', true);
        $penduduk_password = md5($this->input->post('penduduk_password', true));
        $penduduk_nama = $this->input->post('penduduk_nama', true);
        $penduduk_gol = $this->input->post('penduduk_gol', true);
        $penduduk_agama = $this->input->post('penduduk_agama', true);
        $nikah_status = $this->input->post('nikah_status', true);
        $wn_status = $this->input->post('wn_status', true);
        $penduduk_pekerjaan = $this->input->post('penduduk_pekerjaan', true);
        $penduduk_alamat = $this->input->post('penduduk_alamat', true);
        $penduduk_jns_kelamin = $this->input->post('penduduk_jns_kelamin', true);
        $penduduk_tgl_lahir = $this->input->post('penduduk_tgl_lahir', true);
        $penduduk_tempat_lahir = $this->input->post('penduduk_tempat_lahir', true);

        $data_penduduk = array(
           'id_rt' => $rt_id,
          'no_ktp_penduduk' => $penduduk_ktp_no,
          'no_kk_penduduk' => $penduduk_kk_no,
          'email_penduduk' => $penduduk_email,
          'password_penduduk' => $penduduk_password,
          'nama_penduduk' => $penduduk_nama,
          'gol_penduduk' => $penduduk_gol,
          'agama_penduduk' => $penduduk_agama,
          'status_nikah' => $nikah_status,
           'status_wn' => $wn_status,
          'pekerjaan_penduduk' => $penduduk_pekerjaan,
          'alamat_penduduk' => $penduduk_alamat,
          'jns_kelamin_penduduk' => $penduduk_jns_kelamin,
          'tgl_lahir_penduduk' => $penduduk_tgl_lahir,
          'tempat_lahir_penduduk' => $penduduk_tempat_lahir
        );

        $data_penduduk = $this->security->xss_clean($data_penduduk);

        $where_penduduk = array(
            'id_penduduk' => $penduduk_id
        );

        $update_penduduk =$this->db->update('tbl_kependudukan', $data_penduduk, $where_penduduk);

        return $update_penduduk;


    }

    public function count_penduduk_by_rt(){

    $rt_id = $this->session->userdata('rt_id');    
    $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');
    $query = $this->db->select('COUNT(*) AS total');
    $query = $this->db->get_where('tbl_kependudukan', ['tbl_kependudukan.id_rt' => $rt_id]);

    return $query->row();

    }

    public function count_penduduk_approved_rt(){

        $rt_id = $this->session->userdata('rt_id');    
        $query = $this->db->join('tbl_kependudukan', 'tbl_approved_client.id_penduduk = tbl_kependudukan.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');
        $query = $this->db->select('COUNT(*) AS total');
        $query = $this->db->get_where('tbl_approved_client', ['tbl_kependudukan.id_rt' => $rt_id]);
    
        return $query->row();
    
        }

   public function count_penduduk_not_approved_rt(){

            $rt_id = $this->session->userdata('rt_id');    
            $query = $this->db->join('tbl_kependudukan', 'tbl_kependudukan.id_penduduk = tbl_approved_client.id_penduduk', 'RIGHT');
            $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt', 'RIGHT');
            $query = $this->db->select('COUNT(*) AS total');

            $data = array(
                'tbl_approved_client.id_penduduk' => NULL,
                'tbl_rt.id_rt' => $rt_id
            );

            $query = $this->db->get_where('tbl_approved_client', $data);
        
            return $query->row();
        
            }

    public function check_ktp_duplikasi_and_email(){
        $penduduk_ktp_no = $this->input->post('penduduk_ktp_no', true);
        $penduduk_email = $this->input->post('penduduk_email', true);

        $query = $this->db->get_where('tbl_kependudukan', ['no_ktp_penduduk'=>$penduduk_ktp_no]);

        return $query->num_rows();
    }

    public function get_agenda_by_rt(){

        $rt_id = $this->session->userdata('rt_id');

        $data = array (
            'tbl_rt.id_rt' => $rt_id
        );

        $query = $this->db->join('tbl_rt', 'tbl_rt.id_rt = tbl_agenda.id_rt');
        $query = $this->db->get_where('tbl_agenda', $data);

        return $query->result();
    }

    public function get_berita_by_rt(){

        $rt_id = $this->session->userdata('rt_id');

        $data = array (
            'tbl_rt.id_rt' => $rt_id
        );

        $query = $this->db->join('tbl_rt', 'tbl_rt.id_rt = tbl_berita.id_rt');
        $query = $this->db->get_where('tbl_berita', $data);

        return $query->result();

    }

    public function check_agenda_duplikasi(){

        $rt_id = $this->session->userdata('rt_id');
        $agenda_nama = $this->input->post('agenda_nama', true);

        $data = array(
            'tbl_rt.id_rt' => $rt_id,
            'tbl_agenda.nama_agenda' => $agenda_nama
        );

        $query = $this->db->join('tbl_rt', 'tbl_rt.id_rt = tbl_agenda.id_rt');

        $query = $this->db->get_where('tbl_agenda', $data);

        return $query->num_rows();
    }

    public function check_berita_duplikasi(){

        $rt_id = $this->session->userdata('rt_id');
        $berita_judul = $this->input->post('berita_judul', true);

        $data_berita = array(
            'tbl_rt.id_rt' => $rt_id,
            'tbl_berita.judul_berita' => $berita_judul
        );

        $query = $this->db->join('tbl_rt', 'tbl_rt.id_rt = tbl_berita.id_rt');

        $query = $this->db->get_where('tbl_berita', $data_berita);

        return $query->num_rows();

    }

    public function add_penduduk(){
        $rt_id = decrypt_url($this->input->post('rt_id', true));  
        $penduduk_ktp_no = $this->input->post('penduduk_ktp_no', true);
        $penduduk_kk_no = $this->input->post('penduduk_kk_no', true);
        $penduduk_email = $this->input->post('penduduk_email', true);
        $penduduk_password = md5($this->input->post('penduduk_password', true));
        $penduduk_nama = $this->input->post('penduduk_nama', true);
        $penduduk_gol = $this->input->post('penduduk_gol', true);
        $penduduk_agama = $this->input->post('penduduk_agama', true);

        $nikah_status = $this->input->post('nikah_status', true);
        $wn_status = $this->input->post('wn_status', true);
        $penduduk_pekerjaan = $this->input->post('penduduk_pekerjaan', true);
        $penduduk_alamat = $this->input->post('penduduk_alamat', true);
        $penduduk_jns_kelamin = $this->input->post('penduduk_jns_kelamin', true);
        $penduduk_tgl_lahir = $this->input->post('penduduk_tgl_lahir', true);
        $penduduk_tempat_lahir = $this->input->post('penduduk_tempat_lahir', true);

      $data_penduduk = array(
        'id_rt' => $rt_id,
        'no_ktp_penduduk' => $penduduk_ktp_no,
        'no_kk_penduduk' => $penduduk_kk_no,
        'email_penduduk' => $penduduk_email,
        'password_penduduk' => $penduduk_password,
        'nama_penduduk' => $penduduk_nama,
        'gol_penduduk' => $penduduk_gol,
        'agama_penduduk' => $penduduk_agama,
        'status_nikah' => $nikah_status,
        'status_wn' => $wn_status,
        'pekerjaan_penduduk' => $penduduk_pekerjaan,
        'alamat_penduduk' => $penduduk_alamat,
        'jns_kelamin_penduduk' => $penduduk_jns_kelamin,
        'tgl_lahir_penduduk' => $penduduk_tgl_lahir,
        'tempat_lahir_penduduk' => $penduduk_tempat_lahir
      );

      $data_penduduk = $this->security->xss_clean($data_penduduk);

      $insert_penduduk = $this->db->insert('tbl_kependudukan', $data_penduduk);

      return $insert_penduduk;

    }

    public function add_agenda(){
        $rt_id = decrypt_url($this->input->post('rt_id', true));
        $agenda_nama = $this->input->post('agenda_nama', true);
        $agenda_isi = $this->input->post('agenda_isi', true);
        $agenda_waktu = $this->input->post('agenda_waktu', true);

        $data_agenda = array(
            'id_rt' => $rt_id,
            'nama_agenda' => $agenda_nama,
            'isi_agenda' => $agenda_isi,
            'waktu_agenda' => $agenda_waktu
        );

        $data_agenda = $this->security->xss_clean($data_agenda);

        $insert_agenda = $this->db->insert('tbl_agenda', $data_agenda);

        return $insert_agenda;
    }

    public function add_berita($file){
        $rt_id = decrypt_url($this->input->post('rt_id', true));
        $berita_judul = $this->input->post('berita_judul', true);
        $berita_isi = $this->input->post('berita_isi', true);
        $berita_img = $file['file_name'];

        $data_berita = array(
            'id_rt' => $rt_id,
            'judul_berita' => $berita_judul,
            'isi_berita' => $berita_isi,
            'img_berita' => $berita_img
        );

        $data_berita = $this->security->xss_clean($data_berita);

        $insert_berita = $this->db->insert('tbl_berita', $data_berita);

        return $insert_berita;

    }

    public function add_kematian(){
        $approved_id = $this->input->post('id_approved_client', true);
        $kematian_penyebab = $this->input->post('kematian_penyebab', true);
        $kematian_tgl = $this->input->post('kematian_tgl', true);

        $data_kematian = array(
            'id_approved_client' => $approved_id,
            'penyebab_kematian' => $kematian_penyebab,
            'tgl_kematian' => $kematian_tgl
        );

        $data_kematian = $this->security->xss_clean($data_kematian);

        $insert_kematian = $this->db->insert('tbl_kematian', $data_kematian);

        return $insert_kematian;
    }

    public function add_umkm(){
        $approved_id = $this->input->post('id_approved_client', true);
        $umkm_nama = $this->input->post('umkm_nama', true);
        $umkm_jenis = $this->input->post('umkm_jenis', true);

        $data_umkm = array(
            'id_approved_client' => $approved_id,
            'nama_usaha' => $umkm_nama,
            'jenis_usaha' => $umkm_jenis
        );

        $data_umkm = $this->security->xss_clean($data_umkm);

        $insert_umkm = $this->db->insert('tbl_umkm', $data_umkm);

        return $insert_umkm;
    }

    public function get_putus_sekolah(){
        
        $rt_id = $this->session->userdata('rt_id');

        $data_rt = array(
            'tbl_rt.id_rt' => $rt_id
        );

        $query = $this->db->join('tbl_kependudukan', 'tbl_approved_client.id_penduduk = tbl_kependudukan.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_rt.id_rt = tbl_kependudukan.id_rt');

        $query = $this->db->get_where('tbl_approved_client', $data_rt);

        return $query->result();

    }

    public function get_laporan_by_rt(){

        $rt_id = $this->session->userdata('rt_id');

        $data_rt = array(
            'tbl_rt.id_rt' => $rt_id
        );

        $query = $this->db->join('tbl_approved_client', 'tbl_approved_client.id_approved_client = tbl_laporan.id_approved_client');
        $query = $this->db->join('tbl_kependudukan', 'tbl_approved_client.id_penduduk = tbl_kependudukan.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_rt.id_rt = tbl_kependudukan.id_rt');

        $query = $this->db->get_where('tbl_laporan', $data_rt);

        return $query->result();

    }


    public function get_pendidikan_sd(){


        $rt_id = $this->session->userdata('rt_id');

        $data_sd = array(
            'tbl_rt.id_rt' => $rt_id,
        );

        $query = $this->db->join('tbl_kependudukan', 'tbl_approved_client.id_penduduk = tbl_kependudukan.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');
        $query = $this->db->get_where('tbl_approved_client', $data_sd);

        return $query->result();
    }

    public function get_pendidikan_smp(){


        $rt_id = $this->session->userdata('rt_id');

        $data_smp = array(
            'tbl_rt.id_rt' => $rt_id,
        );

        $query = $this->db->join('tbl_kependudukan', 'tbl_approved_client.id_penduduk = tbl_kependudukan.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');
        $query = $this->db->get_where('tbl_approved_client', $data_smp);

        return $query->result();
    }

    public function get_pendidikan_sma(){


        $rt_id = $this->session->userdata('rt_id');

        $data_sma = array(
            'tbl_rt.id_rt' => $rt_id,
        );

        $query = $this->db->join('tbl_kependudukan', 'tbl_approved_client.id_penduduk = tbl_kependudukan.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');
        $query = $this->db->get_where('tbl_approved_client', $data_sma);

        return $query->result();
    }

    public function get_pendidikan_d3(){


        $rt_id = $this->session->userdata('rt_id');

        $data_d3 = array(
            'tbl_rt.id_rt' => $rt_id,
        );

        $query = $this->db->join('tbl_kependudukan', 'tbl_approved_client.id_penduduk = tbl_kependudukan.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');
        $query = $this->db->get_where('tbl_approved_client', $data_d3);

        return $query->result();
    }

    public function get_pendidikan_s1(){


        $rt_id = $this->session->userdata('rt_id');

        $data_s1 = array(
            'tbl_rt.id_rt' => $rt_id,
        );

        $query = $this->db->join('tbl_kependudukan', 'tbl_approved_client.id_penduduk = tbl_kependudukan.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');
        $query = $this->db->get_where('tbl_approved_client', $data_s1);

        return $query->result();
    }

    public function get_pendidikan_s2(){


        $rt_id = $this->session->userdata('rt_id');

        $data_s2 = array(
            'tbl_rt.id_rt' => $rt_id,
        );

        $query = $this->db->join('tbl_kependudukan', 'tbl_approved_client.id_penduduk = tbl_kependudukan.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');
        $query = $this->db->get_where('tbl_approved_client', $data_s2);

        return $query->result();
    }

    public function get_pendidikan_s3(){


        $rt_id = $this->session->userdata('rt_id');

        $data_s3 = array(
            'tbl_rt.id_rt' => $rt_id,
        );

        $query = $this->db->join('tbl_kependudukan', 'tbl_approved_client.id_penduduk = tbl_kependudukan.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');
        $query = $this->db->get_where('tbl_approved_client', $data_s3);

        return $query->result();
    }

    public function add_kesehatan(){
        $approved_id = $this->input->post('id_approved_client', true);
        $bpjs_no = $this->input->post('bpjs_no', true);
        $bpjs_kelas = $this->input->post('bpjs_kelas', true);

        $data_kesehatan = array(
            'id_approved_client' => $approved_id,
            'no_bpjs' => $bpjs_no,
            'kelas_bpjs' => $bpjs_kelas
        );

        $data_kesehatan = $this->security->xss_clean($data_kesehatan);

        $insert_kesehatan = $this->db->insert('tbl_bpjs', $data_kesehatan);

        return $insert_kesehatan;
    }

    
    public function update_penduduk_approved($penduduk_id){

        $data_penduduk = array(
            'id_penduduk' => $penduduk_id
        );

        $insert_penduduk_to_approved = $this->db->insert('tbl_approved_client', $data_penduduk);

        return $insert_penduduk_to_approved;

    }

    public function delete_penduduk($penduduk_id){

        $data_penduduk = array(
            'id_penduduk' => $penduduk_id
        );

        $delete_penduduk = $this->db->delete('tbl_kependudukan', $data_penduduk);

        return $delete_penduduk;
    }

    public function get_kematin_by_rt(){


        $rt_id = $this->session->userdata('rt_id');


        $data = array (
            'tbl_rt.id_rt' => $rt_id
        );

        $query = $this->db->join('tbl_approved_client', 'tbl_approved_client.id_approved_client = tbl_kematian.id_approved_client');
        $query = $this->db->join('tbl_kependudukan', 'tbl_kependudukan.id_penduduk = tbl_approved_client.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');

        $query = $this->db->get_where('tbl_kematian', $data);

        return $query->result();

    }

    public function get_kesehatan_by_rt(){


        $rt_id = $this->session->userdata('rt_id');


        $data = array (
            'tbl_rt.id_rt' => $rt_id
        );

        $query = $this->db->join('tbl_approved_client', 'tbl_approved_client.id_approved_client = tbl_bpjs.id_approved_client');
        $query = $this->db->join('tbl_kependudukan', 'tbl_kependudukan.id_penduduk = tbl_approved_client.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');

        $query = $this->db->get_where('tbl_bpjs', $data);

        return $query->result();

    }

    public function get_umkm_by_rt(){

        
        $rt_id = $this->session->userdata('rt_id');


        $data = array (
            'tbl_rt.id_rt' => $rt_id
        );

        $query = $this->db->join('tbl_approved_client', 'tbl_approved_client.id_approved_client = tbl_umkm.id_approved_client');
        $query = $this->db->join('tbl_kependudukan', 'tbl_kependudukan.id_penduduk = tbl_approved_client.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');

        $query = $this->db->get_where('tbl_umkm', $data);

        return $query->result();


    }

    public function autocomplete_kematian_by_rt($penduduk){

        $rt_id = $this->session->userdata('rt_id');


        $data_kematian = array(
            'tbl_rt.id_rt' => $rt_id
        );

        $query = $this->db->join('tbl_kependudukan', 'tbl_kependudukan.id_penduduk = tbl_approved_client.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');

        $query = $this->db->like('nama_penduduk', $penduduk, 'BOTH');
        $query = $this->db->get_where('tbl_approved_client', $data_kematian);

        return $query->result();

    }

    public function autocomplete_kesahatan_by_rt($penduduk){

        $rt_id = $this->session->userdata('rt_id');


        $data_kesehatan = array(
            'tbl_rt.id_rt' => $rt_id
        );

        $query = $this->db->join('tbl_kependudukan', 'tbl_kependudukan.id_penduduk = tbl_approved_client.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');

        $query = $this->db->like('nama_penduduk', $penduduk, 'BOTH');
        $query = $this->db->get_where('tbl_approved_client', $data_kesehatan);

        return $query->result();

    }

    public function autocomplete_umkm_by_rt($penduduk){

        $rt_id = $this->session->userdata('rt_id');


        $data_umkm = array(
            'tbl_rt.id_rt' => $rt_id
        );

        $query = $this->db->join('tbl_kependudukan', 'tbl_kependudukan.id_penduduk = tbl_approved_client.id_penduduk');
        $query = $this->db->join('tbl_rt', 'tbl_kependudukan.id_rt = tbl_rt.id_rt');

        $query = $this->db->like('nama_penduduk', $penduduk, 'BOTH');
        $query = $this->db->get_where('tbl_approved_client', $data_umkm);

        return $query->result();

    }
    
}