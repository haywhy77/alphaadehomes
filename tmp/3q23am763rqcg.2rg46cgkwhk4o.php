<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-img">
                    <img src="<?= ($BASE) ?>/ui/admin/images/users/avatar-7.jpg" alt="" class="rounded-circle">
                    <span class="avatar-online bg-success"></span>
                </div>
                <div class="user-info">
                    <h5 class="mt-3 font-size-16 text-white"><?= ($SESSION['USER']->names) ?></h5>
                    <span class="font-size-13 text-white-50">Administrator</span>
                </div>
            </div>
        </div>



        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <?php foreach (($MENUS?:[]) as $menu): ?>
                    <li>
                        <?php if ($menu->type=='simple'): ?>
                            
                                <a href="<?= ($BASE) ?><?= ($menu->url) ?>" class="waves-effect">
                                    <i class="dripicons-<?= ($menu->icon) ?>"></i>
                                    <span class="text"><?= ($menu->label) ?></span>
                                </a>
                            
                            <?php else: ?>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-<?= ($menu->icon) ?>"></i>
                                    <span class="text"><?= ($menu->label) ?></span>
                                </a>
                            
                        <?php endif; ?>
                        <?php if (isset($menu->child)): ?>
                            
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php foreach (($menu->child?:[]) as $child): ?>
                                        <li>
                                            <a href="<?= ($BASE) ?><?= ($child->url) ?>" class="no-icon">
                                                <span class="text"><?= ($child->label) ?></span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->