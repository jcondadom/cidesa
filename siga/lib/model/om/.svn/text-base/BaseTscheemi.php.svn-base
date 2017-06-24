<?php


abstract class BaseTscheemi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numche;


	
	protected $numcue;


	
	protected $cedrif;


	
	protected $fecemi;


	
	protected $monche;


	
	protected $status;


	
	protected $codemi;


	
	protected $fecent;


	
	protected $codent;


	
	protected $obsent;


	
	protected $fecanu;


	
	protected $cedrec;


	
	protected $nomrec;


	
	protected $tipdoc;


	
	protected $fecing;


	
	protected $temporal;


	
	protected $temporal2;


	
	protected $nombensus;


	
	protected $anopre;


	
	protected $numtiq;


	
	protected $cedaut;


	
	protected $peraut;


	
	protected $numcomegr;


	
	protected $motdev;


	
	protected $fecdev;


	
	protected $codmon;


	
	protected $valmon;


	
	protected $codconcepto;


	
	protected $loguse;


	
	protected $conformado;


	
	protected $nomfuncon;


	
	protected $agenban;


	
	protected $fecconfor;


	
	protected $horconfor;


	
	protected $fotper;


	
	protected $fotced;


	
	protected $fotche;


	
	protected $comentcon;


	
	protected $coddirec;


	
	protected $fecreg;


	
	protected $cheimp;


	
	protected $fecimp;


	
	protected $fecentcon;


	
	protected $codpro;


	
	protected $codseg;


	
	protected $codcon;


	
	protected $cedrifsus;


	
	protected $id;

	
	protected $aTsdefmon;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumche()
  {

    return trim($this->numche);

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getCedrif()
  {

    return trim($this->cedrif);

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

  
  public function getMonche($val=false)
  {

    if($val) return number_format($this->monche,2,',','.');
    else return $this->monche;

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getCodemi()
  {

    return trim($this->codemi);

  }
  
  public function getFecent($format = 'Y-m-d')
  {

    if ($this->fecent === null || $this->fecent === '') {
      return null;
    } elseif (!is_int($this->fecent)) {
            $ts = adodb_strtotime($this->fecent);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecent] as date/time value: " . var_export($this->fecent, true));
      }
    } else {
      $ts = $this->fecent;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodent()
  {

    return trim($this->codent);

  }
  
  public function getObsent()
  {

    return trim($this->obsent);

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

  
  public function getCedrec()
  {

    return trim($this->cedrec);

  }
  
  public function getNomrec()
  {

    return trim($this->nomrec);

  }
  
  public function getTipdoc()
  {

    return trim($this->tipdoc);

  }
  
  public function getFecing($format = 'Y-m-d')
  {

    if ($this->fecing === null || $this->fecing === '') {
      return null;
    } elseif (!is_int($this->fecing)) {
            $ts = adodb_strtotime($this->fecing);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecing] as date/time value: " . var_export($this->fecing, true));
      }
    } else {
      $ts = $this->fecing;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTemporal()
  {

    return trim($this->temporal);

  }
  
  public function getTemporal2()
  {

    return trim($this->temporal2);

  }
  
  public function getNombensus()
  {

    return trim($this->nombensus);

  }
  
  public function getAnopre()
  {

    return trim($this->anopre);

  }
  
  public function getNumtiq()
  {

    return trim($this->numtiq);

  }
  
  public function getCedaut()
  {

    return trim($this->cedaut);

  }
  
  public function getPeraut()
  {

    return trim($this->peraut);

  }
  
  public function getNumcomegr()
  {

    return trim($this->numcomegr);

  }
  
  public function getMotdev()
  {

    return trim($this->motdev);

  }
  
  public function getFecdev($format = 'Y-m-d')
  {

    if ($this->fecdev === null || $this->fecdev === '') {
      return null;
    } elseif (!is_int($this->fecdev)) {
            $ts = adodb_strtotime($this->fecdev);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdev] as date/time value: " . var_export($this->fecdev, true));
      }
    } else {
      $ts = $this->fecdev;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
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
  
  public function getCodconcepto()
  {

    return trim($this->codconcepto);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getConformado()
  {

    return trim($this->conformado);

  }
  
  public function getNomfuncon()
  {

    return trim($this->nomfuncon);

  }
  
  public function getAgenban()
  {

    return trim($this->agenban);

  }
  
  public function getFecconfor($format = 'Y-m-d')
  {

    if ($this->fecconfor === null || $this->fecconfor === '') {
      return null;
    } elseif (!is_int($this->fecconfor)) {
            $ts = adodb_strtotime($this->fecconfor);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecconfor] as date/time value: " . var_export($this->fecconfor, true));
      }
    } else {
      $ts = $this->fecconfor;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHorconfor()
  {

    return trim($this->horconfor);

  }
  
  public function getFotper()
  {

    return trim($this->fotper);

  }
  
  public function getFotced()
  {

    return trim($this->fotced);

  }
  
  public function getFotche()
  {

    return trim($this->fotche);

  }
  
  public function getComentcon()
  {

    return trim($this->comentcon);

  }
  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getFecreg($format = 'Y-m-d H:i:s')
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

  
  public function getCheimp()
  {

    return trim($this->cheimp);

  }
  
  public function getFecimp($format = 'Y-m-d')
  {

    if ($this->fecimp === null || $this->fecimp === '') {
      return null;
    } elseif (!is_int($this->fecimp)) {
            $ts = adodb_strtotime($this->fecimp);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecimp] as date/time value: " . var_export($this->fecimp, true));
      }
    } else {
      $ts = $this->fecimp;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecentcon($format = 'Y-m-d')
  {

    if ($this->fecentcon === null || $this->fecentcon === '') {
      return null;
    } elseif (!is_int($this->fecentcon)) {
            $ts = adodb_strtotime($this->fecentcon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecentcon] as date/time value: " . var_export($this->fecentcon, true));
      }
    } else {
      $ts = $this->fecentcon;
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
  
  public function getCodseg()
  {

    return trim($this->codseg);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getCedrifsus()
  {

    return trim($this->cedrifsus);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumche($v)
	{

    if ($this->numche !== $v) {
        $this->numche = $v;
        $this->modifiedColumns[] = TscheemiPeer::NUMCHE;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = TscheemiPeer::NUMCUE;
      }
  
	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = TscheemiPeer::CEDRIF;
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
      $this->modifiedColumns[] = TscheemiPeer::FECEMI;
    }

	} 
	
	public function setMonche($v)
	{

    if ($this->monche !== $v) {
        $this->monche = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TscheemiPeer::MONCHE;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = TscheemiPeer::STATUS;
      }
  
	} 
	
	public function setCodemi($v)
	{

    if ($this->codemi !== $v) {
        $this->codemi = $v;
        $this->modifiedColumns[] = TscheemiPeer::CODEMI;
      }
  
	} 
	
	public function setFecent($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecent] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecent !== $ts) {
      $this->fecent = $ts;
      $this->modifiedColumns[] = TscheemiPeer::FECENT;
    }

	} 
	
	public function setCodent($v)
	{

    if ($this->codent !== $v) {
        $this->codent = $v;
        $this->modifiedColumns[] = TscheemiPeer::CODENT;
      }
  
	} 
	
	public function setObsent($v)
	{

    if ($this->obsent !== $v) {
        $this->obsent = $v;
        $this->modifiedColumns[] = TscheemiPeer::OBSENT;
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
      $this->modifiedColumns[] = TscheemiPeer::FECANU;
    }

	} 
	
	public function setCedrec($v)
	{

    if ($this->cedrec !== $v) {
        $this->cedrec = $v;
        $this->modifiedColumns[] = TscheemiPeer::CEDREC;
      }
  
	} 
	
	public function setNomrec($v)
	{

    if ($this->nomrec !== $v) {
        $this->nomrec = $v;
        $this->modifiedColumns[] = TscheemiPeer::NOMREC;
      }
  
	} 
	
	public function setTipdoc($v)
	{

    if ($this->tipdoc !== $v) {
        $this->tipdoc = $v;
        $this->modifiedColumns[] = TscheemiPeer::TIPDOC;
      }
  
	} 
	
	public function setFecing($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecing] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecing !== $ts) {
      $this->fecing = $ts;
      $this->modifiedColumns[] = TscheemiPeer::FECING;
    }

	} 
	
	public function setTemporal($v)
	{

    if ($this->temporal !== $v) {
        $this->temporal = $v;
        $this->modifiedColumns[] = TscheemiPeer::TEMPORAL;
      }
  
	} 
	
	public function setTemporal2($v)
	{

    if ($this->temporal2 !== $v) {
        $this->temporal2 = $v;
        $this->modifiedColumns[] = TscheemiPeer::TEMPORAL2;
      }
  
	} 
	
	public function setNombensus($v)
	{

    if ($this->nombensus !== $v) {
        $this->nombensus = $v;
        $this->modifiedColumns[] = TscheemiPeer::NOMBENSUS;
      }
  
	} 
	
	public function setAnopre($v)
	{

    if ($this->anopre !== $v) {
        $this->anopre = $v;
        $this->modifiedColumns[] = TscheemiPeer::ANOPRE;
      }
  
	} 
	
	public function setNumtiq($v)
	{

    if ($this->numtiq !== $v) {
        $this->numtiq = $v;
        $this->modifiedColumns[] = TscheemiPeer::NUMTIQ;
      }
  
	} 
	
	public function setCedaut($v)
	{

    if ($this->cedaut !== $v) {
        $this->cedaut = $v;
        $this->modifiedColumns[] = TscheemiPeer::CEDAUT;
      }
  
	} 
	
	public function setPeraut($v)
	{

    if ($this->peraut !== $v) {
        $this->peraut = $v;
        $this->modifiedColumns[] = TscheemiPeer::PERAUT;
      }
  
	} 
	
	public function setNumcomegr($v)
	{

    if ($this->numcomegr !== $v) {
        $this->numcomegr = $v;
        $this->modifiedColumns[] = TscheemiPeer::NUMCOMEGR;
      }
  
	} 
	
	public function setMotdev($v)
	{

    if ($this->motdev !== $v) {
        $this->motdev = $v;
        $this->modifiedColumns[] = TscheemiPeer::MOTDEV;
      }
  
	} 
	
	public function setFecdev($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdev] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdev !== $ts) {
      $this->fecdev = $ts;
      $this->modifiedColumns[] = TscheemiPeer::FECDEV;
    }

	} 
	
	public function setCodmon($v)
	{

    if ($this->codmon !== $v) {
        $this->codmon = $v;
        $this->modifiedColumns[] = TscheemiPeer::CODMON;
      }
  
		if ($this->aTsdefmon !== null && $this->aTsdefmon->getCodmon() !== $v) {
			$this->aTsdefmon = null;
		}

	} 
	
	public function setValmon($v)
	{

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TscheemiPeer::VALMON;
      }
  
	} 
	
	public function setCodconcepto($v)
	{

    if ($this->codconcepto !== $v) {
        $this->codconcepto = $v;
        $this->modifiedColumns[] = TscheemiPeer::CODCONCEPTO;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = TscheemiPeer::LOGUSE;
      }
  
	} 
	
	public function setConformado($v)
	{

    if ($this->conformado !== $v) {
        $this->conformado = $v;
        $this->modifiedColumns[] = TscheemiPeer::CONFORMADO;
      }
  
	} 
	
	public function setNomfuncon($v)
	{

    if ($this->nomfuncon !== $v) {
        $this->nomfuncon = $v;
        $this->modifiedColumns[] = TscheemiPeer::NOMFUNCON;
      }
  
	} 
	
	public function setAgenban($v)
	{

    if ($this->agenban !== $v) {
        $this->agenban = $v;
        $this->modifiedColumns[] = TscheemiPeer::AGENBAN;
      }
  
	} 
	
	public function setFecconfor($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecconfor] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecconfor !== $ts) {
      $this->fecconfor = $ts;
      $this->modifiedColumns[] = TscheemiPeer::FECCONFOR;
    }

	} 
	
	public function setHorconfor($v)
	{

    if ($this->horconfor !== $v) {
        $this->horconfor = $v;
        $this->modifiedColumns[] = TscheemiPeer::HORCONFOR;
      }
  
	} 
	
	public function setFotper($v)
	{

    if ($this->fotper !== $v) {
        $this->fotper = $v;
        $this->modifiedColumns[] = TscheemiPeer::FOTPER;
      }
  
	} 
	
	public function setFotced($v)
	{

    if ($this->fotced !== $v) {
        $this->fotced = $v;
        $this->modifiedColumns[] = TscheemiPeer::FOTCED;
      }
  
	} 
	
	public function setFotche($v)
	{

    if ($this->fotche !== $v) {
        $this->fotche = $v;
        $this->modifiedColumns[] = TscheemiPeer::FOTCHE;
      }
  
	} 
	
	public function setComentcon($v)
	{

    if ($this->comentcon !== $v) {
        $this->comentcon = $v;
        $this->modifiedColumns[] = TscheemiPeer::COMENTCON;
      }
  
	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = TscheemiPeer::CODDIREC;
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
      $this->modifiedColumns[] = TscheemiPeer::FECREG;
    }

	} 
	
	public function setCheimp($v)
	{

    if ($this->cheimp !== $v) {
        $this->cheimp = $v;
        $this->modifiedColumns[] = TscheemiPeer::CHEIMP;
      }
  
	} 
	
	public function setFecimp($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecimp] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecimp !== $ts) {
      $this->fecimp = $ts;
      $this->modifiedColumns[] = TscheemiPeer::FECIMP;
    }

	} 
	
	public function setFecentcon($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecentcon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecentcon !== $ts) {
      $this->fecentcon = $ts;
      $this->modifiedColumns[] = TscheemiPeer::FECENTCON;
    }

	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = TscheemiPeer::CODPRO;
      }
  
	} 
	
	public function setCodseg($v)
	{

    if ($this->codseg !== $v) {
        $this->codseg = $v;
        $this->modifiedColumns[] = TscheemiPeer::CODSEG;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = TscheemiPeer::CODCON;
      }
  
	} 
	
	public function setCedrifsus($v)
	{

    if ($this->cedrifsus !== $v) {
        $this->cedrifsus = $v;
        $this->modifiedColumns[] = TscheemiPeer::CEDRIFSUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TscheemiPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numche = $rs->getString($startcol + 0);

      $this->numcue = $rs->getString($startcol + 1);

      $this->cedrif = $rs->getString($startcol + 2);

      $this->fecemi = $rs->getDate($startcol + 3, null);

      $this->monche = $rs->getFloat($startcol + 4);

      $this->status = $rs->getString($startcol + 5);

      $this->codemi = $rs->getString($startcol + 6);

      $this->fecent = $rs->getDate($startcol + 7, null);

      $this->codent = $rs->getString($startcol + 8);

      $this->obsent = $rs->getString($startcol + 9);

      $this->fecanu = $rs->getDate($startcol + 10, null);

      $this->cedrec = $rs->getString($startcol + 11);

      $this->nomrec = $rs->getString($startcol + 12);

      $this->tipdoc = $rs->getString($startcol + 13);

      $this->fecing = $rs->getDate($startcol + 14, null);

      $this->temporal = $rs->getString($startcol + 15);

      $this->temporal2 = $rs->getString($startcol + 16);

      $this->nombensus = $rs->getString($startcol + 17);

      $this->anopre = $rs->getString($startcol + 18);

      $this->numtiq = $rs->getString($startcol + 19);

      $this->cedaut = $rs->getString($startcol + 20);

      $this->peraut = $rs->getString($startcol + 21);

      $this->numcomegr = $rs->getString($startcol + 22);

      $this->motdev = $rs->getString($startcol + 23);

      $this->fecdev = $rs->getDate($startcol + 24, null);

      $this->codmon = $rs->getString($startcol + 25);

      $this->valmon = $rs->getFloat($startcol + 26);

      $this->codconcepto = $rs->getString($startcol + 27);

      $this->loguse = $rs->getString($startcol + 28);

      $this->conformado = $rs->getString($startcol + 29);

      $this->nomfuncon = $rs->getString($startcol + 30);

      $this->agenban = $rs->getString($startcol + 31);

      $this->fecconfor = $rs->getDate($startcol + 32, null);

      $this->horconfor = $rs->getString($startcol + 33);

      $this->fotper = $rs->getString($startcol + 34);

      $this->fotced = $rs->getString($startcol + 35);

      $this->fotche = $rs->getString($startcol + 36);

      $this->comentcon = $rs->getString($startcol + 37);

      $this->coddirec = $rs->getString($startcol + 38);

      $this->fecreg = $rs->getTimestamp($startcol + 39, null);

      $this->cheimp = $rs->getString($startcol + 40);

      $this->fecimp = $rs->getDate($startcol + 41, null);

      $this->fecentcon = $rs->getDate($startcol + 42, null);

      $this->codpro = $rs->getString($startcol + 43);

      $this->codseg = $rs->getString($startcol + 44);

      $this->codcon = $rs->getString($startcol + 45);

      $this->cedrifsus = $rs->getString($startcol + 46);

      $this->id = $rs->getInt($startcol + 47);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 48; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tscheemi object", $e);
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
			$con = Propel::getConnection(TscheemiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TscheemiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TscheemiPeer::DATABASE_NAME);
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
					$pk = TscheemiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TscheemiPeer::doUpdate($this, $con);
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


			if (($retval = TscheemiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TscheemiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumche();
				break;
			case 1:
				return $this->getNumcue();
				break;
			case 2:
				return $this->getCedrif();
				break;
			case 3:
				return $this->getFecemi();
				break;
			case 4:
				return $this->getMonche();
				break;
			case 5:
				return $this->getStatus();
				break;
			case 6:
				return $this->getCodemi();
				break;
			case 7:
				return $this->getFecent();
				break;
			case 8:
				return $this->getCodent();
				break;
			case 9:
				return $this->getObsent();
				break;
			case 10:
				return $this->getFecanu();
				break;
			case 11:
				return $this->getCedrec();
				break;
			case 12:
				return $this->getNomrec();
				break;
			case 13:
				return $this->getTipdoc();
				break;
			case 14:
				return $this->getFecing();
				break;
			case 15:
				return $this->getTemporal();
				break;
			case 16:
				return $this->getTemporal2();
				break;
			case 17:
				return $this->getNombensus();
				break;
			case 18:
				return $this->getAnopre();
				break;
			case 19:
				return $this->getNumtiq();
				break;
			case 20:
				return $this->getCedaut();
				break;
			case 21:
				return $this->getPeraut();
				break;
			case 22:
				return $this->getNumcomegr();
				break;
			case 23:
				return $this->getMotdev();
				break;
			case 24:
				return $this->getFecdev();
				break;
			case 25:
				return $this->getCodmon();
				break;
			case 26:
				return $this->getValmon();
				break;
			case 27:
				return $this->getCodconcepto();
				break;
			case 28:
				return $this->getLoguse();
				break;
			case 29:
				return $this->getConformado();
				break;
			case 30:
				return $this->getNomfuncon();
				break;
			case 31:
				return $this->getAgenban();
				break;
			case 32:
				return $this->getFecconfor();
				break;
			case 33:
				return $this->getHorconfor();
				break;
			case 34:
				return $this->getFotper();
				break;
			case 35:
				return $this->getFotced();
				break;
			case 36:
				return $this->getFotche();
				break;
			case 37:
				return $this->getComentcon();
				break;
			case 38:
				return $this->getCoddirec();
				break;
			case 39:
				return $this->getFecreg();
				break;
			case 40:
				return $this->getCheimp();
				break;
			case 41:
				return $this->getFecimp();
				break;
			case 42:
				return $this->getFecentcon();
				break;
			case 43:
				return $this->getCodpro();
				break;
			case 44:
				return $this->getCodseg();
				break;
			case 45:
				return $this->getCodcon();
				break;
			case 46:
				return $this->getCedrifsus();
				break;
			case 47:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TscheemiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumche(),
			$keys[1] => $this->getNumcue(),
			$keys[2] => $this->getCedrif(),
			$keys[3] => $this->getFecemi(),
			$keys[4] => $this->getMonche(),
			$keys[5] => $this->getStatus(),
			$keys[6] => $this->getCodemi(),
			$keys[7] => $this->getFecent(),
			$keys[8] => $this->getCodent(),
			$keys[9] => $this->getObsent(),
			$keys[10] => $this->getFecanu(),
			$keys[11] => $this->getCedrec(),
			$keys[12] => $this->getNomrec(),
			$keys[13] => $this->getTipdoc(),
			$keys[14] => $this->getFecing(),
			$keys[15] => $this->getTemporal(),
			$keys[16] => $this->getTemporal2(),
			$keys[17] => $this->getNombensus(),
			$keys[18] => $this->getAnopre(),
			$keys[19] => $this->getNumtiq(),
			$keys[20] => $this->getCedaut(),
			$keys[21] => $this->getPeraut(),
			$keys[22] => $this->getNumcomegr(),
			$keys[23] => $this->getMotdev(),
			$keys[24] => $this->getFecdev(),
			$keys[25] => $this->getCodmon(),
			$keys[26] => $this->getValmon(),
			$keys[27] => $this->getCodconcepto(),
			$keys[28] => $this->getLoguse(),
			$keys[29] => $this->getConformado(),
			$keys[30] => $this->getNomfuncon(),
			$keys[31] => $this->getAgenban(),
			$keys[32] => $this->getFecconfor(),
			$keys[33] => $this->getHorconfor(),
			$keys[34] => $this->getFotper(),
			$keys[35] => $this->getFotced(),
			$keys[36] => $this->getFotche(),
			$keys[37] => $this->getComentcon(),
			$keys[38] => $this->getCoddirec(),
			$keys[39] => $this->getFecreg(),
			$keys[40] => $this->getCheimp(),
			$keys[41] => $this->getFecimp(),
			$keys[42] => $this->getFecentcon(),
			$keys[43] => $this->getCodpro(),
			$keys[44] => $this->getCodseg(),
			$keys[45] => $this->getCodcon(),
			$keys[46] => $this->getCedrifsus(),
			$keys[47] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TscheemiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumche($value);
				break;
			case 1:
				$this->setNumcue($value);
				break;
			case 2:
				$this->setCedrif($value);
				break;
			case 3:
				$this->setFecemi($value);
				break;
			case 4:
				$this->setMonche($value);
				break;
			case 5:
				$this->setStatus($value);
				break;
			case 6:
				$this->setCodemi($value);
				break;
			case 7:
				$this->setFecent($value);
				break;
			case 8:
				$this->setCodent($value);
				break;
			case 9:
				$this->setObsent($value);
				break;
			case 10:
				$this->setFecanu($value);
				break;
			case 11:
				$this->setCedrec($value);
				break;
			case 12:
				$this->setNomrec($value);
				break;
			case 13:
				$this->setTipdoc($value);
				break;
			case 14:
				$this->setFecing($value);
				break;
			case 15:
				$this->setTemporal($value);
				break;
			case 16:
				$this->setTemporal2($value);
				break;
			case 17:
				$this->setNombensus($value);
				break;
			case 18:
				$this->setAnopre($value);
				break;
			case 19:
				$this->setNumtiq($value);
				break;
			case 20:
				$this->setCedaut($value);
				break;
			case 21:
				$this->setPeraut($value);
				break;
			case 22:
				$this->setNumcomegr($value);
				break;
			case 23:
				$this->setMotdev($value);
				break;
			case 24:
				$this->setFecdev($value);
				break;
			case 25:
				$this->setCodmon($value);
				break;
			case 26:
				$this->setValmon($value);
				break;
			case 27:
				$this->setCodconcepto($value);
				break;
			case 28:
				$this->setLoguse($value);
				break;
			case 29:
				$this->setConformado($value);
				break;
			case 30:
				$this->setNomfuncon($value);
				break;
			case 31:
				$this->setAgenban($value);
				break;
			case 32:
				$this->setFecconfor($value);
				break;
			case 33:
				$this->setHorconfor($value);
				break;
			case 34:
				$this->setFotper($value);
				break;
			case 35:
				$this->setFotced($value);
				break;
			case 36:
				$this->setFotche($value);
				break;
			case 37:
				$this->setComentcon($value);
				break;
			case 38:
				$this->setCoddirec($value);
				break;
			case 39:
				$this->setFecreg($value);
				break;
			case 40:
				$this->setCheimp($value);
				break;
			case 41:
				$this->setFecimp($value);
				break;
			case 42:
				$this->setFecentcon($value);
				break;
			case 43:
				$this->setCodpro($value);
				break;
			case 44:
				$this->setCodseg($value);
				break;
			case 45:
				$this->setCodcon($value);
				break;
			case 46:
				$this->setCedrifsus($value);
				break;
			case 47:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TscheemiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumche($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedrif($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecemi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonche($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodemi($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecent($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodent($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setObsent($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecanu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCedrec($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNomrec($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTipdoc($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFecing($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTemporal($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setTemporal2($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setNombensus($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setAnopre($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNumtiq($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCedaut($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setPeraut($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setNumcomegr($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setMotdev($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setFecdev($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodmon($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setValmon($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCodconcepto($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setLoguse($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setConformado($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setNomfuncon($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setAgenban($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setFecconfor($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setHorconfor($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setFotper($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setFotced($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setFotche($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setComentcon($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setCoddirec($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setFecreg($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setCheimp($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setFecimp($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setFecentcon($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setCodpro($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setCodseg($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setCodcon($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setCedrifsus($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setId($arr[$keys[47]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TscheemiPeer::DATABASE_NAME);

		if ($this->isColumnModified(TscheemiPeer::NUMCHE)) $criteria->add(TscheemiPeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(TscheemiPeer::NUMCUE)) $criteria->add(TscheemiPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TscheemiPeer::CEDRIF)) $criteria->add(TscheemiPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(TscheemiPeer::FECEMI)) $criteria->add(TscheemiPeer::FECEMI, $this->fecemi);
		if ($this->isColumnModified(TscheemiPeer::MONCHE)) $criteria->add(TscheemiPeer::MONCHE, $this->monche);
		if ($this->isColumnModified(TscheemiPeer::STATUS)) $criteria->add(TscheemiPeer::STATUS, $this->status);
		if ($this->isColumnModified(TscheemiPeer::CODEMI)) $criteria->add(TscheemiPeer::CODEMI, $this->codemi);
		if ($this->isColumnModified(TscheemiPeer::FECENT)) $criteria->add(TscheemiPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(TscheemiPeer::CODENT)) $criteria->add(TscheemiPeer::CODENT, $this->codent);
		if ($this->isColumnModified(TscheemiPeer::OBSENT)) $criteria->add(TscheemiPeer::OBSENT, $this->obsent);
		if ($this->isColumnModified(TscheemiPeer::FECANU)) $criteria->add(TscheemiPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(TscheemiPeer::CEDREC)) $criteria->add(TscheemiPeer::CEDREC, $this->cedrec);
		if ($this->isColumnModified(TscheemiPeer::NOMREC)) $criteria->add(TscheemiPeer::NOMREC, $this->nomrec);
		if ($this->isColumnModified(TscheemiPeer::TIPDOC)) $criteria->add(TscheemiPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(TscheemiPeer::FECING)) $criteria->add(TscheemiPeer::FECING, $this->fecing);
		if ($this->isColumnModified(TscheemiPeer::TEMPORAL)) $criteria->add(TscheemiPeer::TEMPORAL, $this->temporal);
		if ($this->isColumnModified(TscheemiPeer::TEMPORAL2)) $criteria->add(TscheemiPeer::TEMPORAL2, $this->temporal2);
		if ($this->isColumnModified(TscheemiPeer::NOMBENSUS)) $criteria->add(TscheemiPeer::NOMBENSUS, $this->nombensus);
		if ($this->isColumnModified(TscheemiPeer::ANOPRE)) $criteria->add(TscheemiPeer::ANOPRE, $this->anopre);
		if ($this->isColumnModified(TscheemiPeer::NUMTIQ)) $criteria->add(TscheemiPeer::NUMTIQ, $this->numtiq);
		if ($this->isColumnModified(TscheemiPeer::CEDAUT)) $criteria->add(TscheemiPeer::CEDAUT, $this->cedaut);
		if ($this->isColumnModified(TscheemiPeer::PERAUT)) $criteria->add(TscheemiPeer::PERAUT, $this->peraut);
		if ($this->isColumnModified(TscheemiPeer::NUMCOMEGR)) $criteria->add(TscheemiPeer::NUMCOMEGR, $this->numcomegr);
		if ($this->isColumnModified(TscheemiPeer::MOTDEV)) $criteria->add(TscheemiPeer::MOTDEV, $this->motdev);
		if ($this->isColumnModified(TscheemiPeer::FECDEV)) $criteria->add(TscheemiPeer::FECDEV, $this->fecdev);
		if ($this->isColumnModified(TscheemiPeer::CODMON)) $criteria->add(TscheemiPeer::CODMON, $this->codmon);
		if ($this->isColumnModified(TscheemiPeer::VALMON)) $criteria->add(TscheemiPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(TscheemiPeer::CODCONCEPTO)) $criteria->add(TscheemiPeer::CODCONCEPTO, $this->codconcepto);
		if ($this->isColumnModified(TscheemiPeer::LOGUSE)) $criteria->add(TscheemiPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(TscheemiPeer::CONFORMADO)) $criteria->add(TscheemiPeer::CONFORMADO, $this->conformado);
		if ($this->isColumnModified(TscheemiPeer::NOMFUNCON)) $criteria->add(TscheemiPeer::NOMFUNCON, $this->nomfuncon);
		if ($this->isColumnModified(TscheemiPeer::AGENBAN)) $criteria->add(TscheemiPeer::AGENBAN, $this->agenban);
		if ($this->isColumnModified(TscheemiPeer::FECCONFOR)) $criteria->add(TscheemiPeer::FECCONFOR, $this->fecconfor);
		if ($this->isColumnModified(TscheemiPeer::HORCONFOR)) $criteria->add(TscheemiPeer::HORCONFOR, $this->horconfor);
		if ($this->isColumnModified(TscheemiPeer::FOTPER)) $criteria->add(TscheemiPeer::FOTPER, $this->fotper);
		if ($this->isColumnModified(TscheemiPeer::FOTCED)) $criteria->add(TscheemiPeer::FOTCED, $this->fotced);
		if ($this->isColumnModified(TscheemiPeer::FOTCHE)) $criteria->add(TscheemiPeer::FOTCHE, $this->fotche);
		if ($this->isColumnModified(TscheemiPeer::COMENTCON)) $criteria->add(TscheemiPeer::COMENTCON, $this->comentcon);
		if ($this->isColumnModified(TscheemiPeer::CODDIREC)) $criteria->add(TscheemiPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(TscheemiPeer::FECREG)) $criteria->add(TscheemiPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(TscheemiPeer::CHEIMP)) $criteria->add(TscheemiPeer::CHEIMP, $this->cheimp);
		if ($this->isColumnModified(TscheemiPeer::FECIMP)) $criteria->add(TscheemiPeer::FECIMP, $this->fecimp);
		if ($this->isColumnModified(TscheemiPeer::FECENTCON)) $criteria->add(TscheemiPeer::FECENTCON, $this->fecentcon);
		if ($this->isColumnModified(TscheemiPeer::CODPRO)) $criteria->add(TscheemiPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(TscheemiPeer::CODSEG)) $criteria->add(TscheemiPeer::CODSEG, $this->codseg);
		if ($this->isColumnModified(TscheemiPeer::CODCON)) $criteria->add(TscheemiPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(TscheemiPeer::CEDRIFSUS)) $criteria->add(TscheemiPeer::CEDRIFSUS, $this->cedrifsus);
		if ($this->isColumnModified(TscheemiPeer::ID)) $criteria->add(TscheemiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TscheemiPeer::DATABASE_NAME);

		$criteria->add(TscheemiPeer::ID, $this->id);

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

		$copyObj->setNumche($this->numche);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setFecemi($this->fecemi);

		$copyObj->setMonche($this->monche);

		$copyObj->setStatus($this->status);

		$copyObj->setCodemi($this->codemi);

		$copyObj->setFecent($this->fecent);

		$copyObj->setCodent($this->codent);

		$copyObj->setObsent($this->obsent);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCedrec($this->cedrec);

		$copyObj->setNomrec($this->nomrec);

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setFecing($this->fecing);

		$copyObj->setTemporal($this->temporal);

		$copyObj->setTemporal2($this->temporal2);

		$copyObj->setNombensus($this->nombensus);

		$copyObj->setAnopre($this->anopre);

		$copyObj->setNumtiq($this->numtiq);

		$copyObj->setCedaut($this->cedaut);

		$copyObj->setPeraut($this->peraut);

		$copyObj->setNumcomegr($this->numcomegr);

		$copyObj->setMotdev($this->motdev);

		$copyObj->setFecdev($this->fecdev);

		$copyObj->setCodmon($this->codmon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setCodconcepto($this->codconcepto);

		$copyObj->setLoguse($this->loguse);

		$copyObj->setConformado($this->conformado);

		$copyObj->setNomfuncon($this->nomfuncon);

		$copyObj->setAgenban($this->agenban);

		$copyObj->setFecconfor($this->fecconfor);

		$copyObj->setHorconfor($this->horconfor);

		$copyObj->setFotper($this->fotper);

		$copyObj->setFotced($this->fotced);

		$copyObj->setFotche($this->fotche);

		$copyObj->setComentcon($this->comentcon);

		$copyObj->setCoddirec($this->coddirec);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setCheimp($this->cheimp);

		$copyObj->setFecimp($this->fecimp);

		$copyObj->setFecentcon($this->fecentcon);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodseg($this->codseg);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCedrifsus($this->cedrifsus);


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
			self::$peer = new TscheemiPeer();
		}
		return self::$peer;
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

} 