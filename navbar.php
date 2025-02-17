<?php require_once 'inc/connection.php' ?>
<section id="header">
    <a href="index.php">
        <img src="img/logo.png" alt="homeLogo">
    </a>
    <div>
        <ul id="navbar">
            <li class="link">
                <a class="active " href="index.php"></a>
            </li>
            <?php if (isset($_SESSION['email_admin'])) { ?>
                <li class="link">
                    <a href="admin/view/layout.php">Control Panel</a>
                </li>
            <?php } ?>
            <li class="link">
                <a href="shop.php">shop</a>
            </li>
            <!-- <li class="link">
                <a href="lang.php?lang=en">English</a>
            </li>
            <li class="link">
                <a href="lang.php?lang=ar">Arabic</a>
            </li> -->
            <?php if (isset($_SESSION['user_id']) or isset($_SESSION['email_admin'])) { ?>
                <li class="link">
                    <a href="inc/logout.php">Logout</a>
                </li>
            <?php } else { ?>
                <li class="link">
                    <a href="signup.php">Sign up</a>
                </li>
                <li class="link">
                    <a href="login.php">Login</a>
                </li>
            <?php } ?>
            <li class="link">
                <a id="lg-cart" href="cart.php">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </li>
            <a href="#" id="close"><i class="fas fa-times"></i> </a>
        </ul>
    </div>
    <div id="mobile">
        <a href="cart.html">
            <i class="fas fa-shopping-cart"></i>
        </a>
        <a href="#" id="bar"> <i class="fas fa-outdent"></i> </a>
    </div>
</section>