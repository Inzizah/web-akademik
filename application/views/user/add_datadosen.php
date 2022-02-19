  <div id="wrapper">

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item">
            <a href="<?= base_url('user/datadosen'); ?>"> Lecturer Data / </a>
          </li>
          <li>
            <a class="breadcrumb-item active" href="<?= base_url('user'); ?>">Lecturer</a>
          </li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
           Add New Lecturer Data</div>

          <div class="card-body">
            <div class="table-responsive">
              
              <form action="<?= base_url('user/adddatadosen'); ?>" method="post">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="nm_dsn">Name Lecturer</label>
                    <input type="text" class="form-control" id="nm_dsn" name="nm_dsn" placeholder="name....">
                    <?= form_error('nm_dsn', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email_dsn"> Email lecturer</label>
                    <input type="text" class="form-control" id="email_dsn" name="email_dsn" placeholder="aaa@gmail.com">
                    <?= form_error('email_dsn', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="pendidikan">Education Lecturer</label>
                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Last Education....">
                    <?= form_error('pendidikan', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                   <div class="form-group col-md-6">
                    <label for="tlpn_dsn">Number Handphone</label>
                    <input type="text" class="form-control" id="tlpn_dsn" name="tlpn_dsn" placeholder="+62....">
                    <?= form_error('tlpn_dsn', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="jbtn_dsn">Position Lecturer</label>
                    <input type="text" class="form-control" id="jbtn_dsn" name="jbtn_dsn" placeholder="Position....">
                    <?= form_error('jbtn_dsn', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="almt_dsn">Address Lecturer</label>
                    <input type="text" class="form-control" id="almt_dsn" name="almt_dsn" placeholder="Your Address....">
                    <?= form_error('almt_dsn', '<small class="text-danger pl-3">','</small>'); ?>
                  </div>
                </div>     
                <button type="submit" class="btn btn-primary mt-3 float-right">Add New Data Lecturer</button>
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