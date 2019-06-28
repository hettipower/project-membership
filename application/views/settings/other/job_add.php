<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>other/jobs">Jobs</a></li>
    <li class="breadcrumb-item active">Add Job</li>
</ol>

<form method="POST" action="<?=base_url()?>other/jobs">
    <div class="form-group row">
        <label for="job" class="col-2 col-form-label">Job</label>
        <div class="col-10">
            <input class="form-control" type="text" value="" name="job" id="job" required>
        </div>
    </div>
    <div class="form-group row"> 
        <div class="col-12">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="id" value="<?php echo count($jobs)+1; ?>">
            <input type="submit" class="btn btn-primary pull-right" value="Add New Office">
        </div>
    </div>
</form>