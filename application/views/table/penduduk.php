<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Penduduk</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
              <div class="table-responsive"> 
              
              <table id="table_penduduk" class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>No KTP</th>
                    <th>Nama Penduduk</th>
                    <th>Agama Penduduk</th>
                    <th>Alamat Penduduk</th>
                    <th>Umur Penduduk</th>
                    <th>Tempat Lahir</th>
                    <th>Status</th>
                    <th>Option</th>
                    <tbody>
                <?php
                $no = 0;
                
                foreach ($penduduk as $table_penduduk) { $no++; ?>

                    <tr>
                    <td><?php cetak ($no) ?>
                    <td><?php cetak ($table_penduduk->no_ktp_penduduk) ?></td>
                    <td><?php cetak ($table_penduduk->nama_penduduk) ?></td>
                    <td><?php cetak ($table_penduduk->agama_penduduk) ?></td>
                    
                    <td><?php cetak ($table_penduduk->alamat_penduduk) ?></td>
                    <td><?php $born = new DateTime ($table_penduduk->tgl_lahir_penduduk); 
                    $today = new DateTime();
                    $age = $today->diff($born);
                    cetak ($age->y);
                    ?> Tahun</td>
                    <td><?php cetak ($table_penduduk->tempat_lahir_penduduk) ?></td>

                    </td>
                    <td><?php if(!empty($table_penduduk->id_approved_client)) {
                      echo 'Approved';
                    } else {
                      echo 'Not Approved';
                    } ?>
                    </td>
                    <td>
                    <a href = "<?php cetak (site_url('edit-penduduk/'.encrypt_url($table_penduduk->id_penduduk))) ?>" class="btn btn-sm btn-primary" ><span class="glyphicon glyphicon-edit"></span></a>
                    <?php if(!empty($table_penduduk->id_approved_client)) {
                    echo '';
                    } else { ?>
                     <a onclick="return confirm('Apakah anda ingin mengaproved ?')" href="<?php cetak (site_url('penduduk/approved/'.encrypt_url($table_penduduk->id_penduduk))); ?>" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-check"></span></a>
                    
                   <?php } ?>
                   <a onclick="return confirm('Apakah anda ingin menghapusnya ?')" href="<?php cetak (site_url('penduduk/delete/'.encrypt_url($table_penduduk->id_penduduk))); ?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
                </tr>

                <?php } ?>
                    </tr>
                    </tbody>
                </thead>
</table>
</div>
<div class="box-footer">
                <a href="<?php cetak (site_url('input-penduduk')); ?>"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah</button></a>
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