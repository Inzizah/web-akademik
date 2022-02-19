        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading menu management-->
          <h1 class="h3 mb-4 text-gray-800">
            <?= $title; ?>
          </h1>  


          <div class="row">
            <div class="col-lg-6">

              <!-- pesan error -->
              <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>') ?>

              <!-- pesan success -->
              <?= $this->session->flashdata('message'); ?>

              <!-- Tombol tambah data -->
              <a href="" class="btn btn-primary mb-4 tombolTambahMenu" data-toggle="modal" data-target="#formModal">Add New Menu</a>

              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($menu as $m) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $m['menu']; ?></td>
                    <td>
                      <a href="<?= base_url(); ?>/menu/edit/<?= $m['id']; ?>" class="badge badge-success tombolEditMenu" data-toggle="modal" data-target="#formModal">Edit</a>

                      <a href="<?= base_url(); ?>/menu/hapusmenu/<?= $m['id']; ?>" class="badge badge-danger" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Modal Add + Edit Menu-->
      <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="formModalLabel">Add New Menu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form action="<?= base_url('menu/index'); ?>" method="post">
                  <input type="hidden" name="id" id="id">
                  <div class="form-group">
                      <label for="menu">Menu Management</label>
                      <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Management">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" ">Add</button>
                  </div>
              </form>
            </div>

          </div>
        </div>
      </div>
