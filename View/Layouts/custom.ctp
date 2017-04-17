<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <?php echo $this->Html->css("style"); ?>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
                <a class="navbar-brand" href="#">
                filmstar
                </a>
                <ul class="nav navbar-nav pull-right">
                    <li class="nav-item">
                        <a id="signupWithFacebookBtn">Sign Up With Facebook</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#loginModal">Log In</a>
                    </li>
                </ul>
        </div>
    </nav>
    <?php echo $this->fetch('content'); ?>
<?php echo $this->element('footer'); ?>
