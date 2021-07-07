
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- <meta name="author" content="M_Adnan"> -->
<title>CSC</title>
<meta name="robots" content="noindex, follow" />
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<!-- Bootstrap CSS -->
<link href="<?php echo $this->Url->build('/front_end/assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

<!-- Icon Font CSS -->
<link href="<?php echo $this->Url->build('/front_end/assets/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

<!-- Plugins CSS -->
<link href="<?php echo $this->Url->build('/front_end/assets/css/plugins.css'); ?>" rel="stylesheet">

<!-- Helper CSS -->
<link href="<?php echo $this->Url->build('/front_end/assets/css/helper.css'); ?>" rel="stylesheet">

<!-- Main Style CSS -->
<link href="<?php echo $this->Url->build('/front_end/assets/css/style.css'); ?>" rel="stylesheet">

<!-- Modernizer JS -->
<script src="<?php echo $this->Url->build('/front_end/assets/js/vendor/modernizr-2.8.3.min.js'); ?>"></script>


<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="<?php //echo $this->Url->build('/front_end/rs-plugin/css/settings.css'); ?>" media="screen" />

<!-- Bootstrap Core CSS -->
<link href="<?php //echo $this->Url->build('/front_end/css/bootstrap.min.css'); ?>" rel="stylesheet">

<link rel="shortcut icon" href="<?php echo $this->Url->build('/front_end/assets/images/logo.png'); ?>">
<!-- Custom CSS -->
<link href="<?php //echo $this->Url->build('/front_end/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php //echo $this->Url->build('/front_end/css/ionicons.min.css'); ?>" rel="stylesheet">
<link href="<?php //echo $this->Url->build('/front_end/css/main.css'); ?>" rel="stylesheet">
<link href="<?php //echo $this->Url->build('/front_end/css/style.css'); ?>" rel="stylesheet">
<link href="<?php //echo $this->Url->build('/front_end/css/responsive.css'); ?>" rel="stylesheet">
<link href="<?php //echo $this->Url->build('/front_end/css/style-new.css'); ?>" rel="stylesheet">
<link href="<?php //echo $this->Url->build('/front_end/css/responsive-new.css'); ?>" rel="stylesheet">
<link href="<?php //echo $this->Url->build('/front_end/css/cart.css'); ?>" rel="stylesheet">

<!-- JavaScripts -->
<script src="<?php //echo $this->Url->build('/front_end/js/modernizr.js'); ?>"></script>

<!-- Online Fonts -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>


<link rel="stylesheet" type="text/css" href="<?php echo $this->Url->build('/front_end/css/iofrm-style.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo $this->Url->build('/front_end/css/iofrm-theme3.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo $this->Url->build('/front_end/css/login.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo $this->Url->build('/front_end/css/my-account.css'); ?>">


<script src="<?php echo $this->Url->build('/front_end/js/jquery-1.11.3.min.js'); ?>"></script> 



<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<!-- LOADER -->


<!-- Wrap -->

  
 <?php echo $this->element('front_end/header'); ?>


  <?= $this->fetch('content') ?>
  
    



<?php echo $this->element('front_end/footer'); ?>
  
  <!--======= RIGHTS =========--> 
  
</div>

<?php echo $this->element('front_end/login'); ?>




<!-- JS -->

<!-- jQuery JS -->
<script src="<?php echo $this->Url->build('/front_end/assets/js/vendor/jquery-1.12.4.min.js'); ?>"></script>
<!-- Popper JS -->
<script src="<?php echo $this->Url->build('/front_end/assets/js/popper.min.js'); ?>"></script>
<!-- Bootstrap JS -->
<script src="<?php echo $this->Url->build('/front_end/assets/js/bootstrap.min.js'); ?>"></script>
<!-- Plugins JS -->
<script src="<?php echo $this->Url->build('/front_end/assets/js/plugins.js'); ?>"></script>
<!-- Main JS -->
<script src="<?php echo $this->Url->build('/front_end/assets/js/main.js'); ?>"></script>

<script src="<?php// echo $this->Url->build('/front_end/js/bootstrap.min.js'); ?>"></script> 
<script src="<?php// echo $this->Url->build('/front_end/js/bootstrap.min.js'); ?>"></script> 
<script src="<?php// echo $this->Url->build('/front_end/js/own-menu.js'); ?>"></script> 
<script src="<?php// echo $this->Url->build('/front_end/js/jquery.lighter.js'); ?>"></script> 
<script src="<?php// echo $this->Url->build('/front_end/js/owl.carousel.min.js'); ?>"></script> 
<script type="text/javascript">
    $(document).ready( function () {
        //If your <ul> has the id "glasscase"
        $('#glasscase').glassCase({ 'thumbsPosition': 'bottom', 'widthDisplay' : 560});
    });
</script>
<script src="<?php //echo $this->Url->build('/front_end/js/custom.js'); ?>"></script> 
 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="<?php //echo $this->Url->build('/front_end/rs-plugin/js/jquery.tp.t.min.js'); ?>"></script> 
<script type="text/javascript" src="<?php //echo $this->Url->build('/front_end/rs-plugin/js/jquery.tp.min.js'); ?>"></script> 
<script src="<?php //echo $this->Url->build('/front_end/js/main.js'); ?>"></script> 



<style type="text/css">
	.custom_hover{
		cursor: pointer;
	}
</style>

</body>
</html>