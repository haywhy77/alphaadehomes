
<script type="text/javascript" src="<?= ($BASE) ?>/<?= ($ASSETS) ?>/js/vendors/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?= ($BASE) ?>/<?= ($ASSETS) ?>/js/vendors/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="<?= ($BASE) ?>/<?= ($ASSETS) ?>/js/vendors/bootstrap/bootstrap.bundle.min.js"></script>

<script type="text/javascript" src="<?= ($BASE) ?>/<?= ($ASSETS) ?>/js/vendors/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script  type="text/javascript" src="<?= ($BASE) ?>/<?= ($ASSETS) ?>/js/script.js"></script>
<?php if (isset($extra) && array_key_exists('js', $extra)): ?>
   
       <?php foreach (($extra['js']?:[]) as $item): ?>
           <script src="<?= ($BASE) ?>/<?= ($ASSETS) ?>/<?= ($item) ?>"></script>
       <?php endforeach; ?>
   
<?php endif; ?>

<!-- //END THIS PAGE SCRIPTS ONLY -->
<!-- TEMPLATE SCRIPTS -->

<script type="text/javascript" src="<?= ($BASE) ?>/<?= ($ASSETS) ?>/js/app.js"></script>

<script type="text/javascript" src="<?= ($BASE) ?>/<?= ($ASSETS) ?>/js/btn.js"></script>

</body>
</html>