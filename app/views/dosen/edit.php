  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Dosen</h1>
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
              <form role="form" action="<?= base_url; ?>/dosen/updatedosen" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="dosen_id" value="<?= $data['dosen']['dosen_id']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nama Dosen</label>
                    <input type="text" class="form-control" placeholder="masukkan nama dosen." name="nama_dosen" value="<?= $data['dosen']['nama_dosen'];?>">
                  </div>
                  <div class="form-group">
                    <label >Alamat</label>
                    <input type="text" class="form-control" placeholder="masukkan alamat dosen." name="alamat_dosen" value="<?= $data['dosen']['alamat_dosen'];?>">
                  </div>
                  <div class="form-group">
                  <label>Tanggal Lahir Dosen</label>
                  <div class='input-group date' id='datetimepicker'>
                    <input type='date' class="form-control" name="tgl_lahir" value="<?= $data['dosen']['tgl_lahir']; ?>" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>
                  </div>
                  <div class="form-group">
                    <label >Telepon</label>
                    <input type="text" class="form-control" placeholder="masukkan telepon dosen." name="tlp_dosen" value="<?= $data['dosen']['tlp_dosen'];?>">
                  </div>
                  <div class="form-group">
                    <label >Pendidikan</label>
                    <select class="form-control" name="pend_id">
                        <option value="">Pilih</option>
                         <?php foreach ($data['Pendidikan'] as $row) :?>
                        <option value="<?= $row['pend_id']; ?>" <?php if($data['dosen']['pend_id'] == $row['pend_id']) { echo "selected"; } ?>><?= $row['nama_pen']; ?></option>
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