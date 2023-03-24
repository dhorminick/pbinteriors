<?php
    include 'inc/database.inc.php';
    $message = [];


    if (isset($_POST["share-testimonial"])){

        $testimonial = strip_tags(trim(htmlentities($_POST["testimonial"])));
        $testimonial_date = date("F Y");
        $testimonial_project = strip_tags(trim(htmlentities($_POST["project"])));
        $testimonial_location = strip_tags(trim(htmlentities($_POST["location"])));     
        
        #Insert To Database
        $sql = "INSERT INTO testimonials (text, date, project, location)
         VALUES ('$testimonial', '$testimonial_date', '$testimonial_project', '$testimonial_location')";
        
        if ($con->query($sql) === TRUE) {
            array_push($message, "Thank you for sharing your experience with us, Have a great day ahead!");    
        } else {
            array_push($message, "Error 101!");
            // echo "Upload Error: " . $sql . "<br>" . $con->error;
        }
    }

    if (isset($_POST["update-testimonial"])){

        $testimonial = strip_tags(trim(htmlentities($_POST["testimonial"])));
        $testimonial_id = strip_tags(trim(htmlentities($_POST["id"])));
        $testimonial_date = date("F Y"); 
        
        $CheckIfIdExist = "SELECT * FROM testimonials WHERE crc32(testimonial_id) = '$testimonial_id'";
        $IdExist = $con->query($CheckIfIdExist);
        if ($IdExist->num_rows > 0) {
            $row = mysqli_fetch_array($IdExist);
            $id = $row["testimonial_id"];
            $location = $row["location"];
            $project = $row["project"];

            if ($location != null && $project != null || $location != '' && $project != '') {

                #Insert To Database
                $sql = "UPDATE testimonials SET text = '$testimonial', date = '$testimonial_date' WHERE testimonial_id = '$id'";
                
                if ($con->query($sql) === TRUE) {
                    array_push($message, "Thank you for sharing your experience with us, Have a great day ahead!");    
                } else {
                    array_push($message, "Error 101!");
                    // echo "Upload Error: " . $sql . "<br>" . $con->error;
                }
            }else{
                array_push($message, "Error! Project Details Missing."); 
            }
        }else{
            array_push($message, "Error! Project Id Error."); 
        }
        
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

    <title>Share Your Blissful Experience With Us | PbInteriors</title>
    <meta name="description" content="Satisfied with our properties or services, upload a testimonial to share your blissful experience with others." />
    <meta property="og:title" content="Share Your Blissful Experience With Us | PbInteriors" />
    <meta property="og:description" content="Satisfied with our properties or services, upload a testimonial to share your blissful experience with others." />
    <meta property="og:url" content="<?php echo $domainUrl;?>/testimonial/" />
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
<?php include 'inc/header.inc.php'; ?>
<!-- //header -->

<!-- breadcrum -->
<section class="w3l-about-breadcrum">
  <div class="breadcrum-bg">
    <div class="container py-5">
      <p><a href="/">Home</a> &nbsp; / &nbsp; Testimonials</p>
      <h2 class="my-3">Testimonials</h2>
      <p>
        Satisfied with our properties or services, upload a testimonial to share your blissful experience with us.
      </p>
    </div>
  </div>
</section>
<!-- //breadcrum -->

<style>
    .w3l-contacts-12 textarea{
        margin: 2.5px 0 !important;
    }
</style>
<!--  Project -->
<section class="w3l-contacts-12" id="contact">
    <div class="contact-top pt-5">
        <div class="container py-md-3"> 
            <div class="cont-main-top">   
                <!-- contact form -->
                <?php if (count($message) > 0) : ?>
                    <div class="alert-div">
                    <?php foreach ($message as $error) : ?>
                        <div class="alert alert-primary alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert"><span>×</span></button>
                                <?php echo $error ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                    </div>
                <?php endif ?>
                <div class="contacts12-main mt-lg-0 mt-5 testimonial">
                    <?php 
                        if (isset($_GET["project"])) { 
                            $get_id = strip_tags(trim(htmlentities($_GET["project"])));
                            $CheckIfIdExist = "SELECT * FROM testimonials WHERE crc32(testimonial_id) = '$get_id'";
                            $IdExist = $con->query($CheckIfIdExist);
                            if ($IdExist->num_rows > 0) {
                                $row = mysqli_fetch_array($IdExist);
                                $id = $row["testimonial_id"];
                            
                    ?> 
                    <form action="" method="post" class="main-input">
                        <input type="hidden" name="id" value="<?php echo crc32($id); ?>">
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-lg-12">
                                <label>Testimonial:</label>
                                <textarea name="testimonial" required=""></textarea>
                            </div>
                        </div> 
                        <br>
                        <div class="text-right">
                            <button type="submit" name='update-testimonial' class="btn btn-theme2">Share <i class="fa fa-arrow-right"></i></button>
                        </div> 
                    </form>
                    <?php }else{ ?>
                    <div class="unavailable">
                        <h5>Incorrect Project ID!</h5>
                        <a href="/"><i class="fa fa-arrow-left"></i> Back Home</a>
                    </div>
                    <?php } ?>
                    <?php }else{ ?>
                    <form action="" method="post" class="main-input">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Testimonial Project:</label>
                                <input type="text" name="project" required="">
                            </div>
                            <div class="showSm" style="height: 10px;width:100%;"></div>
                            <div class="col-lg-6">
                                <label>Testimonial Location:</label>
                                <input type="text" name="location" required="">
                            </div>
                        </div> 
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-lg-12">
                                <label>Testimonial:</label>
                                <textarea name="testimonial" required=""></textarea>
                            </div>
                        </div>                         
                        <br>
                        <div class="text-right">
                            <button type="submit" name='share-testimonial' class="btn btn-theme2">Share <i class="fa fa-arrow-right"></i></button>
                        </div>
                        <style>
                            @media (max-width: 991px) {
                                .w3l-contacts-12 .top-inputs {
                                    grid-template-columns: none !important;
                                    
                                }
                            }
                            label{
                                font-size: 15px;
                            }
                        </style>
                    </form>
                    <?php } ?>
                </div>
                <!-- //contact form -->
            </div>
        </div>
        
    </div>
</section>
<!-- //Project -->
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Design Specifications...',
            tabsize: 2,
            height: 200
        });
    });
</script>
<br><br>


<!-- footer -->
<?php include 'inc/footer.inc.php'; ?>
<!-- // footer -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="/assets/js/gallery.js"></script>
<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/js/lightbox-plus-jquery.min.js"></script>

<script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
      })
    });
</script>
 
</body>


</html>
<!-- // grids block 5 -->
