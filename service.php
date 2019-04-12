<section class="section-service">
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center" style="font-weight: bold">Service</h1>
                    <div class="separator"></div>
                    <p class="lead text-center">By using our services, you will get all of the great experience.</p>
                    <div class="row">
                    <?php 
                        foreach($servicese as $key => $values) :?>
                            <div class="col-sm-4">
                                <div class="box-style-1">
                                    <i class="<?= $values['icon']?>"></i>
                                    <h2><?= $values['title']?></h2>
                                    <p><?= $values['content']?></p>
                                    <a href="#" class="btn-default btn">Read More</a>
                                </div>
                            </div>
                        <?php endforeach;
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>