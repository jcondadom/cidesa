<?php

/**
 * Subclass for representing a row from the 'cadphart'.
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
class Cadphart extends BaseCadphart
{
   protected $check="";
   protected $fecdphdes="";
   protected $fecdphhas="";
   protected $grid=array();

   public function getMondph($val=false)
	{
		return parent::getMondph(true);
	}

    public function getRifpro()
    {
        return Herramientas::getX('CODPRO','Facliente','Rifpro',self::getCodcli());
    }

    public function getNompro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Nompro',self::getCodcli());
    }

    public function getDirpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Dirpro',self::getCodcli());
    }

    public function getTelpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Telpro',self::getCodcli());
    }

   public function getNomcat()
	{
        $catubibnu=H::getConfApp2('catubibnu', 'compras', 'almdesp');
        if ($catubibnu=='S')
	    return Herramientas::getX('CODUBI','Bnubica','Desubi',self::getCodori());
        else
            return Herramientas::getX('CODUBI','Bnubibie','Desubi',self::getCodori());
	}

	public function getNomalm()
	{
		return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
	}

	public function getDesreq()
	{
		return Herramientas::getX('REQART','Careqart','Desreq',self::getReqart());
	}

	public function getFecreq()
	{
		return Herramientas::getX('REQART','Careqart','Fecreq',self::getReqart());
	}

	public function getNomubi()
	{
		return Herramientas::getX('CODUBI','Cadefubi','Nomubi',self::getCodubi());
	}

  public function getDescen()
  {
	return Herramientas::getX('CODCEN','Cadefcen','Descen',self::getCodcen());
  }

    public function getManartlot()
    {
            return H::getConfApp2('manartlot', 'compras', 'almregart');
    }

    public function getIndicalm()
    {
            return H::getConfApp2('indicalm', 'facturacion', 'fadesp');
    }

    public function getNomedo()
    {
      $pais=OcpaisPeer::doSelectOne(new Criteria());
      if ($pais) {
      $t= new Criteria();
      $t->add(OcestadoPeer::CODPAI,$pais->getCodpai());
      $t->add(OcestadoPeer::CODEDO,self::getCodedo());
      $e = OcestadoPeer::doSelectOne($t);
      if ($e)
        return $e->getNomedo();
      else
        return '';
      }else
        return '';
    }

    public function getNomciu()
    {
      $pais=OcpaisPeer::doSelectOne(new Criteria());
      if ($pais) {
      $t= new Criteria();
      $t->add(OcciudadPeer::CODPAI,$pais->getCodpai());
      $t->add(OcciudadPeer::CODEDO,self::getCodedo());
      $t->add(OcciudadPeer::CODCIU,self::getCodciu());
      $e = OcciudadPeer::doSelectOne($t);
      if ($e)
        return $e->getNomciu();
      else
        return '';
      }else
        return '';
    }

    public function getNommun()
    {
      $pais=OcpaisPeer::doSelectOne(new Criteria());
      if ($pais) {
      $t= new Criteria();
      $t->add(OcmuniciPeer::CODPAI,$pais->getCodpai());
      $t->add(OcmuniciPeer::CODEDO,self::getCodedo());
      $t->add(OcmuniciPeer::CODCIU,self::getCodciu());
      $t->add(OcmuniciPeer::CODMUN,self::getCodmun());
      $e = OcmuniciPeer::doSelectOne($t);
      if ($e)
        return $e->getNommun();
      else
        return '';
      }else
        return '';
    }    

    public function getNompar()
    {
      $pais=OcpaisPeer::doSelectOne(new Criteria());
      if ($pais) {
      $t= new Criteria();
      $t->add(OcparroqPeer::CODPAI,$pais->getCodpai());
      $t->add(OcparroqPeer::CODEDO,self::getCodedo());
      $t->add(OcparroqPeer::CODMUN,self::getCodmun());
      $t->add(OcparroqPeer::CODPAR,self::getCodpar());
      $e = OcparroqPeer::doSelectOne($t);
      if ($e)
        return $e->getNompar();
      else
        return '';
      }else
        return '';
    }       

  public function getNominst()
  {
  return Herramientas::getX('CODINST','Fainstedu','Nominst',self::getCodinst());
  }

  public function getEspae()
  {
      return Herramientas::getX('CODPRG','Fadefprg','Espae',self::getCodprg());
  }

  public function Etiqueta()
  {
     $fildesp=H::getConfApp2('fildes', 'facturacion', 'fadesp');
     if ($fildesp=='S' && self::getId())
       if (self::getStadev()=='S')
        return 'APROBADA';
       else
        return 'POR APROBAR';

     return '';
  }

  public function getDespro()
  {
      return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
  }

  public function TieneFac()
  {
    $e= new Criteria();
    $e->add(FaartfacPeer::CODREF,self::getDphart());
    $result= FaartfacPeer::doSelectOne($e);
    if ($result)
      return 'S';
    else
      return '';
  }

    public function getDesdirec()
    {
        return Herramientas::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
    }  

}

