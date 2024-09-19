<?php echo $this->render('includes/public/header.htm',NULL,get_defined_vars(),0); ?>
<div class="inner-banner">
    <section class="w3l-breadcrumb py-5"> 
        
        <div class="container py-lg-5 py-md-3">
            <h2 class="title">Presidents</h2>
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

<section class="w3l-team-main" id="team">
    <div class="team py-5">
        <div class="container py-lg-5">
            
            <div class="team-row mt-md-5 mt-4">
                <?php foreach (($candidates?:[]) as $key=>$cand): ?>
                    
                    <div class="team-wrap">
                        <div class="team-member text-center">
                            <div class="team-img">
                                <a href="<?= ($BASE) ?>/view-profile/<?= (md5($cand['id'])) ?>">
                                    <img src="<?= ($BASE) ?>/<?= ($cand['picture_path']) ?>" class="radius-image img-fluid"/>
                                </a>
                            </div>
                            <a href="<?= ($BASE) ?>/view-profile/<?= (md5($cand['id'])) ?>" class="team-title"><?= ($cand['name']) ?></a>
                            <p><?= ($cand['party']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
        </div>
    </div>
</section>

<?php echo $this->render('includes/public/footer.htm',NULL,get_defined_vars(),0); ?>
