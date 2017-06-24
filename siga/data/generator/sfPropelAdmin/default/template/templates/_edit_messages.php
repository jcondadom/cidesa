[?php

/**
 *
 * @package    Roraima
 * @subpackage <?php echo $this->getGeneratedModuleName() ?>
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_messages.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 *
 */
 ?]

[?php if ($sf_request->hasErrors()): ?]
<div class="form-errors">
<h2>[?php echo __('There are some errors that prevent the form to validate') ?]</h2>
<dl>
[?php foreach ($sf_request->getErrorNames() as $name): ?]
  <dt>[?php if ($name>=0 and $name<20) echo ""; else echo __($labels[$name]) ?]</dt>
  <dd>[?php echo $sf_request->getError($name) ?]</dd>
[?php endforeach; ?]
</dl>
</div>
[?php elseif ($sf_flash->has('notice')): ?]
<div class="save-ok">
<h2>[?php echo __($sf_flash->get('notice')) ?]</h2>
</div>
[?php endif; ?]

[?php if($<?php echo $this->getSingularName() ?>->getId()) : ?]
  [?php if(H::getConfApp2('papiro', sfConfig::get('sf_app'), sfContext::getInstance()->getModuleName())=='S') : ?]
    [?php $get_nombre = H::getConfApp2('papiro_get_nombre', sfConfig::get('sf_app'), sfContext::getInstance()->getModuleName()); ?]
    [?php $get_nombre = "get".ucfirst($get_nombre); ?]
    [?php $papiro = H::EnPapiro($<?php echo $this->getSingularName() ?>->$get_nombre()) ?]
    [?php if ($papiro): ?]
      [?php $papiro_url = H::getConfApp2('url', 'herramientas', 'papiro'); ?]
      <div>
        <fieldset style="float: right;">
        <h2>[?php echo __('Integración con Papiro') ?]</h2>
        <div class="form-row" id="papiro">
          [?php echo link_to("Descargar", $papiro_url.'/download/'.$papiro->getDocumento()); ?]
          <br>
          [?php echo link_to("Ver en Papiro", $papiro_url.'/documentos/'.$papiro->getDocumento(), array('target' => '_blank')); ?]
        </div>
        </fieldset>
      </div>
    [?php else: ?]
      [?php echo form_tag(cross_app_link_to('herramientas','/papiro'), array(
        'id'        => 'sf_admin_papiro',
        'name'      => 'sf_admin_papiro',
        'multipart' => true,
      )) ?]
      <div>
        <fieldset style="float: right;">
        <h2>[?php echo __('Integración con Papiro') ?]</h2>
        <div class="form-row" id="papiro">
          [?php echo input_hidden_tag('p', get_class($<?php echo $this->getSingularName() ?>->getPeer())) ?]
          [?php echo input_hidden_tag('id', $<?php echo $this->getSingularName() ?>->getId()) ?]
          [?php echo input_hidden_tag('a', sfConfig::get('sf_app')) ?]
          [?php echo input_hidden_tag('m', sfContext::getInstance()->getModuleName()) ?]
          <div class="form-row">
            [?php echo input_file_tag('uploaded_data', array('style' =>'float: none;font-size: 11px !important;')) ?] 
          </div>
          <div class="form-row">
            <label>Nro Expediente:</label>
            [?php echo input_tag("expediente", "") ?]
          </div>          

          [?php echo submit_tag('      Enviar', array('class' => 'sf_admin_action_save', 'style' =>'float: none;font-size: 11px !important;')) ?]
        </div>

        </fieldset>
      </div>
      </form>  
    [?php endif ?]

  [?php endif; ?]
[?php endif; ?]