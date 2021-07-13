<br>
<div class="h2 mb-4" style="max-width: 30rem;"><?php echo $title; ?></div>
<hr>
<ol class="breadcrumb">
	<li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item" wfd-id="245"><a href="<?=site_url();?>sewa" class="text-decoration-none">List Penyewaan</a></li>
	<li class="breadcrumb-item active" wfd-id="244">Rincian Sewa</li>
</ol>
<br>
    <center>
        <div class="card border-info mb-3" style="max-width: 30rem;">
            <div class="card-header h3 justify-content-between">
                <div><?=$data->judul?></div>
                <div class="text-muted"><small><?=$data->isbn?></small></div>
            </div>
    
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between"><em>Nama Pelanggan:</em>     <span><?=$data->nama ?>&nbsp;<span>(<?=$data->pelangganid ?>)</span></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>E-Mail:</em>             <span><?=$data->email ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Telp:</em>               <span><?=$data->telp ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Tanggal Sewa:</em>       <span><?=$data->tglsewa ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Lama Sewa:</em>          <span><?=$data->lamasewa ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Keterangan:</em>         <span><?=$data->keterangan ?></span></li>
                </ul>
            </div>
            <?php if ($this->session->userdata('role')=='write' || $this->session->userdata('role')=='admin') : ?>
            <div class="card-footer">
                <?=form_open(site_url("/sewa/delete/$data->id"), 'method="delete"'); ?>
                    <input type="submit" value="Delete" class="btn btn-danger btn-block mt-2 me-2">
                    <button type="button" onclick="history.back(-1)" class="btn btn-secondary mt-2 pe-3">&nbsp;&nbsp;Batal </button>
                <?=form_close();?>
            </div><?php endif; ?>
        </div>
    </center>