<?php
    include 'inc/database.inc.php';
    $emptyimages = [];
    $message = [];


    if (isset($_POST["submitPortfolio"])){

        $portfolio_title = strip_tags(trim(htmlentities($_POST["portfolio_title"])));
        $portfolio_link = strip_tags(trim(htmlentities($_POST["portfolio_link"])));
        $portfolio_location = strip_tags(trim(htmlentities($_POST["portfolio_location"])));
        $portfolio_specs = trim($_POST["portfolio_specs"]);
        $portfolio_desc = strip_tags(trim(htmlentities($_POST["portfolio_desc"])));
        $portfolio_category = strip_tags(trim(htmlentities($_POST["portfolio_category"])));

        $portfolio_specs = str_replace( '<p>' , '%p%', $portfolio_specs );
        $portfolio_specs = str_replace( '</p>', '%/p%', $portfolio_specs );
        $portfolio_specs = str_replace( '<b>' , '%b%', $portfolio_specs );
        $portfolio_specs = str_replace( '</b>', '%/b%', $portfolio_specs );
        $portfolio_specs = str_replace( '<u>' , '%u%', $portfolio_specs );
        $portfolio_specs = str_replace( '</u>', '%/u%', $portfolio_specs );
        $portfolio_specs = str_replace( '\'' , '"', $portfolio_specs );
        $portfolio_specs = str_replace( '\\' , '%\\%', $portfolio_specs );
        $portfolio_specs = str_replace( 'font-size' , 'fsize', $portfolio_specs );
        $portfolio_specs = str_replace( 'font-family' , 'ffamily', $portfolio_specs );
        $portfolio_specs = str_replace( 'h1' , 'strong', $portfolio_specs );
        $portfolio_specs = str_replace( 'h2' , 'strong', $portfolio_specs );
        $portfolio_specs = str_replace( 'h3' , 'strong', $portfolio_specs );
        $portfolio_specs = str_replace( 'h4' , 'strong', $portfolio_specs );
        $portfolio_specs = str_replace( 'h5' , 'strong', $portfolio_specs );
        $portfolio_specs = str_replace( 'h6' , 'strong', $portfolio_specs );

        $portfolio_specs = strip_tags(htmlentities($portfolio_specs ));
        $pageId = strtoupper("#PAGE-".bin2hex(random_bytes(5)).mt_rand(00000,99999));

        #Images Upload (DO NOT TOUCH!!!)
        $name_array = $_FILES['imgFiles']['name'];
        $tmp_name_array = $_FILES['imgFiles']['tmp_name'];

        // Number of files
        $count_tmp_name_array = count($tmp_name_array);

        // We define the static final name for uploaded files (in the loop we will add an number to the end)
        $static_final_name = "image-";

        $imagetext = $portfolio_link;

        $assets_mainDir = 'assets';
        $assets_imagesDir = 'images';

        $uploadDir = $assets_mainDir.'/'.$assets_imagesDir.'/'.$imagetext;
        if(!is_dir($uploadDir)){
            mkdir($uploadDir);
        }

        for($i = 0; $i < $count_tmp_name_array; $i++){
            // Get extension of current file
            $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
            
            // Pay attention to $static_final_name 
            if(move_uploaded_file($tmp_name_array[$i], $uploadDir.'/'.$static_final_name.$i.".".$extension)){
                #echo $name_array[$i]." upload is complete<br>";    
            } else {
                echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
                exit();
            }

            $imagesArr = array(
                'i_dir' => '/'.$uploadDir.'/',
                'i_name' => $static_final_name.$i,
                'i_extension' => $extension
            );

            array_push($emptyimages,$imagesArr);

        } 

        $imagesList = serialize($emptyimages);
        
        #Insert To Portfolio's Database
        $sql = "INSERT INTO portfolio (page_id, project_images, project_specs, project_name, project_link, project_description, project_category, project_type, project_location)
         VALUES ('$pageId', '$imagesList', '$portfolio_specs', '$portfolio_title', '$portfolio_link', '$portfolio_desc', '$portfolio_category', 'portfolio', '$portfolio_location')";
        
        if ($con->query($sql) === TRUE) {

            #Create Portfolio Page
            $portfolioDirectory = 'portfolio';
            if(!is_dir($portfolioDirectory)){
                mkdir($portfolioDirectory);
            }

            $portfolioPage = fopen("$portfolioDirectory/$portfolio_link.php", "w") or die("Unable to open file!");
            $txt = '<?php
            include "../inc/database.inc.php";
            $PageId = "'.$pageId.'";
            include "../inc/singleportfolio.inc.php";
        ?>';
            if(fwrite($portfolioPage, $txt)){
                array_push($message, "Portfolio Uploaded Successfully!");
                fclose($portfolioPage);
            }else{
                array_push($message, "Portfolio Upload Error!");
                exit();
            }
            
        } else {
            echo "Upload Error: " . $sql . "<br>" . $con->error;
            exit();
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Upload Portfolio Details | PbInteriors</title>
     <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <!-- //web fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/gallery.css">

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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstap.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>

<!-- header -->
<?php include 'inc/header.inc.php'; ?>
<!-- //header -->

<!-- breadcrum -->
<section class="w3l-about-breadcrum">
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
                <div class="contacts12-main mt-lg-0 mt-5">
                    <form action="" method="post" class="main-input" enctype='multipart/form-data'>
                        <div class="top-inputs d-grid">
                            <input type="text" placeholder="Portfolio Title..." name="portfolio_title" required="">
                            <input type="text" placeholder="Portfolio Page Link..." name="portfolio_link" required="">
                        </div>
                        <div class="top-inputs d-grid">
                            <input type="text" placeholder="Portfolio Location..." name="portfolio_location" required="">
                        </div>
                        <div class="top-inputs d-grid">
                            <input type="file" name="imgFiles[]" multiple>
                            <select name="portfolio_category" style="padding-left:10px;font-family: inherit;">
                                <option value="residential" selected>Residential Interiors</option>
                                <option value="others">Other Interiors</option>
                            </select>
                        </div>
                        <textarea name="portfolio_desc" placeholder="Brief Description..." rows="5" required="" style="min-height: 70px !important;height: 100px !important;"></textarea>
                        <textarea id="summernote" name="portfolio_specs" required=""></textarea>
                        
                        <br>
                        <div class="text-right">
                            <button type="submit" name='submitPortfolio' class="btn btn-theme2">Submit Now <i class="fa fa-arrow-right"></i></button>
                        </div>
                        <style>
                            @media (max-width: 991px) {
                                .w3l-contacts-12 .top-inputs {
                                    grid-template-columns: none !important;
                                    
                                }
                            }
                        </style>
                    </form>
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
