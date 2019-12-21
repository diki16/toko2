<?php include'header.php';
?>

<head>
</head>

<body id="page-top">


	<div id="wrapper">



		<div id="content-wrapper">

			<div class="container-fluid">

				<!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
				<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- Icon Cards-->


				<!-- Area Chart Example-->
				<div class="card ">
					<div class="row">


						<div class="card-body">


							<hr>
							<div class="container bootstrap snippet">
								<div class="row">
									<div class="col-sm-10">
										<h1>Info Toko</h1>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-3">
										<!--left col-->
										<br>


										<div class="panel panel-default">
											<div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
											<div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
										</div>

										<div class="panel panel-default">
											<div class="panel-heading">Social Media</div>
											<div class="panel-body">
												<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i
													class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i
													class="fa fa-google-plus fa-2x"></i>
											</div>
										</div>

									</div>
									<!--/col-3-->
									<div class="col-sm-9">

										<div class="tab-content">
											<div class="tab-pane active" id="home">
												<hr>
												<form class="form" action="##" method="post" id="registrationForm">
													<div class="form-group">

														<div class="col-xs-6">
															<label for="first_name">
																<h4>Nama Toko</h4>
															</label>
															<input type="text" class="form-control" name="first_name" id="first_name"
																placeholder="Nama Toko" title="Masukan Nama Toko">
														</div>
													</div>

													<div class="form-group">

														<div class="col-xs-6">
															<label for="phone">
																<h4>Nomor Hape Kantor</h4>
															</label>
															<input type="text" class="form-control" name="phone" id="phone"
																placeholder="Masukin Nomor Hape Kantor" title="Masukan Nomer Hape Kantor">
														</div>
													</div>

													<div class="form-group">

														<div class="col-xs-6">
															<label for="phone">
																<h4>Alamat Toko/Cafe</h4>
															</label>
															<input type="text" class="form-control" name="phone" id="phone"
																placeholder="Masukin Alamat Toko/ Cafe" title="Masukan Alamat Toko/ Cafe">
														</div>
													</div>

													<div class="form-group">

														<div class="col-xs-6">
															<label for="email">
																<h4>Email</h4>
															</label>
															<input type="email" class="form-control" name="email" id="email"
																placeholder="namaemailtoko@email.com" title="Masukan Alamat Email">
														</div>
													</div>

													<div class="form-group">
														<div class="col-xs-12">
															<br>
															<button class="btn btn-lg btn-success" type="submit"><i
																	class="glyphicon glyphicon-ok-sign"></i> Save</button>
															<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i>
																Reset</button>
														</div>
													</div>
												</form>

												<hr>

											</div>
									
										</div>
										<!--/tab-pane-->
									</div>
									<!--/tab-content-->

								</div>
								<!--/col-9-->
							</div>
							<!--/row-->

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
	$(document).ready(function () {


		var readURL = function (input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('.avatar').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}


		$(".file-upload").on('change', function () {
			readURL(this);
		});
	});
</script>

<?php 
  include 'footer.php';
  ?>