<?php if ($isLoggedIn === true): ?>
<button class="pull-xs-right navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">☰</button>
<div class="collapse navbar-toggleable-md" id="navbarResponsive">
    <ul class="nav navbar-nav pull-xs-right">
        <li class="nav-item dropdown">
            <?php $userName = AuthComponent::user('User.username') ?: 'User'; ?>
            <li class="nav-item">
                <?php echo $this->Html->link(
                    'List',
                    array(
                        'controller' => 'lists',
                        'action'     => 'showSeenList',
                        $userName,
                        'full_base'  => true
                    ),
                    array('class' => 'nav-link')
                ); ?>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true"><?php echo $userName; ?></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php echo $this->Html->link(
                        'Edit Profile',
                        array(
                            'controller' => 'users',
                            'action'     => 'edit',
                            'full_base'  => true
                        ),
                        array('class' => 'dropdown-item')
                    ); ?>
                    <?php echo $this->Html->link(
                        'Log Out',
                        array(
                            'controller' => 'users',
                            'action'     => 'logout',
                            'full_base'  => true
                        ),
                        array('class' => 'dropdown-item')
                    ); ?>
                </div>
            </li>
        </li>
    </ul>
</div>
<?php else: ?>
<ul class="nav navbar-nav pull-xs-right">
    <li class="nav-item">
        <?php
        echo $this->Html->link(
            'Sign in / Sign up',
            '#',
            array(
                "class" => "nav-link",
                'data-toggle' => 'modal',
                'data-target' => '#startModal'
            )
        );
        ?>
    </li>
</ul>

<!--
<ul class="nav navbar-nav pull-xs-right">
    <li class="nav-item">
        <a href="#" id="signupWithFacebookBtn" class="nav-link">Sign Up</a>
    </li>
    <li class="nav-item">
        <a href="#" id="loginWithFacebookBtn" class="nav-link">Log In</a>
    </li>
</ul>
-->
<?php endif; ?>
