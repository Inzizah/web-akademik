  <div id="wrapper">

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item">
            <a href="<?= base_url('user/jadwalkelasdosen/'); ?>">Teaching Schedule /</a>
          </li>
          <li>
            <a class="breadcrumb-item active" href="<?= base_url('user'); ?>"> Dosen</a>
          </li>
        </ol>
        
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           Teaching Schedule</div>

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
                  <a href="<?= base_url('user/addjadwaldosen/'); ?>" class="btn btn-primary">Add New Teaching Schedule</a>
                </div>
                <!-- searching -->
                <div class="col-md-6">
                  <form action="" method="post">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Seacrh data from teaching schedule..." name="keyword">
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
                    <th>Mata Kuliah</th>
                    <th>Hari/Tanggal</th>
                    <th>Jam</th>
                    <th>Ruangan</th>
                    <th>Jurusan</th>
                    <th>Semester</th>
                    <th>Tahun Akademik</th>
                    <th>Absent</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($dosen as $dsn) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $dsn['nm_dsn'] ?></td>
                    <td><?= $dsn['kode_matkul']; ?></td>
                    <td><?= $dsn['matkul']; ?></td>
                    <td><?= $dsn['tanggal'] ?></td>
                    <td><?= $dsn['jam']; ?></td>
                    <td><?= $dsn['ruangan']; ?></td>
                    <td><?= $dsn['jurusan']; ?></td>
                    <td><?= $dsn['semester']; ?></td>
                    <td><?= $dsn['tahun_akd']; ?></td>
                    <td>
                      <div class="form-check text-center">
                        <input class="form-check-input" type="checkbox" checked="checked">
                      </div>
                    </td>
                    <td>
                      <a href="<?= base_url('user/ubahjadwaldosen/') . $dsn['id']; ?>" class="badge badge-success">Edit</a>
                      <a href="<?= base_url('user/deletejadwaldosen/') . $dsn['id']; ?>" class="badge badge-danger" onclick="return confirm('Are you sure?');">Delete</a>
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