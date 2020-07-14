<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Guru
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <section class="content container-fluid">
    <div class="box">
    <?php echo validation_errors (); ?>
  <form class="form-horizontal" role="form" method="post" action="<?php echo site_url()?>/admin/guru/add">
    <input type="show" name="id_guru" value="<?php echo @$detail->id_guru?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="noken">NIK:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nik" value="<?php if (@$detail){ echo @$detail->nik;} else { echo set_value('nik');} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nomes">Nama Guru:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_guru" value="<?php if (@$detail){ echo @$detail->nama_guru;} else { echo set_value('nama_guru');}?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-sm-2" for="namo">Status:</label>
      <div class="col-sm-10">
        <input type="radio" name="status" value="pns"> PNS </input>
        <input type="radio" name="status" value="honorer"> honorer </input>
        </div>
        </div>
    <div class="form-group row">
      <label class="control-label col-sm-2" for="namo">Jenis Kelamin:</label>
      <div class="col-sm-10">
        <input type="radio" name="jenis_kelamin" value="P"> Perempuan </input>
        <input type="radio" name="jenis_kelamin" value="L"> Laki-Laki </input>
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