<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pendidikan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


            
              <div class="box-body">

              <div class="col-md-3">

<div class="form-group">

<select name="pendidikan" class="form-control" id="pendidikan">

<option value="name"> Silahkan Pilih Nama Jenjang</option>
<option value="sd"> Jenjang SD</option>
<option value="smp"> Jenjang SMP</option>
<option value="sma"> Jenjang SMA</option>
<option value="d3"> Jenjang D3</option>
<option value="s1"> Jenjang S1</option>
<option value="s2"> Jenjang S2</option>
<option value="s3"> Jenjang S3</option>

</select>

</div>

</div>

</div>

<div class="box-body">

              <div class="table-responsive"> 
              
              <table id="table_pendidikan" class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th>No KTP</th>
                    <th>Nama Penduduk</th>
                    <th>Nama Sekolah</th>
                    <th>Lokasi Sekolah</th>
                    <th>Tahun Masuk</th>
                    <th>Tahun Lulus</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
</table>
</div>
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

    <script>

$("#pendidikan").change(function(){
  if($("#pendidikan").val()==="sd"){
    table_pendidikan_sd();
  } else if($("#pendidikan").val()==="smp"){
    table_pendidikan_smp();
  } else if($("#pendidikan").val()==="sma"){
    table_pendidikan_sma();
  } else if($("#pendidikan").val()==="d3"){
    table_pendidikan_d3();
  } else if($("#pendidikan").val()==="s1"){
    table_pendidikan_s1();
  } else if($("#pendidikan").val()==="s2"){
    table_pendidikan_s2();
  } else if($("#pendidikan").val()==="s3"){
    table_pendidikan_s3();
  }
});

function table_pendidikan_sd(){
  var pendidikan = $("#pendidikan").val();
  $.ajax({
    url: "<?= base_url('page/load_pendidikan_sd'); ?>",
    data: "pendidikan=" + pendidikan,
    success:function(data){
      //console.log(data)
      $("#table_pendidikan tbody").html(data);
    }
  });
}

function table_pendidikan_smp(){
  var pendidikan = $("#pendidikan").val();
  $.ajax({
    url: "<?= base_url('page/load_pendidikan_smp'); ?>",
    data: "pendidikan=" + pendidikan,
    success:function(data){
      //console.log(data)
      $("#table_pendidikan tbody").html(data);
    }
  });
}

function table_pendidikan_sma(){
  var pendidikan = $("#pendidikan").val();
  $.ajax({
    url: "<?= base_url('page/load_pendidikan_sma'); ?>",
    data: "pendidikan=" + pendidikan,
    success:function(data){
      //console.log(data)
      $("#table_pendidikan tbody").html(data);
    }
  });
}

function table_pendidikan_d3(){
  var pendidikan = $("#pendidikan").val();
  $.ajax({
    url: "<?= base_url('page/load_pendidikan_d3'); ?>",
    data: "pendidikan=" + pendidikan,
    success:function(data){
      //console.log(data)
      $("#table_pendidikan tbody").html(data);
    }
  });
}

function table_pendidikan_s1(){
  var pendidikan = $("#pendidikan").val();
  $.ajax({
    url: "<?= base_url('page/load_pendidikan_s1'); ?>",
    data: "pendidikan=" + pendidikan,
    success:function(data){
      //console.log(data)
      $("#table_pendidikan tbody").html(data);
    }
  });
}

function table_pendidikan_s2(){
  var pendidikan = $("#pendidikan").val();
  $.ajax({
    url: "<?= base_url('page/load_pendidikan_s2'); ?>",
    data: "pendidikan=" + pendidikan,
    success:function(data){
      //console.log(data)
      $("#table_pendidikan tbody").html(data);
    }
  });
}

function table_pendidikan_s3(){
  var pendidikan = $("#pendidikan").val();
  $.ajax({
    url: "<?= base_url('page/load_pendidikan_s3'); ?>",
    data: "pendidikan=" + pendidikan,
    success:function(data){
      //console.log(data)
      $("#table_pendidikan tbody").html(data);
    }
  });
}

</script>

  
    <!-- /.content -->