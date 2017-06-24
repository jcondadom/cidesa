<?php

/**
 * Subclass for representing a row from the 'caregart'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Caregart extends BaseCaregart
{
  protected $ubicacion = '';
  protected $gencorart="";
  protected $tiedatrel="";
  protected $oculsave="";
  protected $totalm="0,00";
  protected $codubi="";
  protected $obj1=array();
  protected $obj2=array();
  protected $obj3=array();
  protected $obj4=array();
  protected $numsol="";

  public function getNomram($val=false)
	{
		return Herramientas::getX('RAMART','Caramart','Nomram',self::getRamart());
	}


public function getDisponibilidad($val=false)
  {
	$filtros=array('CODART','CODALM');//arreglo donde mando los filtros de las clases
	$variables=array(self::getCodart(),self::getCodalm());//arreglo donde mando los parametros de la funcion
  	return $destipact= Herramientas::getXx('CAARTALM',$filtros,$variables,'Destipact');
  }

    public function getDessnc()
	{
		return Herramientas::getX('CODSNC','Cacatsnc','Dessnc',self::getCodartsnc());
	}

public function getNompar()
	{
		return Herramientas::getX('CODPAR','Nppartidas','Nompar',self::getCodpar());
	}

	public function getGencorart()
    {
      $d= new Criteria();
      $data=CadefartPeer::doSelectOne($d);
      if ($data)
      {
      	$si=$data->getGencorart();
      }else $si=null;
      return $si;
    }

  public function getTiedatrel()
  {
  	$valor="N";
  	if (self::getId()){
  	  $d= new Criteria();
  	  $d->add(CaartsolPeer::CODART,self::getCodart());
  	  $resul= CaartsolPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	$valor= 'S';
  	  }else {
  	  $d= new Criteria();
  	  $d->add(CaartordPeer::CODART,self::getCodart());
  	  $resul= CaartordPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	$valor= 'S';
  	  }else $valor= 'N';
  	  }
  	}


  	return $valor;
  }

  public function setTiedatrel()
  {
  	return $this->tiedatrel;
  }

  public function getOculsave()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almregart',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('oculsave',$varemp['aplicacion']['compras']['modulos']['almregart']))
	       {
	       	$dato=$varemp['aplicacion']['compras']['modulos']['almregart']['oculsave'];
	       }
         }
     return $dato;
  }

  public function setOculsave()
  {
  	return $this->oculsave;
  }

    public function getManunialt()
    {
            return H::getConfApp2('manunialt', 'compras', 'almregart');
    }

    public function getManartlot()
    {
            return H::getConfApp2('manartlot', 'compras', 'almregart');
    }
    
    public function getDesunimed()
    {
            return Herramientas::getX_vacio('CODUNIMED','Cadefunimed','Desunimed',$this->codunimed);
    }    

    public function getCodunimed()
    {
      return $this->codunimed;
    }

    public function UltimoNivel()
    {
      $c = new Criteria();
      $cadefart = CadefartPeer::doSelectOne($c);
      if($cadefart){
        if($cadefart->getLonart()==strlen($this->codart)) return true;
      }else return false;
    }

    public function getCodmat(){
      return self::getCodart();
    }

    public function getDesmat(){
      return self::getDesart();
    }

    public function getCodequ(){
      return self::getCodart();
    }

    public function getDesequ(){
      return self::getDesart();
    }
  
  public function getManconstruc()
  {
          return H::getConfApp2('manconstruc', 'compras', 'almregart');
  }

  public function getCodser(){
      return self::getCodart();
    }

    public function getDesser(){
      return self::getDesart();
    }

    public function getRotacion(){
      $result=array();
      $sql="select to_char(a.fecdph,'mm') as mes from cadphart a, caartdph b where a.dphart=b.dphart and b.codart='".$this->codart."'
            union
            select  to_char(a.fecsal,'mm') as mes from casalalm a, cadetsal b where a.codsal=b.codsal and b.codart='".$this->codart."' order by 1";
      if (Herramientas::BuscarDatos($sql,$result))
      {
        $canmes=count($result);
        $w= new Criteria();
        $w->add(CaranrotPeer::DESDE,$canmes,Criteria::LESS_EQUAL);
        $w->add(CaranrotPeer::HASTA,$canmes,Criteria::GREATER_EQUAL);
        $regw= CaranrotPeer::doSelectOne($w);
        if ($regw)
          return $regw->Tipo();
        else
          return 'NULA';
      }else {
        return 'NULA';
      }



    }

}
