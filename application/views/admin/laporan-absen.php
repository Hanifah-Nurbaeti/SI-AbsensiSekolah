<?php $this->load->view('admin/header.php');
$this->load->model('Adminm');
?>

    <script type="text/javascript">
        // $(function(){
        //     $('.chzn-select').chosen();
        //     $('.chzn-select-deselect').chosen({allow_single_deselect:true});
        // });
    </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div align="center">
  <h3> Laporan Data Presensi </h3>
  <div class ="container-fluid">
    <div class="span4">&nbsp;</div>
    <div class="span4 loader" style="text-align: center">
      <div class="progress progress-striped active" style="display: none">
          <div class="bar" style"width: 100%;"></div>
      </div>
    </div>
    <div class="span4">&nbsp;</div>
  </div>

  <div class="row-fluid">
      <div id="laporanPage">
        <div class="form-horizontal">
        <form method="post" action="<?php echo site_url('admin/presensi/caridata')?>">
          <strong>Dari :</strong><input type="date" id="tgl_awal" name="tgl_awal"> <strong>Sampai:</strong><input type="date" id="tgl_akhir" name="tgl_akhir">

          <button id="cari" class="button"><i class="icon icon-white icon-search"></i> Search...</button>
        </form>
        </div>
      </div>
    </div>
  </div>
    <script type="text/javascript" scr="<?php echo base_url('assets/jquery-3.3.1.min.js')?>"></script>
    <script type="text/javascript" scr="<?php echo base_url('assets/js/jquery.printPage.js')?>"></script>
  </div>
</div>
<?php $this->load->view('admin/footer.php')?>