    <!-- Main content -->
    <section class="content-header">
      <h1>
        UMKM
        <small>Input UMKM</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active">UMKM
        <a href="<?=base_url('input-umkm') ?>">
          <i class="fa fa-dashboard"></i><span>Input UMKM</span>
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
              <h3 class="box-title">Input UMKM</h3>
            </div>

            <form role="form" action="<?= base_url('umkm/add'); ?>" method=post>

            <div class="box-body">
                <?php cetak (validation_errors()); ?>

                <input type="hidden" name="id_approved_client" id="id_approved_client" placeholder="Id Approved Client">
              <!-- /.card-header -->
              <!-- form start -->

              <div class="form-group">
                    <label for="penduduk">Nama Penduduk</label>
                    <input type="text" class="form-control" id="penduduk" name="penduduk" placeholder="Input Nama Penduduk" value="" required="">
                    <?php cetak(form_error('penduduk')); ?>
                  </div>

                  <div class="form-group">
                    <label for="penduduk_ktp_no">No KTP Penduduk</label>
                    <input type="text" class="form-control" id="penduduk_ktp_no" readonly="" name="penduduk_ktp_no" placeholder="Input Nik Penduduk" value="" required="">
                  </div>

                  <div class="form-group">
                    <label for="umkm_nama">Nama Usaha</label>
                    <input type="text" class="form-control" id="umkm_nama" name="umkm_nama" placeholder="Input Nama UMKM" value="" required="">
                    <?php cetak(form_error('umkm_nama')); ?>
                  </div>

                  <div class="form-group">
                    <label for="umkm_jenis">Jenis Usaha</label>
                    <input type="text" class="form-control" id="umkm_jenis" name="umkm_jenis" placeholder="Input Jenis UMKM" value="" required="">
                    <?php cetak(form_error('umkm_jenis')); ?>
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
  $(document).ready(function(){
      
    $("#penduduk").autocomplete({
      source : "<?php echo site_url('page/input_umkm_autocomplete') ?>",

      select: function(event, ui){
        $('[name="penduduk"]').val(ui.item.label);
        $('[name="penduduk_ktp_no"]').val(ui.item.penduduk_ktp_no);
        $('[name="id_approved_client"]').val(ui.item.id_approved_client);

      }
    });
});

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
    $('#umkm_tgl').attr('max', maxDate);
});

</script>
