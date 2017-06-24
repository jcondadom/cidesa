<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
        <title>Cidesa!</title>
        <link rel="stylesheet" href="/css/css/bootstrap.min.css">

        
        <?php use_stylesheet('/bootstrap/css/portal.css') ?>
        <link rel="stylesheet" href="/css/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="/css/css/prettify.css">     
        <!--<link rel="stylesheet" href="/css/css/main.css">
        -->

        <?php use_stylesheet('/css/css/docs.css') ?>
        <!-- nuevo-->     
        <script src="/bootstrap/js/jquery.js"></script>

        <script src="js/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        
    </head>

    <body>
    <div class="container">  
        <div class="hidden-phone">
        </div> 
        <div class="container ">

            <?php echo $sf_data->getRaw('sf_content');?>

        </div> 
    </div>
        <script src="/js/js/bootstrap.min.js"></script>
        <script src="/js/js/bootstrap-topover.js"></script>
        <script src="/js/js/prettify/prettify.js"></script>
        <script src="/js/js/main.js"></script>
        <script src="/js/js/docs.js"></script>

            <script src="/bootstrap/js/bootstrap-scrollspy.js"></script>
            <script src="/bootstrap/js/bootstrap-tab.js"></script>
            <script src="/bootstrap/js/botontwitter.js"></script>
            <script src="/bootstrap/js/megusta.js"></script>

        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-35259405-2']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        </script>
    </body>
</html>