<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Berita</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
              <div class="table-responsive"> 
              
              <table id="table_berita" class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Tanggal Berita</th>
                    <th>Judul Berita</th>
                    <th>Isi Berita</th>
                    <th>Option</th>
                    <tbody>
                <?php
                $no = 0;
                
                foreach ($berita as $table_berita) { $no++; ?>

                    <tr>
                    <td><?php cetak ($no) ?>
                    <td><?php cetak ($table_berita->tgl_berita) ?></td>
                    <td><?php cetak ($table_berita->judul_berita) ?></td>
                    <td><?php cetak ($table_berita->isi_berita) ?></td>
                    <td>
                    <a href = "<?php cetak (site_url('edit-berita/'.encrypt_url($table_berita->id_berita))) ?>" class="btn btn-sm btn-primary" ><span class="glyphicon glyphicon-edit"></span></a>
                    <a onclick="return confirm('Apakah anda ingin menghapusnya ?')" href="<?php cetak (site_url('berita/delete/'.encrypt_url($table_berita->id_berita))); ?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
                </tr>

                <?php } ?>
                    </tr>
                    </tbody>
                </thead>
</table>
</div>
<div class="box-footer">
                <a href="<?php cetak (site_url('input-berita')); ?>"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah</button></a>
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