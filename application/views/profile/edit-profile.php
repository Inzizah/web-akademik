 <!-- Begin Page Content -->
	<div class="container-fluid">

          <!-- Page Heading My Profile-->
          <h1 class="h3 mb-4 text-gray-800">
            <?= $title; ?>
          </h1>

 		<div class="card mb-3 col-md" >
		  <div class="row no-gutters">
			    <div class="col-md-4 text-center">
			      <img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" class="card-img">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <div class="form-row">
			      		<?= form_open_multipart('profile/edit'); ?>
					    <div class="form-row">
					    	<div class="form-group col-md-6">
						      <label for="name">Full Name</label>
						      <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
						      <?= form_error('name', '<small class="text-danger pl-3">','</small>'); ?>
						    </div>
						    <div class="form-group col-md-6">
						      <label for="email">Email</label>
						      <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
						    </div>
						</div>
						<div class="form-row">
					    	<div class="form-group col-md-6">
						      <label for="nim">Number Induk Mahasiswa</label>
						      <input type="text" class="form-control" id="nim" name="nim" value="<?= $user['nim']; ?>">
						    </div>
						    <div class="form-group col-md-6">
						      <label for="semester">Semester</label>
						      <select class="custom-select" id="semester" name="semester">
						      	  <option value="">Select Option</option>
				                      <?php foreach ($semester as $s) : ?>
				                        <option value="<?= $s['id']; ?>"><?= $s['semester']; ?></option>
				                      <?php endforeach; ?>
							  </select>
						    </div>
						</div>
						<div class="form-row">
						    <div class="form-group col-md">
						      <label for="jurusan">Jurusan</label>
						      <select class="custom-select" id="jurusan" name="jurusan">
						      	  <option value="">Select Option</option>
				                      <?php foreach ($jurusan as $j) : ?>
				                        <option value="<?= $j['id']; ?>"><?= $j['jurusan']; ?></option>
				                      <?php endforeach; ?>
							  </select>
						    </div>
						</div>
						<div class="form-row">
							<div class=" form-group custom-file">
								  <input type="file" class="custom-file-input" id="image" name="image">
								  <label class="custom-file-label" for="image">Change Profile Picture!</label>
							</div>
						</div>
						<hr>
						<div class="form-row justify-content-end">
							<div class="form-group">
								<button type="submit" class="btn btn-success">Edit Profile</button>
							</div>
						</div>						
			     </form>
					</div>
			      </div>
			    </div>
		    
		  </div>
		</div>

    </div>