<br>
<div class="h2 mb-4" style="max-width: 30rem;"><?php echo $title; ?></div>
<hr>
<ol class="breadcrumb">
	<li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item" wfd-id="245"><a href="<?=site_url();?>sewa" class="text-decoration-none">List Penyewaan</a></li>
	<li class="breadcrumb-item active" wfd-id="244">Informasi Sewa Buku</li>
</ol>
<br>
      
    <center>
        <div class="card border-info mb-3" style="max-width: 30rem;">
            <div class="card-header h3 text-center">
            <span><a href="<?=site_url("/sewa/");?>" class="btn btn-dark btn-block">&lt;</a></span>
                <?=$data[4]?>
            </div>
    
            <div class="card-body">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between"><em>Judul Buku:</em>   <span><?=$data[5] ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Id Pelanggan:</em>   <span><?=$data[7] ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Nama Pelanggan:</em>   <span><?=$data[9] ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Tanggal Sewa:</em>   <span><?=date('Y-m-d',strtotime($data[1])); ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Lama Sewa:</em>      <span><?=$data[2] ?></span></li>
                    <li class="list-group-item d-flex justify-content-between"><em>Keterangan:</em>     <span><?=$data[3] ?></span></li>
                </ul>
            </div>
            <div class="card-footer">
                <?=form_open(site_url("/sewa/delete/$data[0]"), 'method="delete"'); ?>
                    <input type="submit" value="Delete" class="btn btn-danger btn-block mt-2">
                <?=form_close();?>
            </div>
        </div>
    </center>