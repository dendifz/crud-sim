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
              <form role="form" action="<?= base_url; ?>/jadwal/updatejadwal" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="jadwal_id" value="<?= $data['jadwal']['jadwal_id']; ?>">
                <div class="card-body">
                <div class="form-group">
                    <label >Hari</label>
                    <select class="form-control" name="hari">
                      <option value="<?= $data['jadwal']['hari'];?>"> <?= $data['jadwal']['hari'];?></option>
                      <option value="Senin">Senin</option>
                      <option value="Selasa">Selasa</option>
                      <option value="Rabu">Rabu</option>
                      <option value="Kamis">Kamis</option>
                      <option value="Jumat">Jumat</option>
                      <option value="Sabtu">Sabtu</option>
                      <option value="Minggu">Minggu</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Jam Kuliah</label>
                    <select class="form-control" name="jam_id">
                         <?php foreach ($data['Jamkuliah'] as $row) :?>
                          <option value="<?= $row['jam_id']; ?>" <?php if($data['jadwal']['jam_id'] == $row['jam_id']) { echo "selected"; } ?>><?= $row['jamkuliah']; ?></option>
                      <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label>Kelas ( Semester )</label>
                    <select class="form-control" name="kelas_id">
                         <?php foreach ($data['kelas'] as $row)  :?>
                          <option value="<?= $row['kelas_id']; ?>" <?php if($data['jadwal']['kelas_id'] == $row['kelas_id']) { echo "selected"; } ?>> <?= $row['nama_prodi']; ?>  - <?= $row['nama_kelas']; ?> ( <?= $row['semester']; ?> )</option>
                      <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label >Matakuliah ( SKS )</label>
                    <select class="form-control" name="matakuliah_id">
                         <?php foreach ($data['matakuliah'] as $row) :?>
                          <option value="<?= $row['matakuliah_id']; ?>" <?php if($data['jadwal']['matakuliah_id'] == $row['matakuliah_id']) { echo "selected"; } ?>><?= $row['nama_matakuliah']; ?> ( <?= $row['sks']; ?> )</option>
                      <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label >Dosen Pengajar</label>
                    <select class="form-control" name="dosen_id">
                        <?php foreach ($data['dosen'] as $row) :?>
                          <option value="<?= $row['dosen_id']; ?>" <?php if($data['jadwal']['dosen_id'] == $row['dosen_id']) { echo "selected"; } ?>><?= $row['nama_dosen']; ?> ( <?= $row['nama_pen']; ?> )</option>
                      <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label >Ruangan</label>
                    <select class="form-control" name="ruangan_id">
                         <?php foreach ($data['ruangan'] as $row) :?>
                          <option value="<?= $row['ruangan_id']; ?>" <?php if($data['jadwal']['ruangan_id'] == $row['ruangan_id']) { echo "selected"; } ?>><?= $row['ruangan_nama']; ?></option>
                      <?php endforeach; ?>
                      </select>
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