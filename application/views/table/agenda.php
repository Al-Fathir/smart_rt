<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Agenda</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
              <div class="table-responsive"> 
              
              <table id="table_agenda" class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Agenda</th>
                    <th>Isi Agenda</th>
                    <th>Waktu Agenda</th>
                    <th>Option</th>
                    <tbody>
                <?php
                $no = 0;
                
                foreach ($agenda as $table_agenda) { $no++; ?>

                    <tr>
                    <td><?php cetak ($no) ?>
                    <td><?php cetak ($table_agenda->nama_agenda) ?></td>
                    <td><?php cetak ($table_agenda->isi_agenda) ?></td>
                    <td><?php cetak ($table_agenda->waktu_agenda) ?></td>
                    <td>
                    <a href = "<?php cetak (site_url('edit-agenda/'.encrypt_url($table_agenda->id_agenda))) ?>" class="btn btn-sm btn-primary" ><span class="glyphicon glyphicon-edit"></span></a>
                    <a onclick="return confirm('Apakah anda ingin menghapusnya ?')" href="<?php cetak (site_url('agenda/delete/'.encrypt_url($table_agenda->id_agenda))); ?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
                </tr>

                <?php } ?>
                    </tr>
                    </tbody>
                </thead>
</table>
</div>
<div class="box-footer">
                <a href="<?php cetak (site_url('input-agenda')); ?>"><button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Tambah</button></a>
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