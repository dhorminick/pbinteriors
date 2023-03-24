<?php include '../inc/database.inc.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>View All Apartments Available For Sale | PbInteriors</title>
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
<?php
    $AllApartments = "SELECT * FROM apartment WHERE apartment_status = 'sale'";
    $AllApartmentsResult = mysqli_query($con,$AllApartments);
        if ($AllApartmentsResult->num_rows > 0) {
?>
<!--  recent projects section -->
<section class="w3l-index6" id="about">
  <div class="features-with-17_sur">
    <div class="container py-lg-5">
      <div class="products-4" id="gallery">
        <!-- Products4 block -->
        <div id="products4-block" class="text-center">
            <div class="container">
                <div class="heading text-center mx-auto">
                    <h3 class="head">Available Apartments For Sale</h3>
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
                
            </div>
        </div>
        <!-- Products4 block -->
    </div>
    </div>
  </div>
</section>
<!--  //recent projects section -->
<?php }else{ ?>
<br><br>
<div class="unavailable" style="margin-bottom: 30px;">
    <div class="showBg custom"></div>
    <h5>No Project Uploaded In This Category Yet.</h5>
    <a href="/"><i class="fa fa-arrow-left"></i> Back Home</a>
</div>
<?php } ?>

<?php
    $AllApartments = "SELECT * FROM apartment WHERE apartment_status = 'sale'";
    $AllApartmentsResult = mysqli_query($con,$AllApartments);
        if ($AllApartmentsResult->num_rows > 0) {
?>
<!-- sell your property block1 -->
<?php include '../inc/sell.inc.php'; ?>
<!-- //sell your property block1 -->
<?php }else{} ?>

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

