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
    <section class="w3l-passion-mid-sec py-2 pb-0">
        <div class="container py-md-5 py-3 pb-0">
            <div class="container">
                <div class="row w3l-passion-mid-grids">
                    <div class="col-lg-6 passion-grid-item-info pe-lg-5 mb-lg-0 mb-5">
                        <h6 class="title-subw3hny mb-1">Our Services</h6>
                        <h3 class="title-w3l mb-4">We Render Various Services</h3>
                        <p class="mt-3 pe-lg-5">At Alphaadehomes, we offer a comprehensive range of real estate services tailored to meet the diverse needs of our clients. Whether you are buying, selling, or investing in property, our experienced team is here to guide you every step of the way.</p>
                        <br>
                        <!-- <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h4 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Residential Real Estate
                                    </button>
                                </h4>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        We specialize in helping clients buy and sell residential properties, including single-family homes, condominiums, and townhouses. Our in-depth market knowledge ensures you receive the best advice, whether you're a first-time homebuyer or looking to upgrade.
                                    </div>
                                </div>
                            </div>

                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Commercial Real Estate
                                </button>
                            </h4>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Our commercial real estate services cater to businesses looking for office space, retail properties, and investment opportunities. We assist with leasing, purchasing, and selling commercial real estate, providing insights into market trends and property values.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingFourth">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourth" aria-expanded="false" aria-controls="collapseFourth">
                                    Property Management
                                </button>
                            </h4>
                            <div id="collapseFourth" class="accordion-collapse collapse" aria-labelledby="headingFourth" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Our property management team handles everything from tenant screening and rent collection to maintenance and lease compliance. We aim to maximize your investment's value while minimizing your stress, ensuring your property is well-cared for and profitable.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingFifth">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifth" aria-expanded="false" aria-controls="collapseFifth">
                                    Market Analysis and Valuation
                                </button>
                            </h4>
                            <div id="collapseFifth" class="accordion-collapse collapse" aria-labelledby="headingFifth" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Understanding the market is crucial for making informed decisions. Our team provides comprehensive market analysis and property valuations, equipping you with the information you need to buy or sell with confidence.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Virtual Marketing
                                </button>
                            </h4>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    In today's digital world, effective marketing is essential. We utilize innovative marketing strategies, including virtual tours and high-quality photography, to showcase properties and attract potential buyers.
                                </div>
                            </div>
                        </div>
                        </div> -->


                        <div class="w3banner-content-btns">
                            <a href="<?= ($BASE) ?>/contact" class="btn btn-style btn-primary mt-lg-5 mt-4 me-2">Contact Us <i class="fas fa-angle-double-right ms-2"></i></a>
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
    <!-- features section -->
    <section class="w3l-features py-3" id="work">
        <div class="container py-lg-3 py-md-4 py-2">
            <div class="title-content text-center mb-lg-3 mb-4">
                <h6 class="title-subw3hny mb-1">What We Do</h6>
                <h3 class="title-w3l">What We Offer</h3>
            </div>
            <div class="main-cont-wthree-2">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-thumbs-up"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Residential Real Estate</a></h4>
                            <p class="text-para">We specialize in helping clients buy and sell residential properties, including single-family homes, condominiums, and townhouses. Our in-depth market knowledge ensures you receive the best advice, whether you're a first-time homebuyer or looking to upgrade.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-search-plus"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Commercial Real Estate</a></h4>
                            <p class="text-para">Our commercial real estate services cater to businesses looking for office space, retail properties, and investment opportunities. We assist with leasing, purchasing, and selling commercial real estate, providing insights into market trends and property values.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-tags"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Property Management</a></h4>
                            <p class="text-para">Our property management team handles everything from tenant screening and rent collection to maintenance and lease compliance. We aim to maximize your investment's value while minimizing your stress, ensuring your property is well-cared for and profitable.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Property Valuation</a></h4>
                            <p class="text-para">Understanding the market is crucial for making informed decisions. Our team provides comprehensive market analysis and property valuations, equipping you with the information you need to buy or sell with confidence.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="far fa-money-bill-alt"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Virtual Marketing</a></h4>
                            <p class="text-para">In today's digital world, effective marketing is essential. We utilize innovative marketing strategies, including virtual tours and high-quality photography, to showcase properties and attract potential buyers.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Real Estate Consulting</a></h4>
                            <p class="text-para">Our consulting services are designed for clients needing expert advice on real estate transactions, market trends, or investment strategies. We work closely with you to develop customized solutions that align with your objectives.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//features section -->
    <!--/properties-->
    <section class="locations-1 w3services-3">
        <div class="locations py-2">
            <div class="container py-lg-1 py-md-4 py-2">
                <div class="heading text-center mx-auto">
                    <h6 class="title-subw3hny mb-1">Our Properties</h6>
                    <h3 class="title-w3l mb-3">Explore Our Properties</h3>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-6 mt-md-5 mt-4">
                        <div class="w3property-grid">
                            <a href="<?= ($BASE) ?>/properties/airbnb">
                                <div class="box16">
                                    <img class="img-fluid" src="<?= ($BASE) ?>/ui/frontend/images/d1.jpg" alt="">
                                    <div class="box-content text-center">
                                        <i class="fas fa-home"></i>
                                        <h3 class="title">AirBnB</h3>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-6 mt-md-5 mt-4">
                        <div class="w3property-grid">
                            <a href="<?= ($BASE) ?>/properties/rent">
                                <div class="box16">

                                    <img class="img-fluid" src="<?= ($BASE) ?>/ui/frontend/images/d2.jpg" alt="">
                                    <div class="box-content text-center">
                                        <i class="far fa-building"></i>
                                        <h3 class="title">Villa</h3>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-6 mt-md-5 mt-4">
                        <div class="w3property-grid">
                            <a href="<?= ($BASE) ?>/properties/sale">
                                <div class="box16">

                                    <img class="img-fluid" src="<?= ($BASE) ?>/ui/frontend/images/d3.jpg" alt="">
                                    <div class="box-content text-center">
                                        <i class="fas fa-house-damage"></i>
                                        <h3 class="title">Apartment</h3>

                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-6 mt-md-5 mt-4">
                        <div class="w3property-grid">
                            <a href="<?= ($BASE) ?>/properties/airbnb">
                                <div class="box16">
                                    <img class="img-fluid" src="<?= ($BASE) ?>/ui/frontend/images/d4.jpg" alt="">
                                    <div class="box-content text-center">
                                        <i class="fas fa-hotel"></i>
                                        <h3 class="title">Hotel</h3>

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
    <!-- //w3l-pricing-->
    <?php echo $this->render('includes/public/footer.htm',NULL,get_defined_vars(),0); ?>
    <?php echo $this->render('includes/public/vendor-scripts.htm',NULL,get_defined_vars(),0); ?>

</body>

</html>