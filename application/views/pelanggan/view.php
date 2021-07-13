<br>
<div class="h2 mb-4" style="max-width: 30rem;"><?php echo $title; ?></div>
<hr>
<ol class="breadcrumb">
	<li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item" wfd-id="245"><a href="<?=site_url();?>pelanggan" class="text-decoration-none">Daftar Pelanggan</a></li>
	<li class="breadcrumb-item active" wfd-id="244">Informasi Pelanggan</li>
</ol>
<br>
        
        <center><div class="card border-info mb-3" style="max-width: 30rem;">
            <div class="card-header h3">
                <a href="<?=site_url("/pelanggan/");?>" class="btn btn-dark btn-block">&lt;</a>
                <span class="text-center"><?=$data->nama?></span>
            </div>

            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between"><em>Kode Pelanggan:</em>          <span><?=$data->kodepel ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Alamat:</em>           <span><?=$data->alamat ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Telepon:</em>     <span><?=$data->telp ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Jenis Kelamin:</em>               <span><?=$data->jk ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Email:</em>               <span><?=$data->email ?></span></li>
                </ul>
            </div>
            <?php if ($this->session->userdata('role')=='write' || $this->session->userdata('role')=='admin') : ?>
            <div class="card-footer">
            <?=form_open(site_url("/pelanggan/delete/$data->id"), 'method="delete"'); ?>
                <a href="<?=site_url("/pelanggan/edit/");?><?=$data->id;?>" class="btn btn-warning btn-block me-1 mt-2">Edit</a>
                <input type="submit" value="Delete" class="btn btn-danger btn-block mt-2">
            <?=form_close();?>
            </div><?php endif; ?>
        </div></center>