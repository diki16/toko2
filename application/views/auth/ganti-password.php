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
                  <h1 class="h4 text-gray-900 mb-4">Ganti Password untuk </h1>
                  <h5><?= $this->session->userdata('email') ?></h5>
                </div>

                <?php echo $this->session->flashdata('pesan') ?>

                <form class="user" method="post" action="<?php echo base_url('auth/changepassword'); ?>">
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Masukin Password Baru" name="password1" ; ?>
                    <?php echo form_error('password1',  '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Ulangi Password Baru" name="password2" ; ?>
                    <?php echo form_error('password2',  '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Ganti
                  </button>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>