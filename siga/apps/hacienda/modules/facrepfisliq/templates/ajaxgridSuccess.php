<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?php $value = get_partial('grid', array('type' => 'edit', 'fcrepfis' => $fcrepfis,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>