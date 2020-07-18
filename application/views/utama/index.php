<?php $this->load->view('utama/header') ?>
<div class="site-section-cover overlay" style="background-image: url('<?= base_url();?>tutor-master/images/hero_bg.jpg');">
        
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-10 text-center">
              <h1>The <strong>Hub</strong> Of <strong>Tutorials</strong></h1>
            </div>
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
      

      <!-- <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="heading mb-4">
                <span class="caption">Tutorial Courses</span>
                <h2>Choose Course</h2>
              </div>
            </div>  
          </div>
          <div class="row align-items-stretch">
            <div class="col-lg-2">
              <a href="#" class="course">
                <span class="wrap-icon brand-adobeillustrator"></span>
                <h3>Illustrator</h3>
              </a>
            </div>
            <div class="col-lg-2">
              <a href="#" class="course">
                <span class="wrap-icon brand-adobephotoshop"></span>
                <h3>Photoshop</h3>
              </a>
            </div>
            
            <div class="col-lg-2">
              <a href="#" class="course">
                <span class="wrap-icon brand-angular"></span>
                <h3>Angular</h3>
              </a>
            </div>
            
            <div class="col-lg-2">
              <a href="#" class="course">
                <span class="wrap-icon brand-javascript"></span>
                <h3>JavaScript</h3>
              </a>
            </div>
            <div class="col-lg-2">
              <a href="#" class="course">
                <span class="wrap-icon brand-react"></span>
                <h3>React</h3>
              </a>
            </div>
            <div class="col-lg-2">
              <a href="#" class="course">
                <span class="wrap-icon brand-vue-dot-js"></span>
                <h3>Vue</h3>
              </a>
            </div>
          </div>
        </div>
      </div> -->

              
  
      <div class="site-section bg-light">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="heading mb-4">
                <span class="caption">Terbaru</span>
                <h2>Donasi</h2>
              </div>
            </div>
            <div class="col-lg-8">
              

            <?php foreach ($data->result() as $item) {?>
              <div class="d-flex tutorial-item mb-4">
                <div class="img-wrap">
                  <a href="#"><img src="<?= base_url().$item->foto; ?>" alt="Image" class="img-fluid"></a>
                </div>
                <div>
                  <!-- <h3><a href="#">Learning React Native</a></h3> -->
                  <p><?php echo word_limiter($item->keterangan, 15).'...'; ?></p>
<!--                   
                  <p class="mb-0">
                    <span class="brand-react h5"></span>
                    <span class="brand-javascript h5"></span>
                  </p> -->
                  <p class="meta">
                    <span class="mr-2 mb-2"><?= $item->tanggal ?></span>
                  </p>  
                  
                  <p><a href="<?= base_url('index.php/welcome/donasi/'.$item->id_donasi) ?>" class="btn btn-primary custom-btn">View</a></p>
                </div>
              </div>
              <?php } ?>
              <div class="custom-pagination">
               <?= $pagination;?>  
              </div>
            </div>


            <!-- <div class="col-lg-4">
              <div class="box-side mb-3">
                <a href="#"><img src="images/img_1_horizontal.jpg" alt="Image" class="img-fluid"></a>
                <h3><a href="#">Learning React Native</a></h3>
              </div>  
              <div class="box-side mb-3">
                <a href="#"><img src="images/img_2_horizontal.jpg" alt="Image" class="img-fluid"></a>
                <h3><a href="#">Learning React Native</a></h3>
              </div>  
              <div class="box-side">
                <a href="#"><img src="images/img_3_horizontal.jpg" alt="Image" class="img-fluid"></a>
                <h3><a href="#">Learning React Native</a></h3>
              </div>  
            </div> -->
          </div>
        </div>
      </div>
      
      <!-- <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center mb-5">
            <div class="heading">
              <span class="caption">Testimonials</span>
              <h2>Student Reviews</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <h3 class="h5">Excellent Teacher!</h3>
              <div>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star-o text-warning"></span>
              </div>
              <blockquote class="mb-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="images/person_1.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Mike Fisher</span>
                  <span>Owner, Ford</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <h3 class="h5">Best Video Tutorial!</h3>
              <div>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star-o text-warning"></span>
              </div>
              <blockquote class="mb-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="images/person_2.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Jean Stanley</span>
                  <span>Traveler</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <h3 class="h5">Easy to Understand!</h3>
              <div>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star-o text-warning"></span>
              </div>
              <blockquote class="mb-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="images/person_3.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Katie Rose</span>
                  <span >Customer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>

<?php $this->load->view('utama/footer') ?>
