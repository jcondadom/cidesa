<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">


        <title>Cidesa!</title>
        <link rel="stylesheet" href="/css/css/bootstrap.min.css">
        
        <?php use_stylesheet('/bootstrap/css/portal.css') ?>


        <link rel="stylesheet" href="/css/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="/css/css/prettify.css">     

        <?php if (isset($modulo)) {$modulo; } else {$modulo=$_SESSION['modulo'];} ?>

        <?php use_stylesheet('/css/css/docs.css') ?>
        <?php use_stylesheet('/bootstrap/css/Utweet.css') ?>

        <script src="/bootstrap/js/jquery.js"></script>

        <script src="js/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/cidesa144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/cidesa114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/cidesa72.png">
        <link rel="apple-touch-icon-precomposed" href="/images/cidesa57.png">
    </head>

    <body>

    <div class="container">

        <div class="hidden-phone">
        <!-- =========================Menu Superior con Logo =========================== -->
             <div class="navbar margensuperior4" style="margin-top:15px;">

                <div >
                    <ul>
                        <li><?php echo link_to('Inicio','@apps', array('query_string' => 'm='.$modulo,'class' => 'begin'))?></li>
                        <li><?php echo link_to('Historia','home/acerca', array('class' => 'history'))?></li>
                        <li><?php echo link_to('Acompañamiento','home/acompanamiento', array('class' => 'acomp'))?></li>
                        <li><?php echo link_to('Tarifas','home/acompanamiento', array('class' => 'tarifas'))?></li>
                        <li><?php echo link_to('Red RORAIMA','home/afiliacion', array('class' => 'rr'))?></li>
                        <li><?php echo link_to('Soluciones','home/alianzas', array('class' => 'soluc'))?></li>
                        <li><?php echo link_to('Centros de Contacto','home/contacto', array('class' => 'cc'))?></li>
                    </ul>
                </div>
            </div>
            
        <!-- /.===Menu superior con logo=== ./ -->
        </div> 
        <div class="container">

            <?php echo $sf_data->getRaw('sf_content');?>

        </div>   
    </div> 
            <script src="/bootstrap/js/bootstrap-transition.js"></script>
            <script src="/bootstrap/js/bootstrap-alert.js"></script>
            <script src="/bootstrap/js/bootstrap-modal.js"></script>
            <script src="/bootstrap/js/bootstrap-dropdown.js"></script>
            <script src="/bootstrap/js/bootstrap-scrollspy.js"></script>
            <script src="/bootstrap/js/bootstrap-tab.js"></script>
            <script src="/bootstrap/js/bootstrap-tooltip.js"></script>
            <script src="/bootstrap/js/bootstrap-popover.js"></script>
            <script src="/bootstrap/js/bootstrap-button.js"></script>
            <script src="/bootstrap/js/bootstrap-collapse.js"></script>
            <script src="/bootstrap/js/bootstrap-carousel.js"></script>
            <script src="/bootstrap/js/bootstrap-typeahead.js"></script>
            <script src="/bootstrap/js/botontwitter.js"></script>
            <script src="/bootstrap/js/megusta.js"></script>
            <script src="/bootstrap/js/arranque_carousel.js"></script>
    </body>
</html>