<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active">Dashboard
        <a href="#">
          <i class="fa fa-dashboard"></i><span>Home</span>
          </a>
        </li>
      </ol>
    </section>

 <section class="content">
      <!-- Small boxes (Stat box) -->
        <!-- ./col -->
              <!-- /.row -->
              
      <!-- Main row -->
      <div class="row">

      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php cetak($penduduk_by_rt->total); ?></h3>

              <p>Total Penduduk</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-document"></i>
            </div>
            <a href="<?= cetak(base_url('total-penduduk')) ?>" class="small-box-footer">Lihat lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
          </div>
</div>

<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php cetak($penduduk_approved_by_rt->total); ?></h3>

              <p>Penduduk Disetujui</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-done-all"></i>
            </div>
            <a href="<?= cetak(base_url('total-penduduk-approved')) ?>" class="small-box-footer">Lihat lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
          </div>
</div>

<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php cetak($penduduk_not_approved_by_rt->total); ?></h3>

              <p>Penduduk Belum Disetujui</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert"></i>
            </div>
            <a href="<?= cetak(base_url('assets-rusak')) ?>" class="small-box-footer">Lihat lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
          </div>
</div>

<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Segera</h3>

              <p>Pengadaan</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-apps"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
</div>

        <!-- Left col -->
        <section class="col-md-12">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
            
              <li class="pull-left header"><i class="fa fa-inbox"></i> Chart Asset</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="tab-pane active"><canvas id="myChart" width="100%" height="30%"></canvas></div>
             
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

          <!-- Chat box -->
             <!-- /.box (chat box) -->


          <!-- quick email widget -->
          
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
 
      <!-- /.row (main row) -->

    </section>

    <script type="text/javascript">
   

</script>