<?php echo input_hidden_tag('moneref', $viarelvia->getCodmon()) ?>
<?php echo input_hidden_tag('moneref', $viarelvia->getCodmon()) ?>
    <?php if ($viarelvia->getCodmon()=='') 
            $var=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'); 
          else 
            $var=$viarelvia->getCodmon();
    ?>

  <?php echo select_tag('viarelvia[codmon]', objects_for_select(TsdesmonPeer::getMonedasExactas(),'getCodmon','getNommon',$var,'include_custom=Seleccione'),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=1&cajtexmos=viarelvia_valmon&valmone='+$('viarelvia_valmon').value+'&moneref='+$('moneref').value+'&nuevo='+$('id').value+'&codigo='+this.value"
      ))
  )) ?>