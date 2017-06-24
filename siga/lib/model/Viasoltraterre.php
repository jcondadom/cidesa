<?php

/**
 * Subclase para representar una fila de la tabla 'viasoltraterre'.
 *
 * Tabla que contiene información referente a la Solicitud de  Transporte Terrestre
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Viasoltraterre extends BaseViasoltraterre
{
   protected $obj=array();
   protected $fecdes="";
  protected $fechas="";
  protected $check2=false;
  protected $check3=false;
  protected $grid=array();


	public function getNomemp()
	{
	    if (!self::getEsnoemp())
	        return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codempusu);
	    else
	        return H::getX_vacio('Rifnemp','Vianoemp','Nomnemp',$this->codempusu);
	}

	/*public function getTelemp()
	{
	    if (!self::getEsnoemp())
	        return H::getX_vacio('Codemp','Nphojint','Celemp',$this->codempusu);
	    else
	        return H::getX_vacio('Rifnemp','Vianoemp','Telnemp',$this->codempusu);
	}*/

  public function getDeseve()
  {
    return H::getX_vacio('CODEVE','Cpevepre','Deseve',self::getCodeve());
  } 

  public function getDesniv()
  {
    return H::getX_vacio('CODNIV','Npestorg','Desniv',self::getCodniv());
  }

	  public function getDesdirec()
	{
	    return H::getX_vacio('Coddirec','Cadefdirec','Desdirec',$this->coddirec);
	}   

    public function getUsuario()
  {
      return self::getCodempusu().' - '.self::getNomemp();
  }   

   public function afterhydrate(){
        if (self::getStaapr()=='A')
            $this->check2=true;
        else $this->check2=false;

       if (self::getStaapr()=='D')
             $this->check3=true;
        else $this->check3=false;
    }	

  public function getFecsol2()
  {
      return date('d/m/Y',strtotime(self::getFecsol()));
  }     
}
