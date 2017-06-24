<?php
/*
 * Created on 26/01/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'ObjectAdmin', 'I18N', 'Grid', 'Validation') ?>

<?php echo grid_tag_v2($cpcompro->getObj()); ?>

<script language="JavaScript" type="text/javascript">
function verificar(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    if (col==1)
    {
      var colcom=col+1;
      var colcom1=col+2;
    }else if (col==2){
      var colcom=col-1;
     var colcom1=col+1;
    } else {
      var colcom=col-1;
      var colcom1=col-2;
    }

    var compara=name+"_"+fil+"_"+colcom;
    var compara1=name+"_"+fil+"_"+colcom1;

    if ($(compara).checked==true || $(compara1).checked==true)
    {
      alert('Debe marcar solo una opcion');
      $(id).checked=false;
    }
}
</script>
