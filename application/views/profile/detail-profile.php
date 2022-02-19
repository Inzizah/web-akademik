 <!-- Begin Page Content -->
	<div class="container-fluid">

          <!-- Page Heading My Profile-->
          <h1 class="h3 mb-4 text-gray-800">
            <?= $title; ?>
          </h1>

 		<div class="card mb-3" >
		  <div class="row no-gutters">
		    <div class="col-md-4 text-center">
		      <img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" class="card-img">
		      <h4 class="card-title mt-4">Hello <?= $user['name']; ?> </h4>
			     <p class="card-text"><small class="text-muted">Member since <?= date('d F Y',  $user['date_created']); ?></small></p>
		    </div>
		    <div class="col-md-8">
		      <div class="card-body">
		        <h6 class="card-title"><small class="text-muted">FULL NAME </small></h6>
		        <h5 class="card-text"><?= $user['name']; ?></h5>
		        <hr>
		        <h6 class="card-title"><small class="text-muted">NUMBER INDUK MAHASISWA</small></h6>
		        <h5 class="card-text"><?= $user['nim']; ?></h5>
		        <hr>
		        <h6 class="card-title"><small class="text-muted">JURUSAN KULIAH</small></h6>
		        <h5 class="card-text"><?= $user['jurusan']; ?></h5>
		        <hr>
		        <h6 class="card-title"><small class="text-muted">THE CURRENT SEMESTER</small></h6>
		        <h5 class="card-text"><?= $user['semester']; ?></h5>
		        <hr>
		      	<h6 class="card-title"><small class="text-muted">EMAIL ADDRESS</small></h6>
		        <h5 class="card-text"><?= $user['email']; ?></h5>
		        <hr>
		        <a class="btn btn-outline-primary" href="<?= base_url('profile/edit/') ?>">Edit Profile</a>
		      </div>
		    </div>
		  </div>
		</div>

    </div>