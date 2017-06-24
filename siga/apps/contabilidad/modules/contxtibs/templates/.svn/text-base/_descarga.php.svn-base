<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php if ($contabc->getDireccion()!=""){ ?>

<div style='width:450px; color: #c11b17; font-size: 14px; font-weight: bold;' >
<ul>
  <li>
      <?php $hosts=$this->getContext()->getRequest()->getHost();?>
    <?php echo link_to('Descargar Txt Generado => '.$contabc->getDireccion(),'http://'.$hosts.'/uploads/comprobantesibs/'.$contabc->getDireccion()); ?>
  </li>
</ul>
</div>

<?php } ?>

<script type="text/javascript" lang="JavaScript">
function verificar(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

  var filas=obtener_filas_grid('a',1);
  var i=0;
  var contador=0;
  var total=0;
  while (i<filas)
  {
    var check="ax_"+i+"_1";
    var monto="ax_"+i+"_5";
    var nmonto=toFloat(monto);
    
    if ($(check).checked==true)
    {
        total =  total + nmonto;
        contador++;
    }
    i++;
  }
  $('contabc_cancom').value=contador;
  $('contabc_totcom').value=format(total.toFixed(2),'.',',','.');
}
</script>