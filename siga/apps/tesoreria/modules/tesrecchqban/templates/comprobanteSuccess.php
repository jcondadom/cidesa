<?php
/*
 * Created on 11/10/2007
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<form name="form1" id="form1">
<?
if ($msgerr=="")
{
    $x=0;
    $formu='';
    while ($x<count($formulario))
    {
      $formu=$formu.$formulario[$x].'*';
      $x++;
    }
    ?>
        <script type="text/javascript">
            j=0;
            i='<? print $i; ?>';
            i=parseInt(i);
            formu='<? print $formu; ?>';
            formulario=formu.split('*');
            mens2='<? print $msgerr2; ?>';
            if (mens2!="") alert(mens2);
            while (j<=i)
            {
              comprobante(formulario[j]);
              j++;
            }
        </script>
<?php
}//if ($msgerr!="")
else //hubo un error al generar el comprobante contable
{
?>
      <script type="text/javascript">
            mens='<? print $msgerr; ?>';
            alert(mens);
        </script>
<?php
}//else //hubo un error al generar el comprobante contable
?>
</form>