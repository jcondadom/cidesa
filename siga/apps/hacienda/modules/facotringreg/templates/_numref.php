 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

   <?php
   $bandera1="style=\"display:none;\"";

 $rif="'+$('fcotring_rifcon').value+'";



  ?>
<table>
 <th>
    <div id="numref"  <?php echo $bandera1; ?> >
          <?php echo label_for('fcotring[numref]', __('Referencia:'), 'class="required" Style="text-align:left; width:80px"') ?>
          <div class="content<?php if ($sf_request->hasError('fcotring{numref}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('fcotring{numref}')): ?>
            <?php echo form_error('fcotring{numref}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
          <?php $value = object_input_tag($fcotring, 'getNumref', array (
          'size' => 20,
          'control_name' => 'fcotring[numref]',
          'readonly'  =>  $fcotring->getId()!='' ? true : false ,
          'onBlur'=> remote_function(array(
          'url'      => 'facotringreg/ajax',
          'complete' => 'AjaxJSON(request, json)',
          'script'   => true,
          'with' => "'ajax=5&codigo='+this.value+'&rifcon='+$('fcotring_rifcon').value+'&valor='+$('fcotring_doctos').value"
        ))
      )); echo $value ? $value : '&nbsp;' ?>
          </div>
    </div>
 </th>
<th>
        <div id="divrefic" <?php echo $bandera1; ?>>
   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Facotringreg_Numref/clase/Fcsollic/frame/sf_admin_edit_form/obj1/fcotring_numref/obj2/fcotring_nombrecont/obj3/fcotring_dircont/campo1/numlic/campo2/nomneg/campo3/dirpri/param1/'.$rif,'','','')?></th>
        </div>
</th>
<th>
        <div id="divrefvehiculo" <?php echo $bandera1; ?>>
   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Facotringreg_Numrefveh/clase/Fcregveh/frame/sf_admin_edit_form/obj1/fcotring_numref/obj2/fcotring_nombrecont/obj3/fcotring_dircont/campo1/plaveh/campo2/nomcon/campo3/dircon/param1/'.$rif,'','','')?></th>
        </div>
</th>
<th>
        <div id="divrefinmueble" <?php echo $bandera1; ?>>
   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Facotringreg_Numrefinm/clase/Fcreginm/frame/sf_admin_edit_form/obj1/fcotring_numref/obj2/fcotring_nombrecont/obj3/fcotring_dircont/campo1/codcatinm/campo2/nomcon/campo3/dirinm/param1/'.$rif,'','','')?></th>
        </div>
</th>

 </table>
<br/>

<table>

       <div id="nombrecont"  <?php echo $bandera1; ?> >
     <?php echo label_for('fcotring[nombrecont]', __('Nombre:'), 'class="required" Style="text-align:left; width:148px"') ?>
          <div class="content<?php if ($sf_request->hasError('fcotring{nombrecont}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('fcotring{nombrecont}')): ?>
            <?php echo form_error('fcotring{nombrecont}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>

          <?php $value = object_input_tag($fcotring, 'getNombrecont', array (
          'size' => 40,
          'control_name' => 'fcotring[nombrecont]',
          'readonly'  =>  true  
      )); echo $value ? $value : '&nbsp;' ?>
          </div>
       </div>

</table>
<br/>

<table>

      <div id="dircont"  <?php echo $bandera1; ?> >
            <?php echo label_for('fcotring[dircont]', __('Dirección:'), 'class="required" Style="text-align:left; width:148px"') ?>
          <div class="content<?php if ($sf_request->hasError('fcotring{dircont}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('fcotring{dircont}')): ?>
            <?php echo form_error('fcotring{dircont}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>

          <?php $value = object_textarea_tag($fcotring, 'getDircont', array (
          'maxlength' => 200,
          'cols' => 58,
          'row' => 2,
          'control_name' => 'fcotring[dircont]',
          'readonly'  =>   true ,
      )); echo $value ? $value : '&nbsp;' ?>
            </div>
      </div>


</table>