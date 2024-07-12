<!-- footer 14 -->
<div class="w3l-footer-main">
  <div class="w3l-sub-footer-content">
      <section class="_form-3">
          <div class="form-main">
              <div class="container">
                  <div class="middle-section grid-column top-bottom">
                      <div class="image grid-three-column">
                          <img src="assets/images/subscribe.png" alt="" class="img-fluid radius-image-full">
                      </div>
                      <div class="text-grid grid-three-column">
                          <h2>Enter your email here and never miss our updates again</h2>
                          <p>We won’t give you spam mails.</p>
                      </div>
                      <div class="form-text grid-three-column">
                          <form action="/" method="GET">
                              <input type="email" name=" placeholder" placeholder="Enter Your Email" required="">
                              <button type="submit" class="btn btn-style btn-primary">Submit</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- Footers-14 -->
      <footer class="footer-14">
          <div id="footers14-block">
              <div class="container">
                  <div class="footers20-content">
                      <div class="d-grid grid-col-4 grids-content">
                         
                          <div class="column">
                              <h4>Our Address</h4>
                                <p>Abuja, Nigeria</p>
                          </div>
                          
                          <div class="column">
                              <h4>Mail Us</h4>
                              <p><a href="mailto:info@knowdemwell.com">info@knowdemwell.org</a></p>
                              <p><a href="mailto:support@knowdemwell.com">support@knowdemwell.org</a></p>
                          </div>
                          <div class="column">
                              <h4>Follow Us On</h4>
                              <ul>
                                  <li><a href="#facebook"><span class="fa fa-facebook"
                                              aria-hidden="true"></span></a>
                                  </li>
                                  <li><a href="#linkedin"><span class="fa fa-linkedin"
                                              aria-hidden="true"></span></a>
                                  </li>
                                  <li><a href="#twitter"><span class="fa fa-twitter"
                                              aria-hidden="true"></span></a>
                                  </li>
                                  <li><a href="#google"><span class="fa fa-google-plus"
                                              aria-hidden="true"></span></a>
                                  </li>
                                  <li><a href="#github"><span class="fa fa-github" aria-hidden="true"></span></a>
                                  </li>
                              </ul>
                          </div>
                          
                      </div>
                  </div>
                  <div class="footers14-bottom d-flex">
                      <div class="copyright">
                        <p>© <?php echo date('Y'); ?> KnowDemWell. All Rights Reserved</p>
                      </div>
                      
                  </div>
              </div>
          </div>
          <!-- move top -->
          <button onclick="topFunction()" id="movetop" title="Go to top">
              &uarr;
          </button>
          <script>
              // When the user scrolls down 20px from the top of the document, show the button
              window.onscroll = function () {
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
          <!-- /move top -->

      </footer>
      <!-- Footers-14 -->
  </div>
</div>
<!-- //footer 14 -->