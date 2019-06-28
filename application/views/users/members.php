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
                        <th>Divisional Secretariat</th>
                        <th>GN Divisions</th>
                        <th>Town</th>
                        <th>Seats/Divisions</th>
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
                        <th>Divisional Secretariat</th>
                        <th>GN Divisions</th>
                        <th>Town</th>
                        <th>Seats/Divisions</th>
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
                <?php 
                    foreach ($admins as $v) {
                        $fname = ( isset($v["name"]) && !empty($v["name"]) ) ? $v["name"] : '-' ;
                        $username = ( isset($v["username"]) && !empty($v["username"]) ) ? $v["username"] : '-' ;
                        $email = ( isset($v["email"]) && !empty($v["email"]) ) ? $v["email"] : '-' ;
                        $nic = ( isset($v["nic"]) && !empty($v["nic"]) ) ? $v["nic"] : '-' ;
                        $address = ( isset($v["address"]) && !empty($v["address"]) ) ? $v["address"] : '-' ;
                        $provinceDB = ( isset($v["province"]) && !empty($v["province"]) ) ? $v["province"] : '-' ;
                        $districtDB = ( isset($v["district"]) && !empty($v["district"]) ) ? $v["district"] : '-' ;
                        $kottashayaDB = ( isset($v["kottashaya"]) && !empty($v["kottashaya"]) ) ? $v["kottashaya"] : '-' ;
                        $wasama = ( isset($v["wasama"]) && !empty($v["wasama"]) ) ? $v["wasama"] : '-' ;
                        $townDB = ( isset($v["town"]) && !empty($v["town"]) ) ? $v["town"] : '-' ;
                        $asanaya = ( isset($v["asanaya"]) && !empty($v["asanaya"]) ) ? $v["asanaya"] : '-' ;
                        $contact_no = ( isset($v["contact_no"]) && !empty($v["contact_no"]) ) ? $v["contact_no"] : '-' ;
                        $schoolDB = ( isset($v["school"]) && !empty($v["school"]) ) ? $v["school"] : '-' ;
                        $instituteDB = ( isset($v["institute"]) && !empty($v["institute"]) ) ? $v["institute"] : '-' ;
                        $jobDB = ( isset($v["job"]) && !empty($v["job"]) ) ? $v["job"] : '-' ;
                        $officeDB = ( isset($v["office"]) && !empty($v["office"]) ) ? $v["office"] : '-' ;
                        $political_institute = ( isset($v["political_institute"]) && !empty($v["political_institute"]) ) ? $v["political_institute"] : '-' ;
                        $candidate = ( isset($v["candidate"]) && !empty($v["candidate"]) ) ? $v["candidate"] : '-' ;
                        $other = ( isset($v["other"]) && !empty($v["other"]) ) ? $v["other"] : '-' ;
                ?>
                    <tr>
                        <td><?=$v["id"]?></td>
                        <td><?= ( isset($v["name"]) && !empty($v["name"]) ) ? $v["name"] : '-' ; ?></td>
                        <td><?= ( isset($v["username"]) && !empty($v["username"]) ) ? $v["username"] : '-' ; ?></td>
                        <td><?= ( isset($v["email"]) && !empty($v["email"]) ) ? $v["email"] : '-' ; ?></td>
                        <td><?= ( isset($v["nic"]) && !empty($v["nic"]) ) ? $v["nic"] : '-' ; ?></td>
                        <td><?= ( isset($v["address"]) && !empty($v["address"]) ) ? $v["address"] : '-' ; ?></td>
                        <td>
                            <?php 
                                foreach ($provinces as $province) {
                                    if( $provinceDB == $province['id'] ){
                                        echo $province['province'];
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                foreach ($districts as $district) {
                                    if( $districtDB == $district['id'] ){
                                        echo $district['district'];
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                foreach ($kottasha as $kottashaya) {
                                    if( $kottashayaDB == $kottashaya['id'] ){
                                        echo $kottashaya['name'];
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                foreach ($gn_divisions as $division) {
                                    if( $wasama == $division['id'] ){
                                        echo $division['name'];
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                foreach ($towns as $town) {
                                    if( $townDB == $town['id'] ){
                                        echo $town['name'];
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                foreach ($seats as $seat) {
                                    if( $asanaya == $seat['id'] ){
                                        echo $seat['name'];
                                    }
                                }
                            ?>
                        </td>
                        <td><?= ( isset($v["contact_no"]) && !empty($v["contact_no"]) ) ? $v["contact_no"] : '-' ; ?></td>
                        <td>
                            <?php 
                                foreach ($schools as $school) {
                                    if( $schoolDB == $school['id'] ){
                                        echo $school['name'];
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                foreach ($institutes as $institute) {
                                    if( $instituteDB == $institute['id'] ){
                                        echo $institute['name'];
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                foreach ($jobs as $job) {
                                    if( $jobDB == $job['id'] ){
                                        echo $job['name'];
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                foreach ($offices as $office) {
                                    if( $officeDB == $office['id'] ){
                                        echo $office['name'];
                                    }
                                }
                            ?>
                        </td>
                        <td><?= ( isset($v["political_institute"]) && !empty($v["political_institute"]) ) ? $v["political_institute"] : '-' ; ?></td>
                        <td><?= ( isset($v["candidate"]) && !empty($v["candidate"]) ) ? $v["candidate"] : '-' ; ?></td>
                        <td><?= ( isset($v["other"]) && !empty($v["other"]) ) ? $v["other"] : '-' ; ?></td>
                        <td>
                            <form method="POST" action="" style="display:inline-block;margin-bottom:5px;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?=$v["id"]?>">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                            <a href="<?=base_url()?>users/members/edit/<?=$v["id"]?>" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div> 
</div>