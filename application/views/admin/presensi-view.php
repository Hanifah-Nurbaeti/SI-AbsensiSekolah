<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Presensi
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <section class="content container-fluid">
   <?php if ($hasil):?>
    <div class="box">
        <?php $pesan = $this->session->flashdata('pesan');?>
      <?php if (@$pesan):?>
      <div class="alert alert-primary">
        <strong>SMS Telah Dikirim</strong> 
      </div>
      <?php endif?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal </th>
        <th>Kelas </th>
        <th>NISN</th>
        <th>Nama Siswa</th>
        <th>Pengajar</th>
        <th>Mata Pelajaran</th>
        <th>Jam Mengajar</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1;?>
    <?php foreach ($hasil as $row):?>
      <tr>
        <td><?php echo $i?>.</td>
        <td><?php echo $row->tanggal?></td>
        <td><?php echo $row->nama_kelas?></td>
        <td><?php echo $row->nisn?></td>
        <td><?php echo $row->nama_siswa?></td>
        <td><?php echo $row->nama_guru?></td>
        <td><?php echo $row->nama_matapelajaran?></td>
        <td><?php echo $row->jam?></td>
        <td><?php echo $row->keterangan?></td>
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