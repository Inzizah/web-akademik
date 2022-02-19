  <div id="wrapper">

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb mb-5">
          <li class="breadcrumb-item">
            <a href="<?= base_url('user/nilaimahasiswa'); ?>">Grades Mahasiswa / </a>
          </li>
          <li>
            <a class="breadcrumb-item active" href="<?= base_url('user'); ?>"> Lecturer</a>
          </li>
        </ol>
        
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          Grades Mahasiswa</div>

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
                <!-- searching -->
                <div class="col-md-6">
                  <form action="" method="post">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Seacrh grades mahasiswa..." name="keyword">
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
                    <th>Kode MK</th>
                    <th>Mata Kuliah</th>
                    <th>Lecturer</th>
                    <th>Jurusan</th>
                    <th>Semester</th>
                    <th>Tahun Akademik</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($jadwal as $jd) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $jd['kode_matkul']; ?></td>
                    <td><?= $jd['matkul']; ?></td>
                    <td><?= $jd['nm_dsn']; ?></td>
                    <td><?= $jd['jurusan'] ?></td>
                    <td><?= $jd['semester']; ?></td>
                    <td><?= $jd['tahun_akd']; ?></td>
                    <td>
                      <a href="<?= base_url(); ?>user/detailnilaimahasiswa/<?= $jd['id']; ?>" class="badge badge-dark">Detail</a>
                      <a href="<?= base_url(); ?>user/editnilaimhs<?= $jd['id']; ?>" class="badge badge-success">Edit</a>
                      <a href="<?= base_url(); ?>user/deletenilaimhs/<?= $jd['id']; ?>" class="badge badge-danger" onclick="return confirm('Are you sure?');">Delete</a>
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