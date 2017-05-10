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
        <?php echo $this->Html->link(
            'Red Eyes Movie',
            array(
                'controller' => 'tops',
                'action'     => 'index',
                'full_base'  => true
            ),
            array('class' => 'navbar-brand')
        ); ?>
        <div class="collapse navbar-toggleable-md" id="navbarResponsive">
            <?php echo $this->element('nav_menu'); ?>
        </div>
    </div>
</nav>
<div class="container topWrapperMargin smallContainer">
    <?php echo $this->Flash->render('login_result') ?>
    <?php echo $this->fetch('content'); ?>
</div>
<?php echo $this->element('footer'); ?>
