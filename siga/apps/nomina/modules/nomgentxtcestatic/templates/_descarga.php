<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php if ($empresa->getDireccion()!=""){ ?>

<div style='width:450px; color: #c11b17; font-size: 14px; font-weight: bold;' >
<ul>
  <li>
      <?php $hosts=$this->getContext()->getRequest()->getHost();?>
    <?php echo link_to('Descargar Txt Generado => '.$empresa->getDireccion(),'http://'.$hosts.'/uploads/cestatickets/'.$empresa->getDireccion()); ?>
  </li>
</ul>
</div>

<?php } ?>