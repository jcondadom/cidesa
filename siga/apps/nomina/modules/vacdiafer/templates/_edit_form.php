<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/02 10:00:46
?>
<?php echo form_tag('vacdiafer/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npvacdiafer, 'getId') ?>
<?php echo input_hidden_tag('varcontrol', '') ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','nomina/vacdiafer') ?>


<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php $mascaranivel = H::ObtenerFormato('Npdefgen', 'Fororg');
    $lonnivel = strlen($mascaranivel);
?>
<div id="divnivorg" style="display:none">
<?php echo label_for('npvacdiafer[codniv]', __($labels['npvacdiafer{codniv}']), 'class="required"') ?>
      <div class="content<?php if ($sf_request->hasError('npvacdiafer{codniv}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('npvacdiafer{codniv}')): ?>
        <?php echo form_error('npvacdiafer{codniv}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($npvacdiafer, 'getCodniv', array (
      'size' => 20,
      'maxlength' => $lonnivel,
      'control_name' => 'npvacdiafer[codniv]',
      'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);",
      'onBlur' => "nivel(event);",
      'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaranivel')",

    )); echo $value ? $value : '&nbsp;' ?>
    &nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npestorg_Nomhojint/clase/Npestorg/frame/sf_admin_edit_form/obj1/npvacdiafer_codniv/obj2/npvacdiafer_desniv/campo1/codniv/campo2/desniv/param1/'.$lonnivel)?>
&nbsp;
<?php $value = object_input_tag($npvacdiafer, 'getDesniv', array (
      'readonly' => true,
      'size' => 60,
      'control_name' => 'npvacdiafer[desniv]',
    )); echo $value ? $value : '&nbsp;' ?></div>
</div>
<br>
<div id="grid">
<?php echo grid_tag($obj);
?>
</div>
</div>
</fieldset>

<?php include_partial('edit_actions', array('npvacdiafer' => $npvacdiafer)) ?>

<script>
diaferniv='<?php echo H::getConfApp2('diaferniv', 'nomina', 'vacdiafer');?>'
if (diaferniv=='S')
  $('divnivorg').show();
function nivel(e)
{
  var longitud='<?php echo $lonnivel?>';
  var conniveles='<?php echo H::getConfApp2('connivel', 'nomina', 'nomhojint');?>'
  if (($('npvacdiafer_codniv').value.length < longitud) && ($('npvacdiafer_codniv').value!='') && conniveles!='S')
  {
    $('npvacdiafer_codniv').value = '';
    alert('El nivel organizacional no es de ultimo Nivel');
  }else{
    var cod=$('npvacdiafer_codniv').value;
    var cajamos='npvacdiafer_desniv';
    var cajacom='npvacdiafer_codniv';
    if (cod!='')    
      new Ajax.Updater('grid', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&cajtexmos='+cajamos+'&cajtexcom='+cajacom+'&codigo='+cod});
  }
  
}
</script>

</form>