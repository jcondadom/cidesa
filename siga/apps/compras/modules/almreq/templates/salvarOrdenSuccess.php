<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_helper('Javascript') ?>

<?php $js = "  
     var idreffila='".$idreffila."';
     var ref='".$ref."';    
      f=opener.document;
      f.sf_admin_edit_form.".$idreffila.".value=ref;  
      f.sf_admin_edit_form.".$idreffila.".focus();
      self.close();
"; ?>
<?php $jp = "  
   var idreffila='".$idreffila."';
     var ref='".$ref."';    
      f=opener.document;
      f.sf_admin_edit_form.".$idreffila.".value=ref;  
      f.sf_admin_edit_form.".$idreffila.".focus();
	 self.close();
"; ?>
<? if ($resp=='') {
		echo javascript_tag($js);
 } else { 
 		echo javascript_tag($jp);  			
 }?>



