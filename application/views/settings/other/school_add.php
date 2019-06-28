<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>other/schools">Schools</a></li>
    <li class="breadcrumb-item active">Add School</li>
</ol>

<form method="POST" action="<?=base_url()?>other/schools">
    <div class="form-group row">
        <label for="school" class="col-2 col-form-label">School</label>
        <div class="col-10">
            <input class="form-control" type="text" value="" name="school" id="school" required>
        </div>
    </div>
    <div class="form-group row"> 
        <div class="col-12">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="id" value="<?php echo count($schools)+1; ?>">
            <input type="submit" class="btn btn-primary pull-right" value="Add New School">
        </div>
    </div>
</form>