<br>
<div class="h2"><?php echo $title; ?></div>
<hr>
  <ol class="breadcrumb">
	  <li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item" wfd-id="245"><a href="<?=site_url();?>pelanggan" class="text-decoration-none">Daftar Pelanggan</a></li>
	  <li class="breadcrumb-item active" wfd-id="244">Tambah Pelanggan</li>
  </ol>
<?//=validation_errors(); ?>

<?=form_open('pelanggan/create/');?>
  <fieldset>
    <input type="hidden" name="id">
    <div class="form-group">
        <label for="txtKodepel" class="form-label mt-2">Kode Pelanggan</label>
        <input type="text" class="form-control" name="kodepel" id="txtKodepel" aria-describedby="KodepelHelp" placeholder="Kode Pelanggan">
        <small id="judulHelp" class="form-text text-muted">Masukkan Kode Pelanggan.</small>
    </div>
    <div class="form-group">
        <label for="txtNama" class="form-label mt-4">Nama</label>
        <input type="text" class="form-control" name="nama" id="txtNama" aria-describedby="namaHelp" placeholder="Nama Pelanggan">
        <small id="pelangganHelp" class="form-text text-muted">Masukkan Nama Pelanggan.</small>
    </div>
    <div class="form-group">
        <label for="txtAlamat" class="form-label mt-4">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="txtAlamat" aria-describedby="alamatHelp" placeholder="Alamat">
        <small id="alamatHelp" class="form-text text-muted">Masukkan Alamat.</small>
    </div>
    <div class="form-group">
        <label for="txtTelp" class="form-label mt-4">Telepon</label>
        <input type="text" class="form-control" name="telp" id="txtTelp" aria-describedby="telpHelp" placeholder="Telepon">
        <small id="telpHelp" class="form-text text-muted">Masukkan Telepon.</small>
    </div>
    <div class="form-group">
        <label for="txtJk" class="form-label mt-4">Jenis Kelamin</label>
        <input type="text" class="form-control" name="jk" id="txtTelp" aria-describedby="jkHelp" placeholder="Jenis Kelamin">
        <small id="jkHelp" class="form-text text-muted">Masukkan Jenis Kelamin.</small>
    </div>
    <div class="form-group">
        <label for="txtEmail" class="form-label mt-4">E-Mail</label>
        <input type="text" class="form-control" name="email" id="txtEmail" aria-describedby="emailHelp" placeholder="E-Mail">
        <small id="emailHelp" class="form-text text-muted">Masukkan E-Mail.</small>
    </div> <br>   <!-- <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Example textarea</label>
      <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
    </div> -->

    <button type="submit" class="btn btn-success me-1">Submit</button>
    <button type="button" onclick="history.back(-1)" class="btn btn-danger">Batal </button>
  </fieldset>
  <?=form_close();?>
  <br>