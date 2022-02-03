<?php

  ini_set('display_errors', '0');
  ini_set('display_startup_errors', '0');
  error_reporting(E_ALL);

  $error="";
  $successMessage = "";
  
  if($_POST["submit"]) {
    if (!$_POST["name"] || $_POST["name"] == '') {
      $error .= "A name is required <br>";
    }
    if (!$_POST["email"] || $_POST["email"] == '') {
      $error .= "An email address is required <br>";
    }
    if (!$_POST["number"] || $_POST["number"] == '') {
      $error .= "A number is required <br>";
    }
    if (!$_POST["designation"] || $_POST["designation"] == '') {
      $error .= "A designation is required <br>";
    }
    if (!$_POST["company"] || $_POST["company"] == '') {
      $error .= "A company is required <br>";
    }

    if ($error != "") {
      $error = '<div class="alert alert-warning" role="alert"> <p> <strong>There were some error(s) in your form</strong> </p>' . $error . '</div>';
    } else {
      $emailTo = "sushantpatial18@gmail.com";
      $subject = "New Contact From Retail Eazy: " . $_POST["name"];
      $message = "<!DOCTYPE html>
      <html lang='en'>
        <head>
          <title>New Contact From Retail Eazy:" . $_POST["name"] . "</title>
        </head>
        <body>
          <h3>Name: " . $_POST["name"] . "<br>Email: " . $_POST["email"] . "<br>Number: " . $_POST["number"] . "<br>Designation: " . $_POST["designation"] . "<br>Company: " . $_POST["company"] . "</h3>
        </body>
      </html>";
      $headers .= 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $headers .= "From: Retail Eazy X-Mailer: PHP\r\n";
      $headers .= "X-Priority: 3\r\n";
      $headers .= "X-Mailer: PHP" . phpversion() ."\r\n";
      $retval = mail ($emailTo, $subject, $message, $headers);
  
      if ($retval == true) {
        $successMessage = '<div class="alert alert-success" role="alert"> <p> <strong>The email was sent successfully!</strong> </p></div>';
      } else {
        $error = '<div class="alert alert-warning" role="alert"> <p> <strong>Your message couldn\'t be sent. Please try again later.</strong> </p></div>';
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Retail Eazy</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/images/RetailEazyHighResolutionICON.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/stats.css">

</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.html"><img src="assets/images/RetailEazyHighResolutionICON.png"></a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#features">Features</a></li>
          <li><a class="nav-link scrollto" href="#blog">Blog</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="download">
        <ul>
          <li><a href="https://play.google.com/store/apps/details?id=in.retaileazy"><img src="assets/images/Android.png"></a></li>
          <li><a href="https://apps.apple.com/us/app/retail-eazy/id1550577652"><img src="assets/images/IOS.png"></a></li>
        </ul>
      </div>
    </div>
  </header><!-- End Header -->
  

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
  
    <video id="vid" autoplay loop muted>
    </video>

     <div class="container" data-aos="zoom-out">

      <img class="hero-logo" src="assets/images/Retail Eazy Inverse.png">
      
      <h1>Getting to your Retail with Each & Every Detail</h1>

  <!--   <div class="block">
        <span style="color: rgb(255, 255, 255); font-size: 20px;">End of </span><span class="header-sub-title"><span class="header-sub-title" id="word"></span><span class="header-sub-title blink">|</span></span>
      </div> --> 
      <a href="#contact" class="btn-get-started">FREE PRODUCT TOUR</a>
    </div>
   
  </section><!-- End Hero -->

  <a href="#contact"><button class="book-demo-btn">Book your demo!</button></a>

  <main id="main">

    <!-- ======= About Section ======= -->
    <div id="about">
      <section class="about section-bg">
        <div class="container" data-aos="fade-up">

          <div class="row no-gutters">
            <div class="content col-xl-5 d-flex align-items-stretch">
              <div class="content">
                <div class="section-title" style="padding-bottom: 0px; margin-bottom: -10px;">
                  <h2>Why <img src="assets/images/Retail Eazy Inverse.png"> <span>?</span></h2>
                </div>
                <img class="about-logo" src="assets/images/RetailEazyHighResolutionICON.png">
                <img style="margin-top:-160px; width: 230px; margin-bottom: 20px;" src="https://www.transparentpng.com/thumb/shadow/iuqEeA-shadow-png-pic-controlled-drugs-cabinets-from-pharmacy.png">
                <a href="#contact" class="about-btn"><span>FREE PRODUCT TOUR</span> <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
            <div class="col-xl-7 d-flex align-items-stretch">
              <div class="icon-boxes d-flex flex-column justify-content-center">
                <div class="row">
                  <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                    <i class="bi bi-people"></i>
                    <h4>End-to-end Management</h4>
                    <p>Maximizes visibility & control across the entire retail ecosystem.</p>
                  </div>
                  <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-box"></i>
                    <h4>Loyalty Mana​gement</h4>
                    <p>Bridges the gap between business & retailers by initiating long-term loyalty through incentivization.</p>
                  </div>
                  <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-shop"></i>
                    <h4>Retailer-influencer Management</h4>
                    <p>Build better relations with retailers by leveraging individually defined influencer initiatives.</p>
                  </div>
                  <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                    <i class="bi bi-file-earmark-check"></i>
                    <h4>Complete, Single-place Solution</h4>
                    <p>Brings together all the important features & functionalities under a single compresiv hood through integrations.</p>
                  </div>
                  
                </div>
              </div><!-- End .content-->
            </div>
          </div>

        </div>
      </section><!-- End About Section -->

      <!-- ======= Video Section ======= -->
      <section id="video" class="video" data-aos="fade-up">
        <div class="section-title">
          <h2>Some Short Video Tutorials</h2>
        </div>
        <div class="container">  
          <div class="screens">
            <img class="mobile" src="assets/images/phone.png">
            <img class="laptop" src="assets/images/laptop.png">
            <img class="tablet" src="assets/images/tablet.png">
          </div>
          <div class="videos">
            <div onclick="this.nextElementSibling.style.display='block'; this.style.display='none'">
              <img class="video1-thumb" src="assets/images/video-thumb-1.webp">
            </div>
            <div style="display:none">
              <iframe id="video1" class="video1" src="https://www.youtube.com/embed/s0ty0LRryNU?autoplay=1" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
            </div>

            <div onclick="this.nextElementSibling.style.display='block'; this.style.display='none'">
              <img class="video2-thumb" src="assets/images/video-thumb-2.webp">
            </div>
            <div style="display:none">
              <iframe id="video2" class="video2" src="https://www.youtube.com/embed/wsGZB63xW3U?autoplay=1" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
            </div>

            <div onclick="this.nextElementSibling.style.display='block'; this.style.display='none'">
              <img class="video3-thumb" src="assets/images/video-thumb-3.webp">
            </div>
            <div style="display:none">
              <iframe id="video3" class="video3" src="https://www.youtube.com/embed/4siwYXYZbEQ?autoplay=1" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
            </div>

          </div>
        </div>
        
      </section><!-- End Tabs Section -->
      

      <!-- ======= Services Section ======= -->
      <section id="services" class="services section-bg ">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Are You Facing These Problems?</h2>
          </div>

          <div class="services-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="services-wrap">
                  <div class="services-item">
                    <img src="assets/images/Problem1.webp" class="services-img" alt="Lack of Transparency in Pricing">
                    <h3>Lack of Transparency in Pricing and Schemes offered to Retailers</h3>
                  </div>
                </div>
              </div><!-- End services item -->
    
              <div class="swiper-slide">
                <div class="services-wrap">
                  <div class="services-item">
                    <img src="assets/images/Problem2.webp" class="services-img" alt="Irregular Retailer visits">
                    <h3>Irregular Retailer visits of​ Sales Person Resulting in Sales Loss</h3>
                  </div>
                </div>
              </div><!-- End services item -->

              <div class="swiper-slide">
                <div class="services-wrap">
                  <div class="services-item">
                    <img src="assets/images/Problem3.webp" class="services-img" alt="Low Engagement of Frontliners">
                    <h3>Low Engagement of Frontliners with retailer causing a dent in brand value</h3>
                  </div>
                </div>
              </div><!-- End services item -->

              <div class="swiper-slide">
                <div class="services-wrap">
                  <div class="services-item">
                    <img src="assets/images/Problem4.webp" class="services-img" alt="No transparency of ordering">
                    <h3>No transparency of ordering process till fulfilment of the Retailer</h3>
                  </div>
                </div>
              </div><!-- End services item -->

            </div>
            <div class="swiper-pagination"></div>
          </div>
    
        </div>
      </section><!-- End Services Section -->
    </div>

    
    <div id="features">
      <!-- ======= Waterfall Slider Section ======= -->
        <div class="waterfall2">
          <div class="slide-test slide-test1">

            <div class="test-slider-info">
              <h2>Retailer App</h2>
              <p>
                <span style="position: relative; bottom: 10px;">Complete Solution from Order to Fulfilment</span><br>
                <i class="fas fa-check"></i>&nbsp; Retailer Profiling & KYC<br>
                <i class="fas fa-check"></i>&nbsp; Product Catalogue<br>
                <i class="fas fa-check"></i>&nbsp; Scheme Notifications<br>
                <i class="fas fa-check"></i>&nbsp; Loyalty & Rewards Redemption<br>
              </p> 
            </div>

            <div class="test-slider-img">
              <img class="slide1-test-phone slide1-test-phone1" src="assets/images/waterfall/retail1.webp">
              <img class="slide1-test-phone slide1-test-phone2" src="assets/images/waterfall/retail2.webp">
              <img class="slide1-test-phone slide1-test-phone3" src="assets/images/waterfall/retail5.webp">
              <img class="slide1-test-phone slide1-test-phone4" src="assets/images/waterfall/retail6.webp">
              <img class="slide1-test-phone slide1-test-phone5" src="assets/images/waterfall/retail4.webp">
              <img class="slide1-test-phone slide1-test-phone6" src="assets/images/waterfall/retail7.webp">
              <img class="slide1-test-phone slide1-test-phone7" src="assets/images/waterfall/retail2.webp">
            </div>

          </div>

          <div class="slide-test slide-test2">

            <div class="test-slider-info">
              <h2>Lite DMS</h2>
              <p>
                <span style="position: relative; bottom: 10px;">DMS operated through mobile</span><br>
                <i class="fas fa-check"></i>&nbsp; Invoicing for Distributors<br>
                <i class="fas fa-check"></i>&nbsp; Scan based Order Management<br>
                <i class="fas fa-check"></i>&nbsp; Outlet Management<br>
                <i class="fas fa-check"></i>&nbsp; Ledger & Scheme Visibility<br>
                <i class="fas fa-check"></i>&nbsp; Interactive Dashboards<br>
              </p> 
            </div>

            <div class="test-slider-img">
              <img class="slide2-test-phone slide2-test-phone1" src="assets/images/waterfall/lite1.webp">
              <img class="slide2-test-phone slide2-test-phone2" src="assets/images/waterfall/lite2.webp">
            </div>

          </div>

          <div class="slide-test slide-test3"> 

            <div class="test-slider-info">
              <h2>Distributor App</h2>
              <p>
                <span style="position: relative; bottom: 10px;">App for Rural or Small Distributors</span><br>
                <i class="fas fa-check"></i>&nbsp; Visibility of Tally/ Busy Data<br>
                <i class="fas fa-check"></i>&nbsp; Scheme Alerts<br>
                <i class="fas fa-check"></i>&nbsp; Ledger Tracking<br>
                <i class="fas fa-check"></i>&nbsp; Loyalty Notifications<br>
                <i class="fas fa-check"></i>&nbsp; Inventory Dashboards<br>
              </p> 
            </div>

            <div class="test-slider-img">
              <img class="slide3-test-phone slide3-test-phone1" src="assets/images/waterfall/distributor2.webp">
              <img class="slide3-test-phone slide3-test-phone2" src="assets/images/waterfall/distributor4.webp">
              <img class="slide3-test-phone slide3-test-phone3" src="assets/images/waterfall/distributor3.webp">
              <img class="slide3-test-phone slide3-test-phone4" src="assets/images/waterfall/distributor1.webp">
              <img class="slide3-test-phone slide3-test-phone5" src="assets/images/waterfall/distributor4.webp">
            </div>
          </div>

          <div class="slide-test slide-test4">

            <div class="test-slider-info">
              <h2>Manager App</h2>
              <p>
                <span style="position: relative; bottom: 10px;">Reporting of distributor’s sales, purchase & inventory</span><br>
                <i class="fas fa-check"></i>&nbsp; Target vs Actual Analysis<br>
                <i class="fas fa-check"></i>&nbsp; Informative Dashboards & Graphs<br>
              </p> 
            </div>

            <div class="test-slider-img">
              <img class="slide4-test-phone-frame" src="assets/images/waterfall/manager-frame.webp">
              <div class="swiper slide4-test-swiper">
                <div class="swiper-wrapper">
                  <div class="swiper-slide"><img src="assets/images/waterfall/manager1.webp"></div>
                  <div class="swiper-slide"><img src="assets/images/waterfall/manager2.webp"></div>
                  <div class="swiper-slide"><img src="assets/images/waterfall/manager3.webp"></div>
                  <div class="swiper-slide"><img src="assets/images/waterfall/manager4.webp"></div>
                </div>
                <div class="swiper-pagination2" style="bottom: 10%;"></div>
              </div>
            </div>
          </div>

        </div>
        

        <!-- ======= Waterfall Slider Section Mobile======= -->

          <div class="waterfall-mobile">
            <div class="slide-mobile slide-mobile1">

              <div class="mobile-swiper-info">
                <h2>Retailer App</h2>
                <p>
                  <span style="position: relative; bottom: 10px;">Complete Solution from Order to Fulfilment</span><br>
                  <i class="fas fa-check"></i>&nbsp; Retailer Profiling & KYC<br>
                  <i class="fas fa-check"></i>&nbsp; Product Catalogue<br>
                  <i class="fas fa-check"></i>&nbsp; Scheme Notifications<br>
                  <i class="fas fa-check"></i>&nbsp; Loyalty & Rewards Redemption<br>
                </p> 
              </div>

              <div class="mobile-slider-img">
                <img class="slide1-mobile-phone slide1-mobile-phone1" src="assets/images/waterfall/retail1.webp">
                <img class="slide1-mobile-phone slide1-mobile-phone2" src="assets/images/waterfall/retail2.webp">
                <img class="slide1-mobile-phone slide1-mobile-phone3" src="assets/images/waterfall/retail5.webp">
                <img class="slide1-mobile-phone slide1-mobile-phone4" src="assets/images/waterfall/retail6.webp">
                <img class="slide1-mobile-phone slide1-mobile-phone5" src="assets/images/waterfall/retail4.webp">
                <img class="slide1-mobile-phone slide1-mobile-phone6" src="assets/images/waterfall/retail7.webp">
                <img class="slide1-mobile-phone slide1-mobile-phone7" src="assets/images/waterfall/retail3.webp">
              </div>

            </div>

            <div class="slide-mobile slide-mobile2">

              <div class="mobile-swiper-info">
                <h2>Lite DMS</h2>
                <p>
                  <span style="position: relative; bottom: 10px;">DMS operated through mobile</span><br>
                  <i class="fas fa-check"></i>&nbsp; Invoicing for Distributors<br>
                  <i class="fas fa-check"></i>&nbsp; Scan based Order Management<br>
                  <i class="fas fa-check"></i>&nbsp; Outlet Management<br>
                  <i class="fas fa-check"></i>&nbsp; Ledger & Scheme Visibility<br>
                  <i class="fas fa-check"></i>&nbsp; Interactive Dashboards<br>
                </p> 
              </div>

              <div class="mobile-slider-img">
                <img class="slide2-mobile-phone slide2-mobile-phone1" src="assets/images/waterfall/lite1.webp">
                <img class="slide2-mobile-phone slide2-mobile-phone2" src="assets/images/waterfall/lite2.webp">
              </div>

            </div>

            <div class="slide-mobile slide-mobile3"> 

              <div class="mobile-swiper-info">
                <h2>Distributor App</h2>
                <p>
                  <span style="position: relative; bottom: 10px;">App for Rural or Small Distributors</span><br>
                  <i class="fas fa-check"></i>&nbsp; Visibility of Tally/ Busy Data<br>
                  <i class="fas fa-check"></i>&nbsp; Scheme Alerts<br>
                  <i class="fas fa-check"></i>&nbsp; Ledger Tracking<br>
                  <i class="fas fa-check"></i>&nbsp; Loyalty Notifications<br>
                  <i class="fas fa-check"></i>&nbsp; Inventory Dashboards<br>
                </p> 
              </div>

              <div class="mobile-slider-img">
                <img class="slide3-mobile-phone slide3-mobile-phone1" src="assets/images/waterfall/distributor4.webp">
                <img class="slide3-mobile-phone slide3-mobile-phone2" src="assets/images/waterfall/distributor2.webp">
                <img class="slide3-mobile-phone slide3-mobile-phone3" src="assets/images/waterfall/distributor3.webp">
                <img class="slide3-mobile-phone slide3-mobile-phone4" src="assets/images/waterfall/distributor1.webp">
                <img class="slide3-mobile-phone slide3-mobile-phone5" src="assets/images/waterfall/distributor4.webp">
              </div>
            </div>

            <div class="slide-mobile slide-mobile4">

              <div class="mobile-swiper-info">
                <h2>Manager App</h2>
                <p>
                  <span style="position: relative; bottom: 10px;">Reporting of distributor’s sales, purchase & inventory</span><br>
                  <i class="fas fa-check"></i>&nbsp; Target vs Actual Analysis<br>
                  <i class="fas fa-check"></i>&nbsp; Informative Dashboards & Graphs<br>
                </p> 
              </div>

              <div class="mobile-slider-img" style="min-height: 650px">
                <img class="slide4-mobile-phone-frame" src="assets/images/waterfall/manager-frame.webp">
                <div class="swiper slide4-mobile-swiper">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="assets/images/waterfall/manager1.webp"></div>
                    <div class="swiper-slide"><img src="assets/images/waterfall/manager2.webp"></div>
                    <div class="swiper-slide"><img src="assets/images/waterfall/manager3.webp"></div>
                    <div class="swiper-slide"><img src="assets/images/waterfall/manager4.webp"></div>
                  </div>
                  <div class="swiper-pagination2"></div>
                </div>
              </div>
            </div>

          </div>
        </section>
      
    

      <!-- ======= Features Section ======= -->
        <section class="features">
          <div class="section-title" data-aos="fade-up">
            <h2>Retail Eazy, Your go to Solution</h2>
          </div>

          <img class="features-img" src="assets/images/features.jpg">

        </section><!-- End of Carousel Section -->

        <!-- ======= Stats Section ======= -->
        <section id="counts" class="counts" style="padding-bottom: 0px;">

          <div id="stats-box" data-aos="fade-up">

            <div class="sec-1">
              <div class="text-img">
                <div id="particles-js">
                  <canvas class="particles-js-canvas-el" width="410" height="380" style="width: 100%; height: 100%;">
                </div>
                <span class="years"><div class="counting" data-count="14">0</div></span>
              </div>
          
              <div class="experience">
                <h2>Years of Excellence</h2>
                <h6>EAZY Business Solutions was incorporated in 2007 with a vision to provide best IT Service solution via its bouquet of products like Eazy ERP, Eazy DMS, Eazy CRM, Retail Eazy to name a few.</h6>
                <button class="button button--mimas"><span>Know More</span></button>
              </div>
            </div>
      
            <div class="sec-2">
              <div class="stats">
                <i class="fas fa-handshake"></i>
                <div class="counter-flex">
                  <div class="counting" data-count="70">0</div><span>+</span>
                </div>
                <h5>Brands</h5>
              </div>
      
              <div class="stats">
                <i class="fas fa-users"></i>
                <div class="counter-flex">
                  <div class="counting" data-count="200">0</div><span>+</span>
                </div>
                <h5>Employees</h5>
              </div>
              
              <div class="stats">
                <i class="fas fa-shipping-fast"></i>
                <div class="counter-flex">
                  <div class="counting" data-count="15000">0</div><span>+</span>
                </div>
                <h5>Distributors</h5>
              </div>
                
              <div class="stats">
                <i class="fas fa-shopping-cart"></i>
                <div class="counter-flex">
                  <div class="counting" data-count="2000">0</div><span>+</span>
                </div>
                <h5>Retailers</h5>
              </div>
            </div>
          </div>

        </section><!-- End Counts Section -->

        <!-- Multi App Section -->
        <section id="app" class="multi section-bg">
          <div class="section-title" data-aos="fade-up">
            <h2>Retail Eazy - Multi App</h2>
          </div>
        </section><!-- End of Multi App Section -->

    </div>

      <div id="blog">
        <!-- Blogs Section -->
        <section class="blogs" style="padding: 0;">
          <div class="container my-5">
            <div class="section-title" data-aos="fade-up">
              <h2>Recent Blogs</h2>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-6 p-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                <div class="border">
                  <div class="blog-img position-relative w-100">
                    <div class="blog-date position-absolute text-white d-flex flex-column justify-content-center align-items-center rounded-circle">
                      <small>27</small>
                      <small><b>NOV</b></small>
                    </div>
                    <a href="#" class="blog-read-more position-absolute px-3 py-2 text-white"><small>READ MORE</small></a>
                  </div>
                  <div class="px-3 pt-4 pb-3">
                    <a href="#" class="d-inline-block"><h4 class="blog-heading text-dark">Lorem ipsum dolor sit amet.</h4></a>
                    <p class="tex-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam aspernatur numquam, quod nulla...</p>
                    <div class="d-flex mt-4">
                      <div class="d-flex align-items-center mr-4">
                        <svg height="16px" class="mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          viewBox="0 0 300.988 300.988" style="enable-background:new 0 0 300.988 300.988;" xml:space="preserve">
                        <g>
                          <g>
                            <path d="M150.494,0.001C67.511,0.001,0,67.512,0,150.495s67.511,150.493,150.494,150.493s150.494-67.511,150.494-150.493
                              S233.476,0.001,150.494,0.001z M150.494,285.987C75.782,285.987,15,225.206,15,150.495S75.782,15.001,150.494,15.001
                              s135.494,60.782,135.494,135.493S225.205,285.987,150.494,285.987z"/>
                            <polygon points="142.994,142.995 83.148,142.995 83.148,157.995 157.994,157.995 157.994,43.883 142.994,43.883 		"/>
                          </g>
                        </svg>
                        <small class="blog-read-time mt-1">6 - 10 mins read</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-3 col-md-6 p-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="border">
                  <div class="blog-img position-relative w-100">
                    <div class="blog-date position-absolute text-white d-flex flex-column justify-content-center align-items-center rounded-circle">
                      <small>27</small>
                      <small><b>NOV</b></small>
                    </div>
                    <a href="#" class="blog-read-more position-absolute px-3 py-2 text-white"><small>READ MORE</small></a>
                  </div>
                  <div class="px-3 pt-4 pb-3">
                    <a href="#" class="d-inline-block"><h4 class="blog-heading text-dark">Lorem ipsum dolor sit amet.</h4></a>
                    <p class="tex-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam aspernatur numquam, quod nulla...</p>
                    <div class="d-flex mt-4">
                      <div class="d-flex align-items-center mr-4">
                        <svg height="16px" class="mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          viewBox="0 0 300.988 300.988" style="enable-background:new 0 0 300.988 300.988;" xml:space="preserve">
                        <g>
                          <g>
                            <path d="M150.494,0.001C67.511,0.001,0,67.512,0,150.495s67.511,150.493,150.494,150.493s150.494-67.511,150.494-150.493
                              S233.476,0.001,150.494,0.001z M150.494,285.987C75.782,285.987,15,225.206,15,150.495S75.782,15.001,150.494,15.001
                              s135.494,60.782,135.494,135.493S225.205,285.987,150.494,285.987z"/>
                            <polygon points="142.994,142.995 83.148,142.995 83.148,157.995 157.994,157.995 157.994,43.883 142.994,43.883 		"/>
                          </g>
                        </svg>
                        <small class="blog-read-time mt-1">6 - 10 mins read</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 p-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                <div class="border">
                  <div class="blog-img position-relative w-100">
                    <div class="blog-date position-absolute text-white d-flex flex-column justify-content-center align-items-center rounded-circle">
                      <small>27</small>
                      <small><b>NOV</b></small>
                    </div>
                    <a href="#" class="blog-read-more position-absolute px-3 py-2 text-white"><small>READ MORE</small></a>
                  </div>
                  <div class="px-3 pt-4 pb-3">
                    <a href="#" class="d-inline-block"><h4 class="blog-heading text-dark">Lorem ipsum dolor sit amet.</h4></a>
                    <p class="tex-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam aspernatur numquam, quod nulla...</p>
                    <div class="d-flex mt-4">
                      <div class="d-flex align-items-center mr-4">
                        <svg height="16px" class="mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          viewBox="0 0 300.988 300.988" style="enable-background:new 0 0 300.988 300.988;" xml:space="preserve">
                        <g>
                          <g>
                            <path d="M150.494,0.001C67.511,0.001,0,67.512,0,150.495s67.511,150.493,150.494,150.493s150.494-67.511,150.494-150.493
                              S233.476,0.001,150.494,0.001z M150.494,285.987C75.782,285.987,15,225.206,15,150.495S75.782,15.001,150.494,15.001
                              s135.494,60.782,135.494,135.493S225.205,285.987,150.494,285.987z"/>
                            <polygon points="142.994,142.995 83.148,142.995 83.148,157.995 157.994,157.995 157.994,43.883 142.994,43.883 		"/>
                          </g>
                        </svg>
                        <small class="blog-read-time mt-1">6 - 10 mins read</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 p-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <div class="border">
                  <div class="blog-img position-relative w-100">
                    <div class="blog-date position-absolute text-white d-flex flex-column justify-content-center align-items-center rounded-circle">
                      <small>27</small>
                      <small><b>NOV</b></small>
                    </div>
                    <a href="#" class="blog-read-more position-absolute px-3 py-2 text-white"><small>READ MORE</small></a>
                  </div>
                  <div class="px-3 pt-4 pb-3">
                    <a href="#" class="d-inline-block"><h4 class="blog-heading text-dark">Lorem ipsum dolor sit amet.</h4></a>
                    <p class="tex-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam aspernatur numquam, quod nulla...</p>
                    <div class="d-flex mt-4">
                      <div class="d-flex align-items-center mr-4">
                        <svg height="16px" class="mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          viewBox="0 0 300.988 300.988" style="enable-background:new 0 0 300.988 300.988;" xml:space="preserve">
                        <g>
                          <g>
                            <path d="M150.494,0.001C67.511,0.001,0,67.512,0,150.495s67.511,150.493,150.494,150.493s150.494-67.511,150.494-150.493
                              S233.476,0.001,150.494,0.001z M150.494,285.987C75.782,285.987,15,225.206,15,150.495S75.782,15.001,150.494,15.001
                              s135.494,60.782,135.494,135.493S225.205,285.987,150.494,285.987z"/>
                            <polygon points="142.994,142.995 83.148,142.995 83.148,157.995 157.994,157.995 157.994,43.883 142.994,43.883 		"/>
                          </g>
                        </svg>
                        <small class="blog-read-time mt-1">6 - 10 mins read</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="button button--dione"><span>More Blogs</span></button>
          </div>
        </section><!-- End of Blogs Section -->
      </div>

      <div id="contact">

        <!-- Contact Section -->
        <section class="contact section-bg">
          <div class="section-title" data-aos="fade-up">
            <h2>Contact Us</h2>
          </div>
          
          <div class="container">
            <div class="row">
    
              <div class="col-lg-7" data-aos="fade-up">
    
                <div class="row">
                  <div class="col-md-6">
                    <div class="info-box">
                      <i class="bi bi-geo-alt"></i>
                      <h3>REACH US</h3>
                      <p class=" address">Eazy ERP Technologies Pvt. Ltd.,<br>Head Office: 219-220, 2nd Floor,<br>Vipul Agora, MG Road, Gurgaon,<br>Haryana-122002, India</p>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="info-box">
                      <i class="bi bi-map"></i>
                      <iframe class="address-map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14028.059735537441!2d77.0853187!3d28.4790969!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x768d479b7925f122!2sEAZY%20Business%20Solutions%20Gurgaon!5e0!3m2!1sen!2sin!4v1637319922308!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="info-box mt-4">
                      <i class="bi bi-telephone"></i>
                      <h3>CONTACT US</h3>
                      <p>
                        <a href="tel:+91 87 4588 5500">+91 87 4588 5500</a><br>
                        <a href="tel:+91 12 4479 4479">+91 12 4479 4479</a><br>
                        <a href="tel:+91 813 088 5533">+91 813 088 5533</a>
                    </div>
                  </div>
    
                  <div class="col-md-6">
                    <div class="info-box mt-4">
                      <i class="bi bi-envelope"></i>
                      <h3>EMAIL US</h3>
                      <p>
                        <a href="mailto:contact@eazydms.com">contact@eazydms.com</a>
                      </p>
                    </div>
                  </div>
                </div>
    
              </div>
    
              <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                <form method="post" role="form">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="number" id="number" placeholder="Number" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="designation" id="designation" placeholder="Designation" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="company" id="company" placeholder="Company" required>
                  </div>
            
                  <div class="text-center"><input type="submit" name="submit" class="button-submit" value="SUBMIT"></div>
                </form>
                <div id="error" style="margin-top: 30px;"> <? echo $error.$successMessage; ?> </div>
              </div>
            </div>
          </div>
      
        </section>

        <!-- Other Offices Section -->
        <section class="other-offices">
          <div class="section-title" style="margin-top: 50px;" data-aos="fade-up">
            <h2>Our Other Offices</h2>
          </div>

            <div class="row">

              <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-delay="0">
                <div class="office">
                  <h4>Maharashtra</h4>
                  <div class="office-item">
                    <i class="fas fa-map"></i>
                    <h6>
                      B - Wing, 5th Floor,<br>
                      Ackruti Trade Centre,<br>
                      MIDC, Andheri (E),<br>
                      Mumbai - 400093, India
                    </h6>
                  </div>
                  <div class="office-item">
                    <i class="fas fa-user"></i>
                    <h6>
                      Preety Manderna
                    </h6>
                  </div>
                  <div class="office-item">
                    <i class="fas fa-phone-alt"></i>
                    <h6>
                      <a href="tel:+91 874 588 2200">+91 874 588 2200</a>
                    </h6>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-delay="50">
                <div class="office">
                  <h4>Ahmedabad</h4>
                  <div class="office-item">
                    <i class="fas fa-map"></i>
                    <h6>
                      6th Floor, Shree Krishna,<br>
                      Centre Near Mithakali,<br>
                      Six Road, Navrangpura,<br>
                      Ahmedabad – 380009, India
                    </h6>
                  </div>
                  <div class="office-item">
                    <i class="fas fa-user"></i>
                    <h6>
                      Mukesh Gupta
                    </h6>
                  </div>
                  <div class="office-item">
                    <i class="fas fa-phone-alt"></i>
                    <h6>
                      <a href="tel:+91 874 388 3300">+91 874 388 3300</a>
                    </h6>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                <div class="office">
                  <h4>Bangalore</h4>
                  <div class="office-item">
                    <i class="fas fa-map"></i>
                    <h6>
                      1st Floor, Gopala<br>
                      Krishna Complex #453,<br>
                      Residency Road,<br>
                      Bengaluru-560025, India
                    </h6>
                  </div>
                  <div class="office-item">
                    <i class="fas fa-user"></i>
                    <h6>
                      Sahil
                    </h6>
                  </div>
                  <div class="office-item">
                    <i class="fas fa-phone-alt"></i>
                    <h6>
                      <a href="tel:+91 990 131 7861">+91 990 131 7861</a>
                    </h6>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-delay="150">
                <div class="office">
                  <h4>Nigeria</h4>
                  <div class="office-item">
                    <i class="fas fa-map"></i>
                    <h6>
                      Flat 101, B11,<br>
                      1004 Estate,<br>
                      Victoria Island,<br>
                      Lagos, Nigeria
                    </h6>
                  </div>
                  <div class="office-item">
                    <i class="fas fa-user"></i>
                    <h6>
                      Murlidhar Prasad
                    </h6>
                  </div>
                  <div class="office-item">
                    <i class="fas fa-phone-alt"></i>
                    <h6>
                      <a href="tel:+234 907 585 1441">+234 907 585 1441</a>
                    </h6>
                  </div>
                </div>
              </div>
              
            </div>
        
        </section>

      </div>
      

        
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer>
    <div class="footer-top">

      <div class="container">
        <div class="row">

          <div class="col-lg-2 col-md-4 footer-logo container2">
            <a href="#">
              <img src="assets/images/RetailEazyHighResolutionICON.png">
            </a>
          </div>

          <div class="col-lg-3 col-md-4 footer-links container2">
            <h3>USEFUL LINKS</h3>
            <div class="useful-links">
              <ul class="">
                <li><i class="fas fa-chevron-right"></i> <a href="#hero">Home</a></li>
                <li><i class="fas fa-chevron-right"></i> <a href="#about">About us</a></li>
                <li><i class="fas fa-chevron-right"></i> <a href="#video">video</a></li>
                <li><i class="fas fa-chevron-right"></i> <a href="#services">Services</a></li>
              </ul>
              <ul class="">
                <li><i class="fas fa-chevron-right"></i> <a href="#features">Features</a></li>
                <li><i class="fas fa-chevron-right"></i> <a href="#app">App</a></li>
                <li><i class="fas fa-chevron-right"></i> <a href="#blogs">Apps</a></li>
                <li><i class="fas fa-chevron-right"></i> <a href="#contact">Contact</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-3 col-md-4 container2">

            <h3>OTHER PRODUCTS</h3>
            <div class="other-icons">
              <a href="https://www.eazyerp.com/"><img src="assets/images/ERP.png"></a>
              <a href="https://www.eazydms.com/"><img src="assets/images/RETAIL.png"></a>
              <a href="https://www.eazyerp.com/eazy-crm.php"><img src="assets/images/CRM.png"></a>
              <a href="https://www.eazyerp.com/eazy-pay.php"><img src="assets/images/PAY.png"></a>
            </div>

            <h3>FOLLOW US</h3>
            <div class="footer-icons">
              <a href="https://www.facebook.com/eazyerp"><div class="footer-icon" style=" background-color: #3B5998;"><i class="fab fa-facebook-f"></i></div></a>
              <a href="https://twitter.com/eazyerp"><div class="footer-icon" style="background-color: #55ACEE;"><i class="fab fa-twitter"></i></div></a>
              <a href="https://www.youtube.com/channel/UCiAOxBYpm4VCZqhKQI3dZNw/videos"><div class="footer-icon" style="background-color: #e7292c;"><i class="fab fa-youtube"></i></div></a>
              <a href="https://in.linkedin.com/company/eazy-business-solutions"><div class="footer-icon" style="background-color: #007AB9;"><i class="fab fa-linkedin-in"></i></div></a>
            </div>

          </div>

          <div class="col-lg-4 col-md-12 container2">
            <h3>DOWNLOAD</h3>
            <div class="footer-downloads">
              <a href="https://play.google.com/store/apps/details?id=in.retaileazy"><img class="playstore" src="assets/images/googleplay.png"></a>
              <a href="https://apps.apple.com/us/app/retail-eazy/id1550577652"><img class="appstore" src="assets/images/appstore.png"></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="d-md-flex py-4" style="background-color: #020e27;">
      <div class="copyright">
        &copy; Copyright <strong>Retail Eazy</strong> 2021. All Rights Reserved
      </div>
    </div>
  </footer>
  
  <a href="#hero" class="back-to-top d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <!-- Particles.js and app.js -->
	<script src="assets/js/particles.js"></script>
  <!-- JS Files -->
  <script src="assets/js/main.js"></script>

  <!-- Remove Form Resubmit on Refresh -->
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
  </script>

</body>

</html>