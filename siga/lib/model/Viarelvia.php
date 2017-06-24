<?php

/**
 * Subclase para representar una fila de la tabla 'viarelvia'.
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
class Viarelvia extends BaseViarelvia
{
    protected $grid=array();
    protected $mondif='0,00';
    protected $intemb='';

    public function afterHydrate()
    {
        if (self::getId())
        {
            $this->mondif=H::FormatoMonto(self::getMonbol()-self::getTotfac());
            if ($this->mondif>0)
                $this->intemb="Reintegro";
            else
                $this->intemb="Reembolso";            
        }
        
    }

    public function getNomext()
    {
        return H::GetX('Tipcom','Cpdoccom','Nomext',$this->tipcom);
    }
    public function getFecha()
    {
        return self::getFecrel();
    }
    public function getDescrip()
    {
        return self::getDesrel();
    }
    public function getCompromiso()
    {
        return $this->refcom ? 'COMPROMISO NRO '.$this->refcom : '';
    }

    public function getNomemp()
    {
        return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codemp);
    }

public function getValmon($val=false)
{

if($val) return number_format($this->valmon,6,',','.');
else return $this->valmon;

}
  
public function setValmon($v)
{

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v,6);
        $this->modifiedColumns[] = ViarelviaPeer::VALMON;
      }  
}   

  public function getMonbol($val=false)
  {
    if (self::getId())
    {
        $moneda=self::getCodmon();
        $valor=self::getValmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            if($valor >0){
            $calculo=$this->monbol/$valor;
            }else{
                $calculo=0;
            }
        }else $calculo=$this->monbol;
    }else $calculo=$this->monbol;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }
  
  public function getTotfac($val=false)
  {
    if (self::getId())
    {
        $moneda=self::getCodmon();
        $valor=self::getValmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            if($valor >0){
            $calculo=$this->totfac/$valor;
            }else{
                $calculo=0;
            }
        }else $calculo=$this->totfac;
    }else $calculo=$this->totfac;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }

    public function setMonbol($v)
    {

    if ($this->monbol !== $v) {
        $this->monbol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViarelviaPeer::MONBOL;
      }
  
    } 
    
    public function setTotfac($v)
    {

    if ($this->totfac !== $v) {
        $this->totfac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViarelviaPeer::TOTFAC;
      }
  
    } 
}
