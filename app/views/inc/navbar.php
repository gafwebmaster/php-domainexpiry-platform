<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?php if (isset($_SESSION['user_id'])) : ?>
        <a class="navbar-brand" href="<?php echo URLROOT; ?>/domains">
            <img src='/img/logo.png'>
        </a>
    <?php else : ?>
        <a class="navbar-brand" href="<?php echo URLROOT; ?>/pages">
            <img src='/img/logo.png'>
        </a>
    <?php endif; ?>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['user_id'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/domains">Domains</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/domains/add">Add Domain</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/domains/blacklist">Black list</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary mb-3 mr-3" href="<?php echo URLROOT; ?>/domains/logout">Admin | <strong>Logout</strong></a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/logins">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/passwords">Forgot your password?</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>

</nav>