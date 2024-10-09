<div class="row ">
    <div class="col-md-12">
        <div class="card-body">
            <h4 id="rw-fl-row">Admin Account</h4>
            <p class="subtitle margin-bottom-20">Invite user to join your team.</p>
            <?php foreach ((\Flash::instance()->getMessages()?:[]) as $msg): ?>
                <div class="alert alert-<?= ($msg['status']) ?> alert-dismissable">
                    <?= ($msg['text'])."
" ?>
                </div>
            <?php endforeach; ?>
            <form method="post" action="<?= ($BASE) ?>/profile/<?= ($id) ?>">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required="required" value="<?= ($profile->names) ?>">
                    <span class="form-text margin-top-0">Enter the official name</span>
                    
                </div>
                <hr/>
                
                
                <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" name="oldPassword" class="form-control" required="required">
                    <span class="form-text margin-top-0">Enter the old password</span>
                    
                </div>

                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="npassword" class="form-control" required="required">
                    <span class="form-text margin-top-0">Enter the new password</span>
                    
                </div>
                
                <hr/>
                
                <div class="form-group" id="sign_button">
                    <button type="submit" class="btn btn-secondary">Update Account</button>
                </div>
            </form>
    
        </div>
    </div>
</div>