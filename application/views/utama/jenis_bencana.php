<?php $this->load->view('utama/header');?>

<div class="site-section-cover overlay" style="background-image: url('<?= base_url();?>uploads/gambar-2.jpg');">
        
        <div class="container">
          <div class="row align-items-center justify-content-center">
          </div>
        </div>
      </div>

      <div class="site-section bg-light pb-0">
        <div class="container">
          <div class="row align-items-stretch overlap">
            <!-- <div class="col-lg-8">
              <div class="box h-100">
                <div class="d-flex align-items-center">
                  <div class="img"><img src="images/img_1.jpg" class="img-fluid" alt="Image"></div>
                  <div class="text">
                    <a href="#" class="category">Tutorial</a>
                    <h3><a href="#">Learning React Native</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum quidem totam exercitationem eveniet blanditiis nulla, et possimus, itaque alias maxime!</p>
                    <p class="mb-0">
                      <span class="brand-react h5"></span>
                      <span class="brand-javascript h5"></span>
                    </p>
                    <p class="meta">
                      <span class="mr-2 mb-2">1hr 24m</span>
                      <span class="mr-2 mb-2">Advanced</span>
                      <span class="mr-2 mb-2">Jun 18, 2020</span>
                    </p>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- <div class="col-lg-4">
              <div class="box small h-100">
                <div class="d-flex align-items-center mb-2">
                  <div class="img"><img src="images/img_2.jpg" class="img-fluid" alt="Image"></div>
                  <div class="text">
                    <a href="#" class="category">Tutorial</a>
                    <h3><a href="#">Learning React Native</a></h3>
                  </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                  <div class="img"><img src="images/img_3.jpg" class="img-fluid" alt="Image"></div>
                  <div class="text">
                    <a href="#" class="category">Tutorial</a>
                    <h3><a href="#">Learning React Native</a></h3>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="img"><img src="images/img_4.jpg" class="img-fluid" alt="Image"></div>
                  <div class="text">
                    <a href="#" class="category">Tutorial</a>
                    <h3><a href="#">Learning React Native</a></h3>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
              
      <div class="site-section bg-light">
        <div class="container">
          <div class="row mb-5 align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <form action="<?= site_url('welcome/jenis_bencana');?>" class="d-flex search-form">
                <span class="icon-"></span>
                <select name="jenis_bencana" class="form-control">
                    <option value="">-- Pilih Jenis Bencana --</option>
                    <?php foreach ($bencana as $k) {?>
                      <option value="<?= $k->id_jenis_bencana ?>"><?= $k->nama_bencana ?></option>
                    <?php } ?>
                </select>
                <input type="submit" class="btn btn-primary px-4" value="Search">
              </form>
            </div>
            <!-- <div class="col-lg-6 text-lg-right">
              <div class="d-inline-flex align-items-center ml-auto">
              <span class="mr-4">Share:</span>
              <a href="#" class="mx-2 social-item"><span class="icon-facebook"></span></a>
              <a href="#" class="mx-2 social-item"><span class="icon-twitter"></span></a>
              <a href="#" class="mx-2 social-item"><span class="icon-linkedin"></span></a>
              </div>
            </div> -->
          </div>
          <div class="row">
            <div class="col-12">
              <div class="heading mb-4">
                <span class="caption">Terbaru</span>
                <h2>Berita</h2>
              </div>
            </div>
            <div class="col-lg-8">
            <?php 
            // var_dump($berita);
            if (!empty($berita)) {?>
            <?php foreach ($berita as $item) {?>
              <div class="d-flex tutorial-item mb-4">
                <div class="img-wrap">
                  <a href="#"><img src="<?= base_url().$item->foto ?>" alt="Image" class="img-fluid"></a>
                </div>
                <div>
                  <h3><a href="#"><?= $item->judul; ?></a></h3>
                  <?= word_limiter($item->berita,15,'...');?>
                  
                  <p class="meta">
                    <span class="mr-2 mb-2"><?= $item->tempat ?></span>
                    <span class="mr-2 mb-2"><?= $item->waktu ?></span>
                  </p>
                  
                  <p><a href="<?= base_url().'index.php/welcome/lihat_berita/'.$item->id_berita_acara; ?>" class="btn btn-primary custom-btn">View</a></p>
                </div>
              </div>
            <?php  }} else if(empty($berita)){ ?>
                <div>Maaf Kosong</div>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
      
    </div>

    <?php $this->load->view('utama/footer');?>
