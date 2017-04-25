<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Latest compiled and minified CSS -->
    <?php echo $this->Html->css('bootstrap.min.css'); ?>
    <!-- Custom styles for this template -->
    <?php echo $this->Html->css("style"); ?>
</head>
<body>
<nav class="navbar navbar-static-top navbar-light navbar-fixed-top headerNav">
    <div class="container-fluid">
        <button class="pull-xs-right navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">☰</button>
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">filmstar</a>
        <div class="collapse navbar-toggleable-md" id="navbarResponsive">
            <ul class="nav navbar-nav pull-xs-right">
                <li class="nav-item">
                    <a class="nav-link" id="signupWithFacebookBtn" href="#">Sign Up With Facebook</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="modal" data-target="#loginModal">Log In</a>
                </li>
                <li class="nav-item">
                    <a href="./users/logout" class="nav-link" data-toggle="modal" data-target="#loginModal">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php var_dump(AuthComponent::user()); ?>
    <?php echo $this->fetch('content'); ?>
<?php echo $this->element('footer'); ?>
