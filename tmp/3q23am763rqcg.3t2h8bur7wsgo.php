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
    <!--/w3-grids-->
    <section class="w3l-passion-mid-sec py-5 pb-0">
        <div class="container py-md-5 py-3 pb-0">
            <div class="container">
                <div class="row w3l-passion-mid-grids">
                    <div class="col-lg-6 passion-grid-item-info pe-lg-5 mb-lg-0 mb-5">
                        <h6 class="title-subw3hny mb-1">Post Your Property</h6>
                        <h3 class="title-w3l mb-4">Property owners get free posting when they register</h3>
                        <p class="mt-3 pe-lg-5">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in
                            ligula. Semper at tempufddfel.Lorem ipsum dolor sit, amet consectetur elit. Earum mollitia
                            cum ex ipsam autem!earum sequi amet.</p>
                        <div class="w3banner-content-btns">
                            <a href="about.html" class="btn btn-style btn-primary mt-lg-5 mt-4 me-2">Services <i class="fas fa-angle-double-right ms-2"></i></a>
                            <a href="contact.html" class="btn btn-style btn-outline-dark mt-lg-5 mt-4">Contact Us <i class="fas fa-angle-double-right ms-2"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 passion-grid-item-info">
                        <img src="<?= ($BASE) ?>/ui/frontend/images/g6.jpg" alt="" class="img-fluid radius-image">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--//w3-grids-->
    <!--/properties-->
    <section class="locations-1 w3services-3">
        <div class="locations py-5">
            <div class="container py-lg-5 py-md-4 py-2">
                <div class="heading text-center mx-auto">
                    <h6 class="title-subw3hny mb-1">Our Properties</h6>
                    <h3 class="title-w3l mb-3">Explore Our Properties</h3>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-6 mt-md-5 mt-4">
                        <div class="w3property-grid">
                            <a href="#property">
                                <div class="box16">
                                    <img class="img-fluid" src="<?= ($BASE) ?>/ui/frontend/images/d1.jpg" alt="">
                                    <div class="box-content text-center">
                                        <i class="fas fa-home"></i>
                                        <h3 class="title">House</h3>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-6 mt-md-5 mt-4">
                        <div class="w3property-grid">
                            <a href="#property">
                                <div class="box16">

                                    <img class="img-fluid" src="<?= ($BASE) ?>/ui/frontend/images/d2.jpg" alt="">
                                    <div class="box-content text-center">
                                        <i class="far fa-building"></i>
                                        <h3 class="title">Appartment</h3>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-6 mt-md-5 mt-4">
                        <div class="w3property-grid">
                            <a href="#property">
                                <div class="box16">

                                    <img class="img-fluid" src="<?= ($BASE) ?>/ui/frontend/images/d3.jpg" alt="">
                                    <div class="box-content text-center">
                                        <i class="fas fa-house-damage"></i>
                                        <h3 class="title">Villa</h3>

                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-6 mt-md-5 mt-4">
                        <div class="w3property-grid">
                            <a href="#property">
                                <div class="box16">
                                    <img class="img-fluid" src="<?= ($BASE) ?>/ui/frontend/images/d4.jpg" alt="">
                                    <div class="box-content text-center">
                                        <i class="fas fa-hotel"></i>
                                        <h3 class="title">Town</h3>

                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!--//properties-->
    <!-- features section -->
    <section class="w3l-features py-5" id="work">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="title-content text-center mb-lg-3 mb-4">
                <h6 class="title-subw3hny mb-1">What We Do</h6>
                <h3 class="title-w3l">What We Offered</h3>
            </div>
            <div class="main-cont-wthree-2">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-thumbs-up"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Guidance you need</a></h4>
                            <p class="text-para">Lorem ipsum dolor sit amet, elit. Id ab commodi magnam. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-search-plus"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Search that feels familiar</a></h4>
                            <p class="text-para">Lorem ipsum dolor sit amet, elit. Id ab commodi magnam. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-tags"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Premium values</a></h4>
                            <p class="text-para">Lorem ipsum dolor sit amet, elit. Id ab commodi magnam. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Secure Payment</a></h4>
                            <p class="text-para">Lorem ipsum dolor sit amet, elit. Id ab commodi magnam. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="far fa-money-bill-alt"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">No Commission</a></h4>
                            <p class="text-para">Lorem ipsum dolor sit amet, elit. Id ab commodi magnam. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Top Rated Agents</a></h4>
                            <p class="text-para">Lorem ipsum dolor sit amet, elit. Id ab commodi magnam. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//features section -->
    
    <!-- //w3l-pricing-->
    <?php echo $this->render('includes/public/footer.htm',NULL,get_defined_vars(),0); ?>
    <?php echo $this->render('includes/public/vendor-scripts.htm',NULL,get_defined_vars(),0); ?>

</body>

</html>