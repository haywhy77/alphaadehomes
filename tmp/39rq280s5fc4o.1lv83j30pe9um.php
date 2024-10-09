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
    <!--/w3l-index3-->
    <section class="w3l-index-about py-5" id="about2">
        <div class="container py-md-5 py-2">
            <div class="row">
                <div class="col-lg-6 pe-lg-5">
                    <div class="w3l-abouthny-img">
                        <img src="<?= ($BASE) ?>/ui/frontend/images/ad1.jpg" alt="" class="img-fluid radius-image">
                    </div>
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5">
                    <div class="w3l-abouthny-info">
                        <h6 class="title-subw3hny">Who we are</h6>
                        <h3 class="title-w3l">We're one of the best real estate company in the UK</h3>
                        <p class="mt-4">We have over 15 years experience, Over 20,000 people work for us in more than 70
                            cities all over the world. Our experience and expertise speaks volume. Learn more about our work!
                        </p>
                        <p class="mt-3">We provide a range of professional services to help you achieve your dreams. You can contact us for any of the services such as:</p>
                        <ul class="w3l-right-book w3l-right-book-grid mt-md-5 mt-4">
                            <li><span class="fas fa-check"></span> Properties for sales</li>
                            <li><span class="fas fa-check"></span> Properties  for rents</li>
                            <li><span class="fas fa-check"></span> Properties for lease</li>
                            <li><span class="fas fa-check"></span> Property valuation</li>
                            <li><span class="fas fa-check"></span> Property renovation</li>
                            <li><span class="fas fa-check"></span> Advice and consultation</li>
                        </ul>
                        <a href="<?= ($BASE) ?>/services" class="btn btn-style btn-primary mt-4">Explore our services <i class="fas fa-angle-double-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//w3l-index3-->
    <!--/w3-grids-->
    <section class="w3l-passion-mid-sec home-phny py-5">
        <div class="container py-md-5 py-3">
            <div class="container">
                <div class="row w3l-passion-mid-grids">
                    <div class="col-lg-6 passion-grid-item-info pe-lg-5 mb-lg-0 mb-5">
                        <h6 class="title-subw3hny mb-1">AirBnB Available</h6>
                        <h3 class="title-w3l mb-4">Affordable AirBnB</h3>
                        <p class="mt-3 pe-lg-5">We have very affordable airbnb and shortlet homes for your comfort. Do you need a home away from home? Contact us today and we got you covered.</p>

                    </div>
                    <div class="col-lg-6 w3hny-passion-item">
                        <div class="row">
                            <div class="col-6 passion-grid-item-pic">
                                <img src="<?= ($BASE) ?>/ui/frontend/images/d5.jpg" alt="" class="img-fluid radius-image">
                            </div>
                            <div class="col-6 passion-grid-item-pic">
                                <img src="<?= ($BASE) ?>/ui/frontend/images/d4.jpg" alt="" class="img-fluid radius-image">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//w3-grids-->
    <!--/progress-->
    <section class="w3l-servicesblock w3l-servicesblock1 py-5" id="progress">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="row">
                <div class="col-lg-6 mb-lg-0 mb-5 pe-lg-5">
                    <h5 class="title-subw3hny mb-1">Progress Bars</h5>
                    <h3 class="title-w3l">The Core Company Values Of
                        Our main Goal</h3>
                    <p class="mt-md-4 mt-3">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                        ultrices in ligula. Semper at. Lorem ipsum dolor sit amet
                        elit. Non quae, fugiat nihil ad. Lorem ipsum dolor sit amet init.
                    </p>

                </div>
                <div class="col-lg-6 align-self pe-lg-4">
                    <div class="progress-info info1">
                        <h6 class="progress-tittle">Modern Technology <span class="">70%</span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width:70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    <div class="progress-info info2">
                        <h6 class="progress-tittle">Tax Solution Area<span class="">80%</span>
                        </h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width:80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                    <div class="progress-info info3">
                        <h6 class="progress-tittle">Quick Support <span class="">90%</span></h6>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!--//progress-->
    <!--/faq-section-->
    <div class="w3l-faq-block py-5" id="faq">
        <div class="container content-gd py-lg-5">
            <div class="row mt-3">
                <div class="col-lg-6 faqw3-right pe-lg-5">
                    <div class="faqw3content text-left">
                        <h6 class="title-subw3hny mb-1 text-left">Ask by Client</h6>
                        <h3 class="title-w3l mb-2">Frequently Asked Questions</h3>
                    </div>
                    <p class="mb-3">We have compiled series of frequently asked questions from our client base to help you answer some questions.
                        Please feel free to contact us if you need any further clarifications or questions.
                    </p>
                    <img src="<?= ($BASE) ?>/ui/frontend/images/banner3.jpg" alt="" class="img-fluid radius-image">

                </div>
                <div class="col-lg-6 faqw3-left">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    01. What is the process for buying a home?
                                </button>
                            </h4>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    The home-buying process typically involves getting pre-approved 
                                    for a mortgage, finding a suitable property, making an offer, 
                                    conducting inspections, and closing the sale.

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    02. How do I determine the value of my property?
                                </button>
                            </h4>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    We offer free property valuations based on recent market trends,
                                     comparable property sales, and property condition assessments.

                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    03. What services do you offer?
                                </button>
                            </h4>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    We provide a range of services including property buying and selling, 
                                    rental management, market analysis, property valuation, 
                                    and investment advice.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingFourth">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourth" aria-expanded="false" aria-controls="collapseFourth">
                                    04. What should I look for when selling my home?
                                </button>
                            </h4>
                            <div id="collapseFourth" class="accordion-collapse collapse" aria-labelledby="headingFourth" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Consider factors like setting the right price, 
                                    staging your home for showings, making necessary repairs,
                                     and marketing your property effectively.
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingFifth">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifth" aria-expanded="false" aria-controls="collapseFifth">
                                    05. How long does it take to sell a home?
                                </button>
                            </h4>
                            <div id="collapseFifth" class="accordion-collapse collapse" aria-labelledby="headingFifth" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    The time it takes to sell a home can vary widely 
                                    based on market conditions, pricing, and location, 
                                    but on average, it can take anywhere from a few weeks to several months.
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    06. What should I do to prepare my home for sale?
                                </button>
                            </h4>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    To prepare your home, consider decluttering, 
                                    making necessary repairs, enhancing curb appeal, 
                                    and staging the interior to attract potential buyers.
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">
                            <h4 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    07. Do I need a real estate agent to buy or sell a property?
                                </button>
                            </h4>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    While it's not legally required, having a real
                                     estate agent can provide valuable expertise, 
                                     negotiation skills, and market knowledge that can streamline the process.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- //faq-section -->
    <!--/w3-grids-->
    <section class="w3l-stats-section py-5" id="stats">
        <div class="container py-md-4">
            <div class="w3l-stats-inner-inf">
                <div class="row stats-con">
                    <div class="col-lg-3 col-6 stats_info counter_grid">
                        <p class="counter">504 </p>
                        <h3>Property Leased</h3>
                    </div>
                    <div class="col-lg-3 col-6 stats_info counter_grid">
                        <p class="counter">1207 </p>
                        <h3>Property Sales</h3>
                    </div>
                    <div class="col-lg-3 col-6 stats_info counter_grid mt-lg-0 mt-4">
                        <p class="counter">1280 </p>
                        <h3>Appartment Rent</h3>
                    </div>
                    <div class="col-lg-3 col-6 stats_info counter_grid mt-lg-0 mt-4">
                        <p class="counter">4020</p>
                        <h3>Happy Clients</h3>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--//w3-grids-->
    <!--/w3l-subscribe-content-->
    <!-- <section class="w3l-join-main py-5">
        <div class="container py-md-5">
            <div class="w3l-project-in">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="bottom-info">
                            <div class="header-section">
                                <h6 class="title-subw3hny mb-lg-2">Let's Take a Tour </h6>
                                <h3 class="title-w3l two mb-2">Search Property Smarter,
                                    Quicker & Anywhere
                                </h3>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 align-self mt-lg-0 mt-3">
                        <p>Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula. Semper at. Lorem ipsum dolor sit amet elit. Non quae, fugiat nihil ad. Lorem ipsum dolor sit amet. </p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--//w3l-subscribe-content-->
    <!--/team-sec-->
    <!--//team-sec-->
    <!--/footer-9-->
    
    <!--//footer-9 -->

    <?php echo $this->render('includes/public/footer.htm',NULL,get_defined_vars(),0); ?>
    <?php echo $this->render('includes/public/vendor-scripts.htm',NULL,get_defined_vars(),0); ?>

</body>

</html>