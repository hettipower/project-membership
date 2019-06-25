<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>settings/provinces">Provinces</a></li>
    <li class="breadcrumb-item active">Add Province</li>
</ol>

<form method="POST" action="<?=base_url()?>settings/provinces">
    <div class="form-group row">
        <label for="province" class="col-2 col-form-label">Province</label>
        <div class="col-10">
            <input class="form-control" type="text" value="" name="province" id="province" required>
        </div>
    </div>
    <div class="form-group row"> 
        <div class="col-12">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="id" value="<?php echo count($provinces)+1; ?>">
            <input type="submit" class="btn btn-primary pull-right" value="Add New Province">
        </div>
    </div>
</form>