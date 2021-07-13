<br>
<div class="h2"><?php echo $title; ?></div>
<hr>
    <ol class="breadcrumb">
	  <li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
	  <li class="breadcrumb-item active" wfd-id="244">Daftar User Role</li>
    </ol>
<center>
<div class="row">
        <?php foreach($data as $item) : ?>
        <div class="col">
            <div class="card border-primary mb-3 mx-auto" style="max-width: 30rem;">
                <div class="card-header h4 d-flex justify-content-between">
                    <?=$item->name ?>
                    <a href="<?=site_url('/userroles/view/')?><?=$item->userid ?>" class="btn btn-secondary">&gt;</a>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <em>Name:</em>
                            <span><?=$item->email ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <em>Role:</em>
                            <span><?=$item->role ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <em>Status:</em>
                            <span><?=($item->aktif) ? 'Aktif' : 'Tidak Aktif' ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
<center>