
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb mb-5">
          <li class="breadcrumb-item">
            <a href="<?= base_url('user'); ?>">Lecturer</a>
          </li>
        </ol>

        <!-- Icon Cards-->
        <div class="row mb-5">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user-tie"></i>
                </div>
                <div class="mr-5">Lecturer Data</div>
              </div>
              <a class="card-footer text-white bg-primary small z-1" href="<?= base_url('user/datadosen/'); ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                   <i class="fas fa-fw fa-address-book"></i>
                </div>
                <div class="mr-5">Absent Lecturer</div>
              </div>
              <a class="card-footer text-white bg-warning small z-1" href="<?= base_url('user/absensidosen/'); ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-chalkboard-teacher"></i>
                </div>
                <div class="mr-5">Teaching Schedule</div>
              </div>
              <a class="card-footer text-white bg-success small z-1" href="<?= base_url('user/jadwalkelasdosen/'); ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-address-card"></i>
                </div>
                <div class="mr-5">Grades Mahasiswa</div>
              </div>
              <a class="card-footer text-white bg-danger small z-1" href="<?= base_url('user/nilaimahasiswa/'); ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
