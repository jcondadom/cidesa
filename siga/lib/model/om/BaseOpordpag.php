<?php


abstract class BaseOpordpag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numord;


	
	protected $tipcau;


	
	protected $fecemi;


	
	protected $cedrif;


	
	protected $nomben;


	
	protected $monord;


	
	protected $desord;


	
	protected $mondes;


	
	protected $monret;


	
	protected $numche;


	
	protected $ctaban;


	
	protected $ctapag;


	
	protected $numcom;


	
	protected $status;


	
	protected $coduni;


	
	protected $fecenvcon;


	
	protected $fecenvfin;


	
	protected $ctapagfin;


	
	protected $obsord;


	
	protected $fecven;


	
	protected $fecanu;


	
	protected $desanu;


	
	protected $monpag;


	
	protected $aproba;


	
	protected $nombensus;


	
	protected $fecrecfin;


	
	protected $anopre;


	
	protected $fecpag;


	
	protected $numtiq;


	
	protected $peraut;


	
	protected $cedaut;


	
	protected $nomper2;


	
	protected $nomper1;


	
	protected $horcon;


	
	protected $feccon;


	
	protected $nomcat;


	
	protected $numfac;


	
	protected $numconfac;


	
	protected $numcorfac;


	
	protected $fechafac;


	
	protected $fecfac;


	
	protected $tipfin;


	
	protected $comret;


	
	protected $feccomret;


	
	protected $comretislr;


	
	protected $feccomretislr;


	
	protected $comretltf;


	
	protected $feccomretltf;


	
	protected $comretfiel;


	
	protected $feccomretfiel;


	
	protected $comretlab;


	
	protected $feccomretlab;


	
	protected $numsigecof;


	
	protected $fecsigecof;


	
	protected $expsigecof;


	
	protected $aprobadoord;


	
	protected $codmotanu;


	
	protected $usuanu;


	
	protected $aprobadotes;


	
	protected $fecret;


	
	protected $numcue;


	
	protected $numcomapr;


	
	protected $codconcepto;


	
	protected $numforpre;


	
	protected $motrecord;


	
	protected $motrectes;


	
	protected $aprorddir;


	
	protected $codcajchi;


	
	protected $numcta;


	
	protected $tipdoc;


	
	protected $loguse;


	
	protected $codfonant;


	
	protected $amortiza;


	
	protected $codmon;


	
	protected $valmon;


	
	protected $ordsnc;


	
	protected $codsnc;


	
	protected $fecini;


	
	protected $fecfin;


	
	protected $medcom;


	
	protected $modcon;


	
	protected $lugeje;


	
	protected $numcon;


	
	protected $mescon;


	
	protected $staele;


	
	protected $codtde;


	
	protected $codadi;


	
	protected $numordamo;


	
	protected $codrgo;


	
	protected $monrgo;


	
	protected $codpro;


	
	protected $coddirec;


	
	protected $refava;


	
	protected $fecava;


	
	protected $nompacava;


	
	protected $cedpacava;


	
	protected $motsolava;


	
	protected $moncarava;


	
	protected $usuaprord;


	
	protected $fecaprord;


	
	protected $usuaprdir;


	
	protected $fecaprdir;


	
	protected $usuaprtes;


	
	protected $fecaprtes;


	
	protected $aprproord;


	
	protected $usuaprpro;


	
	protected $fecaprpro;


	
	protected $obspropag;


	
	protected $numval;


	
	protected $id;

	
	protected $aOpbenefi;

	
	protected $aTsdefmon;

	
	protected $collOpdetsolpags;

	
	protected $lastOpdetsolpagCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getTipcau()
  {

    return trim($this->tipcau);

  }
  
  public function getFecemi($format = 'Y-m-d')
  {

    if ($this->fecemi === null || $this->fecemi === '') {
      return null;
    } elseif (!is_int($this->fecemi)) {
            $ts = adodb_strtotime($this->fecemi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecemi] as date/time value: " . var_export($this->fecemi, true));
      }
    } else {
      $ts = $this->fecemi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getNomben()
  {

    return trim($this->nomben);

  }
  
  public function getMonord($val=false)
  {

    if($val) return number_format($this->monord,2,',','.');
    else return $this->monord;

  }
  
  public function getDesord()
  {

    return trim($this->desord);

  }
  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getMonret($val=false)
  {

    if($val) return number_format($this->monret,2,',','.');
    else return $this->monret;

  }
  
  public function getNumche()
  {

    return trim($this->numche);

  }
  
  public function getCtaban()
  {

    return trim($this->ctaban);

  }
  
  public function getCtapag()
  {

    return trim($this->ctapag);

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getCoduni()
  {

    return trim($this->coduni);

  }
  
  public function getFecenvcon($format = 'Y-m-d')
  {

    if ($this->fecenvcon === null || $this->fecenvcon === '') {
      return null;
    } elseif (!is_int($this->fecenvcon)) {
            $ts = adodb_strtotime($this->fecenvcon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecenvcon] as date/time value: " . var_export($this->fecenvcon, true));
      }
    } else {
      $ts = $this->fecenvcon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecenvfin($format = 'Y-m-d')
  {

    if ($this->fecenvfin === null || $this->fecenvfin === '') {
      return null;
    } elseif (!is_int($this->fecenvfin)) {
            $ts = adodb_strtotime($this->fecenvfin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecenvfin] as date/time value: " . var_export($this->fecenvfin, true));
      }
    } else {
      $ts = $this->fecenvfin;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCtapagfin()
  {

    return trim($this->ctapagfin);

  }
  
  public function getObsord()
  {

    return trim($this->obsord);

  }
  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getAproba()
  {

    return trim($this->aproba);

  }
  
  public function getNombensus()
  {

    return trim($this->nombensus);

  }
  
  public function getFecrecfin($format = 'Y-m-d')
  {

    if ($this->fecrecfin === null || $this->fecrecfin === '') {
      return null;
    } elseif (!is_int($this->fecrecfin)) {
            $ts = adodb_strtotime($this->fecrecfin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrecfin] as date/time value: " . var_export($this->fecrecfin, true));
      }
    } else {
      $ts = $this->fecrecfin;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnopre()
  {

    return trim($this->anopre);

  }
  
  public function getFecpag($format = 'Y-m-d')
  {

    if ($this->fecpag === null || $this->fecpag === '') {
      return null;
    } elseif (!is_int($this->fecpag)) {
            $ts = adodb_strtotime($this->fecpag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpag] as date/time value: " . var_export($this->fecpag, true));
      }
    } else {
      $ts = $this->fecpag;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumtiq()
  {

    return trim($this->numtiq);

  }
  
  public function getPeraut()
  {

    return trim($this->peraut);

  }
  
  public function getCedaut()
  {

    return trim($this->cedaut);

  }
  
  public function getNomper2()
  {

    return trim($this->nomper2);

  }
  
  public function getNomper1()
  {

    return trim($this->nomper1);

  }
  
  public function getHorcon()
  {

    return trim($this->horcon);

  }
  
  public function getFeccon($format = 'Y-m-d')
  {

    if ($this->feccon === null || $this->feccon === '') {
      return null;
    } elseif (!is_int($this->feccon)) {
            $ts = adodb_strtotime($this->feccon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccon] as date/time value: " . var_export($this->feccon, true));
      }
    } else {
      $ts = $this->feccon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNomcat()
  {

    return trim($this->nomcat);

  }
  
  public function getNumfac()
  {

    return trim($this->numfac);

  }
  
  public function getNumconfac()
  {

    return trim($this->numconfac);

  }
  
  public function getNumcorfac()
  {

    return trim($this->numcorfac);

  }
  
  public function getFechafac($format = 'Y-m-d')
  {

    if ($this->fechafac === null || $this->fechafac === '') {
      return null;
    } elseif (!is_int($this->fechafac)) {
            $ts = adodb_strtotime($this->fechafac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechafac] as date/time value: " . var_export($this->fechafac, true));
      }
    } else {
      $ts = $this->fechafac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecfac($format = 'Y-m-d')
  {

    if ($this->fecfac === null || $this->fecfac === '') {
      return null;
    } elseif (!is_int($this->fecfac)) {
            $ts = adodb_strtotime($this->fecfac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfac] as date/time value: " . var_export($this->fecfac, true));
      }
    } else {
      $ts = $this->fecfac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTipfin()
  {

    return trim($this->tipfin);

  }
  
  public function getComret()
  {

    return trim($this->comret);

  }
  
  public function getFeccomret($format = 'Y-m-d')
  {

    if ($this->feccomret === null || $this->feccomret === '') {
      return null;
    } elseif (!is_int($this->feccomret)) {
            $ts = adodb_strtotime($this->feccomret);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccomret] as date/time value: " . var_export($this->feccomret, true));
      }
    } else {
      $ts = $this->feccomret;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getComretislr()
  {

    return trim($this->comretislr);

  }
  
  public function getFeccomretislr($format = 'Y-m-d')
  {

    if ($this->feccomretislr === null || $this->feccomretislr === '') {
      return null;
    } elseif (!is_int($this->feccomretislr)) {
            $ts = adodb_strtotime($this->feccomretislr);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccomretislr] as date/time value: " . var_export($this->feccomretislr, true));
      }
    } else {
      $ts = $this->feccomretislr;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getComretltf()
  {

    return trim($this->comretltf);

  }
  
  public function getFeccomretltf($format = 'Y-m-d')
  {

    if ($this->feccomretltf === null || $this->feccomretltf === '') {
      return null;
    } elseif (!is_int($this->feccomretltf)) {
            $ts = adodb_strtotime($this->feccomretltf);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccomretltf] as date/time value: " . var_export($this->feccomretltf, true));
      }
    } else {
      $ts = $this->feccomretltf;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getComretfiel()
  {

    return trim($this->comretfiel);

  }
  
  public function getFeccomretfiel($format = 'Y-m-d')
  {

    if ($this->feccomretfiel === null || $this->feccomretfiel === '') {
      return null;
    } elseif (!is_int($this->feccomretfiel)) {
            $ts = adodb_strtotime($this->feccomretfiel);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccomretfiel] as date/time value: " . var_export($this->feccomretfiel, true));
      }
    } else {
      $ts = $this->feccomretfiel;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getComretlab()
  {

    return trim($this->comretlab);

  }
  
  public function getFeccomretlab($format = 'Y-m-d')
  {

    if ($this->feccomretlab === null || $this->feccomretlab === '') {
      return null;
    } elseif (!is_int($this->feccomretlab)) {
            $ts = adodb_strtotime($this->feccomretlab);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccomretlab] as date/time value: " . var_export($this->feccomretlab, true));
      }
    } else {
      $ts = $this->feccomretlab;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumsigecof()
  {

    return trim($this->numsigecof);

  }
  
  public function getFecsigecof($format = 'Y-m-d')
  {

    if ($this->fecsigecof === null || $this->fecsigecof === '') {
      return null;
    } elseif (!is_int($this->fecsigecof)) {
            $ts = adodb_strtotime($this->fecsigecof);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsigecof] as date/time value: " . var_export($this->fecsigecof, true));
      }
    } else {
      $ts = $this->fecsigecof;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getExpsigecof()
  {

    return trim($this->expsigecof);

  }
  
  public function getAprobadoord()
  {

    return trim($this->aprobadoord);

  }
  
  public function getCodmotanu()
  {

    return trim($this->codmotanu);

  }
  
  public function getUsuanu()
  {

    return trim($this->usuanu);

  }
  
  public function getAprobadotes()
  {

    return trim($this->aprobadotes);

  }
  
  public function getFecret($format = 'Y-m-d')
  {

    if ($this->fecret === null || $this->fecret === '') {
      return null;
    } elseif (!is_int($this->fecret)) {
            $ts = adodb_strtotime($this->fecret);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecret] as date/time value: " . var_export($this->fecret, true));
      }
    } else {
      $ts = $this->fecret;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getNumcomapr()
  {

    return trim($this->numcomapr);

  }
  
  public function getCodconcepto()
  {

    return trim($this->codconcepto);

  }
  
  public function getNumforpre()
  {

    return trim($this->numforpre);

  }
  
  public function getMotrecord()
  {

    return trim($this->motrecord);

  }
  
  public function getMotrectes()
  {

    return trim($this->motrectes);

  }
  
  public function getAprorddir()
  {

    return trim($this->aprorddir);

  }
  
  public function getCodcajchi()
  {

    return trim($this->codcajchi);

  }
  
  public function getNumcta()
  {

    return trim($this->numcta);

  }
  
  public function getTipdoc()
  {

    return trim($this->tipdoc);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getCodfonant()
  {

    return trim($this->codfonant);

  }
  
  public function getAmortiza($val=false)
  {

    if($val) return number_format($this->amortiza,2,',','.');
    else return $this->amortiza;

  }
  
  public function getCodmon()
  {

    return trim($this->codmon);

  }
  
  public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,2,',','.');
    else return $this->valmon;

  }
  
  public function getOrdsnc()
  {

    return trim($this->ordsnc);

  }
  
  public function getCodsnc()
  {

    return trim($this->codsnc);

  }
  
  public function getFecini($format = 'Y-m-d')
  {

    if ($this->fecini === null || $this->fecini === '') {
      return null;
    } elseif (!is_int($this->fecini)) {
            $ts = adodb_strtotime($this->fecini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
      }
    } else {
      $ts = $this->fecini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecfin($format = 'Y-m-d')
  {

    if ($this->fecfin === null || $this->fecfin === '') {
      return null;
    } elseif (!is_int($this->fecfin)) {
            $ts = adodb_strtotime($this->fecfin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfin] as date/time value: " . var_export($this->fecfin, true));
      }
    } else {
      $ts = $this->fecfin;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMedcom()
  {

    return trim($this->medcom);

  }
  
  public function getModcon()
  {

    return trim($this->modcon);

  }
  
  public function getLugeje()
  {

    return trim($this->lugeje);

  }
  
  public function getNumcon()
  {

    return trim($this->numcon);

  }
  
  public function getMescon()
  {

    return trim($this->mescon);

  }
  
  public function getStaele()
  {

    return trim($this->staele);

  }
  
  public function getCodtde()
  {

    return trim($this->codtde);

  }
  
  public function getCodadi()
  {

    return trim($this->codadi);

  }
  
  public function getNumordamo()
  {

    return trim($this->numordamo);

  }
  
  public function getCodrgo()
  {

    return trim($this->codrgo);

  }
  
  public function getMonrgo($val=false)
  {

    if($val) return number_format($this->monrgo,2,',','.');
    else return $this->monrgo;

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getRefava()
  {

    return trim($this->refava);

  }
  
  public function getFecava($format = 'Y-m-d')
  {

    if ($this->fecava === null || $this->fecava === '') {
      return null;
    } elseif (!is_int($this->fecava)) {
            $ts = adodb_strtotime($this->fecava);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecava] as date/time value: " . var_export($this->fecava, true));
      }
    } else {
      $ts = $this->fecava;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNompacava()
  {

    return trim($this->nompacava);

  }
  
  public function getCedpacava()
  {

    return trim($this->cedpacava);

  }
  
  public function getMotsolava()
  {

    return trim($this->motsolava);

  }
  
  public function getMoncarava($val=false)
  {

    if($val) return number_format($this->moncarava,2,',','.');
    else return $this->moncarava;

  }
  
  public function getUsuaprord()
  {

    return trim($this->usuaprord);

  }
  
  public function getFecaprord($format = 'Y-m-d')
  {

    if ($this->fecaprord === null || $this->fecaprord === '') {
      return null;
    } elseif (!is_int($this->fecaprord)) {
            $ts = adodb_strtotime($this->fecaprord);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaprord] as date/time value: " . var_export($this->fecaprord, true));
      }
    } else {
      $ts = $this->fecaprord;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUsuaprdir()
  {

    return trim($this->usuaprdir);

  }
  
  public function getFecaprdir($format = 'Y-m-d')
  {

    if ($this->fecaprdir === null || $this->fecaprdir === '') {
      return null;
    } elseif (!is_int($this->fecaprdir)) {
            $ts = adodb_strtotime($this->fecaprdir);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaprdir] as date/time value: " . var_export($this->fecaprdir, true));
      }
    } else {
      $ts = $this->fecaprdir;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUsuaprtes()
  {

    return trim($this->usuaprtes);

  }
  
  public function getFecaprtes($format = 'Y-m-d')
  {

    if ($this->fecaprtes === null || $this->fecaprtes === '') {
      return null;
    } elseif (!is_int($this->fecaprtes)) {
            $ts = adodb_strtotime($this->fecaprtes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaprtes] as date/time value: " . var_export($this->fecaprtes, true));
      }
    } else {
      $ts = $this->fecaprtes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAprproord()
  {

    return trim($this->aprproord);

  }
  
  public function getUsuaprpro()
  {

    return trim($this->usuaprpro);

  }
  
  public function getFecaprpro($format = 'Y-m-d')
  {

    if ($this->fecaprpro === null || $this->fecaprpro === '') {
      return null;
    } elseif (!is_int($this->fecaprpro)) {
            $ts = adodb_strtotime($this->fecaprpro);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaprpro] as date/time value: " . var_export($this->fecaprpro, true));
      }
    } else {
      $ts = $this->fecaprpro;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getObspropag()
  {

    return trim($this->obspropag);

  }
  
  public function getNumval()
  {

    return trim($this->numval);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMORD;
      }
  
	} 
	
	public function setTipcau($v)
	{

    if ($this->tipcau !== $v) {
        $this->tipcau = $v;
        $this->modifiedColumns[] = OpordpagPeer::TIPCAU;
      }
  
	} 
	
	public function setFecemi($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecemi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecemi !== $ts) {
      $this->fecemi = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECEMI;
    }

	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = OpordpagPeer::CEDRIF;
      }
  
		if ($this->aOpbenefi !== null && $this->aOpbenefi->getCedrif() !== $v) {
			$this->aOpbenefi = null;
		}

	} 
	
	public function setNomben($v)
	{

    if ($this->nomben !== $v) {
        $this->nomben = $v;
        $this->modifiedColumns[] = OpordpagPeer::NOMBEN;
      }
  
	} 
	
	public function setMonord($v)
	{

    if ($this->monord !== $v) {
        $this->monord = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpordpagPeer::MONORD;
      }
  
	} 
	
	public function setDesord($v)
	{

    if ($this->desord !== $v) {
        $this->desord = $v;
        $this->modifiedColumns[] = OpordpagPeer::DESORD;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpordpagPeer::MONDES;
      }
  
	} 
	
	public function setMonret($v)
	{

    if ($this->monret !== $v) {
        $this->monret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpordpagPeer::MONRET;
      }
  
	} 
	
	public function setNumche($v)
	{

    if ($this->numche !== $v) {
        $this->numche = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMCHE;
      }
  
	} 
	
	public function setCtaban($v)
	{

    if ($this->ctaban !== $v) {
        $this->ctaban = $v;
        $this->modifiedColumns[] = OpordpagPeer::CTABAN;
      }
  
	} 
	
	public function setCtapag($v)
	{

    if ($this->ctapag !== $v) {
        $this->ctapag = $v;
        $this->modifiedColumns[] = OpordpagPeer::CTAPAG;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMCOM;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = OpordpagPeer::STATUS;
      }
  
	} 
	
	public function setCoduni($v)
	{

    if ($this->coduni !== $v) {
        $this->coduni = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODUNI;
      }
  
	} 
	
	public function setFecenvcon($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecenvcon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecenvcon !== $ts) {
      $this->fecenvcon = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECENVCON;
    }

	} 
	
	public function setFecenvfin($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecenvfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecenvfin !== $ts) {
      $this->fecenvfin = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECENVFIN;
    }

	} 
	
	public function setCtapagfin($v)
	{

    if ($this->ctapagfin !== $v) {
        $this->ctapagfin = $v;
        $this->modifiedColumns[] = OpordpagPeer::CTAPAGFIN;
      }
  
	} 
	
	public function setObsord($v)
	{

    if ($this->obsord !== $v) {
        $this->obsord = $v;
        $this->modifiedColumns[] = OpordpagPeer::OBSORD;
      }
  
	} 
	
	public function setFecven($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECVEN;
    }

	} 
	
	public function setFecanu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECANU;
    }

	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = OpordpagPeer::DESANU;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpordpagPeer::MONPAG;
      }
  
	} 
	
	public function setAproba($v)
	{

    if ($this->aproba !== $v) {
        $this->aproba = $v;
        $this->modifiedColumns[] = OpordpagPeer::APROBA;
      }
  
	} 
	
	public function setNombensus($v)
	{

    if ($this->nombensus !== $v) {
        $this->nombensus = $v;
        $this->modifiedColumns[] = OpordpagPeer::NOMBENSUS;
      }
  
	} 
	
	public function setFecrecfin($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrecfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrecfin !== $ts) {
      $this->fecrecfin = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECRECFIN;
    }

	} 
	
	public function setAnopre($v)
	{

    if ($this->anopre !== $v) {
        $this->anopre = $v;
        $this->modifiedColumns[] = OpordpagPeer::ANOPRE;
      }
  
	} 
	
	public function setFecpag($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpag !== $ts) {
      $this->fecpag = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECPAG;
    }

	} 
	
	public function setNumtiq($v)
	{

    if ($this->numtiq !== $v) {
        $this->numtiq = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMTIQ;
      }
  
	} 
	
	public function setPeraut($v)
	{

    if ($this->peraut !== $v) {
        $this->peraut = $v;
        $this->modifiedColumns[] = OpordpagPeer::PERAUT;
      }
  
	} 
	
	public function setCedaut($v)
	{

    if ($this->cedaut !== $v) {
        $this->cedaut = $v;
        $this->modifiedColumns[] = OpordpagPeer::CEDAUT;
      }
  
	} 
	
	public function setNomper2($v)
	{

    if ($this->nomper2 !== $v) {
        $this->nomper2 = $v;
        $this->modifiedColumns[] = OpordpagPeer::NOMPER2;
      }
  
	} 
	
	public function setNomper1($v)
	{

    if ($this->nomper1 !== $v) {
        $this->nomper1 = $v;
        $this->modifiedColumns[] = OpordpagPeer::NOMPER1;
      }
  
	} 
	
	public function setHorcon($v)
	{

    if ($this->horcon !== $v) {
        $this->horcon = $v;
        $this->modifiedColumns[] = OpordpagPeer::HORCON;
      }
  
	} 
	
	public function setFeccon($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccon !== $ts) {
      $this->feccon = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECCON;
    }

	} 
	
	public function setNomcat($v)
	{

    if ($this->nomcat !== $v) {
        $this->nomcat = $v;
        $this->modifiedColumns[] = OpordpagPeer::NOMCAT;
      }
  
	} 
	
	public function setNumfac($v)
	{

    if ($this->numfac !== $v) {
        $this->numfac = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMFAC;
      }
  
	} 
	
	public function setNumconfac($v)
	{

    if ($this->numconfac !== $v) {
        $this->numconfac = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMCONFAC;
      }
  
	} 
	
	public function setNumcorfac($v)
	{

    if ($this->numcorfac !== $v) {
        $this->numcorfac = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMCORFAC;
      }
  
	} 
	
	public function setFechafac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechafac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechafac !== $ts) {
      $this->fechafac = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECHAFAC;
    }

	} 
	
	public function setFecfac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfac !== $ts) {
      $this->fecfac = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECFAC;
    }

	} 
	
	public function setTipfin($v)
	{

    if ($this->tipfin !== $v) {
        $this->tipfin = $v;
        $this->modifiedColumns[] = OpordpagPeer::TIPFIN;
      }
  
	} 
	
	public function setComret($v)
	{

    if ($this->comret !== $v) {
        $this->comret = $v;
        $this->modifiedColumns[] = OpordpagPeer::COMRET;
      }
  
	} 
	
	public function setFeccomret($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccomret] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccomret !== $ts) {
      $this->feccomret = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECCOMRET;
    }

	} 
	
	public function setComretislr($v)
	{

    if ($this->comretislr !== $v) {
        $this->comretislr = $v;
        $this->modifiedColumns[] = OpordpagPeer::COMRETISLR;
      }
  
	} 
	
	public function setFeccomretislr($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccomretislr] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccomretislr !== $ts) {
      $this->feccomretislr = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECCOMRETISLR;
    }

	} 
	
	public function setComretltf($v)
	{

    if ($this->comretltf !== $v) {
        $this->comretltf = $v;
        $this->modifiedColumns[] = OpordpagPeer::COMRETLTF;
      }
  
	} 
	
	public function setFeccomretltf($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccomretltf] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccomretltf !== $ts) {
      $this->feccomretltf = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECCOMRETLTF;
    }

	} 
	
	public function setComretfiel($v)
	{

    if ($this->comretfiel !== $v) {
        $this->comretfiel = $v;
        $this->modifiedColumns[] = OpordpagPeer::COMRETFIEL;
      }
  
	} 
	
	public function setFeccomretfiel($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccomretfiel] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccomretfiel !== $ts) {
      $this->feccomretfiel = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECCOMRETFIEL;
    }

	} 
	
	public function setComretlab($v)
	{

    if ($this->comretlab !== $v) {
        $this->comretlab = $v;
        $this->modifiedColumns[] = OpordpagPeer::COMRETLAB;
      }
  
	} 
	
	public function setFeccomretlab($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccomretlab] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccomretlab !== $ts) {
      $this->feccomretlab = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECCOMRETLAB;
    }

	} 
	
	public function setNumsigecof($v)
	{

    if ($this->numsigecof !== $v) {
        $this->numsigecof = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMSIGECOF;
      }
  
	} 
	
	public function setFecsigecof($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsigecof] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsigecof !== $ts) {
      $this->fecsigecof = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECSIGECOF;
    }

	} 
	
	public function setExpsigecof($v)
	{

    if ($this->expsigecof !== $v) {
        $this->expsigecof = $v;
        $this->modifiedColumns[] = OpordpagPeer::EXPSIGECOF;
      }
  
	} 
	
	public function setAprobadoord($v)
	{

    if ($this->aprobadoord !== $v) {
        $this->aprobadoord = $v;
        $this->modifiedColumns[] = OpordpagPeer::APROBADOORD;
      }
  
	} 
	
	public function setCodmotanu($v)
	{

    if ($this->codmotanu !== $v) {
        $this->codmotanu = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODMOTANU;
      }
  
	} 
	
	public function setUsuanu($v)
	{

    if ($this->usuanu !== $v) {
        $this->usuanu = $v;
        $this->modifiedColumns[] = OpordpagPeer::USUANU;
      }
  
	} 
	
	public function setAprobadotes($v)
	{

    if ($this->aprobadotes !== $v) {
        $this->aprobadotes = $v;
        $this->modifiedColumns[] = OpordpagPeer::APROBADOTES;
      }
  
	} 
	
	public function setFecret($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecret] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecret !== $ts) {
      $this->fecret = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECRET;
    }

	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMCUE;
      }
  
	} 
	
	public function setNumcomapr($v)
	{

    if ($this->numcomapr !== $v) {
        $this->numcomapr = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMCOMAPR;
      }
  
	} 
	
	public function setCodconcepto($v)
	{

    if ($this->codconcepto !== $v) {
        $this->codconcepto = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODCONCEPTO;
      }
  
	} 
	
	public function setNumforpre($v)
	{

    if ($this->numforpre !== $v) {
        $this->numforpre = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMFORPRE;
      }
  
	} 
	
	public function setMotrecord($v)
	{

    if ($this->motrecord !== $v) {
        $this->motrecord = $v;
        $this->modifiedColumns[] = OpordpagPeer::MOTRECORD;
      }
  
	} 
	
	public function setMotrectes($v)
	{

    if ($this->motrectes !== $v) {
        $this->motrectes = $v;
        $this->modifiedColumns[] = OpordpagPeer::MOTRECTES;
      }
  
	} 
	
	public function setAprorddir($v)
	{

    if ($this->aprorddir !== $v) {
        $this->aprorddir = $v;
        $this->modifiedColumns[] = OpordpagPeer::APRORDDIR;
      }
  
	} 
	
	public function setCodcajchi($v)
	{

    if ($this->codcajchi !== $v) {
        $this->codcajchi = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODCAJCHI;
      }
  
	} 
	
	public function setNumcta($v)
	{

    if ($this->numcta !== $v) {
        $this->numcta = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMCTA;
      }
  
	} 
	
	public function setTipdoc($v)
	{

    if ($this->tipdoc !== $v) {
        $this->tipdoc = $v;
        $this->modifiedColumns[] = OpordpagPeer::TIPDOC;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = OpordpagPeer::LOGUSE;
      }
  
	} 
	
	public function setCodfonant($v)
	{

    if ($this->codfonant !== $v) {
        $this->codfonant = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODFONANT;
      }
  
	} 
	
	public function setAmortiza($v)
	{

    if ($this->amortiza !== $v) {
        $this->amortiza = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpordpagPeer::AMORTIZA;
      }
  
	} 
	
	public function setCodmon($v)
	{

    if ($this->codmon !== $v) {
        $this->codmon = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODMON;
      }
  
		if ($this->aTsdefmon !== null && $this->aTsdefmon->getCodmon() !== $v) {
			$this->aTsdefmon = null;
		}

	} 
	
	public function setValmon($v)
	{

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpordpagPeer::VALMON;
      }
  
	} 
	
	public function setOrdsnc($v)
	{

    if ($this->ordsnc !== $v) {
        $this->ordsnc = $v;
        $this->modifiedColumns[] = OpordpagPeer::ORDSNC;
      }
  
	} 
	
	public function setCodsnc($v)
	{

    if ($this->codsnc !== $v) {
        $this->codsnc = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODSNC;
      }
  
	} 
	
	public function setFecini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECINI;
    }

	} 
	
	public function setFecfin($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfin !== $ts) {
      $this->fecfin = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECFIN;
    }

	} 
	
	public function setMedcom($v)
	{

    if ($this->medcom !== $v) {
        $this->medcom = $v;
        $this->modifiedColumns[] = OpordpagPeer::MEDCOM;
      }
  
	} 
	
	public function setModcon($v)
	{

    if ($this->modcon !== $v) {
        $this->modcon = $v;
        $this->modifiedColumns[] = OpordpagPeer::MODCON;
      }
  
	} 
	
	public function setLugeje($v)
	{

    if ($this->lugeje !== $v) {
        $this->lugeje = $v;
        $this->modifiedColumns[] = OpordpagPeer::LUGEJE;
      }
  
	} 
	
	public function setNumcon($v)
	{

    if ($this->numcon !== $v) {
        $this->numcon = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMCON;
      }
  
	} 
	
	public function setMescon($v)
	{

    if ($this->mescon !== $v) {
        $this->mescon = $v;
        $this->modifiedColumns[] = OpordpagPeer::MESCON;
      }
  
	} 
	
	public function setStaele($v)
	{

    if ($this->staele !== $v) {
        $this->staele = $v;
        $this->modifiedColumns[] = OpordpagPeer::STAELE;
      }
  
	} 
	
	public function setCodtde($v)
	{

    if ($this->codtde !== $v) {
        $this->codtde = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODTDE;
      }
  
	} 
	
	public function setCodadi($v)
	{

    if ($this->codadi !== $v) {
        $this->codadi = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODADI;
      }
  
	} 
	
	public function setNumordamo($v)
	{

    if ($this->numordamo !== $v) {
        $this->numordamo = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMORDAMO;
      }
  
	} 
	
	public function setCodrgo($v)
	{

    if ($this->codrgo !== $v) {
        $this->codrgo = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODRGO;
      }
  
	} 
	
	public function setMonrgo($v)
	{

    if ($this->monrgo !== $v) {
        $this->monrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpordpagPeer::MONRGO;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODPRO;
      }
  
	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = OpordpagPeer::CODDIREC;
      }
  
	} 
	
	public function setRefava($v)
	{

    if ($this->refava !== $v) {
        $this->refava = $v;
        $this->modifiedColumns[] = OpordpagPeer::REFAVA;
      }
  
	} 
	
	public function setFecava($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecava] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecava !== $ts) {
      $this->fecava = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECAVA;
    }

	} 
	
	public function setNompacava($v)
	{

    if ($this->nompacava !== $v) {
        $this->nompacava = $v;
        $this->modifiedColumns[] = OpordpagPeer::NOMPACAVA;
      }
  
	} 
	
	public function setCedpacava($v)
	{

    if ($this->cedpacava !== $v) {
        $this->cedpacava = $v;
        $this->modifiedColumns[] = OpordpagPeer::CEDPACAVA;
      }
  
	} 
	
	public function setMotsolava($v)
	{

    if ($this->motsolava !== $v) {
        $this->motsolava = $v;
        $this->modifiedColumns[] = OpordpagPeer::MOTSOLAVA;
      }
  
	} 
	
	public function setMoncarava($v)
	{

    if ($this->moncarava !== $v) {
        $this->moncarava = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpordpagPeer::MONCARAVA;
      }
  
	} 
	
	public function setUsuaprord($v)
	{

    if ($this->usuaprord !== $v) {
        $this->usuaprord = $v;
        $this->modifiedColumns[] = OpordpagPeer::USUAPRORD;
      }
  
	} 
	
	public function setFecaprord($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaprord] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaprord !== $ts) {
      $this->fecaprord = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECAPRORD;
    }

	} 
	
	public function setUsuaprdir($v)
	{

    if ($this->usuaprdir !== $v) {
        $this->usuaprdir = $v;
        $this->modifiedColumns[] = OpordpagPeer::USUAPRDIR;
      }
  
	} 
	
	public function setFecaprdir($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaprdir] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaprdir !== $ts) {
      $this->fecaprdir = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECAPRDIR;
    }

	} 
	
	public function setUsuaprtes($v)
	{

    if ($this->usuaprtes !== $v) {
        $this->usuaprtes = $v;
        $this->modifiedColumns[] = OpordpagPeer::USUAPRTES;
      }
  
	} 
	
	public function setFecaprtes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaprtes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaprtes !== $ts) {
      $this->fecaprtes = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECAPRTES;
    }

	} 
	
	public function setAprproord($v)
	{

    if ($this->aprproord !== $v) {
        $this->aprproord = $v;
        $this->modifiedColumns[] = OpordpagPeer::APRPROORD;
      }
  
	} 
	
	public function setUsuaprpro($v)
	{

    if ($this->usuaprpro !== $v) {
        $this->usuaprpro = $v;
        $this->modifiedColumns[] = OpordpagPeer::USUAPRPRO;
      }
  
	} 
	
	public function setFecaprpro($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaprpro] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaprpro !== $ts) {
      $this->fecaprpro = $ts;
      $this->modifiedColumns[] = OpordpagPeer::FECAPRPRO;
    }

	} 
	
	public function setObspropag($v)
	{

    if ($this->obspropag !== $v) {
        $this->obspropag = $v;
        $this->modifiedColumns[] = OpordpagPeer::OBSPROPAG;
      }
  
	} 
	
	public function setNumval($v)
	{

    if ($this->numval !== $v) {
        $this->numval = $v;
        $this->modifiedColumns[] = OpordpagPeer::NUMVAL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpordpagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numord = $rs->getString($startcol + 0);

      $this->tipcau = $rs->getString($startcol + 1);

      $this->fecemi = $rs->getDate($startcol + 2, null);

      $this->cedrif = $rs->getString($startcol + 3);

      $this->nomben = $rs->getString($startcol + 4);

      $this->monord = $rs->getFloat($startcol + 5);

      $this->desord = $rs->getString($startcol + 6);

      $this->mondes = $rs->getFloat($startcol + 7);

      $this->monret = $rs->getFloat($startcol + 8);

      $this->numche = $rs->getString($startcol + 9);

      $this->ctaban = $rs->getString($startcol + 10);

      $this->ctapag = $rs->getString($startcol + 11);

      $this->numcom = $rs->getString($startcol + 12);

      $this->status = $rs->getString($startcol + 13);

      $this->coduni = $rs->getString($startcol + 14);

      $this->fecenvcon = $rs->getDate($startcol + 15, null);

      $this->fecenvfin = $rs->getDate($startcol + 16, null);

      $this->ctapagfin = $rs->getString($startcol + 17);

      $this->obsord = $rs->getString($startcol + 18);

      $this->fecven = $rs->getDate($startcol + 19, null);

      $this->fecanu = $rs->getDate($startcol + 20, null);

      $this->desanu = $rs->getString($startcol + 21);

      $this->monpag = $rs->getFloat($startcol + 22);

      $this->aproba = $rs->getString($startcol + 23);

      $this->nombensus = $rs->getString($startcol + 24);

      $this->fecrecfin = $rs->getDate($startcol + 25, null);

      $this->anopre = $rs->getString($startcol + 26);

      $this->fecpag = $rs->getDate($startcol + 27, null);

      $this->numtiq = $rs->getString($startcol + 28);

      $this->peraut = $rs->getString($startcol + 29);

      $this->cedaut = $rs->getString($startcol + 30);

      $this->nomper2 = $rs->getString($startcol + 31);

      $this->nomper1 = $rs->getString($startcol + 32);

      $this->horcon = $rs->getString($startcol + 33);

      $this->feccon = $rs->getDate($startcol + 34, null);

      $this->nomcat = $rs->getString($startcol + 35);

      $this->numfac = $rs->getString($startcol + 36);

      $this->numconfac = $rs->getString($startcol + 37);

      $this->numcorfac = $rs->getString($startcol + 38);

      $this->fechafac = $rs->getDate($startcol + 39, null);

      $this->fecfac = $rs->getDate($startcol + 40, null);

      $this->tipfin = $rs->getString($startcol + 41);

      $this->comret = $rs->getString($startcol + 42);

      $this->feccomret = $rs->getDate($startcol + 43, null);

      $this->comretislr = $rs->getString($startcol + 44);

      $this->feccomretislr = $rs->getDate($startcol + 45, null);

      $this->comretltf = $rs->getString($startcol + 46);

      $this->feccomretltf = $rs->getDate($startcol + 47, null);

      $this->comretfiel = $rs->getString($startcol + 48);

      $this->feccomretfiel = $rs->getDate($startcol + 49, null);

      $this->comretlab = $rs->getString($startcol + 50);

      $this->feccomretlab = $rs->getDate($startcol + 51, null);

      $this->numsigecof = $rs->getString($startcol + 52);

      $this->fecsigecof = $rs->getDate($startcol + 53, null);

      $this->expsigecof = $rs->getString($startcol + 54);

      $this->aprobadoord = $rs->getString($startcol + 55);

      $this->codmotanu = $rs->getString($startcol + 56);

      $this->usuanu = $rs->getString($startcol + 57);

      $this->aprobadotes = $rs->getString($startcol + 58);

      $this->fecret = $rs->getDate($startcol + 59, null);

      $this->numcue = $rs->getString($startcol + 60);

      $this->numcomapr = $rs->getString($startcol + 61);

      $this->codconcepto = $rs->getString($startcol + 62);

      $this->numforpre = $rs->getString($startcol + 63);

      $this->motrecord = $rs->getString($startcol + 64);

      $this->motrectes = $rs->getString($startcol + 65);

      $this->aprorddir = $rs->getString($startcol + 66);

      $this->codcajchi = $rs->getString($startcol + 67);

      $this->numcta = $rs->getString($startcol + 68);

      $this->tipdoc = $rs->getString($startcol + 69);

      $this->loguse = $rs->getString($startcol + 70);

      $this->codfonant = $rs->getString($startcol + 71);

      $this->amortiza = $rs->getFloat($startcol + 72);

      $this->codmon = $rs->getString($startcol + 73);

      $this->valmon = $rs->getFloat($startcol + 74);

      $this->ordsnc = $rs->getString($startcol + 75);

      $this->codsnc = $rs->getString($startcol + 76);

      $this->fecini = $rs->getDate($startcol + 77, null);

      $this->fecfin = $rs->getDate($startcol + 78, null);

      $this->medcom = $rs->getString($startcol + 79);

      $this->modcon = $rs->getString($startcol + 80);

      $this->lugeje = $rs->getString($startcol + 81);

      $this->numcon = $rs->getString($startcol + 82);

      $this->mescon = $rs->getString($startcol + 83);

      $this->staele = $rs->getString($startcol + 84);

      $this->codtde = $rs->getString($startcol + 85);

      $this->codadi = $rs->getString($startcol + 86);

      $this->numordamo = $rs->getString($startcol + 87);

      $this->codrgo = $rs->getString($startcol + 88);

      $this->monrgo = $rs->getFloat($startcol + 89);

      $this->codpro = $rs->getString($startcol + 90);

      $this->coddirec = $rs->getString($startcol + 91);

      $this->refava = $rs->getString($startcol + 92);

      $this->fecava = $rs->getDate($startcol + 93, null);

      $this->nompacava = $rs->getString($startcol + 94);

      $this->cedpacava = $rs->getString($startcol + 95);

      $this->motsolava = $rs->getString($startcol + 96);

      $this->moncarava = $rs->getFloat($startcol + 97);

      $this->usuaprord = $rs->getString($startcol + 98);

      $this->fecaprord = $rs->getDate($startcol + 99, null);

      $this->usuaprdir = $rs->getString($startcol + 100);

      $this->fecaprdir = $rs->getDate($startcol + 101, null);

      $this->usuaprtes = $rs->getString($startcol + 102);

      $this->fecaprtes = $rs->getDate($startcol + 103, null);

      $this->aprproord = $rs->getString($startcol + 104);

      $this->usuaprpro = $rs->getString($startcol + 105);

      $this->fecaprpro = $rs->getDate($startcol + 106, null);

      $this->obspropag = $rs->getString($startcol + 107);

      $this->numval = $rs->getString($startcol + 108);

      $this->id = $rs->getInt($startcol + 109);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 110; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opordpag object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

  
  public function get($m, $a)
    {

      if(method_exists($this,$m)){
        $obj_fk = $this->$m();
        if($obj_fk) return $obj_fk->$a();
      } return '';
    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OpordpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpordpagPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OpordpagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aOpbenefi !== null) {
				if ($this->aOpbenefi->isModified()) {
					$affectedRows += $this->aOpbenefi->save($con);
				}
				$this->setOpbenefi($this->aOpbenefi);
			}

			if ($this->aTsdefmon !== null) {
				if ($this->aTsdefmon->isModified()) {
					$affectedRows += $this->aTsdefmon->save($con);
				}
				$this->setTsdefmon($this->aTsdefmon);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = OpordpagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpordpagPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collOpdetsolpags !== null) {
				foreach($this->collOpdetsolpags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aOpbenefi !== null) {
				if (!$this->aOpbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOpbenefi->getValidationFailures());
				}
			}

			if ($this->aTsdefmon !== null) {
				if (!$this->aTsdefmon->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTsdefmon->getValidationFailures());
				}
			}


			if (($retval = OpordpagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collOpdetsolpags !== null) {
					foreach($this->collOpdetsolpags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpordpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumord();
				break;
			case 1:
				return $this->getTipcau();
				break;
			case 2:
				return $this->getFecemi();
				break;
			case 3:
				return $this->getCedrif();
				break;
			case 4:
				return $this->getNomben();
				break;
			case 5:
				return $this->getMonord();
				break;
			case 6:
				return $this->getDesord();
				break;
			case 7:
				return $this->getMondes();
				break;
			case 8:
				return $this->getMonret();
				break;
			case 9:
				return $this->getNumche();
				break;
			case 10:
				return $this->getCtaban();
				break;
			case 11:
				return $this->getCtapag();
				break;
			case 12:
				return $this->getNumcom();
				break;
			case 13:
				return $this->getStatus();
				break;
			case 14:
				return $this->getCoduni();
				break;
			case 15:
				return $this->getFecenvcon();
				break;
			case 16:
				return $this->getFecenvfin();
				break;
			case 17:
				return $this->getCtapagfin();
				break;
			case 18:
				return $this->getObsord();
				break;
			case 19:
				return $this->getFecven();
				break;
			case 20:
				return $this->getFecanu();
				break;
			case 21:
				return $this->getDesanu();
				break;
			case 22:
				return $this->getMonpag();
				break;
			case 23:
				return $this->getAproba();
				break;
			case 24:
				return $this->getNombensus();
				break;
			case 25:
				return $this->getFecrecfin();
				break;
			case 26:
				return $this->getAnopre();
				break;
			case 27:
				return $this->getFecpag();
				break;
			case 28:
				return $this->getNumtiq();
				break;
			case 29:
				return $this->getPeraut();
				break;
			case 30:
				return $this->getCedaut();
				break;
			case 31:
				return $this->getNomper2();
				break;
			case 32:
				return $this->getNomper1();
				break;
			case 33:
				return $this->getHorcon();
				break;
			case 34:
				return $this->getFeccon();
				break;
			case 35:
				return $this->getNomcat();
				break;
			case 36:
				return $this->getNumfac();
				break;
			case 37:
				return $this->getNumconfac();
				break;
			case 38:
				return $this->getNumcorfac();
				break;
			case 39:
				return $this->getFechafac();
				break;
			case 40:
				return $this->getFecfac();
				break;
			case 41:
				return $this->getTipfin();
				break;
			case 42:
				return $this->getComret();
				break;
			case 43:
				return $this->getFeccomret();
				break;
			case 44:
				return $this->getComretislr();
				break;
			case 45:
				return $this->getFeccomretislr();
				break;
			case 46:
				return $this->getComretltf();
				break;
			case 47:
				return $this->getFeccomretltf();
				break;
			case 48:
				return $this->getComretfiel();
				break;
			case 49:
				return $this->getFeccomretfiel();
				break;
			case 50:
				return $this->getComretlab();
				break;
			case 51:
				return $this->getFeccomretlab();
				break;
			case 52:
				return $this->getNumsigecof();
				break;
			case 53:
				return $this->getFecsigecof();
				break;
			case 54:
				return $this->getExpsigecof();
				break;
			case 55:
				return $this->getAprobadoord();
				break;
			case 56:
				return $this->getCodmotanu();
				break;
			case 57:
				return $this->getUsuanu();
				break;
			case 58:
				return $this->getAprobadotes();
				break;
			case 59:
				return $this->getFecret();
				break;
			case 60:
				return $this->getNumcue();
				break;
			case 61:
				return $this->getNumcomapr();
				break;
			case 62:
				return $this->getCodconcepto();
				break;
			case 63:
				return $this->getNumforpre();
				break;
			case 64:
				return $this->getMotrecord();
				break;
			case 65:
				return $this->getMotrectes();
				break;
			case 66:
				return $this->getAprorddir();
				break;
			case 67:
				return $this->getCodcajchi();
				break;
			case 68:
				return $this->getNumcta();
				break;
			case 69:
				return $this->getTipdoc();
				break;
			case 70:
				return $this->getLoguse();
				break;
			case 71:
				return $this->getCodfonant();
				break;
			case 72:
				return $this->getAmortiza();
				break;
			case 73:
				return $this->getCodmon();
				break;
			case 74:
				return $this->getValmon();
				break;
			case 75:
				return $this->getOrdsnc();
				break;
			case 76:
				return $this->getCodsnc();
				break;
			case 77:
				return $this->getFecini();
				break;
			case 78:
				return $this->getFecfin();
				break;
			case 79:
				return $this->getMedcom();
				break;
			case 80:
				return $this->getModcon();
				break;
			case 81:
				return $this->getLugeje();
				break;
			case 82:
				return $this->getNumcon();
				break;
			case 83:
				return $this->getMescon();
				break;
			case 84:
				return $this->getStaele();
				break;
			case 85:
				return $this->getCodtde();
				break;
			case 86:
				return $this->getCodadi();
				break;
			case 87:
				return $this->getNumordamo();
				break;
			case 88:
				return $this->getCodrgo();
				break;
			case 89:
				return $this->getMonrgo();
				break;
			case 90:
				return $this->getCodpro();
				break;
			case 91:
				return $this->getCoddirec();
				break;
			case 92:
				return $this->getRefava();
				break;
			case 93:
				return $this->getFecava();
				break;
			case 94:
				return $this->getNompacava();
				break;
			case 95:
				return $this->getCedpacava();
				break;
			case 96:
				return $this->getMotsolava();
				break;
			case 97:
				return $this->getMoncarava();
				break;
			case 98:
				return $this->getUsuaprord();
				break;
			case 99:
				return $this->getFecaprord();
				break;
			case 100:
				return $this->getUsuaprdir();
				break;
			case 101:
				return $this->getFecaprdir();
				break;
			case 102:
				return $this->getUsuaprtes();
				break;
			case 103:
				return $this->getFecaprtes();
				break;
			case 104:
				return $this->getAprproord();
				break;
			case 105:
				return $this->getUsuaprpro();
				break;
			case 106:
				return $this->getFecaprpro();
				break;
			case 107:
				return $this->getObspropag();
				break;
			case 108:
				return $this->getNumval();
				break;
			case 109:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpordpagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumord(),
			$keys[1] => $this->getTipcau(),
			$keys[2] => $this->getFecemi(),
			$keys[3] => $this->getCedrif(),
			$keys[4] => $this->getNomben(),
			$keys[5] => $this->getMonord(),
			$keys[6] => $this->getDesord(),
			$keys[7] => $this->getMondes(),
			$keys[8] => $this->getMonret(),
			$keys[9] => $this->getNumche(),
			$keys[10] => $this->getCtaban(),
			$keys[11] => $this->getCtapag(),
			$keys[12] => $this->getNumcom(),
			$keys[13] => $this->getStatus(),
			$keys[14] => $this->getCoduni(),
			$keys[15] => $this->getFecenvcon(),
			$keys[16] => $this->getFecenvfin(),
			$keys[17] => $this->getCtapagfin(),
			$keys[18] => $this->getObsord(),
			$keys[19] => $this->getFecven(),
			$keys[20] => $this->getFecanu(),
			$keys[21] => $this->getDesanu(),
			$keys[22] => $this->getMonpag(),
			$keys[23] => $this->getAproba(),
			$keys[24] => $this->getNombensus(),
			$keys[25] => $this->getFecrecfin(),
			$keys[26] => $this->getAnopre(),
			$keys[27] => $this->getFecpag(),
			$keys[28] => $this->getNumtiq(),
			$keys[29] => $this->getPeraut(),
			$keys[30] => $this->getCedaut(),
			$keys[31] => $this->getNomper2(),
			$keys[32] => $this->getNomper1(),
			$keys[33] => $this->getHorcon(),
			$keys[34] => $this->getFeccon(),
			$keys[35] => $this->getNomcat(),
			$keys[36] => $this->getNumfac(),
			$keys[37] => $this->getNumconfac(),
			$keys[38] => $this->getNumcorfac(),
			$keys[39] => $this->getFechafac(),
			$keys[40] => $this->getFecfac(),
			$keys[41] => $this->getTipfin(),
			$keys[42] => $this->getComret(),
			$keys[43] => $this->getFeccomret(),
			$keys[44] => $this->getComretislr(),
			$keys[45] => $this->getFeccomretislr(),
			$keys[46] => $this->getComretltf(),
			$keys[47] => $this->getFeccomretltf(),
			$keys[48] => $this->getComretfiel(),
			$keys[49] => $this->getFeccomretfiel(),
			$keys[50] => $this->getComretlab(),
			$keys[51] => $this->getFeccomretlab(),
			$keys[52] => $this->getNumsigecof(),
			$keys[53] => $this->getFecsigecof(),
			$keys[54] => $this->getExpsigecof(),
			$keys[55] => $this->getAprobadoord(),
			$keys[56] => $this->getCodmotanu(),
			$keys[57] => $this->getUsuanu(),
			$keys[58] => $this->getAprobadotes(),
			$keys[59] => $this->getFecret(),
			$keys[60] => $this->getNumcue(),
			$keys[61] => $this->getNumcomapr(),
			$keys[62] => $this->getCodconcepto(),
			$keys[63] => $this->getNumforpre(),
			$keys[64] => $this->getMotrecord(),
			$keys[65] => $this->getMotrectes(),
			$keys[66] => $this->getAprorddir(),
			$keys[67] => $this->getCodcajchi(),
			$keys[68] => $this->getNumcta(),
			$keys[69] => $this->getTipdoc(),
			$keys[70] => $this->getLoguse(),
			$keys[71] => $this->getCodfonant(),
			$keys[72] => $this->getAmortiza(),
			$keys[73] => $this->getCodmon(),
			$keys[74] => $this->getValmon(),
			$keys[75] => $this->getOrdsnc(),
			$keys[76] => $this->getCodsnc(),
			$keys[77] => $this->getFecini(),
			$keys[78] => $this->getFecfin(),
			$keys[79] => $this->getMedcom(),
			$keys[80] => $this->getModcon(),
			$keys[81] => $this->getLugeje(),
			$keys[82] => $this->getNumcon(),
			$keys[83] => $this->getMescon(),
			$keys[84] => $this->getStaele(),
			$keys[85] => $this->getCodtde(),
			$keys[86] => $this->getCodadi(),
			$keys[87] => $this->getNumordamo(),
			$keys[88] => $this->getCodrgo(),
			$keys[89] => $this->getMonrgo(),
			$keys[90] => $this->getCodpro(),
			$keys[91] => $this->getCoddirec(),
			$keys[92] => $this->getRefava(),
			$keys[93] => $this->getFecava(),
			$keys[94] => $this->getNompacava(),
			$keys[95] => $this->getCedpacava(),
			$keys[96] => $this->getMotsolava(),
			$keys[97] => $this->getMoncarava(),
			$keys[98] => $this->getUsuaprord(),
			$keys[99] => $this->getFecaprord(),
			$keys[100] => $this->getUsuaprdir(),
			$keys[101] => $this->getFecaprdir(),
			$keys[102] => $this->getUsuaprtes(),
			$keys[103] => $this->getFecaprtes(),
			$keys[104] => $this->getAprproord(),
			$keys[105] => $this->getUsuaprpro(),
			$keys[106] => $this->getFecaprpro(),
			$keys[107] => $this->getObspropag(),
			$keys[108] => $this->getNumval(),
			$keys[109] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpordpagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumord($value);
				break;
			case 1:
				$this->setTipcau($value);
				break;
			case 2:
				$this->setFecemi($value);
				break;
			case 3:
				$this->setCedrif($value);
				break;
			case 4:
				$this->setNomben($value);
				break;
			case 5:
				$this->setMonord($value);
				break;
			case 6:
				$this->setDesord($value);
				break;
			case 7:
				$this->setMondes($value);
				break;
			case 8:
				$this->setMonret($value);
				break;
			case 9:
				$this->setNumche($value);
				break;
			case 10:
				$this->setCtaban($value);
				break;
			case 11:
				$this->setCtapag($value);
				break;
			case 12:
				$this->setNumcom($value);
				break;
			case 13:
				$this->setStatus($value);
				break;
			case 14:
				$this->setCoduni($value);
				break;
			case 15:
				$this->setFecenvcon($value);
				break;
			case 16:
				$this->setFecenvfin($value);
				break;
			case 17:
				$this->setCtapagfin($value);
				break;
			case 18:
				$this->setObsord($value);
				break;
			case 19:
				$this->setFecven($value);
				break;
			case 20:
				$this->setFecanu($value);
				break;
			case 21:
				$this->setDesanu($value);
				break;
			case 22:
				$this->setMonpag($value);
				break;
			case 23:
				$this->setAproba($value);
				break;
			case 24:
				$this->setNombensus($value);
				break;
			case 25:
				$this->setFecrecfin($value);
				break;
			case 26:
				$this->setAnopre($value);
				break;
			case 27:
				$this->setFecpag($value);
				break;
			case 28:
				$this->setNumtiq($value);
				break;
			case 29:
				$this->setPeraut($value);
				break;
			case 30:
				$this->setCedaut($value);
				break;
			case 31:
				$this->setNomper2($value);
				break;
			case 32:
				$this->setNomper1($value);
				break;
			case 33:
				$this->setHorcon($value);
				break;
			case 34:
				$this->setFeccon($value);
				break;
			case 35:
				$this->setNomcat($value);
				break;
			case 36:
				$this->setNumfac($value);
				break;
			case 37:
				$this->setNumconfac($value);
				break;
			case 38:
				$this->setNumcorfac($value);
				break;
			case 39:
				$this->setFechafac($value);
				break;
			case 40:
				$this->setFecfac($value);
				break;
			case 41:
				$this->setTipfin($value);
				break;
			case 42:
				$this->setComret($value);
				break;
			case 43:
				$this->setFeccomret($value);
				break;
			case 44:
				$this->setComretislr($value);
				break;
			case 45:
				$this->setFeccomretislr($value);
				break;
			case 46:
				$this->setComretltf($value);
				break;
			case 47:
				$this->setFeccomretltf($value);
				break;
			case 48:
				$this->setComretfiel($value);
				break;
			case 49:
				$this->setFeccomretfiel($value);
				break;
			case 50:
				$this->setComretlab($value);
				break;
			case 51:
				$this->setFeccomretlab($value);
				break;
			case 52:
				$this->setNumsigecof($value);
				break;
			case 53:
				$this->setFecsigecof($value);
				break;
			case 54:
				$this->setExpsigecof($value);
				break;
			case 55:
				$this->setAprobadoord($value);
				break;
			case 56:
				$this->setCodmotanu($value);
				break;
			case 57:
				$this->setUsuanu($value);
				break;
			case 58:
				$this->setAprobadotes($value);
				break;
			case 59:
				$this->setFecret($value);
				break;
			case 60:
				$this->setNumcue($value);
				break;
			case 61:
				$this->setNumcomapr($value);
				break;
			case 62:
				$this->setCodconcepto($value);
				break;
			case 63:
				$this->setNumforpre($value);
				break;
			case 64:
				$this->setMotrecord($value);
				break;
			case 65:
				$this->setMotrectes($value);
				break;
			case 66:
				$this->setAprorddir($value);
				break;
			case 67:
				$this->setCodcajchi($value);
				break;
			case 68:
				$this->setNumcta($value);
				break;
			case 69:
				$this->setTipdoc($value);
				break;
			case 70:
				$this->setLoguse($value);
				break;
			case 71:
				$this->setCodfonant($value);
				break;
			case 72:
				$this->setAmortiza($value);
				break;
			case 73:
				$this->setCodmon($value);
				break;
			case 74:
				$this->setValmon($value);
				break;
			case 75:
				$this->setOrdsnc($value);
				break;
			case 76:
				$this->setCodsnc($value);
				break;
			case 77:
				$this->setFecini($value);
				break;
			case 78:
				$this->setFecfin($value);
				break;
			case 79:
				$this->setMedcom($value);
				break;
			case 80:
				$this->setModcon($value);
				break;
			case 81:
				$this->setLugeje($value);
				break;
			case 82:
				$this->setNumcon($value);
				break;
			case 83:
				$this->setMescon($value);
				break;
			case 84:
				$this->setStaele($value);
				break;
			case 85:
				$this->setCodtde($value);
				break;
			case 86:
				$this->setCodadi($value);
				break;
			case 87:
				$this->setNumordamo($value);
				break;
			case 88:
				$this->setCodrgo($value);
				break;
			case 89:
				$this->setMonrgo($value);
				break;
			case 90:
				$this->setCodpro($value);
				break;
			case 91:
				$this->setCoddirec($value);
				break;
			case 92:
				$this->setRefava($value);
				break;
			case 93:
				$this->setFecava($value);
				break;
			case 94:
				$this->setNompacava($value);
				break;
			case 95:
				$this->setCedpacava($value);
				break;
			case 96:
				$this->setMotsolava($value);
				break;
			case 97:
				$this->setMoncarava($value);
				break;
			case 98:
				$this->setUsuaprord($value);
				break;
			case 99:
				$this->setFecaprord($value);
				break;
			case 100:
				$this->setUsuaprdir($value);
				break;
			case 101:
				$this->setFecaprdir($value);
				break;
			case 102:
				$this->setUsuaprtes($value);
				break;
			case 103:
				$this->setFecaprtes($value);
				break;
			case 104:
				$this->setAprproord($value);
				break;
			case 105:
				$this->setUsuaprpro($value);
				break;
			case 106:
				$this->setFecaprpro($value);
				break;
			case 107:
				$this->setObspropag($value);
				break;
			case 108:
				$this->setNumval($value);
				break;
			case 109:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpordpagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumord($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipcau($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecemi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCedrif($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomben($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonord($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDesord($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMondes($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonret($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumche($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCtaban($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCtapag($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumcom($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStatus($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCoduni($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFecenvcon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecenvfin($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCtapagfin($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setObsord($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFecven($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFecanu($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDesanu($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setMonpag($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setAproba($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setNombensus($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setFecrecfin($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setAnopre($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setFecpag($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setNumtiq($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setPeraut($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCedaut($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setNomper2($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setNomper1($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setHorcon($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setFeccon($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setNomcat($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setNumfac($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setNumconfac($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setNumcorfac($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setFechafac($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setFecfac($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setTipfin($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setComret($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setFeccomret($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setComretislr($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setFeccomretislr($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setComretltf($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setFeccomretltf($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setComretfiel($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setFeccomretfiel($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setComretlab($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setFeccomretlab($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setNumsigecof($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setFecsigecof($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setExpsigecof($arr[$keys[54]]);
		if (array_key_exists($keys[55], $arr)) $this->setAprobadoord($arr[$keys[55]]);
		if (array_key_exists($keys[56], $arr)) $this->setCodmotanu($arr[$keys[56]]);
		if (array_key_exists($keys[57], $arr)) $this->setUsuanu($arr[$keys[57]]);
		if (array_key_exists($keys[58], $arr)) $this->setAprobadotes($arr[$keys[58]]);
		if (array_key_exists($keys[59], $arr)) $this->setFecret($arr[$keys[59]]);
		if (array_key_exists($keys[60], $arr)) $this->setNumcue($arr[$keys[60]]);
		if (array_key_exists($keys[61], $arr)) $this->setNumcomapr($arr[$keys[61]]);
		if (array_key_exists($keys[62], $arr)) $this->setCodconcepto($arr[$keys[62]]);
		if (array_key_exists($keys[63], $arr)) $this->setNumforpre($arr[$keys[63]]);
		if (array_key_exists($keys[64], $arr)) $this->setMotrecord($arr[$keys[64]]);
		if (array_key_exists($keys[65], $arr)) $this->setMotrectes($arr[$keys[65]]);
		if (array_key_exists($keys[66], $arr)) $this->setAprorddir($arr[$keys[66]]);
		if (array_key_exists($keys[67], $arr)) $this->setCodcajchi($arr[$keys[67]]);
		if (array_key_exists($keys[68], $arr)) $this->setNumcta($arr[$keys[68]]);
		if (array_key_exists($keys[69], $arr)) $this->setTipdoc($arr[$keys[69]]);
		if (array_key_exists($keys[70], $arr)) $this->setLoguse($arr[$keys[70]]);
		if (array_key_exists($keys[71], $arr)) $this->setCodfonant($arr[$keys[71]]);
		if (array_key_exists($keys[72], $arr)) $this->setAmortiza($arr[$keys[72]]);
		if (array_key_exists($keys[73], $arr)) $this->setCodmon($arr[$keys[73]]);
		if (array_key_exists($keys[74], $arr)) $this->setValmon($arr[$keys[74]]);
		if (array_key_exists($keys[75], $arr)) $this->setOrdsnc($arr[$keys[75]]);
		if (array_key_exists($keys[76], $arr)) $this->setCodsnc($arr[$keys[76]]);
		if (array_key_exists($keys[77], $arr)) $this->setFecini($arr[$keys[77]]);
		if (array_key_exists($keys[78], $arr)) $this->setFecfin($arr[$keys[78]]);
		if (array_key_exists($keys[79], $arr)) $this->setMedcom($arr[$keys[79]]);
		if (array_key_exists($keys[80], $arr)) $this->setModcon($arr[$keys[80]]);
		if (array_key_exists($keys[81], $arr)) $this->setLugeje($arr[$keys[81]]);
		if (array_key_exists($keys[82], $arr)) $this->setNumcon($arr[$keys[82]]);
		if (array_key_exists($keys[83], $arr)) $this->setMescon($arr[$keys[83]]);
		if (array_key_exists($keys[84], $arr)) $this->setStaele($arr[$keys[84]]);
		if (array_key_exists($keys[85], $arr)) $this->setCodtde($arr[$keys[85]]);
		if (array_key_exists($keys[86], $arr)) $this->setCodadi($arr[$keys[86]]);
		if (array_key_exists($keys[87], $arr)) $this->setNumordamo($arr[$keys[87]]);
		if (array_key_exists($keys[88], $arr)) $this->setCodrgo($arr[$keys[88]]);
		if (array_key_exists($keys[89], $arr)) $this->setMonrgo($arr[$keys[89]]);
		if (array_key_exists($keys[90], $arr)) $this->setCodpro($arr[$keys[90]]);
		if (array_key_exists($keys[91], $arr)) $this->setCoddirec($arr[$keys[91]]);
		if (array_key_exists($keys[92], $arr)) $this->setRefava($arr[$keys[92]]);
		if (array_key_exists($keys[93], $arr)) $this->setFecava($arr[$keys[93]]);
		if (array_key_exists($keys[94], $arr)) $this->setNompacava($arr[$keys[94]]);
		if (array_key_exists($keys[95], $arr)) $this->setCedpacava($arr[$keys[95]]);
		if (array_key_exists($keys[96], $arr)) $this->setMotsolava($arr[$keys[96]]);
		if (array_key_exists($keys[97], $arr)) $this->setMoncarava($arr[$keys[97]]);
		if (array_key_exists($keys[98], $arr)) $this->setUsuaprord($arr[$keys[98]]);
		if (array_key_exists($keys[99], $arr)) $this->setFecaprord($arr[$keys[99]]);
		if (array_key_exists($keys[100], $arr)) $this->setUsuaprdir($arr[$keys[100]]);
		if (array_key_exists($keys[101], $arr)) $this->setFecaprdir($arr[$keys[101]]);
		if (array_key_exists($keys[102], $arr)) $this->setUsuaprtes($arr[$keys[102]]);
		if (array_key_exists($keys[103], $arr)) $this->setFecaprtes($arr[$keys[103]]);
		if (array_key_exists($keys[104], $arr)) $this->setAprproord($arr[$keys[104]]);
		if (array_key_exists($keys[105], $arr)) $this->setUsuaprpro($arr[$keys[105]]);
		if (array_key_exists($keys[106], $arr)) $this->setFecaprpro($arr[$keys[106]]);
		if (array_key_exists($keys[107], $arr)) $this->setObspropag($arr[$keys[107]]);
		if (array_key_exists($keys[108], $arr)) $this->setNumval($arr[$keys[108]]);
		if (array_key_exists($keys[109], $arr)) $this->setId($arr[$keys[109]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpordpagPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpordpagPeer::NUMORD)) $criteria->add(OpordpagPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(OpordpagPeer::TIPCAU)) $criteria->add(OpordpagPeer::TIPCAU, $this->tipcau);
		if ($this->isColumnModified(OpordpagPeer::FECEMI)) $criteria->add(OpordpagPeer::FECEMI, $this->fecemi);
		if ($this->isColumnModified(OpordpagPeer::CEDRIF)) $criteria->add(OpordpagPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(OpordpagPeer::NOMBEN)) $criteria->add(OpordpagPeer::NOMBEN, $this->nomben);
		if ($this->isColumnModified(OpordpagPeer::MONORD)) $criteria->add(OpordpagPeer::MONORD, $this->monord);
		if ($this->isColumnModified(OpordpagPeer::DESORD)) $criteria->add(OpordpagPeer::DESORD, $this->desord);
		if ($this->isColumnModified(OpordpagPeer::MONDES)) $criteria->add(OpordpagPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(OpordpagPeer::MONRET)) $criteria->add(OpordpagPeer::MONRET, $this->monret);
		if ($this->isColumnModified(OpordpagPeer::NUMCHE)) $criteria->add(OpordpagPeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(OpordpagPeer::CTABAN)) $criteria->add(OpordpagPeer::CTABAN, $this->ctaban);
		if ($this->isColumnModified(OpordpagPeer::CTAPAG)) $criteria->add(OpordpagPeer::CTAPAG, $this->ctapag);
		if ($this->isColumnModified(OpordpagPeer::NUMCOM)) $criteria->add(OpordpagPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(OpordpagPeer::STATUS)) $criteria->add(OpordpagPeer::STATUS, $this->status);
		if ($this->isColumnModified(OpordpagPeer::CODUNI)) $criteria->add(OpordpagPeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(OpordpagPeer::FECENVCON)) $criteria->add(OpordpagPeer::FECENVCON, $this->fecenvcon);
		if ($this->isColumnModified(OpordpagPeer::FECENVFIN)) $criteria->add(OpordpagPeer::FECENVFIN, $this->fecenvfin);
		if ($this->isColumnModified(OpordpagPeer::CTAPAGFIN)) $criteria->add(OpordpagPeer::CTAPAGFIN, $this->ctapagfin);
		if ($this->isColumnModified(OpordpagPeer::OBSORD)) $criteria->add(OpordpagPeer::OBSORD, $this->obsord);
		if ($this->isColumnModified(OpordpagPeer::FECVEN)) $criteria->add(OpordpagPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(OpordpagPeer::FECANU)) $criteria->add(OpordpagPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(OpordpagPeer::DESANU)) $criteria->add(OpordpagPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(OpordpagPeer::MONPAG)) $criteria->add(OpordpagPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(OpordpagPeer::APROBA)) $criteria->add(OpordpagPeer::APROBA, $this->aproba);
		if ($this->isColumnModified(OpordpagPeer::NOMBENSUS)) $criteria->add(OpordpagPeer::NOMBENSUS, $this->nombensus);
		if ($this->isColumnModified(OpordpagPeer::FECRECFIN)) $criteria->add(OpordpagPeer::FECRECFIN, $this->fecrecfin);
		if ($this->isColumnModified(OpordpagPeer::ANOPRE)) $criteria->add(OpordpagPeer::ANOPRE, $this->anopre);
		if ($this->isColumnModified(OpordpagPeer::FECPAG)) $criteria->add(OpordpagPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(OpordpagPeer::NUMTIQ)) $criteria->add(OpordpagPeer::NUMTIQ, $this->numtiq);
		if ($this->isColumnModified(OpordpagPeer::PERAUT)) $criteria->add(OpordpagPeer::PERAUT, $this->peraut);
		if ($this->isColumnModified(OpordpagPeer::CEDAUT)) $criteria->add(OpordpagPeer::CEDAUT, $this->cedaut);
		if ($this->isColumnModified(OpordpagPeer::NOMPER2)) $criteria->add(OpordpagPeer::NOMPER2, $this->nomper2);
		if ($this->isColumnModified(OpordpagPeer::NOMPER1)) $criteria->add(OpordpagPeer::NOMPER1, $this->nomper1);
		if ($this->isColumnModified(OpordpagPeer::HORCON)) $criteria->add(OpordpagPeer::HORCON, $this->horcon);
		if ($this->isColumnModified(OpordpagPeer::FECCON)) $criteria->add(OpordpagPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(OpordpagPeer::NOMCAT)) $criteria->add(OpordpagPeer::NOMCAT, $this->nomcat);
		if ($this->isColumnModified(OpordpagPeer::NUMFAC)) $criteria->add(OpordpagPeer::NUMFAC, $this->numfac);
		if ($this->isColumnModified(OpordpagPeer::NUMCONFAC)) $criteria->add(OpordpagPeer::NUMCONFAC, $this->numconfac);
		if ($this->isColumnModified(OpordpagPeer::NUMCORFAC)) $criteria->add(OpordpagPeer::NUMCORFAC, $this->numcorfac);
		if ($this->isColumnModified(OpordpagPeer::FECHAFAC)) $criteria->add(OpordpagPeer::FECHAFAC, $this->fechafac);
		if ($this->isColumnModified(OpordpagPeer::FECFAC)) $criteria->add(OpordpagPeer::FECFAC, $this->fecfac);
		if ($this->isColumnModified(OpordpagPeer::TIPFIN)) $criteria->add(OpordpagPeer::TIPFIN, $this->tipfin);
		if ($this->isColumnModified(OpordpagPeer::COMRET)) $criteria->add(OpordpagPeer::COMRET, $this->comret);
		if ($this->isColumnModified(OpordpagPeer::FECCOMRET)) $criteria->add(OpordpagPeer::FECCOMRET, $this->feccomret);
		if ($this->isColumnModified(OpordpagPeer::COMRETISLR)) $criteria->add(OpordpagPeer::COMRETISLR, $this->comretislr);
		if ($this->isColumnModified(OpordpagPeer::FECCOMRETISLR)) $criteria->add(OpordpagPeer::FECCOMRETISLR, $this->feccomretislr);
		if ($this->isColumnModified(OpordpagPeer::COMRETLTF)) $criteria->add(OpordpagPeer::COMRETLTF, $this->comretltf);
		if ($this->isColumnModified(OpordpagPeer::FECCOMRETLTF)) $criteria->add(OpordpagPeer::FECCOMRETLTF, $this->feccomretltf);
		if ($this->isColumnModified(OpordpagPeer::COMRETFIEL)) $criteria->add(OpordpagPeer::COMRETFIEL, $this->comretfiel);
		if ($this->isColumnModified(OpordpagPeer::FECCOMRETFIEL)) $criteria->add(OpordpagPeer::FECCOMRETFIEL, $this->feccomretfiel);
		if ($this->isColumnModified(OpordpagPeer::COMRETLAB)) $criteria->add(OpordpagPeer::COMRETLAB, $this->comretlab);
		if ($this->isColumnModified(OpordpagPeer::FECCOMRETLAB)) $criteria->add(OpordpagPeer::FECCOMRETLAB, $this->feccomretlab);
		if ($this->isColumnModified(OpordpagPeer::NUMSIGECOF)) $criteria->add(OpordpagPeer::NUMSIGECOF, $this->numsigecof);
		if ($this->isColumnModified(OpordpagPeer::FECSIGECOF)) $criteria->add(OpordpagPeer::FECSIGECOF, $this->fecsigecof);
		if ($this->isColumnModified(OpordpagPeer::EXPSIGECOF)) $criteria->add(OpordpagPeer::EXPSIGECOF, $this->expsigecof);
		if ($this->isColumnModified(OpordpagPeer::APROBADOORD)) $criteria->add(OpordpagPeer::APROBADOORD, $this->aprobadoord);
		if ($this->isColumnModified(OpordpagPeer::CODMOTANU)) $criteria->add(OpordpagPeer::CODMOTANU, $this->codmotanu);
		if ($this->isColumnModified(OpordpagPeer::USUANU)) $criteria->add(OpordpagPeer::USUANU, $this->usuanu);
		if ($this->isColumnModified(OpordpagPeer::APROBADOTES)) $criteria->add(OpordpagPeer::APROBADOTES, $this->aprobadotes);
		if ($this->isColumnModified(OpordpagPeer::FECRET)) $criteria->add(OpordpagPeer::FECRET, $this->fecret);
		if ($this->isColumnModified(OpordpagPeer::NUMCUE)) $criteria->add(OpordpagPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(OpordpagPeer::NUMCOMAPR)) $criteria->add(OpordpagPeer::NUMCOMAPR, $this->numcomapr);
		if ($this->isColumnModified(OpordpagPeer::CODCONCEPTO)) $criteria->add(OpordpagPeer::CODCONCEPTO, $this->codconcepto);
		if ($this->isColumnModified(OpordpagPeer::NUMFORPRE)) $criteria->add(OpordpagPeer::NUMFORPRE, $this->numforpre);
		if ($this->isColumnModified(OpordpagPeer::MOTRECORD)) $criteria->add(OpordpagPeer::MOTRECORD, $this->motrecord);
		if ($this->isColumnModified(OpordpagPeer::MOTRECTES)) $criteria->add(OpordpagPeer::MOTRECTES, $this->motrectes);
		if ($this->isColumnModified(OpordpagPeer::APRORDDIR)) $criteria->add(OpordpagPeer::APRORDDIR, $this->aprorddir);
		if ($this->isColumnModified(OpordpagPeer::CODCAJCHI)) $criteria->add(OpordpagPeer::CODCAJCHI, $this->codcajchi);
		if ($this->isColumnModified(OpordpagPeer::NUMCTA)) $criteria->add(OpordpagPeer::NUMCTA, $this->numcta);
		if ($this->isColumnModified(OpordpagPeer::TIPDOC)) $criteria->add(OpordpagPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(OpordpagPeer::LOGUSE)) $criteria->add(OpordpagPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(OpordpagPeer::CODFONANT)) $criteria->add(OpordpagPeer::CODFONANT, $this->codfonant);
		if ($this->isColumnModified(OpordpagPeer::AMORTIZA)) $criteria->add(OpordpagPeer::AMORTIZA, $this->amortiza);
		if ($this->isColumnModified(OpordpagPeer::CODMON)) $criteria->add(OpordpagPeer::CODMON, $this->codmon);
		if ($this->isColumnModified(OpordpagPeer::VALMON)) $criteria->add(OpordpagPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(OpordpagPeer::ORDSNC)) $criteria->add(OpordpagPeer::ORDSNC, $this->ordsnc);
		if ($this->isColumnModified(OpordpagPeer::CODSNC)) $criteria->add(OpordpagPeer::CODSNC, $this->codsnc);
		if ($this->isColumnModified(OpordpagPeer::FECINI)) $criteria->add(OpordpagPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(OpordpagPeer::FECFIN)) $criteria->add(OpordpagPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(OpordpagPeer::MEDCOM)) $criteria->add(OpordpagPeer::MEDCOM, $this->medcom);
		if ($this->isColumnModified(OpordpagPeer::MODCON)) $criteria->add(OpordpagPeer::MODCON, $this->modcon);
		if ($this->isColumnModified(OpordpagPeer::LUGEJE)) $criteria->add(OpordpagPeer::LUGEJE, $this->lugeje);
		if ($this->isColumnModified(OpordpagPeer::NUMCON)) $criteria->add(OpordpagPeer::NUMCON, $this->numcon);
		if ($this->isColumnModified(OpordpagPeer::MESCON)) $criteria->add(OpordpagPeer::MESCON, $this->mescon);
		if ($this->isColumnModified(OpordpagPeer::STAELE)) $criteria->add(OpordpagPeer::STAELE, $this->staele);
		if ($this->isColumnModified(OpordpagPeer::CODTDE)) $criteria->add(OpordpagPeer::CODTDE, $this->codtde);
		if ($this->isColumnModified(OpordpagPeer::CODADI)) $criteria->add(OpordpagPeer::CODADI, $this->codadi);
		if ($this->isColumnModified(OpordpagPeer::NUMORDAMO)) $criteria->add(OpordpagPeer::NUMORDAMO, $this->numordamo);
		if ($this->isColumnModified(OpordpagPeer::CODRGO)) $criteria->add(OpordpagPeer::CODRGO, $this->codrgo);
		if ($this->isColumnModified(OpordpagPeer::MONRGO)) $criteria->add(OpordpagPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(OpordpagPeer::CODPRO)) $criteria->add(OpordpagPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(OpordpagPeer::CODDIREC)) $criteria->add(OpordpagPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(OpordpagPeer::REFAVA)) $criteria->add(OpordpagPeer::REFAVA, $this->refava);
		if ($this->isColumnModified(OpordpagPeer::FECAVA)) $criteria->add(OpordpagPeer::FECAVA, $this->fecava);
		if ($this->isColumnModified(OpordpagPeer::NOMPACAVA)) $criteria->add(OpordpagPeer::NOMPACAVA, $this->nompacava);
		if ($this->isColumnModified(OpordpagPeer::CEDPACAVA)) $criteria->add(OpordpagPeer::CEDPACAVA, $this->cedpacava);
		if ($this->isColumnModified(OpordpagPeer::MOTSOLAVA)) $criteria->add(OpordpagPeer::MOTSOLAVA, $this->motsolava);
		if ($this->isColumnModified(OpordpagPeer::MONCARAVA)) $criteria->add(OpordpagPeer::MONCARAVA, $this->moncarava);
		if ($this->isColumnModified(OpordpagPeer::USUAPRORD)) $criteria->add(OpordpagPeer::USUAPRORD, $this->usuaprord);
		if ($this->isColumnModified(OpordpagPeer::FECAPRORD)) $criteria->add(OpordpagPeer::FECAPRORD, $this->fecaprord);
		if ($this->isColumnModified(OpordpagPeer::USUAPRDIR)) $criteria->add(OpordpagPeer::USUAPRDIR, $this->usuaprdir);
		if ($this->isColumnModified(OpordpagPeer::FECAPRDIR)) $criteria->add(OpordpagPeer::FECAPRDIR, $this->fecaprdir);
		if ($this->isColumnModified(OpordpagPeer::USUAPRTES)) $criteria->add(OpordpagPeer::USUAPRTES, $this->usuaprtes);
		if ($this->isColumnModified(OpordpagPeer::FECAPRTES)) $criteria->add(OpordpagPeer::FECAPRTES, $this->fecaprtes);
		if ($this->isColumnModified(OpordpagPeer::APRPROORD)) $criteria->add(OpordpagPeer::APRPROORD, $this->aprproord);
		if ($this->isColumnModified(OpordpagPeer::USUAPRPRO)) $criteria->add(OpordpagPeer::USUAPRPRO, $this->usuaprpro);
		if ($this->isColumnModified(OpordpagPeer::FECAPRPRO)) $criteria->add(OpordpagPeer::FECAPRPRO, $this->fecaprpro);
		if ($this->isColumnModified(OpordpagPeer::OBSPROPAG)) $criteria->add(OpordpagPeer::OBSPROPAG, $this->obspropag);
		if ($this->isColumnModified(OpordpagPeer::NUMVAL)) $criteria->add(OpordpagPeer::NUMVAL, $this->numval);
		if ($this->isColumnModified(OpordpagPeer::ID)) $criteria->add(OpordpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpordpagPeer::DATABASE_NAME);

		$criteria->add(OpordpagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNumord($this->numord);

		$copyObj->setTipcau($this->tipcau);

		$copyObj->setFecemi($this->fecemi);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNomben($this->nomben);

		$copyObj->setMonord($this->monord);

		$copyObj->setDesord($this->desord);

		$copyObj->setMondes($this->mondes);

		$copyObj->setMonret($this->monret);

		$copyObj->setNumche($this->numche);

		$copyObj->setCtaban($this->ctaban);

		$copyObj->setCtapag($this->ctapag);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setStatus($this->status);

		$copyObj->setCoduni($this->coduni);

		$copyObj->setFecenvcon($this->fecenvcon);

		$copyObj->setFecenvfin($this->fecenvfin);

		$copyObj->setCtapagfin($this->ctapagfin);

		$copyObj->setObsord($this->obsord);

		$copyObj->setFecven($this->fecven);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setAproba($this->aproba);

		$copyObj->setNombensus($this->nombensus);

		$copyObj->setFecrecfin($this->fecrecfin);

		$copyObj->setAnopre($this->anopre);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setNumtiq($this->numtiq);

		$copyObj->setPeraut($this->peraut);

		$copyObj->setCedaut($this->cedaut);

		$copyObj->setNomper2($this->nomper2);

		$copyObj->setNomper1($this->nomper1);

		$copyObj->setHorcon($this->horcon);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setNomcat($this->nomcat);

		$copyObj->setNumfac($this->numfac);

		$copyObj->setNumconfac($this->numconfac);

		$copyObj->setNumcorfac($this->numcorfac);

		$copyObj->setFechafac($this->fechafac);

		$copyObj->setFecfac($this->fecfac);

		$copyObj->setTipfin($this->tipfin);

		$copyObj->setComret($this->comret);

		$copyObj->setFeccomret($this->feccomret);

		$copyObj->setComretislr($this->comretislr);

		$copyObj->setFeccomretislr($this->feccomretislr);

		$copyObj->setComretltf($this->comretltf);

		$copyObj->setFeccomretltf($this->feccomretltf);

		$copyObj->setComretfiel($this->comretfiel);

		$copyObj->setFeccomretfiel($this->feccomretfiel);

		$copyObj->setComretlab($this->comretlab);

		$copyObj->setFeccomretlab($this->feccomretlab);

		$copyObj->setNumsigecof($this->numsigecof);

		$copyObj->setFecsigecof($this->fecsigecof);

		$copyObj->setExpsigecof($this->expsigecof);

		$copyObj->setAprobadoord($this->aprobadoord);

		$copyObj->setCodmotanu($this->codmotanu);

		$copyObj->setUsuanu($this->usuanu);

		$copyObj->setAprobadotes($this->aprobadotes);

		$copyObj->setFecret($this->fecret);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setNumcomapr($this->numcomapr);

		$copyObj->setCodconcepto($this->codconcepto);

		$copyObj->setNumforpre($this->numforpre);

		$copyObj->setMotrecord($this->motrecord);

		$copyObj->setMotrectes($this->motrectes);

		$copyObj->setAprorddir($this->aprorddir);

		$copyObj->setCodcajchi($this->codcajchi);

		$copyObj->setNumcta($this->numcta);

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setLoguse($this->loguse);

		$copyObj->setCodfonant($this->codfonant);

		$copyObj->setAmortiza($this->amortiza);

		$copyObj->setCodmon($this->codmon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setOrdsnc($this->ordsnc);

		$copyObj->setCodsnc($this->codsnc);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecfin($this->fecfin);

		$copyObj->setMedcom($this->medcom);

		$copyObj->setModcon($this->modcon);

		$copyObj->setLugeje($this->lugeje);

		$copyObj->setNumcon($this->numcon);

		$copyObj->setMescon($this->mescon);

		$copyObj->setStaele($this->staele);

		$copyObj->setCodtde($this->codtde);

		$copyObj->setCodadi($this->codadi);

		$copyObj->setNumordamo($this->numordamo);

		$copyObj->setCodrgo($this->codrgo);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCoddirec($this->coddirec);

		$copyObj->setRefava($this->refava);

		$copyObj->setFecava($this->fecava);

		$copyObj->setNompacava($this->nompacava);

		$copyObj->setCedpacava($this->cedpacava);

		$copyObj->setMotsolava($this->motsolava);

		$copyObj->setMoncarava($this->moncarava);

		$copyObj->setUsuaprord($this->usuaprord);

		$copyObj->setFecaprord($this->fecaprord);

		$copyObj->setUsuaprdir($this->usuaprdir);

		$copyObj->setFecaprdir($this->fecaprdir);

		$copyObj->setUsuaprtes($this->usuaprtes);

		$copyObj->setFecaprtes($this->fecaprtes);

		$copyObj->setAprproord($this->aprproord);

		$copyObj->setUsuaprpro($this->usuaprpro);

		$copyObj->setFecaprpro($this->fecaprpro);

		$copyObj->setObspropag($this->obspropag);

		$copyObj->setNumval($this->numval);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getOpdetsolpags() as $relObj) {
				$copyObj->addOpdetsolpag($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new OpordpagPeer();
		}
		return self::$peer;
	}

	
	public function setOpbenefi($v)
	{


		if ($v === null) {
			$this->setCedrif(NULL);
		} else {
			$this->setCedrif($v->getCedrif());
		}


		$this->aOpbenefi = $v;
	}


	
	public function getOpbenefi($con = null)
	{
		if ($this->aOpbenefi === null && (($this->cedrif !== "" && $this->cedrif !== null))) {
						include_once 'lib/model/om/BaseOpbenefiPeer.php';

      $c = new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$this->cedrif);
      
			$this->aOpbenefi = OpbenefiPeer::doSelectOne($c, $con);

			
		}
		return $this->aOpbenefi;
	}

	
	public function setTsdefmon($v)
	{


		if ($v === null) {
			$this->setCodmon(NULL);
		} else {
			$this->setCodmon($v->getCodmon());
		}


		$this->aTsdefmon = $v;
	}


	
	public function getTsdefmon($con = null)
	{
		if ($this->aTsdefmon === null && (($this->codmon !== "" && $this->codmon !== null))) {
						include_once 'lib/model/om/BaseTsdefmonPeer.php';

      $c = new Criteria();
      $c->add(TsdefmonPeer::CODMON,$this->codmon);
      
			$this->aTsdefmon = TsdefmonPeer::doSelectOne($c, $con);

			
		}
		return $this->aTsdefmon;
	}

	
	public function initOpdetsolpags()
	{
		if ($this->collOpdetsolpags === null) {
			$this->collOpdetsolpags = array();
		}
	}

	
	public function getOpdetsolpags($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOpdetsolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOpdetsolpags === null) {
			if ($this->isNew()) {
			   $this->collOpdetsolpags = array();
			} else {

				$criteria->add(OpdetsolpagPeer::REFORD, $this->getNumord());

				OpdetsolpagPeer::addSelectColumns($criteria);
				$this->collOpdetsolpags = OpdetsolpagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(OpdetsolpagPeer::REFORD, $this->getNumord());

				OpdetsolpagPeer::addSelectColumns($criteria);
				if (!isset($this->lastOpdetsolpagCriteria) || !$this->lastOpdetsolpagCriteria->equals($criteria)) {
					$this->collOpdetsolpags = OpdetsolpagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastOpdetsolpagCriteria = $criteria;
		return $this->collOpdetsolpags;
	}

	
	public function countOpdetsolpags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseOpdetsolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(OpdetsolpagPeer::REFORD, $this->getNumord());

		return OpdetsolpagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addOpdetsolpag(Opdetsolpag $l)
	{
		$this->collOpdetsolpags[] = $l;
		$l->setOpordpag($this);
	}


	
	public function getOpdetsolpagsJoinOpsolpag($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseOpdetsolpagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collOpdetsolpags === null) {
			if ($this->isNew()) {
				$this->collOpdetsolpags = array();
			} else {

				$criteria->add(OpdetsolpagPeer::REFORD, $this->getNumord());

				$this->collOpdetsolpags = OpdetsolpagPeer::doSelectJoinOpsolpag($criteria, $con);
			}
		} else {
									
			$criteria->add(OpdetsolpagPeer::REFORD, $this->getNumord());

			if (!isset($this->lastOpdetsolpagCriteria) || !$this->lastOpdetsolpagCriteria->equals($criteria)) {
				$this->collOpdetsolpags = OpdetsolpagPeer::doSelectJoinOpsolpag($criteria, $con);
			}
		}
		$this->lastOpdetsolpagCriteria = $criteria;

		return $this->collOpdetsolpags;
	}

} 