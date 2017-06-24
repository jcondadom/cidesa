<?php

/**
 * Subclase para representar una fila de la tabla 'liprebas'.
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
class Liprebas extends BaseLiprebas
{
  protected  $codmun="";    
  protected  $codpar="";  
  protected  $grid=array();
  protected  $grid_rec=array();
  protected  $gridrgo=array();

  public function afterHydrate()
  {
    #$this->feccam =
  }

  public function getFeccam($format = 'Y-m-d H:i:s')
  {
     return parent::getFeccam('d/m/Y H:i:s');
  }

  public function getCodempadm()
  {
    return H::GetX('Codemp','lidatstedet','Codemp',$this->codempadm);
  }

  public function getCodempeje()
  {
    return H::GetX('Codemp','Lidatstedet','Codemp',$this->codempeje);
  }
  
  public function getEjepre()
  {
      $sql="select to_char(fecini,'yyyy') as anofis from contaba";
      if(H::BuscarDatos($sql, $rs))
         return $rs[0]['anofis'];
      else
         return '';
  }

  public function getNomempadm()
  {
      return H::GetX('Codemp','Lidatstedet','Nomemp',$this->codempadm);
  }
  
  public function getNomext()
  {
      return H::GetX('Codfin','Fortipfin','Nomext',$this->codfin);
  }

  public function getNomempeje()
  {
      return H::GetX('Codemp','Lidatstedet','Nomemp',$this->codempeje);
  }

  public function getNomcaradm()
  {
      return H::GetX('Codemp','Lidatstedet','Nomcar',$this->codempadm);
  }

  public function getNomcareje()
  {
      return H::GetX('Codemp','Lidatstedet','Nomcar',$this->codempeje);
  }

  public function getDesuniadm()
  {
      return H::GetX('Coduniste','Lidatste','Desuniste',$this->coduniadm);
  }

  public function getDesuniste()
  {
      return H::GetX('Coduniste','Lidatste','Desuniste',$this->coduniste);
  }

  public function getDirunieje()
  {
      return H::GetX('Coduniste','Lidatste','Dirste',$this->coduniste);
  }

  public function getPai()
  {
      $cod = H::GetX('Coduniste','Lidatste','Codpai',$this->coduniste);
      return H::GetX('Codpai','Ocpais','Nompai',$cod);
  }

  public function getEdo()
  {
      $cod = H::GetX('Coduniste','Lidatste','Codedo',$this->coduniste);
      return H::GetX('Codedo','Ocestado','Nomedo',$cod);
  }

  public function getMun()
  {
      $cod = H::GetX('Coduniste','Lidatste','Codmun',$this->coduniste);
      return H::GetX('Codmun','Ocmunici','Nommun',$cod);
  }

  public function getPar()
  {
      $cod = H::GetX('Coduniste','Lidatste','Codpar',$this->coduniste);
      return H::GetX('Codpar','Ocparroq','Nompar',$cod);
  }

  public function getSec()
  {
      $cod = H::GetX('Coduniste','Lidatste','Codsec',$this->coduniste);
      return H::GetX('Codsec','Ocsector','Nomsec',$cod);
  }

  public function getEnte()
  {
      $sql="select nomemp from Lidefemp";
      if(H::BuscarDatos($sql, $rs))
         return $rs[0]['nomemp'];
      else
         return '';
  }

  public function getDesclacomp()
  {
    return H::GetX('Codclacomp','Occlacomp','Desclacomp',$this->codclacomp);
  }

  public function getDesprio()
  {
    return H::GetX('Codprio','Lipriocon','Desprio',$this->codprio);
  }

  public function getMonpreletras()
  {
    return self::getMonpre()==0 ? '' : H::obtenermontoescrito(self::getMonpre());
  }
  
  public function getMonpreext()
  {
      if(self::getValcam()>0)
        return H::FormatoMonto(self::getMonpre()/self::getValcam());
      else
        return '';
  }

  public function getMonpreextletras()
  {
    return self::getMonpreext()==0 ? '' : H::obtenermontoescrito(H::FormatoNum(self::getMonpreext()));
  }

  public function getMonsube()
  {
      if(self::getValcam()>0)
        return H::FormatoMonto(self::getMonsub()/self::getValcam());
      else
        return '';
  }

  public function getMonrgoe()
  {
      if(self::getValcam()>0)
        return H::FormatoMonto(self::getMonrgo()/self::getValcam());
      else
        return '';
  }
  
  public function getCodpai()
  {
      $c = new Criteria();
      $c->add(OcsectorPeer::CODSEC,$this->codsec);
      $per = OcsectorPeer::doSelectOne($c);
      if($per)
         return $per->getCodpai(); 
      else
          return '';
  }
  
  public function getCodedo()
  {
      $c = new Criteria();
      $c->add(OcsectorPeer::CODSEC,$this->codsec);
      $per = OcsectorPeer::doSelectOne($c);
      if($per)
         return $per->getCodedo(); 
      else
          return '';
  }
  
  public function getCodmun()
  {
      $c = new Criteria();
      $c->add(OcsectorPeer::CODSEC,$this->codsec);
      $per = OcsectorPeer::doSelectOne($c);
      if($per)
         return $per->getCodmun(); 
      else
          return '';
  }
  
  public function getCodpar()
  {
      $c = new Criteria();
      $c->add(OcsectorPeer::CODSEC,$this->codsec);
      $per = OcsectorPeer::doSelectOne($c);
      if($per)
         return $per->getCodpar(); 
      else
          return '';
  }

}