  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman kelas</h1>
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
              <form role="form" action="<?= base_url; ?>/kelas/updatekelas" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="kelas_id" value="<?= $data['kelas']['kelas_id']; ?>">
                <div class="card-body">
                <div class="form-group">
                    <label >Nama Kelas</label>
                    <input type="text" class="form-control" placeholder="masukkan nama kelas." name="nama_kelas" value="<?= $data['kelas']['nama_kelas'];?>">
                  </div>
                  <div class="form-group">
                    <label >Prodi</label>
                    <select class="form-control" name="prodi_id">
                        <?php foreach ($data['Prodi'] as $row) :?>
                        <option value="<?= $row['prodi_id']; ?>" <?php if($data['kelas']['prodi_id'] == $row['prodi_id']) { echo "selected"; } ?>><?= $row['nama_prodi']; ?></option>
                      <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label >Semester</label>
                    <select class="form-control" name="semester">
                      <option value="<?= $data['kelas']['semester']; ?>"><?= $data['kelas']['semester']; ?></option>
                      <option value="I">I</option>
                      <option value="II">II</option>
                      <option value="III">III</option>
                      <option value="IV">IV</option>
                      <option value="V">V</option>
                      <option value="VI">VI</option>
                      <option value="VII">VII</option>
                      <option value="VIII">VIII</option>
                      <option value="IX">IX</option>
                      <option value="X">X</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Tahun Akademik</label>
                    <input type="text" class="form-control" placeholder="masukkan tahun akademik." name="Tahun_akademik" value="<?= $data['kelas']['Tahun_akademik'];?>">
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