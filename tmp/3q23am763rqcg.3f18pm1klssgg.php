<!-- Bootstrap Css -->
<link href="<?= ($BASE) ?>/ui/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->


<?php if (isset($extra) && array_key_exists('css', $extra)): ?>
    
        <?php foreach (($extra['css']?:[]) as $item): ?>
            <link href="<?= ($BASE) ?>/<?= ($item) ?>" rel="stylesheet" type="text/css"/>
        <?php endforeach; ?>
    
<?php endif; ?>

<link href="<?= ($BASE) ?>/ui/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="<?= ($BASE) ?>/ui/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<link href="<?= ($BASE) ?>/ui/admin/css/extended.css" id="app-style" rel="stylesheet" type="text/css" />