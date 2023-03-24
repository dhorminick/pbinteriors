<?php 
    include 'database.inc.php';
    
    $GetDetails = "SELECT * FROM apartment WHERE page_id = '$PageId'";
    $GetDetailsResult = mysqli_query($con,$GetDetails);
    if ($GetDetailsResult->num_rows > 0) {
        $rows = mysqli_fetch_array($GetDetailsResult);
        $apartment_name = $rows["apartment_name"];
        $apartment_title = $rows["apartment_description"];
        $apartment_exclusive = $rows["apartment_exclusive"];
        $apartment_benefits = $rows["apartment_benefits"];
        $apartment_highlights = $rows["apartment_highlights"];
        $apartment_features = $rows["apartment_features"];

        $un_apartment_exclusive = $rows["apartment_exclusive"];
        $un_apartment_benefits = $rows["apartment_benefits"];
        $un_apartment_highlights = $rows["apartment_highlights"];
        $un_apartment_features = $rows["apartment_features"];

        $apartment_description = $rows["apartment_description"];
        $seo_description = $rows["seo_description"];
        $apartment_price = $rows["apartment_price"];
        $apartment_security_deposit_mortgage = $rows["apartment_security_deposit_mortgage"];
        $apartment_mortgage_years = $rows['apartment_mortgage_years'];
        $apartment_type = $rows["apartment_type"];
        $apartment_for_viewing = $rows["apartment_for_viewing"];
        $apartment_size = $rows["apartment_size"];
        $apartment_built_in = $rows["apartment_built_in"];
        $apartment_bathroom_count = $rows["apartment_bathroom_count"];
        $apartment_garage_count = $rows["apartment_garage_count"];
        $apartment_bedroom_count = $rows["apartment_bedroom_count"];
        $apartment_status = $rows["apartment_status"];
        $apartment_address = $rows["apartment_address"];
        $apartment_video = $rows["apartment_video"];
        $apartment_page_title = $rows["apartment_page_title"];
        $apartment_page_link = $rows["apartment_page_link"];
        $apartment_images = $rows["apartment_images"];

        $project_location = str_replace( '.' , '', $apartment_address);
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

    <title><?php echo ucwords($apartment_name) ?> | Apartment | PbInteriors</title>
    <meta name="description" content="<?php echo $seo_description; ?>" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo ucwords($apartment_name) ?> | Apartment | PbInteriors" />
    <meta property="og:description" content="<?php echo $seo_description; ?>" />
    <meta property="og:url" content="<?php echo $domainUrl;?>/apartment/<?php echo $apartment_page_link;?>" />
    <meta property="og:site_name" content="PbInteriors" />
    <meta property="article:publisher" content="https://www.facebook.com/PbInteriors/" />
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
    <!-- <link rel="stylesheet" href="/assets/css/modal.css"> -->
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
                <div class="heading text-center mx-auto mb-5 custom">
                    <h3 class="head">Apartment Gallery</h3>
                    <hr>
                </div>
                
                <div class="d-grid grid-col-3 mb-5">
                <?php 
                    $apartment_description = html_entity_decode($apartment_description);

                    $apartment_description = str_replace( '%p%' , '<p>', $apartment_description );
                    $apartment_description = str_replace( '%/p%', '</p>', $apartment_description);
                    $apartment_description = str_replace( '%b%' , '<b>', $apartment_description );
                    $apartment_description = str_replace( '%/b%', '</b>', $apartment_description );
                    $apartment_description = str_replace( '%u%' , '<u>', $apartment_description );
                    $apartment_description = str_replace( '%/u%', '</u>', $apartment_description );
                    $apartment_description = str_replace( '%\\%', '\\', $apartment_description );
                        
                    $apartment_images = unserialize($apartment_images);
                    $apartment_highlights = unserialize($apartment_highlights);
                    $apartment_features = unserialize($apartment_features);
                    $apartment_exclusive = unserialize($apartment_exclusive);
                    $apartment_benefits = unserialize($apartment_benefits);
                    
                    foreach ($apartment_images as $key => $img) {
                ?>
                    <div class="product">
                        <a href="<?php echo $img['i_dir'].$img['i_name'].'.'.$img['i_extension']; ?>" data-lightbox="example-set"
                            data-title="<?php echo $apartment_name; ?>">
                            <figure>
                                <img src="<?php echo $img['i_dir'].$img['i_name'].'.'.$img['i_extension']; ?>" class="img-responsive" alt="<?php echo $apartment_name; ?>" />
                            </figure>
                        </a>
                        
                    </div>
                <?php } ?>
                </div>
                <div class="heading text-center mx-auto mb-5 custom">
                    <h3 class="head">Apartment Specifications</h3>
                    <hr>
                </div>
                <div class='row'>
                <div class='col-lg-8'>
                <div class="project">
                    <p class="specs-heading">Description:</p>
                    <p>
                        <?php echo $apartment_description; ?>
                    </p>
                </div>
                <!-- specifications -->
                <div class="row">
                
                <?php 
                    if($un_apartment_exclusive != 'a:1:{i:0;s:0:"";}'){
                ?>
                <!-- exclusive offer -->
                <div class="client-goal col-lg-6">
                    <p class="specs-heading">Apartment Exclusives:</p>
                    <p></p>
                    <ul class="listing-main">
                        <?php foreach ($apartment_exclusive as $key => $exclusives) { if($exclusives != null || $exclusives != ''){ ?>
                        <li class="li"><?php echo $exclusives; ?></li>
                        <?php }else{}} ?>
                    </ul>
                </div>
                <?php }else{} ?>
                
                <?php 
                    if($un_apartment_highlights != 'a:1:{i:0;s:0:"";}'){
                ?>
                <!-- highlights -->
                <div class="client-goal col-lg-6">
                    <p class="specs-heading">Apartment Highlights:</p>
                    <p></p>
                    <ul class="listing-main">
                        <?php foreach ($apartment_highlights as $key => $highlights) { if($highlights != null || $highlights != ''){ ?>
                        <li class="li"><?php echo $highlights; ?></li>
                        <?php }else{}} ?>
                    </ul>
                </div>
                <?php }else{} ?>
                
                <?php 
                    if($un_apartment_features != 'a:1:{i:0;s:0:"";}'){
                ?>
                <!-- features -->
                <div class="client-goal col-lg-6">
                    <p class="specs-heading">Apartment Features & Amenities:</p>
                    <p></p>
                    <ul class="listing-main">
                        <?php foreach ($apartment_features as $key => $features) { if($features != null || $features != ''){ ?>
                        <li class="li"><?php echo $features; ?></li>
                        <?php }else{}} ?>
                    </ul>
                </div>
                <?php }else{} ?>


                <?php 
                    if($un_apartment_benefits != 'a:1:{i:0;s:0:"";}'){
                ?>
                <!-- location benefits -->
                <div class="client-goal col-lg-6">
                    <p class="specs-heading">Property Location Benefits:</p>
                    <p></p>
                    <ul class="listing-main">
                        <?php foreach ($apartment_benefits as $key => $benefits) { if($benefits != null || $benefits != ''){  ?>
                        <li class="li"><?php echo $benefits; ?></li>
                        <?php }else{}} ?>
                    </ul>
                </div>
                <?php }else{} ?>
                
                <!-- overview -->
                <div class="client-goal col-lg-6">
                    <p class="specs-heading">Apartment Overview:</p>
                    <p></p>
                    <?php if($apartment_status == 'rent'){ ?>
                    <nav><strong>Price :</strong> &#8358; <?php echo $apartment_price; ?> <strong>(Per Night)</strong></nav>
                    <nav><strong>Security Deposit :</strong> <?php echo $apartment_security_deposit_mortgage.'%';?></nav>
                    <!-- <nav><strong>Apartment Status :</strong> For Rent</nav> -->
                    <?php }else if($apartment_status == 'sale'){ ?>
                    <nav><strong>Starting Price :</strong> &#8358; <?php echo $apartment_price; ?> </nav>
                    <nav><strong>Mortgage Interest:</strong> <?php echo $apartment_security_deposit_mortgage.'%';?></nav>
                    <nav><strong>Mortgage Max. Years:</strong> <?php echo $apartment_mortgage_years.' Years';?></nav>
                    <!-- <nav><strong>Apartment Status :</strong> For Sale</nav> -->
                    <?php } ?>
                    <nav><strong>Available For Viewing :</strong> <?php echo ucwords($apartment_for_viewing) ;?></nav> 
                    <nav><strong>Apartment Type :</strong> <?php echo $apartment_bedroom_count; ?> Bedroom(s), <?php echo $apartment_bathroom_count; ?> Bathroom(s) - <?php echo ucwords($apartment_type); ?></nav>
                    <nav><strong>Apartment Size :</strong> <?php echo $apartment_size; ?> Square Ft.</nav>
                    <nav><strong>Built In :</strong> <?php echo $apartment_built_in; ?></nav>
                    <nav><strong>Apartment Location :</strong> <?php echo $apartment_address; ?></nav>
                    <nav><button class='open-on-map'><i class="fa fa-map"></i> Open On Google Map</button></nav>
                </div>

                <div class="client-goal col-lg-12 walkthrough">
                    <p class="specs-heading">Apartment Walkthrough:</p>
                    <p></p>
                    <iframe src="<?php echo $apartment_video; ?>" title="<?php echo $apartment_page_title; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                </div><br>
                
                </div>
                
                <div class="col-lg-4">
                <span class="showSm"><hr></span>
                <div class="inquire-form-right">
                <div class="chat-agent">
                    <!-- <i class="fa fa-user-secret"></i> -->
                    <i class="fa fa-users"></i>
                    <div>
                        Message An Agent<br>
                        <a href="javascript:void(0);">View Agents</a>
                    </div>
                </div>
                <form action="" method="post">
                    <label>Full Name:</label>
                    <input type="text" name="name" placeholder="Name" required="">

                    <label>Email Address:</label>
                    <input type="email" name="email" placeholder="Email Address" required="">

                    <label>Phone Number:</label>
                    <input type="text" name="phone" placeholder="Phone No. (optional)">

                    <label>Apartment ID:</label>
                    <input type="text" name="property" class="bg-dim" value="<?php echo crc32($PageId); ?>" readonly>

                    <label>Message:</label>
                    <textarea placeholder='Message' rows="7" name="message" id="message"></textarea>
                    <button name="inquire">SUBMIT<span class="showBg"> MESSAGE</span></button>
                </form>
                <p>or</p>
                <div class="inquire-more">
                    <a href="" class="a-1"><i class='fa fa-phone'></i></a>
                    <a href="" class="a-2"><i class='fa fa-whatsapp'></i> Whatsapp</a>
                </div>
                </div>
                </div>
                </div>
                <!-- <br><hr><br> -->
                <div class="w3l-footer-29-main share-project" style="display: none;">
                    <div class="main-social-footer-29">
                    <p class="specs-heading">Share Project:</p>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $pageUrl; ?>" class="facebook"><span class="fa fa-facebook"></span></a>
                    <a href="https://twitter.com/intent/tweet?text=<?php echo $apartment_name.', '.$project_location; ?>&url=<?php echo $pageUrl; ?>" class="twitter"><span class="fa fa-twitter"></span></a>
                    <a href="https://www.pinterest.com/pin/create/button/?url=<?php echo $pageUrl; ?>&description=<?php echo $apartment_name.' - '.$project_location; ?>" class="google-plus"><span class="fa fa-pinterest"></span></a>
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

<!-- floater -->
<div class="inquire-main showSm">
    <div class="inquire-inputs">
        <div class="close-btn" id="close-btn">
            <button><i class="fa fa-close"></i></button>
        </div>
        <div id="response"></div>
        <form action="" method="post" class="inquire-form">
            <input type="text" name="name" id="name" placeholder="Name" required="">
            <input type="email" name="email" id="email" placeholder="Email Address" required="">
            <input type="text" name="phone" id="phone" placeholder="Phone No. (optional)">
            <input type="hidden" name="property" id="property" value="<?php echo crc32($PageId); ?>">
            <textarea placeholder='Message' rows="5" name="message" id="message"></textarea>
            <button name="inquire" id="inquire">SUBMIT</button>
        </form>
        <p>or</p>
        <div class="inquire-more">
            <a href="" class="a-1"><i class='fa fa-phone'></i></a>
            <a href="" class="a-2"><i class='fa fa-whatsapp'></i> Whatsapp</a>
        </div>
    </div>
    <div class="inquire-btn">
        <button><i class="fa fa-wechat"></i> Message Us</button>
    </div>
</div>
<!-- floater -->

<script src="/assets/js/gallery.js"></script>
<!-- <script src="/assets/js/modal.js"></script> -->
<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/js/lightbox-plus-jquery.min.js"></script>
<script>
    $(function () {
      $('.inquire-btn button').click(function () {
        $('.inquire-inputs').toggleClass('show');
        $(this).toggleClass("hide");
      })
    });
    $(function () {
      $('#close-btn button').click(function () {
        $('.inquire-inputs').toggleClass('show');
        $('.inquire-btn button').toggleClass("hide");
      })
    });
</script>

<!-- sell your property -->
<?php include 'sell.inc.php'; ?>
<!-- //sell your property -->

<!-- footer -->
<?php include 'footer.inc.php'; ?>
<!-- // footer -->

<script src="/assets/js/jquery-3.3.1.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>

<script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
      })
    });
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->



</body>
<script src="/assets/js/jquery.min.js"></script>
<script>
    function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    };

    $('#inquire').click(function(e){
        var delay = 2000;
        event.preventDefault();

        var name = $('#name').val();
        if(name == ''){
        $('#response').html(
        '<span style="color:red;">Enter Your Name!</span>'
        );
        $('#name').focus();
        return false;
        }

        var phone = $('#phone').val();
    
        var email = $('#email').val();
        if(email == ''){
        $('#response').html(
        '<span style="color:red;">Enter Email Address!</span>'
        );
        $('#email').focus();
        return false;
        }

        if( $("#email").val()!='' ){
        if( !isValidEmailAddress( $("#email").val() ) ){
        $('#response').html(
        '<span style="color:red;">Provided email address is incorrect!</span>'
        );
        $('#email').focus();
        return false;
        }
        }

        var message = $('#message').val();
        if(message == ''){
        $('#response').html(
        '<span style="color:red;">Enter Your Message!</span>'
        );
        $('#message').focus();
        return false;
        }

        var property = $('#property').val();
        if(property == ''){
        $('#response').html(
        '<span style="color:red;">Property Error!</span>'
        );
        $('#property').focus();
        return false;
        }

        $.ajax
        ({
        type: "POST",
        url: "ajax.inc.php",
        data: "name="+name+"&email="+email+"&message="+message+"&phone="+phone+"&property="+property,
        beforeSend: function() {
        $('#response').html(
        'Sending...'
        );
        },		 
        success: function(data)
        {
        setTimeout(function() {
        $('#response').html(data);
        }, delay);
        }
        });
                           

    });

</script>
<!-- jquery.min.js -->

</html>
<!-- // grids block 5 -->
