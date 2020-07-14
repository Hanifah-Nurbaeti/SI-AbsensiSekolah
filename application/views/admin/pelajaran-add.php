<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Mata Pelajaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <section class="content container-fluid">
    <div class="box">
    <?php echo validation_errors (); ?>
  <form class="form-horizontal" role="form" method="post" action="<?php echo site_url()?>/admin/mata_pelajaran/add">
    <input type="hidden" name="id_matapelajaran" value="<?php echo @$detail->id_matapelajaran?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="noken">Kode:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="kode" value="<?php if (@$detail){ echo @$detail->kode;} else { echo set_value('kode');} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nomes">Nama Mata Pelajaran:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_matapelajaran" value="<?php if (@$detail){ echo @$detail->nama_matapelajaran;} else { echo set_value('nama_matapelajaran');}?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nomes">Nama Guru :</label>
      <div class="col-sm-10">
        <select class="form-control" name="id_guru" required>
          <option value="">Pilih Guru</option>
          <?php if (isset($guru)) {
            foreach ($guru as $row) { ?>
            <option value="<?php echo $row->id_guru ?>"><?php echo $row->nama_guru ?></option>          
          <?php }
            }
          ?>
        </select>
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