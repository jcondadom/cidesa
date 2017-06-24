<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/09 17:27:37
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>

<?
  echo grid_tag($grid);
?>
<? if ($mensaje!="")
{
?>
      <script type="text/javascript">
            mens='<? print $mensaje; ?>';
            alert(mens);
        </script>
<?php
}else {
?>
      <script type="text/javascript">

          var manforent='<? print $manforent; ?>';
          if (manforent=='S') {
               var am=totalregistros('ax',1,150);
               var fil=0;
               while (fil<am)
               {
                var codalm="ax_"+fil+"_19";
                var cangri="ax_"+fil+"_3";
                var cos="ax_"+fil+"_6";
                var descu="ax_"+fil+"_7";
                var recar="ax_"+fil+"_8";
                var tot="ax_"+fil+"_9";
                var codart="ax_"+fil+"_1";
                var cangrireal="ax_"+fil+"_14";
                if ($(codalm))
                {
                 if ($('carcpart_codalmusu').value!="") {
                 $(codalm).value=$('carcpart_codalmusu').value;
                 $(codalm).focus();
                 }
                 var orden=$('carcpart_ordcom').value;
                 var almacen=$('carcpart_codalmusu').value;
                 var art=$(codart).value;
                 var descuento=toFloat(descu);
                 var recargo=toFloat(recar);
                 var costo=toFloat(cos);

                 new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=7&cangri='+cangri+'&almacen='+almacen+'&art='+art+'&descuento='+descuento+'&recargo='+recargo+'&cangrireal='+cangrireal+'&costo='+costo+'&total='+tot+'&orden='+orden})
                }else {break;}
               fil++;
               }
               actualizarsaldos();
          }
        </script>
<?php
}?>
