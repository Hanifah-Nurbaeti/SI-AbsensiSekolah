<?php $this->load->view('admin/header.php');
$this->load->model('Adminm');
?>
<div class="content-wrapper">
  <div align="center">
    <h3> Tabel Data Laporan </h3>
  </div>
  <?php $pesan=$this->session->flashdata('pesan'); ?>
        <?php if(@$pesan): ?>
          <div>
             <div class="alert alert-primary">
                    SMS Telah dikirim!
                 </div>
          </div>
        <?php endif; ?>
   <section class="content container-fluid">
    <table class="table table-bordered">
    <?php if ($laporan):?>
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama Siswa </th>
          <th>Keterangan</th>
        </tr>
      </thead>
<?php $i=1;
 foreach($laporan->result() as $key) {?>
      <tbody id="tbody">
        <td><?php echo $i++?></td>
        <td><?php echo $this->Msiswa->getNameSiswa($key->id_siswa)?></td>
        <td><?php echo $key->keterangan?></td>
      </tbody>
<?php } ?>
    </table>
    <?php else: ?>
    Tidak ada data
    <?php endif?>
   </section>
   <div style="margin:20px; ">
    <button> <a href="<?php echo site_url()?>/admin/presensi/kirim_sms/<?php echo $key->id_siswa?>"><i class="fa fa-envelope" title="Kirim SMS" id="button" disabled></i> Kirim</a></button>
  </div>
 </div>
<?php $this->load->view('admin/footer.php')?>
