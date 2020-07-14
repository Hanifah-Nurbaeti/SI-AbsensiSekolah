<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <section class="content container-fluid">
    <div class="box">
    <?php echo validation_errors (); ?>
  <form class="form-horizontal" role="form" method="post" action="<?php echo site_url()?>/admin/user/add">
    <input type="show" name="id_user" value="<?php echo @$detail->id_user?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="noken">Nama User:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_user" value="<?php if (@$detail){ echo @$detail->nama_user;} else { echo set_value('nama_user');} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nomes">Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="username" value="<?php if (@$detail){ echo @$detail->username;} else { echo set_value('username');}?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="namo">Password:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="password" value="<?php if (@$detail){ echo @$detail->password;} else { echo set_value('password');}?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="namo">Level:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="level" value="<?php if (@$detail){ echo @$detail->level;} else { echo set_value('level');}?>">
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