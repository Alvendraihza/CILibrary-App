<br>
<div class="h2"><?php echo $title; ?></div>
<hr>
        <ol class="breadcrumb">
	        <li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
	        <li class="breadcrumb-item active" wfd-id="244">Daftar Buku</li>
        </ol>
<center>
<?php foreach($data as $item) : ?>
<div class="card border-primary mb-3" style="max-width: 30rem;">
    <div class="card-header h4 d-flex justify-content-between">
        <a href="<?=site_url('/buku/view/')?><?=$item->id ?>"><?=$item->judul ?></a>
        <small><?=$item->pengarang ?></small>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
                <em>ISBN:</em>
                <span><?=$item->isbn ?></span>
            </li>
        </ul>
    </div>
</div>
<?php endforeach ?>
<br>
</center>