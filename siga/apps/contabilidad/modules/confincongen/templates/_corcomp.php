<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php echo select_tag('contaba[corcomp]', options_for_select(Constantes::ListaFormatoComprobante(),$contaba->getCorcomp(),'include_custom=Seleccione uno'),array(
    'onChange' => 'notificacion(this.value)'
)); ?>

<script type="text/javascript" lang="JavaScript">
function notificacion(valor)
{
   if (valor!='') 
   {
     alert('Recuerde que al definir el Formato Contable automaticamente todos los Comprobantes Contables del Sistema se generaran con este formato');
   }
}
</script>
