<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Membership Project</title>

    <!-- core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?=base_url()?>resources/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="<?=base_url()?>resources/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>resources/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?=base_url()?>">Admin Panel</a>
        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="sidebar-nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=base_url()?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#settings"><i class="fa fa-fw fa-wrench"></i> Settings</a>
                    <ul class="sidebar-second-level collapse" id="settings">
                        <li><a href="<?=base_url()?>settings/provinces">Provinces</a></li>
                        <li><a href="<?=base_url()?>settings/districts">Districts</a></li>
                        <li><a href="<?=base_url()?>settings/kottashaya">Divisional Secretariats</a></li>
                        <li><a href="<?=base_url()?>settings/gn_division">GN Divisions</a></li>
                        <li><a href="<?=base_url()?>settings/towns">Towns</a></li>
                        <li><a href="<?=base_url()?>settings/seats">Seats / Divisions</a></li>
                        <li><a href="<?=base_url()?>other/schools">Schools</a></li>
                        <li><a href="<?=base_url()?>other/institutes">Institutes</a></li>
                        <li><a href="<?=base_url()?>other/jobs">Jobs</a></li>
                        <li><a href="<?=base_url()?>other/offices">Offices</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#members"><i class="fa fa-fw fa-wrench"></i> Members</a>
                    <ul class="sidebar-second-level collapse" id="members">
                        <li><a href="<?=base_url()?>users/members">Members</a></li>
                        <li><a href="<?=base_url()?>users/groups">Member Groups</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>logout"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content-wrapper py-3">

        <div class="container-fluid">

        