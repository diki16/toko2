<!-- Area Chart Example-->
<div class="card ">
	<div class="row">
		<div class="col-sm-12">
			<?= $this->session->flashdata('pesan'); ?>
		</div>


	</div>
	<div class="card-body">

		<h1 class="h3 mb-4 text-grey-800"><?= $title; ?></h1>
		<div class="card mb-3" style="max-width: 540px;">
			<div class="row no-gutters">
				<div class="col-md-4">
					<img src="<?php echo base_url('assets/img/prifile/') . $user['gambar'] ?>" class="card-img">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title"><?php echo $user['nama']; ?></h5>
						<p class="card-text"><?php echo $user['email']; ?></p>
						<p class="card-text"><small class="text-muted">Pendaftaran Sejak
						<?php echo date('d F Y', $user['date_created']); ?></small></p>
						<a  href="<?php echo base_url(); ?>User/edit" class="btn btn-primary">Edit Profil</a>
						<a  href="<?php echo base_url(); ?>User/editpassword" class="btn btn-info">Ganti Password</a>
					</div>
				</div>
			</div>
		</div>


	</div>

</div>

</div>

</div>
<!-- /.container-fluid -->

<!-- Sticky Footer -->


</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


</body>
<script type="text/javascript">
	$(document).ready(function() {


		var readURL = function(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('.avatar').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}


		$(".file-upload").on('change', function() {
			readURL(this);
		});
	});
</script>