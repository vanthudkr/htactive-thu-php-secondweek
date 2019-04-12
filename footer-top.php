<section id="footer-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner w-100" role="listbox">
                        <div class="carousel-item row no-gutters active">
                            <?php 
                                    foreach(array_slice($footerTop,0,4) as $key => $value) :  ?>
                                        <div class="col-3 float-left"><a href="#"><img src='<?=$value?>' class="img-responsive"></a></div>
                                    <?php endforeach
                            ?>
                        </div>
                        <div class="carousel-item row no-gutters">
                        <?php 
                            foreach(array_slice($footerTop,4,7) as $key => $value) :  ?>
                                <div class="col-3 float-left"><a href="#"><img src='<?=$value?>' class="img-responsive"></a></div>
                            <?php endforeach
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <blockquote class="blockquote">
                    <p class="margin-clear">Design is not just what it looks like and feels like. Design is how it works.</p>
                    <footer class="blockquote-footer author"><cite title="Source Title">Steve Jobs </cite></footer>
                </blockquote>
            </div>
        </div>
    </div>
</section>