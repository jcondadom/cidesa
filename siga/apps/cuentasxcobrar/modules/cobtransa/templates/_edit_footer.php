 <script language="JavaScript" type="text/javascript">
 $('trigger_cobtransa_fecreg').hide();
 $('cobtransa_fecreg').readOnly=true

var mosfecreg="<?php echo H::getConfApp2('mosfecreg', 'cuentasxcobrar', 'cobtransa');?>";
if (mosfecreg=='S')
  $('divfecreg').show();
else
 $('divfecreg').hide();
var grabo='<?php echo $grabo;?>';
var moscomp="<?php echo H::getConfApp2('moscomp', 'cuentasxcobrar', 'cobtransa');?>";
if (moscomp=='S' && grabo=='S')
{
  if(confirm("¿Desea consultar el Comprobante Contable?"))
  {
    var numcomdes=$('cobtransa_numcom').value;
    var numcomhas=$('cobtransa_numcom').value;
    var  ruta='http://'+'<? echo $this->getContext()->getRequest()->getHost();?>';
    pagina=ruta+"/<? echo $sf_user->getAttribute('reportes_web');?>/contabilidad/r.php?r=comprobante.php&com1="+numcomdes+"&com2="+numcomhas;
    window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
  }
}

</script>