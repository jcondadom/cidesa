<?php

/**
 * Subclase para representar una fila de la tabla 'facarord'.
 *
 * Maestro de la Carta orden
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Facarord extends BaseFacarord
{
    protected $rifpro="";
    protected $dirpro="";
    protected $telpro="";
    protected $obj1=array();
    protected $obj2=array();
    protected $obj3=array();
    protected $codprg="";
    protected $famart="";
    protected $concre="";
    protected $conpag="";
    protected $totdetped=0.0;
    protected $totped=0.0;
    protected $mondet=0.0;
    
  public function getRifpro()
  {
    $facliente = $this->getFaclienteRelatedByCodpro();
    if($facliente) return $facliente->getRifpro();
    return '';
  }

  public function getNompro()
  {
    $facliente = $this->getFaclienteRelatedByCodpro();
    if($facliente) return $facliente->getNompro();
    return '';
  }
  
  public function getTelpro()
  {
    $facliente = $this->getFaclienteRelatedByCodpro();
    if($facliente) return $facliente->getTelpro();
    return '';
  }

  public function getDirpro()
  {
    $facliente = $this->getFaclienteRelatedByCodpro();
    if($facliente) return $facliente->getDirpro();
    return '';
  }
      
  public function getNomentcre()
  {
    $faentcre = $this->getFaentcre();
    if($faentcre) return $faentcre->getNomentcre();
    return '';
  }  
  
  public function getNomban()
  {
    $facliente = $this->getFaclienteRelatedByCodban();
    if($facliente) return $facliente->getCodpro();
    return '';
  }
  
  public function getNomram()
  {
    $caramart = $this->getCaramart();
    if($caramart) return $caramart->getNomram();
    return '';
  }

  public function getcodtipcli()
  {
    return $this->get('getFaclienteRelatedByCodpro','getFatipcteId');
  }

  public function getPedido()
  {
    $sql = "select case when sum(monped) isnull then 0 else sum(monped) end as pedido from fapedido where numcar='".$this->numcar."' and status='A'";
    if(H::BuscarDatos($sql,$result)){
      return H::FormatoMonto($result[0]['pedido']);
    }else return '0,0';
  }

  public function getFacturado()
  {
    $sql = "select case when sum(a.totart) isnull then 0 else sum(a.totart) end as facturado from faartfac a inner join fapedido b on a.codref=b.nroped where b.numcar='".$this->numcar."' and b.status='A'";
    if(H::BuscarDatos($sql,$result)){
      return H::FormatoMonto($result[0]['facturado']);
    }else return '0,0';

  }

  public function getDisponible($formato=false)
  {
    $sql = "select case when sum(a.totart) isnull then 0 else sum(a.totart) end as facturado from faartfac a inner join fapedido b on a.codref=b.nroped where b.numcar='".$this->numcar."' and b.status='A'";
    if(H::BuscarDatos($sql,$result)){
      $dispo = $this->moncar - $result[0]['facturado'];
      if($formato) return H::FormatoMonto($dispo);
      else return $dispo;
    }else return '0,0';
  }

  public function Cerrada()
  {
    if($this->getDisponible(true)==0.0) return true;
    else return false;
  }
}
