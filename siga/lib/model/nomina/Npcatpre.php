<?php

/**
 * Subclase para representar una fila de la tabla 'npcatpre'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npcatpre extends BaseNpcatpre
{
    protected $obj=array();
    protected $codigo1='';
   protected $nombre1='';
   protected $codigo11='';


    public function getNomcatnew()
    {
      return self::getNomcat();
    }

    public function getCodcatnew()
    {
      return self::getCodcat();
    }

    public function getUnires()
    {
      return self::getCodcat();
    }

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

    public function getUnisol()
    {
      return self::getCodcat();
    }
}
