<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= ($business) ?></title>

        <!-- META SECTION -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
        <!-- <link rel="stylesheet" href="<?= ($BASE) ?>/<?= ($ASSETS) ?>/css/bootstrap.min.css"> -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="<?= ($BASE) ?>/<?= ($ASSETS) ?>/css/style.css">
        <!-- EOF CSS INCLUDE -->
        <!--Load page specifics -->
        <?php if (isset($extra) && array_key_exists('css', $extra)): ?>
            
                <?php foreach (($extra['css']?:[]) as $item): ?>
                    <link href="<?= ($BASE) ?>/<?= ($ASSETS) ?><?= ($item) ?>" rel="stylesheet" type="text/css"/>
                <?php endforeach; ?>
            
        <?php endif; ?>
        
    </head>
    <body>
        <a class="dropdown-item hide modal-trigger" style="display: none;" href="#" data-bs-target="#openanydialog" data-bs-toggle="modal">Trigeger</a>
        <div class="modal fade" id="openanydialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel alert-title">Alert</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body alert-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes, continue</button>
                    </div>
                </div>
            </div>
        </div>
        <body>

            <div class="main-container">
                <?php echo $this->render('includes/console/menus.html',NULL,get_defined_vars(),0); ?>
                
        