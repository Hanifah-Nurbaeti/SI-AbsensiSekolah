<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <section class="content container-fluid">
    <div class="box">
    <?php echo validation_errors (); ?>
  <form class="form-horizontal" role="form" method="post" action="<?php echo site_url()?>/admin/siswa/add/">
    <input type="show" name="id_siswa" value="<?php echo @$detail->id_siswa?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="noken">NISN:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nisn" value="<?php if (@$detail){ echo @$detail->nisn;} else { echo set_value('nisn');} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nomes">Nama Siswa:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_siswa" value="<?php if (@$detail){ echo @$detail->nama_siswa;} else { echo set_value('nama_siswa');}?>">
      </div>
    </div>
    
    <div class="form-group row">
      <label class="control-label col-sm-2" for="namo">Jenis Kelamin:</label>
      <div class="col-sm-10">
      <input type="radio" name="jenis_kelamin" value="L" > Laki-Laki </input>
        <input type="radio" name="jenis_kelamin" value="P" > Perempuan </input>
        
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="thn">Kelas:</label>
      <div class="col-sm-10">
        <select class="form-control" name="id_kelas" required>
          <option value="">Pilih Kelas</option>
          <?php if (isset($kelas)) {
            foreach ($kelas as $row) { ?>
          <option value="<?php echo $row->id_kelas ?>"><?php echo $row->nama_kelas ?></option>
          <?php }
          } ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="thn">Alamat:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="alamat" value="<?php if (@$detail){ echo @$detail->alamat;} else { echo set_value('alamat');}?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="namo">Nama Orangtua/Wali:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_ortu_wali" value="<?php if (@$detail){ echo @$detail->nama_ortu_wali;} else { echo set_value('nama_ortu_wali');}?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="namo">No.Hp Orangtua/Wali:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nohp_ortu_wali" value="<?php if (@$detail){ echo @$detail->nohp_ortu_wali;} else { echo set_value('nohp_ortu_wali');}?>">
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