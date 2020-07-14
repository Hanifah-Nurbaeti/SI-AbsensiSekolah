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
        <li>
          <a href="<?php echo site_url()?>admin/siswa/siswa-detail"></a>
      </ul>
  </div>    
</div>
          <div class="panel-body">
            <table cellpadding="8">
              <tr>
                <td>NISN</td><td>:</td><td><?php echo $siswa->nisn?></td>
              </tr>
              <tr>
                <td>Nama Siswa</td><td>:</td><td><?php echo $siswa->nama_siswa?></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td><td>:</td><td><?php echo $siswa->jenis_kelamin?></td>
              </tr>
              <tr>
                <td>Alamat</td><td>:</td><td><?php echo $siswa->alamat?></td>
              </tr>
                <td>Nama Orangtua/Wali</td><td>:</td><td><?php echo $siswa->nama_ortu_wali?></td>
              </tr>
              <tr>
                <td>No.Hp Orangtua/Wali</td><td>:</td><td><?php echo $siswa->nohp_ortu_wali?></td>
              </tr>
              
              <tr>
                <td></td>
                <td></td>
              </tr>
            </table>
          </div>
      </section>
    </div>
</div>
<?php $this->load->view('admin/footer.php')?>