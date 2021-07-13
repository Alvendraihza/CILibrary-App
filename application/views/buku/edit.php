<br>
<div class="h2"><?php echo $title; ?></div>
<hr>
  <ol class="breadcrumb">
	  <li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item" wfd-id="245"><a href="<?=site_url();?>buku" class="text-decoration-none">Daftar Buku</a></li>
	  <li class="breadcrumb-item active" wfd-id="244">Edit Buku</li>
  </ol>

<?=form_open("buku/edit/$data->id");?>
  <fieldset>
    <?=form_hidden("id", $data->id);?>
    <?=form_hidden("userId", $data->userid);?>

    <div class="form-group">
        <label for="txtJudul" class="form-label mt-4">Judul</label>
        <input type="text" class="form-control" name="judul" id="txtJudul" aria-describedby="judulHelp" placeholder="Judul" value="<?=$data->judul; ?>">
        <small id="judulHelp" class="form-text text-muted">Masukkan Judul Buku.</small>
    </div>
    <div class="form-group">
        <label for="txtPengarang" class="form-label mt-4">Pengarang</label>
        <input type="text" class="form-control" name="pengarang" id="txtPengarang" aria-describedby="pengarangHelp" placeholder="Nama Pengarang" value="<?=$data->pengarang; ?>">
        <small id="pengarangHelp" class="form-text text-muted">Masukkan Nama Pengarang.</small>
    </div>
    <div class="form-group">
        <label for="txtPenerbit" class="form-label mt-4">Penerbit</label>
        <input type="text" class="form-control" name="penerbit" id="txtPenerbit" aria-describedby="penerbitHelp" placeholder="Penerbit" value="<?=$data->penerbit; ?>">
        <small id="penerbitHelp" class="form-text text-muted">Masukkan Nama Penerbit.</small>
    </div>
    <div class="form-group">
        <label for="dateTglTerbit" class="form-label mt-4">Tanggal Terbit</label>
        <input type="date" class="form-control" name="tglTerbit" id="dateTglTerbit" aria-describedby="tglTerbitHelp" placeholder="Tanggal Terbit" value="<?=$data->tglterbit; ?>">
        <small id="tglTerbitHelp" class="form-text text-muted">Masukkan Tanggal Terbit.</small>
    </div>
    <div class="form-group">
        <label for="txtIsbn" class="form-label mt-4">ISBN</label>
        <input type="text" class="form-control" name="isbn" id="txtIsbn" aria-describedby="isbnHelp" placeholder="Penerbit" value="<?=$data->isbn; ?>">
        <small id="isbnHelp" class="form-text text-muted">ISBN.</small>
    </div>
    <br>
    <button type="submit" class="btn btn-success me-1">Submit</button>
    <button type="button" onclick="history.back(-1)" class="btn btn-danger">Batal </button>
  </fieldset>
  <?=form_close();?>