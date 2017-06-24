<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_helper('Javascript') ?>
<?php $js = "
     var msg='".$msg."';     
     f=opener.document.sf_admin_edit_form;
    if (msg!='')
    {
       alert(msg);
    }
   self.close();
   //q = document.createElement('form'); document.body.appendChild(q); q.method = 'POST';
   f.action='/hacienda'+getEnv()+'.php/facrecpag/list';
   f.submit();
   

"; ?>
<?php echo javascript_tag($js); ?>