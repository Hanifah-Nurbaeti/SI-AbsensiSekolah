<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Kelas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <section class="content container-fluid">
    <div class="box">
    <?php echo validation_errors (); ?>
  <form class="form-horizontal" role="form" method="post" action="<?php echo site_url()?>/admin/kelas/add">
    <input type="hidden" name="id_kelas" value="<?php echo @$detail->id_kelas?>">
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="nomes">Nama Kelas:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_kelas" value="<?php if (@$detail){ echo @$detail->nama_kelas;} else { echo set_value('nama_kelas');}?>">
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