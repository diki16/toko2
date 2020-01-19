<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Kasir Techno Ice</title>

	<!--Link Font Untuk Web Ini-->
	<link href="<?php echo base_url(); ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!--Tampiln CSS Untuk web-->
	<link href="<?php echo base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Untuk Sidebar -->
		<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('HalamanUtama'); ?>">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-fw fa-print"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Kasir<sup>v1</sup></div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">


			<!-- query menu -->
			<?php
			$role_id = $this->session->userdata('role_id');
			$queryMenu = "SELECT `user_menu`.`id`, `menu`
											 FROM `user_menu` JOIN `user_access_menu`
										     ON `user_menu`.`id` = `user_access_menu`.`menu_id`
										  WHERE `user_access_menu`.`role_id` = $role_id
									 ORDER BY `user_access_menu`.`menu_id` ASC
				";
			$menu = $this->db->query($queryMenu)->result_array();

			?>


			<!-- LOOPING MENU -->
			<?php foreach ($menu as $m) : ?>
				<div class="sidebar-heading">
					<?php echo $m['menu']; ?>
				</div>

				<!-- BUAT NAMPILIN MENU SESUAI MENU CTID -->
				<?php
				$menuId = $m['id'];
				$querySubMenu = "SELECT *
						FROM `user_sub_menu` JOIN `user_menu`
						ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
						WHERE `user_sub_menu`.`menu_id` = $menuId
						AND `user_sub_menu`.`is_active` = 1
					";
				$subMenu = $this->db->query($querySubMenu)->result_array();
				?>


				<?php foreach ($subMenu as $sm) : ?>
					<?php if ($title == $sm['title']) : ?>
						<li class="nav-item active">
						<?php else : ?>
						<li class="nav-item">
						<?php endif; ?>

						<a class="nav-link pb-0" href="<?php echo base_url($sm['url']); ?>">
							<i class="<?php echo $sm['icon']; ?>"></i>
							<span><?php echo $sm['title']; ?></span></a>
						</li>
					<?php endforeach; ?>
					<hr class="sidebar-divider mt-3">
				<?php endforeach; ?>


				<!-- Divider -->


				<!-- Heading -->
				<!-- <div class="sidebar-heading">
				Kategori
			</div> -->

				<!-- Nav Item - Pages Collapse Menu -->
				<!-- <li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesatu" aria-expanded="true"
					aria-controls="collapsesatu">
					<i class="fas fa-fw fa-print"></i>
					<span>Toko Ku</span>
				</a>
				<div id="collapsesatu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">

						<a class="collapse-item" href="<?php //echo base_url();
																						?>toko">Edit Info Toko</a>

					</div>
				</div>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="<?php //echo base_url()
																	?>/transaksi">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Transaksi</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetiga" aria-expanded="true"
					aria-controls="collapsetiga">
					<i class="fas fa-fw fa-cog"></i>
					<span>Master</span>
				</a>
				<div id="collapsetiga" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Sub Menu:</h6>
						<a class="collapse-item" href="<?php echo base_url() ?>skeluar">Stok Keluar</a>
						<a class="collapse-item" href="<?php echo base_url() ?>smasuk">Stok Masuk</a>
						<a class="collapse-item" href="<?php echo base_url() ?>dbarang">Data Barang</a>

					</div>
				</div>
			</li> -->

				<!-- Sidebar Toggler (Sidebar) -->
				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-3 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Pencarian Dropdown (Hanya Muncul XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Pesan -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>

						<!-- Nav Item  Pemberitahuan-->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-bell fa-fw"></i>
								<!-- Counter - Alerts -->
								<span class="badge badge-danger badge-counter">3+</span>
							</a>
							<!-- Dropdown Pemberitahuan-->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
								<h6 class="dropdown-header">
									Notifikasi
								</h6>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-primary">
											<i class="fas fa-file-alt text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 12, 2019</div>
										<span class="font-weight-bold">A new monthly report is ready to download!</span>
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-success">
											<i class="fas fa-donate text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 7, 2019</div>
										$290.29 has been deposited into your account!
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="mr-3">
										<div class="icon-circle bg-warning">
											<i class="fas fa-exclamation-triangle text-white"></i>
										</div>
									</div>
									<div>
										<div class="small text-gray-500">December 2, 2019</div>
										Spending Alert: We've noticed unusually high spending for your account.
									</div>
								</a>
								<a class="dropdown-item text-center small text-gray-500" href="#">Lihat Semua</a>
							</div>
						</li>

						<!-- Nav Item Kotak Masuk -->
						<li class="nav-item dropdown no-arrow mx-1">
							<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-envelope fa-fw"></i>
								<!-- Counter - Messages -->
								<span class="badge badge-danger badge-counter">7</span>
							</a>
							<!-- Dropdown Kotak Masuk -->
							<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
								<h6 class="dropdown-header">
									Pesan Masuk
								</h6>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="dropdown-list-image mr-3">
										<img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
										<div class="status-indicator bg-success"></div>
									</div>
									<div class="font-weight-bold">
										<div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been
											having.</div>
										<div class="small text-gray-500">Emily Fowler · 58m</div>
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="dropdown-list-image mr-3">
										<img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
										<div class="status-indicator"></div>
									</div>
									<div>
										<div class="text-truncate">I have the photos that you ordered last month, how would you like them
											sent to you?</div>
										<div class="small text-gray-500">Jae Chun · 1d</div>
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="dropdown-list-image mr-3">
										<img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
										<div class="status-indicator bg-warning"></div>
									</div>
									<div>
										<div class="text-truncate">Last month's report looks great, I am very happy with the progress so
											far, keep up the good work!</div>
										<div class="small text-gray-500">Morgan Alvarez · 2d</div>
									</div>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<div class="dropdown-list-image mr-3">
										<img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
										<div class="status-indicator bg-success"></div>
									</div>
									<div>
										<div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people
											say this to all dogs, even if they aren't good...</div>
										<div class="small text-gray-500">Chicken the Dog · 2w</div>
									</div>
								</a>
								<a class="dropdown-item text-center small text-gray-500" href="#">Lihat Semua Pesan</a>
							</div>
						</li>

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user['nama']; ?></span>
								<img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/prifile/') . $user['gambar']; ?>">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="<?php echo base_url(); ?>User">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profil
								</a>
								<!-- <a class="dropdown-item" href="<?php // echo base_url(); ?>User/edit">
									<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
									Pengaturan Profil
								</a> -->
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Keluar
								</a>
							</div>
						</li>
						<!-- Hak Cipta TechnoIce Developer -->
					</ul>

				</nav>
				<!-- Logout Modal-->
				<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Yakin ?</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Jika Yakin, Pilih Logout Untuk Keluar.</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
								<a class="btn btn-primary" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
							</div>
						</div>
					</div>
				</div>
				<!--Akhir Untuk Top Bar-->
				<!-- Hak Cipta TechnoIce 2019 -->