<?php $this->load->view('utama/header') ?>

<div class="container">
	<div class="row">
    <?php foreach ($data->result() as $item) {?>
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="<?= base_url().$item->foto;?>">
        <div class="caption">
          <p><?php echo word_limiter($item->judul, 15).'...'; ?></p>
          <p><a href="<?= base_url('index.php/welcome/donasi/'.$item->id_donasi) ?>" class="btn btn-primary" role="button">Lihat</a> </p>
        </div>
      </div>
    </div>
    <?php } ?>
    <div class="col-md-12">
      <?= $pagination;?>
    </div>
  </div>
</div>	

<?php $this->load->view('utama/footer') ?>