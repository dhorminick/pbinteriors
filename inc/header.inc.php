<section class="w3l-bootstrap-header">
  <nav class="navbar navbar-expand-lg navbar-light py-lg-3 py-2">
    <div class="container">
      <a class="navbar-brand" href="index.html"><span class="fa fa-info"> -</span> Architect</a>
      <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon fa fa-bars"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Our Projects
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/projects/apartments-for-rent">Apartments For Rent</a>
              <a class="dropdown-item" href="/projects/apartments-for-sale">Apartments For Sale</a>
              <a class="dropdown-item" href="/projects/all-apartments">All Apartments</a>
              <hr class='drop-hr'>
              <a class="dropdown-item" href="/projects/residential-interiors">Residential Interiors</a>
              <a class="dropdown-item" href="/projects/other-interiors">Other Interiors</a>
              <a class="dropdown-item" href="/projects/all-interiors">All Interiors</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/our-services">Our Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about-us">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact-us">Contact Us</a>
          </li>
        </ul>
        <?php include 'webdetails.inc.php'; ?>
        <div class="main-social-head showBg">
            <a href="https://facebook.com/<?php echo $facebook; ?>" class="facebook" target="_blank" style='background: #3b5998 !important;'><span class="fa fa-facebook"></span></a>
            <a href="https://twitter.com/<?php echo $twitter; ?>" class="twitter" target="_blank" style='background: #1da1f2 !important;'><span class="fa fa-twitter"></span></a>
            <a href="https://instagram.com/<?php echo $instagram; ?>" class="instagram" target="_blank" style='background: #c13584 !important;'><span class="fa fa-instagram"></span></a>
        </div>
      </div>
    </div>
  </nav>
</section>