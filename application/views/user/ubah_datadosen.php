  <div id="wrapper">

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item">
            <a href="<?= base_url('user/datadosen'); ?>">Lecturer Data / </a>
          </li>
          <li>
            <a class="breadcrumb-item active" href="<?= base_url('user'); ?>">Lecturer</a>
          </li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          Edit Lecturer Data</div>

          <div class="card-body">
            <div class="table-responsive">
              
              <form action="" method="post">
                <input type="hidden" name="id" value="<?= $ubah['id']; ?>">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="nm_dsn">Name Lecturer</label>
                    <input type="text" class="form-control" id="nm_dsn" name="nm_dsn" value="<?= $ubah['nm_dsn']; ?>">
                    <?= form_error('nm_dsn', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email_dsn"> Email lecturer</label>
                    <input type="text" class="form-control" id="email_dsn" name="email_dsn" value="<?= $ubah['email_dsn']; ?>">
                    <?= form_error('email_dsn', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="pendidikan">Education Lecturer</label>
                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?= $ubah['pendidikan']; ?>">
                    <?= form_error('pendidikan', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                   <div class="form-group col-md-6">
                    <label for="tlpn_dsn">Number Handphone</label>
                    <input type="text" class="form-control" id="tlpn_dsn" name="tlpn_dsn" value="<?= $ubah['tlpn_dsn']; ?>">
                    <?= form_error('tlpn_dsn', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="jbtn_dsn">Position Lecturer</label>
                    <input type="text" class="form-control" id="jbtn_dsn" name="jbtn_dsn" value="<?= $ubah['jbtn_dsn']; ?>">
                    <?= form_error('jbtn_dsn', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="almt_dsn">Address Lecturer</label>
                    <input type="text" class="form-control" id="almt_dsn" name="almt_dsn" value="<?= $ubah['almt_dsn']; ?>">
                    <?= form_error('almt_dsn', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                </div>     
                <button type="submit" name="ubah" class="btn btn-primary mt-3 float-right">Edit Lecturer Data</button>
              </form>
              

            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->