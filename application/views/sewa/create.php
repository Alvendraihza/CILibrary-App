<br>
<div class="h2 d-flex justify-content-between"><?php echo $title; ?>
<div class="h4 mt-3"><small><?=$datetime; ?></small></div>
</div>
<hr>
  <ol class="breadcrumb">
	  <li class="breadcrumb-item" wfd-id="245"><a href="http://localhost/ciblogg/" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item" wfd-id="245"><a href="<?=site_url();?>sewa" class="text-decoration-none">List Penyewaan</a></li>
	  <li class="breadcrumb-item active" wfd-id="244">Sewa Buku</li>
  </ol>
<?//=validation_errors(); ?>
<?=form_open('sewa/create/');?>
    <fieldset>
        <div class="form-group">
            <label for="txtIsbn" class="form-label mt-2">ISBN</label><br>
            <select name="isbn" id="txtIsbn" class="txtIsbn form-select">
                <?php foreach ($aBuku as $iBuku) : ?>
                <option value="<?=$iBuku->isbn?>"><?=$iBuku->judul ?> - <?=$iBuku->isbn?></option>
                <?php endforeach ?>
            </select>
            <!-- <input type="text" class="form-control" name="isbn" id="txtIsbn" aria-describedby="isbnHelp" placeholder="Penerbit"> -->
            <!-- <small id="isbnHelp" class="form-text text-muted">ISBN.</small> -->
        </div>

        <div class="form-group">
            <label for="txtPelanggan" class="form-label mt-3">Pelanggan</label><br>
            <select name="pelanggan" id="txtPelanggan" class="form-select">
                <?php foreach ($aPelanggan as $iPelanggan) : ?>
                <option value="<?=$iPelanggan->id?>"><?=$iPelanggan->nama ?> - <?=$iPelanggan->kodepel?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form-group">
            <label for="numLamaSewa" class="form-label mt-3">Lama Sewa</label>
            <input type="number" min="0" max="14" class="form-control" name="lamaSewa" id="numLamaSewa" aria-describedby="lamaSewaHelp" placeholder="Lama Sewa" style="width: 8em;">
            <small id="lamaSewaHelp" class="form-text text-muted">Jumlah Hari Penyewaan.</small>
        </div>

        <div class="form-group">
            <label for="txtKeterangan" class="form-label mt-3">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" id="txtKeterangan" aria-describedby="keteranganHelp" placeholder="Keterangan">
            <small id="keteranganHelp" class="form-text text-muted">Keterangan.</small>
        </div>
        <br>
        <button type="submit" class="btn btn-success me-1">Submit</button>
        <button type="button" onclick="history.back(-1)" class="btn btn-danger">Batal </button>
        <br>
    </fieldset>
  <?=form_close();?>
  <br>