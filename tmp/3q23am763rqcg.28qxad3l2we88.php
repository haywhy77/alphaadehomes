<!-- JAVASCRIPT -->
<script src="<?= ($BASE) ?>/ui/admin/libs/jquery/jquery.min.js"></script>
<script src="<?= ($BASE) ?>/ui/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= ($BASE) ?>/ui/admin/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= ($BASE) ?>/ui/admin/libs/simplebar/simplebar.min.js"></script>
<script src="<?= ($BASE) ?>/ui/admin/libs/node-waves/waves.min.js"></script>

<?php if (isset($extra) && array_key_exists('js', $extra)): ?>
    
        <?php foreach (($extra['js']?:[]) as $item): ?>
            <script src="<?= ($BASE) ?>/<?= ($item) ?>"></script>
        <?php endforeach; ?>
    
<?php endif; ?>

<script src="<?= ($BASE) ?>/ui/admin/js/app.js"></script>