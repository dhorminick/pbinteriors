<?php include 'inc/database.inc.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Home Of Conceptual Interiors and Apartments | PbInteriors</title>
     <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <!-- //web fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/gallery.css">
  </head>
  <body>

<!-- header -->
<?php include 'inc/header.inc.php'; ?>
<!-- //header -->

<section class="w3l-main-slider" id="home">
  <!-- main-slider -->
  <div class="companies20-content">
    
    <div class="owl-one owl-carousel owl-theme">
      <div class="item">
        <li>
          <div class="slider-info banner-view bg bg2" data-selector=".bg.bg2">
            <div class="banner-info">
              <div class="container">
                <div class="banner-info-bg mr-auto">
                  <h5> We are architects, planners &amp; designers.</h5>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, velit recusandae eum necessitatibus blanditiis porro cum</p>
                  <a class="btn btn-secondary btn-theme2 mt-md-5 mt-4" href="services.html"> Our Services</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </div>
      <div class="item">
        <li>
          <div class="slider-info  banner-view banner-top1 bg bg2" data-selector=".bg.bg2">
            <div class="banner-info">
              <div class="container">
                <div class="banner-info-bg mr-auto">
                  <h5>We Create Beautiful Home Exteriors.</h5>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, velit recusandae eum necessitatibus blanditiis porro cum</p>
                  <a class="btn btn-secondary btn-theme2 mt-md-5 mt-4" href="contact.html"> Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </div>
      <div class="item">
        <li>
          <div class="slider-info banner-view banner-top2 bg bg2" data-selector=".bg.bg2">
            <div class="banner-info">
              <div class="container">
                <div class="banner-info-bg mr-auto">
                  <h5>Exceptional Designing For Exceptional Spaces</h5>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, velit recusandae eum necessitatibus blanditiis porro cum</p>
                  <a class="btn btn-secondary btn-theme2 mt-md-5 mt-4" href="about.html"> About Us</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </div>
      <div class="item">
        <li>
          <div class="slider-info banner-view banner-top3 bg bg2" data-selector=".bg.bg2">
            <div class="banner-info">
              <div class="container">
                <div class="banner-info-bg mr-auto">
                  <h5>Giving Your Home a New Style Every Style</h5>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, velit recusandae eum necessitatibus blanditiis porro cum</p>
                  <a class="btn btn-secondary btn-theme2 mt-md-5 mt-4" href="services.html">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </div>
    </div>
  </div>

</div>


  <script src="assets/js/owl.carousel.js"></script>
  <!-- script for -->
  <script>
    $(document).ready(function () {
      $('.owl-one').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        responsiveClass: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          480: {
            items: 1,
            nav: false
          },
          667: {
            items: 1,
            nav: true
          },
          1000: {
            items: 1,
            nav: true
          }
        }
      })
    })
  </script>
  <!-- //script -->
  <!-- /main-slider -->
</section>
<!--  build a space section -->
<section class="w3l-index6" id="about">
  <div class="features-with-17_sur py-5">
    <div class="container py-lg-5">
      <div class="heading text-center mx-auto mb-5">
        <h3 class="head">A Space That Feels Like You.</h3>
        <p class="my-3 head"> 
          Are you searching for an experienced interior designer to beautify your homes and offices, or a fully furnished apartment
          for one-time rentals or full purchase, at <strong>pbinteriors</strong>, we offer:
        </p>
      </div>
      <div class="features-with-17-top_sur mt-5 pt-3">
        <div class="row">
          <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
            <div class="features-with-17-right-tp_sur">
              <div class="features-with-17-left1 mb-3">
                <span class="fa fa-paint-brush" aria-hidden="true"></span>
              </div>
              <div class="features-with-17-left2">
                <h6><a href="#url">Quality Re-assurance</a></h6>
                <p> We select well-designed products that are made to the highest standards of quality 
                  and sustainability, with materials destined to satisfy our customers very need. 
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-md-0 mt-5">
            <div class="features-with-17-right-tp_sur">
              <div class="features-with-17-left1 mb-3">
                <span class="fa fa-ils" aria-hidden="true"></span>
              </div>
              <div class="features-with-17-left2">
                <h6><a href="#url">Conceptual Architecture</a></h6>
                <p>We work with the range of crafts people in the field of furnitures, 
                  electronics, wall and floor plastering, design makers and technocrats to offer our 
                  clients bespoke and made to measure products.  
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-lg-0 mt-5">
            <div class="features-with-17-right-tp_sur">
              <div class="features-with-17-left1 mb-3">
                <span class="fa fa-building" aria-hidden="true"></span>
              </div>
              <div class="features-with-17-left2">
                <h6><a href="#url">Project Management</a> </h6>
                <p>The more challenging the project, the more we put to work the range of our skills
                  in the minimum possible timeframe and with excellent management of your interior resources.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--  //build a space section -->
 <!--  About section -->
 <div class="w3l-about1 py-5" id="about">
  <div class="container py-lg-3">
    <div class="heading text-center mx-auto mb-5">
      <h3 class="head">About Us</h3><hr>
    </div>
    <div class="aboutgrids row">
      <div class="col-lg-6 aboutgrid2">
        <img src="assets/images/a2.jpg" alt="about image" class="img-fluid" />
      </div>
      <div class="col-lg-6 aboutgrid1 mt-lg-0 mt-4 pl-lg-5">
        <h4>Quality Comfort At Our Fingertips</h4>
        <p>We provide you with a complete, integrated and 100% customized project featuring built-in solutions (kitchen, wardrobes and sitting room sets), furnitures, wall and floor coverings, lighting and state of the art accessories and decorations.</p>
        <p>We work hand-in with you to keep track of our spending process so that we stay well within your budget.</p>
        
        <a class="btn btn-secondary btn-theme2" href="about.html"> Learn More</a>
      </div>
    </div>
  </div>
</div>
 <!--  //About section -->
<?php
  $AllInteriors = "SELECT * FROM portfolio LIMIT 12";
  $AllInteriorsResult = mysqli_query($con,$AllInteriors);
  if ($AllInteriorsResult->num_rows > 0) {
?>
<!--  recent interior projects section -->
<section class="w3l-index6" id="about">
  <div class="features-with-17_sur">
    <div class="container py-lg-5">
      <div class="products-4">
        <!-- Products4 block -->
        <div id="products4-block" class="text-center">
            <div class="container">
              <div class="heading text-center mx-auto mb-5">
                  <h3 class="head">Recent Interior Projects</h3>
                  <hr>
              </div>
              <section class="tab-contents text-left">
                <div class="d-grid grid-col-3">
                  <?php
                    while($rows = mysqli_fetch_array($AllInteriorsResult)){
                      $all_project_name = $rows["project_name"];
                      $all_project_link = $rows["project_link"];
                      $all_project_images = $rows["project_images"];
                      $all_project_type = $rows["project_type"];
                      $all_project_location = $rows["project_location"];
                                
                      $all_project_location = str_replace( '.' , '', $all_project_location);
                      $all_project_images = unserialize($all_project_images);
                      $all_project_images = current($all_project_images);
                                
                  ?>
                  <div class="product">
                      <a href="<?php echo '/'.$all_project_type.'/'.$all_project_link; ?>" data-lightbox="example-set"
                          data-title="<?php echo $all_project_name; ?>">
                          <figure>
                              <img src="<?php echo $all_project_images['i_dir'].$all_project_images['i_name'].'.'.$all_project_images['i_extension']; ?>" class="img-responsive" alt="" />
                          </figure>
                          <div class="work-description">
                            <?php echo $all_project_name; ?><br>
                            <?php echo $all_project_location; ?>
                          </div>
                      </a>
                  </div>
                  <?php } ?>
                </div>
              </section>
              <a href="/projects/all-interiors"><div class="view-all-div">View All Projects <i class="fa fa-arrow-right"></i></div></a>
            </div>
        </div>
        <!-- Products4 block -->
    </div>
    </div>
  </div>
</section>
<!--  //recent interior projects section -->
<?php }else{} ?>

<?php
  $AllApartments = "SELECT * FROM apartment LIMIT 12";
  $AllApartmentsResult = mysqli_query($con,$AllApartments);
  if ($AllApartmentsResult->num_rows > 0) {
?>
<hr>
<!--  recent apartments section -->
<section class="w3l-about1 py-5" id="about" style="margin-top:-70px !important;">
  <div class="features-with-17_sur">
    <div class="container">
      <div class="products-4" id="gallery">
        <!-- Products4 block -->
        <div id="products4-bloc" class="text-center" style="margin-top:20px !important;margin-bottom:50px !important;">
              <div class="container">
                <div class="heading text-center mx-auto">
                    <h3 class="head">Available Homes <span class="showBg">For Rent / Purchase</span></h3>
                    <hr style="margin-bottom: 20px;">
                </div>
                <section class="apartment-main">
                  <div class="row">
                      <?php
                                while($rows = mysqli_fetch_array($AllApartmentsResult)){
                                  $apartment_name = $rows["apartment_name"];
                                  $apartment_type = $rows["apartment_type"];
                                  $apartment_price = $rows["apartment_price"];
                                  $apartment_size = $rows["apartment_size"];
                                  $apartment_bathroom_count = $rows["apartment_bathroom_count"];
                                  $apartment_bedroom_count = $rows["apartment_bedroom_count"];
                                  $apartment_garage_count = $rows["apartment_garage_count"];
                                  $apartment_town_city = $rows["apartment_town_city"];
                                  $apartment_status = $rows["apartment_status"];
                                  $apartment_page_link = $rows["apartment_page_link"];
                                  $apartment_images = $rows["apartment_images"];
                                  $apartment_is_featured = $rows["apartment_is_featured"];
                                  
                                  $apartment_images = unserialize($apartment_images);
                                  $apartment_images = current($apartment_images);
                                  if ($apartment_is_featured == 'yes') {
                                      $isFeatured = true;
                                  }else if ($apartment_is_featured == 'no') {
                                      $isFeatured = false;
                                  }else{
                                      $isFeatured = false;
                                  }
                      ?>
                      <div class="col-lg-4 apartment-details">
                        <a href="/property/<?php echo $apartment_page_link;?>">
                            <figure>
                                <div class="apartment-flexbox">
                                <div class="apartment-quality">New</div>
                                <?php if ($isFeatured = true) { ?><div class="apartment-sale-status">Featured</div><?php }else{} ?>
                                </div>
                                <img src="<?php echo $apartment_images['i_dir'].$apartment_images['i_name'].'.'.$apartment_images['i_extension']; ?>" alt="<?php echo $apartment_name; ?>">
                                <div class="apartment-status">For <?php echo ucwords($apartment_status);?></div>
                            </figure>
                        </a>
                        <div class="apartment-sub">
                            <a href="/property/<?php echo $apartment_page_link;?>"><h4 class="apartment-title"><?php echo $apartment_name;?></h4></a>
                            <h6 class="apartment-location"><?php echo $apartment_town_city;?></h6>
                            <div class="row specs">
                                <div class="col-lg-3 col-6 specs-details">
                                    &#8358;<?php echo $apartment_price;?>
                                    <div class="subtext">Price</div>
                                </div>
                                <div class="col-lg-3 col-6 specs-details">
                                    <i class="fa fa-bed"></i> <?php echo $apartment_bedroom_count;?>
                                    <div class="subtext">Bedroom(s)</div>
                                </div>
                                <div class="showSm" style="height: 10px;width:100%;"></div>
                                <div class="col-lg-3 col-6 specs-details">
                                    <i class="fa fa-shower"></i> <?php echo $apartment_bathroom_count;?>
                                    <div class="subtext">Bathroom(s)</div>
                                </div>
                                <div class="col-lg-3 col-6 specs-details">
                                    <?php echo $apartment_size;?>
                                    <div class="subtext">Square Ft.</div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <?php } ?>
                  </div>
                </section>
                <a href="/projects/all-apartments"><button class="our-works-btn">View All <i class="fa fa-arrow-right"></i></button></a>
              </div>
        </div>
        <!-- Products4 block -->
    </div>
    </div>
  </div>
</section>
<!--  //recent apartments section -->
<?php }else{} ?>

<script src="assets/js/jquery-3.3.1.min.js"></script>

<?php
  $Testimonials = "SELECT * FROM testimonials WHERE text != '' LIMIT 6";
  $TestimonialsResult = mysqli_query($con,$Testimonials);
  if ($TestimonialsResult->num_rows > 5) { //2
?>
<!-- testimonial block -->
<section class="w3l-customers-4" id="testimonials">
  <div id="customers4-block" class="py-5">
    <div class="container py-md-3">
      <div class="heading text-center mx-auto">
        <h3 class="head">From Our Clients</h3>
        <hr style="border-color: rgba(255, 255, 255, 0.3);">
      </div>        
      
      <div class="owl-two owl-carousel owl-theme-custom">
        <?php 
          $row = mysqli_fetch_array($TestimonialsResult);
          $text = $row["text"];
          $location = $row["location"];
          $project = $row["project"];
          $date = $row["date"];

          if($location != null && $project != null && $date != null && $text != null || $location != '' && $project != '' && $date != '' && $text != '' ){
        ?>
        <div class="section-title item" style="display: none;">
          <div class="item-tops">
            <div class="items">
              <div class="hash1">
                <i class="fa fa-quote-left"></i>
              </div>
              <p class="main-p"><?php echo $text; ?></p>
              <p class="sub-p"><?php echo $project; ?> - <?php echo $location; ?> (<?php echo $date; ?>)</p>
            </div>
          </div>
        </div>
        <?php }else{} ?>
      </div>
    </div>
  </div>
</section>
<!-- testimonial block -->
<?php }else{} ?>

<!-- testimonial block -->
<section class="w3l-customers-4" id="testimonials">
  <div id="customers4-block" class="py-5">
    <div class="container py-md-3">
      <div class="heading text-center mx-auto">
        <h3 class="head">From Our Clients</h3>
        <hr style="border-color: rgba(255, 255, 255, 0.3);">
      </div>        
      
      <div class="owl-two owl-carousel owl-theme-custom">
        <div class="section-title item">
          <div class="item-tops">
            <div class="items">
              <div class="hash1">
                <i class="fa fa-quote-left"></i>
              </div>
              <p class="main-p">I very much enjoyed working with Trish from Grace Interior Designs. 
                Her process to understand the client, to determine options for consideration, 
                was constructive and fun. Trish really threw herself into understanding my 
                needs. She allowed me to express my preferences without judgment.</p>
              <p class="sub-p">Residential - Ilaro, Abeokuta. (November 2022)</p>
            </div>
          </div>
        </div>
        <div class="section-title item">
          <div class="item-tops">
            <div class="items">
              <div class="hash2">
                <i class="fa fa-quote-left"></i>
              </div>
              <p class="main-p">I would highly recommend Grace Interior Designs. Trish was a pleasure
                  to work with – patient, flexible, reassuring, and went to great lengths
                  to be sure she understood our style. We are really happy with the 
                  result, and working with Trish meant we were able to furnish our 
                  new home while going in and out of lockdowns.</p>
              <p class="sub-p">Residential - Harmony, Abeokuta. (July 2022)</p>
            </div>
          </div>
        </div>
        <div class="section-title item">
          <div class="item-tops">
            <div class="items">
              <div class="hash1">
                <i class="fa fa-quote-left"></i>
              </div>
              <p class="main-p">Trish worked with us on our kitchen renovation and some other
                  minor design changes. She spent plenty of time at the outset to
                  understand us as a family so that all the little decisions along
                    the way became very quick and simple. The final outcome is a beautiful 
                    and highly functional kitchen that we could never have produced 
                    without her assistance.</p>
                    <p class="sub-p">Kitchen Redecoration - Camp, Abeokuta. (May 2022)</p>
            </div>
          </div>
        </div>
        <div class="section-title item">
          <div class="item-tops">
            <div class="items">
              <div class="hash2">
                <i class="fa fa-quote-left"></i>
              </div>
              <p class="main-p">Trish was absolutely amazing. I was sceptical when my wife suggested the idea 
                of using an interior designer but it’s one of the best decisions we made. 
                The process has challenged and enriched us. Trish helped us understand our
                  varied tastes and find beautiful ideas that fused our seemingly very different 
                  ideas.</p>
                  <p class="sub-p">Residential - Accord Estate, Abeokuta. (July 2022)</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- testimonial block -->


<section class="partners py-5" id="partners">
	<div class="container py-md-3">
		<div class="heading text-center mx-auto">
			<h3 class="head">Our Partners</h3>
			<p class="my-3 head"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
			  Nulla mollis dapibus nunc, ut rhoncus
			  turpis sodales quis. Integer sit amet mattis quam.</p>
		  </div>
		<div class="inner-sec-w3ls pt-5 mt-3">
			<div class="sponsers-icon text-center">
				<ul class="list-unstyled partners-icon row">
					<li class="col-md-2 col-4">
						<span class="fa fa-codepen" aria-hidden="true"></span>
					</li>
					<li class="col-md-2 col-4 border-left border-right">
						<span class="fa fa-lastfm" aria-hidden="true"></span>
					</li>
					<li class="col-md-2 col-4 border-right">
						<span class="fa fa-codiepie" aria-hidden="true"></span>
					</li>
					<li class="col-md-2 col-4 border-right mt-md-0 mt-3">
						<span class="fa fa-drupal" aria-hidden="true"></span>
					</li>
					<li class="col-md-2 col-4 border-right mt-md-0 mt-3">
						<span class="fa fa-dashcube" aria-hidden="true"></span>
					</li>
					<li class="col-md-2 col-4 mt-md-0 mt-3">
						<span class="fa fa-skyatlas" aria-hidden="true"></span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- footer -->
<?php include 'inc/footer.inc.php'; ?>
<!-- // footer -->

<script src="assets/js/jquery-3.3.1.min.js"></script>

<script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
      })
    });
</script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>

<!-- Smooth scrolling -->

<script src="assets/js/owl.carousel.js"></script>

<!-- script for -->
<script>
  $(document).ready(function () {
    $('.owl-one').owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      responsiveClass: true,
      autoplay: false,
      autoplayTimeout: 5000,
      autoplaySpeed: 1000,
      autoplayHoverPause: false,
      responsive: {
        0: {
          items: 1,
          nav: false
        },
        480: {
          items: 1,
          nav: false
        },
        667: {
          items: 1,
          nav: true
        },
        1000: {
          items: 1,
          nav: true
        }
      }
    })
  })

  $(document).ready(function () {
    $('.owl-two').owlCarousel({
      loop: false,
      margin: 0,
      nav: false,
      responsiveClass: true,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplaySpeed: 1000,
      autoplayHoverPause: false,
      responsive: {
        0: {
          items: 1,
          nav: false
        },
        480: {
          items: 1,
          nav: false
        },
        667: {
          items: 1,
          nav: false
        },
        1000: {
          items: 2,
          nav: false
        }
      }
    })
  })

  $(".product").hover(function(){
    $(this).addClass("active");
  }, function(){
    $(this).removeClass("active");
  });
  
</script>
<!-- //script -->

</body>

</html>
<!-- // grids block 5 -->
