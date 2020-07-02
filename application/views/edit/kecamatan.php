    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Kecamatan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url('kecamatan/update'); ?>" method="post">
                <div class="card-body">
                <?php cetak (validation_errors()); ?>

                <input type="hidden" name="kecamatan_id" value="<?php cetak(encrypt_url($kecamatan->id_kecamatan)); ?>">

                <div class="form-group">
                  <label for="kota">Nama Kota</label>
                  <select name="kota" class="form-control" id="kota" required="">

                    <option value="<?php cetak(encrypt_url($kecamatan->id_kota)); ?>"><?php cetak($kecamatan->nama_kota); ?></option>

                    <?php foreach ($kota as $key => $data_kota) { ?>
                    
                    <option value="<?php cetak (encrypt_url($data_kota->id_kota)); ?>"><?php cetak ($data_kota->nama_kota) ?></option>

                    <?php } ?>
                        
                    </select>

                    <?php echo form_error('kota'); ?>

                  </div>

                  <div class="form-group">
                    <label for="update-Kecamatan">Nama Kecamatan</label>
                    <input type="text" class="form-control" id="kecamatan_nama" name="kecamatan_nama" placeholder="update Nama Kecamatan" value="<?php cetak($kecamatan->nama_kecamatan); ?>" required="">
                    <?php cetak(form_error('kecamatan_nama')); ?>
                  </div>


                  <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

                <!-- /.card-body -->

    </section>

    <!-- /.content -->