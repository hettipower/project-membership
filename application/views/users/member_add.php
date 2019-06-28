<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>users/members">Members</a></li>
    <li class="breadcrumb-item active">Add Member</li>
</ol>

<form method="POST" action="<?=base_url()?>users/members">

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
        ?>
          <option value="<?= $seat['id']; ?>"><?= $seat['name']; ?></option>
        <?php endforeach; endif; ?>
      </select>
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
      <select name="school" id="school" class="select2Single form-control" required>
        <option value="">School</option>
        <?php 
          if( is_array($schools) && !empty(schools) ):
            foreach( $schools as $school ):
        ?>
          <option value="<?= $school['id']; ?>"><?= $school['name']; ?></option>
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
        ?>
          <option value="<?= $institute['id']; ?>"><?= $institute['name']; ?></option>
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
        ?>
          <option value="<?= $job['id']; ?>"><?= $job['name']; ?></option>
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
        ?>
          <option value="<?= $office['id']; ?>"><?= $office['name']; ?></option>
        <?php endforeach; endif; ?>
      </select>
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
          } 
        ?>
      </select>
    </div>
  </div>

  <div class="form-group row"> 
    <div class="col-12">
      <input type="hidden" name="action" value="add">
      <input type="submit" class="btn btn-primary pull-right" value="Add Member">
    </div>
  </div>

</form>
<script>
jQuery(document).ready(function($) {
    
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
            url: '<?=base_url()?>Settings/get_divition_relatedto_province_district_and_kottasha',
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