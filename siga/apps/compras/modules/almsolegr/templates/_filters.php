<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/06/11 12:45:11
?>
<?php use_helper('Object') ?>

<div class="sf_admin_filters">
<?php echo form_tag('almsolegr/list', array('method' => 'get')) ?>

  <fieldset>
    <h2><?php echo __('filters') ?></h2>
    <div class="form-row">
    <label for="reqart"><?php echo __('Número') ?></label>
    <div class="content">
    <?php echo input_tag('filters[reqart]', isset($filters['reqart']) ? $filters['reqart'] : null, array (
  'size' => 8,
  //'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('filters_reqart').value=valor;",
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_desreq"><?php echo __('Descripción:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[desreq]', isset($filters['desreq']) ? $filters['desreq'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_fecreq"><?php echo __('Fecha:') ?></label>
    <div class="content">
    <?php echo input_date_range_tag('filters[fecreq]', isset($filters['fecreq']) ? $filters['fecreq'] : null, array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'date_format' => 'dd/MM/yy',
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
    <?php echo input_tag('filters[descen]', isset($filters['descen']) ? $filters['descen'] : null, array (
  'size' => 20,
)) ?>
    </div>
    </div>    
<div class="form-row">
    <label for="filters_unires"><?php echo __('Unidad Responsable:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[unires]', isset($filters['unires']) ? $filters['unires'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_nomcat"><?php echo __('Descripción U.R:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[nomcat]', isset($filters['nomcat']) ? $filters['nomcat'] : null, array (
  'size' => 20,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_codcat"><?php echo __('Unidad Ejecutora:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[codcat]', isset($filters['codcat']) ? $filters['codcat'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_descat"><?php echo __('Descripción U.E:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[descat]', isset($filters['descat']) ? $filters['descat'] : null, array (
  'size' => 20,
)) ?>
    </div>
    </div>

        <div class="form-row">
    <label for="filters_numproc"><?php echo __('N° de procedimiento:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[numproc]', isset($filters['numproc']) ? $filters['numproc'] : null, array (
  'size' => 15,
)) ?>
    </div>
    </div>


        <div class="form-row">
    <label for="filters_aprreq"><?php echo __('Aprobada ó No:') ?></label>
    <div class="content">
    <?php echo input_tag('filters[aprreq]', isset($filters['aprreq']) ? $filters['aprreq'] : null, array (
  'size' => 1,
)) ?>
    </div>
    </div>
      </fieldset>

  <ul class="sf_admin_actions">
    <li><?php echo button_to(__('reset'), 'almsolegr/list?filter=filter', 'class=sf_admin_action_reset_filter') ?></li>
    <li><?php echo submit_tag(__('filter'), 'name=filter class=sf_admin_action_filter') ?></li>
  </ul>

</form>
</div>
