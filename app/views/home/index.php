 

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $data['title'] ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

              <!-- Small boxes (Stat box) -->
              <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php foreach ($data['jmlmatkul'] as $row) :?>
                <h3><?= $row['jmlmatkul'] ?></h3>
                <?php endforeach; ?>
                <p>User</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/uts/public/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php foreach ($data['jmlruangan'] as $row) :?>
                <h3><?= $row['jmlruangan'] ?></h3>
                <?php endforeach; ?>

                <p>Jadwal</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/uts/public/jadwal" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php foreach ($data['jmldosen'] as $row) :?>
                <h3><?= $row['jmldosen'] ?></h3>
                <?php endforeach; ?>

                <p>Dosen</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/uts/public/dosen" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php foreach ($data['jmlkelas'] as $row) :?>
                <h3><?= $row['jmlkelas'] ?></h3>
                <?php endforeach; ?>

                <p>Kelas</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/uts/public/kelas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Chart Dosen</h3>
        </div>
        <!DOCTYPE html>
        <html>
        <style>
        canvas {text-align: center; 
        margin-left: auto;
        margin-right: auto;}

        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

        <body>
          <?php $noX = 1; ?>
          <?php foreach ($data['SSatu'] as $rowX) : ?>
          <?php $noX++;
          endforeach; ?>

          <?php $noY = 1; ?>
          <?php foreach ($data['SDua'] as $rowY) : ?>
          <?php $noY++;
          endforeach; ?>

          <?php $noZ = 1; ?>
          <?php foreach ($data['STiga'] as $rowZ) : ?>
          <?php $noZ++;
          endforeach; ?>

          <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

          <script>
            var xValues = ["S1", "S2", "S3"];
            var yValues = [<?= $rowX['jml_S1']; ?>, <?= $rowY['jml_S2']; ?>, <?= $rowZ['jml_S3']; ?>];
            var barColors = ["red", "green", "blue"];

            new Chart("myChart", {
              type: "bar",
              data: {
                labels: xValues,
                datasets: [{
                  backgroundColor: barColors,
                  data: yValues
                }]
              },
              options: {
                legend: {
                  display: false
                },
                title: {
                  display: true,
                  text: "Jenjang Pendidikan Terakhir Dosen"
                }
              }
            });
          </script>

        </body>

        </html>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
  </div>
  <!-- /.content-wrapper -->

  


