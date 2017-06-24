<?php

/**
 * Subclase para representar una fila de la tabla 'ocdetpro'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Ocdetpro extends BaseOcdetpro
{
    protected $montot1='0,00';

    public function getMontot1()
  {
	 $totdet= self::getCanobr() * self::getCosuni();
    return number_format($totdet,2,',','.');
  }

  public function getDespar()
  {
    return Herramientas::getX('CODPAR','Ocdefpar','despar',self::getCodpar());
  }

   public function getCoduni()
  {
   $valor=Herramientas::getX('CODPAR','Ocdefpar','coduni',self::getCodpar());
   $abruni=Herramientas::getX('CODUNI','Ocunidad','abruni',$valor);
    return $abruni;
  }
}
