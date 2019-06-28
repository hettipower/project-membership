<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>other/offices">Offices</a></li>
    <li class="breadcrumb-item active">Add Office</li>
</ol>

<form method="POST" action="<?=base_url()?>other/offices">
    <div class="form-group row">
        <label for="office" class="col-2 col-form-label">Office</label>
        <div class="col-10">
            <input class="form-control" type="text" value="" name="office" id="office" required>
        </div>
    </div>
    <div class="form-group row"> 
        <div class="col-12">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="id" value="<?php echo count($offices)+1; ?>">
            <input type="submit" class="btn btn-primary pull-right" value="Add New Office">
        </div>
    </div>
</form>