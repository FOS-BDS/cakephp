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
                        <li>
                            <a href="#contact"><?php echo $menu['Menu']['title'] ;?></a>
                        </li>
                        <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>
