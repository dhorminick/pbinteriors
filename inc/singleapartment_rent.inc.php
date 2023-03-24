<?php 
    include 'database.inc.php';
    $PageId = '#PAGE-72E66C6AA890729';
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

    <title>PbInteriors | Portfolio | <?php echo ucwords($page_title) ?></title>
    <meta name="description" content="<?php echo $portfolio_desc; ?>" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="PbInteriors | Portfolio | <?php echo ucwords($page_title); ?>" />
    <meta property="og:description" content="<?php echo $portfolio_desc; ?>" />
    <meta property="og:url" content="<?php echo $domainUrl;?>/portfolio/<?php echo $portfolio_link;?>" />
    <meta property="og:site_name" content="PbInteriors" />
    <meta property="article:publisher" content="https://www.facebook.com/GraceInteriorDesigns/" />
    <meta property="og:image" content="<?php echo $domainUrl;?>/assets/images/image.jpg" />
    <meta property="og:image:width" content="1199" />
    <meta property="og:image:height" content="800" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="2 minutes" />
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
                <div class="heading text-center mx-auto mb-5">
                    <h3 class="head">Apartment Gallery</h3>
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
                    <h3 class="head">Apartment Specifications</h3>
                    <hr>
                </div>
                <div class='row'>
                <div class='col-lg-8'>
                <div class="property-overview-wrap property-section-wrap" id="property-overview-wrap" style="display: none;">
                    <div class="block-wrap">
                        <div class="block-title-wrap d-flex justify-content-between align-items-center">
                            <p class="specs-heading">Overview:</p>
                        </div>
                        <hr>
                    <div class="d-flex property-overview-data">
                        <ul class="list-unstyled flex-fill">
                            <li class="property-overview-item">1 Bedroom, Residential</li>
                            <li class="hz-meta-label property-overview-type"><strong>Property Type</strong></li>
                        </ul>
                        <ul class="list-unstyled flex-fill">
                            <li class="property-overview-item">
                                <i class="houzez-icon icon-hotel-double-bed-1 mr-1"></i> 1 
                            </li>
                            <li class="hz-meta-label h-beds"><strong>Bedroom</strong></li>
                        </ul>
                        <ul class="list-unstyled flex-fill">
                            <li class="property-overview-item">
                                <i class="houzez-icon icon-bathroom-shower-1 mr-1"></i> 2
                            </li><li class="hz-meta-label h-baths"><strong>Bathrooms</strong></li>
                        </ul>
                        <ul class="list-unstyled flex-fill">
                            <li class="property-overview-item">
                                <i class="houzez-icon icon-real-estate-dimensions-plan-1 mr-1"></i> 765.1
                            </li>
                            <li class="hz-meta-label h-area"><strong>Sq Ft</strong></li>
                        </ul>
                        <ul class="list-unstyled flex-fill">
                            <li class="property-overview-item">
                                <i class="houzez-icon icon-calendar-3 mr-1"></i> 2021
                            </li>
                            <li class="hz-meta-label h-year-built"><strong>Year Built</strong></li>
                        </ul> 
                    </div>
                    </div>
                </div>
                <div class="project">
                    <p class="specs-heading">Description:</p>
                    <p>
                        One Bedroom well established apartment with inspiring design located strategically 
                        near the junction of Al Khail Road and Sheikh Mohammed Bin Zayed Road at Jumeirah 
                        Village Circle (JVC) in Dubai. The apartment is located at the heart of Dubai, its 
                        neighborhood connectivity with some of most happening places like Downtown Dubai, 
                        popular malls and airports.
                    </p>
                </div>
                <!-- specifications -->
                <div class="row">
                <!-- exclusive offer -->
                <div class="client-goal col-lg-6">
                    <p class="specs-heading">Apartment Exclusives:</p>
                    <p></p>
                    <ul class="listing-main">
                        <li class="li">Starting price AED 1,100,000 or $301,000</li>
                        <li class="li">Pay 10% and move-in.</li>
                        <li class="li">Availability: 2 bedrooms (7 Slots left)</li>
                        <li class="li">Earn over 12,000 USD annually as rental income.</li>
                        <li class="li">Handover by June 2022.</li>
                        <li class="li">90% installment in 6 years post-handover payment plan.</li>
                        <li class="li">4% DLD waiver.</li>
                        <li class="li">Renewable lifetime residence visa qualification.</li>
                    </ul>
                </div>

                <!-- highlights -->
                <div class="client-goal col-lg-6">
                    <p class="specs-heading">Apartment Highlights:</p>
                    <p></p>
                    <ul class="listing-main">
                        <li class="li">Brand New</li>
                        <li class="li">One Bed Apt</li>
                        <li class="li">2 Bathrooms</li>
                        <li class="li">Basement parking</li>
                        <li class="li">Street view</li>
                        <li class="li">Painted inside and outside</li>
                        <li class="li">Well maintained</li>
                        <li class="li">Large living room</li>
                    </ul>
                </div>

                <!-- features -->
                <div class="client-goal col-lg-6">
                    <p class="specs-heading">Apartment Features & Amenities:</p>
                    <p></p>
                    <ul class="listing-main">
                        <li class="li">24 hours Security</li>
                        <li class="li">Children’s Playing area</li>
                        <li class="li">Gym, Health Club</li>
                        <li class="li">Swimming Pool</li>
                        <li class="li">Exquisite Design</li>
                    </ul>
                </div>
                <?php 
                    if($client_testimony != null || $client_testimony != ''){
                ?>
                <!-- location benefits -->
                <div class="client-goal col-lg-6">
                    <p class="specs-heading">Property Location Benefits:</p>
                    <p></p>
                    <ul class="listing-main">
                        <li class="li">Dubai International Airport, 23-minutes away</li>
                        <li class="li">Downtown Dubai, 20-minutes drive away</li>
                        <li class="li">Dubai Media City, 14-minutes away</li>
                        <li class="li">Dubai Internet City is reachable in 13-minutes</li>
                        <li class="li">Dubai Marina is 16-minutes away</li>
                    </ul>
                </div>
                <?php }else{} ?>
                
                <!-- overview -->
                <div class="client-goal col-lg-6">
                    <p class="specs-heading">Apartment Overview:</p>
                    <p></p>
                    <nav><strong>Price :</strong> AED 60,000 <strong>(Per Night)</strong></nav>
                    <nav><strong>Security Deposit :</strong> 5%</nav>
                    <!-- <nav><strong>Commission :</strong> Applicable</nav> -->
                    <!-- <nav><strong>Available For Viewing :</strong> Yes</nav> -->
                    <nav><strong>Apartment Status :</strong> For Rent</nav>
                    <nav><strong>Apartment Type :</strong> 1 Bedroom, 2 Bathroom, Residential</nav>
                    <nav><strong>Apartment Size :</strong> 765.1 Square Ft.</nav>
                    <nav><strong>Built In :</strong> 2021</nav>

                    <nav><strong>Apartment Location :</strong> The junction of Al Khail Road and Sheikh Mohammed Bin Zayed Road at Jumeirah Village Circle (JVC) in Dubai.</nav>
                    <nav><button class='open-on-map'><i class="fa fa-map"></i> Open On Google Map</button></nav>
                </div>

                <div class="client-goal col-lg-12 walkthrough">
                    <p class="specs-heading">Apartment Walkthrough:</p>
                    <p></p>
                    <iframe src="https://www.youtube.com/embed/XA77JF9F_sg" title="Brand New and Fully Furnished One Bed apartment for rent in JVC" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                </div><br>
                <div id="mpopupBox" class="mpopup" style="display:none;">
                    <!-- Modal content -->
                    <div class="modal-content custom">
                        <div class="modal-hader">
                            <span class="close">×</span>
                        </div>
                        <div class="modal-body">
                        <iframe src="https://www.youtube.com/embed/XA77JF9F_sg" title="Brand New and Fully Furnished One Bed apartment for rent in JVC" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <!-- <div class="walkthrough col-lg-7"><iframe></iframe></div> -->
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
                <?php } ?>
                <!-- <br><hr><br> -->
                <div class="w3l-footer-29-main share-project" style="display: none;">
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
