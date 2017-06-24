<?php

/**
 * Subclass for representing a row from the 'bnregmue'.
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
class Bnregmue extends BaseBnregmue
{
	protected $savenumord="";
        protected $etifeccal="";
        protected $canmueigu=0;
        protected $obj=array();
        protected $renovo="";
        protected $coddes="";
        protected $codhas="";
        protected $obj1=array();

        public function getNomprovee()
	{
		return Herramientas::getX('codpro','caprovee','nompro',trim(self::getCodpro()));
	}

	public function getNomdispos()
	{
		return Herramientas::getX('coddis','Bndisbie','Desdis',trim(self::getCoddis()));
	}

	public function getNomubicac()
	{
		return Herramientas::getX('codubi','Bnubibie','Desubi',trim(self::getCodubi()));
	}

  public function getVidutiactual()
  {
    $des = 0;
    $des = $this->getViduti()+ $this->getAumviduti()- $this->getDimviduti() ;
    return $des;
  }

  public function getValactual()
  {
    $des = 0;
    $des = $this->getValini()+ $this->getValadi();
    return H::FormatoMonto($des);
  }

  public function getNomrespat()
  {
  	 return Herramientas::getX('CODEMP','Nphojint','Nomemp',self::getCodrespat());
  }

  public function getNomresuso()
  {
      $respusoben=H::getConfApp2('respusoben', 'bienes', 'bieregactmued');
      if ($respusoben=='S')      
  	 return Herramientas::getX('CEDRIF','Opbenefi','Nomben',self::getCodresuso());
      else
          return Herramientas::getX('CODEMP','Nphojint','Nomemp',self::getCodresuso());
  }

	public function getDespro()
	{
	  return Herramientas::getX('CODPRO','Catippro','Despro',self::getTippro());
	}

  public function getSavenumord()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('bienes',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['bienes']))
	     if(array_key_exists('bieregactmued',$varemp['aplicacion']['bienes']['modulos'])){
	       if(array_key_exists('savenumord',$varemp['aplicacion']['bienes']['modulos']['bieregactmued']))
	       {
	       	$dato=$varemp['aplicacion']['bienes']['modulos']['bieregactmued']['savenumord'];
}
         }
     return $dato;
  }

  public function setSavenumord()
  {
  	return $this->savenumord;
  }

  public function getEtifeccal()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('bienes',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['bienes']))
	     if(array_key_exists('bieregactmued',$varemp['aplicacion']['bienes']['modulos'])){
	       if(array_key_exists('etifeccal',$varemp['aplicacion']['bienes']['modulos']['bieregactmued']))
	       {
	       	$dato=$varemp['aplicacion']['bienes']['modulos']['bieregactmued']['etifeccal'];
	       }
         }
     return $dato;
  }

  public function setEtifeccal()
  {
  	return $this->etifeccal;
  }

    public function getNomuse()
    {
       if (self::getId())
         $loguse=self::getLogusu();
       else
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');

      
      return Herramientas::getX('loguse','Usuarios','Nomuse',$loguse);

}

    public function getDesubiadm()
    {
            return Herramientas::getX('codubi','Bnubica','Desubi',trim(self::getCodubiadm()));
    }

  public function getMansolcor()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('bienes',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['bienes']))
	     if(array_key_exists('bieregactmued',$varemp['aplicacion']['bienes']['modulos'])){
	       if(array_key_exists('mansolcor',$varemp['aplicacion']['bienes']['modulos']['bieregactmued']))
	       {
	       	$dato=$varemp['aplicacion']['bienes']['modulos']['bieregactmued']['mansolcor'];
	       }
         }
     return $dato;
  }

  public function setMansolcor()
  {
  	return $this->mansolcor;
  }
  
    public function getDesest()
    {
        return Herramientas::getX_vacio('codest','Bnestcon','Desest',self::getCodest());
    }  
    
    public function getDesmod()
    {
        return Herramientas::getX_vacio('codmod','Bnmodtra','Desmod',self::getCodmod());
    }  
    
    public function getMansegbie()
    {
        return H::getConfApp2('mansegbie', 'bienes', 'bieregactmued');
    }
    
      public function getIdrefer()
      {
        return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
      }
      
      public function getNomcue()
    {
            return Herramientas::getX_vacio('Numcue','Tsdefban','Nomcue',trim(self::getNumcue()));
    }

    public function getDestip()
    {
            return Herramientas::getX('codtip','Tstipmov','Destip',trim(self::getCodtip()));
    }

  public function getNomubicac2()
  {
    return Herramientas::getX('codubi','Bnubibie','Desubi',trim(self::getCoddes()));
  }

  public function getDesubi()
  {
          return Herramientas::getX('codubi','Bnubica','Desubi',trim(self::getCodubi()));
  }

    public function getNomapeest()
  {
      return Herramientas::getX_vacio('cedest','Bncatest','Nomapeest',self::getCedest());
  } 

    public function getDesproc()
    {
        return Herramientas::getX_vacio('codproc','Bndefpro','Desproc',self::getCodproc());
    }  

  public function getCedrep()
  {
      return Herramientas::getX_vacio('cedest','Bncatest','Cedrep',self::getCedest());
  }    

  public function getNomaperep()
  {
      return Herramientas::getX_vacio('cedest','Bncatest','Nomaperep',self::getCedest());
  }  

  public function getDescol()
  {
      return H::getX_vacio('codcol','Bncatcol','Descol',self::getCodcol());
  }    

  public function getNompai()
  {
      return H::getX_vacio('codpai','Bnpais','Nompai',self::getCodpai());
  } 

  public function getNomest()
  {
      return H::getX_vacio('codest','Bnestado','Nomest',self::getCodes2());
  }  

  public function getNommun()
  {
      return H::getXx('Bnmunicip',array('CODMUN','BNESTADO_CODEST'),array(self::getCodmun(),self::getCodes2()),'nommun');
  }  

    public function getNompar()
  {
      return H::getXx('Bnparroq',array('CODPAR','BNMUNICIP_CODMUN'),array(self::getCodpar(),self::getCodmun()),'nompar');
  } 

    public function getNomciu()
  {
      return H::getXx('Bnciudad',array('CODCIU','BNMUNICIP_CODMUN'),array(self::getCodciu(),self::getCodmun()),'nomciu');
  }   

  public function getDesusobie()
  {
      return H::getX_vacio('codusobie','Bnusobie','Desusobie',self::getCodusobie());
  } 

  public function getEtifeccal2(){
    return H::getConfApp2('etifeccal2', 'bienes', 'bieregactmued');
  }

  public function TieMuedep()
  {
    if (self::getCodactdep()=='' && self::getCodmuedep()=='' && self::getId()!=''){
     $c = new Criteria();
     $c->add(BnregmuePeer::CODACTDEP, self::getCodact());
     $c->add(BnregmuePeer::CODMUEDEP, self::getCodmue());
     $reg = BnregmuePeer::doSelectOne($c);
     if ($reg)
      return 'S';
     else return 'N';
   }else return 'N';
    
  }

  public function getDesudebip()
  {
      return H::getX_vacio('sudebip','Bncatsudebip','Desudebip',self::getSudebip());
  } 

}


