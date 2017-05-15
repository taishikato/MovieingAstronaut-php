<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo $this->html->meta('icon'); ?>
    <!-- Latest compiled and minified CSS -->
    <?php echo $this->Html->css('bootstrap.min.css'); ?>
    <!-- Custom styles for this template -->
    <?php echo $this->Html->css("style"); ?>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-static-top navbar-light navbar-fixed-top headerNav">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $this->Html->url("/"); ?>">
            <?php echo $this->Html->image('logo.png', array('alt' => 'MOVIEING ASTRONAUT', 'width' => '130px')); ?>
        </a>
            <?php echo $this->element('nav_menu'); ?>
        </div>
    </div>
</nav>
<div class="container topWrapperMargin smallContainer">
    <?php echo $this->Flash->render('login_result') ?>
    <?php echo $this->fetch('content'); ?>
</div>
<?php echo $this->element('footer'); ?>
