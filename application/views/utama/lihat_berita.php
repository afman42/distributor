<?php $this->load->view('utama/header');?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3><?= $berita->judul; ?></h3>
            <p><?= $berita->deskripsi;?></p>
        </div>
    </div>
</div>
<?php $this->load->view('utama/footer');?>