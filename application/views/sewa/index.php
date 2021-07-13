<br>
<div class="h2"><?php echo $title; ?></div>
<hr>
    <ol class="breadcrumb">
	  <li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
	  <li class="breadcrumb-item active" wfd-id="244">List Penyewaan</li>
    </ol>
    <center><div class="row">
        <?php foreach($aSewa as $item) : ?>
        <div class="col-4">
            <div class="card border-primary mb-3 mx-auto" style="max-width: 30rem;">
                <div class="card-header h4 d-flex justify-content-between">
                    <?=$item->isbn ?>
                    <a href="<?=site_url('/sewa/view/')?><?=$item->id ?>" class="btn btn-secondary">&gt;&gt;</a>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <em>Tanggal Sewa:</em>
                            <span><?=$item->tglsewa ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <em>Lama Sewa:</em>
                            <span><?=$item->lamasewa ?></span>
                        </li>
                    </ul>
                </div>
                <?php if ($this->session->userdata('role')=='write' || $this->session->userdata('role')=='admin') : ?>               
                <div class="CARD-FOOTER d-flex justify-content-between">
                    <span>&nbsp;</span>
                    <span><a href="<?=site_url('/sewa/delete/')?><?=$item->id ?>" class="btn btn-danger">Delete</a></span>
                </div><?php endif; ?>
            </div>
        </div>
        <?php endforeach ?>
    </div>

</center>