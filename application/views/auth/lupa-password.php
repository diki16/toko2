<div class="container">
  <title>Login</title>
  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Apakah Kamu lupa password?</h1>
                </div>

                <?php echo $this->session->flashdata('pesan') ?>

                <form class="user" method="post" action="<?php echo base_url('auth/lupapassword'); ?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" placeholder="Masukin Alamat Email..." name="email" value="<?php echo set_value('email'); ?>">
                    <?php echo form_error('email',  '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Reset Password
                  </button>

                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="<?php echo base_url('auth'); ?>">Kembali Ke Login!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>