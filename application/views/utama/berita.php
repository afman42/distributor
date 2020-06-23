<?php $this->load->view('utama/header');?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php foreach ($data->result() as $item) {?>
            <div class="media">
                <div class="media-body">
                    <h4 class="media-heading"><a href="<?= base_url().'index.php/welcome/lihat_berita/'.$item->id_berita; ?>"><?= $item->judul ?></a></h4>
                    <?= word_limiter($item->deskripsi,15,'...');?>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="col-md-12">
            <?= $pagination; ?>
        </div>
    </div>
</div>
<?php $this->load->view('utama/footer');?>