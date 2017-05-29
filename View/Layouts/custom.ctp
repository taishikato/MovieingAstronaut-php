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
    <script src="https://use.fontawesome.com/6eb1545d68.js"></script>
    <?php echo $this->Html->css('bootstrap.min.css'); ?>
    <?php echo $this->Html->css('bootstrap-social.css'); ?>
    <!-- Custom styles for this template -->
    <?php echo $this->Html->css("style"); ?>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-static-top navbar-light navbar-fixed-top headerNav">
    <div class="container">
        <a class="navbar-brand" href="<?php echo $this->Html->url("/"); ?>">
            <?php echo $this->Html->image('logo.png', array('alt' => 'MOVIEING ASTRONAUT', 'width' => '130px')); ?>
        </a>
            <?php echo $this->element('nav_menu'); ?>
        </div>
    </div>
</nav>
<?php echo $this->Flash->render('login_result') ?>

<?php if ($isLoggedIn === false): ?>
    <?php echo $this->element('startModal'); ?>
<?php endif; ?>

<?php echo $this->fetch('content'); ?>
<?php echo $this->element('footer'); ?>
