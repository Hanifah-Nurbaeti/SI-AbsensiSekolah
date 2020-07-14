<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Presensi Guru
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <section class="content container-fluid">
    <div class="box">
   <?php echo validation_errors (); ?>
  <form class="form-horizontal" role="form" method="post" action="<?php echo site_url()?>/admin/presensi_guru/add/">
    <input type="hidden" name="idg" value="<?php echo @$detail->idg?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="nomes">nik:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nik" value="<?php if (@$detail){ echo @$detail->nik;} else { echo set_value('nik');}?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="namo">nama_guru:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_guru" value="<?php if (@$detail){ echo @$detail->nama_guru;} else { echo set_value('nama_guru');}?>">
      </div>
    </div>
     <div class="form-group row">
      <label class="control-label col-sm-2" for="namo">Keterangan:</label>
      <div class="col-sm-10">
        <input type="radio" name="keterangan" value="s" checked="checked" required> Sakit </input>
        <input type="radio" name="keterangan" value="i" checked="checked" required> Izin </input>
        <input type="radio" name="keterangan" value="a" checked="checked" required> Alfa </input>
        <input type="radio" name="keterangan" value="h" checked="checked" required> Hadir </input>
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
 <?php $this->load->view('admin/footer.php')?>