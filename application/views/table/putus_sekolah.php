<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Putus Sekolah</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
              <div class="table-responsive"> 
              
              <table id="table_putus_sekolah" class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Penduduk</th>
                    <th>Jenjang Terakhir</th>
                    <th>Usia</th>
                    <tbody>
                <?php
                $no = 0;
                
                foreach ($putus_sekolah as $table_putus_sekolah) { $no++; ?>

                  <?php if ($table_putus_sekolah->nama_sma == null) { ?>

                <?php $born_putus_sekolah = new DateTime ($table_putus_sekolah->tgl_lahir_penduduk);
                $today_putus_sekolah = new DateTime();
                $age_putus_sekolah = $today_putus_sekolah->diff($born_putus_sekolah); 
                
                if($age_putus_sekolah->y < 30) { ?> 

                    <tr>
                    <td><?php cetak ($no) ?>
                    <td><?php cetak ($table_putus_sekolah->nama_penduduk) ?></td>
                    <?php if ($table_putus_sekolah->nama_sd == null) { ?>
                    <td><?php cetak ("Tidak Sekolah Dasar") ?></td>
                    <?php } elseif ($table_putus_sekolah->nama_smp == null) { ?>
                     <td><?php cetak ("Sekolah Dasar") ?></td>
                    <?php } elseif ($table_putus_sekolah->nama_sma == null) { ?>
                     <td><?php cetak ("Sekolah Menengah Pertama") ?></td>
                    <?php } ?>
                    <td><?php $born = new DateTime ($table_putus_sekolah->tgl_lahir_penduduk); 
                    $today = new DateTime();
                    $age = $today->diff($born);
                    cetak ($age->y);
                    ?> Tahun</td>
                </tr>

                <?php } else {
                  echo ''; ?>
                <?php } ?>
                <?php } else {
                  echo ''; ?>
                <?php } ?>
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