<div class="container-fluid">
	<h1 class="h3 mb-4 text-grey-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg-6">
		<?= $this->session->flashdata('pesan'); ?>
			<form action="<?= base_url('user/editpassword'); ?>" method="post">
			<div class="form-group row">
				<label for="nama" class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?> " readonly>
					</div>
			</div>
				<div class="form-group">
					<label for="password_sekarang">Password Saat Ini</label>
					<input type="password" class="form-control" id="password_sekarang" name="password_sekarang" >
					<?php echo form_error('password_sekarang',  '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="password_baru1">Password Baru</label>
					<input type="password" class="form-control" id="password_baru1" name="password_baru1">
					<?php echo form_error('password_baru1',  '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="password_baru2">Ulangi Password Baru</label>
					<input type="password" class="form-control" id="password_baru2" name="password_baru2">
					<?php echo form_error('password_baru2',  '<small class="text-danger pl-3">', '</small>'); ?>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Ganti Password</button>
				</div>
			</form>

		</div>
	</div>


</div>
