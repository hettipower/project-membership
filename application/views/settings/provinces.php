<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>


<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Settings</li>
    <li class="breadcrumb-item active">Provinces</li>
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
        <span>Provinces</span>
        <a href="<?=base_url()?>settings/provinces/add" class="btn btn-primary">Add New</a>
    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Province</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Province</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php foreach ($provinces as $province) { ?>
                    <tr>
                        <td><?=$province["id"]?></td>
                        <td><?= $province["province"]; ?></td>
                        <td>
                            <form method="POST" action="" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?=$province["id"]?>">
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form> 
                            <a href="<?=base_url()?>settings/provinces/edit/<?=$province["id"]?>" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div> 
</div>