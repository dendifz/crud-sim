  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Jadwal</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
    <div class="col-sm-12">
      <?php
        Flasher::Message();
      ?>
    </div>
  </div>
      <!-- Default box -->

      <div class="card">
      <div class="card-header">
          <h3 class="card-title"><?= $data['title'] ?></h3> <div class="btn-group float-right"><a href="<?= base_url; ?>/jadwal/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Data jadwal</a><a href="<?= base_url; ?>/jadwal/laporan" class="btn float-right btn-xs btn btn-info">Laporan jadwal</a><a href="<?= base_url; ?>/jadwal/lihatlaporan" class="btn float-right btn-xs btn btn-warning">Lihat Laporan jadwal</a></div>
        </div>
        <div class="card-body">
        <form action="<?= base_url; ?>/jadwal/cari" method="post">
            <div class="row mb-3">
              <div class="col-lg-6">
                <div class="input-group">
                  <select class="form-control" name="key">
                      <option value="Senin">Senin</option>
                      <option value="Selasa">Selasa</option>
                      <option value="Rabu">Rabu</option>
                      <option value="Kamis">Kamis</option>
                      <option value="Jumat">Jumat</option>
                      <option value="Sabtu">Sabtu</option>
                      <option value="Minggu">Minggu</option>
                    </select>
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
                    <a class="btn btn-outline-danger" href="<?= base_url; ?>/jadwal">Reset</a>
                  </div>
                </div>

              </div>
            </div>
          </form>
          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Hari</th>
                      <th>Jam</th>
                      <th>Smstr</th>
                      <th>Kelas</th>
                      <th>Mata Kuliah</th>
                      <th>SKS</th>
                      <th>Dosen Pengajar</th>
                      <th>Ruang</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1;?> 
                    <?php foreach ($data['jadwal'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['hari'];?></td>
                      <td><?= $row['jamkuliah'];?></td>
                      <td><?php foreach ($data['kelas'] as $row1) :?><?php if($row['kelas_id'] == $row1['kelas_id']) { echo $row1['semester'];}?><?php endforeach; ?></td>
                      <td><?php foreach ($data['kelas'] as $row1) :?><?php if($row['kelas_id'] == $row1['kelas_id']) { echo $row1['nama_prodi'];}?> <?php endforeach; ?> - <?= $row['nama_kelas'];?></td>
                      <td><?= $row['nama_matakuliah'];?></td>
                      <td><?= $row['sks'];?></td>
                      <td><?= $row['nama_dosen'];?></td>
                      <td><?= $row['ruangan_nama'];?></td>
                      <td>
                        <a href="<?= base_url; ?>/jadwal/edit/<?= $row['jadwal_id'] ?>" class="badge badge-info">Edit</a> <a href="<?= base_url; ?>/jadwal/hapus/<?= $row['jadwal_id'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                      </td>
                    </tr>
                    <?php $no++; endforeach; ?>
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

