<br>
<div class="h2 d-flex justify-content-between"><?php echo $title; ?>
<div class="h4 mt-3"><small><?=$datetime; ?></small></div>
</div>
<hr>
  <ol class="breadcrumb">
	  <li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item" wfd-id="245"><a href="<?=site_url();?>userroles" class="text-decoration-none">Daftar Users Role</a></li>
	  <li class="breadcrumb-item active" wfd-id="244">Tambah User Role</li>
  </ol>
    <!-- <?php var_dump($users);?> -->
    <!-- <?php var_dump($roles);?> -->
    <?=form_open('userroles/create');?>
        <fieldset>
            <div class="form-group">
                <label for="txtUser" class="form-label mt-4">Name</label>
                <select name="userId" id="txtUser" class="form-control">
                    <?php foreach($users as $user) : ?>  
                    <option value="<?=$user->id?>"><?=$user->name?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="txtUserRole" class="form-label mt-4">User Role</label>
                <select name="userRole" id="txtUserRole" class="form-control">
                    <?php foreach($roles as $role) : ?>  
                    <option value="<?=$role->id?>"><?=strtoupper($role->role)?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="form-group">
                <label for="txtUserStatus" class="form-label mt-4">Status</label>
                <select name="aktif" id="txtUserStatus" class="form-control">
                    <option value="0" >Tidak Aktif</option>
                    <option value="1" >Aktif</option>
                </select>
            </div>

            <br>
            <button type="submit" class="btn btn-success me-1">Submit</button>
            <button type="button" onclick="history.back(-1)" class="btn btn-danger">Batal </button>
            <br>
    </fieldset>
    <?=form_close();?>