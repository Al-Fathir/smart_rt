    <!-- Main content -->
    <section class="content-header">
      <h1>
        Kesehatan
        <small>Input Kesehatan</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active">Kesehatan
        <a href="<?=base_url('input-kesehatan') ?>">
          <i class="fa fa-dashboard"></i><span>Input Kesehatan</span>
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
              <h3 class="box-title">Input Kesehatan</h3>
            </div>

            <form role="form" action="<?= base_url('kesehatan/add'); ?>" method=post>

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
                    <label for="bpjs_no">Nomor Bpjs</label>
                    <input type="text" class="form-control" id="bpjs_no" name="bpjs_no" placeholder="Input Nomor Bpjs" value="" required="">
                    <?php cetak(form_error('bpjs_no')); ?>
                  </div>

                  <div class="form-group">
                  <label for="">Kelas BPJS</label><br>
                 <input name="bpjs_kelas" value="1" type="radio"style="margin-left:5px;"> Bpjs Kelas 1
                 <input name="bpjs_kelas" value="2" type="radio"style="margin-left:5px;"> Bpjs Kelas 2
                 <input name="bpjs_kelas" value="3" type="radio"style="margin-left:5px;"> Bpjs Kelas 3

                    <?php echo form_error('bpjs_kelas'); ?>

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
      source : "<?php echo site_url('page/input_kesehatan_autocomplete') ?>",

      select: function(event, ui){
        $('[name="penduduk"]').val(ui.item.label);
        $('[name="penduduk_ktp_no"]').val(ui.item.penduduk_ktp_no);
        $('[name="id_approved_client"]').val(ui.item.id_approved_client);

      }
    });
});


</script>
