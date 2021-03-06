<div class="contaianer-fluid">
  <h1 class="h3 mb-4 text-grey-800"><?php echo $title;?></h1>
 

  <div class="row">
  <div class="col-lg-6">
 

    <?= $this->session->flashdata('pesan'); ?>

    <h5>Role : <?= $role['role'] ?></h5>


  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Menu</th>
      <th scope="col">Akses</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
   <?php foreach($menu as $m): ?>
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= $m['menu'] ?></td>
      <td>
      <div class="form-check">
          <input class="form-check-input" type="checkbox"
          <?= check_akses ($role['id'], $m['id']);?>
           data-role="<?= $role['id']; ?>"  data-menu="<?= $m['id']; ?>">
      </div>

      </td>
  
    </tr>
    <?php $i++; ?>
   <?php endforeach;?>
  </tbody>
</table>
  </div>
  </div>
</div>
