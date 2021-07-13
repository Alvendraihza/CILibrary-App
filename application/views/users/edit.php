<br>
<div class="h2"><?php echo $title; ?></div>
<hr>
  <ol class="breadcrumb">
	  <li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item" wfd-id="245"><a href="<?=site_url();?>users" class="text-decoration-none">Daftar User</a></li>
	  <li class="breadcrumb-item active" wfd-id="244">Edit User</li>
  </ol>

  <?=form_open("users/edit/$users->username");?>
  <fieldset>
    <?=form_hidden("id", $users->id);?>

    <div class="form-group">
        <label for="txtUserName" class="form-label mt-3">User Name</label>
        <input name="userName" type="text" class="form-control w-40" id="txtUserName" aria-describedby="userNameHelp" value="<?=$users->username; ?>" readonly>
    </div>

    <div class="form-group">
        <label for="txtRegdate" class="form-label mt-3">Registered Date</label>
        <input name="regdate" type="text" class="form-control w-40" id="txtRegdate" aria-describedby="regdateHelp"  value="<?=date('Y-m-d H:i:s', strtotime($users->regdate)); ?>" readonly>
    </div>

    <div class="form-group">
        <label for="txtPassword" class="form-label mt-3">User Password</label>
        <input name="password" type="password" class="form-control" id="txtPassword" aria-describedby="passwordHelp" placeholder="User Login Password">
        <small id="passwordHelp" class="form-text text-muted">Masukkan ulang Password anda.</small>
    </div>

    <div class="form-group">
        <label for="txtFullName" class="form-label mt-3">Full Name</label>
        <input name="name" type="text" class="form-control" id="txtFullName" aria-describedby="fullNameHelp" value="<?=$users->name; ?>">
    </div>

    <div class="form-group">
        <label for="txtZipCode" class="form-label mt-3">Postal Code</label>
        <input name="zipCode" type="text" class="form-control" id="txtZipCode" aria-describedby="zipCodeHelp" value="<?=$users->zipcode; ?>">
    </div>

    <div class="form-group">
        <label for="txtEmail" class="form-label mt-3">E-Mail</label>
        <input name="email" type="email" min="0" max="14" class="form-control" id="txtEmail" aria-describedby="emailHelp"  value="<?=$users->email; ?>">
    </div>

    <button type="submit" class="btn btn-success my-3 me-1">Submit</button>
    <a href="<?=site_url('/users/view/')?><?=$users->username ?>" class="btn btn-danger">Batal</a>
  </fieldset>
  <?=form_close();?>