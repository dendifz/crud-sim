  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Pegawai</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url; ?>/pegawai/simpanpegawai" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nip</label>
                    <input type="text" class="form-control" placeholder="masukkan Nip..." name="nip">
                  </div>
                  <div class="form-group">
                    <label >Nama Pegawai</label>
                    <input type="text" class="form-control" placeholder="masukkan Nama..." name="nama">
                  </div>
                  <div class="form-group">
                    <label >Alamat Pegawai</label>
                    <input type="text" class="form-control" placeholder="masukkan Nip..." name="alamat">
                  </div>
                  <div class="form-group">
                    <label >Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir">
                  </div>
                  <div class="form-group">
                    <label >No Telepon</label>
                    <input type="number" class="form-control" name="no_telepon">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->