<section class="section-about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">About HT Active</h1>
                <div class="separator"></div>
                <p class="lead text-center ">HT Active is the team of Young & Brilliant people. We will help and support all you need about Software Solutions. We’re developers, designers, support specialists and gamers. We have all you needs.</p>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="title">Meet the team - HT Active</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <img class="imgAboutus" src="http://www.htactive.com/assets/voc/images/section-image-2.png" alt="">
                            </div>
                            <div class="col-md-6">
                                <p>We work on the services, product and comunication. We love what we do, and who we do it with. To HT Active, all customers are friends.</p>
                            </div>
                        </div>
                        <p>HT Active wouldn’t be what it is without the incredible and loving contributions of our member. Thanks to everyone who’s put their heart and their energy into this community.</p>
                        <a href="#" class="btn btn-white" style="color: red; border-radius: 0px; text-transform: uppercase; border: 1px solid;">Read More</a>
                    </div>
                    <div class="col-md-6">
                        <div class="panel-group" id="accordion">
                            <?php
                                foreach($abouts as $key => $values) : ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#<?=$values['id']?>">
                                            <h4 class="panel-title">
                                                <i class="<?= $values['icon']?>"></i>
                                                <?= $values['title']?>
                                                <i class="fas fa-plus" style="float: right;"></i>
                                            </h4>
                                        </a>
                                        </div>
                                        <div id="<?= $values['id']?>" class="panel-collapse collapse">
                                        <div class="panel-body"><?= $values['description']?></div>
                                        </div>
                                    </div>
                                <?php endforeach
                            ?>
                        </div> 
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</section>