<footer>
    <div class="footer-container">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo">
                        <a href=""><img class="logo-footer" src="images/logo_footer.png" alt=""></a>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="footer-text">Your satisfaction is our success!</p>
                            <ul class="social-link circle">
                                <?php 
                                    foreach($socials as $key => $values) : ?>
                                    <li class="<?= $values['class']?>">
                                        <a target="_blank" href="#">
                                            <i class="<?= $values['icon']?>"></i>
                                        </a>
                                    </li>
                                    <?php endforeach
                                ?>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-icons">
                                <?php 
                                    foreach($info as $key => $values) :?>
                                        <li class="icon-footer">
                                            <i class="<?= $values["class"]?>"></i>
                                            <?=$values["info"]?>
                                        </li>
                                    <?php endforeach
                                ?>
                                <li class="icon-footer">
                                    <i class="far fa-envelope pr-10"></i>
                                    <a class="link" href="#">
                                        recruit@htactive.com
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="/about" class="link"><span>About Us</span><i class="fa fa-long-arrow-right btn-about" aria-hidden="true"></i></a>
                </div>
                <div class="space-bottom hidden-lg hidden-xs"></div>
                <div class="col-sm-6 col-md-2">
                    <div class="footer-content">
                        <h2>Links</h2>
                        <nav>
                            <ul class="nav nav-pills nav-stacked">
                                <?php 
                                    foreach($link as $values) : ?>
                                        <li class="li-footer">
                                            <a href="#"><?= $values?></a>
                                            <span class="arrow">></span>
                                        </li>
                                    <?php endforeach
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="footer-content">
                        <h2>CONNECT WITH US!</h2>
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhtactive%2F&amp;tabs&amp;width=340&amp;height=214&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=1780445882280832"
                            width="340" height="214" style="border:none;overflow:hidden;height:213px;" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer>