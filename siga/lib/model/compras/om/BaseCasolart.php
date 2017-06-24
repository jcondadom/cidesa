<?php


abstract class BaseCasolart extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reqart;


	
	protected $fecreq;


	
	protected $desreq;


	
	protected $monreq;


	
	protected $stareq;


	
	protected $motreq;


	
	protected $benreq;


	
	protected $mondes;


	
	protected $obsreq;


	
	protected $unires;


	
	protected $tipmon;


	
	protected $valmon;


	
	protected $fecanu;


	
	protected $codpro;


	
	protected $reqcom;


	
	protected $tipfin;


	
	protected $tipreq;


	
	protected $aprreq;


	
	protected $usuapr;


	
	protected $fecapr;


	
	protected $codemp;


	
	protected $codcen;


	
	protected $numproc;


	
	protected $codeve;


	
	protected $coddirec;


	
	protected $coddivi;


	
	protected $loguse;


	
	protected $fecana;


	
	protected $codubi;


	
	protected $nomben;


	
	protected $cedrif;


	
	protected $fecsal;


	
	protected $horsal;


	
	protected $fecreg;


	
	protected $horreg;


	
	protected $codreg;


	
	protected $prebas;


	
	protected $lugent;


	
	protected $aprgesadm = 'N';


	
	protected $usuaprgad;


	
	protected $fecaprgad;


	
	protected $aprdiradq = 'N';


	
	protected $usuaprdad;


	
	protected $fecaprdad;


	
	protected $id;

	
	protected $aTsdefmon;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReqart()
  {

    return trim($this->reqart);

  }
  
  public function getFecreq($format = 'Y-m-d')
  {

    if ($this->fecreq === null || $this->fecreq === '') {
      return null;
    } elseif (!is_int($this->fecreq)) {
            $ts = adodb_strtotime($this->fecreq);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreq] as date/time value: " . var_export($this->fecreq, true));
      }
    } else {
      $ts = $this->fecreq;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesreq()
  {

    return trim($this->desreq);

  }
  
  public function getMonreq($val=false)
  {

    if($val) return number_format($this->monreq,2,',','.');
    else return $this->monreq;

  }
  
  public function getStareq()
  {

    return trim($this->stareq);

  }
  
  public function getMotreq()
  {

    return trim($this->motreq);

  }
  
  public function getBenreq()
  {

    return trim($this->benreq);

  }
  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getObsreq()
  {

    return trim($this->obsreq);

  }
  
  public function getUnires()
  {

    return trim($this->unires);

  }
  
  public function getTipmon()
  {

    return trim($this->tipmon);

  }
  
  public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,2,',','.');
    else return $this->valmon;

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

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getReqcom()
  {

    return trim($this->reqcom);

  }
  
  public function getTipfin()
  {

    return trim($this->tipfin);

  }
  
  public function getTipreq()
  {

    return $this->tipreq;

  }
  
  public function getAprreq()
  {

    return $this->aprreq;

  }
  
  public function getUsuapr()
  {

    return trim($this->usuapr);

  }
  
  public function getFecapr($format = 'Y-m-d')
  {

    if ($this->fecapr === null || $this->fecapr === '') {
      return null;
    } elseif (!is_int($this->fecapr)) {
            $ts = adodb_strtotime($this->fecapr);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecapr] as date/time value: " . var_export($this->fecapr, true));
      }
    } else {
      $ts = $this->fecapr;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodcen()
  {

    return trim($this->codcen);

  }
  
  public function getNumproc()
  {

    return trim($this->numproc);

  }
  
  public function getCodeve()
  {

    return trim($this->codeve);

  }
  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getCoddivi()
  {

    return trim($this->coddivi);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getFecana($format = 'Y-m-d')
  {

    if ($this->fecana === null || $this->fecana === '') {
      return null;
    } elseif (!is_int($this->fecana)) {
            $ts = adodb_strtotime($this->fecana);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecana] as date/time value: " . var_export($this->fecana, true));
      }
    } else {
      $ts = $this->fecana;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getNomben()
  {

    return trim($this->nomben);

  }
  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getFecsal($format = 'Y-m-d')
  {

    if ($this->fecsal === null || $this->fecsal === '') {
      return null;
    } elseif (!is_int($this->fecsal)) {
            $ts = adodb_strtotime($this->fecsal);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsal] as date/time value: " . var_export($this->fecsal, true));
      }
    } else {
      $ts = $this->fecsal;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHorsal()
  {

    return trim($this->horsal);

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHorreg()
  {

    return trim($this->horreg);

  }
  
  public function getCodreg()
  {

    return trim($this->codreg);

  }
  
  public function getPrebas()
  {

    return trim($this->prebas);

  }
  
  public function getLugent()
  {

    return trim($this->lugent);

  }
  
  public function getAprgesadm()
  {

    return $this->aprgesadm;

  }
  
  public function getUsuaprgad()
  {

    return trim($this->usuaprgad);

  }
  
  public function getFecaprgad($format = 'Y-m-d')
  {

    if ($this->fecaprgad === null || $this->fecaprgad === '') {
      return null;
    } elseif (!is_int($this->fecaprgad)) {
            $ts = adodb_strtotime($this->fecaprgad);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaprgad] as date/time value: " . var_export($this->fecaprgad, true));
      }
    } else {
      $ts = $this->fecaprgad;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAprdiradq()
  {

    return $this->aprdiradq;

  }
  
  public function getUsuaprdad()
  {

    return trim($this->usuaprdad);

  }
  
  public function getFecaprdad($format = 'Y-m-d')
  {

    if ($this->fecaprdad === null || $this->fecaprdad === '') {
      return null;
    } elseif (!is_int($this->fecaprdad)) {
            $ts = adodb_strtotime($this->fecaprdad);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaprdad] as date/time value: " . var_export($this->fecaprdad, true));
      }
    } else {
      $ts = $this->fecaprdad;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReqart($v)
	{

    if ($this->reqart !== $v) {
        $this->reqart = $v;
        $this->modifiedColumns[] = CasolartPeer::REQART;
      }
  
	} 
	
	public function setFecreq($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreq] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreq !== $ts) {
      $this->fecreq = $ts;
      $this->modifiedColumns[] = CasolartPeer::FECREQ;
    }

	} 
	
	public function setDesreq($v)
	{

    if ($this->desreq !== $v) {
        $this->desreq = $v;
        $this->modifiedColumns[] = CasolartPeer::DESREQ;
      }
  
	} 
	
	public function setMonreq($v)
	{

    if ($this->monreq !== $v) {
        $this->monreq = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CasolartPeer::MONREQ;
      }
  
	} 
	
	public function setStareq($v)
	{

    if ($this->stareq !== $v) {
        $this->stareq = $v;
        $this->modifiedColumns[] = CasolartPeer::STAREQ;
      }
  
	} 
	
	public function setMotreq($v)
	{

    if ($this->motreq !== $v) {
        $this->motreq = $v;
        $this->modifiedColumns[] = CasolartPeer::MOTREQ;
      }
  
	} 
	
	public function setBenreq($v)
	{

    if ($this->benreq !== $v) {
        $this->benreq = $v;
        $this->modifiedColumns[] = CasolartPeer::BENREQ;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CasolartPeer::MONDES;
      }
  
	} 
	
	public function setObsreq($v)
	{

    if ($this->obsreq !== $v) {
        $this->obsreq = $v;
        $this->modifiedColumns[] = CasolartPeer::OBSREQ;
      }
  
	} 
	
	public function setUnires($v)
	{

    if ($this->unires !== $v) {
        $this->unires = $v;
        $this->modifiedColumns[] = CasolartPeer::UNIRES;
      }
  
	} 
	
	public function setTipmon($v)
	{

    if ($this->tipmon !== $v) {
        $this->tipmon = $v;
        $this->modifiedColumns[] = CasolartPeer::TIPMON;
      }
  
		if ($this->aTsdefmon !== null && $this->aTsdefmon->getCodmon() !== $v) {
			$this->aTsdefmon = null;
		}

	} 
	
	public function setValmon($v)
	{

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CasolartPeer::VALMON;
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
      $this->modifiedColumns[] = CasolartPeer::FECANU;
    }

	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = CasolartPeer::CODPRO;
      }
  
	} 
	
	public function setReqcom($v)
	{

    if ($this->reqcom !== $v) {
        $this->reqcom = $v;
        $this->modifiedColumns[] = CasolartPeer::REQCOM;
      }
  
	} 
	
	public function setTipfin($v)
	{

    if ($this->tipfin !== $v) {
        $this->tipfin = $v;
        $this->modifiedColumns[] = CasolartPeer::TIPFIN;
      }
  
	} 
	
	public function setTipreq($v)
	{

    if ($this->tipreq !== $v) {
        $this->tipreq = $v;
        $this->modifiedColumns[] = CasolartPeer::TIPREQ;
      }
  
	} 
	
	public function setAprreq($v)
	{

    if ($this->aprreq !== $v) {
        $this->aprreq = $v;
        $this->modifiedColumns[] = CasolartPeer::APRREQ;
      }
  
	} 
	
	public function setUsuapr($v)
	{

    if ($this->usuapr !== $v) {
        $this->usuapr = $v;
        $this->modifiedColumns[] = CasolartPeer::USUAPR;
      }
  
	} 
	
	public function setFecapr($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecapr] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecapr !== $ts) {
      $this->fecapr = $ts;
      $this->modifiedColumns[] = CasolartPeer::FECAPR;
    }

	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = CasolartPeer::CODEMP;
      }
  
	} 
	
	public function setCodcen($v)
	{

    if ($this->codcen !== $v) {
        $this->codcen = $v;
        $this->modifiedColumns[] = CasolartPeer::CODCEN;
      }
  
	} 
	
	public function setNumproc($v)
	{

    if ($this->numproc !== $v) {
        $this->numproc = $v;
        $this->modifiedColumns[] = CasolartPeer::NUMPROC;
      }
  
	} 
	
	public function setCodeve($v)
	{

    if ($this->codeve !== $v) {
        $this->codeve = $v;
        $this->modifiedColumns[] = CasolartPeer::CODEVE;
      }
  
	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = CasolartPeer::CODDIREC;
      }
  
	} 
	
	public function setCoddivi($v)
	{

    if ($this->coddivi !== $v) {
        $this->coddivi = $v;
        $this->modifiedColumns[] = CasolartPeer::CODDIVI;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = CasolartPeer::LOGUSE;
      }
  
	} 
	
	public function setFecana($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecana] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecana !== $ts) {
      $this->fecana = $ts;
      $this->modifiedColumns[] = CasolartPeer::FECANA;
    }

	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = CasolartPeer::CODUBI;
      }
  
	} 
	
	public function setNomben($v)
	{

    if ($this->nomben !== $v) {
        $this->nomben = $v;
        $this->modifiedColumns[] = CasolartPeer::NOMBEN;
      }
  
	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = CasolartPeer::CEDRIF;
      }
  
	} 
	
	public function setFecsal($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsal] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsal !== $ts) {
      $this->fecsal = $ts;
      $this->modifiedColumns[] = CasolartPeer::FECSAL;
    }

	} 
	
	public function setHorsal($v)
	{

    if ($this->horsal !== $v) {
        $this->horsal = $v;
        $this->modifiedColumns[] = CasolartPeer::HORSAL;
      }
  
	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = CasolartPeer::FECREG;
    }

	} 
	
	public function setHorreg($v)
	{

    if ($this->horreg !== $v) {
        $this->horreg = $v;
        $this->modifiedColumns[] = CasolartPeer::HORREG;
      }
  
	} 
	
	public function setCodreg($v)
	{

    if ($this->codreg !== $v) {
        $this->codreg = $v;
        $this->modifiedColumns[] = CasolartPeer::CODREG;
      }
  
	} 
	
	public function setPrebas($v)
	{

    if ($this->prebas !== $v) {
        $this->prebas = $v;
        $this->modifiedColumns[] = CasolartPeer::PREBAS;
      }
  
	} 
	
	public function setLugent($v)
	{

    if ($this->lugent !== $v) {
        $this->lugent = $v;
        $this->modifiedColumns[] = CasolartPeer::LUGENT;
      }
  
	} 
	
	public function setAprgesadm($v)
	{

    if ($this->aprgesadm !== $v || $v === 'N') {
        $this->aprgesadm = $v;
        $this->modifiedColumns[] = CasolartPeer::APRGESADM;
      }
  
	} 
	
	public function setUsuaprgad($v)
	{

    if ($this->usuaprgad !== $v) {
        $this->usuaprgad = $v;
        $this->modifiedColumns[] = CasolartPeer::USUAPRGAD;
      }
  
	} 
	
	public function setFecaprgad($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaprgad] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaprgad !== $ts) {
      $this->fecaprgad = $ts;
      $this->modifiedColumns[] = CasolartPeer::FECAPRGAD;
    }

	} 
	
	public function setAprdiradq($v)
	{

    if ($this->aprdiradq !== $v || $v === 'N') {
        $this->aprdiradq = $v;
        $this->modifiedColumns[] = CasolartPeer::APRDIRADQ;
      }
  
	} 
	
	public function setUsuaprdad($v)
	{

    if ($this->usuaprdad !== $v) {
        $this->usuaprdad = $v;
        $this->modifiedColumns[] = CasolartPeer::USUAPRDAD;
      }
  
	} 
	
	public function setFecaprdad($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaprdad] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaprdad !== $ts) {
      $this->fecaprdad = $ts;
      $this->modifiedColumns[] = CasolartPeer::FECAPRDAD;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CasolartPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reqart = $rs->getString($startcol + 0);

      $this->fecreq = $rs->getDate($startcol + 1, null);

      $this->desreq = $rs->getString($startcol + 2);

      $this->monreq = $rs->getFloat($startcol + 3);

      $this->stareq = $rs->getString($startcol + 4);

      $this->motreq = $rs->getString($startcol + 5);

      $this->benreq = $rs->getString($startcol + 6);

      $this->mondes = $rs->getFloat($startcol + 7);

      $this->obsreq = $rs->getString($startcol + 8);

      $this->unires = $rs->getString($startcol + 9);

      $this->tipmon = $rs->getString($startcol + 10);

      $this->valmon = $rs->getFloat($startcol + 11);

      $this->fecanu = $rs->getDate($startcol + 12, null);

      $this->codpro = $rs->getString($startcol + 13);

      $this->reqcom = $rs->getString($startcol + 14);

      $this->tipfin = $rs->getString($startcol + 15);

      $this->tipreq = $rs->getString($startcol + 16);

      $this->aprreq = $rs->getString($startcol + 17);

      $this->usuapr = $rs->getString($startcol + 18);

      $this->fecapr = $rs->getDate($startcol + 19, null);

      $this->codemp = $rs->getString($startcol + 20);

      $this->codcen = $rs->getString($startcol + 21);

      $this->numproc = $rs->getString($startcol + 22);

      $this->codeve = $rs->getString($startcol + 23);

      $this->coddirec = $rs->getString($startcol + 24);

      $this->coddivi = $rs->getString($startcol + 25);

      $this->loguse = $rs->getString($startcol + 26);

      $this->fecana = $rs->getDate($startcol + 27, null);

      $this->codubi = $rs->getString($startcol + 28);

      $this->nomben = $rs->getString($startcol + 29);

      $this->cedrif = $rs->getString($startcol + 30);

      $this->fecsal = $rs->getDate($startcol + 31, null);

      $this->horsal = $rs->getString($startcol + 32);

      $this->fecreg = $rs->getDate($startcol + 33, null);

      $this->horreg = $rs->getString($startcol + 34);

      $this->codreg = $rs->getString($startcol + 35);

      $this->prebas = $rs->getString($startcol + 36);

      $this->lugent = $rs->getString($startcol + 37);

      $this->aprgesadm = $rs->getString($startcol + 38);

      $this->usuaprgad = $rs->getString($startcol + 39);

      $this->fecaprgad = $rs->getDate($startcol + 40, null);

      $this->aprdiradq = $rs->getString($startcol + 41);

      $this->usuaprdad = $rs->getString($startcol + 42);

      $this->fecaprdad = $rs->getDate($startcol + 43, null);

      $this->id = $rs->getInt($startcol + 44);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 45; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Casolart object", $e);
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
			$con = Propel::getConnection(CasolartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CasolartPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CasolartPeer::DATABASE_NAME);
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


												
			if ($this->aTsdefmon !== null) {
				if ($this->aTsdefmon->isModified()) {
					$affectedRows += $this->aTsdefmon->save($con);
				}
				$this->setTsdefmon($this->aTsdefmon);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CasolartPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CasolartPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aTsdefmon !== null) {
				if (!$this->aTsdefmon->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTsdefmon->getValidationFailures());
				}
			}


			if (($retval = CasolartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CasolartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReqart();
				break;
			case 1:
				return $this->getFecreq();
				break;
			case 2:
				return $this->getDesreq();
				break;
			case 3:
				return $this->getMonreq();
				break;
			case 4:
				return $this->getStareq();
				break;
			case 5:
				return $this->getMotreq();
				break;
			case 6:
				return $this->getBenreq();
				break;
			case 7:
				return $this->getMondes();
				break;
			case 8:
				return $this->getObsreq();
				break;
			case 9:
				return $this->getUnires();
				break;
			case 10:
				return $this->getTipmon();
				break;
			case 11:
				return $this->getValmon();
				break;
			case 12:
				return $this->getFecanu();
				break;
			case 13:
				return $this->getCodpro();
				break;
			case 14:
				return $this->getReqcom();
				break;
			case 15:
				return $this->getTipfin();
				break;
			case 16:
				return $this->getTipreq();
				break;
			case 17:
				return $this->getAprreq();
				break;
			case 18:
				return $this->getUsuapr();
				break;
			case 19:
				return $this->getFecapr();
				break;
			case 20:
				return $this->getCodemp();
				break;
			case 21:
				return $this->getCodcen();
				break;
			case 22:
				return $this->getNumproc();
				break;
			case 23:
				return $this->getCodeve();
				break;
			case 24:
				return $this->getCoddirec();
				break;
			case 25:
				return $this->getCoddivi();
				break;
			case 26:
				return $this->getLoguse();
				break;
			case 27:
				return $this->getFecana();
				break;
			case 28:
				return $this->getCodubi();
				break;
			case 29:
				return $this->getNomben();
				break;
			case 30:
				return $this->getCedrif();
				break;
			case 31:
				return $this->getFecsal();
				break;
			case 32:
				return $this->getHorsal();
				break;
			case 33:
				return $this->getFecreg();
				break;
			case 34:
				return $this->getHorreg();
				break;
			case 35:
				return $this->getCodreg();
				break;
			case 36:
				return $this->getPrebas();
				break;
			case 37:
				return $this->getLugent();
				break;
			case 38:
				return $this->getAprgesadm();
				break;
			case 39:
				return $this->getUsuaprgad();
				break;
			case 40:
				return $this->getFecaprgad();
				break;
			case 41:
				return $this->getAprdiradq();
				break;
			case 42:
				return $this->getUsuaprdad();
				break;
			case 43:
				return $this->getFecaprdad();
				break;
			case 44:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CasolartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReqart(),
			$keys[1] => $this->getFecreq(),
			$keys[2] => $this->getDesreq(),
			$keys[3] => $this->getMonreq(),
			$keys[4] => $this->getStareq(),
			$keys[5] => $this->getMotreq(),
			$keys[6] => $this->getBenreq(),
			$keys[7] => $this->getMondes(),
			$keys[8] => $this->getObsreq(),
			$keys[9] => $this->getUnires(),
			$keys[10] => $this->getTipmon(),
			$keys[11] => $this->getValmon(),
			$keys[12] => $this->getFecanu(),
			$keys[13] => $this->getCodpro(),
			$keys[14] => $this->getReqcom(),
			$keys[15] => $this->getTipfin(),
			$keys[16] => $this->getTipreq(),
			$keys[17] => $this->getAprreq(),
			$keys[18] => $this->getUsuapr(),
			$keys[19] => $this->getFecapr(),
			$keys[20] => $this->getCodemp(),
			$keys[21] => $this->getCodcen(),
			$keys[22] => $this->getNumproc(),
			$keys[23] => $this->getCodeve(),
			$keys[24] => $this->getCoddirec(),
			$keys[25] => $this->getCoddivi(),
			$keys[26] => $this->getLoguse(),
			$keys[27] => $this->getFecana(),
			$keys[28] => $this->getCodubi(),
			$keys[29] => $this->getNomben(),
			$keys[30] => $this->getCedrif(),
			$keys[31] => $this->getFecsal(),
			$keys[32] => $this->getHorsal(),
			$keys[33] => $this->getFecreg(),
			$keys[34] => $this->getHorreg(),
			$keys[35] => $this->getCodreg(),
			$keys[36] => $this->getPrebas(),
			$keys[37] => $this->getLugent(),
			$keys[38] => $this->getAprgesadm(),
			$keys[39] => $this->getUsuaprgad(),
			$keys[40] => $this->getFecaprgad(),
			$keys[41] => $this->getAprdiradq(),
			$keys[42] => $this->getUsuaprdad(),
			$keys[43] => $this->getFecaprdad(),
			$keys[44] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CasolartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReqart($value);
				break;
			case 1:
				$this->setFecreq($value);
				break;
			case 2:
				$this->setDesreq($value);
				break;
			case 3:
				$this->setMonreq($value);
				break;
			case 4:
				$this->setStareq($value);
				break;
			case 5:
				$this->setMotreq($value);
				break;
			case 6:
				$this->setBenreq($value);
				break;
			case 7:
				$this->setMondes($value);
				break;
			case 8:
				$this->setObsreq($value);
				break;
			case 9:
				$this->setUnires($value);
				break;
			case 10:
				$this->setTipmon($value);
				break;
			case 11:
				$this->setValmon($value);
				break;
			case 12:
				$this->setFecanu($value);
				break;
			case 13:
				$this->setCodpro($value);
				break;
			case 14:
				$this->setReqcom($value);
				break;
			case 15:
				$this->setTipfin($value);
				break;
			case 16:
				$this->setTipreq($value);
				break;
			case 17:
				$this->setAprreq($value);
				break;
			case 18:
				$this->setUsuapr($value);
				break;
			case 19:
				$this->setFecapr($value);
				break;
			case 20:
				$this->setCodemp($value);
				break;
			case 21:
				$this->setCodcen($value);
				break;
			case 22:
				$this->setNumproc($value);
				break;
			case 23:
				$this->setCodeve($value);
				break;
			case 24:
				$this->setCoddirec($value);
				break;
			case 25:
				$this->setCoddivi($value);
				break;
			case 26:
				$this->setLoguse($value);
				break;
			case 27:
				$this->setFecana($value);
				break;
			case 28:
				$this->setCodubi($value);
				break;
			case 29:
				$this->setNomben($value);
				break;
			case 30:
				$this->setCedrif($value);
				break;
			case 31:
				$this->setFecsal($value);
				break;
			case 32:
				$this->setHorsal($value);
				break;
			case 33:
				$this->setFecreg($value);
				break;
			case 34:
				$this->setHorreg($value);
				break;
			case 35:
				$this->setCodreg($value);
				break;
			case 36:
				$this->setPrebas($value);
				break;
			case 37:
				$this->setLugent($value);
				break;
			case 38:
				$this->setAprgesadm($value);
				break;
			case 39:
				$this->setUsuaprgad($value);
				break;
			case 40:
				$this->setFecaprgad($value);
				break;
			case 41:
				$this->setAprdiradq($value);
				break;
			case 42:
				$this->setUsuaprdad($value);
				break;
			case 43:
				$this->setFecaprdad($value);
				break;
			case 44:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CasolartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReqart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecreq($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesreq($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonreq($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStareq($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMotreq($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBenreq($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMondes($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setObsreq($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUnires($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTipmon($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setValmon($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecanu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodpro($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setReqcom($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTipfin($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setTipreq($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setAprreq($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setUsuapr($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFecapr($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodemp($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCodcen($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setNumproc($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCodeve($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCoddirec($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCoddivi($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setLoguse($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setFecana($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCodubi($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setNomben($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCedrif($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setFecsal($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setHorsal($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setFecreg($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setHorreg($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setCodreg($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setPrebas($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setLugent($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setAprgesadm($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setUsuaprgad($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setFecaprgad($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setAprdiradq($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setUsuaprdad($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setFecaprdad($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setId($arr[$keys[44]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CasolartPeer::DATABASE_NAME);

		if ($this->isColumnModified(CasolartPeer::REQART)) $criteria->add(CasolartPeer::REQART, $this->reqart);
		if ($this->isColumnModified(CasolartPeer::FECREQ)) $criteria->add(CasolartPeer::FECREQ, $this->fecreq);
		if ($this->isColumnModified(CasolartPeer::DESREQ)) $criteria->add(CasolartPeer::DESREQ, $this->desreq);
		if ($this->isColumnModified(CasolartPeer::MONREQ)) $criteria->add(CasolartPeer::MONREQ, $this->monreq);
		if ($this->isColumnModified(CasolartPeer::STAREQ)) $criteria->add(CasolartPeer::STAREQ, $this->stareq);
		if ($this->isColumnModified(CasolartPeer::MOTREQ)) $criteria->add(CasolartPeer::MOTREQ, $this->motreq);
		if ($this->isColumnModified(CasolartPeer::BENREQ)) $criteria->add(CasolartPeer::BENREQ, $this->benreq);
		if ($this->isColumnModified(CasolartPeer::MONDES)) $criteria->add(CasolartPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(CasolartPeer::OBSREQ)) $criteria->add(CasolartPeer::OBSREQ, $this->obsreq);
		if ($this->isColumnModified(CasolartPeer::UNIRES)) $criteria->add(CasolartPeer::UNIRES, $this->unires);
		if ($this->isColumnModified(CasolartPeer::TIPMON)) $criteria->add(CasolartPeer::TIPMON, $this->tipmon);
		if ($this->isColumnModified(CasolartPeer::VALMON)) $criteria->add(CasolartPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(CasolartPeer::FECANU)) $criteria->add(CasolartPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CasolartPeer::CODPRO)) $criteria->add(CasolartPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(CasolartPeer::REQCOM)) $criteria->add(CasolartPeer::REQCOM, $this->reqcom);
		if ($this->isColumnModified(CasolartPeer::TIPFIN)) $criteria->add(CasolartPeer::TIPFIN, $this->tipfin);
		if ($this->isColumnModified(CasolartPeer::TIPREQ)) $criteria->add(CasolartPeer::TIPREQ, $this->tipreq);
		if ($this->isColumnModified(CasolartPeer::APRREQ)) $criteria->add(CasolartPeer::APRREQ, $this->aprreq);
		if ($this->isColumnModified(CasolartPeer::USUAPR)) $criteria->add(CasolartPeer::USUAPR, $this->usuapr);
		if ($this->isColumnModified(CasolartPeer::FECAPR)) $criteria->add(CasolartPeer::FECAPR, $this->fecapr);
		if ($this->isColumnModified(CasolartPeer::CODEMP)) $criteria->add(CasolartPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(CasolartPeer::CODCEN)) $criteria->add(CasolartPeer::CODCEN, $this->codcen);
		if ($this->isColumnModified(CasolartPeer::NUMPROC)) $criteria->add(CasolartPeer::NUMPROC, $this->numproc);
		if ($this->isColumnModified(CasolartPeer::CODEVE)) $criteria->add(CasolartPeer::CODEVE, $this->codeve);
		if ($this->isColumnModified(CasolartPeer::CODDIREC)) $criteria->add(CasolartPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(CasolartPeer::CODDIVI)) $criteria->add(CasolartPeer::CODDIVI, $this->coddivi);
		if ($this->isColumnModified(CasolartPeer::LOGUSE)) $criteria->add(CasolartPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(CasolartPeer::FECANA)) $criteria->add(CasolartPeer::FECANA, $this->fecana);
		if ($this->isColumnModified(CasolartPeer::CODUBI)) $criteria->add(CasolartPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(CasolartPeer::NOMBEN)) $criteria->add(CasolartPeer::NOMBEN, $this->nomben);
		if ($this->isColumnModified(CasolartPeer::CEDRIF)) $criteria->add(CasolartPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(CasolartPeer::FECSAL)) $criteria->add(CasolartPeer::FECSAL, $this->fecsal);
		if ($this->isColumnModified(CasolartPeer::HORSAL)) $criteria->add(CasolartPeer::HORSAL, $this->horsal);
		if ($this->isColumnModified(CasolartPeer::FECREG)) $criteria->add(CasolartPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(CasolartPeer::HORREG)) $criteria->add(CasolartPeer::HORREG, $this->horreg);
		if ($this->isColumnModified(CasolartPeer::CODREG)) $criteria->add(CasolartPeer::CODREG, $this->codreg);
		if ($this->isColumnModified(CasolartPeer::PREBAS)) $criteria->add(CasolartPeer::PREBAS, $this->prebas);
		if ($this->isColumnModified(CasolartPeer::LUGENT)) $criteria->add(CasolartPeer::LUGENT, $this->lugent);
		if ($this->isColumnModified(CasolartPeer::APRGESADM)) $criteria->add(CasolartPeer::APRGESADM, $this->aprgesadm);
		if ($this->isColumnModified(CasolartPeer::USUAPRGAD)) $criteria->add(CasolartPeer::USUAPRGAD, $this->usuaprgad);
		if ($this->isColumnModified(CasolartPeer::FECAPRGAD)) $criteria->add(CasolartPeer::FECAPRGAD, $this->fecaprgad);
		if ($this->isColumnModified(CasolartPeer::APRDIRADQ)) $criteria->add(CasolartPeer::APRDIRADQ, $this->aprdiradq);
		if ($this->isColumnModified(CasolartPeer::USUAPRDAD)) $criteria->add(CasolartPeer::USUAPRDAD, $this->usuaprdad);
		if ($this->isColumnModified(CasolartPeer::FECAPRDAD)) $criteria->add(CasolartPeer::FECAPRDAD, $this->fecaprdad);
		if ($this->isColumnModified(CasolartPeer::ID)) $criteria->add(CasolartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CasolartPeer::DATABASE_NAME);

		$criteria->add(CasolartPeer::ID, $this->id);

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

		$copyObj->setReqart($this->reqart);

		$copyObj->setFecreq($this->fecreq);

		$copyObj->setDesreq($this->desreq);

		$copyObj->setMonreq($this->monreq);

		$copyObj->setStareq($this->stareq);

		$copyObj->setMotreq($this->motreq);

		$copyObj->setBenreq($this->benreq);

		$copyObj->setMondes($this->mondes);

		$copyObj->setObsreq($this->obsreq);

		$copyObj->setUnires($this->unires);

		$copyObj->setTipmon($this->tipmon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setReqcom($this->reqcom);

		$copyObj->setTipfin($this->tipfin);

		$copyObj->setTipreq($this->tipreq);

		$copyObj->setAprreq($this->aprreq);

		$copyObj->setUsuapr($this->usuapr);

		$copyObj->setFecapr($this->fecapr);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcen($this->codcen);

		$copyObj->setNumproc($this->numproc);

		$copyObj->setCodeve($this->codeve);

		$copyObj->setCoddirec($this->coddirec);

		$copyObj->setCoddivi($this->coddivi);

		$copyObj->setLoguse($this->loguse);

		$copyObj->setFecana($this->fecana);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setNomben($this->nomben);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setFecsal($this->fecsal);

		$copyObj->setHorsal($this->horsal);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setHorreg($this->horreg);

		$copyObj->setCodreg($this->codreg);

		$copyObj->setPrebas($this->prebas);

		$copyObj->setLugent($this->lugent);

		$copyObj->setAprgesadm($this->aprgesadm);

		$copyObj->setUsuaprgad($this->usuaprgad);

		$copyObj->setFecaprgad($this->fecaprgad);

		$copyObj->setAprdiradq($this->aprdiradq);

		$copyObj->setUsuaprdad($this->usuaprdad);

		$copyObj->setFecaprdad($this->fecaprdad);


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
			self::$peer = new CasolartPeer();
		}
		return self::$peer;
	}

	
	public function setTsdefmon($v)
	{


		if ($v === null) {
			$this->setTipmon(NULL);
		} else {
			$this->setTipmon($v->getCodmon());
		}


		$this->aTsdefmon = $v;
	}


	
	public function getTsdefmon($con = null)
	{
		if ($this->aTsdefmon === null && (($this->tipmon !== "" && $this->tipmon !== null))) {
						include_once 'lib/model/om/BaseTsdefmonPeer.php';

      $c = new Criteria();
      $c->add(TsdefmonPeer::CODMON,$this->tipmon);
      
			$this->aTsdefmon = TsdefmonPeer::doSelectOne($c, $con);

			
		}
		return $this->aTsdefmon;
	}

} 