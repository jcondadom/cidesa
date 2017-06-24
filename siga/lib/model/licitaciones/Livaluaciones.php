<?php

/**
 * Subclase para representar una fila de la tabla 'livaluaciones'.
 *
 * Detalle de partidas por contrato
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Livaluaciones extends BaseLivaluaciones
{
  protected $resolu = '';
  protected $aLiplieesp = null;

  public function getObjcontcat()
  {
    if($this->aLicontrat)
      return $this->aLicontrat->getObjcont();
    else return '';
  }

  public function getEjepre()
    {
      $sql="select to_char(fecini,'yyyy') as anofis from contaba";
      if(H::BuscarDatos($sql, $rs))
         return $rs[0]['anofis'];
      else
         return '';
    }

    public function getEnte()
    {
      $sql="select nomemp from Lidefemp";
      if(H::BuscarDatos($sql, $rs))
         return $rs[0]['nomemp'];
      else
         return '';
    }


    public function getNomempeje()
    {
      if(!$this->aLidatsteRelatedByCodempeje) $this->getLidatsteRelatedByCodempeje ();

      if($this->aLidatsteRelatedByCodempeje) return $this->aLidatsteRelatedByCodempeje->getNomemp();
      else return '';
    }

    public function getNomcareje()
    {
      if(!$this->aLidatsteRelatedByCodempeje) $this->getLidatsteRelatedByCodempeje ();

      if($this->aLidatsteRelatedByCodempeje) return $this->aLidatsteRelatedByCodempeje->getNomcar();
      else return '';
    }

    public function getDesuniste()
    {
      if(!$this->aLidatsteRelatedByCodempeje) $this->getLidatsteRelatedByCodempeje ();

      if($this->aLidatsteRelatedByCodempeje) return $this->aLidatsteRelatedByCodempeje->getDesuniste();
      else return '';

    }

    public function getNomempadm()
    {
      if(!$this->aLidatsteRelatedByCodempadm) $this->getLidatsteRelatedByCodempadm();

      if($this->aLidatsteRelatedByCodempadm) return $this->aLidatsteRelatedByCodempadm->getNomemp();
      else return '';
    }

    public function getNomcaradm()
    {
      if(!$this->aLidatsteRelatedByCodempadm) $this->getLidatsteRelatedByCodempadm();

      if($this->aLidatsteRelatedByCodempadm) return $this->aLidatsteRelatedByCodempadm->getNomcar();
      else return '';
    }

    public function getDesuniadm()
    {
      if(!$this->aLidatsteRelatedByCodempadm) $this->getLidatsteRelatedByCodempadm();

      if($this->aLidatsteRelatedByCodempadm) return $this->aLidatsteRelatedByCodempadm->getDesuniste();
      else return '';
    }

    public function getDesclacomp()
    {
      if(!$this->aLicontrat) $this->getLicontrat();

      if($this->aLicontrat) return H::GetX('Numexp','Liplieesp','Desclacomp',$this->aLicontrat->getNumexp());
      else return '';
    }

    public function getDestiplic()
    {
      if(!$this->aLicontrat) $this->getLicontrat();

      if($this->aLicontrat) return H::GetX('Numexp','Liplieesp','Destiplic',$this->aLicontrat->getNumexp());
      else return '';
    }

    public function getTipcom()
    {
      if(!$this->aLicontrat) $this->getLicontrat();

      if($this->aLicontrat) return H::GetX('Numexp','Liplieesp','Tipcom',$this->aLicontrat->getNumexp());
      else return '';
    }

    public function getRifpro()
    {
      if(!$this->aLicontrat) $this->getLicontrat ();

      if($this->aLicontrat) return $this->aLicontrat->getRifpro();
      else return '';
    }

    public function getNompro()
    {
      if(!$this->aLicontrat) $this->getLicontrat ();

      if($this->aLicontrat) return $this->aLicontrat->getNompro();
      else return '';
    }

    public function getNumptocuecon()
    {
      if(!$this->aLicontrat) $this->getLicontrat ();

      if($this->aLicontrat) return $this->aLicontrat->getNumptocuecon();
      else return '';
    }

    public function getResolu()
    {
      if(!$this->aLicontrat) $this->getLicontrat ();

      if($this->aLicontrat) return $this->aLicontrat->getResolu();
      else return '';
    }

    public function getFecrel()
    {
      if(!$this->aLicontrat) $this->getLicontrat ();

      if($this->aLicontrat) return $this->aLicontrat->getFecrel('d/m/Y');
      else return '';
    }
    //resolu, fecrel

    public function getNumexp()
    {
      if(!$this->aLicontrat) $this->getLicontrat ();

      if($this->aLicontrat) return $this->aLicontrat->getNumexp('d/m/Y');
      else return '';
    }

    public function getNumrecofe()
    {
      if(!$this->aLicontrat) $this->getLicontrat ();

      if($this->aLicontrat) return $this->aLicontrat->getNumrecofe();
      else return '';
    }
    //numrecofe, numexp

    public function getCodpro()
    {
      if(!$this->aLicontrat) $this->getLicontrat ();

      if($this->aLicontrat) return $this->aLicontrat->getCodpro();
      else return '';
    }
    //codpro


    public function getNomrepleg()
    {
      if(!$this->aLicontrat) $this->getLicontrat ();

      if($this->aLicontrat) return $this->aLicontrat->getNomrepleg();
      else return '';
    }
    //nomrepleg

    public function getDirpro()
    {
      if(!$this->aLicontrat) $this->getLicontrat ();

      if($this->aLicontrat) return $this->aLicontrat->getDirpro();
      else return '';
    }

    public function getNumofe()
    {
      if(!$this->aLicontrat) $this->getLicontrat ();

      if($this->aLicontrat) return $this->aLicontrat->getNumofe();
      else return '';
    }

    public function getFecofe()
    {
      if(!$this->aLicontrat) $this->getLicontrat ();

      if($this->aLicontrat) return $this->aLicontrat->getFecofe();
      else return '';
    }

    public function getMonofe()
    {
      if(!$this->aLicontrat) $this->getLicontrat ();

      if($this->aLicontrat) return $this->aLicontrat->getMonofe();
      else return '';
    }

    public function getMonofelet()
    {
      if(!$this->aLicontrat) $this->getLicontrat ();

      if($this->aLicontrat) return $this->aLicontrat->getMonofelet();
      else return '';
    }
    //dirpro, numofe, fecofe, monofe, monofelet

    public function getObjcont()
    {
      if(!$this->aLicontrat) $this->getLicontrat ();

      if($this->aLicontrat) return $this->aLicontrat->getObjcont();
      else return '';
    }
    //objcont

}
