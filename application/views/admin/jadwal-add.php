<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Jadwal
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <section class="content container-fluid">
    <div class="box">
    <?php echo validation_errors (); ?>
  <form class="form-horizontal" role="form" method="post" action="<?php echo site_url()?>/admin/jadwal/add/">
    <input type="hidden" name="id_jadwal" value="<?php echo @$detail->id_jadwal?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="nomes">Mata Pelajaran :</label>
      <div class="col-sm-10">
        <select class="form-control" name="id_matapelajaran" required>
          <option value="">Pilih Mata Pelajaran</option>
          <?php if (isset($mata_pelajaran)) {
            foreach ($mata_pelajaran as $row) { ?>
            <option value="<?php echo $row->id_matapelajaran ?>"><?php echo $row->nama_matapelajaran ?></option>          
          <?php }
            }
          ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="nomes">Hari :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="hari" value="<?php if (@$detail){ echo @$detail->hari;} else { echo set_value('hari');}?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="namo">Jam:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="jam" value="<?php if (@$detail){ echo @$detail->jam;} else { echo set_value('jam');}?>">
      </div>
    </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="nomes">Kelas :</label>
      <div class="col-sm-10">
        <select class="form-control" name="id_kelas" required>
          <option value="">Pilih Kelas</option>
          <?php if (isset($kelas)) {
            foreach ($kelas as $row) { ?>
            <option value="<?php echo $row->id_kelas ?>"><?php echo $row->nama_kelas ?></option>          
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