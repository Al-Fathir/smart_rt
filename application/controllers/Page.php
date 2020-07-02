<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Page extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Main_Model');

        if(! $this->session->userdata('authenticated'))
        redirect('login');
    }

    public function home(){

        $get_all_penduduk_by_rt = $this->Main_Model->count_penduduk_by_rt();
        $get_all_penduduk_approved_by_rt = $this->Main_Model->count_penduduk_approved_rt();
        $get_all_penduduk_not_approved_by_rt = $this->Main_Model->count_penduduk_not_approved_rt();


        $data = array(
            'penduduk_by_rt' =>$get_all_penduduk_by_rt,
            'penduduk_approved_by_rt' => $get_all_penduduk_approved_by_rt,
            'penduduk_not_approved_by_rt' => $get_all_penduduk_not_approved_by_rt
        );

        $this->template->load('template', 'dashboard/home', $data);
    }

    public function input_penduduk(){
        $this->template->load('template', 'input/penduduk');
    }

    public function input_agenda(){
        $this->template->load('template', 'input/agenda');
    }

    public function input_berita(){
        $this->template->load('template', 'input/berita');
    }

    public function input_umkm(){

        $this->template->load('template', 'input/umkm');

    }

    public function data_penduduk(){
        $get_penduduk = $this->Main_Model->get_penduduk_by_approved();
        
        $data_penduduk = array(
            'penduduk' => $get_penduduk
        );

        $this->template->load('template', 'table/penduduk', $data_penduduk);

    } 

    public function data_agenda(){

        $get_agenda = $this->Main_Model->get_agenda_by_rt();

        $data_agenda = array(
            'agenda' => $get_agenda
        );

        $this->template->load('template', 'table/agenda', $data_agenda);
    }

    public function data_berita(){

        $get_berita = $this->Main_Model->get_berita_by_rt();

        $data_berita = array(
            'berita' => $get_berita
        );

        $this->template->load('template', 'table/berita', $data_berita);
    }

    public function data_kematian(){

        $get_kematian = $this->Main_Model->get_kematin_by_rt();

        $data_kematian = array(
            'kematian' => $get_kematian
        );

        $this->template->load('template', 'table/kematian', $data_kematian);

    }

    public function data_kesehatan(){

        $get_kesehatan = $this->Main_Model->get_kesehatan_by_rt();

        $data_kesehatan = array(
            'kesehatan' => $get_kesehatan
        );

        $this->template->load('template', 'table/kesehatan', $data_kesehatan);

    }

    public function data_umkm(){
        $get_umkm = $this->Main_Model->get_umkm_by_rt();

        $data_umkm = array(
            'umkm' => $get_umkm
        );

        $this->template->load('template', 'table/umkm', $data_umkm);
    }

    var $penduduk = 'autocomplete';

    public function input_kematian(){

        $get_input_kematian = array(
            'penduduk' => $this->penduduk
        );

        $this->template->load('template', 'input/kematian', $get_input_kematian);

    }

    public function input_kesehatan(){

        $get_input_kesehatan = array(
            'penduduk' => $this->penduduk
        );

        $this->template->load('template', 'input/kesehatan', $get_input_kesehatan);

    }

    public function data_laporan(){

        $get_laporan = $this->Main_Model->get_laporan_by_rt();

        $data_laporan = array(
            'laporan' => $get_laporan
        );

        $this->template->load('template', 'table/laporan', $data_laporan);

    }
    

    public function input_kematian_autocomplete(){

        if(isset($_GET['term'])) {
            $result = $this->Main_Model->autocomplete_kematian_by_rt($_GET['term']);
            if(count($result) > 0 ){
                foreach($result as $row)
                $result_array[] = array(
                    'label'=> $row->nama_penduduk,
                    'penduduk_ktp_no' => strtoupper($row->no_ktp_penduduk),
                    'id_approved_client' => strtoupper($row->id_approved_client)
                );
                echo json_encode($result_array);
            }
        }

    }
    
    public function input_kesehatan_autocomplete(){

        if(isset($_GET['term'])) {
            $result = $this->Main_Model->autocomplete_kesahatan_by_rt($_GET['term']);
            if(count($result) > 0 ){
                foreach($result as $row)
                $result_array[] = array(
                    'label'=> $row->nama_penduduk,
                    'penduduk_ktp_no' => $row->no_ktp_penduduk,
                    'id_approved_client' => $row->id_approved_client
                );
                echo json_encode($result_array);
            }
        }

    }

    public function input_umkm_autocomplete(){

        if(isset($_GET['term'])) {
            $result = $this->Main_Model->autocomplete_umkm_by_rt($_GET['term']);
            if(count($result) > 0 ){
                foreach($result as $row)
                $result_array[] = array(
                    'label'=> $row->nama_penduduk,
                    'penduduk_ktp_no' => $row->no_ktp_penduduk,
                    'id_approved_client' => $row->id_approved_client
                );
                echo json_encode($result_array);
            }
        }

    }

    public function data_pendidikan(){
        $this->template->load('template', 'table/pendidikan');
    }

    public function data_putus_sekolah(){

        $get_putus_sekolah = $this->Main_Model->get_putus_sekolah();

        $data_putus_sekolah = array(
            'putus_sekolah' => $get_putus_sekolah
        );

        $this->template->load('template', 'table/putus_sekolah', $data_putus_sekolah);
    }

    public function load_pendidikan_sd(){

        $pendidikan = $_GET['pendidikan'];

        $pendidikan_sd = $this->Main_Model->get_pendidikan_sd();
        
        foreach ($pendidikan_sd as $table_pendidikan) {

        if(! $table_pendidikan->nama_sd == null)  { ?>

				<tr>
                
					<td><?php cetak ($table_pendidikan->no_ktp_penduduk) ?></td>
                    <td><?php cetak ($table_pendidikan->nama_penduduk)?></td>
                    <td><?php cetak ($table_pendidikan->nama_sd) ?></td>
                    <td><?php cetak ($table_pendidikan->lokasi_sd) ?></td>
                    <td><?php cetak ($table_pendidikan->tahun_masuk_sd) ?></td>
                    <td><?php cetak ($table_pendidikan->tahun_lulus_sd) ?></td>
					
                    </tr>

        <?php } else{
                        echo '';
                    } ?>

        <?php } ?>
        

	<?php } 


    public function load_pendidikan_smp(){

        $pendidikan = $_GET['pendidikan'];

        $pendidikan_smp = $this->Main_Model->get_pendidikan_smp();
        	
        foreach ($pendidikan_smp as $table_pendidikan) {
        
            if(! $table_pendidikan->nama_smp == null)  { ?>

				<tr>
                
					<td><?php cetak ($table_pendidikan->no_ktp_penduduk) ?></td>
                    <td><?php cetak ($table_pendidikan->nama_penduduk)?></td>
                    <td><?php cetak ($table_pendidikan->nama_smp) ?></td>
                    <td><?php cetak ($table_pendidikan->lokasi_smp) ?></td>
                    <td><?php cetak ($table_pendidikan->tahun_masuk_smp) ?></td>
                    <td><?php cetak ($table_pendidikan->tahun_lulus_smp) ?></td>
                    
					
                    </tr>
                    

                    <?php } else{
                        echo '';
                    } ?>

        <?php } ?>
        

    <?php } 
    
    public function load_pendidikan_sma(){

        $pendidikan = $_GET['pendidikan'];

        $pendidikan_sma = $this->Main_Model->get_pendidikan_sma();
        	
        foreach ($pendidikan_sma as $table_pendidikan) {
        
            if(! $table_pendidikan->nama_sma == null)  { ?>

				<tr>
                
					<td><?php cetak ($table_pendidikan->no_ktp_penduduk) ?></td>
                    <td><?php cetak ($table_pendidikan->nama_penduduk)?></td>
                    <td><?php cetak ($table_pendidikan->nama_sma) ?></td>
                    <td><?php cetak ($table_pendidikan->lokasi_sma) ?></td>
                    <td><?php cetak ($table_pendidikan->tahun_masuk_sma) ?></td>
                    <td><?php cetak ($table_pendidikan->tahun_lulus_sma) ?></td>
                    
                    </tr>
                    
                    <?php } else{
                        echo '';
                    } ?>

        <?php } ?>
        

    <?php } 
    
    public function load_pendidikan_d3(){

        $pendidikan = $_GET['pendidikan'];

        $pendidikan_d3 = $this->Main_Model->get_pendidikan_d3();
        	
        foreach ($pendidikan_d3 as $table_pendidikan) {
        
            if(! $table_pendidikan->nama_d3 == null)  { ?>

				<tr>
                
					<td><?php cetak ($table_pendidikan->no_ktp_penduduk) ?></td>
                    <td><?php cetak ($table_pendidikan->nama_penduduk)?></td>
                    <td><?php cetak ($table_pendidikan->nama_d3) ?></td>
                    <td><?php cetak ($table_pendidikan->lokasi_d3) ?></td>
                    <td><?php cetak ($table_pendidikan->tahun_masuk_d3) ?></td>
                    <td><?php cetak ($table_pendidikan->tahun_lulus_d3) ?></td>
                    
                    </tr>
                    
                    <?php } else{
                        echo '';
                    } ?>

        <?php } ?>
        

    <?php } 
    
    public function load_pendidikan_s1(){

        $pendidikan = $_GET['pendidikan'];

        $pendidikan_s1 = $this->Main_Model->get_pendidikan_s1();
        	
        foreach ($pendidikan_s1 as $table_pendidikan) {
        
            if(! $table_pendidikan->nama_s1 == null)  { ?>

				<tr>
                
					<td><?php cetak ($table_pendidikan->no_ktp_penduduk) ?></td>
                    <td><?php cetak ($table_pendidikan->nama_penduduk)?></td>
                    <td><?php cetak ($table_pendidikan->nama_s1) ?></td>
                    <td><?php cetak ($table_pendidikan->lokasi_s1) ?></td>
                    <td><?php cetak ($table_pendidikan->tahun_masuk_s1) ?></td>
                    <td><?php cetak ($table_pendidikan->tahun_lulus_s1) ?></td>
                    
                    </tr>
                    
                    <?php } else{
                        echo '';
                    } ?>

        <?php } ?>
        

	<?php } 

public function load_pendidikan_s2(){

    $pendidikan = $_GET['pendidikan'];

    $pendidikan_s2 = $this->Main_Model->get_pendidikan_s2();
        
    foreach ($pendidikan_s2 as $table_pendidikan) {
    
        if(! $table_pendidikan->nama_s2 == null)  { ?>

            <tr>
            
                <td><?php cetak ($table_pendidikan->no_ktp_penduduk) ?></td>
                <td><?php cetak ($table_pendidikan->nama_penduduk)?></td>
                <td><?php cetak ($table_pendidikan->nama_s2) ?></td>
                <td><?php cetak ($table_pendidikan->lokasi_s2) ?></td>
                <td><?php cetak ($table_pendidikan->tahun_masuk_s2) ?></td>
                <td><?php cetak ($table_pendidikan->tahun_lulus_s2) ?></td>
                
                </tr>
                
                <?php } else{
                    echo '';
                } ?>

    <?php } ?>
    

<?php } 

public function load_pendidikan_s3(){

    $pendidikan = $_GET['pendidikan'];

    $pendidikan_s3 = $this->Main_Model->get_pendidikan_s3();
        
    foreach ($pendidikan_s3 as $table_pendidikan) {
    
        if(! $table_pendidikan->nama_s3 == null)  { ?>

            <tr>
            
                <td><?php cetak ($table_pendidikan->no_ktp_penduduk) ?></td>
                <td><?php cetak ($table_pendidikan->nama_penduduk)?></td>
                <td><?php cetak ($table_pendidikan->nama_s3) ?></td>
                <td><?php cetak ($table_pendidikan->lokasi_s3) ?></td>
                <td><?php cetak ($table_pendidikan->tahun_masuk_s3) ?></td>
                <td><?php cetak ($table_pendidikan->tahun_lulus_s3) ?></td>
                
                </tr>
                
                <?php } else{
                    echo '';
                } ?>

    <?php } ?>
    

<?php } 


    public function edit_penduduk($penduduk_id){

        $penduduk_id = decrypt_url($penduduk_id);

        $get_penduduk = $this->Main_Model->get_all_penduduk_by_id($penduduk_id);

        $data_penduduk = array(
            'penduduk' => $get_penduduk,
   
        );

        $this->template->load('template', 'edit/penduduk', $data_penduduk);
    }

}