  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Mata Kuliah</h1>
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
              <form role="form" action="<?= base_url; ?>/matakuliah/updatematakuliah" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="matakuliah_id" value="<?= $data['matakuliah']['matakuliah_id']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Mata Kuliah</label>
                    <input type="text" class="form-control" placeholder="masukkan nama matakuliah." name="nama_matakuliah" value="<?= $data['matakuliah']['nama_matakuliah'];?>">
                  </div>
                  <div class="form-group">
                    <label >Semester</label>
                    <select class="form-control" name="semester">
                      <option value="<?= $data['matakuliah']['semester']; ?>"><?= $data['matakuliah']['semester']; ?></option>
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
                    <label >SKS</label>
                    <input type="text" class="form-control" placeholder="masukkan nama sks." name="sks" value="<?= $data['matakuliah']['sks'];?>">
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