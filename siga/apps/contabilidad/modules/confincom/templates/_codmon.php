<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

  <?php if ($contabc->getCodmon()=='') $var=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'); else $var=$contabc->getCodmon();?>
  <?php echo select_tag('contabc[codmon]', objects_for_select(TsdesmonPeer::getMonedasExactas(),'getCodmon','getNommon',$var,'include_custom=Seleccione'),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=7&cajtexmos=contabc_valmon&nuevo='+$('id').value+'&valmone='+$('contabc_valmon').value+'&variable=$var&codigo='+this.value"
      ))      
  )) ?>