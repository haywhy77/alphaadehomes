<!doctype html>
<html lang="en">

<head>
    <?php echo $this->render('includes/public/title-meta.htm',NULL,get_defined_vars(),0); ?>

    <?php echo $this->render('includes/public/head-css.htm',NULL,get_defined_vars(),0); ?>
</head>

<body>
    
    <?php echo $this->render('includes/public/header.htm',NULL,get_defined_vars(),0); ?>

    <?php echo $this->render('includes/public/top-bar.htm',NULL,get_defined_vars(),0); ?>
    
    <section class="locations-1" id="locations">
        <div class="locations py-5">
            <div class="container py-lg-5 py-md-4 py-2">
                <div class="heading text-center mx-auto">
                    <h6 class="title-subw3hny mb-1">Our Properties</h6>
                    <h3 class="title-w3l mb-3">Latest Properties</h3>
                </div>
                <div class="image-gallery">
                    <?php $count=0; foreach (($properties['data']?:[]) as $key=>$property): $count++; ?>
                        <div class="image-card div-click" data-url="<?= ($BASE) ?>/properties/<?= (strtolower($property['category'])) ?>/<?= (md5($property['id'])) ?>">
                            <div class="w3property-grid">
                                <a href="#property">
                                    <div class="box16">
                                        <div class="rentext-listing-category">
                                            <span class="pro-left"><?= (strtoupper($property['category'])) ?></span>
                                            <span class="pro-right"><?= (strtoupper($property['type'])) ?></span>
                                        </div>
                                        <img class="img-fluid" src="<?= ($BASE) ?>/<?= ($fetchImage($property['id'])) ?>"  width="100" height="20px" alt="">
                                        <div class="box-content">
                                            <h3 class="title">$<?= ($property['price']) ?></h3>
                                            <span class="post"><?= ($property['address']) ?> <?= ($property['city']) ?> <?= ($property['state']) ?></span>
                                        </div>
                                    </div>
                                </a>
                                <div class="list-information space-between">
                                    <ul class="product-features">
                                        <li>
                                            <i class="fas fa-bed"></i>
                                            <span class="listable-value">
                                                <span class="prefix">Beds </span>
    
                                                <span class="value"><?= (str_pad($property['bedrooms'],2,'0',STR_PAD_LEFT)) ?></span>
    
                                                <span class="suffix"></span>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="fas fa-shower"></i>
                                            <span class="listable-value">
                                                <span class="prefix"> Baths </span>
    
                                                <span class="value"><?= (str_pad($property['bathrooms'],2,'0',STR_PAD_LEFT)) ?></span>
    
                                                <span class="suffix"> </span>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="fas fa-vector-square"></i>
                                            <span class="listable-value">
                                                <span class="prefix"></span>
    
                                                <span class="value"><?= ($property['square_feet']) ?> </span>
    
                                                <span class="suffix">
                                                    Sqft </span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                    
                </div>
                <!-- <div class="item item2">Item 2</div>
                <div class="item item3">Item 3</div>
                <div class="item item4">Item 4</div>
                <div class="item item5">Item 5</div>
                <div class="item item6">Item 6</div>
                <div class="item item7">Item 7</div>
                <div class="item item8">Item 8</div>
                <div class="item item9">Item 9</div>
                <div class="item item10">Item 10</div> -->
                
                <!-- <div class="row pt-md-5 pt-4">
                    <?php $count=0; foreach (($properties['data']?:[]) as $key=>$property): $count++; ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="w3property-grid">
                                <a href="#property">
                                    <div class="box16">
                                        <div class="rentext-listing-category">
                                            <span class="pro-left"><?= (strtoupper($property['category'])) ?></span>
                                            <span class="pro-right"><?= (strtoupper($property['type'])) ?></span>
                                        </div>
                                        <img class="img-fluid" src="<?= ($BASE) ?>/<?= ($fetchImage($property['id'])) ?>"  width="100" height="20px" alt="">
                                        <div class="box-content">
                                            <h3 class="title">$<?= ($property['price']) ?></h3>
                                            <span class="post"><?= ($property['address']) ?> <?= ($property['city']) ?> <?= ($property['state']) ?></span>
                                        </div>
                                    </div>
                                </a>
                                <div class="list-information space-between">
                                    <ul class="product-features">
                                        <li>
                                            <i class="fas fa-bed"></i>
                                            <span class="listable-value">
                                                <span class="prefix">Beds </span>
    
                                                <span class="value"><?= (str_pad($property['bedrooms'],2,'0',STR_PAD_LEFT)) ?></span>
    
                                                <span class="suffix"></span>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="fas fa-shower"></i>
                                            <span class="listable-value">
                                                <span class="prefix"> Baths </span>
    
                                                <span class="value"><?= (str_pad($property['bathrooms'],2,'0',STR_PAD_LEFT)) ?></span>
    
                                                <span class="suffix"> </span>
                                            </span>
                                        </li>
                                        <li>
                                            <i class="fas fa-vector-square"></i>
                                            <span class="listable-value">
                                                <span class="prefix"></span>
    
                                                <span class="value"><?= ($property['square_feet']) ?> </span>
    
                                                <span class="suffix">
                                                    Sqft </span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div> -->
            </div>
        </div>
    </section>
    
    <?php echo $this->render('includes/public/footer.htm',NULL,get_defined_vars(),0); ?>
    <?php echo $this->render('includes/public/vendor-scripts.htm',NULL,get_defined_vars(),0); ?>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            $('.div-click').on('click', function(e){
                var url=$(this).attr('data-url')
                window.location.href=url;
            })
        })
    </script>
</body>

</html>