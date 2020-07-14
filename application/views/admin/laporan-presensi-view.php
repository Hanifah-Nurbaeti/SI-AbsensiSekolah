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
    <div class="box">
      <div id="container" style="width: 100%;">
        <canvas id="canvas"></canvas>
      </div>
    </div>

   <?php if ($hasil):?>
    <div class="box">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1;?>
    <?php foreach ($hasil as $row):?>
      <tr>
        <td><?php echo $i?>.</td>
        <td><?php echo convert_month($row->bulan)?> <?php echo $row->tahun?></td>
        <td>
          <a href="<?php echo site_url()?>/admin/laporan/detail/<?php echo $row->bulan?>/<?php echo $row->tahun?>">Lihat</a> 
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