<footer class="site-footer-three">
          
            <div class="container">
                <div class="site-footer-three__middle">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget-three__column footer-widget-three__about">
                                <div class="footer-widget-two__logo">
                                    <a href="index.php"><img src="images/resources/logo-1.jpg"
                                            alt=""></a>
                                </div>
                                <p class="footer-widget-three__about-text">
                                    BACHATDADDY Card helps you save with exclusive discounts on hotels, education, healthcare,  jewellery, and more, making everyday spending more affordable and enhancing your lifestyle.</p>
                                
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget-three__column footer-widget-three__company">
                                <div class="footer-widget-three__title-box">
                                    <h3 class="footer-widget-three__title">Quick Link</h3>
                                </div>
                                <ul class="footer-widget-three__company-list list-unstyled">
                                    <li><a href="#0">About</a></li>
                                    <li><a href="#0">What we Do </a></li>    
                                    <li><a href="#0">Contact</a></li>
                                    <li><a href="privacy-policy.php">Privacy Policy</a></li>
                                    <li><a href="refund-and-cancellation-policy.php">Refund and Cancellation Policy</a></li>
                                    <li><a href="terms-and-conditions-policy.php">Terms and Conditions Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget-three__column footer-widget-three__company">
                                <div class="footer-widget-three__title-box">
                                    <h3 class="footer-widget-three__title">Industry we Serve</h3>
                                </div>
                                <ul class="footer-widget-three__company-list list-unstyled">
                                <?php foreach($industry as $category): ?>
                                    <li><a href="industry.php?id=<?php echo base64_encode($category['id']); ?>"><?= $category['name']?></a></li>
                                <?php endforeach;?>
                                   
                                </ul>
                            </div>
                        </div>
                       
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="footer-widget-three__column footer-widget-three__subscribe">
                                <div class="footer-widget-three__title-box text-center">
                                    <h3 class="footer-widget-three__title">Contact Us</h3>
                                </div>
                                <ul class="px-0">
                                    <li class="mb-20">
                                        <div class="site-footer-three__contact-list-single">
                                            <div class="icon">
                                                <span class="icon-location-1"></span>
                                            </div>
                                            <div class="content">
                                                <h3>Office Location</h3>
                                                <p> Newada Samogar, Naini Industrial Area, Prayagraj, Uttar Pradesh-211010</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-20">
                                        <div class="site-footer-three__contact-list-single">
                                            <div class="icon">
                                                <span class="icon-phone"></span>
                                            </div>
                                            <div class="content">
                                                <h3>Call</h3>
                                                
                                                <p><a href="tel:+91-9889769886">+91-9889769886</a></p>
                                                
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-20">
                                        <div class="site-footer-three__contact-list-single">
                                            <div class="icon">
                                                <span class="icon-envelope"></span>
                                            </div>
                                            <div class="content">
                                                <h3>Email</h3>
                                                <p><a href="mailto:support@bachatdaddy.com">support@bachatdaddy.com</a></p>
                                            
                                            </div>
                                        </div>
                                    </li>
                            
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer-three__bottom">
                <div class="container">
                    <div class="site-footer-three__bottom-inner">
                        <p class="site-footer-three__bottom-text">© Copyright 2024 BACHATDADDY. All rights
                            reserved.
                        </p>
                        <div class="site-footer-three__bottom-text">
                            <a target="_blank" href="#">https://www.ahmadwebsolutions.com/</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>