<?php
// auto-generated by PropelCidesa
// date: 2011/05/13 09:22:01
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage vistas
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _list_td_tabular.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?>

      <td><?php echo link_to($fcdeclar->getNumdec() ? $fcdeclar->getNumdec() : __('-'), 'facinmdec/edit?id='.$fcdeclar->getId().'&numdecl='.$fcdeclar->getNumdec().'&numrefe='.$fcdeclar->getNumref()) ?></td>
      <td><?php echo ($fcdeclar->getFecdec() !== null && $fcdeclar->getFecdec() !== '') ? format_date($fcdeclar->getFecdec(), "dd/MM/yyyy") : '' ?></td>
      <td><?php echo $fcdeclar->getNumref() ?></td>