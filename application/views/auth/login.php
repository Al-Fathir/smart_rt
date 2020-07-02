<body class="hold-transition login-page" >
<div class="login-box">


  <div class="login-logo">
  
  <a href="<?=base_url('auth'); ?>"><img src= "<?=base_url('assets/dist/img/logo_stikom-1.png'); ?>" width="200px"></a>

  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">

  <?php echo validation_errors(); ?>

    <p class="login-box-msg">Sign in to start your session</p>

   <?php echo form_open('index.php/login/login_rt'); ?>

    <?php $string = 'Do not "hack" web.' ?>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="email RT" name="rt_email" value="<?php $string ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?php echo form_error('rt_email'); ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password RT" name="rt_password" value="<?php $tring ?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo form_error('rt_password'); ?>
      </div>

      <div style="color: red;margin-bottom: 15px;">
    <?php
  
    if($this->session->flashdata('message')){
      echo $this->session->flashdata('message');
    }
    ?>
  </div>

        <!-- /.col -->
        <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
   <?php echo form_close(); ?>