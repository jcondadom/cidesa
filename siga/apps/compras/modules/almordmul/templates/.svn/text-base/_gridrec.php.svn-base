<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php echo grid_tag_v2($caordcom->getObj6()); ?>

<div align="center">
<table>
<tr>
<th>
<?php echo label_for('',__('Total') , 'class="required" Style="width:40px"') ?>
<?php echo input_tag('caordcom[totrecar]',$caordcom->getTotrecar(), 'size=14 class=grid_txtright readonly=true') ?>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <div align="right">
    <?php if ($caordcom->getOrdcom()==''){ ?>
      <?php echo link_to_function(image_tag('/images/salir.gif'), "salvarmontorecargos()")?>
    <?php } else if ($caordcom->getOrdcom()!='' && $caordcom->getCompro()=='N') {?>
    	<?php echo link_to_function(image_tag('/images/salir.gif'), "salvarmontorecargos()")?>
    	<?php }else {?>
      <?php echo link_to_function(image_tag('/images/salir.gif'), "$('divgridrec').hide();")?>
    <?php }?>
  </div>
</th>
</tr>
</table>
</div>