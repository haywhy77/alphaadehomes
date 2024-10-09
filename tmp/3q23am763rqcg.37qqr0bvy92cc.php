<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">

               <!-- LOGO -->
         <div class="navbar-brand-box">
            <a href="index.php" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="<?= ($BASE) ?>/ui/admin/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="<?= ($BASE) ?>/ui/admin/images/logo-dark.png" alt="" height="20">
                </span>
            </a>

            <a href="index.php" class="logo logo-light">
                <span class="logo-sm">
                    <img src="<?= ($BASE) ?>/ui/admin/images/logo-sm.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="<?= ($BASE) ?>/ui/admin/images/logo-light.png" alt="" height="20">
                </span>
            </a>
        </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>


            <!-- <div class="topbar-social-icon me-3 d-none d-md-block">
                <ul class="list-inline title-tooltip m-0">
                    <li class="list-inline-item">
                        <a href="email-inbox.php" data-bs-toggle="tooltip" data-placement="top" title="Email">
                         <i class="mdi mdi-email-outline"></i>
                        </a>
                    </li>
                        
                    <li class="list-inline-item">
                        <a href="chat.php" data-bs-toggle="tooltip" data-placement="top" title="Chat">
                         <i class="mdi mdi-tooltip-outline"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a href="calendar.php" data-bs-toggle="tooltip" data-placement="top" title="Calendar">
                         <i class="mdi mdi-calendar"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a href="pages-invoice.php" data-bs-toggle="tooltip" data-placement="top" title="Printer">
                         <i class="mdi mdi-printer"></i>
                        </a>
                    </li>
                </ul>
            </div> -->
            
        </div>

         <!-- Search input -->
         <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input form-control" placeholder="Search" />
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <div class="d-flex">
            <!-- <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item toggle-search noti-icon waves-effect" data-target="#search-wrap">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div> -->

            <!-- <div class="dropdown d-none d-md-block ms-2">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="me-2" src="<?= ($BASE) ?>/ui/admin/images/flags/us.jpg" alt="Header Language" height="16"> English <span class="mdi mdi-chevron-down"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">

                   
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="<?= ($BASE) ?>/ui/admin/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> German </span>
                    </a>

                   
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="<?= ($BASE) ?>/ui/admin/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Italian </span>
                    </a>

                   
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="<?= ($BASE) ?>/ui/admin/images/flags/french.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> French </span>
                    </a>

                   
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="<?= ($BASE) ?>/ui/admin/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Spanish </span>
                    </a>

                   
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="<?= ($BASE) ?>/ui/admin/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle"> Russian </span>
                    </a>
                </div>
            </div> -->

    
           

           

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?= ($BASE) ?>/ui/admin/images/users/avatar-7.jpg"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1"><?= ($USER->names) ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                   
                    <a class="dropdown-item" href="<?= ($BASE) ?>/console/account/<?= ($USER->id) ?>"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="<?= ($BASE) ?>/console/logout"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>
            
        </div>
    </div>
</header>