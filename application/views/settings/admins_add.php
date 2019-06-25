<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>settings/admins">Members</a></li>
    <li class="breadcrumb-item active">Add Member</li>
</ol>

<?php
  //print_r($admin_groups);
  print_r($provinces);
?>

<form method="POST" action="<?=base_url()?>settings/admins">
  <input type="hidden" name="action" value="add">
  <div class="form-group row">
    <label for="username" class="col-2 col-form-label">Username</label>
    <div class="col-10">
      <input class="form-control" type="text" value="" name="username" id="username" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-2 col-form-label">Password</label>
    <div class="col-10">
      <input class="form-control" type="password" value="" name="password" id="password" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="password2" class="col-2 col-form-label">Password Verify</label>
    <div class="col-10">
      <input class="form-control" type="password" value="" name="password2" id="password2" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-2 col-form-label">Email</label>
    <div class="col-10">
      <input class="form-control" type="email" value="" name="email" id="email" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="fname" class="col-2 col-form-label">Full Name</label>
    <div class="col-10">
      <input class="form-control" type="text" value="" name="fname" id="fname" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="address" class="col-2 col-form-label">Address</label>
    <div class="col-10">
      <textarea name="address" id="address" class="form-control" required></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="nic" class="col-2 col-form-label">NIC</label>
    <div class="col-10">
      <input class="form-control" type="text" value="" name="nic" id="nic" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="province" class="col-2 col-form-label">Province</label>
    <div class="col-10">
      <select name="province" id="province" class="select2Single form-control" required>
        <option value="">Select Province</option>
        <?php 
          if( is_array($provinces) && !empty(provinces) ):
            foreach( $provinces as $province ):
        ?>
          <option value="<?= $province['province']; ?>"><?= $province['province']; ?></option>
        <?php endforeach; endif; ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="district" class="col-2 col-form-label">District</label>
    <div class="col-10">
      <select name="district" id="district" class="select2Single form-control" required>
        <option value="">Select District</option>
        <?php 
          if( is_array($districts) && !empty(districts) ):
            foreach( $districts as $district ):
        ?>
          <option value="<?= $district['district']; ?>"><?= $district['district']; ?></option>
        <?php endforeach; endif; ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="city" class="col-2 col-form-label">City</label>
    <div class="col-10">
      <select name="city" id="city" class="select2Single form-control" required>
        <option value="">Select District</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Admin Group</label>
    <div class="col-10">
      <select class="form-control" name="admin_group" required>
      <?php
      foreach ($admin_groups as $v) {
        echo "<option value='".$v["id"]."'>".$v["name"]."</option>";
      } ?>
      </select>
    </div>
  </div> 
  <div class="form-group row"> 
    <div class="col-10">
      <input type="submit" class="btn btn-primary">
    </div>
  </div>
</form>
<script>
  jQuery(document).ready(function($) {
    $('.select2Single').select2();
  });
</script>