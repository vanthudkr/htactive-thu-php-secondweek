<section>
    <div class="chooses-htactive">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">WHY CHOOSE HT ACTIVE</h1>
                    <div class="separator"></div>
                    <p class="lead text-center">HT Active offers a great service in the design, development and programming of your website/application. We strive to offer the best solution for your business and impartial advice at an honest price. We are constantly investigating new technologies and recommend them when they make sense.</p>
                    <div class="vertical">
                        <div><i class="fas fa-caret-up"></i></div>
                        <div row>
                            <div class="col-md-3">
                                <div class="tab">
                                    <button class="tablinks active" onclick="openCity(event, 'trTeam')">The Right Team</button>
                                    <button class="tablinks" onclick="openCity(event, 'wListen')">We Listen</button>
                                    <button class="tablinks" onclick="openCity(event, 'cTechnical')">Craetetive & Technical</button>
                                    <button class="tablinks" onclick="openCity(event, 'uoRoof')">Under One Roof</button>
                                    </div>
                            </div>
                            <div class="col-md-9">
                                <?php
                                    foreach($whyChoose as $key => $values) : ?>
                                        <div id="<?= $values['id']?>" class="tabcontent <?= $values['class']?>">
                                            <h1><?= $values['title']?></h1>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><?= $values['description']?></p>
                                                    <img src="<?= $values['image']?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>