<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#myPage">Yeucongnghe</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php
                    foreach ($menus as $menu) {
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" id="menu1" data-toggle="dropdown"><?php echo $menu['Menu']['title'] ;?></a>
                            <?php if (!empty($menu['Category'])) { ?>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="background-color: #8632ff">
                                    <?php foreach ($menu['Category'] as $category) { ?>
                                        <li><a role="menuitem" tabindex="-1"
                                               href="#"><?php echo $category['title']; ?></a></li>
                                        <?php
                                            }
                                        ?>
                                </ul>
                                <?php
                                    }
                                ?>
                        </li>
                        <?php
                            }
                        ?>
            </ul>
        </div>
    </div>
</nav>

