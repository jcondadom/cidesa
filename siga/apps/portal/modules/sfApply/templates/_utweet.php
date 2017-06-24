<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<!-- =================================Carrusel================================= -->
<div class="head">
  <div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
        <?php foreach($carrusel as $v => $key) : ?>
        <div class="item <?php echo $v==0 ? 'active' : '' ?>">
            <img src="<?php echo $key->getImgpub() ?>" alt="">
        </div>
        <?php endforeach; ?>

    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"> ‹ </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"> › </a>
  </div>
</div>