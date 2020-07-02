    <!-- Main content -->
    <section class="content-header">
      <h1>
        Agenda
        <small>Input Agenda</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active">Agenda
        <a href="<?=base_url('input-agenda') ?>">
          <i class="fa fa-dashboard"></i><span>Input Agenda</span>
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
              <h3 class="box-title">Input Agenda</h3>
            </div>

            <form role="form" action="<?= base_url('agenda/add'); ?>" method=post>

            <div class="box-body">
                <?php cetak (validation_errors()); ?>

                <input type="hidden" name="rt_id" value="<?php cetak(encrypt_url($this->session->userdata('rt_id'))); ?>">
              <!-- /.card-header -->
              <!-- form start -->

              <div class="form-group">
                    <label for="agenda_nama">Nama Agenda</label>
                    <input type="text" class="form-control" id="agenda_nama" name="agenda_nama" placeholder="Input Nama Agenda" value="" required="">
                    <?php cetak(form_error('agenda_nama')); ?>
                  </div>

                  <div class="form-group">
                    <label for="agenda_isi">Isi Agenda</label>
                    <input type="text" class="form-control" id="agenda_isi" name="agenda_isi" placeholder="Input Isi Agenda" value="" required="">
                    <?php cetak(form_error('agenda_isi')); ?>
                  </div>

                  <div class="form-group">
                    <label for="agenda_waktu">Waktu Agenda</label>
                    <input type="datetime-local" class="form-control" id="agenda_waktu" name="agenda_waktu" placeholder="Input Waktu Agenda" value="" required="">
                    <?php cetak(form_error('agenda_waktu')); ?>
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
</script>