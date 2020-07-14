<?php $id_kelas = $_POST['id_kelas'];
$this->load->model('Adminm'); ?>
?>
<?php print_r('tes'); die;?>
<select id="hari" name="id_jadwal" class="form-control" style="width:200px;margin:10px;" required>
<!-- <?php if (@$detail){  echo'<option value='?><?php echo $detail->id_jadwal?>"><?php echo $detail->id_jadwal?><?php echo '</option>'?><?php }?> -->
<?php $jadwal = $this->Adminm->get_jadwal($id_kelas); ?>
<option value="">--Pilih hari--</option>

<?php foreach ($jadwal as $row):?>
<option value="<?php echo $row['id_jadwal']?>"><?php echo $row['hari']?></option>
<?php endforeach?>
</select>
