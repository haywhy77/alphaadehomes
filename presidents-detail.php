<?php

include ('config.php');
  $identity = $_GET['htennek007'];


$result = $conn->query("SELECT * FROM presidents WHERE id='$identity' ");
if($result->num_rows > 0)
{ 
    while($row = $result->fetch_assoc()) 
  {  

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>KnowDemWell | Presidents </title>

    <link href="//fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-liberty.css">
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
 
        <li class="nav-item dropdown active">
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
         <li class="nav-item @@contact__active">
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
            <h2 class="title">Presidential Profile</h2>
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
<section class="w3l-aboutblock1 py-5" id="about">
    <div class="container py-lg-5 py-md-3">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="title-big"><?php echo $row['fullname']; ?></h3>
                <h5 class="title-small">Political Party: <?php echo $row['party']; ?></h5>
                <h5 class="title-small">Occupation: <?php echo $row['occupation']; ?></h5>
                <h5 class="title-small">State of Origin: <?php echo $row['state']; ?></h5>
                <h5 class="title-small">Religion: <?php echo $row['religion']; ?></h5>
                <h5 class="title-small">Date of Birth: <?php echo $row['dob']; ?></h5>
                <h3 class="title mt-4">Manifesto</h3>
                <p class="mt-0"><?php echo $row['manifesto']; ?></p>
                <h3 class="title mt-4">Ideology</h3>
                <p class="mt-0"><?php echo $row['ideology']; ?></p>
                <h3 class="title mt-4">Policy</h3>
                <p class="mt-0"><?php echo $row['policy']; ?></p>
            </div>
            <div class="col-lg-6 mt-lg-0 mt-5">
                <img src="admin/<?php echo $row['images']; ?>" alt="" class="radius-image img-fluid">
            </div>
        </div>
    </div>
</section>
 <!-- forms -->
<section class="blog-post-main w3l-homeblock1">
    <!--/blog-post-->
    <div class="blog-content-inf pb-1">
        <div class="container pb-lg-1">
            <div class="single-post-image">
   <!--//author-card-->
                <div class="author-card mt-2">
                    <div class="row align-items-center">
                        <div class="col-md-12 mt-md-0 mt-4">
                            <h3 class="mb-3 title">1. Commitment to Democracy, Human Rights, and Gender Equality</h3>
                            <p><?php echo $row['index1']; ?></p>
                        </div>
                    </div>
                </div>
                <!--//author-card-->
            </div>
        </div>
    </div>
</section>

<section class="blog-post-main w3l-homeblock1">
    <!--/blog-post-->
    <div class="blog-content-inf pb-1">
        <div class="container pb-lg-1">
            <div class="single-post-image">
   <!--//author-card-->
                <div class="author-card mt-2">
                    <div class="row align-items-center">
                        <div class="col-md-12 mt-md-0 mt-4">
                            <h3 class="mb-3 title">2. Commitment to Poverty Eradication</h3>
                            <p><?php echo $row['index2']; ?></p>
                        </div>
                    </div>
                </div>
                <!--//author-card-->
            </div>
        </div>
    </div>
</section>

<section class="blog-post-main w3l-homeblock1">
    <!--/blog-post-->
    <div class="blog-content-inf pb-1">
        <div class="container pb-lg-1">
            <div class="single-post-image">
   <!--//author-card-->
                <div class="author-card mt-2">
                    <div class="row align-items-center">
                        <div class="col-md-12 mt-md-0 mt-4">
                            <h3 class="mb-3 title">3. Commitment to Ending Corruption in Public Offices and Society</h3>
                            <p><?php echo $row['index3']; ?></p>
                        </div>
                    </div>
                </div>
                <!--//author-card-->
            </div>
        </div>
    </div>
</section>


<section class="blog-post-main w3l-homeblock1">
    <!--/blog-post-->
    <div class="blog-content-inf pb-1">
        <div class="container pb-lg-1">
            <div class="single-post-image">
   <!--//author-card-->
                <div class="author-card mt-2">
                    <div class="row align-items-center">
                        <div class="col-md-12 mt-md-0 mt-4">
                            <h3 class="mb-3 title">4. Commitment to Socio-Economic Development and Environmental Protection</h3>
                            <p><?php echo $row['index4']; ?></p>
                        </div>
                    </div>
                </div>
                <!--//author-card-->
            </div>
        </div>
    </div>
</section>


<section class="blog-post-main w3l-homeblock1">
    <!--/blog-post-->
    <div class="blog-content-inf pb-1">
        <div class="container pb-lg-1">
            <div class="single-post-image">
   <!--//author-card-->
                <div class="author-card mt-2">
                    <div class="row align-items-center">
                        <div class="col-md-12 mt-md-0 mt-4">
                            <h3 class="mb-3 title">5. Commitment to Education and Social Change</h3>
                            <p><?php echo $row['index5']; ?></p>
                        </div>
                    </div>
                </div>
                <!--//author-card-->
            </div>
        </div>
    </div>
</section>


<section class="blog-post-main w3l-homeblock1">
    <!--/blog-post-->
    <div class="blog-content-inf pb-1">
        <div class="container pb-lg-1">
            <div class="single-post-image">
   <!--//author-card-->
                <div class="author-card mt-2">
                    <div class="row align-items-center">
                        <div class="col-md-12 mt-md-0 mt-4">
                            <h3 class="mb-3 title">6. Commitment and Approach to Internal Security and Public Safety</h3>
                            <p><?php echo $row['index6']; ?></p>
                        </div>
                    </div>
                </div>
                <!--//author-card-->
            </div>
        </div>
    </div>
</section>


<section class="blog-post-main w3l-homeblock1">
    <!--/blog-post-->
    <div class="blog-content-inf pb-4">
        <div class="container pb-lg-4">
            <div class="single-post-image">
   <!--//author-card-->
                <div class="author-card mt-2">
                    <div class="row align-items-center">
                        <div class="col-md-12 mt-md-0 mt-4">
                            <h3 class="mb-3 title">7. Commitment and Approach to Peace and Conflict Resolution</h3>
                            <p><?php echo $row['index7']; ?></p>
                        </div>
                    </div>
                </div>
                <!--//author-card-->
            </div>
        </div>
    </div>
</section>


<section class="blog-post-main w3l-homeblock1">
    <!--/blog-post-->
    <div class="blog-content-inf pb-4">
        <div class="container pb-lg-4">
                <p class="btn btn-primary btn-style mt-lg-1 mt-4"><?php echo $row['verdict'].'<br>'.$row['other_verdict']; ?></p>
        </div>
    </div>
</section>











<?php 
include 'footer.php';
}
 } 
 ?>
<!-- //footer 14 -->

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