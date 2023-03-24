<?php 
  $GetDetails = "SELECT * FROM portfolio WHERE page_id = '$PageId'";
  $GetDetailsResult = mysqli_query($con,$GetDetails);
    if ($GetDetailsResult->num_rows > 0) {
        $rows = mysqli_fetch_array($GetDetailsResult);
        $portfolio_title = $rows["portfolio_title"];
    }else{
      #database have been tampered with
      require '../404.php';
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Interior Architect an Interior Category Bootstrap Responsive Website Template | Home :: W3layouts</title>
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
<?php include 'header.inc.php'; ?>
<!-- //header -->

<!-- breadcrum -->
<section class="w3l-about-breadcrum"  style="display: none;">
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
<!-- //breadcrum -->

<!--  Project -->
<section class="w3l-index6" id="about">
  <div class="features-with-17_sur custom">
    <div class="container py-lg-5">
      <div class="products-4" id="gallery">
        <!-- Project block -->
        <div id="products4-block" class="text-center">
            <div class="container">
                <div class="heading text-center mx-auto mb-5">
                    <h3 class="head">Projects Gallery</h3>
                    <hr>
                </div>
                
                <div class="d-grid grid-col-3 mb-5">
                <?php 
                  $GetDetails = "SELECT * FROM portfolio WHERE page_id = '$PageId'";
                  $GetDetailsResult = mysqli_query($con,$GetDetails);
                    if ($GetDetailsResult->num_rows > 0) {
                        $rows = mysqli_fetch_array($GetDetailsResult);
                        $project_name = $rows["project_name"];
                        $project_link = $rows["project_link"];
                        $client_request = $rows["client_request"];
                        $our_delivery = $rows["our_delivery"];
                        $client_testimony	= $rows["client_testimony"];

                        $project_images = $rows["project_images"];
                        $project_images = unserialize($project_images);
                        foreach ($project_images as $key => $img) {
                ?>
                    <div class="product">
                        <a href="<?php echo $img['i_dir'].$img['i_name'].'.'.$img['i_extension']; ?>" data-lightbox="example-set"
                            data-title="<?php echo $project_name; ?>">
                            <figure>
                                <img src="<?php echo $img['i_dir'].$img['i_name'].'.'.$img['i_extension']; ?>" class="img-responsive" alt="<?php echo $project_name; ?>" />
                            </figure>
                        </a>
                        
                    </div>
                <?php } ?>
                </div>

                <div class="heading text-center mx-auto mb-5">
                    <h3 class="head">Project Specifications</h3>
                    <hr>
                </div>
                <div class="project">
                    <p class="specs-heading">Project:</p>
                    <p>
                      <?php echo $project_name; ?>
                    </p>
                </div>
                <div class="client-goal">
                    <p class="specs-heading">What Our Client Wanted:</p>
                    <p>
                      <?php echo $client_request; ?> 
                    </p>
                </div>
                <div class="we-delivered">
                    <p class="specs-heading">What We Delivered:</p>
                    <p>
                      <?php echo $our_delivery; ?>
                    </p>
                </div>
                <?php 
                    if($client_testimony != null || $client_testimony != ''){
                ?>
                <div class="client-testimony">
                    <p class="specs-heading">Clients Testimony:</p>
                    <p>
                      <?php echo $client_testimony; ?>
                    </p>
                </div>
                <?php }else{} ?>
                <?php } ?>
                <br><hr><br>
                <div class="w3l-footer-29-main share-project">
                    <div class="main-social-footer-29">
                    <p class="specs-heading">Share Project:</p>
                    <a href="#facebook" class="facebook"><span class="fa fa-facebook"></span></a>
                    <a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a>
                    <a href="#instagram" class="instagram"><span class="fa fa-instagram"></span></a>
                    <a href="#google-plus" class="google-plus"><span class="fa fa-google-plus"></span></a>
                    <a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a>
                    </div>
                  </div>
            </div>
        </div>
        <!-- Project block -->
    </div>
    </div>
  </div>
</section>
<!-- //Project -->

<script src="/assets/js/gallery.js"></script>
<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/js/lightbox-plus-jquery.min.js"></script>

<!-- sell your property -->
<?php include 'sell.inc.php'; ?>
<!-- //sell your property -->

<!-- footer -->
<?php include 'footer.inc.php'; ?>
<!-- // footer -->

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
      autoplaySpeed: 2000,
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

</body>

</html>
<!-- // grids block 5 -->
