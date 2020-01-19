<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      </div>
      <!--Akhir Main Content -->
    
      <!-- Footer-->
      <footer class="sticky-footer bg-primary"> <!--menggunakan warna biru(primary) sebagai latar background footer-->
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span style="color:white">Copyright &copy; Techno Ice <?php echo date('Y')?></span> <!--menggunakan warna putih untuk text-->
          </div>
        </div>
      </footer>
      <!--Akhir Footer -->



  <!-- Link Untuk Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Link Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!--Link Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>/assets/js/sb-admin-2.min.js"></script>

  <script>
    $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });



    $('.form-check-input').on('click', function() {
      const menuId = $(this).data('menu');
      const roleId = $(this).data('role');

      $.ajax({
        url: "<?= base_url('HalamanUtama/changeaccess'); ?>",
        type: 'post',
        data: {
          menuId: menuId,
          roleId: roleId
        },
        success: function(){
          document.location.href = "<?= base_url('HalamanUtama/roleaccess/'); ?>" + roleId;
        }
      });
    });
  </script>  

</body>

</html>
