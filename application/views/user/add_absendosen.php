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
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           Add New Absen Dosen</div>

          <div class="card-body">
            <div class="table-responsive">
              
              <form action="<?= base_url('user/addabsendosen'); ?>" method="post">
                <div class="form-group">
                  <label for="nm_dsn">Nama Dosen</label>
                  <input type="text" class="form-control" id="nm_dsn" name="nm_dsn">
                  <?= form_error('nm_dsn', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="kode_matkul">Kode Mata Kuliah</label>
                    <input type="text" class="form-control" id="kode_matkul" name="kode_matkul">
                    <?= form_error('kode_matkul', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="matkul"> Dosen Mata Kuliah</label>
                    <input type="text" class="form-control" id="matkul" name="matkul">
                    <?= form_error('matkul', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="jurusan">Jurusan</label>
                    <select name="jurusan" id="jurusan" class="form-control" >
                      <option value="">Select Menu</option>
                        <?php foreach ($jurusan as $j) : ?>
                          <option value="<?= $j['id']; ?>"><?= $j['jurusan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('jurusan', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="semester">Semester</label>
                    <select name="semester" id="semester" class="form-control" >
                     <option value="">Select Menu</option>
                        <?php foreach ($semester as $s) : ?>
                          <option value="<?= $s['id']; ?>"><?= $s['semester']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('semester', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="materi">Materi Pembahasan</label>
                  <input type="text" class="form-control" id="materi" name="materi">
                  <?= form_error('materi', '<small class="text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="tanggal">Hari/Tanggal Mengajar</label>
                    <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="hari / dd-yy-xxxx">
                    <?= form_error('tanggal', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="jam">Jam Mengajar</label>
                    <input type="text" class="form-control" id="jam" name="jam" placeholder="00:00:00">
                    <?= form_error('jam', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ruangan">Ruangan Mengajar</label>
                    <input type="text" class="form-control" id="ruangan" name="ruangan" placeholder="Ruang....">
                    <?= form_error('ruangan', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3 float-right">Add New Absen Dosen</button>
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