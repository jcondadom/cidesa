<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<!-- =================================Carrusel================================= -->
<div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
        <?php foreach($carrusel as $v => $key) : ?>
        <div class="item <?php echo $v==0 ? 'active' : '' ?>">
            <img src="<?php echo $key->getImgpub() ?>" alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <h1><?php echo $key->getTitpub() ?></h1>
                        <p class="lead"><?php $key->getDespub() ?></p>
                        <?php echo link_to('Mas Información','/apps/index'.$key->getLinkpub(),array('class' => 'btn btn-large btn-primary'))?>
                    </div>
                </div>
        </div>
        <?php endforeach; ?>
<!--         <div class="item">
            <img src="/bootstrap/img/slide-02.jpg" alt="">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Another example headline.</h1>
                        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <a class="btn btn-large btn-primary" href="#">Learn more</a>
                    </div>
                </div>
        </div>
 -->
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div><!-- /.===carrusel=== ./ -->
<!-- =================Ultimo Tweet con pajarito================= -->
