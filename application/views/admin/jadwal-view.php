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
   <?php if ($hasil):?>
    <div class="box">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id.</th>
        <th>Guru</th>
        <th>Mata Pelajaran</th>
        <th>Hari</th>
        <th>Jam</th>
        <th>Kelas</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1;?>
    <?php foreach ($hasil as $row):?>
      <tr>
        <td><?php echo $i?>.</td>
        <td><?php echo $row->nama_guru?></td>
        <td><?php echo $row->nama_matapelajaran?></td>
        <td><?php echo $row->hari?></td>
        <td><?php echo $row->jam?></td>
        <td><?php echo $row->nama_kelas?></td>
        <td>
          <a href="<?php echo site_url()?>/admin/jadwal/add/<?php echo $row->id_jadwal?>">Ubah</a> 
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