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
<table>
                     
                </table>
  <section class="content container-fluid">
   <?php if ($hasil):?>
    <div class="box">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>NISN</th>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Nama Orangtua/Wali</th>
        <th>No.Hp Orangtua/Wali</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1;?>
    <?php foreach ($hasil as $row):?>
      <tr>
        <td><?php echo $i?>.</td>
        <td><?php echo $row->nisn?></td>
        <td><?php echo $row->nama_siswa?></td>
        <td><?php echo $row->nama_kelas?></td>
        <td><?php echo $row->jenis_kelamin?></td>
        <td><?php echo $row->alamat?></td>
        <td><?php echo $row->nama_ortu_wali?></td>
        <td><?php echo $row->nohp_ortu_wali?></td>
        <td>
          <a href="<?php echo site_url()?>/admin/siswa/add/<?php echo $row->id_siswa?>">Ubah</a> 
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