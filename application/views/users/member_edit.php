<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>users/members">Members</a></li>
    <li class="breadcrumb-item active">Edit Member</li>
</ol>

<?php if( $this->session->flashdata('success') ): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>
<?php if( $this->session->flashdata('error') ): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('error'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<form method="POST" action="">

  <div class="form-group row">
    <label for="username" class="col-2 col-form-label">Username</label>
    <div class="col-10">
      <input class="form-control" type="text" value="<?php echo $result->username; ?>" name="username" id="username" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="password" class="col-2 col-form-label">Password</label>
    <div class="col-10">
      <input class="form-control" type="password" value="" name="password" id="password" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="password_con" class="col-2 col-form-label">Confirm Password</label>
    <div class="col-10">
      <input class="form-control" type="password" value="" name="password_con" id="password_con" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="email" class="col-2 col-form-label">Email</label>
    <div class="col-10">
      <input class="form-control" type="email" value="<?php echo $result->email; ?>" name="email" id="email" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="fname" class="col-2 col-form-label">Full Name</label>
    <div class="col-10">
      <input class="form-control" type="text" value="<?php echo $result->name; ?>" name="fname" id="fname" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="address" class="col-2 col-form-label">Address</label>
    <div class="col-10">
      <textarea name="address" id="address" class="form-control" required><?php echo $result->address; ?></textarea>
    </div>
  </div>

  <div class="form-group row">
    <label for="contact_no" class="col-2 col-form-label">Contact Number</label>
    <div class="col-10">
      <input class="form-control" type="text" value="<?php echo $result->contact_no; ?>" name="contact_no" id="contact_no" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="nic" class="col-2 col-form-label">NIC</label>
    <div class="col-10">
      <input class="form-control" type="text" value="<?php echo $result->nic; ?>" name="nic" id="nic" required>
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
          <option value="<?= $province['id']; ?>"><?= $province['province']; ?></option>
        <?php endforeach; endif; ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="district" class="col-2 col-form-label">District</label>
    <div class="col-10">
      <select name="district" id="district" class="select2Single form-control" required disabled>
        <option value="">Select District</option>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="divi_secretariat" class="col-2 col-form-label">Divisional Secretariat</label>
    <div class="col-10">
      <select name="divi_secretariat" id="divi_secretariat" class="select2Single form-control" required disabled>
        <option value="">Select Divisional Secretariat</option>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="divition" class="col-2 col-form-label">GN Division</label>
    <div class="col-10">
      <select name="divition" id="divition" class="select2Single form-control" required disabled>
        <option value="">Select GN Division</option>
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
    <label for="seat" class="col-2 col-form-label">Seat / Division</label>
    <div class="col-10">
      <select name="seat" id="seat" class="select2Single form-control" required>
        <option value="">Seat / Division</option>
        <?php 
          if( is_array($seats) && !empty(seats) ):
            foreach( $seats as $seat ):
              $selected = ( $result->asanaya == $seat['id'] ) ? 'selected' : '' ;
        ?>
          <option value="<?= $seat['id']; ?>" <?= $selected; ?>><?= $seat['name']; ?></option>
        <?php endforeach; endif; ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="school" class="col-2 col-form-label">School</label>
    <div class="col-10">
      <select name="school" id="school" class="select2Single form-control" required>
        <option value="">School</option>
        <?php 
          if( is_array($schools) && !empty(schools) ):
            foreach( $schools as $school ):
              $selected = ( $result->school == $school['id'] ) ? 'selected' : '' ;
        ?>
          <option value="<?= $school['id']; ?>" <?= $selected; ?>><?= $school['name']; ?></option>
        <?php endforeach; endif; ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="institute" class="col-2 col-form-label">Institute</label>
    <div class="col-10">
      <select name="institute" id="institute" class="select2Single form-control" required>
        <option value="">Institute</option>
        <?php 
          if( is_array($institutes) && !empty(institutes) ):
            foreach( $institutes as $institute ):
              $selected = ( $result->institute == $institute['id'] ) ? 'selected' : '' ;
        ?>
          <option value="<?= $institute['id']; ?>" <?= $selected; ?>><?= $institute['name']; ?></option>
        <?php endforeach; endif; ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="job" class="col-2 col-form-label">Job</label>
    <div class="col-10">
      <select name="job" id="job" class="select2Single form-control" required>
        <option value="">Job</option>
        <?php 
          if( is_array($jobs) && !empty(jobs) ):
            foreach( $jobs as $job ):
              $selected = ( $result->job == $job['id'] ) ? 'selected' : '' ;
        ?>
          <option value="<?= $job['id']; ?>" <?= $selected; ?>><?= $job['name']; ?></option>
        <?php endforeach; endif; ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="office" class="col-2 col-form-label">Office</label>
    <div class="col-10">
      <select name="office" id="office" class="select2Single form-control" required>
        <option value="">Office</option>
        <?php 
          if( is_array($offices) && !empty(offices) ):
            foreach( $offices as $office ):
              $selected = ( $result->office == $office['id'] ) ? 'selected' : '' ;
        ?>
          <option value="<?= $office['id']; ?>" <?= $selected; ?>><?= $office['name']; ?></option>
        <?php endforeach; endif; ?>
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="political_institute" class="col-2 col-form-label">Political Institute</label>
    <div class="col-10">
      <input class="form-control" type="text" value="<?php echo $result->political_institute; ?>" name="political_institute" id="political_institute" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="candidate" class="col-2 col-form-label">Candidate</label>
    <div class="col-10">
      <input class="form-control" type="text" value="<?php echo $result->candidate; ?>" name="candidate" id="candidate" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="other" class="col-2 col-form-label">Interpersonal Human Skills</label>
    <div class="col-10">
      <textarea name="other" id="other" class="form-control"><?php echo $result->other; ?></textarea>
    </div>
  </div>

  <div class="form-group row">
    <label for="admin_group" class="col-2 col-form-label">Admin Group</label>
    <div class="col-10">
      <select class="form-control" name="admin_group" id="admin_group" required>
        <?php
          foreach ($admin_groups as $v) {
            $selected = ( $result->admin_group == $v['id'] ) ? 'selected' : '' ;
            echo "<option value='".$v["id"]."' ".$selected.">".$v["name"]."</option>";
          } 
        ?>
      </select>
    </div>
  </div>

  <div class="form-group row"> 
    <div class="col-12">
      <input type="hidden" name="action" value="add">
      <input type="hidden" name="id" value="<?php echo $result->id; ?>">
      <input type="submit" class="btn btn-primary pull-right" value="Add Member">
    </div>
  </div>

</form>
<script>
jQuery(document).ready(function($) {

  $( window ).on('load',function() {
      var province = '<?php echo $result->province; ?>';
      var selectedDistrict = '<?php echo $result->district; ?>';
      var selectedSecretariat = '<?php echo $result->kottashaya; ?>';
      var selectedDivition = '<?php echo $result->wasama; ?>';
      var selectedTown = '<?php echo $result->town; ?>';

      $.ajax({
          url: '<?=base_url()?>Settings/get_district_relatedto_province',
          type: 'POST',
          data: {
              province: province
          },
          dataType: 'json',
          success: function(results) {
              //console.log(results);
              if( results.status === true ){
                  $('#district').html('<option value="">Select District</option>');
                  $.each(results.content, function (index, val) {
                      if( val.id == selectedDistrict ){
                          $('#district').append('<option value="'+val.id+'" selected>'+val.district+'</option>');
                      }else{
                          $('#district').append('<option value="'+val.id+'">'+val.district+'</option>');
                      }
                  });
                  $('#district').removeAttr('disabled');
              }
          }
      });

      $.ajax({
          url: '<?=base_url()?>Settings/get_kottasha_relatedto_province_and_district',
          type: 'POST',
          data: {
              province: province,
              district: selectedDistrict
          },
          dataType: 'json',
          success: function(results) {
              //console.log(results);
              if( results.status === true ){
                  $('#divi_secretariat').html('<option value="">Select Divisional Secretariat</option>');
                  $.each(results.content, function (index, val) { 
                      if( val.id == selectedSecretariat ){
                          $('#divi_secretariat').append('<option value="'+val.id+'" selected>'+val.name+'</option>');
                      }else{
                          $('#divi_secretariat').append('<option value="'+val.id+'">'+val.name+'</option>');
                      }
                  });
                  $('#divi_secretariat').removeAttr('disabled');
              }
          }
      });

      $.ajax({
          url: '<?=base_url()?>Settings/get_divition_relatedto_province_district_and_kottasha',
          type: 'POST',
          data: {
              province: province,
              district: selectedDistrict,
              kottasha: selectedSecretariat
          },
          dataType: 'json',
          success: function(results) {
              console.log(results);
              if( results.status === true ){
                  $('#divition').html('<option value="">Select GN Division</option>');
                  $.each(results.content, function (index, val) { 
                      if( val.id == selectedDivition ){
                          $('#divition').append('<option value="'+val.id+'" selected>'+val.name+'</option>');
                      }else{
                          $('#divition').append('<option value="'+val.id+'">'+val.name+'</option>');
                      }
                  });
                  $('#divition').removeAttr('disabled');
              }
          }
      });

      $.ajax({
          url: '<?=base_url()?>Users/get_towns_relatedto_divition',
          type: 'POST',
          data: {
              province: province,
              district: selectedDistrict,
              kottasha: selectedSecretariat, 
              divition: selectedDivition
          },
          dataType: 'json',
          success: function(results) {
              console.log(results);
              if( results.status === true ){
                  $.each(results.content, function (index, val) { 
                    if( val.id == selectedTown ){
                      $('#town').append('<option value="'+val.id+'" selected>'+val.name+'</option>');
                    }else{
                      $('#town').append('<option value="'+val.id+'">'+val.name+'</option>');
                    }
                  });
                  $('#town').removeAttr('disabled');
              }
          }
      });

  });
  
  $('#province').on('change', function () {
      var province = $(this).val();
      $('#district').html('<option value="">Select District</option>').attr('disabled', 'disabled');
      $('#divi_secretariat').html('<option value="">Select Divisional Secretariat</option>').attr('disabled', 'disabled');
      $('#divition').html('<option value="">Select GN Division</option>').attr('disabled', 'disabled');
      $('#town').html('<option value="">Select Town</option>').attr('disabled', 'disabled');
      $.ajax({
          url: '<?=base_url()?>Settings/get_district_relatedto_province',
          type: 'POST',
          data: {
              province: province
          },
          dataType: 'json',
          success: function(results) {
              //console.log(results);
              if( results.status === true ){
                  $.each(results.content, function (index, val) { 
                      $('#district').append('<option value="'+val.id+'">'+val.district+'</option>');
                  });
                  $('#district').removeAttr('disabled');
              }
          }
      });
  });

  $('#district').on('change', function () {
      var province = $('#province').val();
      var district = $('#district').val();
      $('#divi_secretariat').html('<option value="">Select Divisional Secretariat</option>').attr('disabled', 'disabled');
      $('#divition').html('<option value="">Select GN Division</option>').attr('disabled', 'disabled');
      $('#town').html('<option value="">Select Town</option>').attr('disabled', 'disabled');
      $.ajax({
          url: '<?=base_url()?>Settings/get_kottasha_relatedto_province_and_district',
          type: 'POST',
          data: {
              province: province,
              district: district
          },
          dataType: 'json',
          success: function(results) {
              //console.log(results);
              if( results.status === true ){
                  $.each(results.content, function (index, val) { 
                      $('#divi_secretariat').append('<option value="'+val.id+'">'+val.name+'</option>');
                  });
                  $('#divi_secretariat').removeAttr('disabled');
              }
          }
      });      
  });

  $('#divi_secretariat').on('change', function () {
      var province = $('#province').val();
      var district = $('#district').val();
      var kottasha = $('#divi_secretariat').val();
      $('#divition').html('<option value="">Select GN Division</option>').attr('disabled', 'disabled');
      $('#town').html('<option value="">Select Town</option>').attr('disabled', 'disabled');
      $.ajax({
          url: '<?=base_url()?>Settings/get_divition_relatedto_province_district_and_kottasha',
          type: 'POST',
          data: {
              province: province,
              district: district,
              kottasha: kottasha
          },
          dataType: 'json',
          success: function(results) {
              //console.log(results);
              if( results.status === true ){
                  $.each(results.content, function (index, val) { 
                      $('#divition').append('<option value="'+val.id+'">'+val.name+'</option>');
                  });
                  $('#divition').removeAttr('disabled');
              }
          }
      });      
  });

  $('#divition').on('change', function () {
      var province = $('#province').val();
      var district = $('#district').val();
      var kottasha = $('#divi_secretariat').val();
      var divition = $('#divition').val();
      $('#town').html('<option value="">Select Town</option>').attr('disabled', 'disabled');
      $.ajax({
          url: '<?=base_url()?>Users/get_towns_relatedto_divition',
          type: 'POST',
          data: {
              province: province,
              district: district,
              kottasha: kottasha, 
              divition: divition
          },
          dataType: 'json',
          success: function(results) {
              console.log(results);
              if( results.status === true ){
                  $.each(results.content, function (index, val) { 
                      $('#town').append('<option value="'+val.id+'">'+val.name+'</option>');
                  });
                  $('#town').removeAttr('disabled');
              }
          }
      });      
  });

});
</script>