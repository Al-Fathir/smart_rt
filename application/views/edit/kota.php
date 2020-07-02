    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Kota</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url('kota/update'); ?>" method="post">
                <div class="card-body">
                <?php cetak (validation_errors()); ?>

                <input type="hidden" name="kota_id" value="<?php cetak(encrypt_url($kota->id_kota)) ?>">

                <div class="form-group">
                  <label for="provinsi">Nama Provinsi</label>
                  <select name="provinsi" class="form-control" id="provinsi" required="">

                    <option value="<?php cetak(encrypt_url($kota->id_provinsi)); ?>"><?php cetak($kota->nama_provinsi); ?></option>
                  
                        <?php foreach($provinsi as $key => $data_provinsi) { ?>
                        
                          <option value="<?php cetak(encrypt_url($data_provinsi->id_provinsi)) ?>"><?php cetak($data_provinsi->nama_provinsi) ?></option>; 

                     <?php } ?> 
              
                    </select>

                    <?php echo form_error('provinsi'); ?>

                  </div>

                  <div class="form-group">
                    <label for="update-kota">Nama Kota</label>
                    <input type="text" class="form-control" id="kota_nama" name="kota_nama" placeholder="Update Nama kota" value="<?php cetak($kota->nama_kota); ?>" required="">
                    <?php cetak(form_error('kota_nama')); ?>
                  </div>


                  <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

                <!-- /.card-body -->

    </section>
    <!-- /.content -->