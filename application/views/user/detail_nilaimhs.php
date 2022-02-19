<div id="wrapper">

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item">
            <a href="<?= base_url('user/nilaimahasiswa/'); ?>">Grades Mahasiswa / </a>
          </li>
          <li>
            <a class="breadcrumb-item active" href="<?= base_url('user'); ?>"> Dosen</a>
          </li>
        </ol>

        <h1 class="h3 mb-4 text-gray-800">
            <?= $title; ?>
        </h1>

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
                <div class="col-md-6">
                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                      <tr>
                        <td><strong>Jurusan</strong></td>
                        <td>
                          
                        </td>
                      </tr>
                      <tr>
                        <td><strong>Semester</strong></td>
                        <td>
                          
                        </td>
                      </tr>
                      <tr>
                        <td><strong>Tahun Akademik</strong></td>
                        <td>
                          
                        </td>
                      </tr>
                    </tbody>
                   </table>
                </div>

                <div class="col-md-6">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                      <tr>
                        <td><strong>Kode MK</strong></td>
                        <td>
                          
                        </td>
                      </tr>
                      <tr>
                        <td><strong>Mata Kuliah</strong></td>
                        <td>
                          
                        </td>
                      </tr>
                      <tr>
                        <td><strong>Lecturer</strong></td>
                        <td>
                        
                        </td>
                      </tr>
                    </tbody>
                   </table>
                </div>
              </div>

              <div class="row mt-4">
              <div class="col">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Name Mahasiswa</th>
                    <th>Absent</th>
                    <th>Test/Quiz</th>
                    <th>Midle Test</th>
                    <th>Final Test</th>
                    <th>Score</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($nilai as $n
                  ) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $n
                    ['nim'] ?></td>
                    <td><?= $n
                    ['nama_mhs']; ?></td>
                    <td><?= $n
                    ['hadir']; ?></td>
                    <td><?= $n
                    ['tugas'] ?></td>
                    <td><?= $n
                    ['uts']; ?></td>
                    <td><?= $n
                    ['uas']; ?></td>
                    <td><?= $n
                    ['na']; ?></td>
                    <td>
                      <a href="<?= base_url(); ?>/user/addabsendosen/<?= $n
                      ['id']; ?>" class="badge badge-success">Absen</a>
                      <a href="<?= base_url(); ?>/user/editjadwaldosen/<?= $n
                      ['id']; ?>" class="badge badge-success">Edit</a>
                      <a href="<?= base_url(); ?>/user/deletejadwaldosen/<?= $n
                      ['id']; ?>" class="badge badge-danger" onclick="return confirm('Are you sure?');">Delete</a>
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