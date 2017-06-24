<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php echo grid_tag_v2($fadefcaj->getObj());?>

<script type="text/javascript">

function verificar(id)
{
	var aux = id.split("_");
	var name=aux[0];
	var fil=parseInt(aux[1]);
	var col=parseInt(aux[2]);

	  var q=0;
	  var enc=false;
	  var am=obtener_filas_grid('a',1);
	  while (q<am && (!enc))
	  {
	      var act="ax_"+q+"_3";
	      if (fil!=q)
	      {
	          if ($(act).checked==true)
	          {
	           enc=true;
	          }
	      }
	      q++;
	  }
	  if (enc)
	  {
	      alert('Solo debe estar Activo un rango...');
	      $(id).checked=false;
	  }
}
</script>