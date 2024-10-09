<!doctype html>
<html lang="en">

<head>
    <?php echo $this->render('includes/public/title-meta.htm',NULL,get_defined_vars(),0); ?>

    <?php echo $this->render('includes/public/head-css.htm',NULL,get_defined_vars(),0); ?>
</head>

<body>
    
    <?php echo $this->render('includes/public/header.htm',NULL,get_defined_vars(),0); ?>
    <!--//Header-->
    <?php echo $this->render('includes/public/top-bar.htm',NULL,get_defined_vars(),0); ?>
    <!-- contacts-5-grid -->
    <div class="w3l-contact-10 py-5" id="contact">
        <div class="form-41-mian pt-lg-4 pt-md-3 pb-lg-4">
            <div class="container">
                <div class="heading text-center mx-auto">
                    <h5 class="title-subw3hny text-center">Contact our team</h5>
                    <h3 class="title-w3l">Got any <span class="inn-text">Questions? </span></h3>
                </div>

                <div class="contacts-5-grid-main mt-5">
                    <div class="contacts-5-grid">
                        <div class="map-content-5">
                            <div class="d-grid grid-col-2 justify-content-center">
                                <div class="contact-type">
                                    <div class="address-grid">
                                        <span class="fas fa-map-marked-alt"></span>
                                        <h6>Address</h6>
                                        <p>#302, 5th Floor, VHLY-2247 ek,RealHouzing, New York.</p>

                                    </div>
                                    <div class="address-grid">
                                        <span class="fas fa-envelope-open-text"></span>
                                        <h6>Email</h6>
                                        <a href="mailto:mailone@example.com" class="link1">mailone@example.com</a>
                                        <a href="mailto:mailtwo@example.com" class="link1">mailtwo@example.com</a>

                                    </div>
                                    <div class="address-grid">
                                        <span class="fas fa-phone-alt"></span>
                                        <h6>Phone</h6>
                                        <a href="tel:+12 324-016-695" class="link1">+12 324-016-695</a>
                                        <a href="tel:+44 224-058-545" class="link1">+44 224-058-545</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-inner-cont mt-5">
                    <div style="margin: 0 34px">
                        <?php foreach ((\Flash::instance()->getMessages()?:[]) as $msg): ?>
                            <div class="alert alert-<?= ($msg['status']) ?> alert-dismissable">
                                <?= ($msg['text'])."
" ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <form action="<?= ($BASE) ?>/contact" method="post" class="signin-form">
                        <div class="form-grids">
                            <div class="form-input">
                                <input type="text" name="name" id="w3lName" placeholder="Enter your name *" required="" />
                            </div>
                            <div class="form-input">
                                <input type="text" name="subject" id="w3lSubject" placeholder="Enter subject " required />
                            </div>
                            <div class="form-input">
                                <input type="email" name="sender" id="w3lSender" placeholder="Enter your email *" required />
                            </div>
                            <div class="form-input">
                                <input type="text" name="phone" id="w3lPhone" placeholder="Enter your Phone Number *" required />
                            </div>
                        </div>
                        <div class="form-input">
                            <textarea name="w3lMessage" id="message" placeholder="Type your query here" required=""></textarea>
                        </div>
                        <div class="w3-submit text-right">
                            <button type="summary" class="btn btn-style btn-primary">Send Message <i class="fas fa-paper-plane ms-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- //contacts-5-grid -->
    </div>

    <div class="contacts-sub-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.305935303!2d-74.25986548248684!3d40.69714941932609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1563262564932!5m2!1sen!2sin" style="border:0" allowfullscreen></iframe>
    </div>
    <!--/footer-9-->
    <footer class="w3l-footer9">
        <section class="footer-inner-main py-5">
            <div class="container py-md-4">
                <div class="right-side">
                    <div class="row footer-hny-grids sub-columns">
                        <div class="col-lg-3 sub-one-left">
                            <h6>About </h6>
                            <p class="footer-phny pe-lg-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ute dolor sit.</p>
                            <div class="columns-2 mt-4 pt-lg-2">
                                <ul class="social">
                                    <li><a href="#facebook"><span class="fab fa-facebook-f"></span></a>
                                    </li>
                                    <li><a href="#linkedin"><span class="fab fa-linkedin-in"></span></a>
                                    </li>
                                    <li><a href="#twitter"><span class="fab fa-twitter"></span></a>
                                    </li>
                                    <li><a href="#google"><span class="fab fa-google-plus-g"></span></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 sub-two-right">
                            <h6>Company</h6>
                            <ul>

                                <li><a href="#why"><i class="fas fa-angle-right"></i> Why Us</a>
                                </li>
                                <li><a href="#licence"><i class="fas fa-angle-right"></i>Our Agents
                                    </a>
                                </li>
                                <li><a href="#log"><i class="fas fa-angle-right"></i>Our Offers
                                    </a></li>

                                <li><a href="#career"><i class="fas fa-angle-right"></i> Careers</a></li>

                            </ul>
                        </div>
                        <div class="col-lg-2 sub-two-right">
                            <h6>Services</h6>
                            <ul>
                                <li><a href="#processing"><i class="fas fa-angle-right"></i> Buy Properties</a>
                                </li>
                                <li><a href="#research"><i class="fas fa-angle-right"></i> Sell Properties</a>
                                </li>
                                <li><a href="#metal"><i class="fas fa-angle-right"></i> Rent Properties</a>
                                </li>
                                <li><a href="#metal"><i class="fas fa-angle-right"></i> Property Search</a>
                                </li>


                            </ul>
                        </div>
                        <div class="col-lg-2 sub-two-right">
                            <h6>Explore</h6>
                            <ul>
                                <li><a href="#processing"><i class="fas fa-angle-right"></i> Homes for Rent</a>
                                </li>
                                <li><a href="#research"><i class="fas fa-angle-right"></i> Apartments for Rent</a>
                                </li>
                                <li><a href="#metal"><i class="fas fa-angle-right"></i> Homes for Sale</a>
                                </li>
                                <li><a href="#metal"><i class="fas fa-angle-right"></i> Apartments for Sale</a>
                                </li>


                            </ul>
                        </div>
                        <div class="col-lg-3 sub-one-left ps-lg-5">
                            <h6>Stay Update!</h6>
                            <p class="w3f-para mb-4">Subscribe to our newsletter to receive our weekly feed.</p>
                            <div class="w3l-subscribe-content align-self mt-lg-0 mt-5">
                                <form action="#" method="post" class="subscribe-wthree">
                                    <div class="flex-wrap subscribe-wthree-field">
                                        <input class="form-control" type="email" placeholder="Email" name="email" required="">
                                        <button class="btn btn-style btn-primary" type="submit">Subscribe</button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="below-section mt-5 pt-lg-3">
                    <div class="copyright-footer">
                        <div class="columns text-left">
                            <p>© 2021 RealHouzing.All rights reserved.</p>
                        </div>
                        <ul class="footer-w3list text-right">
                            <li><a href="#url">Privacy Policy</a>
                            </li>
                            <li><a href="#url">Terms &amp; Conditions</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>

        <!-- Js scripts -->
        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
            <span class="fas fa-level-up-alt" aria-hidden="true"></span>
        </button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }

        </script>
        <!-- //move top -->
    </footer>
    <!--//footer-9 -->

    <!-- Template JavaScript -->
    <script src="<?= ($BASE) ?>/ui/frontend/js/jquery-3.3.1.min.js"></script>
    <script src="<?= ($BASE) ?>/ui/frontend/js/theme-change.js"></script>
    <!-- stats number counter-->
    <script src="<?= ($BASE) ?>/ui/frontend/js/jquery.waypoints.min.js"></script>
    <script src="<?= ($BASE) ?>/ui/frontend/js/jquery.countup.js"></script>
    <script>
        $('.counter').countUp();

    </script>
    <!--/search-->
    <script src="<?= ($BASE) ?>/ui/frontend/js/modernizr.custom.js"></script>
    <script src="<?= ($BASE) ?>/ui/frontend/js/classie.js"></script>
    <script src="<?= ($BASE) ?>/ui/frontend/js/demo1.js"></script>
    <!--//search-->
    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function() {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });

    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });

    </script>
    <!-- //disable body scroll which navbar is in active -->
    <!-- //bootstrap -->
    <script src="<?= ($BASE) ?>/ui/frontend/js/bootstrap.min.js"></script>

</body>

</html>
