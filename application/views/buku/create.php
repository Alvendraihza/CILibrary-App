<br>
<div class="h2"><?php echo $title; ?></div>
<hr>
  <ol class="breadcrumb">
	  <li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item" wfd-id="245"><a href="<?=site_url();?>buku" class="text-decoration-none">Daftar Buku</a></li>
	  <li class="breadcrumb-item active" wfd-id="244">Tambah Buku</li>
  </ol>
<?//=validation_errors(); ?>
<?=form_open('buku/create/');?>
  <fieldset>
    <input type="hidden" name="userId" value='1' >
    <div class="form-group">
        <label for="txtJudul" class="form-label mt-2">Judul</label>
        <input type="text" class="form-control" name="judul" id="txtJudul" aria-describedby="judulHelp" placeholder="Judul">
        <small id="judulHelp" class="form-text text-muted">Masukkan Judul Buku.</small>
    </div>
    <div class="form-group">
        <label for="txtPengarang" class="form-label mt-4">Pengarang</label>
        <input type="text" class="form-control" name="pengarang" id="txtPengarang" aria-describedby="pengarangHelp" placeholder="Nama Pengarang">
        <small id="pengarangHelp" class="form-text text-muted">Masukkan Nama Pengarang.</small>
    </div>
    <div class="form-group">
        <label for="txtPenerbit" class="form-label mt-4">Penerbit</label>
        <input type="text" class="form-control" name="penerbit" id="txtPenerbit" aria-describedby="penerbitHelp" placeholder="Penerbit">
        <small id="penerbitHelp" class="form-text text-muted">Masukkan Nama Penerbit.</small>
    </div>
    <div class="form-group">
        <label for="dateTglTerbit" class="form-label mt-4">Tanggal Terbit</label>
        <input type="date" class="form-control" name="tglTerbit" id="dateTglTerbit" aria-describedby="tglTerbitHelp" placeholder="Tanggal Terbit">
        <small id="tglTerbitHelp" class="form-text text-muted">Masukkan Tanggal Terbit.</small>
    </div>
    <div class="form-group">
        <label for="txtIsbn" class="form-label mt-4">ISBN</label>
        <input type="text" class="form-control" name="isbn" id="txtIsbn" aria-describedby="isbnHelp" placeholder="Penerbit">
        <small id="isbnHelp" class="form-text text-muted">ISBN.</small>
    </div> <br>    <!-- <div class="form-group">
      <label for="exampleTextarea" class="form-label mt-4">Example textarea</label>
      <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
    </div> -->

    <button type="submit" class="btn btn-success me-1">Submit</button>
    <button type="button" onclick="history.back(-1)" class="btn btn-danger">Batal </button>
  </fieldset>
  <?=form_close();?>
  <br>

