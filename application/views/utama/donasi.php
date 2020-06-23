<?php $this->load->view('utama/header') ?>

<div class="container">
	<div class="col-md-8">
		<h5><?= $donasi->judul; ?></h5>
    <img src="<?= base_url().$donasi->foto;?>" alt="">
    <p><?= $donasi->deskripsi;?></p>

    <div style="margin-top:10px;">
      <table class="table table-hovered" style="margin-bottom:10px;">
        <tr>
          <td>No</td>
          <td>Donatur</td>
          <td>Donasi Berupa</td>
        </tr>
        <?php $no = 1;
        if (!empty($masukan)) {
          foreach ($masukan as $data) {?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data->username;?></td>
                <td><?= $data->namabarang;?></td>
            </tr>
            <?php $no++;}?>
        <?php }else {?>
        <tr>
          <td>Dana Masih Kosong</td>
        </tr>
        <?php } ?>
      </table>
      <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 2) {?>
        <form action="<?= base_url('index.php/welcome/donasi/'.$donasi->id_donasi) ?>" method="post">
        <div class="form-group">
          <textarea name="namabarang" class="form-control"></textarea>
          <?= form_error('namabarang', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <input type="submit" value="Kirim" class="btn btn-primary">
        </div>
      </form>
      <?php }else{?>
      <p>Silakan Untuk Donasi harap <a href="<?= base_url('index.php/welcome/masuk'); ?>">login</a> dulu</p>
      <?php } ?>
    </div>
	</div>
  <div class="col-md-4"> 
  </div>
</div>

<?php $this->load->view('utama/footer') ?>