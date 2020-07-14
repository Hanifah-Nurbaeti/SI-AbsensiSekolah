<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Presensi | SMS Gateway </title>
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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Presensi
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <section class="content container-fluid">
    <div class="box">
    <?php echo validation_errors (); ?>
  <form class="form-horizontal" role="form" method="post" action="<?php echo site_url()?>/absen/presensi2/add">
    <input type="hidden" name="id_presensi" value="<?php echo @$detail->id_presensi?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="noken">Tanggal:</label>
      <div class="col-sm-10">
        <input type="Y:M:D" class="form-control" name="tanggal" value="<?php if (@$detail){ echo @$detail->tanggal;} else { echo set_value('tanggal');} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nomes">nisn:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nisn" value="<?php if (@$detail){ echo @$detail->nisn;} else { echo set_value('nisn');}?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="namo">nama_siswa:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_siswa" value="<?php if (@$detail){ echo @$detail->nama_siswa;} else { echo set_value('nama_siswa');}?>">
      </div>
    </div>
     <div class="form-group row">
      <label class="control-label col-sm-2" for="namo">Keterangan:</label>
      <div class="col-sm-10">
        <input type="radio" name="keterangan" value="s" > Sakit </input>
        <input type="radio" name="keterangan" value="i" > Izin </input>
        <input type="radio" name="keterangan" value="a" > Alfa </input>
        <input type="radio" name="keterangan" value="h" > Hadir </input>
        </div>
        </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="nomes">nisn:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nisn" value="<?php if (@$detail){ echo @$detail->nisn;} else { echo set_value('nisn');}?>">
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="nomes"></label>
      <div class="col-sm-2">
        <input type="submit" class="form-control" name="submit" value="Simpan">
      </div>
    </div>
  </form>
  </div>
  </section>
</div>
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