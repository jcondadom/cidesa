<?php

/**
 * Subclase para representar una fila de la tabla 'viadetrelvia'.
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
class Viadetrelvia extends BaseViadetrelvia
{
    public function getDesart()
    {
        return H::getX_vacio('Codart','Caregart','Desart',$this->codart);
    }

    public function getNomcat()
    {
        return H::getX_vacio('Codcat','Npcatpre','Nomcat',$this->codcat);
    }
    
    public function getNompar()
    {
        return H::getX_vacio('Codpar','Nppartidas','Nompar',$this->codpar);
    }    

    public function getMontonet($val=false)
  {
    if (self::getId())
    {
        $moneda=H::getX_vacio('NUMREL', 'Viarelvia', 'Codmon', self::getNumrel());
        $valor=H::getX_vacio('NUMREL', 'Viarelvia', 'Valmon', self::getNumrel());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->montonet/$valor;
        }else $calculo=$this->montonet;
    }else $calculo=$this->montonet;


    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }
  
  public function getMontorec($val=false)
  {
    if (self::getId())
    {
        $moneda=H::getX_vacio('NUMREL', 'Viarelvia', 'Codmon', self::getNumrel());
        $valor=H::getX_vacio('NUMREL', 'Viarelvia', 'Valmon', self::getNumrel());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->montorec/$valor;
        }else $calculo=$this->montorec;
    }else $calculo=$this->montorec;
    
    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }

  public function setMontonet($v)
    {

    if ($this->montonet !== $v) {
        $this->montonet = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViadetrelviaPeer::MONTONET;
      }
  
    } 
    
    public function setMontorec($v)
    {

    if ($this->montorec !== $v) {
        $this->montorec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViadetrelviaPeer::MONTOREC;
      }
  
    } 
}
