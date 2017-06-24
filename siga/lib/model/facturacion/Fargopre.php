<?php

/**
 * Subclase para representar una fila de la tabla 'fargopre'.
 *
 * Tabla que graba los recargos de los presupuestos
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Fargopre extends BaseFargopre
{
  protected $nomrgo="";
  protected $codcta="";
  protected $recfij="";
  protected $tipo="";
  protected $monrgo2="0,00";

  public function getNomrgo()
  {
   return Herramientas::getX('CODRGO','Farecarg','Nomrgo',self::getCodrgo());
  }

  public function getRecfij()
  {
  	$re=Herramientas::getX('CODRGO','Farecarg','Calcul',self::getCodrgo());
  	if ($re=='S')
  	{
  		$valor="Si";
  	}else $valor="No";
   return $valor;
  }

  public function getCodcta()
  {
   return Herramientas::getX('CODRGO','Farecarg','Codcta',self::getCodrgo());
  }

  public function getTipo()
  {
   return Herramientas::getX('CODRGO','Farecarg','Tiprgo',self::getCodrgo());
  }

  public function getMonrgo2()
  {
   return number_format(Herramientas::getX('CODRGO','Farecarg','Monrgo',self::getCodrgo()), 2, ',', '.');
  }

  public function getMonrgo($val=false)
  {

    if (self::getId())
    {
        $moneda=H::getX_vacio('REFPRE', 'Fapresup', 'Tipmon', self::getRefdoc());
        $valor=H::getX_vacio('REFPRE', 'Fapresup', 'Valmon', self::getRefdoc());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->monrgo/$valor;
        }else $calculo=$this->monrgo;
    }else $calculo=$this->monrgo;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }

  public function setMonrgo($v)
  {

    if ($this->monrgo !== $v) {
        $this->monrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FargoprePeer::MONRGO;
      }
  
  } 
}
