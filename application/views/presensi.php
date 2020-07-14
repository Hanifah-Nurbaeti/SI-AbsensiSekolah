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
    <form action="<?php echo site_url()?>/welcome/add" method="post">
    <table>
                     <tr>
                      <td><label>Kelas</label></td>
                      <td></td>
                      <td>  <select id="select2" class="kelas" name="id_kelas" class="form-control" style="width:200px;margin:10px;" required>
        <option value="">--Pilih Kelas--</option>

        <?php foreach ($kelas as $row):?>
          <option value="<?php echo $row->id_kelas?>"><?php echo $row->nama_kelas?></option>
        <?php endforeach?>
         </select></td>
                    </tr>
                        <tr>
                      <td><label>Hari</label></td>
                      <td></td>
                      <td>
                          <select id="select3" class="hari" name="id_jadwal" class="form-control" style="width:200px;margin:10px;" required>

        <option value="">--Pilih hari--</option>
         </select>
         </td>
         </tr>
          <tr>
                      <td><label>Mata Pelajaran</label></td>
                      <td></td>
                      <td>
                          <select id="select4" class="matpel" name="id_matapelajaran" class="form-control" style="width:200px;margin:10px;" required>

        <option value="">--Pilih Mata Pelajaran--</option>

         </select>
         </td>
         </tr>
         </tr>
          <tr>
           <td><label>Siswa</label></td>
           <td></td>
           <td>
             <select id="select3" class="siswa" name="nisn" class="form-control" style="width:200px;margin:10px;" required>
               <option value="">--Pilih Siswa--</option>
             </select>
          </td>
        </tr>
    <tr>
         <td> <label class="control-label " for="namo">Keterangan:</label></td>
         <td></td>
         <td>
         <input type="radio" name="keterangan" value="s" checked="checked" required> Sakit </input>
        <input type="radio" name="keterangan" value="i" checked="checked" required> Izin </input>
        <input type="radio" name="keterangan" value="a" checked="checked" required> Alfa </input>
        <input type="radio" name="keterangan" value="h" checked="checked" required> Hadir </input>
        </td>
        </tr>
    <tr>
    <td>
        <!-- /.col -->
        <div class="">
          <button href ="<?php echo site_url()?>/admin/presensi/add" type="submit" class="btn btn-primary btn-block btn-flat" value = "simpan" >Absen </a>
        </div>
        </button>
        </div>
        </td>
        </tr>
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

  $(document).ready(function() {
    // var kota = $(this).val();

    $('.hari').on('change', function() {
      // jika hari dirubah
      $.ajax({
        type: "POST",
        data: { id_jadwal: $('.hari').val() },
        url: '<?php echo base_url()."index.php/welcome/ambilMatpel" ?>',
        dataType: 'text',
        success: function(resp) {
          var json = JSON.parse(resp.replace(',.', ''))
          var $el = $(".matpel");
          $el.empty(); // remove old options
          $el.append($("<option></option>")
          .attr("value", '').text('-- Pilih Matpel --'));
          $.each(json, function(key, value) {
            $el.append($("<option></option>")
            .attr("value", value.id_matapelajaran).text(value.nama_matapelajaran));
          });
        },
        error: function (jqXHR, exception) {
          console.log(jqXHR, exception)
        }
      });
    });

    $('.kelas').on('change', function() {

      // jika kelas dirubah
      $.ajax({
        type: "POST",
        data: { id_kelas: $('.kelas').val() },
        url: '<?php echo base_url()."index.php/welcome/ambilHari" ?>',
        dataType: 'text',
        success: function(resp) {
          var json = JSON.parse(resp.replace(',.', ''))
          var $el = $(".hari");
          $el.empty(); // remove old options
          $el.append($("<option></option>")
          .attr("value", '').text('-- Pilih Hari --'));
          $.each(json, function(key, value) {
            $el.append($("<option></option>")
            .attr("value", value.id_jadwal).text(value.hari));
          });
        },
        error: function (jqXHR, exception) {
          console.log(jqXHR, exception)
        }
      });

      // jika kelas dirubah
      $.ajax({
        type: "POST",
        data: { id_kelas: $('.kelas').val() },
        url: '<?php echo base_url()."index.php/welcome/ambilSiswa" ?>',
        dataType: 'text',
        success: function(resp) {
          var json = JSON.parse(resp.replace(',.', ''))
          var $el = $(".siswa");
          $el.empty(); // remove old options
          $el.append($("<option></option>")
          .attr("value", '').text('-- Pilih Siswa --'));
          $.each(json, function(key, value) {
            $el.append($("<option></option>")
            .attr("value", value.id_siswa).text(value.nama_siswa));
          });
        },
        error: function (jqXHR, exception) {
          console.log(jqXHR, exception)
        }
      });


    })
  })
</script>
</body>
</html>
