<?php

/**
 * Subclase para representar una fila de la tabla 'cicatpre'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.ingresos
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Cicatpre extends BaseCicatpre
{
	protected $codigo1='';
   protected $nombre1='';
   protected $codigo11='';

   public function getNompre()
    {
      return self::getNomcat();
    }

    public function getCodpre()
    {
      return self::getCodcat();
    }

    public function getNompre1()
    {
      return self::getNomcat();
    }

    public function getCodigo1()
    {
      return self::getCodcat();
    }

    public function getCodigo11()
    {
      return self::getCodcat();
    }
}
