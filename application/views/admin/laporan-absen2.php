<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<div id="text"> Default List Name</div>
<button id ="button1">Button1</button>
   <button id ="button2">Button2</button>
  <table id= "mytable1" border="1">
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

    </tbody>
  </table>

