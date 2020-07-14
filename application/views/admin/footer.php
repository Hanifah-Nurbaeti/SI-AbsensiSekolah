 <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">Hanifah Nurbaeti-2163009</a>.</strong> All rights
    reserved.
  </footer>

 
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- FastClick -->
<script src="<?php echo base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<!-- <script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
<!-- <script src="<?php echo base_url()?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- SlimScroll -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url()?>assets/bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url()?>assets/dist/js/pages/dashboard2.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>


  <script src="<?php echo base_url('assets/admin/chart/dist/Chart.bundle.js')?>"></script>
  <script src="<?php echo base_url('assets/admin/chart/utils.js')?>"></script>
  <style>
  canvas {
      -moz-user-select: none;
      -webkit-user-select: none;
      -ms-user-select: none;
  }
  </style>
<!-- 
  <script>
    var color = Chart.helpers.color;
    var barChartData = {
      labels: [
      <?php
      $no=1;
      if(is_array($hasil)){
        foreach($hasil as $row){ 
        ?>
      '<?php echo convert_month($row->bulan) ?> - <?php $row->tahun?>', 
      <?php 
          }
        }
      ?>
      ],
      datasets: [{
        label: 'Grafik',
        backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
        borderColor: window.chartColors.blue,
        borderWidth: 1,
        data: [
          <?php
          $no=1;
          if(is_array($hasil)){
            foreach($hasil as $row){ ?>
          <?php echo $row->jumlah ?>,
          <?php 
            }
          }
          ?>
        ]
      }]

    };

    window.onload = function() {
      var ctx = document.getElementById('canvas').getContext('2d');
      window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
          responsive: true,
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Grafik '
          }
        }
      });

    };
</script> -->

</body>
</html>