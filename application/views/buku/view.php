<br>
<div class="h2 mb-4" style="max-width: 30rem;"><?php echo $title; ?></div>
<hr>
        <ol class="breadcrumb">
	        <li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item" wfd-id="245"><a href="<?=site_url();?>buku" class="text-decoration-none">Daftar Buku</a></li>
	        <li class="breadcrumb-item active" wfd-id="244">Informasi Buku</li>
        </ol>
        <br>
        
        <center><div class="card border-info mb-3" style="max-width: 30rem;">
            <div class="card-header h3">
                <a href="<?=site_url("/buku/");?>" class="btn btn-dark btn-block">&lt;</a>
                <span class="text-center"><?=$data->judul ?></span>
            </div>

            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between"><em>Pengarang:</em>          <span><?=$data->pengarang ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Penerbit:</em>           <span><?=$data->penerbit ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Tanggal Terbit:</em>     <span><?=$data->tglterbit ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>ISBN:</em>               <span><?=$data->isbn ?></span></li>
                </ul>
            </div>
            <?php if ($this->session->userdata('role')=='write' || $this->session->userdata('role')=='admin') : ?>
            <div class="card-footer">
            <?=form_open(site_url("/buku/delete/$data->id"), 'method="delete"'); ?>
                <a href="<?=site_url("/buku/edit/");?><?=$data->id;?>" class="btn btn-warning btn-block me-1 mt-2">Edit</a>
                <input type="submit" value="Delete" class="btn btn-danger btn-block mt-2">
            <?=form_close();?>
            </div><?php endif; ?>
        </div></center>
