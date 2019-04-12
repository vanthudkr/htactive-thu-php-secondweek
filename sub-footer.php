<section class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span>Copyright © 2016 by HT Active. All Rights Reserved.</span>
            </div>
            <div class="col-md-6">
                <ul class="nav justify-content-end">
                    <?php 
                        foreach($subFooter as $key => $values) : ?>
                        <li class="nav-item ">
                            <a class="<?= $values['class']?>" href="#"><?= $values['title']?></a>
                        </li>   
                        <?php endforeach
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>