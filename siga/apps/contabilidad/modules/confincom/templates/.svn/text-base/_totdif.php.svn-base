<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?php $value = object_input_tag($contabc, 'getTotdif', array (
  'disabled' => false,
  'control_name' => 'contabc[totdif]',
  'readOnly' => true,
)); echo $value ? $value : '&nbsp;' ?>

<script language="Javascript">
  var ids='<?php echo $contabc->getId();?>';
  if (ids!="")
  {
    if ($('contabc_reftra').value!="") { $('divreftra').show(); }
    else { $('divreftra').hide(); }
    actualizarDiferencia();
  }else { $('divreftra').hide(); }

    var mosrepsal='<?php echo H::getConfApp2('mosrepsal', 'contabilidad', 'confincom'); ?>';
    var guardo='<?php echo $sf_user->getAttribute('grabocomp','','confincom')?>';
    
    if (ids!="" && mosrepsal=='S' && guardo=='S')
    {
      
      if(confirm("¿Desea imprimir el Comprobante Contable?"))
      {
        var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
        pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/contabilidad/rCOMPROBANTES.php?com1="+$('contabc_numcom').value+"&com2="+$('contabc_numcom').value;
        
        window.open(pagina,$('contabc_numcom').value,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
        }
    }
  

    function actualizarDiferencia(id)
    {
      var acumdeb=0;
      var acumcre=0;
      var am=obtener_filas_grid('a',1);

       var l=0;
       while (l<am)
       {
        var coldeb="ax_"+l+"_5";
        var colcre="ax_"+l+"_6";
        if ($(coldeb) && $(colcre))
        {
            if ($(coldeb).value!="")
            {
              var num1=toFloat(coldeb);
              if ($(coldeb).value!='0,00')
              {
                acumdeb= acumdeb + num1;
              }
              $(coldeb).value=format(num1.toFixed(2),'.',',','.');
            }

            if ($(colcre).value!="")
            {
              var num2=toFloat(colcre);
              if ($(colcre).value!='0,00')
              {
                acumcre= acumcre + num2;
              }
              $(colcre).value=format(num2.toFixed(2),'.',',','.');
            }
        }
        l++;
       }
      var diferencia= acumdeb - acumcre;
      $('contabc_totdeb').value=format(acumdeb.toFixed(2),'.',',','.');
      $('contabc_totcre').value=format(acumcre.toFixed(2),'.',',','.');
      $('contabc_totdif').value=format(diferencia.toFixed(2),'.',',','.');

    }

</script>