<?php

/**
 * Subclase para representar una fila de la tabla 'faantcli'.
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
class Faantcli extends BaseFaantcli
{
  protected $rifpro="";
  protected $nompro="";
  protected $telpro="";
  protected $dirpro="";
  protected $grid=array();
  protected $idcom="";
  
  protected function afterHydrate()
  {
    $t= new Criteria();
    $t->add(FaclientePeer::CODPRO, $this->codcli);
    $result= FaclientePeer::doSelectOne($t);
    if ($result)
    {
        $this->rifpro=$result->getRifpro();
        $this->nompro=$result->getNompro();
        $this->telpro=$result->getTelpro();
        $this->dirpro=$result->getDirpro();
    }
  }
  
    public function getNomcue()
    {
        return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',self::getNumcue());
    }

    public function getDestip()
    {
        return Herramientas::getX('CODTIP','Tstipmov','Destip',self::getCodtip());
    }

    public function getIdcom()
    { 
        return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());

    }
  
  
}
