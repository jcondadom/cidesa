<?php

/**
 * Subclase para representar una fila de la tabla 'liinspecciones'.
 *
 * Maestro de Inspecciones
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Liinspecciones extends BaseLiinspecciones
{

  public function getObjcontcat()
  {
    if($this->aLivaluaciones)
      return $this->aLivaluaciones->getLicontrat()->getObjcont();
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
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return H::GetX('Numexp','Liplieesp','Desclacomp',$this->aLivaluaciones->getLicontrat()->getNumexp());
      else return '';
    }

    public function getDestiplic()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return H::GetX('Numexp','Liplieesp','Destiplic',$this->aLivaluaciones->getLicontrat()->getNumexp());
      else return '';
    }

    public function getTipcom()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return H::GetX('Numexp','Liplieesp','Tipcom',$this->aLivaluaciones->getLicontrat()->getNumexp());
      else return '';
    }

    public function getRifpro()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getRifpro();
      else return '';
    }

    public function getNompro()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getNompro();
      else return '';
    }

    public function getNumptocuecon()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getNumptocuecon();
      else return '';
    }

    public function getResolu()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getResolu();
      else return '';
    }

    public function getFecrel()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getFecrel('d/m/Y');
      else return '';
    }
    //resolu, fecrel

    public function getNumexp()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getNumexp('d/m/Y');
      else return '';
    }

    public function getNumrecofe()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getNumrecofe();
      else return '';
    }
    //numrecofe, numexp

    public function getCodpro()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getCodpro();
      else return '';
    }
    //codpro


    public function getNomrepleg()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getNomrepleg();
      else return '';
    }
    //nomrepleg

    public function getDirpro()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getDirpro();
      else return '';
    }

    public function getNumofe()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getNumofe();
      else return '';
    }

    public function getFecofe()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getFecofe();
      else return '';
    }

    public function getMonofe()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getMonofe();
      else return '';
    }

    public function getMonofelet()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getMonofelet();
      else return '';
    }
    //dirpro, numofe, fecofe, monofe, monofelet

    public function getObjcont()
    {
      if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getObjcont();
      else return '';
    }



  public function getNumcont()
  {
    if(!$this->aLivaluaciones) $this->getLivaluaciones();

      if($this->aLivaluaciones) if($this->aLivaluaciones->getLicontrat()) return $this->aLivaluaciones->getLicontrat()->getNumcont();
      else return '';
  }



}
