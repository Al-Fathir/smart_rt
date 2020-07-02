<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Laporan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
              <div class="table-responsive"> 
              
              <table id="table_laporan" class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Pelapor</th>
                    <th>Judul Laporan</th>
                    <th>Isi Laporan</th>
                    <th>Tanggal Laporan</th>
                    <tbody>
                <?php
                $no = 0;
                
                foreach ($laporan as $table_laporan) { $no++; ?>

                    <tr>
                    <td><?php cetak ($no) ?>
                    <td><?php cetak ($table_laporan->nama_penduduk) ?></td>
                    <td><?php cetak ($table_laporan->judul_laporan) ?></td>
                    <td><?php cetak ($table_laporan->isi_laporan) ?></td>
                    <td><?php cetak ($table_laporan->tgl_laporan) ?></td>
                    <td>
                    <a href = "<?php cetak (site_url('cek-laporan/'.encrypt_url($table_laporan->id_laporan))) ?>" class="btn btn-sm btn-primary" ><span class="glyphicon glyphicon-edit"></span></a>
                </td>
                </tr>

                <?php } ?>
                    </tr>
                    </tbody>
                </thead>
</table>
</div>
<div class="box-footer">
            
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