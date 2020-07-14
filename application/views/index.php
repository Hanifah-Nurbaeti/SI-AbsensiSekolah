<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Presensi | SMS Gateway</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url ()?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url ()?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url ()?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url ()?>/assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url ()?>/assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <h1><center><b>WELCOME TO OUR SCHOOL</b></center></h1>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    
    <a href="<?php echo site_url()?>/errors/welcome_message"><b>Sistem Presensi</b></a>
  </div> 
     
  <!-- /.login-logo -->
  <div class="login-box-body">
   <?php
    $notif = $this->session->flashdata('notif');
    if($notif){
    echo '<p class="alert alert-danger text-center">'.$notif .'</p>';
     }?>
    <form action="<?php echo site_url()?>/absen/presensi2/add" method="post">
      <div class="form-group has-feedback">
        <label for="username">NIK</label>
        <input type="nik" class="form-control" placeholder="nik" name='nik'>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
       <div class="form-group">
      <label class="control-label" for="nomes">Mata Pelajaran :</label>
        <select class="form-control" name="id_jadwal" required>
          <option value="">Pilih Mata Pelajaran</option>
          <?php if (isset($jadwal)) {
            foreach ($jadwal as $row) { ?>
            <option value="<?php echo $row->id_jadwal ?>"><?php echo $row->nama_matapelajaran ?></option>          
          <?php }
            }
          ?>
        </select>
      </div>
    <div class="form-group has-feedback">
        <label for="username">NISN</label>
        <input type="nisn" class="form-control" placeholder="nisn" name='nisn'>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group row">
      <label class="control-label " for="namo">Kehadiran:</label>
        <input type="radio" name="keterangan" value="h" checked="checked" required> Hadir </input>
        </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button href ="<?php echo site_url()?>/absen/guru_presensi/add" type="submit" class="btn btn-primary btn-block btn-flat" value = "simpan" >Absen </a>
        </div>
        <!-- /.col -->
      </div>
      
    </form> 
     
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url ()?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url ()?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url ()?>/assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
