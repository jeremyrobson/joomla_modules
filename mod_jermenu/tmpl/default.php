<?php defined('_JEXEC') or die; ?>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false"
                aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="<?php echo $logo; ?>" width="150px">
            </a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php foreach($list as $item_id => $item): ?>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle navbar-text" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo $item->title ?>
                    </a>

                <?php if ($item->deeper): ?>
                    <ul class="dropdown-menu">
                <?php elseif ($item->shallower): ?>
                    </li>
                    <?php str_repeat('</ul></li>', $item->level_diff); ?>
                <?php else: ?>
                    </li>
                <?php endif; ?>

                <?php endforeach; ?>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" class="navbar-text">
                        <span class="icon">
                            <i class="fa fa-home"></i>&nbsp;</span>
                        <span class="text">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="navbar-text">
                        <span class="icon">
                            <i class="fa fa-phone"></i>&nbsp;</span>
                        <span class="text">Contact Us</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="navbar-text">
                        <span class="icon">
                            <i class="fa fa-sign-in"></i>&nbsp;</span>
                        <span class="text">Login</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>