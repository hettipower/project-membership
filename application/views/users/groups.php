<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>

<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item active">Groups</li>
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
 

<!-- Example Tables Card -->
<div class="card mb-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        Admin Groups <a href="<?=base_url()?>users/groups/add" class="btn btn-primary">Add New</a>
    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th> 
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th> 
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php foreach ($groups as $v) { ?>
                    <tr>
                        <td><?=$v["id"]?></td>
                        <td><?=$v["name"]?></td> 
                        <td>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?=$v["id"]?>">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                            <a href="<?=base_url()?>users/groups/edit/<?=$v["id"]?>" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div> 
</div>