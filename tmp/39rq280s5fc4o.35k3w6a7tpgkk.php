<!DOCTYPE html>
<html lang="zxx">

<head>

    <?php echo $this->render('includes/console/title-meta.htm',NULL,get_defined_vars(),0); ?>
    <?php echo $this->render('includes/console/head-css.htm',NULL,get_defined_vars(),0); ?>

</head>


<body class="authentication-bg bg-primary">
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container">

                <div class="home-btn">
                    <a href="<?= ($BASE) ?>" class="text-white router-link-active"><i class="fas fa-home h2"></i></a>
                </div>


                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">


                                    <div class="text-center">
                                        <a href="index.php">
                                            <img src="<?= ($BASE) ?>/ui/frontend/images/alpha-logo.png" height="150" alt="logo">
                                        </a>

                                        <h5 class="text-primary mb-2 mt-4">Welcome Back !</h5>
                                        <p class="text-muted">Sign in to continue to <?= ($business) ?>.</p>
                                    </div>

                                    <?php foreach ((\Flash::instance()->getMessages()?:[]) as $msg): ?>
                                        <div class="alert alert-<?= ($msg['status']) ?> alert-dismissable">
                                            <?= ($msg['text'])."
" ?>
                                        </div>
                                    <?php endforeach; ?>

                                    <form class="form-horizontal mt-4 pt-2" action="<?= ($BASE) ?>/<?= ($form['action']) ?>" method="post" autocomplete="off">

                                        <div class="mb-3 <?= (isset($useremail_err) && !empty($useremail_err) ? 'has-error' : '') ?>">
                                            <label for="username">Username<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="useremail" name="email" placeholder="Enter useremail">
                                            <span class="text-danger"><?= (isset($useremail_err) && !empty($useremail_err) ? $useremail_err: '') ?></span>
                                        </div>

                                        <div class="mb-3 <?= (isset($password_err) && !empty($password_err) ? 'has-error' : '') ?>">
                                            <label for="userpassword">Password<span class="text-danger"> *</span></label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                            <span class="text-danger"><?= (isset($password_err) && !empty($password_err) ? $password_err : '') ?></span>
                                        </div>

                                        <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="customControlInline">
                                                    <label class="form-label"
                                                        for="customControlInline">Remember me</label>
                                                </div>
                                        </div>

                                        <div>
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <a href="auth-recoverpw.php" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                        </div>
    

                                    </form>

                                  
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                            <p>© <script>document.write(new Date().getFullYear())</script> © <?= ($business) ?>.. Crafted with <i class="mdi mdi-heart text-danger"></i> by <?= ($powered) ?></p>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- End Log In page -->
    </div>
    <?php echo $this->render('includes/console/vendor-scripts.htm',NULL,get_defined_vars(),0); ?>

    <script src="<?= ($BASE) ?>/ui/admin/js/app.js"></script>

</body>

</html>