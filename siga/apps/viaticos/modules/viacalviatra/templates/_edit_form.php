<?php
// auto-generated by PropelCidesa
// date: 2013/05/27 12:44:36
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage vistas
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?>

<?php echo form_tag('viacalviatra/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
  'onsubmit'  => 'return false;',
)) ?>

<?php echo object_input_hidden_tag($viacalviatra, 'getId') ?>

<?php
  $fields = ViacalviatraPeer::getFieldNames();

  if(array_search('Codalmusu', $fields))
  {  ?>
  <h2 class="h2" onclick="javascript: return $('divusualms').toggle();"><?php echo __('Almacenes') ?></h2>
  <fieldset id="sf_fieldset_usualms" class="">
  <div class="form-row" id="divusualms">
    <?php echo label_for('viacalviatra[codalmusu]', __('Almacenes Por Usuario: '), 'class="required" Style="text-align:left; width:150px"') ?>
    <div class="content">
    <?php
      $almacenes = $sf_user->getAttribute('usualms',array());
      if(count($almacenes)>0){
        $keys = array_keys($almacenes);
        $codalm = $keys[0];
      }else $codalm = '';
      if($codalm == '') echo label_for('viacalviatra[codalmusu]', __('Usuario sin Almacen Asociado'), 'class="required" Style="text-align:left; width:150px"').'<br><br><br>';
      else echo select_tag('viacalviatra[codalmusu]',options_for_select($almacenes,$viacalviatra->getCodalmusu()!='' ? $viacalviatra->getCodalmusu() : $codalm), ( ($viacalviatra->getId()) ? 'disabled=true' : '').' style=width:500px');
    ?>
    </div>
  </div>
  </fieldset>
<?php } ?>

<?php echo object_input_hidden_tag($viacalviatra, 'getStatus', array('id' => 'viacalviatra_status', 'name' => 'viacalviatra[status]')) ?>
<?php $cambiareti=H::getConfApp2('cameti', 'viaticos', 'viacalviatra');?>

<h2 class="h2" onclick="javascript: return $('divDatos Básicos del Calculo de Viaticos').toggle();"><?php if ($cambiareti=='S') echo __('Datos Básicos de la Solicitud de Viaticos'); else echo __('Datos Básicos del Calculo de Viaticos'); ?></h2>
<fieldset id="sf_fieldset_datos_b__sicos_del_calculo_de_viaticos" class="">

<div class="form-row" id="divDatos Básicos del Calculo de Viaticos">
<div id="divcompromiso">
  <?php if($labels['viacalviatra{compromiso}']!='.:') { ?>
  <?php echo label_for('viacalviatra[compromiso]', __($labels['viacalviatra{compromiso}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{compromiso}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{compromiso}')): ?>
    <?php echo form_error('viacalviatra{compromiso}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getCompromiso', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[compromiso]',
  'size' => 100,
  'style' => 'border:none;text-align:center;color:red;font-size:medium;font-weight:bold',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{compromiso}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divforma">
  <?php if($labels['viacalviatra{forma}']!='.:') { ?>
  <?php echo label_for('viacalviatra[forma]', __($labels['viacalviatra{forma}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{forma}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{forma}')): ?>
    <?php echo form_error('viacalviatra{forma}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = get_partial('forma', array('type' => 'edit', 'viacalviatra' => $viacalviatra,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{forma}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divnumcal">
  <?php if($labels['viacalviatra{numcal}']!='.:') { ?>
  <?php echo label_for('viacalviatra[numcal]', __($labels['viacalviatra{numcal}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{numcal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{numcal}')): ?>
    <?php echo form_error('viacalviatra{numcal}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getNumcal', array (
  'size' => 10,
  'control_name' => 'viacalviatra[numcal]',
  'maxlength' => 10,
  'onBlur' => 'rellenarcorr(this.id)',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{numcal}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divfeccal">
  <?php if($labels['viacalviatra{feccal}']!='.:') { ?>
  <?php echo label_for('viacalviatra[feccal]', __($labels['viacalviatra{feccal}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{feccal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{feccal}')): ?>
    <?php echo form_error('viacalviatra{feccal}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_date_tag($viacalviatra, 'getFeccal', array (
  'rich' => true,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'viacalviatra[feccal]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{feccal}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divtipcom">
  <?php if($labels['viacalviatra{tipcom}']!='.:') { ?>
  <?php echo label_for('viacalviatra[tipcom]', __($labels['viacalviatra{tipcom}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{tipcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{tipcom}')): ?>
    <?php echo form_error('viacalviatra{tipcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($viacalviatra, 0, array (
  'getprincipal' => 'getTipcom',
  'getsecundario' => 'getNomext',
  'campoprincipal' => 'tipcom',
  'camposecundario' => 'nomext',
  'campobase' => 'id',
),  'Cpdoccom_Predoccom',  'Cpdoccom',  '',  '',  '');?>

  	
  <?php if($labels['viacalviatra{tipcom}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divrefsol">
  <?php if($labels['viacalviatra{refsol}']!='.:') { ?>
  <?php echo label_for('viacalviatra[refsol]', __($labels['viacalviatra{refsol}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{refsol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{refsol}')): ?>
    <?php echo form_error('viacalviatra{refsol}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($viacalviatra, 1, array (
  'getprincipal' => 'getRefsol',
  'getsecundario' => 'getFecha',
  'campoprincipal' => 'refsol',
  'camposecundario' => 'fecha',
  'campobase' => 'id',
),  'viasolviatra_numsol',  'Viasolviatra',  '',  '',  'div1');?>

  	
  <?php if($labels['viacalviatra{refsol}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divfecsol">
  <?php if($labels['viacalviatra{fecsol}']!='.:') { ?>
  <?php echo label_for('viacalviatra[fecsol]', __($labels['viacalviatra{fecsol}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{fecsol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{fecsol}')): ?>
    <?php echo form_error('viacalviatra{fecsol}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getFecsol', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[fecsol]',
  'style' => 'border:none',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{fecsol}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divtipvia">
  <?php if($labels['viacalviatra{tipvia}']!='.:') { ?>
  <?php echo label_for('viacalviatra[tipvia]', __($labels['viacalviatra{tipvia}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{tipvia}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{tipvia}')): ?>
    <?php echo form_error('viacalviatra{tipvia}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getTipvia', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[tipvia]',
  'style' => 'border:none',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{tipvia}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divempleado">
  <?php if($labels['viacalviatra{empleado}']!='.:') { ?>
  <?php echo label_for('viacalviatra[empleado]', __($labels['viacalviatra{empleado}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{empleado}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{empleado}')): ?>
    <?php echo form_error('viacalviatra{empleado}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getEmpleado', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[empleado]',
  'style' => 'border:none',
  'size' => 80,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{empleado}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divnivel">
  <?php if($labels['viacalviatra{nivel}']!='.:') { ?>
  <?php echo label_for('viacalviatra[nivel]', __($labels['viacalviatra{nivel}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{nivel}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{nivel}')): ?>
    <?php echo form_error('viacalviatra{nivel}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getNivel', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[nivel]',
  'style' => 'border:none',
  'size' => 80,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{nivel}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divcodcat">
  <?php if($labels['viacalviatra{codcat}']!='.:') { ?>
  <?php echo label_for('viacalviatra[codcat]', __($labels['viacalviatra{codcat}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{codcat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{codcat}')): ?>
    <?php echo form_error('viacalviatra{codcat}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
    
  <?php echo Catalogo($viacalviatra, 0, array (
  'getprincipal' => 'getCodcat',
  'getsecundario' => 'getNomcat',
  'campoprincipal' => 'codcat',
  'camposecundario' => 'nomcat',
  'campobase' => 'id',
),  'NconceptosCat_Asignar',  'Npcatpre',  '',  '',  '');?>

  	
  <?php if($labels['viacalviatra{codcat}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divgrid2">
  <?php if($labels['viacalviatra{grid2}']!='.:') { ?>
  <?php echo label_for('viacalviatra[grid2]', __($labels['viacalviatra{grid2}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{grid2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{grid2}')): ?>
    <?php echo form_error('viacalviatra{grid2}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = get_partial('grid2', array('type' => 'edit', 'viacalviatra' => $viacalviatra,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{grid2}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divpais">
  <?php if($labels['viacalviatra{pais}']!='.:') { ?>
  <?php echo label_for('viacalviatra[pais]', __($labels['viacalviatra{pais}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{pais}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{pais}')): ?>
    <?php echo form_error('viacalviatra{pais}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getPais', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[pais]',
  'style' => 'border:none',
  'size' => 80,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{pais}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divestado">
  <?php if($labels['viacalviatra{estado}']!='.:') { ?>
  <?php echo label_for('viacalviatra[estado]', __($labels['viacalviatra{estado}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{estado}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{estado}')): ?>
    <?php echo form_error('viacalviatra{estado}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getEstado', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[estado]',
  'style' => 'border:none',
  'size' => 80,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{estado}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divciudad">
  <?php if($labels['viacalviatra{ciudad}']!='.:') { ?>
  <?php echo label_for('viacalviatra[ciudad]', __($labels['viacalviatra{ciudad}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{ciudad}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{ciudad}')): ?>
    <?php echo form_error('viacalviatra{ciudad}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getCiudad', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[ciudad]',
  'style' => 'border:none',
  'size' => 80,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{ciudad}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divproced">
  <?php if($labels['viacalviatra{proced}']!='.:') { ?>
  <?php echo label_for('viacalviatra[proced]', __($labels['viacalviatra{proced}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{proced}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{proced}')): ?>
    <?php echo form_error('viacalviatra{proced}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getProced', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[proced]',
  'style' => 'border:none',
  'size' => 80,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{proced}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divfortra">
  <?php if($labels['viacalviatra{fortra}']!='.:') { ?>
  <?php echo label_for('viacalviatra[fortra]', __($labels['viacalviatra{fortra}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{fortra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{fortra}')): ?>
    <?php echo form_error('viacalviatra{fortra}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getFortra', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[fortra]',
  'style' => 'border:none',
  'size' => 80,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{fortra}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divfecdes">
  <?php if($labels['viacalviatra{fecdes}']!='.:') { ?>
  <?php echo label_for('viacalviatra[fecdes]', __($labels['viacalviatra{fecdes}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{fecdes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{fecdes}')): ?>
    <?php echo form_error('viacalviatra{fecdes}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getFecdes', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[fecdes]',
  'style' => 'border:none',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{fecdes}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divfechas">
  <?php if($labels['viacalviatra{fechas}']!='.:') { ?>
  <?php echo label_for('viacalviatra[fechas]', __($labels['viacalviatra{fechas}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{fechas}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{fechas}')): ?>
    <?php echo form_error('viacalviatra{fechas}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getFechas', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[fechas]',
  'style' => 'border:none',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{fechas}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divnumdia">
  <?php if($labels['viacalviatra{numdia}']!='.:') { ?>
  <?php echo label_for('viacalviatra[numdia]', __($labels['viacalviatra{numdia}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{numdia}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{numdia}')): ?>
    <?php echo form_error('viacalviatra{numdia}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getNumdia', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[numdia]',
  'style' => 'border:none',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{numdia}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divunidadsol">
  <?php if($labels['viacalviatra{unidadsol}']!='.:') { ?>
  <?php echo label_for('viacalviatra[unidadsol]', __($labels['viacalviatra{unidadsol}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{unidadsol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{unidadsol}')): ?>
    <?php echo form_error('viacalviatra{unidadsol}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getUnidadsol', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[unidadsol]',
  'style' => 'border:none',
  'size' => 80,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{unidadsol}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divunidadeje">
  <?php if($labels['viacalviatra{unidadeje}']!='.:') { ?>
  <?php echo label_for('viacalviatra[unidadeje]', __($labels['viacalviatra{unidadeje}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{unidadeje}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{unidadeje}')): ?>
    <?php echo form_error('viacalviatra{unidadeje}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getUnidadeje', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[unidadeje]',
  'style' => 'border:none',
  'size' => 80,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{unidadeje}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divempleadoaut">
  <?php if($labels['viacalviatra{empleadoaut}']!='.:') { ?>
  <?php echo label_for('viacalviatra[empleadoaut]', __($labels['viacalviatra{empleadoaut}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{empleadoaut}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{empleadoaut}')): ?>
    <?php echo form_error('viacalviatra{empleadoaut}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getEmpleadoaut', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[empleadoaut]',
  'style' => 'border:none',
  'size' => 80,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{empleadoaut}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divdessol">
  <?php if($labels['viacalviatra{dessol}']!='.:') { ?>
  <?php echo label_for('viacalviatra[dessol]', __($labels['viacalviatra{dessol}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{dessol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{dessol}')): ?>
    <?php echo form_error('viacalviatra{dessol}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_textarea_tag($viacalviatra, 'getDessol', array (
  'control_name' => 'viacalviatra[dessol]',
  'style' => 'border:none',
  'cols' => 70,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{dessol}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divdiaconper">
  <?php if($labels['viacalviatra{diaconper}']!='.:') { ?>
  <?php echo label_for('viacalviatra[diaconper]', __($labels['viacalviatra{diaconper}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{diaconper}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{diaconper}')): ?>
    <?php echo form_error('viacalviatra{diaconper}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getDiaconper', array (
  'size' => 7,
  'onKeyPress' => 'javascript:return validaEntero(event)',
  'control_name' => 'viacalviatra[diaconper]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{diaconper}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divdiasinper">
  <?php if($labels['viacalviatra{diasinper}']!='.:') { ?>
  <?php echo label_for('viacalviatra[diasinper]', __($labels['viacalviatra{diasinper}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{diasinper}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{diasinper}')): ?>
    <?php echo form_error('viacalviatra{diasinper}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getDiasinper', array (
  'size' => 7,
  'onKeyPress' => 'javascript:return validaEntero(event)',
  'control_name' => 'viacalviatra[diasinper]',
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{diasinper}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divobservaciones">
  <?php if($labels['viacalviatra{observaciones}']!='.:') { ?>
  <?php echo label_for('viacalviatra[observaciones]', __($labels['viacalviatra{observaciones}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{observaciones}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{observaciones}')): ?>
    <?php echo form_error('viacalviatra{observaciones}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_textarea_tag($viacalviatra, 'getObservaciones', array (
  'control_name' => 'viacalviatra[observaciones]',
  'cols' => 65,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{observaciones}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
</div>
</fieldset>

<h2 class="h2" onclick="javascript: return $('divDatos Detalle del Calculo').toggle();"><?php if ($cambiareti=='S') echo __('Datos Detalle de la Solicitud'); else echo __('Datos Detalle del Calculo'); ?></h2>
<fieldset id="sf_fieldset_datos_detalle_del_calculo" class="">

<div class="form-row" id="divDatos Detalle del Calculo">
<div id="divgrid">
  <?php if($labels['viacalviatra{grid}']!='.:') { ?>
  <?php echo label_for('viacalviatra[grid]', __($labels['viacalviatra{grid}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{grid}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{grid}')): ?>
    <?php echo form_error('viacalviatra{grid}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = get_partial('grid', array('type' => 'edit', 'viacalviatra' => $viacalviatra,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{grid}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divtotviadol">
  <?php if($labels['viacalviatra{totviadol}']!='.:') { ?>
  <?php echo label_for('viacalviatra[totviadol]', __($labels['viacalviatra{totviadol}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{totviadol}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{totviadol}')): ?>
    <?php echo form_error('viacalviatra{totviadol}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getTotviadol', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[totviadol]',
  'style' => 'border:none',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{totviadol}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divtotvia">
  <?php if($labels['viacalviatra{totvia}']!='.:') { ?>
  <?php echo label_for('viacalviatra[totvia]', __($labels['viacalviatra{totvia}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{totvia}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{totvia}')): ?>
    <?php echo form_error('viacalviatra{totvia}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($viacalviatra, 'getTotvia', array (
  'disabled' => true,
  'control_name' => 'viacalviatra[totvia]',
  'style' => 'border:none',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{totvia}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divtotviaenletras">
  <?php if($labels['viacalviatra{totviaenletras}']!='.:') { ?>
  <?php echo label_for('viacalviatra[totviaenletras]', __($labels['viacalviatra{totviaenletras}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{totviaenletras}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{totviaenletras}')): ?>
    <?php echo form_error('viacalviatra{totviaenletras}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_textarea_tag($viacalviatra, 'getTotviaenletras', array (
  'control_name' => 'viacalviatra[totviaenletras]',
  'cols' => 65,
  'style' => 'border:none',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{totviaenletras}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divjs">
  <?php if($labels['viacalviatra{js}']!='.:') { ?>
  <?php echo label_for('viacalviatra[js]', __($labels['viacalviatra{js}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{js}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{js}')): ?>
    <?php echo form_error('viacalviatra{js}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = get_partial('js', array('type' => 'edit', 'viacalviatra' => $viacalviatra,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
      
		
  <?php if($labels['viacalviatra{js}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
</div>
</fieldset>

<?php include_partial('edit_actions', array('viacalviatra' => $viacalviatra)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($viacalviatra->getId()): ?>
<?php echo button_to(__('delete'), 'viacalviatra/delete?id='.$viacalviatra->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script language="Javascript">
var grabo='<?php echo $grabo;?>';
var mosforpreimp="<?php echo H::getConfApp2('mosforpreimp', 'viaticos', 'viacalviatra');?>";

if (mosforpreimp=='S' && grabo=='S')
{
  Mostrar_orden_preimpresa();
}

</script>