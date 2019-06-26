<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>settings/kottashaya">Divisional Secretariats</a></li>
    <li class="breadcrumb-item active">Add Divisional Secretariat</li>
</ol>

<form method="POST" action="<?=base_url()?>settings/kottashaya">
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
            <input type="text" name="divi_secretariat" id="divi_secretariat" class="form-control" value="" required>
        </div>
    </div>

    <div class="form-group row"> 
        <div class="col-12">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="id" value="<?php echo count($kottasha)+1; ?>">
            <input type="submit" class="btn btn-primary pull-right" value="Add New">
        </div>
    </div>
</form>
<script>
jQuery(document).ready(function($) {
    
    $('#province').on('change', function () {
        var province = $(this).val();
        $('#district').html('').attr('disabled', 'disabled');
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
                        $('#district').append('<option value="'+val.id+'">'+val.district+'</option>');
                    });
                    $('#district').removeAttr('disabled');
                }
            }
        });
    });

});
</script>