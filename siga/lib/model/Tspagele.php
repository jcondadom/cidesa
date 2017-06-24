<?php

/**
 * Subclase para representar una fila de la tabla 'tspagele'.
 *
 * Tabla que contiene informaciÃ³n referente a los Pagos Electronicos.
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Tspagele extends BaseTspagele
{
    protected $obj=array();
    protected $codcta="";
    protected $disponible="";
    protected $fecdes="";
    protected $fechas="";
    protected $tipca1="";
    protected $tipca2="";
    protected $cedri1="";
    protected $cedri2="";
    protected $valdatben="";
    
    public function getNomext()
    {
        return Herramientas::getX('TIPPAG','Cpdocpag','Nomext',$this->getTipdoc());
    }
    
    public function getNomcue()
    {
  	return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',$this->getNumcue());
    }   

    public function getValmon($val = false) {
        if ($val) 
        return number_format($this->valmon, 6, ',', '.');
        else 
        return $this->valmon;
    }
    public function setValmon($v) {
        if ($this->valmon !== $v) {
            $this->valmon = Herramientas::toFloat($v, 6);
            $this->modifiedColumns[] = TspagelePeer::VALMON;
        }
    } 

    public function getDesdirec()
  {
      return H::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
  } 

  public function getMsg() {

    if (self::getId()) {
        if (self::getEstpag()=='A')
            return "Pago Electrónico Procesado";
        else return "";
    }else return "";
  }

public function getValdatben()
  {
      return H::getConfApp2('valdatben', 'tesoreria', 'tesmovemipagele');
  }  
}
