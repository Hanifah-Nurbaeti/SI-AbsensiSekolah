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
   <?php if ($hasil):?>
    <div class="box">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama User</th>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1;?>
    <?php foreach ($hasil as $row):?>
      <tr>
        <td><?php echo $i?>.</td>
        <td><?php echo $row->nama_user?></td>
        <td><?php echo $row->username?></td>
        <td><?php echo $row->password?></td>
        <td><?php echo $row->level?></td>
        <td>
          <a href="<?php echo site_url()?>/admin/user/add/<?php echo $row->id_user?>"> Ubah</a> |
          <a href="<?php echo site_url()?>/admin/user/delete/<?php echo $row->id_user?>"> Hapus</a>
        </td>
      </tr>
      <?php $i++?>
    <?php endforeach?>
    </tbody>
  </table>
  <?php else: ?>
  Tidak ada data
  <?php endif?>
  </section>
  </div>
</div>
 <?php $this->load->view('admin/footer.php')?>