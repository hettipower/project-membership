<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$result = $result[0];
?>
<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>settings/districts">Districts</a></li>
    <li class="breadcrumb-item active">Edit District</li>
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
        <label for="province" class="col-2 col-form-label">Province</label>
        <div class="col-10">
            <select name="province" id="province" class="select2Single form-control" required>
                <option value="">Select Province</option>
                <?php 
                if( is_array($provinces) && !empty(provinces) ):
                    foreach( $provinces as $province ):
                        $selected = ($result['province'] == $province['id'] ) ? 'selected' : '' ;
                ?>
                <option value="<?= $province['id']; ?>" <?php echo $selected; ?>><?= $province['province']; ?></option>
                <?php endforeach; endif; ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="district" class="col-2 col-form-label">District</label>
        <div class="col-10">
            <input type="text" name="district" id="district" class="form-control" value="<?=$result["district"]?>" required>
        </div>
    </div>

    <div class="form-group row"> 
        <div class="col-12">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?=$result["id"]?>">
            <input type="submit" value="Save" class="btn btn-primary pull-right" value="Edit District">
        </div>
    </div> 

</form>