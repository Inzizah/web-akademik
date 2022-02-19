  <div id="wrapper">

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item">
            <a href="<?= base_url('user/absensidosen/'); ?>">Absensi Dosen / </a>
          </li>
          <li>
            <a class="breadcrumb-item active" href="<?= base_url('user'); ?>"> Dosen</a>
          </li>
        </ol>

        <!-- DataTables Example -->
        <div class="card">
          <div class="card-header">
            <i class="fas fa-table"></i>
          Edit Absen Dosen</div>

          <div class="card-body">
            <div class="table-responsive">
              <form action="" method="post">

                <input type="hidden" name="id" value="<?= $edit['id']; ?>">

                <div class="form-group">
                  <label for="nm_dsn">Nama Dosen</label>
                  <input type="text" class="form-control" id="nm_dsn" name="nm_dsn" value="<?= $edit['nm_dsn']; ?>">
                  <?= form_error('nm_dsn', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="kode_matkul">Kode Mata Kuliah</label>
                    <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" value="<?= $edit['kode_matkul']; ?>">
                    <?= form_error('kode_matkul', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="matkul"> Dosen Mata Kuliah</label>
                    <input type="text" class="form-control" id="matkul" name="matkul" value="<?= $edit['matkul']; ?>">
                    <?= form_error('matkul', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="jurusan">Jurusan</label>
                    <select name="jurusan" id="jurusan" class="form-control" >
                      <option value="">Select Menu</option>
                      <?php foreach ($jurusan as $j) : ?>
                          <?php if ($j['jurusan'] == $edit['jurusan']) : ?>
                            <option value="<?= $j['jurusan']; ?>" selected><?= $j['jurusan']; ?></option>
                          <?php else : ?>
                            <option value="<?= $j['jurusan']; ?>"><?= $j['jurusan']; ?></option>
                          <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('jurusan', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="semester">Semester</label>
                    <select name="semester" id="semester" class="form-control" >
                      <option value="">Select Menu</option>
                      <?php foreach ($semester as $s) : ?>
                          <?php if ($s['semester'] == $edit['semester']) : ?>
                            <option value="<?= $s['semester']; ?>" selected><?= $s['semester']; ?></option>
                          <?php else : ?>
                            <option value="<?= $s['semester']; ?>"><?= $s['semester']; ?></option>
                          <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('semester', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="materi">Materi Pembahasan</label>
                  <input type="text" class="form-control" id="materi" name="materi" value="<?= $edit['materi']; ?>">
                  <?= form_error('materi', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="tanggal">Hari/Tanggal Mengajar</label>
                    <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $edit['tanggal']; ?>">
                    <?= form_error('tanggal', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="jam">Jam Mengajar</label>
                    <input type="text" class="form-control" id="jam" name="jam" value="<?= $edit['jam']; ?>">
                    <?= form_error('jam', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ruangan">Ruangan Mengajar</label>
                    <input type="text" class="form-control" id="ruangan" name="ruangan" value="<?= $edit['ruangan']; ?>">
                    <?= form_error('ruangan', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                </div>

                <button type="submit" name="edit" class="btn btn-primary mt-3 float-right">Edit Absen Dosen</button>
              </form>
              

            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->y