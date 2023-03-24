<?php include '../inc/database.inc.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>View All Our Interior Designs | PbInteriors</title>
     <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <!-- //web fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/gallery.css">
  </head>
  <body>

<!-- header -->
<?php include '../inc/header.inc.php'; ?>
<!-- //header -->

<section class="w3l-about-breadcrum" style="display: none;">
  <div class="breadcrum-bg">
    <div class="container py-5">
      <p><a href="/">Home</a> &nbsp; / &nbsp; About</p>
      <h2 class="my-3">About Us</h2>
      <p>
        A Customer and investor oriented interior company, selling optimum beauty and comfort. 
      </p>
    </div>
  </div>
</section>
<span class="showSm"><br><br></span>
<!--  recent projects section -->
<section class="w3l-index6" id="about">
  <div class="features-with-17_sur">
    <div class="container py-lg-5">
      <div class="products-4" id="gallery">
        <!-- Products4 block -->
        <div id="products4-block" class="text-center">
            <div class="container">
                <!-- labels -->
                <input id="tab1" type="radio" name="tabs" checked>
                <label class="tabtle" for="tab1">All Projects</label>

                <input id="tab2" type="radio" name="tabs">
                <label class="tabtle" for="tab2">Residential<span class="showBg"> Interiors</span></label>

                <input id="tab3" type="radio" name="tabs">
                <label class="tabtle" for="tab3">Other<span class="showBg"> Interiors</span></label>
                <!-- labels -->
                <section id="content1" class="tab-content text-left">
                  <!-- <div class="d-grid grid-col-3"> -->
                      <?php
                        $AllInteriors = "SELECT * FROM portfolio";
                        $AllInteriorsResult = mysqli_query($con,$AllInteriors);
                          if ($AllInteriorsResult->num_rows > 0) {
                            ?>
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
                      <?php }echo'</div>';}else{ ?>
                      <div class="unavailable">
                        <div class="showBg"></div>
                        <h5>No Project Uploaded In This Category Yet.</h5>
                        <a href="/"><i class="fa fa-arrow-left"></i> Back Home</a>
                      </div>
                      <?php } ?>
                </section>
                <section id="content2" class="tab-content text-left">
                      <?php
                        $ResidentialInteriors = "SELECT * FROM portfolio WHERE project_category = 'residential'";
                        $ResidentialInteriorsResult = mysqli_query($con,$ResidentialInteriors);
                          if ($ResidentialInteriorsResult->num_rows > 0) {
                            ?>
                            <div class="d-grid grid-col-3">
                            <?php
                              while($rows = mysqli_fetch_array($ResidentialInteriorsResult)){
                                $project_name = $rows["project_name"];
                                $project_link = $rows["project_link"];
                                $project_images = $rows["project_images"];
                                $project_type = $rows["project_type"];
                                $project_location = $rows["project_location"];
                                
                                $project_location = str_replace( '.' , '', $project_location);
                                $project_images = unserialize($project_images);
                                $project_images = current($project_images);
                                
                      ?>
                      <div class="product">
                          <a href="<?php echo '/'.$project_type.'/'.$project_link; ?>" data-lightbox="example-set"
                              data-title="<?php echo $project_name; ?>">
                              <figure>
                                  <img src="<?php echo $project_images['i_dir'].$project_images['i_name'].'.'.$project_images['i_extension']; ?>" class="img-responsive" alt="" />
                              </figure>
                              <div class="work-description">
                                <!-- Bathroom<br>
                                Pansheke, Abeokuta. -->
                                <?php echo $project_name; ?><br>
                                <?php echo $project_location; ?>
                              </div>
                          </a>
                      </div>
                      <?php }echo'</div><a href="residential-interiors"><div class="view-all-div">View All <span class="showBg">Residential</span> Interiors <i class="fa fa-arrow-right"></i></div></a>';}else{ ?>
                      <div class="unavailable">
                        <div class="showBg"></div>
                        <h5>No Project Uploaded In This Category Yet.</h5>
                        <a href="/"><i class="fa fa-arrow-left"></i> Back Home</a>
                      </div>
                      <?php } ?>
                </section>
                <section id="content3" class="tab-content text-left">
                      <?php
                        $OtherInteriors = "SELECT * FROM portfolio WHERE project_category = 'others'";
                        $OtherInteriorsResult = mysqli_query($con,$OtherInteriors);
                          if ($OtherInteriorsResult->num_rows > 0) {
                            ?>
                            <div class="d-grid grid-col-3">
                            <?php
                              while($rows = mysqli_fetch_array($OtherInteriorsResult)){
                                $o_project_name = $rows["project_name"];
                                $o_project_link = $rows["project_link"];
                                $o_project_images = $rows["project_images"];
                                $o_project_type = $rows["project_type"];
                                $o_project_location = $rows["project_location"];
                                
                                $o_project_location = str_replace( '.' , '', $o_project_location);
                                $o_project_images = unserialize($o_project_images);
                                $o_project_images = current($o_project_images);
                                
                      ?>
                      <div class="product">
                          <a href="<?php echo '/'.$o_project_type.'/'.$o_project_link; ?>" data-lightbox="example-set"
                              data-title="<?php echo $o_project_name; ?>">
                              <figure>
                                  <img src="<?php echo $o_project_images['i_dir'].$o_project_images['i_name'].'.'.$o_project_images['i_extension']; ?>" class="img-responsive" alt="" />
                              </figure>
                              <div class="work-description">
                                <?php echo $o_project_name; ?><br>
                                <?php echo $o_project_location; ?>
                              </div>
                          </a>
                      </div>
                      <?php }echo'</div><a href="other-interiors"><div class="view-all-div">View All <span class="showBg">Other</span> Interiors <i class="fa fa-arrow-right"></i></div></a>';}else{ ?>
                      <div class="unavailable">
                        <div class="showBg"></div>
                        <h5>No Project Uploaded In This Category Yet.</h5>
                        <a href="/"><i class="fa fa-arrow-left"></i> Back Home</a>
                      </div>
                      <?php } ?>
                </section>
            </div>
        </div>
        <!-- Products4 block -->
    </div>
    </div>
  </div>
</section>
<!--  //recent projects section -->

<!-- sell your property block1 -->
<?php include '../inc/sell.inc.php'; ?>
<!-- //sell your property block1 -->

<!-- footer -->
<?php include '../inc/footer.inc.php'; ?>
<!-- //footer -->

<script src="/assets/js/jquery-3.3.1.min.js"></script>

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

<script src="/assets/js/owl.carousel.js"></script>

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

