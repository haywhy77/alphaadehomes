<!-- Bootstrap Css -->
<link href="<?= ($BASE) ?>/ui/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link href="//fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;600;700&display=swap" rel="stylesheet">
<!-- Template CSS -->
<link rel="stylesheet" href="<?= ($BASE) ?>/ui/frontend/css/style-liberty.css" />
<link rel="stylesheet" href="<?= ($BASE) ?>/ui/plugins/chocolat/dist/css/chocolat.css" />
<!-- Icons Css -->


<?php if (isset($extra) && array_key_exists('css', $extra)): ?>
    
        <?php foreach (($extra['css']?:[]) as $item): ?>
            <link href="<?= ($BASE) ?>/<?= ($item) ?>" rel="stylesheet" type="text/css"/>
        <?php endforeach; ?>
    
<?php endif; ?>

<link rel="stylesheet" href="<?= ($BASE) ?>/ui/admin/css/extended.css" />