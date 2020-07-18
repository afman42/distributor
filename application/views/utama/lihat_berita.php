<?php $this->load->view('utama/header') ?>
      
      <div class="site-section-cover overlay" style="background-image: url('<?= base_url().$berita->foto; ?>');">
        
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-10 text-center">
              <h1><strong><?= $berita->judul ?></strong></h1>
              <div class="pb-4 get"><strong class="text-white"><?= $berita->waktu ?></strong></div>
              
            </div>
          </div>
        </div>
      </div>

      <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-content">
            <p>Tempat: <?= $berita->tempat ?> <br> Lokasi: <?= $berita->nama_bencana ?></p>
            <?= $berita->berita ?>
            <div class="pt-5">
            
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $this->load->view('utama/footer') ?>
