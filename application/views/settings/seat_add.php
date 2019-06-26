<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item"><a href="<?=base_url()?>settings/seats">Seats / Divisions</a></li>
    <li class="breadcrumb-item active">Add Seat / Division</li>
</ol>

<form method="POST" action="<?=base_url()?>settings/seats">
    <div class="form-group row">
        <label for="seat" class="col-2 col-form-label">Seat / Division</label>
        <div class="col-10">
            <input class="form-control" type="text" value="" name="seat" id="seat" required>
        </div>
    </div>
    <div class="form-group row"> 
        <div class="col-12">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="id" value="<?php echo count($seats)+1; ?>">
            <input type="submit" class="btn btn-primary pull-right" value="Add New Seat">
        </div>
    </div>
</form>