    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Rt</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo base_url('rt/update'); ?>" method="post">
                <div class="card-body">
                <?php cetak (validation_errors()); ?>

                <input type="hidden" name="rt_id" value="<?php cetak(encrypt_url($rt->id_rt)); ?>">

                <div class="form-group">
                  <label for="kelurahan">Nama Kelurahan</label>
                  <select name="kelurahan" class="form-control" id="kelurahan" required="">

                    <option value="<?php cetak(encrypt_url($rt->id_kelurahan)); ?>"><?php cetak($rt->nama_kelurahan); ?></option>

                    <?php foreach ($kelurahan as $key => $data_kelurahan) { ?>
                    
                    <option value="<?php cetak (encrypt_url($data_kelurahan->id_kelurahan)); ?>"><?php cetak ($data_kelurahan->nama_kelurahan) ?></option>

                    <?php } ?>
                        
                    </select>

                    <?php echo form_error('kelurahan'); ?>

                  </div>

                  <div class="form-group">
                    <label for="update-rt">Username Rt</label>
                    <input type="text" class="form-control" id="rt_username" name="rt_username" placeholder="Update Username Rt" value="<?php cetak($rt->username_rt); ?>" required="">
                    <?php cetak(form_error('rt_username')); ?>
                  </div>

                  <div class="form-group">
                    <label for="update-rt">Nama Rt</label>
                    <input type="text" class="form-control" id="rt_nama" name="rt_nama" placeholder="Update Nama Rt" value="<?php cetak($rt->nama_rt); ?>" required="">
                    <?php cetak(form_error('rt_nama')); ?>
                  </div>

                  <div class="form-group">
                    <label for="update-rt">Password Rt</label>
                    <input type="password" class="form-control" id="rt_password" name="rt_password" placeholder="Update Password Rt" value="<?php cetak($rt->password_rt); ?>" required="">
                    <?php cetak(form_error('rt_password')); ?>
                  </div>

                  <div class="form-group">
                    <label for="update-rt">No Hp Rt</label>
                    <input type="text" class="form-control" id="rt_no_hp" name="rt_no_hp" placeholder="Update No Hp Rt" value="<?php cetak($rt->no_hp_rt); ?>" required="">
                    <?php cetak(form_error('rt_no_hp')); ?>
                  </div>

                  <div class="form-group">
                    <label for="update-rt">No Hp Rt</label>
                    <input type="text" class="form-control" id="rt_no" name="rt_no" placeholder="Update No Rt" value="<?php cetak($rt->no_rt); ?>" required="">
                    <?php cetak(form_error('rt_no')); ?>
                  </div>
                


                  <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

                <!-- /.card-body -->

    </section>

    <!-- /.content -->