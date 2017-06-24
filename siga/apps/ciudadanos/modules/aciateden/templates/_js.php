<?php use_helper('Javascript') ?>

<?php
   $atestayu = $atdenuncias->getAtestayu();
   if($atestayu){
     if($atestayu->getComest()=='1'){
       echo javascript_tag("
         function DeshabilitarObjetos()
         {
           $('atdenuncias_atinsrefier_id').disabled=true;

           $('atdenuncias_respuesta').disabled=true;
           $('atdenuncias_fechaa').disabled=true;
           $('trigger_atdenuncias_fechaa').remove()
           
         }

         Event.observe(window, 'load',
           function() {
             DeshabilitarObjetos();
           }
         );

       ");

     }else if($atestayu->getComest()=='2'){
       echo javascript_tag("
         function DeshabilitarObjetos()
         {
           $('atdenuncias_atinsrefier_id').disabled=true;
           $('atdenuncias_atestayu_id').disabled=true;

           $('atdenuncias_respuesta').disabled=true;
           $('atdenuncias_fechaa').disabled=true;
           $('trigger_atdenuncias_fechaa').remove()
         }

         Event.observe(window, 'load',
          function() {
             DeshabilitarObjetos();
           }
         );
       "



       );

     }
   }
?>
