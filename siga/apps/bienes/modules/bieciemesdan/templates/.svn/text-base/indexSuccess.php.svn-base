<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Javascript', 'PopUp', 'Grid','Linktoapp') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools', 'observe') ?>
<div id="sf_admin_container">
<h1><?php echo __('Cierre de Mes', array()) ?></h1>
<div id="sf_admin_content">
<?php if ($sf_flash->has('notice')): ?>
<div class="save-ok">
<h2><?php echo __($sf_flash->get('notice')) ?></h2>
</div>
<?php endif; ?>
<?php echo form_tag('bieciemesdan/index', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<table width="75%" border="0">
  <tr>
    <td width="36%" rowspan="3" valign="top">
       <div align="center">
        <p><strong><u><?php echo __('Advertencia:') ?></u></strong></p><?php echo input_hidden_tag('depcalculada', '') ?>
        <p><img src="/images/alerta.png"  ></p>
       </div>
    </td>
    <td width="64%" height="39">
    <fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
      <p><font size="3" face="MS sans-serif"><?php echo __('Resultados del Cierre de Mes') ?></font></p>
      <p><font size="3" face="MS sans-serif"><?php echo __('1.- Calcula próxima fecha del período del sistema.') ?></font><font face="MS sans-serif"></font></p>
      <p><font size="3" face="MS sans-serif"><?php echo __('2.- Calcula la depreciación de los bienes para el mes que se esta cerrando.') ?></font></p>
      <p><font size="3" face="MS sans-serif"><?php echo __('3.- Crea movimientos contables de depreciación.')?></font></p>
      <p><br><strong><font size="2" face="MS sans-serif"><?php echo __('Nota: La depreciación de bienes debe realizarse despúes del cierre del mes.')?></font></strong></p>
    </div>
    </fieldset>
    </td>
  </tr>
<tr>
<th>
<div id="fechareval">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo label_for('mesdep',__('Mes de Depreciación') , 'class="required" id="label16" Style="width:110px"') ?>  
<?php echo select_tag('mesdep', options_for_select(Array('' => 'Seleccione ...', '01' => '01', '02' => '02', '03' => '03',
'04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10',
'11' => '11', '12' => '12',), ''),array(
'onChange'=> remote_function(array(
        'url'      => 'bieciemesdan/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('mesdep').value != ''",
        'with' => "'ajax=1&codigo='+this.value"
        ))
))
?>
<br>
<?php echo label_for('fecha',__('Fecha de Depreciación') , 'class="required" id="label16" Style="width:110px"') ?>
<?php echo input_date_tag('fecha','', array(
 'size' => 10,
 'maxlength' => 10,
 'rich' => true,
 'readOnly' => true,
 'calendar_button_img' => '/sf/sf_admin/images/date.png',
 'date_format' => 'dd/MM/yyyy', 
)) ?>
</div>
</fieldset>
</div>
</th>
<tr>
<th>
<div id="botones" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Cerrar Mes')?></legend>
<div class="form-row">
  <div align=center>
  <button id="vela" name="Submit" type="button" onclick="javascript:depreciacion();" ><img src="/images/candado.png"><?php echo __('Depreciar Bienes') ?></button>
  </div>
  <div id="comp"></div>
</div>
</fieldset>
</div>
</th>
</tr>
</table>

</form>
</div>
</div>

<script language="JavaScript" type="text/javascript">
$('trigger_fecha').hide();
  function depreciacion()
  {
    if(confirm("Realmente ¿Desea realizar la Depreciación?"))
    {
      new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&codigo='+$('fecha').value})
    }
  }

  function asiento()
  {
    new Ajax.Updater('comp',getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&deprecal=S'})
  }

  function asiento2(fecha)
  {
    new Ajax.Updater('comp',getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&deprecal=S&codigo='+fecha})
  }  

  function comprobante(formulario)
  {
      window.open('/tesoreria'+getEnv()+'.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }
</script>