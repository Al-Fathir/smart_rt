    <!-- Main content -->
    <section class="content-header">
      <h1>
        Penduduk
        <small>Input Penduduk</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active">Penduduk
        <a href="<?=base_url('input-Penduduk') ?>">
          <i class="fa fa-dashboard"></i><span>Input Penduduk</span>
          </a>
        </li>
      </ol>
    </section>

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Penduduk</h3>
            </div>

            <form role="form" action="<?= base_url('penduduk/add'); ?>" method=post>

            <div class="box-body">
                <?php cetak (validation_errors()); ?>

                <input type="hidden" name="rt_id" value="<?php cetak(encrypt_url($this->session->userdata('rt_id'))); ?>">
              <!-- /.card-header -->
              <!-- form start -->

              <div class="form-group">
                    <label for="penduduk_ktp_no">No KTP Penduduk</label>
                    <input type="text" class="form-control" id="penduduk_ktp_no" name="penduduk_ktp_no" placeholder="Input No KTP Penduduk" value="" required="">
                    <?php cetak(form_error('penduduk_ktp_no')); ?>
                  </div>

                  <div class="form-group">
                    <label for="penduduk_kk_no">No KK Penduduk</label>
                    <input type="text" class="form-control" id="penduduk_kk_no" name="penduduk_kk_no" placeholder="Input No KK Penduduk" value="" required="">
                    <?php cetak(form_error('penduduk_kk_no')); ?>
                  </div>

                  <div class="form-group">
                    <label for="penduduk_email">email Penduduk</label>
                    <input type="text" class="form-control" id="penduduk_email" name="penduduk_email" placeholder="Input email Penduduk" value="" required="">
                    <?php cetak(form_error('penduduk_email')); ?>
                  </div>

              <div class="form-group">
                    <label for="penduduk_nama">Nama penduduk</label>
                    <input type="text" class="form-control" id="penduduk_nama" name="penduduk_nama" placeholder="Input Nama penduduk" value="" required="">
                    <?php cetak(form_error('penduduk_nama')); ?>
                  </div>

                  <div class="form-group">
                    <label for="penduduk_password">Password Penduduk</label>
                    <input type="password" class="form-control" id="penduduk_password" name="penduduk_password" placeholder="Input Password Penduduk" required="">
                    <?php cetak(form_error('penduduk_password')); ?>
                  </div>

                  <div class="form-group">
                    <label for="penduduk_pekerjaan">Pekerjaan Penduduk</label>
                    <input type="text" class="form-control" id="penduduk_pekerjaan" name="penduduk_pekerjaan" placeholder="Input Pekerjaan Penduduk" value="" required="">
                    <?php cetak(form_error('penduduk_pekerjaan')); ?>
                  </div>
                  
                

                  <div class="form-group">
                    <label for="penduduk_alamat">Alamat Penduduk</label>
                    <input type="text" class="form-control" id="penduduk_alamat" name="penduduk_alamat" placeholder="Input Alamat Penduduk" value="" required="">
                    <?php cetak(form_error('penduduk_alamat')); ?>
                  </div>

                  <div class="form-group">
                  <label for="penduduk_agama">Agama</label>
                  <select name="penduduk_agama" class="form-control" id="penduduk_agama" required="">
              
                    <option value="Islam"> Islam</option>
                    <option value="Kristen"> Kristen</option>
                    <option value="Katholik"> Katholik</option>
                    <option value="Hindu"> Hindu</option>
                    <option value="Budha"> Budha</option>
                    <option value="Konghucu"> Konghucu</option>
                    <option value="Kepercayaan"> Kepercayaan</option>
                
                    
                    </select>
                    <?php echo form_error('penduduk_agama'); ?>
                  </div>


                  <div class="form-group">
                  <label for="penduduk_gol">Golongan Darah</label><br>
                 <input name="penduduk_gol" value="A" type="radio"style="margin-left:5px;"> A
                 <input name="penduduk_gol" value="B" type="radio" style="margin-left:5px;"> B
                 <input name="penduduk_gol" value="O"  type="radio" style="margin-left:5px;"> O
                 <input name="penduduk_gol" value="AB" type="radio" style="margin-left:5px;"> AB

                    <?php echo form_error('penduduk_gol'); ?>

                    </div>

                    <div class="form-group">
                  <label for="penduduk_jns_kelamin">Jenis Kelamin</label><br>
                 <input name="penduduk_jns_kelamin" value="Pria" type="radio"style="margin-left:5px;"> Pria
                 <input name="penduduk_jns_kelamin" value="Wanita" type="radio"style="margin-left:5px;"> Wanita

                    <?php echo form_error('penduduk_jns_kelamin'); ?>

                    </div>

                    <div class="form-group">
                  <label for="nikah_status">Status Pernikahan</label><br>
                 <input name="nikah_status" value="Belum Menikah" type="radio"style="margin-left:5px;"> Belum Menikah
                 <input name="nikah_status" value="Sudah Menikah" type="radio"style="margin-left:5px;"> Sudah Menikah

                    <?php echo form_error('nikah_status'); ?>

                    </div>

                    <div class="form-group">
                  <label for="wn_status">Status Kewarganegaraan</label><br>
                 <input name="wn_status" value="WNI" type="radio"style="margin-left:5px;"> WNI
                 <input name="wn_status" value="WNA" type="radio"style="margin-left:5px;"> WNA

                    <?php echo form_error('wn_status'); ?>

                    </div>

                  <div class="form-group">
                    <label for="input-penduduk">Tempat Lahir Penduduk</label>
                    <input type="text" class="form-control" id="penduduk_tempat_lahir" name="penduduk_tempat_lahir" placeholder="Input Tempat Lahir Penduduk" value="" required="">
                    <?php cetak(form_error('penduduk_tempat_lahir')); ?>
                  </div>

                  <div class="form-group">
                    <label for="penduduk_tgl_lahir">Tanggal Lahir Penduduk</label>
                    <input type="date" class="form-control" id="penduduk_tgl_lahir" name="penduduk_tgl_lahir" placeholder="Input Tanggal Lahir" value="" required="">
                    <?php cetak(form_error('penduduk_tgl_lahir')); ?>
                  </div>

              
                  <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>


                <!-- /.card-body -->

                </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <script>
    $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#penduduk_tgl_lahir').attr('max', maxDate);
});
</script>