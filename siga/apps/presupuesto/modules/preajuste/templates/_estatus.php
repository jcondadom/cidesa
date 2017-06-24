<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<div class="form-error" align="center">
<h3>
<?php
  if ($cpajuste->getStaaju()=='N')
  {
      echo 'Anulado el '.date('d/m/Y',strtotime($cpajuste->getFecanu()));
  }
?>
</h3>
</div>

