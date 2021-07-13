<br>
<div class="h2"><?php echo $title; ?></div>
<hr>
  <ol class="breadcrumb">
	  <li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item" wfd-id="245"><a href="<?=site_url();?>userroles" class="text-decoration-none">Daftar User</a></li>
	  <li class="breadcrumb-item active" wfd-id="244">Edit User</li>
  </ol>

  <?=form_open("userroles/edit/$users->id");?>
  <fieldset>
    <?=form_hidden("id", $users->id);?>
    <?=form_hidden("userid", $users->userid);?>

    <div class="form-group">
        <label for="txtName" class="form-label mt-4">Name</label>
        <input type="text" class="form-control" name="name" id="txtName" aria-describedby="nameHelp" placeholder="Nama User" value="<?=$users->name; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="txtUserRole" class="form-label mt-4">User Role</label>
        <select name="userRole" id="txtUserRole" class="form-control">
        <?php foreach ($roles as $rItems) : ?>
            <option value="<?=$rItems->id?>" <?=($rItems->id == $users->roleid)?'selected':'' ?> ><?=$rItems->role?></option>
        <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label for="txtUserStatus" class="form-label mt-4">Status</label>
        <select name="aktif" id="txtUserStatus" class="form-control">
            <option value="0" <?=$users->aktif?'':'selected'?> >Tidak Aktif</option>
            <option value="1" <?=$users->aktif?'selected':''?> >Aktif</option>
        </select>
    </div>
    <br>
    <button type="submit" class="btn btn-success me-1">Submit</button>
    <a href="<?=site_url('/userroles')?>" class="btn btn-danger">Batal</a>
  </fieldset>
  <?=form_close();?>