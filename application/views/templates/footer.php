  <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright 2019 - Create By Ziezah</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor2/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor2/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor2/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js2/sb-admin-2.min.js"></script>

  <!-- AJAX -->
  <script>

    $('.tombolTambahMenu').on('click', function() { //untuk tambah menu
      // cara ini digunakan untuk membuat tambah + edit menu secara otomatis
      $('#formModalLabel').html('Add New Menu'); //untuk merubah judul
      $('.modal-footer button[type=submit]').html('Add Menu'); //untuk merubah tombol
      $('.modal-body form').attr('action', '<?= base_url('menu/index'); ?>');
    });

    $('.tombolEditMenu').on('click', function() { //untuk edit menu
      // cara ini digunakan untuk membuat tambah + edit menu secara otomatis
      $('#formModalLabel').html('Edit Menu'); //untuk merubah judul
      $('.modal-footer button[type=submit]').html('Edit Menu'); //untuk merubah tombol
      $('.modal-body form').attr('action', '<?= base_url('menu/edit'); ?>');
      
    });

    $('.tombolTambahSubmenu').on('click', function() { //untuk tambah submenu
      // cara ini digunakan untuk membuat tambah + edit menu secara otomatis
      $('#formModalLabel').html('Add New Submenu'); //untuk merubah judul
      $('.modal-footer button[type=submit]').html('Add Submenu'); //untuk merubah tombol
      $('.modal-body form').attr('action', '<?= base_url('menu/submenu'); ?>');
    });

    $('.tombolEditSubmenu').on('click', function() { //untuk edit submenu
      // cara ini digunakan untuk membuat tambah + edit menu secara otomatis
      $('#formModalLabel').html('Edit Submenu'); //untuk merubah judul
      $('.modal-footer button[type=submit]').html('Edit Submenu'); //untuk merubah tombol
      $('.modal-body form').attr('action', '<?= base_url('menu/editsubmenu'); ?>');
      
    });

    $('.custom-file-input').on('change', function() {
      // cara ini digunakan untuk mengakali waktu edit foto, agar nama fotonya dapat tampil diinputan
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    

    $('.form-check-input').on('click', function() {
      // terhubung dengan role-access, ketika checkboc di klik, maka akan langsung menambahkan atau menghapus menu yang ada
      const menuId = $(this).data('menu');
      const roleId = $(this).data('role');

      // jalankan AJAX nya
      $.ajax({
        url : "<?= base_url('admin/changeaccess'); ?>",
        type : 'post',
        data : {
          menuId: menuId,
          roleId: roleId
        },
        success: function() {
          document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
        }
      });

    });
  </script>



</body>

</html>
