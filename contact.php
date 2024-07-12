<?php 
include('config.php');

if($_SERVER["REQUEST_METHOD"] == "POST") 
{    
    $fullname  = mysqli_real_escape_string($conn,$_POST['fullname']);  
    $email  = mysqli_real_escape_string($conn,$_POST['email']);   
    $message1  = mysqli_real_escape_string($conn,$_POST['message']);
    $subject1 = mysqli_real_escape_string($conn,$_POST['subject']);
  
    date_default_timezone_set('West African Time');      
    $Date = date("M j, Y"); 
    $date_uploaded = $Date;
     
    $sqlx = "INSERT INTO contact_kdm (fullname, email, subject, message, date_uploaded) VALUES ('{$fullname}', '{$email}', '{$subject1}', '{$message1}', '{$date_uploaded}')";



$to      = $email; // Send email to our user
$subject = 'KnowDemWell Info'; // Give the email a subject 
$img = "https://icoderesources.com.ng/knowdemwell/assets/images/banner44.png";
$message = "<img src='$img'/><br><p><br>";
$message .= '
  
<center><strong><font size="12">Welcome to KnowDemWell</font></strong></center><br><p>
<p>Hello '.$fullname.',</p>
<p>You have just sent a message to KnowDemWell Admin via our website. We would revert back to you shortly.</p>
<p>We hope you’ll have a wonderful time using our platform.</p>

<p><br></p>
<p>Warm Regards,<br>KnowDemWell Admin</p>

 
'; // Our message above including the link
                      
$headers = 'From:noreply@knowdemwell.org' . implode("\r\n", [
  "MIME-Version: KnowDemWell",
  "Content-type: text/html; charset=utf-8"
]); // Set from headers


$secretKey = "6LfzoRwpAAAAAEgV7R8KyUTQQYSjKsyJcLFIYXm9";
$responseKey = $_POST['g-recaptcha-response'];
$UserIP = $_SERVER['REMOTE_ADDR'];
$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";

$response= file_get_contents($url);
$response= json_decode($response);

      if ($response->success && mysqli_query($conn,$sqlx))
      {
        mail($to, $subject, $message, $headers); // Send our email
        
$to      = 'adeyeunimoleayo@gmail.com'; // Send email to our user
$subject = 'Message from KnowDemWell'; // Give the email a subject 
$message = "<img src='$img'/><br><p><br>";
$message .= '
  

<p>Message From: '.$fullname.'</p>
<p>Email: '.$email.'</p>

<p>Subject of Message: '.$subject1.'</p>
<br>
<p>'.$message1.'</p>


'; // Our message above including the link
                      
$headers = 'From:noreply@knowdemwell.org' . implode("\r\n", [
  "MIME-Version: KnowDemWell",
  "Content-type: text/html; charset=utf-8"
]); // Set from headers

mail($to, $subject, $message, $headers); // Send our email

        echo '<script>alert("Your message was sent sucessfully!")</script>';
      }

    else
    { echo '<script>alert("There was an error sending message...!")</script>';   }
}
 

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>KnowDemWell | Contact </title>

    <link href="//fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-liberty.css">
    <link rel="icon" type="text/css" href="assets/images/subscribe.png">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  </head>
  <body>
<!--header-->
<header id="site-header" class="fixed-top">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg stroke">
    <a class="navbar-brand" href="index.php">
        <img src="assets/images/logo.png" alt="KnowDemWell Logo" title="KnowDemWell logo" style=" margin-right: 100px; margin-left: 20px;" />
    </a>
      <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
        data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
        <span class="navbar-toggler-icon fa icon-close fa-times"></span>
        </span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav w-100">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item @@about__active">
            <a class="nav-link" href="about.php">About Us</a>
          </li>
            <li class="nav-item dropdown @@blog__active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">Candidates<span class="fa fa-angle-down"></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
              <a class="dropdown-item @@b__active" href="presidential.php">Presidential</a>
              <a class="dropdown-item @@bs__active" href="legislative.php">Legislative</a>
              <a class="dropdown-item @@donate__active" href="house_rep.php">House of Assembly</a>
              <a class="dropdown-item @@bs__active" href="governorship.php">Governorship</a>
              <a class="dropdown-item @@bs__active" href="lga.php">LGA</a>
            </div>
          </li>
 
        <li class="nav-item dropdown @@blog__active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">Executive<span class="fa fa-angle-down"></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
              <a class="dropdown-item @@b__active" href="presidents.php">The Presidents</a>
              <a class="dropdown-item @@bs__active" href="vice.php">Vice Presidents</a>
            </div>
          </li>
 
          <li class="nav-item dropdown @@pages__active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">Legislature<span class="fa fa-angle-down"></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
              <a class="dropdown-item @@causes__active" href="senate.php">The Senate</a>
              <a class="dropdown-item @@donate__active" href="house_rep.php">The House of Reps</a>
              <a class="dropdown-item @@donate__active" href="house_rep.php">Houses of Assembly</a>
            </div>
          </li>
         <li class="nav-item active">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="ml-lg-auto mr-lg-0 m-auto">
            <!--/search-right-->
            <div class="search-right">
              <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
              <!-- search popup -->
              <div id="search" class="pop-overlay">
                  <div class="popup">
                      <h4 class="mb-3">Search here</h4>
                      <form action="#" method="GET" class="search-box">
                          <input type="search" placeholder="Enter Keyword" name="search" required="required"
                              autofocus="">
                          <button type="submit" class="btn btn-style btn-primary">Search</button>
                      </form>

                  </div>
                  <a class="close" href="#close">×</a>
              </div>
              <!-- /search popup -->
          </div>
          <!--//search-right-->
          </li>
          <li class="align-self">
            <a href="donate.php" class="btn btn-style btn-primary ml-lg-3 mr-lg-2"><span class="fa fa-heart mr-1"></span> Donate</a>
          </li>
        </ul>
      </div>
      <!-- toggle switch for light and dark theme -->
      <div class="mobile-position" style="margin-right:20px;">
        <nav class="navigation">
          <div class="theme-switch-wrapper">
            <label class="theme-switch" for="checkbox">
              <input type="checkbox" id="checkbox">
              <div class="mode-container">
                <i class="gg-sun"></i>
                <i class="gg-moon"></i>
              </div>
            </label>
          </div>
        </nav>
      </div>
      <!-- //toggle switch for light and dark theme -->
    </nav>
  </div>
</header>

<!-- //header -->
<div class="inner-banner">
    <section class="w3l-breadcrumb py-5">
        <div class="container py-lg-5 py-md-3">
            <h2 class="title">Contact Us</h2>
        </div>
    </section>
</div>
<!-- banner bottom shape -->
<div class="position-relative">
    <div class="shape overflow-hidden">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- banner bottom shape -->
<!-- contacts -->
<section class="w3l-contact-7 py-5" id="contact">
    <div class="contacts-9 py-lg-5 py-md-4">
        <div class="container">
            <div class="top-map">
                <div class="row map-content-9">
                    <div class="col-lg-8">
                        <h3 class="title-big">Send us a Message</h3>
                        <p class="mb-4 mt-lg-0 mt-2">Your email address will not be published. Required fields are marked *</p>
                        <form action="" method="post" class="text-right">
                            <div class="form-grid">
                                <input type="text" name="fullname" id="w3lName" placeholder="Name*" required="">
                                <input type="email" name="email" id="w3lSender" placeholder="Email*" required="">
                                <input type="text" name="subject" id="w3lSubject" placeholder="Subject">
                            </div>
                            <textarea name="message" id="w3lMessage" placeholder="Message"></textarea>
                            <div class="g-recaptcha" style="margin-top:10px;" data-sitekey="6LfzoRwpAAAAAJZBCChLejNoc8zl1mODnVAd_vrI"></div>

                            <button type="submit" name="submit" class="btn btn-primary btn-style mt-3">Send Message</button>
                        </form>
                    </div>
                    <div class="col-lg-4 cont-details">
                        <address>
                            <h5 class="">Contact Address</h5>
                            <p><span class="fa fa-map-marker"></span>Abuja, Nigeria</p>
                            <p> <a href="mailto:info@example.com"><span
                                        class="fa fa-envelope"></span>info@knowdemwell.com</a></p>
                           <!-- <p><span class="fa fa-phone"></span><a href="tel:+44-000-888-999"> +44-000-888-999</a></p> -->
                            <a href="donate.php" class="btn btn-style btn-outline-primary mt-4">
                                <span class="fa fa-heart mr-1"></span> Make Donation</a>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //contacts -->

<!-- footer 14 -->
<?php include ('footer.php'); ?>

<script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->

<script src="assets/js/theme-change.js"></script><!-- theme switch js (light and dark)-->
<script src="assets/js/owl.carousel.js"></script>

<!-- script for banner slider-->
<script>
  $(document).ready(function () {
    $('.owl-one').owlCarousel({
      loop: true,
      dots: false,
      margin: 0,
      nav: true,
      responsiveClass: true,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplaySpeed: 1000,
      autoplayHoverPause: false,
      responsive: {
        0: {
          items: 1
        },
        480: {
          items: 1
        },
        667: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    })
  })
</script>
<!-- //script -->

<!-- script for tesimonials carousel slider -->
<script>
  $(document).ready(function () {
    $("#owl-demo1").owlCarousel({
      loop: true,
      margin: 20,
      nav: false,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1
        },
        736: {
          items: 1
        },
        1000: {
          items: 2,
          loop: false
        }
      }
    })
  })
</script>
<!-- //script for tesimonials carousel slider -->

<script src="assets/js/counter.js"></script>

<!--/MENU-JS-->
<script>
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 80) {
      $("#site-header").addClass("nav-fixed");
    } else {
      $("#site-header").removeClass("nav-fixed");
    }
  });

  //Main navigation Active Class Add Remove
  $(".navbar-toggler").on("click", function () {
    $("header").toggleClass("active");
  });
  $(document).on("ready", function () {
    if ($(window).width() > 991) {
      $("header").removeClass("active");
    }
    $(window).on("resize", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
    });
  });
</script>
<!--//MENU-JS-->

<!-- disable body scroll which navbar is in active -->
<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- //disable body scroll which navbar is in active -->

<!--bootstrap-->
<script src="assets/js/bootstrap.min.js"></script>
<!-- //bootstrap-->
</body>

</html>