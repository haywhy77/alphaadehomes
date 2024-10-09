<!doctype html>
<html lang="en">

<head>
    <?php echo $this->render('includes/public/title-meta.htm',NULL,get_defined_vars(),0); ?>

    <?php echo $this->render('includes/public/head-css.htm',NULL,get_defined_vars(),0); ?>
</head>

<body>
    
    <?php echo $this->render('includes/public/header.htm',NULL,get_defined_vars(),0); ?>

    <?php echo $this->render('includes/public/top-bar.htm',NULL,get_defined_vars(),0); ?>
    
    

    <section class="w3l-blog blog-single-post">
    
        <div class="blog py-5">
            <div class="container py-lg-5 py-md-4 py-2">
                <div class="row justify-content-center bloghny-page">
                    <!--/w3l-blopagew3-left-->
                    <div class="col-lg-8 blopagew3-left">
                        <div class="single-post-image mb-4 gallery">
                            <div class="list">
                                <?php $count=0; foreach (($property->pictures?:[]) as $key=>$props): $count++; ?>
                                    <div class="image gallery-click" data-value="<?= ($BASE) ?>/ui/properties/<?= ($property->id) ?>/<?= ($props) ?>">
                                        <img src="<?= ($BASE) ?>/ui/properties/<?= ($property->id) ?>/<?= ($props) ?>" class=" w-100 radius-image" alt="blog-post-image">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="display">
                                <img src="<?= ($BASE) ?>/<?= (@$property->default_picture) ?>" class="img-fluid w-100 radius-image" alt="blog-post-image">
                            </div>
                        </div>
                        <div class="blo-singl mb-4">
                            <ul class="blog-single-author-date d-sm-flex align-items-center">
                                <li>
                                    <span class="fas fa-user"></span><a href="#admin"> by Admin</a>
                                </li>
                                <li>
                                    <span class="fas fa-clock"></span> <?= ($property->created_at)."
" ?>
                                </li>
                                <li>
                                    <a href="#comments"><span class="fas fa-comments"></span> 3</a>
                                </li>
                            </ul>
                        </div>
                        <div class="single-post-content">
                            <h3 class="post-content-title mb-3"><?= ($property->title) ?></h3>

                            <p class="mb-4"><span class="fas fa-map"></span> <?= ($property->address) ?> <?= ($property->city) ?> <?= ($property->state) ?></p>
                            

                        </div>
                        <div class="single-post-content my-md-5 mt-5 mb-3">
                            <h3 class="post-content-title mb-3">Description of property</h3>
                            <p class="mb-4"><?= ($property->description) ?></p>
                        </div>

                        
                        

                        <nav class="post-navigation mb-2 py-4" style="width: 100%; display: flex !important; flex-direction: row !important; justify-content: space-between;">
                            
                            <div class="rating-wrapper" data-id="ratings" data-url="<?= ($BASE) ?>/properties/ratings/<?= (md5($property->id)) ?>">

                                <strong>Rate this property</strong>
                              
                                <div class="star-wrapper">
                                    <i class="fa fa-regular fa-star"></i>
                                    <i class="fa fa-regular fa-star"></i>
                                    <i class="fa fa-regular fa-star"></i>
                                    <i class="fa fa-regular fa-star"></i>
                                    <i class="fa fa-regular fa-star"></i>
                                </div>
                                <p>Property ratings so far: <?= ($property->ratings) ?>%</p>
                            </div>
                            
                            <ul class="share-post text-right">
                                <li class="facebook">
                                    <a href="#link" title="Facebook">
                                        <span class="fab fa-facebook-f" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="#link" title="Twitter">
                                        <span class="fab fa-twitter" aria-hidden="true"></span>
                                    </a>
                                </li>
                                <li class="google">
                                    <a href="#link" title="Google">
                                        <span class="fab fa-pinterest-p" aria-hidden="true"></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                        

                        <div class="reply" id="reply">
                            <?php foreach ((\Flash::instance()->getMessages()?:[]) as $msg): ?>
                                <div class="alert alert-<?= ($msg['status']) ?> alert-dismissable">
                                    <?= ($msg['text'])."
" ?>
                                </div>
                            <?php endforeach; ?>
                            <h3 class="post-content-title">Show interest</h3>
                            <form action="<?= ($BASE) ?>/properties/<?= (strtolower($property->category)) ?>/<?= (md5($property->id)) ?>" method="POST">
                                <input type="hidden" name="index" value="<?= ($property->id) ?>" />
                                <div class="form-group reply">
                                    <div class="input-grids row mb-md-4 mb-3">

                                        <div class="form-group col-lg-6">
                                            <input type="text" name="name" class="form-control" placeholder="Your Name*" required="">
                                        </div>
                                        <div class="form-group col-lg-6 mt-lg-0 mt-3">
                                            <input type="email" name="email" class="form-control" placeholder="Email*" required="">
                                        </div>
                                    </div>
                                    <textarea class="form-control" name="message" placeholder="Your Message" id="exampleFormControlTextarea1" rows="4"></textarea>
                                    <div class="w3-submit text-right mt-4">
                                        <button type="submit" class="btn btn-style btn-primary">Show interest <i class="fas fa-paper-plane ms-2"></i></button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!--//w3l-blopagew3-left-->
                    <!--/w3l-blopagew3-right-->
                    <div class="sidebar-side col-lg-4 col-md-12 col-sm-12 mt-lg-0 mt-5">
                        <aside class="sidebar ps-lg-4">
                            <div class="sidebar-blog-category">
                                <!-- Popular Post Widget-->
                                <div class="sidebar-widget popular-posts">
                                    <div class="sidebar-title">
                                        <h4>Latest Post</h4>
                                    </div>

                                    <?php $count=0; foreach (($properties?:[]) as $key=>$property): $count++; ?>
                                        <article class="post">
                                            <figure class="post-thumb">
                                                <img src="<?= ($BASE) ?>/<?= ($fetchImage($property['id'])) ?>" class="radius-image" alt="" style="height: 100px;">
                                            </figure>
                                            <div class="text"><a href="<?= ($BASE) ?>/properties/<?= (strtolower($property['category'])) ?>/<?= (md5($property['id'])) ?>"><?= ($property['title']) ?></a>
                                                <div class="post-info"><?= ($property['created_at']) ?></div>
                                            </div>
                                        </article>
                                    <?php endforeach; ?>
                                    

                                </div>
                                
                                <div class="sidebar-widget sidebar-blog-category">
                                    <div class="side-post-banner mb-5">
                                        <h3 class="title-left">Do you want to join our
                                            real estate network?</h3>
                                        <a href="#read" class="btn-style btn btn-primary mt-4"> Get Started <i class="fas fa-angle-double-right ms-2"></i></a>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </aside>
                    </div>
                    <!--//w3l-blopagew3-right-->
                </div>

            </div>
        </div>
    </section>
    
    <?php echo $this->render('public/footer.htm',NULL,get_defined_vars(),0); ?>
    <?php echo $this->render('includes/public/vendor-scripts.htm',NULL,get_defined_vars(),0); ?>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            $('.gallery-click').on('click', function(e){
                var url=$(this).attr('data-value')
                $(".display").children('img').replaceWith(`<img src="${url}" class="img-fluid w-100 radius-image" alt="blog-post-image">`)
            })

            $("div.star-wrapper i").on("mouseover", function () {

                let rating = $(this).prevAll().length + 1;
                let movie_id = $(this).closest("div.rating-wrapper").data("id");
                let url = $(this).closest("div.rating-wrapper").data("url");
                
                if ($(this).siblings("i.vote-recorded").length == 0) {
                    $(this).prevAll().addBack().addClass("fa-solid yellow").removeClass("fa-regular");
                    $(this).nextAll().removeClass("fa-solid yellow").addClass("fa-regular");
                    $(this).on("click", function(e){
                        $.post(url, { move_id: movie_id, user_rating: rating }).done(
                            function (data) {
                                
                            }
                        );
                    })
                }

                // if ($(this).siblings("i.vote-recorded").length == 0) {
                //     $(this).prevAll().addBack().addClass("fa-solid yellow").removeClass("fa-regular");  
                //     $(this).nextAll().removeClass("fa-solid yellow").addClass("fa-regular");
                // }
            });
        })
    </script>
</body>

</html>