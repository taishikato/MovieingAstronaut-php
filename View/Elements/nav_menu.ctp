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
                        'controller' => 'quotes',
                        'action'     => 'likeList',
                        $userName,
                        'full_base'  => true
                    ),
                    array('class' => array('nav-link', 'srcColorLink'))
                ); ?>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle srcColorLink" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true"><?php echo h($userName); ?></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php echo $this->Html->link(
                        'Edit Profile',
                        array(
                            'controller' => 'users',
                            'action'     => 'edit',
                            'full_base'  => true
                        ),
                        array('class' => array('dropdown-item', 'srcColorLink'))
                    ); ?>
                    <?php echo $this->Html->link(
                        'Log Out',
                        array(
                            'controller' => 'users',
                            'action'     => 'logout',
                            'full_base'  => true
                        ),
                        array('class' => array('dropdown-item', 'srcColorLink'))
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
                "class" => array("nav-link", 'srcColorLink'),
                'data-toggle' => 'modal',
                'data-target' => '#startModal'
            )
        );
        ?>
    </li>
</ul>
<?php endif; ?>
