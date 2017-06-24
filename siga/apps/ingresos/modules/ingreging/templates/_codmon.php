<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

  <?php if ($cireging->getCodmon()=='') $var=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'); else $var=$cireging->getCodmon();?>
  <?php echo select_tag('cireging[codmon]', objects_for_select(TsdesmonPeer::getMonedasExactas(),'getCodmon','getNommon',$var,'include_custom=Seleccione'),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=5&cajtexmos=cireging_valmon&nuevo='+$('id').value+'&valmone='+$('cireging_valmon').value+'&variable=$var&codigo='+this.value"
      ))      
  )) ?>