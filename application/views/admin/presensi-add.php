<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Mata Pelajaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <section class="content container-fluid">
    <div class="box">
    <?php echo validation_errors (); ?>
    <form action="<?php echo site_url()?>/welcome/add" method="post">
    <table>
                     <tr>
                      <td><label>Kelas</label></td>
                      <td></td>
                      <td>  <select id="select2"name="id_kelas" class="form-control" style="width:200px;margin:10px;" required>
        <option value="">--Pilih Kelas--</option>
        
        <?php foreach ($kelas as $row):?>
          <option value="<?php echo $row->id_kelas?>"><?php echo $row->nama_kelas?></option>
        <?php endforeach?>
         </select></td>
                    </tr>
                        <tr>
                      <td><label>Hari</label></td>
                      <td></td>
                      <td> 
                          <select id="select3"name="id_jadwal" class="form-control" style="width:200px;margin:10px;" required>
      <?php if (@$detail){  echo'<option value='?><?php echo $detail->id_jadwal?>"><?php echo $detail->id_jadwal?><?php echo '</option>'?><?php }?>
      
        <option value="">--Pilih hari--</option>
        
        <?php foreach ($jadwal as $row):?>
          <option value="<?php echo $row->id_jadwal?>"><?php echo $row->hari?></option>
        <?php endforeach?>
         </select>
         </td>
         </tr>
          <tr>
                      <td><label>Mata Pelajaran</label></td>
                      <td></td>
                      <td> 
                          <select id="select4"name="id_matapelajaran" class="form-control" style="width:200px;margin:10px;" required>
      <?php if (@$detail){  echo'<option value='?><?php echo $detail->id_matapelajaran?>"><?php echo $detail->id_matapelajaran?><?php echo '</option>'?><?php }?>
      
        <option value="">--Pilih Mata Pelajaran--</option>
        
        <?php foreach ($mata_pelajaran as $row):?>
          <option value="<?php echo $row->id_matapelajaran?>"><?php echo $row->nama_matapelajaran?></option>
        <?php endforeach?>
         </select>
         </td>
         </tr>
         <tr>
         <td><label class="control-label " for="namo">NISN:</label></td>
         <td></td>
         <td>
         <input type="text" name="nisn"class="form-control" style="width:200px;margin:10px;" required>
      <?php if (@$detail){  echo'<option value='?><?php echo $detail->nisn?>"><?php echo $detail->nisn?><?php echo '</option>'?><?php }?>
      
    </td>
    </tr>
    <tr>
         <td> <label class="control-label " for="namo">Keterangan:</label></td>
         <td></td>
         <td>
         <input type="radio" name="keterangan" value="s" checked="checked" required> Sakit </input>
        <input type="radio" name="keterangan" value="i" checked="checked" required> Izin </input>
        <input type="radio" name="keterangan" value="a" checked="checked" required> Alfa </input>
        <input type="radio" name="keterangan" value="h" checked="checked" required> Hadir </input>
        </td>
        </tr>
    <tr>
    <td>
        <!-- /.col -->
        <div class="">
          <button href ="<?php echo site_url()?>/admin/presensi/add" type="submit" class="btn btn-primary btn-block btn-flat" value = "simpan" >Absen </a>
        </div>
        </button>
        </div>
        </td>
        </tr>
        <!-- /.col -->
      </div>
      
    </form> 
     
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
  </div>
  </section>
</div>
 <?php $this->load->view('admin/footer.php')?>
<script>
  $('#select2').change(function(){
 $('#select3').empty();
      
  <?php foreach ($kelas as $rowx ): ?>
    if($(this).val() == <?php echo $rowx->id_kelas?> ){
  
  <?php foreach ($hari as $row ): ?>

    <?php if( $rowx->id_kelas == $row->id_kelas){ ?>
$('#select3').append('<option value="<?php echo $row->id_jadwal?>"><?php echo $row->hari?>                   </option>');
<?php } ?>
   <?php endforeach ?> 
    }
     
   <?php endforeach ?> 

});
</script>

  <script>
  $('#select3').change(function(){
  $('#select4').empty();
      
  <?php foreach ($hari as $rowx ): ?>
    if($(this).val() == <?php echo $rowx->id_jadwal?> ){
  
  <?php foreach ($mata_pelajaran as $row ): ?>

    <?php if( $rowx->id_jadwal == $row->id_jadwal){ ?>
$('#select4').append('<option value="<?php echo $row->id_matapelajaran?>"><?php echo $row->nama_matapelajaran?>                   </option>');
<?php } ?>
   <?php endforeach ?> 
    }
     
   <?php endforeach ?> 

});
</script>

 