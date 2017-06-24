<?php

/**
 * Subclase para representar una fila de la tabla 'npptocta'.
 *
 * Tabla para registrar los Puntos de Cuenta de Empleados
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npptocta extends BaseNpptocta
{
	protected $obj=array();
  protected $obj2=array();
  protected $fecdes="";
  protected $fechas="";
  protected $check=false;
  protected $check2=false;
  protected $grid=array();

	 public function getNivel()
    {
        $nomniv='';
        $codniv = H::getX_vacio('Codemp','Nphojint','Codniv',$this->codemp);
        $c2 = new Criteria();
        $c2->add(NpestorgPeer::CODNIV,$codniv);
        $per2 = NpestorgPeer::doSelectOne($c2);
        if($per2)
            $nomniv=$per2->getDesniv();
        if ($codniv=='' && $nomniv=='')
            return '';
        else
            return $codniv.'  -  '.$nomniv;
    }

     public function getCedemp()
    {
       return H::getX_vacio('Codemp','Nphojint','Cedemp',$this->codemp);

    }

     public function getNomemp()
    {
       return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codemp);

    }

    public function getNomempa()
    {
       return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codempa);

    }

    public function getNomempp()
    {
       return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codempp);

    }

    public function getNomnom()
    {
       return H::getX_vacio('Codnom','Npnomina','Nomnom',$this->codnom);

    }

    public function getNomcar()
    {
       return H::getX_vacio('Codcar','Npcargos','Nomcar',$this->codcar);

    }

    public function getFecing()
    {
       if (self::getId()){
        if (self::getTippto()=='A')
         return date('d/m/Y',strtotime(H::getX_vacio('Codemp','Nphojint','Fecing',$this->codemp)));
        else
        return '';
       }
       else
        return '';

    }

     public function getFechas()
    {
        $fec1=$fec2='';
        $c2 = new Criteria();
        $c2->add(NphojintPeer::CODEMP,$this->codemp);
        $per2 = NphojintPeer::doSelectOne($c2);
        if($per2){
        	if ($per2->getFecinicon()!='')
        		$fec1=date('d/m/Y',strtotime($per2->getFecinicon()));

            if ($per2->getFecfincon()!='')
        		$fec2=date('d/m/Y',strtotime($per2->getFecfincon()));        

          return $fec1.'  -  '.$fec2;   
        }else return '';   
       
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

  public function getCodniv()
  {

      return H::getX_vacio('Codemp','Nphojint','Codniv',$this->codemp);
  }
}
