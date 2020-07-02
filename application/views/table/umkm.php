<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data UMKM</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
              <div class="table-responsive"> 
              
              <table id="table_umkm" class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nik</th>
                    <th>Nama Penduduk</th>
                    <th>Nama Usaha</th>
                    <th>Jenis Usaha</th>
                    <th>Option</th>
                    <tbody>
                <?php
                $no = 0;
                
                foreach ($umkm as $table_umkm) { $no++; ?>

                    <tr>
                    <td><?php cetak ($no) ?>
                    <td><?php cetak($table_umkm->no_ktp_penduduk) ?></td>
                    <td><?php cetak($table_umkm->nama_penduduk) ?></td>
                    <td><?php cetak ($table_umkm->nama_usaha) ?></td>
                    <td><?php cetak ($table_umkm->jenis_usaha) ?></td>
            
                    <td>
                    <a href = "<?php cetak (site_url('edit-umkm/'.encrypt_url($table_umkm->id_umkm))) ?>" class="btn btn-sm btn-primary" ><span class="glyphicon glyphicon-edit"></span></a>
                    <a onclick="return confirm('Apakah anda ingin menghapusnya ?')" href="<?php cetak (site_url('umkm/delete/'.encrypt_url($table_umkm->id_umkm))); ?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
                </tr>

                <?php } ?>
                    </tr>
                    </tbody>
                </thead>
</table>
</div>
<div class="box-footer">
                <a href="<?php cetak (site_url('input-umkm')); ?>"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah</button></a>
              </div>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
        
          <!-- /.box -->

          <!-- /.box -->

          <!-- Input addon -->
          
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
      </div>

    </section>

  
    <!-- /.content -->