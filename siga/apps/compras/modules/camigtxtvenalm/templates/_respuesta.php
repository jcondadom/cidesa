<?php $arrerror = $sf_flash->has('error') ?>

<?php if ($arrerror): ?>
  <?php
      echo '<br>';
      echo '<pre>

        ';
      foreach ($sf_flash->get('error') as $err){
        echo $err.'<br>';
      }
      echo '</pre>';
  ?>
  <?php echo link_to('Descargar Errores',$sf_flash->get('urlerror')) ?>
<?php else: ?>
  <?php echo 'Procesado sin Errores'; ?>
<?php endif; ?>

