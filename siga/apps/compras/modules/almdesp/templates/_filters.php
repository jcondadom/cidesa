<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/23 14:33:48
?>
<?php use_helper('Object') ?>
<?php use_helper('Javascript') ?>
<?php echo javascript_include_tag('tools') ?>

<div class="sf_admin_filters">
<?php echo form_tag('almdesp/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="dphart"><?php echo __('Número:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[dphart]', isset($filters['dphart']) ? $filters['dphart'] : null, array (
  'size' => 15,
  'maxlegth' => 8,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('filters_dphart').value=valor;",
)) ?>
    </div>
    </div>
    
        <div class="form-row">
    <label for="filters_fecdph"><?php echo __('Fecha:') ?></label>
    <div class="content">
    <?php echo input_date_range_tag('filters[fecdph]', isset($filters['fecdph']) ? $filters['fecdph'] : null, array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'date_format' => 'dd/MM/yy',
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_reqart"><?php echo __('N° Requisición:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[reqart]', isset($filters['reqart']) ? $filters['reqart'] : null, array (
  'size' => 8,
)) ?>
    </div>
    </div>    

        <div class="form-row">
    <label for="filters_codcen"><?php echo __('Centro de Costo:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codcen]', isset($filters['codcen']) ? $filters['codcen'] : null, array (
  'size' => 4,
)) ?>
    </div>
    </div>
        <div class="form-row">
    <label for="filters_descen"><?php echo __('Descripción C.C:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[descen]', isset($filters['descen']) ? $filters['codcen'] : null, array (
  'size' => 20,
)) ?>
    </div>
    </div>    
<div class="form-row">
    <label for="filters_codori"><?php echo __('Unidad de Origen:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codori]', isset($filters['codori']) ? $filters['codori'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_nomcat"><?php echo __('Descripción U.O:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomcat]', isset($filters['nomcat']) ? $filters['nomcat'] : null, array (
  'size' => 20,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_desdph"><?php echo __('Descripción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[desdph]', isset($filters['desdph']) ? $filters['desdph'] : null, array (
  'size' => 20,
)) ?>
    </div>
    </div>        
        <div class="form-row">
    <label for="filters_codalm"><?php echo __('Código Almacén:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codalm]', isset($filters['codalm']) ? $filters['codalm'] : null, array (
  'size' => 6,
)) ?>
    </div>
    </div>      
<div class="form-row">
    <label for="filters_nomalm"><?php echo __('Nombre Almacén:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomalm]', isset($filters['nomalm']) ? $filters['nomalm'] : null, array (
  'size' => 20,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_codedo"><?php echo __('Código de Estado:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codedo]', isset($filters['codedo']) ? $filters['codedo'] : null, array (
  'size' => 10,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_nomedo"><?php echo __('Nombre de Estado:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomedo]', isset($filters['nomedo']) ? $filters['nomedo'] : null, array (
  'size' => 20,
)) ?>
    </div>
    </div>    
      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'almdesp/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
