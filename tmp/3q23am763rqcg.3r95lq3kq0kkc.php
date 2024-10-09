<!-- start page title -->
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title">
                    <h4><?= (($page['title']) ? $page['title'] : '') ?></h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?= (($page['pagetitle']) ? $page['pagetitle'] : '') ?></a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?= (($page['subtitle']) ? $page['subtitle'] : '') ?></a></li>
                            <li class="breadcrumb-item active"><?= (($page['title']) ? $page['title'] : '') ?></li>
                        </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="float-end d-none d-sm-block">
                    <?php if (isset($page['actionButton'])): ?>
                        <a href="<?= ($BASE) ?>/<?= ($page['actionButton']['url']) ?>" class="btn btn-success"><?= ($page['actionButton']['title']) ?></a>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->    