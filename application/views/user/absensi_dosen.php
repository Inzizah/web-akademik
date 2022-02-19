  <div id="wrapper">

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb mb-5">
          <li class="breadcrumb-item">
            <a href="<?= base_url('user/absensidosen/'); ?>">Absensi Dosen / </a>
          </li>
          <li>
            <a class="breadcrumb-item active" href="<?= base_url('user'); ?>"> Dosen</a>
          </li>
        </ol>
        
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           Absensi Dosen</div>

          <div class="card-body">
            <div class="table-responsive">

              <!-- pesan error -->
              <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                  <?= validation_errors(); ?>
                </div>
              <?php endif; ?>

              <!-- pesan success -->
              <?= $this->session->flashdata('message'); ?>

              <!-- tambah data -->
              <div class="row mt-3">
                <div class="col-md-6">
                  <a href="<?= base_url('user/addabsendosen'); ?>" class="btn btn-primary">Add New Absensi Dosen</a>
                </div>
                <!-- searching -->
                <div class="col-md-6">
                  <form action="" method="post">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Seacrh data absen dosen..." name="keyword">
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Seacrh</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div class="row mt-4">
              <div class="col">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Dosen</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Dosen Mata kuliah</th>
                    <th>Materi Pembahasan</th>
                    <th>Jurusan</th>
                    <th>Semester</th>
                    <th>Hari/Tanggal</th>
                    <th>Jam</th>
                    <th>Ruangan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($dosen as $dsn) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $dsn['nm_dsn']; ?></td>
                    <td><?= $dsn['kode_matkul']; ?></td>
                    <td><?= $dsn['matkul']; ?></td>
                    <td><?= $dsn['materi'] ?></td>
                    <td><?= $dsn['jurusan']; ?></td>
                    <td><?= $dsn['semester']; ?></td>
                    <td><?= $dsn['tanggal']; ?></td>
                    <td><?= $dsn['jam']; ?></td>
                    <td><?= $dsn['ruangan']; ?></td>
                    <td>
                      <a href="<?= base_url(); ?>/user/editabsendosen/<?= $dsn['id']; ?>" class="badge badge-success">Edit</a>
                      <a href="<?= base_url(); ?>/user/deleteabsendosen/<?= $dsn['id']; ?>" class="badge badge-danger" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
              </div>
              </div>

            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>