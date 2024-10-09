<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php echo $this->render('includes/console/title-meta.htm',NULL,get_defined_vars(),0); ?>

    <?php echo $this->render('includes/console/head-css.htm',NULL,get_defined_vars(),0); ?>

</head>


<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php echo $this->render('includes/console/topbar.htm',NULL,get_defined_vars(),0); ?>
        <?php echo $this->render('includes/console/sidebar.htm',NULL,get_defined_vars(),0); ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <?php echo $this->render('includes/console/page-title.htm',NULL,get_defined_vars(),0); ?>

                <div class="container-fluid">

                    <div class="page-content-wrapper">

                        <!-- PAGE CONTENT WRAPPER -->

                        <?php echo $this->render($template,NULL,get_defined_vars(),0); ?>
                    </div>


                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php echo $this->render('includes/console/footer.htm',NULL,get_defined_vars(),0); ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
    
    
    <?php echo $this->render('includes/console/vendor-scripts.htm',NULL,get_defined_vars(),0); ?>

</body>

</html>