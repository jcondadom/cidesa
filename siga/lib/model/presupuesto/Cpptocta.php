<?php

/**
 * Subclase para representar una fila de la tabla 'cpptocta'.
 *
 * Tabla para registrar los Puntos de Cuenta
 *
 * @package    Roraima
 * @subpackage lib.model.presupuesto
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Cpptocta extends BaseCpptocta
{
    protected $fecdes="";
    protected $fechas="";
    protected $check=false;
    protected $check2=false;
    protected $grid=array();
	
  public function getDesubiori()
  {
    return H::getX_vacio('CODUBI','Bnubica','Desubi',self::getCodubiori());
  }

  public function getDesubides()
  {
    return H::getX_vacio('CODUBI','Bnubica','Desubi',self::getCodubides());
  }  

  public function getFecpta2()
  {
    return date('d/m/Y',strtotime(self::getFecpta()));
  }  

  public function afterhydrate(){
      if (self::getAprpto()=='A')
          $this->check=true;
      else if (self::getAprpto()=='R')
           $this->check2=true;
  }

  public function getDesdirec()
  {
      return Herramientas::getX_vacio('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
  }
}
