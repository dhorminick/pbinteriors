<?php 
  $GetDetails = "SELECT * FROM portfolio WHERE page_id = '$PageId'";
  $GetDetailsResult = mysqli_query($con,$GetDetails);
    if ($GetDetailsResult->num_rows > 0) {
        $rows = mysqli_fetch_array($GetDetailsResult);
        $portfolio_title = $rows["project_name"];
        $portfolio_desc = $rows["project_description"];
        $portfolio_link = $rows["project_link"];
        $project_location = $rows["project_location"];

        $project_location = str_replace( '.' , '', $project_location);
        $page_title = str_replace( '.' , '', $portfolio_title).', '.$project_location;
    }else{
      #database have been tampered with
      require '../404.php';
    }
  
  $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
  $pageUrl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $domainUrl = $protocol . $_SERVER['HTTP_HOST'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo ucwords($page_title) ?> | Portfolio | PbInteriors</title>
    <meta name="description" content="<?php echo $portfolio_desc; ?>" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo ucwords($page_title) ?> | Portfolio | PbInteriors" />
    <meta property="og:description" content="<?php echo $portfolio_desc; ?>" />
    <meta property="og:url" content="<?php echo $domainUrl;?>/portfolio/<?php echo $portfolio_link;?>" />
    <meta property="og:site_name" content="PbInteriors" />
    <meta property="article:publisher" content="https://www.facebook.com/GraceInteriorDesigns/" />
    <meta property="og:image" content="<?php echo $domainUrl;?>/assets/images/image.jpg" />
    <meta property="og:image:width" content="1199" />
    <meta property="og:image:height" content="800" />
    <meta property="og:image:type" content="image/jpeg" />
    
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
<span class="showSm"><br><br></span>
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
                        $project_specs = html_entity_decode($rows["project_specs"]);

                        $project_specs = str_replace( '%p%' , '<p>', $project_specs );
                        $project_specs = str_replace( '%/p%', '</p>', $project_specs);
                        $project_specs = str_replace( '%b%' , '<b>', $project_specs );
                        $project_specs = str_replace( '%/b%', '</b>', $project_specs );
                        $project_specs = str_replace( '%u%' , '<u>', $project_specs );
                        $project_specs = str_replace( '%/u%', '</u>', $project_specs );
                        $project_specs = str_replace( '%\\%', '\\', $project_specs );
                        
                        $client_testimony = $rows["client_testimony"];

                        $project_images = $rows["project_images"];
                        $project_images = unserialize($project_images);
                        foreach ($project_images as $key => $img) {
                ?>
                    <div class="product">
                        <a href="<?php echo $img['i_dir'].$img['i_name'].'.'.$img['i_extension']; ?>" data-lightbox="example-set"
                            data-title="<?php echo $project_name.', '.$project_location; ?>">
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
                      <?php echo $project_name.' - '.$project_location; ?>
                    </p>
                </div>
                <!-- specifications -->
                <div class="client-goal">
                    <p class="specs-heading">Project Description:</p>
                    <p>
                      <?php echo $project_specs; ?> 
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
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $pageUrl; ?>" class="facebook"><span class="fa fa-facebook"></span></a>
                    <a href="https://twitter.com/intent/tweet?text=<?php echo $project_name.', '.$project_location; ?>&url=<?php echo $pageUrl; ?>" class="twitter"><span class="fa fa-twitter"></span></a>
                    <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo $pageUrl; ?>&description=<?php echo $project_name.' - '.$project_location; ?>" class="google-plus"><span class="fa fa-pinterest"></span></a>
                    <!-- <a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a> -->
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

</body>

</html>
<!-- // grids block 5 -->
