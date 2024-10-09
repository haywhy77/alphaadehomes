<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $this->render('includes/public/title-meta.htm',NULL,get_defined_vars(),0); ?>

    <?php echo $this->render('includes/public/head-css.htm',NULL,get_defined_vars(),0); ?>

</head>


<body>
    <?php echo $this->render('includes/public/header.htm',NULL,get_defined_vars(),0); ?>
    <?php echo $this->render($template,NULL,get_defined_vars(),0); ?>
    <?php echo $this->render('includes/public/footer.htm',NULL,get_defined_vars(),0); ?>
    <?php echo $this->render('includes/public/vendor-scripts.htm',NULL,get_defined_vars(),0); ?>

</body>

</html>