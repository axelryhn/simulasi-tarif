<!DOCTYPE html>
<html lang="id">


<?= $header; ?>

<body>
  <div class="container-scroller">

    <?= $navbar; ?>

    <div class="container-fluid page-body-wrapper">

      <?= $menu; ?>

      <!-- page content start -->

      <?= $content; ?>

      <!-- page content end -->

      <?= $footer; ?>

    </div>
  </div>

  <?= $javascript; ?>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>
    var ctx = document.getElementById('myChartCabang').getContext('2d');
    const config1 = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [
          <?php
          if (count($graph) > 0) {
            foreach ($graph as $data) {
              echo "'" . $data->cabang . "',";
            }
          }
          ?>
        ],
        datasets: [{
          label: 'Total Pegawai',
          backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],

          borderColor: '#c71a59',
          data: [
            <?php
            if (count($graph) > 0) {
              foreach ($graph as $data) {
                echo $data->jumlah . ", ";
              }
            }
            ?>
          ]
        }]
      },

      options: {
        animations: {
          tension: {
            duration: 1000,
            easing: 'linear',
            from: 1,
            to: 0,
            loop: true
          }
        },
        plugins: {
          title: {
            display: true,
          }
        },
        scales: {
          y: {
            stacked: true
          }
        }
      },
    });
  </script>

 
  <script>
    var prd = document.getElementById('myChartProduktivitas').getContext('2d');
    const config = new Chart(prd, {
      type: 'bar',
      data: {
        labels: [
          <?php
          if (count($graph_produktivitas) > 0) {
            foreach ($graph_produktivitas as $data) {
              echo "'" . $data->bulan . "',";
            }
          }
          ?>
        ],
        datasets: [{
          label: 'Total',
          backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
          data: [
            <?php
            if (count($graph_produktivitas) > 0) {
              foreach ($graph_produktivitas as $data) {
                echo $data->total . ", ";
              }
            }
            ?>
          ]
        }]
      },

      options: {
        animations: {
          tension: {
            duration: 1000,
            easing: 'linear',
            from: 1,
            to: 0,
            loop: true
          }
        },
        plugins: {
          title: {
            display: true,
          }
        },
        scales: {
          y: {
            stacked: true
          }
        }
      },
    });
  </script>

 
  <script>
    var sts = document.getElementById('myChartStatus').getContext('2d');
    const config2 = new Chart(sts, {
      type: 'doughnut',
      data: {
        labels: [
          <?php
          if (count($graph_status) > 0) {
            foreach ($graph_status as $data) {
              echo "'" . $data->status . "',";
            }
          }
          ?>
        ],
        datasets: [{
          label: 'Total',
          backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
          data: [
            <?php
            if (count($graph_status) > 0) {
              foreach ($graph_status as $data) {
                echo $data->total . ", ";
              }
            }
            ?>
          ]
        }]
      },

      options: {
        animations: {
          tension: {
            duration: 1000,
            easing: 'linear',
            from: 1,
            to: 0,
            loop: true
          }
        },
        plugins: {
          title: {
            display: true,
          }
        },
        scales: {
          y: {
            stacked: true
          }
        }
      },
    });
  </script>
</body>

</html>