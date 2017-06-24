<fieldset>
<legend><?php echo __('Fechas') ?></legend>    
<div class="form-row">
<table>
    <tr>
        <th>
<?php echo label_for('tspagele[fecdes]', __('Desde'), 'class="required" Style="width:50px"') ?>
<?php $value = object_input_date_tag($tspagele, 'getFecdes', array (
'rich' => true,
'calendar_button_img' => '/sf/sf_admin/images/date.png',
'control_name' => 'tspagele[fecdes]',
'date_format' => 'dd/MM/yy',
'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>    </th>
<th>    &nbsp;&nbsp;&nbsp;&nbsp;</th>
<th><?php echo label_for('tspagele[fechas]', __('Hasta'), 'class="required" Style="width:50px"') ?>
<?php $value = object_input_date_tag($tspagele, 'getFechas', array (
'rich' => true,
'calendar_button_img' => '/sf/sf_admin/images/date.png',
'control_name' => 'tspagele[fechas]',
'date_format' => 'dd/MM/yy',
'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>   </th>
</tr>    
</table>    
</div>    
</fieldset>
<br>    
<fieldset>
<legend><?php echo __('Tipo de Orden de Pago') ?></legend>    
<div class="form-row">
    <table>
        <tr>
            <th>
                <?php echo label_for('tspagele[tipca1]', __('Desde'), 'class="required" Style="width:50px"') ?>
               <?php $value = object_input_tag($tspagele, 'getTipca1', array (
                  'size' => 20,
                  'control_name' => 'tspagele[tipca1]',
                  'maxlength' => 4,
                  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('tspagele_tipca1').value=cadena",
                  'onBlur'=> remote_function(array(
                        'condition' => "$('tspagele_tipca1').value != '' && $('id').value == ''",
                        'url'      => 'tesmovemipagele/ajax',
                        'complete' => 'AjaxJSON(request, json)',
                        'script' => true,
                        'with' => "'ajax=3&cajtexmos=tspagele_nomex1&cajtexcom=tspagele_tipca1&codigo='+this.value"
                        ))
                )); echo $value ? $value : '&nbsp;' ?>
                
            </th>
            <th>
             <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdoccau_Pagemiord/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/tspagele_tipca1/obj2/tspagele_nomex1/campo1/tipcau/campo2/nomext','','','botoncat')?>   
            </th>
            <th>
                <?php $value = object_input_tag($tspagele, 'getNomex1', array (
                  'disabled' => true,
                  'size' => 60,
                  'control_name' => 'tspagele[nomex1]',
                )); echo $value ? $value : '&nbsp;' ?>
            </th>
        </tr>
        <tr>
            <th>
                <?php echo label_for('tspagele[tipca2]', __('Hasta'), 'class="required" Style="width:50px"') ?>
                <?php $value = object_input_tag($tspagele, 'getTipca2', array (
                  'size' => 20,
                  'control_name' => 'tspagele[tipca2]',
                  'maxlength' => 4,
                  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('tspagele_tipca2').value=cadena",
                  'onBlur'=> remote_function(array(
                        'condition' => "$('tspagele_tipca2').value != '' && $('id').value == ''",
                        'url'      => 'tesmovemipagele/ajax',
                        'complete' => 'AjaxJSON(request, json)',
                        'script' => true,
                        'with' => "'ajax=3&cajtexmos=tspagele_nomex2&cajtexcom=tspagele_tipca2&codigo='+this.value"
                        ))
                )); echo $value ? $value : '&nbsp;' ?>                
            </th>
            <th>
              <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdoccau_Pagemiord/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/tspagele_tipca2/obj2/tspagele_nomex2/campo1/tipcau/campo2/nomext','','','botoncat')?>                
            </th>
            <th>
                <?php $value = object_input_tag($tspagele, 'getNomex2', array (
                  'disabled' => true,
                  'size' => 60,
                  'control_name' => 'tspagele[nomex2]',
                )); echo $value ? $value : '&nbsp;' ?>
            </th>
        </tr>
    </table>
</div>    
</fieldset>
<br>    
<fieldset>
<legend><?php echo __('Beneficiarios') ?></legend>    
<div class="form-row">
    <table>
        <tr>
            <th>
                <?php echo label_for('tspagele[cedri1]', __('Desde'), 'class="required" Style="width:50px"') ?>
               <?php $value = object_input_tag($tspagele, 'getCedri1', array (
                  'size' => 20,
                  'control_name' => 'tspagele[cedri1]',
                  'maxlength' => 15,
                  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('tspagele_cedri1').value=cadena",
                  'onBlur'=> remote_function(array(
                        'condition' => "$('tspagele_cedri1').value != '' && $('id').value == ''",
                        'url'      => 'tesmovemipagele/ajax',
                        'complete' => 'AjaxJSON(request, json)',
                        'script' => true,
                        'with' => "'ajax=4&cajtexmos=tspagele_nombe1&cajtexcom=tspagele_cedri1&codigo='+this.value"
                        ))
                )); echo $value ? $value : '&nbsp;' ?>
                
            </th>
            <th>
             <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_Pagemiord/clase/Opbenefi/frame/sf_admin_edit_form/obj1/tspagele_cedri1/obj2/tspagele_nombe1/campo1/cedrif/campo2/nomben','','','botoncat')?>
            </th>
            <th>
                <?php $value = object_input_tag($tspagele, 'getNombe1', array (
                  'disabled' => true,
                  'size' => 60,
                  'control_name' => 'tspagele[nombe1]',
                )); echo $value ? $value : '&nbsp;' ?>
            </th>
        </tr>
        <tr>
            <th>
                <?php echo label_for('tspagele[cedri2]', __('Hasta'), 'class="required" Style="width:50px"') ?>
                <?php $value = object_input_tag($tspagele, 'getCedri2', array (
                  'size' => 20,
                  'control_name' => 'tspagele[cedri2]',
                  'maxlength' => 15,
                  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('tspagele_cedri2').value=cadena",
                  'onBlur'=> remote_function(array(
                        'condition' => "$('tspagele_cedri2').value != '' && $('id').value == ''",
                        'url'      => 'tesmovemipagele/ajax',
                        'complete' => 'AjaxJSON(request, json)',
                        'script' => true,
                        'with' => "'ajax=4&cajtexmos=tspagele_nombe2&cajtexcom=tspagele_cedri2&codigo='+this.value"
                        ))
                )); echo $value ? $value : '&nbsp;' ?>                
            </th>
            <th>
              <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_Pagemiord/clase/Opbenefi/frame/sf_admin_edit_form/obj1/tspagele_cedri2/obj2/tspagele_nombe2/campo1/cedrif/campo2/nomben','','','botoncat')?>
            </th>
            <th>
                <?php $value = object_input_tag($tspagele, 'getNombe2', array (
                  'disabled' => true,
                  'size' => 60,
                  'control_name' => 'tspagele[nombe2]',
                )); echo $value ? $value : '&nbsp;' ?>
            </th>
        </tr>
    </table>    
</div>    
</fieldset>
<br>
<fieldset>
<legend><?php echo __('Concepto de Pago') ?></legend>    
<div class="form-row">
    <table>
        <tr>
            <th>
                <?php echo label_for('tspagele[codconcepto1]', __('Desde'), 'class="required" Style="width:50px"') ?>
               <?php $value = object_input_tag($tspagele, 'getCodconcepto1', array (
                  'size' => 20,
                  'control_name' => 'tspagele[codconcepto1]',
                  'maxlength' => 4,                  
                  'onBlur'=> remote_function(array(
                        'condition' => "$('tspagele_codconcepto1').value != '' && $('id').value == ''",
                        'url'      => 'tesmovemipagele/ajax',
                        'complete' => 'AjaxJSON(request, json)',
                        'script' => true,
                        'with' => "'ajax=9&cajtexmos=tspagele_nomconcepto1&cajtexcom=tspagele_codconcepto1&codigo='+this.value"
                        ))
                )); echo $value ? $value : '&nbsp;' ?>                
            </th>
            <th>
             <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opconpag_Pagemiord/clase/Opconpag/frame/sf_admin_edit_form/obj1/tspagele_codconcepto1/obj2/tspagele_nomconcepto1/campo1/codconcepto/campo2/nomconcepto','','','botoncat')?>   
            </th>
            <th>
                <?php $value = object_input_tag($tspagele, 'getNomconcepto1', array (
                  'disabled' => true,
                  'size' => 60,
                  'control_name' => 'tspagele[nomconcepto1]',
                )); echo $value ? $value : '&nbsp;' ?>
            </th>
        </tr>
        <tr>
            <th>
                <?php echo label_for('tspagele[codconcepto2]', __('Hasta'), 'class="required" Style="width:50px"') ?>
                <?php $value = object_input_tag($tspagele, 'getCodconcepto2', array (
                  'size' => 20,
                  'control_name' => 'tspagele[codconcepto2]',
                  'maxlength' => 4,
                  'onBlur'=> remote_function(array(
                        'condition' => "$('tspagele_codconcepto2').value != '' && $('id').value == ''",
                        'url'      => 'tesmovemipagele/ajax',
                        'complete' => 'AjaxJSON(request, json)',
                        'script' => true,
                        'with' => "'ajax=9&cajtexmos=tspagele_nomconcepto2&cajtexcom=tspagele_codconcepto2&codigo='+this.value"
                        ))
                )); echo $value ? $value : '&nbsp;' ?>                
            </th>
            <th>
              <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opconpag_Pagemiord/clase/Opconpag/frame/sf_admin_edit_form/obj1/tspagele_codconcepto2/obj2/tspagele_nomconcepto2/campo1/codconcepto/campo2/nomconcepto','','','botoncat')?>                
            </th>
            <th>
                <?php $value = object_input_tag($tspagele, 'getNomconcepto2', array (
                  'disabled' => true,
                  'size' => 60,
                  'control_name' => 'tspagele[nomconcepto2]',
                )); echo $value ? $value : '&nbsp;' ?>
            </th>
        </tr>
    </table>
</div>    
</fieldset>
<br>    
<ul class="sf_admin_actions" >
<li class="float-center">
<input id="acep" class="sf_admin_action_save" type="button" value="Aceptar" onClick="aceptar();">
</li>
</ul>