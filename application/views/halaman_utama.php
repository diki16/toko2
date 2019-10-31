<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'header.php';
?><!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
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
		<div class="row">
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-calendar"></i>
				</div>
				<div class="mr-5">Pendapatan (Bulan)</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left" style="color:black">Lihat Detail</span>
				<span class="float-right">
					<i class="fas fa-angle-right" style="color:black"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-handshake"></i>
				</div>
				<div class="mr-5">11 Transaksi Hari Ini</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left" style="color:black">Lihat Detail</span>
				<span class="float-right">
					<i class="fas fa-angle-right" style="color:black"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-inbox"></i>
				</div>
				<div class="mr-5">123 Jumlah Stok Barang</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left" style="color:black">Lihat Detail</span>
				<span class="float-right">
					<i class="fas fa-angle-right" style="color:black"></i>
				</span>
				</a>
			</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-danger o-hidden h-100">
				<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-cog"></i>
				</div>
				<div class="mr-5">Pengaturan</div>
				</div>
				<a class="card-footer text-white clearfix small z-1" href="#">
				<span class="float-left" style="color:black">Lihat Detail</span>
				<span class="float-right">
					<i class="fas fa-angle-right" style="color:black"></i>
				</span>
				</a>
			</div>
			</div>
		</div>

		<!-- Area Chart Example-->
		<div class="card mb-3">
			<div class="card-header">
			<i class="fas fa-chart-area"></i>
			Pengunjung Yang datang</div>
			<div class="card-body">
			<canvas id="myAreaChart" width="100%" height="30"></canvas>
			</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>

		</div>
		<!-- /.container-fluid -->

		<!-- Sticky Footer -->


	</div>
	<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

    
</body>
</html>


        <!-- <div class="container-fluid"> -->

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800 font-weight-bold">Kasir Ku</h1><h6><P>(MODE PENGEMBANG)</P></h6>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary mb-1">Pendapatan (Bulan)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">IDR 40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary mb-1">Transaksi Hari Ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">50 Transaksi</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-handshake fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

						<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary mb-1">Jumlah Stok Barang</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">40 Stok</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-inbox fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
        <!-- </div> -->
<?php include 'footer.php';
?>


	<!-- Hak Cipta TECHNO ICE DEVELOPER -->

