  
<?php $mascaraformatoubi= Herramientas::getX_vacio('codins','bndefins','ForUbi','001');?>
  <?php $value = object_input_tag($bndismue, 'getCodubides', array (
  'size' => strlen($mascaraformatoubi),
  'maxlength' => strlen($mascaraformatoubi),
  'control_name' => 'bndismue[codubides]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaraformatoubi')",
  'onBlur'=> remote_function(array(
        'url'      => 'biedisactmuelot/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('bndismue_codubides').value != ''",
          'with' => "'ajax=2&cajtexmos=bndismue_desubides&cajtexcom=bndismue_codubides&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubibie_Biedisactmuenew/clase/Bnubibie/frame/sf_admin_edit_form/obj1/bndismue_codubides/obj2/bndismue_desubides/campo1/codubi/campo2/desubi/param1/')?>


<?php $value = object_input_tag($bndismue, 'getDesubides', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'bndismue[desubides]',
)); echo $value ? $value : '&nbsp;' ?>
