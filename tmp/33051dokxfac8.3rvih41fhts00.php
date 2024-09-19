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
        <link rel="stylesheet" href="<?= ($BASE) ?>/<?= ($ASSETS) ?>/css/styles.css?v=1.0.3">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
        <!-- EOF CSS INCLUDE -->
        <!--Load page specifics -->
        <?php if (isset($extra) && array_key_exists('css', $extra)): ?>
            
                <?php foreach (($extra['css']?:[]) as $item): ?>
                    <link href="<?= ($BASE) ?>/<?= ($ASSETS) ?><?= ($item) ?>" rel="stylesheet" type="text/css"/>
                <?php endforeach; ?>
            
        <?php endif; ?>
        <!-- <link href="<?= ($BASE) ?>/<?= ($ASSETS) ?>/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" /> -->
        <!-- <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css"> -->

        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

        
    </head>
    <body class="indent indent--rounded indent--shadowed">
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
        <!-- PAGE WRAPPER -->
        <div class="page page--w-header page--w-container">

            <!-- PAGE HEADER -->
            <header class="page__header ">
                <div class="logo-holder" style="margin-bottom:10px;">
                    <a href="/" class="logo-text " style="width:100%"><img src="<?= ($BASE) ?>/ui/img/logo.png" style="width:80%;" /></a>
                </div>
                <div class="box">
                    <!-- <form class="page-header-search" id="header_search">
                        <input type="text" class="form-control" placeholder="Type in to search">
                        <div class="page-header-search__icon"></div>
                    </form> -->
                </div>
                <div class="box-fluid">
                
                </div>
                <div class="box">
                    <div class="dropdown float-start">
                        <!-- <button class="btn btn-light btn-icon" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="li-clipboard-alert"></span></button>        
                        <div class="dropdown-menu dropdown-menu-right">            
                            <div class="page-heading">
                                <div class="page-heading__container">
                                    <h1 class="title">Notifications</h1>
                                    <p class="caption">List of latest events</p>
                                </div>
                                <div class="page-heading__container float-end">
                                    <button class="btn btn-light btn-icon">
                                        <span class="fa fa-refresh"></span>
                                    </button>
                                </div>
                            </div>
                            
                            <ul class="list-group list-group-flush">
                                
                                <li class="list-group-item padding-left-10 padding-right-10">
                                    <button class="btn btn-light btn-block margin-top-5">All Notifications</button>
                                </li>
                            </ul>
                        </div> -->
                        
                        <button class="btn btn-light btn-icon" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="li-user"></span></button>        
                        <div class="dropdown-menu dropdown-menu-right">            
                            <div class="page-heading">
                                <div class="page-heading__container">
                                    <h1 class="title">
                                        <?php if ($SESSION['account']=='USER'): ?>
                                            <?= ($USER->name) ?>
                                            <?php else: ?><?= ($USER->names) ?>
                                        <?php endif; ?>
                                    </h1>
                                    <p class="caption">                                       
                                         <?php if ($SESSION['account']=='USER'): ?>
                                            Applicant Account
                                            <?php else: ?>       
                                                <?php if ($SESSION['account']=='CLIENT'): ?>
                                                    Employer Account
                                                    <?php else: ?>Admin Account
                                                <?php endif; ?>
                                            
                                        <?php endif; ?>
                                    </p>
                                </div>
                                <div class="page-heading__container float-end">
                                    
                                </div>
                            </div>
                            
                            <ul class="list-group list-group-flush">
                                
                                <li class="list-group-item padding-left-5">
                                    <a href="<?= ($BASE) ?>/account/<?= ($SESSION['user_id']) ?>" style="color: #fff;">
                                        <div class="icon-box icon-box--lg margin-right-10">
                                            <span class="fa fa-lock"></span>
                                        </div>
                                        <p class="py-2">My Account</p>
                                    </a>        
                                </li>                
                                <li class="list-group-item padding-left-25 ">
                                    <a href="<?= ($BASE) ?>/logout">
                                        <div class="icon-box icon-box--lg margin-right-10">
                                            <span class="fa fa-sign-out"></span>
                                        </div>
                                        <p class="py-2">Logout</p>
                                    </a>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>   
                </div>
            </header>
            <!-- //END PAGE HEADER -->
            <?php echo $this->render('includes/menus.html',NULL,get_defined_vars(),0); ?>