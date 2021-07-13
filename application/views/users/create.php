<br>
<div class="h2 d-flex justify-content-between"><?php echo $title; ?>
<div class="h4 mt-3"><small><?=$datetime; ?></small></div>
</div>
<hr>
  <ol class="breadcrumb">
	  <li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item" wfd-id="245"><a href="<?=site_url();?>users" class="text-decoration-none">Daftar Users</a></li>
	  <li class="breadcrumb-item active" wfd-id="244">Tambah User</li>
  </ol>

    <?=form_open('users/create');?>
    <fieldset>
        <div class="form-group">
            <label for="txtFullName" class="form-label mt-3">Nama Lengkap</label>
            <input type="text" class="form-control" name="fullName" id="txtFullName" aria-describedby="fullNameHelp" placeholder="Nama Lengkap Anda">
            <small id="fullNameHelp" class="form-text text-muted">Masukkan Nama Lengkap.</small>
        </div>

        <div class="form-group">
            <label for="txtZipCode" class="form-label mt-3">Kode Pos</label>
            <input type="text" class="form-control" name="zipCode" id="txtZipCode" aria-describedby="zipCodeHelp" placeholder="Kode Pos Anda">
            <small id="zipCodeHelp" class="form-text text-muted">Masukkan Kode Pos.</small>
        </div>

        <div class="form-group">
            <label for="txtEmail" class="form-label mt-3">E-Mail</label>
            <input type="email" min="0" max="14" class="form-control" name="email" id="txtEmail" aria-describedby="emailHelp" placeholder="E-Mail Anda">
            <small id="emailHelp" class="form-text text-muted">Masukkan Email.</small>
        </div>

        <div class="form-group">
            <label for="txtUserName" class="form-label mt-3">User Name</label>
            <input type="text" class="form-control" name="userName" id="txtUserName" aria-describedby="userNameHelp" placeholder="Username">
            <small id="userNameHelp" class="form-text text-muted">Masukkan Username.</small>
        </div>

        <div class="form-group">
            <label for="txtPassword" class="form-label mt-3">User Password</label>
            <input type="text" class="form-control" name="password" id="txtPassword" aria-describedby="passwordHelp" placeholder="Username">
            <small id="passwordHelp" class="form-text text-muted">Masukkan Password.</small>
        </div>

        <br>
        <button type="submit" class="btn btn-success me-1">Submit</button>
        <button type="button" onclick="history.back(-1)" class="btn btn-danger">Batal </button>
        <br>
    </fieldset>
    <?=form_close();?>
    <br>