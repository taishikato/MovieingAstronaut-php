<ul class="nav navbar-nav pull-xs-right">
    <?php if ($isLoggedIn === true): ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">User</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a href="" class="dropdown-item">Profile</a>
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
    <?php else: ?>
        <li class="nav-item">
            <a href="#" id="signupWithFacebookBtn" class="nav-link">Sign Up With Facebook</a>
        </li>
        <li class="nav-item">
            <a href="#" id="loginWithFacebookBtn" class="nav-link">Log In With Facebook</a>
        </li>
    <?php endif; ?>
</ul>
