<?php
    include 'inc/database.inc.php';
    $message = [];
    $emptyimages = [];
    
    if (isset($_POST["submitApartment"])){

        $apartment_status = strip_tags(trim(htmlentities($_POST["status"])));

        if ($apartment_status && $apartment_status == 'rent'){
            $apartment_mortgage_years = '';
        }else if ($apartment_status && $apartment_status == 'sale'){
            $apartment_mortgage_years = strip_tags(trim(htmlentities($_POST["mortgage-years"])));
        }else{
            echo 'Error!';
            exit();
        }

        $apartment_description = trim($_POST["apartment_description"]);
        $apartment_seo_description = strip_tags(trim(htmlentities($_POST["seo_description"])));

        $apartment_highlights = $_POST["highlights"];
        if ($apartment_highlights != '' || $apartment_highlights != null) {
            $apartment_highlights = serialize($apartment_highlights);
        }else{
            $apartment_highlights = '';
        }

        $apartment_features = $_POST["features"];
        if ($apartment_features != '' || $apartment_features != null) {
            $apartment_features = serialize($apartment_features);
        }else{
            $apartment_features = '';
        }

        $apartment_exclusives = $_POST["offer"];
        if ($apartment_exclusives != '' || $apartment_exclusives != null) {
            $apartment_exclusives = serialize($apartment_exclusives);
        }else{
            $apartment_exclusives = '';
        }

        $apartment_benefits = $_POST["benefits"];
        if ($apartment_benefits != '' || $apartment_benefits != null) {
            $apartment_benefits = serialize($apartment_benefits);
        }else{
            $apartment_benefits = '';
        }

        $apartment_town_city = strip_tags(trim(htmlentities($_POST["town-city"])));
        $apartment_price = strip_tags(trim(htmlentities($_POST["price"])));
        $apartment_security_deposit_mortgage = strip_tags(trim(htmlentities($_POST["security-deposit-mortgage"])));
        $apartment_type = strip_tags(trim(htmlentities($_POST["type"])));
        $apartment_for_viewing = strip_tags(trim(htmlentities($_POST["viewing"])));
        $apartment_size = strip_tags(trim(htmlentities($_POST["size"])));
        $apartment_built_in = strip_tags(trim(htmlentities($_POST["built-in"])));
        $apartment_bathroom_count = strip_tags(trim(htmlentities($_POST["bathroom"])));
        $apartment_bedroom_count = strip_tags(trim(htmlentities($_POST["bedroom"])));
        $apartment_garage_count = strip_tags(trim(htmlentities($_POST["garage"])));
        $apartment_address = strip_tags(trim(htmlentities($_POST["address"])));
        $apartment_video = strip_tags(trim(htmlentities($_POST["video"])));
        $apartment_page_title = strip_tags(trim(htmlentities($_POST["page-title"])));
        $apartment_page_link = strip_tags(trim(htmlentities($_POST["page-link"])));
        $apartment_is_featured = strip_tags(trim(htmlentities($_POST["featured"])));

        #sanitizing description
            $apartment_description = str_replace( '<p>' , '%p%', $apartment_description );
            $apartment_description = str_replace( '</p>', '%/p%', $apartment_description );
            $apartment_description = str_replace( '<b>' , '%b%', $apartment_description );
            $apartment_description = str_replace( '</b>', '%/b%', $apartment_description );
            $apartment_description = str_replace( '<u>' , '%u%', $apartment_description );
            $apartment_description = str_replace( '</u>', '%/u%', $apartment_description );
            $apartment_description = str_replace( '\'' , '"', $apartment_description );
            $apartment_description = str_replace( '\\' , '%\\%', $apartment_description );
            $apartment_description = str_replace( 'font-size' , 'fsize', $apartment_description );
            $apartment_description = str_replace( 'font-family' , 'ffamily', $apartment_description );
            $apartment_description = str_replace( 'h1' , 'strong', $apartment_description );
            $apartment_description = str_replace( 'h2' , 'strong', $apartment_description );
            $apartment_description = str_replace( 'h3' , 'strong', $apartment_description );
            $apartment_description = str_replace( 'h4' , 'strong', $apartment_description );
            $apartment_description = str_replace( 'h5' , 'strong', $apartment_description );
            $apartment_description = str_replace( 'h6' , 'strong', $apartment_description );

            $apartment_description = strip_tags(htmlentities($apartment_description ));
        #sanitizing description

        $pageId = strtoupper("#APARTMENT-".bin2hex(random_bytes(5)).mt_rand(00000,99999));

        #Images Upload (DO NOT TOUCH!!!)
        $name_array = $_FILES['imgFiles']['name'];
        $tmp_name_array = $_FILES['imgFiles']['tmp_name'];

        # Number of files
        $count_tmp_name_array = count($tmp_name_array);

        # We define the static final name for uploaded files (in the loop we will add an number to the end)
        $static_final_name = "image-";

        $imagetext = $apartment_page_link;

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
        $sql = "INSERT INTO apartment (page_id, apartment_name, apartment_description, apartment_highlights, apartment_features, apartment_exclusive, apartment_benefits, apartment_price, apartment_security_deposit_mortgage, apartment_type, apartment_for_viewing, apartment_size, apartment_built_in, apartment_bathroom_count, apartment_bedroom_count, apartment_status, apartment_address, apartment_video, apartment_page_title, apartment_page_link, apartment_images, seo_description, apartment_town_city, apartment_garage_count, apartment_is_featured, apartment_mortgage_years) VALUES ('$pageId', '$apartment_page_title', '$apartment_description', '$apartment_highlights', '$apartment_features', '$apartment_exclusives', '$apartment_benefits', '$apartment_price', '$apartment_security_deposit_mortgage', '$apartment_type', '$apartment_for_viewing', '$apartment_size', '$apartment_built_in', '$apartment_bathroom_count', '$apartment_bedroom_count', '$apartment_status', '$apartment_address', '$apartment_video', '$apartment_page_title', '$apartment_page_link', '$imagesList', '$apartment_seo_description', '$apartment_town_city', '$apartment_garage_count', '$apartment_is_featured', '$apartment_mortgage_years')";
        
        if ($con->query($sql) === TRUE) {

            #Create Portfolio Page
            $apartmentDirectory = 'property';
            if(!is_dir($apartmentDirectory)){
                mkdir($apartmentDirectory);
            }

            $apartmentPage = fopen("$apartmentDirectory/$apartment_page_link.php", "w") or die("Unable to open file!");
            $txt = '<?php
            include "../inc/database.inc.php";
            $PageId = "'.$pageId.'";
            include "../inc/singleapartment.inc.php";
        ?>';
            if(fwrite($apartmentPage, $txt)){
                array_push($message, "Apartment Uploaded Successfully!");
                fclose($apartmentPage);
            }else{
                array_push($message, "Apartment Upload Error!");
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

    <title>Upload Apartment Details | PbInteriors</title>
     <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
    <!-- //web fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/gallery.css">
    <link rel="stylesheet" href="/assets/css/collapse.css">

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
      <p><a href="/">Home</a> &nbsp; / &nbsp; Upload</p>
      <h2 class="my-3">Upload Apartment</h2>
    </div>
  </div>
</section>
<!-- //breadcrum -->

<style>
    .w3l-contacts-12 textarea{
        margin: 2.5px 0 !important;
        min-height: 0px !important;
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
                    <?php 
                        if (isset($_GET["status"]) && $_GET["status"] == 'rent' || isset($_GET["status"]) && $_GET["status"] == 'sale'){
                    ?>
                    <form action="" method="post" class="main-input custom" enctype='multipart/form-data'>

                        
                        <div class="ac-container">
                            <div class="ac">
                                <a href="#" class="ac-q">Apartment Page Details.</a>
                                <div class="ac-a">
                                    <div class="row">
                                        <div class="col-lg-12" style="margin-bottom:10px;">
                                            <label>Apartment Page Title:</label>
                                            <input type="text" name="page-title" required=''>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Apartment Page Link:</label>
                                            <input type="text" name="page-link" required=''>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <label style="font-size: 15px !important;padding-top:10px !important;">Apartment Images:</label>
                            <input type="file" name="imgFiles[]" multiple>

                            <div class="ac descriptio_n">
                                <a href="#" class="ac-q">Apartment Description.</a>
                                <div class="ac-a">
                                    <textarea name="apartment_description" id="summernote" rows="5" required=""></textarea>
                                </div>
                            </div>

                            <div class="ac seo descriptio_n">
                                <a href="#" class="ac-q">Apartment Seo Description.</a>
                                <div class="ac-a">
                                    <textarea name="seo_description" rows="4" required=""></textarea>
                                </div>
                            </div>

                            <div class="ac highlights">
                                <a href="#" class="ac-q">Apartment Highlights</a>
                                <div class="ac-a">
                                    <div class="appendBtns">
                                        <button onclick="appendHighlights()"><i class='fa fa-plus'></i></button>
                                        <button onclick="reppendHighlights()"><i class='fa fa-minus'></i></button>
                                    </div>
                                    <div class="top-inputs d-grid highlights">
                                        <input type="text" name="highlights[]">
                                    </div>
                                </div>
                            </div>

                            <div class="ac features">
                                <a href="#" class="ac-q">Apartment Features & Amenities</a>
                                <div class="ac-a">
                                    <div class="appendBtns">
                                        <button onclick="appendFeatures()"><i class='fa fa-plus'></i></button>
                                        <button onclick="reppendFeatures()"><i class='fa fa-minus'></i></button>
                                    </div>
                                    <div class="top-inputs d-grid features">
                                        <input type="text" name="features[]">
                                    </div>
                                </div>
                            </div>

                            <div class="ac exclusives">
                                <a href="#" class="ac-q">Apartment Exclusive Offer</a>
                                <div class="ac-a">
                                    <div class="appendBtns">
                                        <button onclick="appendOffer()"><i class='fa fa-plus'></i></button>
                                        <button onclick="reppendOffer()"><i class='fa fa-minus'></i></button>
                                    </div>
                                    <div class="top-inputs d-grid offer">
                                        <input type="text" name="offer[]">
                                    </div>
                                </div>
                            </div>

                            <div class="ac benefits">
                                <a href="#" class="ac-q">Apartment Location Benefits</a>
                                <div class="ac-a">
                                    <div class="appendBtns">
                                        <button onclick="appendBenefits()"><i class='fa fa-plus'></i></button>
                                        <button onclick="reppendBenefits()"><i class='fa fa-minus'></i></button>
                                    </div>
                                    <div class="top-inputs d-grid benefits">
                                        <input type="text" name="benefits[]">
                                    </div>
                                </div>
                            </div>

                            <div class="ac overview">
                                <a href="#" class="ac-q">Apartment Overview</a>
                                <div class="ac-a">
                                    <?php 
                                        if (isset($_GET["status"]) && $_GET["status"] == 'rent'){
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label>Price (per night):</label>
                                            <div class="flex-box-custom">
                                                <input type="text" name="price" required="">
                                                <button type="button" class="naira">&#8358;</button>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3">
                                            <label>Security Deposit:</label>
                                            <div class="flex-box-custom">
                                                <input type="text" name="security-deposit-mortgage" required="">
                                                <button type="button" class="naira">&#8358;</button>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <label>Apartment Status:</label>
                                            <select name="status">
                                                <option value="rent" selected>For Rent</option>
                                            </select>
                                        </div> 
                                        
                                    </div>
                                    <?php 
                                        }else if (isset($_GET["status"]) && $_GET["status"] == 'sale'){
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label>Starting Price:</label>
                                            <div class="flex-box-custom">
                                                <input type="text" name="price" required="">
                                                <button type="button" class="naira">&#8358;</button>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3">
                                            <label>Mortgage Interest:</label>
                                            <div class="flex-box-custom">
                                                <input type="text" name="security-deposit-mortgage" required="">
                                                <button type="button" class="naira">%</button>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <label>Mortgage Years:</label>
                                            <div class="flex-box-custom">
                                                <input type="text" name="mortgage-years" required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <label>Apartment Status:</label>
                                            <select name="status">
                                                <option value="sale" selected>For Sale</option>
                                            </select>
                                        </div>
                                                                            
                                    </div>
                                    <?php 
                                        }
                                    ?>
                                    <hr>
                                    <div class='row'>
                                        <?php if (isset($_GET["status"]) && $_GET["status"] == 'sale'){ $col = 'col-lg-3'; ?>
                                        <div class="col-lg-3">
                                            <label>Featured:</label>
                                            <select name="featured">
                                                <option value="yes">Yes</option>
                                                <option value="no" selected>No</option>
                                            </select>
                                        </div>
                                        <?php }else{ $col = 'col-lg-4'; } ?>
                                        <div class="<?php echo $col; ?>">
                                            <label>Available For Viewing:</label>
                                            <select name="viewing">
                                                <option value="yes" selected>Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                        <div class="<?php echo $col; ?>">
                                            <label>Apartment Size (square ft):</label>
                                            <input type="text" name="size" required="">
                                        </div>
                                        <div class="<?php echo $col; ?>">
                                            <label>Built In:</label>
                                            <select name="built-in">
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023" selected>2023</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label>Bathroom Count:</label>
                                            <input type="number" name="bathroom" min="0" required=''>
                                        </div>
                                        <div class="col-lg-2">
                                            <label>Bedroom Count:</label>
                                            <input type="number" name="bedroom" min="0" required=''>
                                        </div>
                                        <div class="col-lg-2">
                                            <label>Garage Count:</label>
                                            <input type="number" name="garage" min="0" required=''>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Apartment Type:</label>
                                            <select name="type">
                                                <option value="residential" selected>Residential</option>
                                                <option value="villa">Villa</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Apartment Town, City:</label>
                                            <input type="text" name="town-city" placeholder="eg: Panseke, Abeokuta" required="">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Apartment Location:</label>
                                            <input type="text" name="address" required="">
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Youtube Link Walkthrough:</label>
                                            <input type="text" name="video" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>	
                        <br>
                        <div class="text-right">
                            <button type="submit" name='submitApartment' class="btn btn-theme2 upload-apartment">Upload Apartment <i class="fa fa-arrow-right"></i></button>
                        </div>
                        <style>
                            @media (max-width: 991px) {
                                .w3l-contacts-12 .top-inputs {
                                    grid-template-columns: none !important;
                                }
                            }
                        </style>
                    </form>
                    <?php }else{ ?>
                    <div class="select-status">
                        <h4>Select Apartment Status:</h4>
                        <div class="row">
                        <a class='col-6' href="?status=sale"><button>For Sale</button></a>
                        <a class='col-6' href="?status=rent"><button>For Rent</button></a>
                    </div>
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
            placeholder: '',
            tabsize: 2,
            height: 100
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
<script src="/assets/js/collapse.js"></script>
<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/js/jquery.min.js"></script>
<script>
    var accordion = new Accordion();
    function appendHighlights() {
        var plusOne = "<input type='text' name='highlights[]'>";   
        $(".top-inputs.d-grid.highlights").append(plusOne);   // Append new elements
        // $(".top-inputs.d-grid.highlights").parents(".ac").removeClass('active');
        // $(".top-inputs.d-grid.highlights").parents(".ac").addClass('active');
    }
    function appendFeatures() {
        var plusOne = "<input type='text' name='features[]'>";   
        $(".top-inputs.d-grid.features").append(plusOne);   // Append new elements
    }
    function appendBenefits() {
        var plusOne = "<input type='text' name='benefits[]'>";   
        $(".top-inputs.d-grid.benefits").append(plusOne);   // Append new elements
    }
    function appendOffer() {
        var plusOne = "<input type='text' name='offer[]'>";   
        $(".top-inputs.d-grid.offer").append(plusOne);   // Append new elements
    }
    // function appendBenefits() {
    //     var plusOne = "<input type='text' placeholder='Portfolio Title...' name='"+test_input+"' style='margin-bottom:15px;' >";   
    //     $(".input_div").append(plusOne);   // Append new elements
    // }
    function reppendHighlights() {
        var removeOne = $(".top-inputs.d-grid.highlights input").last();
        removeOne.remove();   // Append new elements
    }
    function reppendFeatures() {
        var removeOne = $(".top-inputs.d-grid.features input").last();
        removeOne.remove();   // Append new elements
    }
    function reppendBenefits() {
        var removeOne = $(".top-inputs.d-grid.benefits input").last();
        removeOne.remove();   // Append new elements
    }
    function reppendOffer() {
        var removeOne = $(".top-inputs.d-grid.offer input").last();
        removeOne.remove();   // Append new elements
    }

</script>

</html>
<!-- // grids block 5 -->
