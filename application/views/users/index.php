<br>
<div class="h2"><?php echo $title; ?></div>
<hr>
    <ol class="breadcrumb">
	  <li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
	  <li class="breadcrumb-item active" wfd-id="244">Daftar User</li>
    </ol>
<center>
<div class="row">
        <?php foreach($data as $item) : ?>
        <div class="col">
            <div class="card border-primary mb-3 mx-auto" style="max-width: 30rem;">
                <div class="card-header h4 d-flex justify-content-between">
                    <?=$item->name ?>
                    <a href="<?=site_url('/users/view/')?><?=$item->username ?>" class="btn btn-secondary">&gt;</a>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <em>Email:</em>
                            <span><?=$item->email ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
<center>