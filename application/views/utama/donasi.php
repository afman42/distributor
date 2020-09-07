<?php $this->load->view('utama/header') ?>
      
      <div class="site-section-cover overlay" style="background-image: url('<?= base_url().$donasi->foto; ?>');">
        
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-10 text-center">
              <h1><strong>Posting Donasi</strong></h1>
              <div class="pb-4 get"><strong class="text-white"><?= $donasi->tanggal?></strong></div>
              
            </div>
          </div>
        </div>
      </div>

      
      

      <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-content">
            <?= $donasi->keterangan ?>
            <div class="pt-5">
              <table class="table table-bordered">
                <tr>
                  <td>No</td>
                  <td>Nama</td>
                  <td>Jenis Donatur</td>
                  <td>Nama Barang</td>
                  <td>Jumlah</td>
                  <td>PDF</td>
                </tr>
                <?php if (!empty($masukan)) {?>
                <?php $no=1; foreach ($masukan as $k) {?>
                  <tr>
                    <td><?= $no;?></td>
                    <td><?= $k->nama ;?></td>
                    <td><?= $k->jenis_donatur ?></td>
                    <td><?= $k->nama_barang;?></td>
                    <td><?= $k->jumlah;?></td>
                    <td>
                      <?php if (!empty($_SESSION['id_donatur']) && $k->id_donatur == $_SESSION['id_donatur']) {?>
                        <a href="<?= base_url('index.php/admin/cetak_pdf/'.$k->id_donasi);?>" class="btn btn-sm btn-danger">Cetak</a>
                      <?php } ?>
                    </td>
                  </tr>
                <?php $no++;}}else{ ?>
                  <tr>
                    <td colspan="4" align="center">Masih Kosong</td>
                  </tr>
                <?php } ?>
              </table>
              <?php if (isset($_SESSION['nama'])) {?>
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Masukan Donasi</h3>
                <?php 
                $id = $this->uri->segment(3);
                ?>
                <form action="<?= site_url('welcome/donasi/'.$id) ?>" method="post" >
                  <div class="form-group">
                    <label for="name">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" id="email">
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="website">
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Tambah Donasi" class="btn btn-primary btn-md text-white">
                  </div>

                </form>
              </div>
              <?php }else{?>
              <div class="comment-form-wrap pt-5">
                  Silakan Login Terlebih dahulu untuk <a href="<?= site_url('welcome/login');?>" class="btn btn-primary">donasi</a> 
              </div>
              <?php } ?>
            </div>

          </div>
          <div class="col-md-4 sidebar">
            <!-- <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <div class="sidebar-box">
              <div class="categories">
                <h3>Categories</h3>
                <li><a href="#">Creatives <span>(12)</span></a></li>
                <li><a href="#">News <span>(22)</span></a></li>
                <li><a href="#">Design <span>(37)</span></a></li>
                <li><a href="#">HTML <span>(42)</span></a></li>
                <li><a href="#">Web Development <span>(14)</span></a></li>
              </div>
            </div>
            <div class="sidebar-box">
              <img src="images/person_1.jpg" alt="Free Website Template by Free-Template.co" class="img-fluid mb-4 w-50 rounded-circle">
              <h3 class="text-black">About The Author</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
              <p><a href="#" class="btn btn-primary btn-md text-white">Read More</a></p>
            </div>

            <div class="sidebar-box">
              <h3 class="text-black">Paragraph</h3>
              <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
            </div> -->
          </div>
        </div>
      </div>
    </div>
<?php $this->load->view('utama/footer') ?>
