    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Kelurahan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url('kelurahan/update'); ?>" method="post">
                <div class="card-body">
                <?php cetak (validation_errors()); ?>

                <input type="hidden" name="kelurahan_id" value="<?php cetak(encrypt_url($kelurahan->id_kelurahan)); ?>">

                <div class="form-group">
                  <label for="kecamatan">Nama Kecamatan</label>
                  <select name="kecamatan" class="form-control" id="kecamatan" required="">

                    <option value="<?php cetak(encrypt_url($kelurahan->id_kecamatan)); ?>"><?php cetak($kelurahan->nama_kecamatan); ?></option>

                    <?php foreach ($kecamatan as $key => $data_kecamatan) { ?>
                    
                    <option value="<?php cetak (encrypt_url($data_kecamatan->id_kecamatan)); ?>"><?php cetak ($data_kecamatan->nama_kecamatan) ?></option>

                    <?php } ?>
                        
                    </select>

                    <?php echo form_error('kecamatan'); ?>

                  </div>

                  <div class="form-group">
                    <label for="update-kelurahan">Nama kelurahan</label>
                    <input type="text" class="form-control" id="kelurahan_nama" name="kelurahan_nama" placeholder="update Nama kelurahan" value="<?php cetak($kelurahan->nama_kelurahan); ?>" required="">
                    <?php cetak(form_error('kelurahan_nama')); ?>
                  </div>


                  <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

                <!-- /.card-body -->

    </section>

    <!-- /.content -->