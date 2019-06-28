<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>users/groups">Admin Groups</a></li>
    <li class="breadcrumb-item active">Add Group</li>
</ol>

<form method="POST" action="<?=base_url()?>users/groups">
    
    <div class="form-group row">
      <label for="group_name" class="col-2 col-form-label">Group Name</label>
      <div class="col-10">
        <input class="form-control" type="text" value="" placeholder="" name="group_name" id="group_name">
      </div>
    </div>
    
    <div class="form-group row"> 
      <div class="col-12">
        <input type="hidden" name="action" value="add"> 
        <input type="hidden" name="id" value="<?php echo count($groups)+1; ?>">
        <input type="submit" class="btn btn-primary pull-right" value="Add Group">
      </div>
    </div> 

</form>
