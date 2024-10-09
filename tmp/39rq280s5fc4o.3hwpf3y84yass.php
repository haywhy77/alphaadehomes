<script src="<?= ($BASE) ?>/ui/frontend/js/bootstrap.min.js"></script>
<!-- Template JavaScript -->
<script src="<?= ($BASE) ?>/ui/frontend/js/jquery-3.3.1.min.js"></script>
<script src="<?= ($BASE) ?>/ui/frontend/js/theme-change.js"></script>
<!--/search-->
<script src="<?= ($BASE) ?>/ui/frontend/js/modernizr.custom.js"></script>
<!--/footer-9-->

<script src="<?= ($BASE) ?>/ui/plugins/chocolat/dist/js/chocolat.js"></script>
<script type="text/javascript ">
    $(function() {
        $('.w3_agile_portfolio_grid a').Chocolat();
    });
</script>
<script src="<?= ($BASE) ?>/ui/frontend/js/classie.js"></script>
<script src="<?= ($BASE) ?>/ui/frontend/js/demo1.js"></script>
<!--//search-->
<!--/stats-number-counter-->
<script src="<?= ($BASE) ?>/ui/frontend/js/jquery.waypoints.min.js"></script>
<script src="<?= ($BASE) ?>/ui/frontend/js/jquery.countup.js"></script>
<script>
    $('.counter').countUp();
</script>

<?php if (isset($extra) && array_key_exists('js', $extra)): ?>
    
        <?php foreach (($extra['js']?:[]) as $item): ?>
            <script src="<?= ($BASE) ?>/<?= ($item) ?>"></script>
        <?php endforeach; ?>
    
<?php endif; ?>

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
