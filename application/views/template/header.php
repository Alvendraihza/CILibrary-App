<html>
<head>
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.css">
    <title>CI Library</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand px-2" href="<?=site_url();?>">CI Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item px-1 pt-1"><a class="nav-link" href="<?=site_url();?>">Home</a></li>

                    <?php if ( $this->session->userdata('username') ) : ?>
                    <li class="nav-item pt-1"><a class="nav-link" href="<?=site_url();?>buku">Buku</a></li>
                    <li class="nav-item pt-1"><a class="nav-link" href="<?=site_url();?>pelanggan">Pelanggan</a></li>
                    <li class="nav-item pt-1"><a class="nav-link" href="<?=site_url();?>sewa">Sewa</a></li>
                    <?php if ($this->session->userdata('role')=='admin') : ?>
                    <li class="nav-item dropdown pt-1">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Data User</a>
                        <div class="dropdown-menu text-center">
                            <a class="dropdown-item" href="<?=site_url()?>users">Users</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?=site_url();?>userroles">User Role</a>
                        </div>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>

                        
                    <?php if ($this->session->userdata('role')=='write' || $this->session->userdata('role')=='admin') : ?>
                    <li class="nav-item dropdown pt-1">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tambah Data</a>
                        <div class="dropdown-menu text-center">
                            <a class="dropdown-item" href="<?=site_url()?>buku/create">Buku</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url(); ?>pelanggan/create">Pelanggan</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url(); ?>sewa/create">Sewa Buku</a>
                            <?php if ($this->session->userdata('role')=='admin') : ?>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url(); ?>users/create">Users</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url(); ?>userroles/create">User Role</a>
                            <?php endif; ?>
                        </div>
                    </li>
                        <?php endif; ?>
                    
                </ul>
                <div class="d-flex">
                <?php if($this->session->userdata('username')) : ?>
                    <div class="text-white mt-2 me-2"><?=$this->session->userdata('email')?></div>
                    <a class="btn btn-danger my-2 mx-2 my-sm-0" href="<?=site_url()?>login/logout">Logout</a>
                <?php else : ?>
                    <a class="btn btn-success my-2 mx-2 my-sm-0" href="<?=site_url()?>login">Login</a>
                <?php endif ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- // Exception / Flash Messages -->
        <div id="flash_messages" >
            <?php if($this->session->flashdata('success')) : ?>
                <div style="margin: 1em; padding: 1em;" class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?=$this->session->flashdata('success'); ?>
                </div>
            <?php endif?>
            <?php if($this->session->flashdata('error'))   : ?>
                <div style="margin: 1em; padding: 1em;" class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?=$this->session->flashdata('error'); ?>
                </div>
            <?php endif?>
            <?php if($this->session->flashdata('warning')) : ?>
                <div style="margin: 1em; padding: 1em;" class="alert alert-dismissible alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?=$this->session->flashdata('warning'); ?>
                </div>
            <?php endif?>
            <?php if($this->session->flashdata('info'))    : ?>
                <div style="margin: 1em; padding: 1em;" class="alert alert-dismissible alert-secondary">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?=$this->session->flashdata('info'); ?>
                </div>
            <?php endif?>
        </div>

        <!-- Form Validation Error Message  -->
        <?php if(!empty(validation_errors())) : ?>
        <div style="margin: 1em; padding: 1em;" id="validation_message" class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?=validation_errors(); ?>
        </div>
        <?php endif ?>