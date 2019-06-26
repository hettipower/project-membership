<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item active">Members</li>
</ol>

<!-- Example Tables Card -->
<div class="card mb-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fa fa-users"></i> Members</span>
        <a href="<?=base_url()?>users/members/add" class="btn btn-primary">Add New</a>
    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>NIC</th>
                        <th>Address</th>
                        <th>Province</th>
                        <th>District</th>
                        <th>Town</th>
                        <th>Asanaya</th>
                        <th>Contact No</th>
                        <th>School</th>
                        <th>Institute</th>
                        <th>Job</th>
                        <th>Office</th>
                        <th>Political Institute</th>
                        <th>Candidate</th>
                        <th>Other</th>
                        <th>Action</th> 
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>NIC</th>
                        <th>Address</th>
                        <th>Province</th>
                        <th>District</th>
                        <th>Town</th>
                        <th>Asanaya</th>
                        <th>Contact No</th>
                        <th>School</th>
                        <th>Institute</th>
                        <th>Job</th>
                        <th>Office</th>
                        <th>Political Institute</th>
                        <th>Candidate</th>
                        <th>Other</th>
                        <th>Action</th> 
                    </tr>
                </tfoot>
                <tbody>
                <?php foreach ($admins as $v) { ?>
                    <tr>
                        <td><?=$v["id"]?></td>
                        <td><?= ( isset($v["name"]) && !empty($v["name"]) ) ? $v["name"] : '-' ; ?></td>
                        <td><?= ( isset($v["username"]) && !empty($v["username"]) ) ? $v["username"] : '-' ; ?></td>
                        <td><?= ( isset($v["email"]) && !empty($v["email"]) ) ? $v["email"] : '-' ; ?></td>
                        <td><?= ( isset($v["nic"]) && !empty($v["nic"]) ) ? $v["nic"] : '-' ; ?></td>
                        <td><?= ( isset($v["address"]) && !empty($v["address"]) ) ? $v["address"] : '-' ; ?></td>
                        <td><?= ( isset($v["province"]) && !empty($v["province"]) ) ? $v["province"] : '-' ; ?></td>
                        <td><?= ( isset($v["district"]) && !empty($v["district"]) ) ? $v["district"] : '-' ; ?></td>
                        <td><?= ( isset($v["town"]) && !empty($v["town"]) ) ? $v["town"] : '-' ; ?></td>
                        <td><?= ( isset($v["asanaya"]) && !empty($v["asanaya"]) ) ? $v["asanaya"] : '-' ; ?></td>
                        <td><?= ( isset($v["contact_no"]) && !empty($v["contact_no"]) ) ? $v["contact_no"] : '-' ; ?></td>
                        <td><?= ( isset($v["school"]) && !empty($v["school"]) ) ? $v["school"] : '-' ; ?></td>
                        <td><?= ( isset($v["institute"]) && !empty($v["institute"]) ) ? $v["institute"] : '-' ; ?></td>
                        <td><?= ( isset($v["job"]) && !empty($v["job"]) ) ? $v["job"] : '-' ; ?></td>
                        <td><?= ( isset($v["office"]) && !empty($v["office"]) ) ? $v["office"] : '-' ; ?></td>
                        <td><?= ( isset($v["political_institute"]) && !empty($v["political_institute"]) ) ? $v["political_institute"] : '-' ; ?></td>
                        <td><?= ( isset($v["candidate"]) && !empty($v["candidate"]) ) ? $v["candidate"] : '-' ; ?></td>
                        <td><?= ( isset($v["other"]) && !empty($v["other"]) ) ? $v["other"] : '-' ; ?></td>
                        <td>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?=$v["id"]?>">
                                <input type="submit" class="btn btn-primary" value="Delete">
                            </form>
                            <a href="<?=base_url()?>users/members/edit/<?=$v["id"]?>" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div> 
</div>