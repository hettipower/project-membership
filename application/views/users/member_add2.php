<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>users/members">Members</a></li>
    <li class="breadcrumb-item active">Add Member</li>
</ol>

<form method="POST" action="<?=base_url()?>users/members">
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
    <label for="town" class="col-2 col-form-label">Town</label>
    <div class="col-10">
      <select name="town" id="town" class="select2Single form-control" required disabled>
        <option value="">Select Town</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="asanaya" class="col-2 col-form-label">Asanaya</label>
    <div class="col-10">
      <input class="form-control" type="text" value="" name="asanaya" id="asanaya" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="contact_no" class="col-2 col-form-label">Contact Number</label>
    <div class="col-10">
      <input class="form-control" type="text" value="" name="contact_no" id="contact_no" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="school" class="col-2 col-form-label">School</label>
    <div class="col-10">
      <input class="form-control" type="text" value="" name="school" id="school" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="institute" class="col-2 col-form-label">Institute</label>
    <div class="col-10">
      <input class="form-control" type="text" value="" name="institute" id="institute" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="job" class="col-2 col-form-label">Job</label>
    <div class="col-10">
      <input class="form-control" type="text" value="" name="job" id="job" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="office" class="col-2 col-form-label">Office</label>
    <div class="col-10">
      <input class="form-control" type="text" value="" name="office" id="office" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="political_institute" class="col-2 col-form-label">Political Institute</label>
    <div class="col-10">
      <input class="form-control" type="text" value="" name="political_institute" id="political_institute" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="candidate" class="col-2 col-form-label">Candidate</label>
    <div class="col-10">
      <input class="form-control" type="text" value="" name="candidate" id="candidate" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="other" class="col-2 col-form-label">Interpersonal Human Skills</label>
    <div class="col-10">
      <textarea name="other" id="other" class="form-control"></textarea>
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

    $('#district').on('change', function () {
      var district = $(this).val();
      $('#town').html('').attr('disabled', 'disabled');
      $.ajax({
        url: '<?=base_url()?>Settings/get_cities_relatedto_district',
        type: 'POST',
        data: {
          district: district
        },
        dataType: 'json',
        success: function(results) {
          //console.log(results);
          if( results.status === true ){
            $('#town').html('<option value="">Select Town</option>');
            $.each(results.content, function (indexInArray, valueOfElement) { 
              //console.log(valueOfElement.citiy);
              $('#town').append('<option value="'+valueOfElement.citiy+'">'+valueOfElement.citiy+'</option>');
            });
            $('#town').removeAttr('disabled');
          }
        }
      });
    });


  });
</script>