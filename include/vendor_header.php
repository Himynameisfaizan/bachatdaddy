<?php
if (!isset($_SESSION)) {
    session_start();
}

?>

<header class="main-header-three">
            <div class="main-header-three__top">
                <div class="container">
                    <div class="main-header-three__top-inner">
                        <div  class="main-header-three__top-left" >
                            <ul class="list-unstyled main-header-three__contact-list">
                                <li>
                                    <!-- <div class="icon">
                                        <i class="icon-phone"></i>
                                    </div>
                                    <div class="text">
                                        <p><a href="tel:+91-9793944469">+91-9793944469</a></p>
                                    </div> -->
                                </li>
                                <li >
                                    <div class="icon">
                                        <i class="icon-envelope"></i>
                                    </div>
                                    <div class="text">
                                        <p><a href="mailto:support@bachatdaddy.com">support@bachatdaddy.com</a></p>
                                    </div>
                                </li>
                               
                            </ul>
                        </div>
                        
                        <div class="main-header-four__top-right">
                            <ul class="list-unstyled main-header-four__top-menu">
                            <?php if (isset($_SESSION['USER_Type']) && $_SESSION['USER_Type'] == "vendor") {?>
                                <li><a href="users-list.php" class=" thm-btn mb-1  ">Users Detail</a></li>
                            <?php }?>
                            <?php if (isset($_SESSION['USERS_USER_ID'])) { ?>
                                <li><a href="my-profile.php" class="thm-btn mb-1">Profile</a></li>
                            <?php } elseif (isset($_SESSION['Vendor_ID'])) { ?>
                                <li><a href="vendor-profile.php?id=<?= base64_encode($_SESSION['Vendor_ID']);?>"
                                 class="thm-btn mb-1">Profile</a></li>
                            <?php } else { ?>
                                <li><a href="login.php" class="thm-btn mb-1">Login</a></li>
                            <?php } ?>
 
                            </ul>
                            <div class="main-header-three__top-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="main-menu main-menu-three ">
                <div class="main-menu-three__wrapper py-">
                    <div class="container">
                        <div class="main-menu-three__wrapper-inner">
                            <div class="main-menu-three__logo ">
                                <a href="index.php"><img src="images/resources/Asset 21-8.png" 
                                 class="logo-height" alt=""></a>
                            </div>
                            <div class="main-menu-three__main-menu-box">
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                <ul class="main-menu__list">
                                    <li>
                                        <a href="vendorshome.php">Home</a>
                                    </li>
                                    <li>
                                        <a href="about.php">About</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Industry We Serve</a>
                                        <ul class="sub-menu">
                                            <?php foreach($industry as $category): ?>
                                                <li class="dropdown">
                                                    <a href="industry.php?id=<?php echo base64_encode($category['id']); ?>"><?= $category['name']?></a>
                                                    
                                                    <?php 
                                                        $subindustry = $common->getsubByIdustry($category['id']);
                                                        if (!empty($subindustry)): 
                                                    ?>
                                                        <ul>
                                                        <?php
                                                         // Check if the array is not empty before starting the loop
                                                            foreach ($subindustry as $subcategory):  
                                                        ?>
                                                                <li><a href="vendors.php?id=<?php echo base64_encode($subcategory['id']); ?>"><?= $subcategory['name']?></a></li>
                                                            <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                </li>
                                            <?php endforeach;?>
                                            
                                        </ul>
                                    </li>
                                    
                                    <!-- <li>
                                        <a href="what-we-do.php">What We Do</a>
                                    </li> -->
                                    <li>
                                        <a href="contact.php">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu main-menu-three">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->