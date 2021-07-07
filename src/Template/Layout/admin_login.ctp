<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login - Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo $this->Url->build('/front_end/assets/images/logo.png'); ?>">

        <!-- App css -->
        <link href="<?php echo $this->Url->build('/back_end/assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->Url->build('/back_end/assets/css/icons.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->Url->build('/back_end/assets/css/metismenu.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->Url->build('/back_end/assets/css/style.css'); ?>" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-body">

        <?= $this->fetch('content') ?>


        <!-- jQuery  -->
        <script src="<?php echo $this->Url->build('/back_end/assets/js/jquery.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/js/metisMenu.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/js/waves.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/js/jquery.slimscroll.min.js'); ?>"></script>

        <!-- App js -->
        <script src="<?php echo $this->Url->build('/back_end/assets/js/app.js'); ?>"></script>

    </body>
</html>