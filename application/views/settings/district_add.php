<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>settings/districts">Districts</a></li>
    <li class="breadcrumb-item active">Add District</li>
</ol>

<form method="POST" action="<?=base_url()?>settings/districts">
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
            <input type="text" name="district" id="district" class="form-control" required>
        </div>
    </div>
    <div class="form-group row"> 
        <div class="col-12">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="id" value="<?php echo count($districts)+1; ?>">
            <input type="submit" class="btn btn-primary pull-right" value="Add New District">
        </div>
    </div>
</form>