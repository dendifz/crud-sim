  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Pendidikan</h1>
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
          <h3 class="card-title"><?= $data['title'] ?></h3> <a href="<?= base_url; ?>/Pendidikan/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Pendidikan</a>
        </div>
        <div class="card-body">
        
   
          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Pendidikan</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?> 
                    <?php foreach ($data['Pendidikan'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['nama_pen'];?></td>
                      <td>
                        <a href="<?= base_url; ?>/Pendidikan/edit/<?= $row['pend_id'] ?>" class="badge badge-info ">Edit</a> <a href="<?= base_url; ?>/Pendidikan/hapus/<?= $row['pend_id'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
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

