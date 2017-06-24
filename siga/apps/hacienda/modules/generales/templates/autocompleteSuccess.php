<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: autocompleteSuccess.php 40715 2010-09-21 21:02:58Z dmartinez $
 */
// date: 2007/04/09 17:27:37
?>
<ul style="overflow:auto; height:200px; width:auto">
<?
foreach ($tags as $value) 
{
?>	
    <li><?=$value?></li>
<?    
  }
?>
</ul>



