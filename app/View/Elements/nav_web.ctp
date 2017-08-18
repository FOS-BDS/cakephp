<?php
$Menu = ClassRegistry::init('Menu');
$menus =$Menu->find('all',
    array(
        'conditions'=> array('Menu.published'=>1),
        'contain'=>array('Category'=>array('conditions'=>array('Category.published'=>true)))
    ));
?>
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
                            <a class="dropbtn"><?php echo $menu['Menu']['title'] ;?></a>
                            <?php if (!empty($menu['Category'])) { ?>
                                <div class="dropdown-content">
                                    <?php foreach ($menu['Category'] as $category) { ?>
                                        <a role="menuitem" tabindex="-1"
                                               href="#"><?php echo $category['title']; ?></a>
                                        <?php
                                            }
                                        ?>
                                </div>
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

