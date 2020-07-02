    <!-- Main content -->
    <section class="content-header">
      <h1>
        Berita
        <small>Input Berita</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active">Berita
        <a href="<?=base_url('input-berita') ?>">
          <i class="fa fa-dashboard"></i><span>Input Berita</span>
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
              <h3 class="box-title">Input Berita</h3>
            </div>

            <form role="form" action="<?= base_url('berita/add'); ?>" method=post enctype="multipart/form-data">

            <div class="box-body">
                <?php cetak (validation_errors()); ?>

                <input type="hidden" name="rt_id" value="<?php cetak(encrypt_url($this->session->userdata('rt_id'))); ?>">
              <!-- /.card-header -->
              <!-- form start -->

              <div class="form-group">

              <div class="row">

<div class="col-sm-2">

<!-- User Profile Image -->
<img class="berita-pic" src="<?php echo base_url('assets/dist/img/no_image.jpg'); ?>">

<!-- Default Image -->
<!-- <i class="fa fa-user fa-5x"></i> -->

<div class="p-image">
<i class="fa fa-camera upload-button"></i>
<input type="file" name="upload_berita" accept="image/*"/>

</div>

</div>

</div>

<br>

                    <label for="berita_judul">Judul Berita</label>
                    <input type="text" class="form-control" id="berita_judul" name="berita_judul" placeholder="Input Judul Berita" value="" required="">
                    <?php cetak(form_error('berita_judul')); ?>
                  </div>

                  <div class="form-group">
                    <label for="berita_isi">Isi Berita</label>
                    <input type="text" class="form-control" id="berita_isi" name="berita_isi" placeholder="Input Isi berita" value="" required="">
                    <?php cetak(form_error('berita_isi')); ?>
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

$(document).ready(function() {

    
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.berita-pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$("input[type=file]").on('change', function(){
    readURL(this);
});

$(".upload-button").on('click', function() {
   $("input[type=file]").click();
});
});

</script>