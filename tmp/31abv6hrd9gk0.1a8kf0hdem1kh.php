<aside class="left-section">
    <div class="logo">
        <button class="menu-btn" id="menu-close">
            <i class='bx bx-log-out-circle'></i>
        </button>
        <img src="<?= ($BASE) ?>/<?= ($ASSETS) ?>/images/logo.png">
        <a href="#">AsmrProg</a>
    </div>

    <div class="sidebar">
        <?php $count=0; foreach (($MENUS?:[]) as $menu): $count++; ?>
            <?php if ($menu->type=='simple'): ?>
                
                    <div class="item">
                        <i class='bx bx-<?= ($menu->icon) ?>'></i>
                        <a href="<?= ($BASE) ?>/console<?= ($menu->url) ?>"><?= ($menu->label) ?></a>
                    </div>
                
                <?php else: ?>
                    <div class="item">
                        <i class='bx bx-<?= ($menu->icon) ?>'></i>
                        <a href="#"><?= ($menu->label) ?></a>
                        <?php if (isset($menu->child)): ?>
                            
                                <ul>
                                    <?php foreach (($menu->child?:[]) as $child): ?>
                                        <?php if ($child->type=='divider'): ?>
                                            
                                                <li>
                                                    <hr />
                                                </li>
                                            
                                            <?php else: ?>
                                                <li>
                                                    <a href="<?= ($BASE) ?>/consol<?= ($child->url) ?>" class="no-icon">
                                                        <span class="text"><?= ($child->label) ?></span>
                                                    </a>
                                                </li>
                                            
                                        <?php endif; ?>
                                        
                                    <?php endforeach; ?>
                                </ul>
                            
                        <?php endif; ?>
                    </div>
                
            <?php endif; ?>
            
        <?php endforeach; ?>
        <!-- <div class="item" id="active">
            <i class='bx bx-home-alt-2'></i>
            <a href="#">Overview</a>
        </div>
        <div class="item">
            <i class='bx bx-grid-alt'></i>
            <a href="#">Course</a>
        </div>
        <div class="item">
            <i class='bx bx-folder'></i>
            <a href="#">Resources</a>
        </div>
        <div class="item">
            <i class='bx bx-message-square-dots'></i>
            <a href="#">Message</a>
        </div>
        <div class="item">
            <i class='bx bx-cog'></i>
            <a href="#">Setting</a>
        </div> -->
    </div>

    <div class="pic">
        <img src="<?= ($BASE) ?>/<?= ($ASSETS) ?>/images/pro.png">
    </div>

    <div class="upgrade">
        <h5>Upgrade Your Plan</h5>
        <div class="link">
            <a href="#">Go to <b>PRO</b></a>
            <i class='bx bxs-chevron-right'></i>
        </div>
    </div>

</aside>