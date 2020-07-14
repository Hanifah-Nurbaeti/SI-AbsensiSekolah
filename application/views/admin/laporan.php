<?php $this->load->view('backend/header')?>
<div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <label>Detail Data Mahasiswa</label>
                    </header>
        <li>
          <a href="<?php echo site_url()?>admin/datmas/v_detail_mhs"></a>
      </ul>
  </div>    
</div>
          <div class="panel-body">
            <table cellpadding="8">
              <tr>
                <td>Prodi</td><td>:</td><td><?php echo $mahasiswa->nama_prodi?></td>
              </tr>
              <tr>
                <td>NPM</td><td>:</td><td><?php echo $mahasiswa->npm?></td>
              </tr>
              <tr>
                <td>Nama Mahasiswa</td><td>:</td><td><?php echo $mahasiswa->nama_mhs?></td>
              </tr>
              <tr>
                <td>Tempat Lahir</td><td>:</td><td><?php echo $mahasiswa->tempat?></td>
              </tr>
                <td nowrap="nowrap">Tanggal</td><td>:</td><td><?php echo $mahasiswa->tgl_lahir?></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td><td>:</td><td><?php echo $mahasiswa->jenis_kelamin?></td>
              </tr>
              <tr>
                <td>Golongan Darah</td><td>:</td><td><?php echo $mahasiswa->gol_darah?></td>
              </tr>
              <tr>
                <td>Agama</td><td>:</td><td><?php echo $mahasiswa->agama?></td>
              </tr>
              <tr>
                <td>Status </td><td>:</td><td><?php echo $mahasiswa->status?></td>
              </tr>
              <tr>
                <td>Nama Ayah </td><td>:</td><td><?php echo $mahasiswa->nama_ayah?></td>
              </tr>
              <tr>
                <td>Nama Ibu </td><td>:</td><td><?php echo $mahasiswa->nama_ibu?></td>
              </tr>
              <tr>
                <td>Pekerjaan Ayah</td><td>:</td><td><?php echo $mahasiswa->pekerjaan?></td>
              </tr>
              <tr>
                <td>Alamat Asal</td><td>:</td><td><?php echo $mahasiswa->alamat_asal?></td>
              </tr>
              <tr>
                <td>Provinsi</td><td>:</td><td><?php echo $mahasiswa->nama_prov?></td>
              </tr>
               <tr>
                <td>Kota/Kabupaten</td><td>:</td><td><?php echo $mahasiswa->nama_kobab?> </td>
              </tr>
               <tr>
                <td>Kecamatan</td><td>:</td><td><?php echo $mahasiswa->nama_kec?></td>
              </tr>
               <tr>
                <td>Kelurahan/Desa</td><td>:</td><td><?php echo $mahasiswa->nama_keldes?></td>
              </tr>
              <tr>
                <td>Telepon Asal </td><td>:</td><td><?php echo $mahasiswa->telepon_asal?></td>
              </tr>
              <tr>
                <td>Sekolah Asal </td><td>:</td><td><?php echo $mahasiswa->sekolah_asal?></td>
              </tr>
              <tr>
                <td>Alamat Tinggal </td><td>:</td><td><?php echo $mahasiswa->alamat_tinggal?></td>
              </tr>
              <tr>
                <td>Telepon Tinggal </td><td>:</td><td><?php echo $mahasiswa->telepon_tinggal?></td>
              </tr>
              </tr>
                <td nowrap="nowrap">Tanggal</td><td>:</td><td><?php echo $mahasiswa->tahun_masuk?></td>
              </tr>
              <tr>
                <td>Email </td><td>:</td><td><?php echo $mahasiswa->email?></td>
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
<?php $this->load->view('backend/footer')?>