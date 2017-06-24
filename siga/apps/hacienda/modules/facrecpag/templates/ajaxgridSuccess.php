<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?php $value = get_partial('gridrecargdescto', array('type' => 'edit', 'fcpagos' => $fcpagos,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>