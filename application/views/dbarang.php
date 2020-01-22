

<div class="modal" tabindex="-1" role="dialog" id="modal_insert">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form_">
        <form action="<?php echo base_url()?>/dbarang/insert_barang" method="post">
        <div class="row">
        <label>Kode Barang</label>
        <input type="text" class="form-control" name="kode_barang">
        <label>Nama Barang</label>
        <input type="text" class="form-control" name="n_barang">
        <label>Harga Barang</label>
        <input type="number" class="form-control" name="harga">
        <label>Kuantitas Barang</label>
        <input type="number" class="form-control" name="kuantitas">
        </div>
        <div class="row">
        <button type="submit" class="btn btn-success button_margin">Tambah</button>
        </div>
        </form>
            </div>
      </div>
      
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal_edit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form_">
        <form action="<?php echo base_url()?>/dbarang/insert_barang" method="post">
        <div class="row">
        <label>Kode Barang</label>
        <input type="text" class="form-control" name="kode_barang" id="kd_barang">
        <label>Nama Barang</label>
        <input type="text" class="form-control" name="n_barang" id="n_barang">
        <label>Harga Barang</label>
        <input type="number" class="form-control" name="harga" id="harga">
        <label>Kuantitas Barang</label>
        <input type="number" class="form-control" name="kuantitas" id="kuantitas">
        </div>
        <div class="row">
        <button type="submit" class="btn btn-success button_margin">Tambah</button>
        </div>
        </form>
            </div>
      </div>
      
    </div>
  </div>
</div>

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
            <div class="row">
                <div class="col-sm-4">
			     <button class="btn btn-primary" data-toggle="modal" data-target="#modal_insert">Tambah</button>
                </div>
                
            </div>
                
                <table class="table" style="margin-top:20px;">
                <thead>
                <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $j = 1; foreach($barang as $data){?>
                <tr>
                    <td><?php echo $data->kd_barang;?></td>
                    <td><?php echo $data->n_barang;?></td>
                    <td><?php echo $data->kuantitas;?></td>
                        <td><button value="<?php echo $data->kd_barang;?>" class="btn btn-info edit_button">Edit</button> <a class="btn btn-danger" href="<?php echo base_url()?>/dbarang/delete_barang/<?php echo $data->kd_barang;?>">Delete</a></td>
                </tr>    
                    
                <?php } ?>
                </tbody>
                    
                </table>
                
			</div>  
            </div>
		</div>
		</div>
		<!-- /.container-fluid -->
		<!-- Sticky Footer -->
	</div>
	<!-- /.content-wrapper -->

</div>
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
<?php // include 'footer.php';
?>


	<!-- Hak Cipta TECHNO ICE DEVELOPER -->

