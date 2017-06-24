<?php

/**
 * Subclase para representar una fila de la tabla 'viasolbolaer'.
 *
 * Tabla que contiene información de la Solicitud de Boletos Áereos
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Viasolbolaer extends BaseViasolbolaer
{
  protected $fecdes="";
  protected $fechas="";
  protected $check2=false;
  protected $check3=false;
  protected $grid=array();

  protected $obj=array();

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
  
     public function getFecsal2()
  {
      return date('d/m/Y',strtotime(self::getFecsal()));
  } 

  public function getFecreg2()
  {
      return date('d/m/Y',strtotime(self::getFecreg()));
  }   
}
