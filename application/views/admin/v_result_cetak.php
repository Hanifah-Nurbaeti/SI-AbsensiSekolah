<div style="border-bottom: 1px #999 dashed; margin-bottom: 20px"></div>
    <div class="row-fluid">
      <div id="result"></div>
    </div>
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
   <?php if ($laporan):?>
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
        <th>Nama Siswa </th>
        <th>Sakit</th>
        <th>Izin</th>
        <th>Alfa</th>
        <th>Hadir</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1;?>
    <?php foreach ($laporan as $row):
      $id_siswa = $row['id_siswa'];
      $absen = $this->Adminm->get_laporan($id_siswa);
      // print_r($absen['jml']); die;
      ?>
      <tr>
        <td><?php echo $i?>.</td>
        <td><?php echo $row['nama_siswa']?></td>
        <td><?php if(isset($absen[0])) { echo $absen[0]['jml']; } else { echo '0';} ?></td>
        <td><?php if(isset($absen[1])) { echo $absen[1]['jml']; } else { echo '0';} ?></td>
        <td><?php if(isset($absen[2])) { echo $absen[2]['jml']; } else { echo '0';} ?></td>
        <td><?php if(isset($absen[3])) { echo $absen[3]['jml']; } else { echo '0';} ?></td>
        <td>
          <a href="<?php echo site_url()?>/admin/presensi/kirim_sms/<?php echo $row['id_siswa']?>"><i class="fa fa-envelope" title="Kirim SMS" id="button" disabled></i></a>
        </td>
      </tr>
      <?php $i++?>
    <?php endforeach?>
