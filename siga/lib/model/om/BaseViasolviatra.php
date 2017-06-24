<?php


abstract class BaseViasolviatra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $fecsol;


	
	protected $tipvia;


	
	protected $codeve;


	
	protected $codemp;


	
	protected $codcat;


	
	protected $codniv;


	
	protected $codempaco;


	
	protected $codnivaco;


	
	protected $dessol;


	
	protected $codciu;


	
	protected $codnivapr;


	
	protected $codproced;


	
	protected $status;


	
	protected $fecdes;


	
	protected $fechas;


	
	protected $numdia;


	
	protected $codfortra;


	
	protected $codempaut;


	
	protected $codcen;


	
	protected $codubi;


	
	protected $nomempe;


	
	protected $tipbol;


	
	protected $monbol;


	
	protected $fecanu;


	
	protected $desanu;


	
	protected $coddirec;


	
	protected $esnoemp;


	
	protected $numpas;


	
	protected $numvis;


	
	protected $numcel;


	
	protected $numext;


	
	protected $apepercon;


	
	protected $nompercon;


	
	protected $parpercon;


	
	protected $numhabpercon;


	
	protected $numcelpercon;


	
	protected $reqbolaer;


	
	protected $reqhospe;


	
	protected $reqtrater;


	
	protected $horsal;


	
	protected $horlle;


	
	protected $rutbolaer;


	
	protected $motviabol;


	
	protected $tipserv;


	
	protected $canvehi;


	
	protected $tipvehi;


	
	protected $candias;


	
	protected $canpasaj;


	
	protected $equipaj;


	
	protected $instrum;


	
	protected $bultos;


	
	protected $conesper;


	
	protected $adisposi;


	
	protected $codempusu;


	
	protected $celemp;


	
	protected $tippas;


	
	protected $fecsal;


	
	protected $horsalb;


	
	protected $fecreg;


	
	protected $horreg;


	
	protected $itinerario;


	
	protected $codnivorg;


	
	protected $codmun;


	
	protected $statusdir;


	
	protected $lugsal;


	
	protected $codpai;


	
	protected $staren = '';


	
	protected $hosped;


	
	protected $obshos;


	
	protected $usuapr;


	
	protected $fecapr;


	
	protected $logusu;


	
	protected $codpro;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getFecsol($format = 'Y-m-d')
  {

    if ($this->fecsol === null || $this->fecsol === '') {
      return null;
    } elseif (!is_int($this->fecsol)) {
            $ts = adodb_strtotime($this->fecsol);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsol] as date/time value: " . var_export($this->fecsol, true));
      }
    } else {
      $ts = $this->fecsol;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTipvia()
  {

    return trim($this->tipvia);

  }
  
  public function getCodeve()
  {

    return trim($this->codeve);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getCodempaco()
  {

    return trim($this->codempaco);

  }
  
  public function getCodnivaco()
  {

    return trim($this->codnivaco);

  }
  
  public function getDessol()
  {

    return trim($this->dessol);

  }
  
  public function getCodciu()
  {

    return trim($this->codciu);

  }
  
  public function getCodnivapr()
  {

    return trim($this->codnivapr);

  }
  
  public function getCodproced()
  {

    return trim($this->codproced);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getFecdes($format = 'Y-m-d')
  {

    if ($this->fecdes === null || $this->fecdes === '') {
      return null;
    } elseif (!is_int($this->fecdes)) {
            $ts = adodb_strtotime($this->fecdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdes] as date/time value: " . var_export($this->fecdes, true));
      }
    } else {
      $ts = $this->fecdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechas($format = 'Y-m-d')
  {

    if ($this->fechas === null || $this->fechas === '') {
      return null;
    } elseif (!is_int($this->fechas)) {
            $ts = adodb_strtotime($this->fechas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechas] as date/time value: " . var_export($this->fechas, true));
      }
    } else {
      $ts = $this->fechas;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumdia()
  {

    return $this->numdia;

  }
  
  public function getCodfortra()
  {

    return trim($this->codfortra);

  }
  
  public function getCodempaut()
  {

    return trim($this->codempaut);

  }
  
  public function getCodcen()
  {

    return trim($this->codcen);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getNomempe()
  {

    return trim($this->nomempe);

  }
  
  public function getTipbol()
  {

    return trim($this->tipbol);

  }
  
  public function getMonbol($val=false)
  {

    if($val) return number_format($this->monbol,2,',','.');
    else return $this->monbol;

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
  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getEsnoemp()
  {

    return $this->esnoemp;

  }
  
  public function getNumpas()
  {

    return trim($this->numpas);

  }
  
  public function getNumvis()
  {

    return trim($this->numvis);

  }
  
  public function getNumcel()
  {

    return trim($this->numcel);

  }
  
  public function getNumext()
  {

    return trim($this->numext);

  }
  
  public function getApepercon()
  {

    return trim($this->apepercon);

  }
  
  public function getNompercon()
  {

    return trim($this->nompercon);

  }
  
  public function getParpercon()
  {

    return trim($this->parpercon);

  }
  
  public function getNumhabpercon()
  {

    return trim($this->numhabpercon);

  }
  
  public function getNumcelpercon()
  {

    return trim($this->numcelpercon);

  }
  
  public function getReqbolaer()
  {

    return trim($this->reqbolaer);

  }
  
  public function getReqhospe()
  {

    return trim($this->reqhospe);

  }
  
  public function getReqtrater()
  {

    return trim($this->reqtrater);

  }
  
  public function getHorsal($format = 'Y-m-d H:i:s')
  {

    if ($this->horsal === null || $this->horsal === '') {
      return null;
    } elseif (!is_int($this->horsal)) {
            $ts = adodb_strtotime($this->horsal);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [horsal] as date/time value: " . var_export($this->horsal, true));
      }
    } else {
      $ts = $this->horsal;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHorlle($format = 'Y-m-d H:i:s')
  {

    if ($this->horlle === null || $this->horlle === '') {
      return null;
    } elseif (!is_int($this->horlle)) {
            $ts = adodb_strtotime($this->horlle);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [horlle] as date/time value: " . var_export($this->horlle, true));
      }
    } else {
      $ts = $this->horlle;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRutbolaer()
  {

    return trim($this->rutbolaer);

  }
  
  public function getMotviabol()
  {

    return trim($this->motviabol);

  }
  
  public function getTipserv()
  {

    return trim($this->tipserv);

  }
  
  public function getCanvehi()
  {

    return trim($this->canvehi);

  }
  
  public function getTipvehi()
  {

    return trim($this->tipvehi);

  }
  
  public function getCandias()
  {

    return trim($this->candias);

  }
  
  public function getCanpasaj()
  {

    return trim($this->canpasaj);

  }
  
  public function getEquipaj()
  {

    return $this->equipaj;

  }
  
  public function getInstrum()
  {

    return $this->instrum;

  }
  
  public function getBultos()
  {

    return $this->bultos;

  }
  
  public function getConesper()
  {

    return $this->conesper;

  }
  
  public function getAdisposi()
  {

    return $this->adisposi;

  }
  
  public function getCodempusu()
  {

    return trim($this->codempusu);

  }
  
  public function getCelemp()
  {

    return trim($this->celemp);

  }
  
  public function getTippas()
  {

    return trim($this->tippas);

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

  
  public function getHorsalb()
  {

    return trim($this->horsalb);

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
  
  public function getItinerario()
  {

    return trim($this->itinerario);

  }
  
  public function getCodnivorg()
  {

    return trim($this->codnivorg);

  }
  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getStatusdir()
  {

    return trim($this->statusdir);

  }
  
  public function getLugsal()
  {

    return trim($this->lugsal);

  }
  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getStaren()
  {

    return trim($this->staren);

  }
  
  public function getHosped()
  {

    return trim($this->hosped);

  }
  
  public function getObshos()
  {

    return trim($this->obshos);

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

  
  public function getLogusu()
  {

    return trim($this->logusu);

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::NUMSOL;
      }
  
	} 
	
	public function setFecsol($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsol] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsol !== $ts) {
      $this->fecsol = $ts;
      $this->modifiedColumns[] = ViasolviatraPeer::FECSOL;
    }

	} 
	
	public function setTipvia($v)
	{

    if ($this->tipvia !== $v) {
        $this->tipvia = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::TIPVIA;
      }
  
	} 
	
	public function setCodeve($v)
	{

    if ($this->codeve !== $v) {
        $this->codeve = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODEVE;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODEMP;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODCAT;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODNIV;
      }
  
	} 
	
	public function setCodempaco($v)
	{

    if ($this->codempaco !== $v) {
        $this->codempaco = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODEMPACO;
      }
  
	} 
	
	public function setCodnivaco($v)
	{

    if ($this->codnivaco !== $v) {
        $this->codnivaco = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODNIVACO;
      }
  
	} 
	
	public function setDessol($v)
	{

    if ($this->dessol !== $v) {
        $this->dessol = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::DESSOL;
      }
  
	} 
	
	public function setCodciu($v)
	{

    if ($this->codciu !== $v) {
        $this->codciu = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODCIU;
      }
  
	} 
	
	public function setCodnivapr($v)
	{

    if ($this->codnivapr !== $v) {
        $this->codnivapr = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODNIVAPR;
      }
  
	} 
	
	public function setCodproced($v)
	{

    if ($this->codproced !== $v) {
        $this->codproced = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODPROCED;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::STATUS;
      }
  
	} 
	
	public function setFecdes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdes !== $ts) {
      $this->fecdes = $ts;
      $this->modifiedColumns[] = ViasolviatraPeer::FECDES;
    }

	} 
	
	public function setFechas($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechas !== $ts) {
      $this->fechas = $ts;
      $this->modifiedColumns[] = ViasolviatraPeer::FECHAS;
    }

	} 
	
	public function setNumdia($v)
	{

    if ($this->numdia !== $v) {
        $this->numdia = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::NUMDIA;
      }
  
	} 
	
	public function setCodfortra($v)
	{

    if ($this->codfortra !== $v) {
        $this->codfortra = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODFORTRA;
      }
  
	} 
	
	public function setCodempaut($v)
	{

    if ($this->codempaut !== $v) {
        $this->codempaut = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODEMPAUT;
      }
  
	} 
	
	public function setCodcen($v)
	{

    if ($this->codcen !== $v) {
        $this->codcen = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODCEN;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODUBI;
      }
  
	} 
	
	public function setNomempe($v)
	{

    if ($this->nomempe !== $v) {
        $this->nomempe = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::NOMEMPE;
      }
  
	} 
	
	public function setTipbol($v)
	{

    if ($this->tipbol !== $v) {
        $this->tipbol = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::TIPBOL;
      }
  
	} 
	
	public function setMonbol($v)
	{

    if ($this->monbol !== $v) {
        $this->monbol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViasolviatraPeer::MONBOL;
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
      $this->modifiedColumns[] = ViasolviatraPeer::FECANU;
    }

	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::DESANU;
      }
  
	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODDIREC;
      }
  
	} 
	
	public function setEsnoemp($v)
	{

    if ($this->esnoemp !== $v) {
        $this->esnoemp = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::ESNOEMP;
      }
  
	} 
	
	public function setNumpas($v)
	{

    if ($this->numpas !== $v) {
        $this->numpas = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::NUMPAS;
      }
  
	} 
	
	public function setNumvis($v)
	{

    if ($this->numvis !== $v) {
        $this->numvis = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::NUMVIS;
      }
  
	} 
	
	public function setNumcel($v)
	{

    if ($this->numcel !== $v) {
        $this->numcel = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::NUMCEL;
      }
  
	} 
	
	public function setNumext($v)
	{

    if ($this->numext !== $v) {
        $this->numext = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::NUMEXT;
      }
  
	} 
	
	public function setApepercon($v)
	{

    if ($this->apepercon !== $v) {
        $this->apepercon = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::APEPERCON;
      }
  
	} 
	
	public function setNompercon($v)
	{

    if ($this->nompercon !== $v) {
        $this->nompercon = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::NOMPERCON;
      }
  
	} 
	
	public function setParpercon($v)
	{

    if ($this->parpercon !== $v) {
        $this->parpercon = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::PARPERCON;
      }
  
	} 
	
	public function setNumhabpercon($v)
	{

    if ($this->numhabpercon !== $v) {
        $this->numhabpercon = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::NUMHABPERCON;
      }
  
	} 
	
	public function setNumcelpercon($v)
	{

    if ($this->numcelpercon !== $v) {
        $this->numcelpercon = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::NUMCELPERCON;
      }
  
	} 
	
	public function setReqbolaer($v)
	{

    if ($this->reqbolaer !== $v) {
        $this->reqbolaer = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::REQBOLAER;
      }
  
	} 
	
	public function setReqhospe($v)
	{

    if ($this->reqhospe !== $v) {
        $this->reqhospe = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::REQHOSPE;
      }
  
	} 
	
	public function setReqtrater($v)
	{

    if ($this->reqtrater !== $v) {
        $this->reqtrater = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::REQTRATER;
      }
  
	} 
	
	public function setHorsal($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [horsal] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->horsal !== $ts) {
      $this->horsal = $ts;
      $this->modifiedColumns[] = ViasolviatraPeer::HORSAL;
    }

	} 
	
	public function setHorlle($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [horlle] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->horlle !== $ts) {
      $this->horlle = $ts;
      $this->modifiedColumns[] = ViasolviatraPeer::HORLLE;
    }

	} 
	
	public function setRutbolaer($v)
	{

    if ($this->rutbolaer !== $v) {
        $this->rutbolaer = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::RUTBOLAER;
      }
  
	} 
	
	public function setMotviabol($v)
	{

    if ($this->motviabol !== $v) {
        $this->motviabol = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::MOTVIABOL;
      }
  
	} 
	
	public function setTipserv($v)
	{

    if ($this->tipserv !== $v) {
        $this->tipserv = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::TIPSERV;
      }
  
	} 
	
	public function setCanvehi($v)
	{

    if ($this->canvehi !== $v) {
        $this->canvehi = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CANVEHI;
      }
  
	} 
	
	public function setTipvehi($v)
	{

    if ($this->tipvehi !== $v) {
        $this->tipvehi = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::TIPVEHI;
      }
  
	} 
	
	public function setCandias($v)
	{

    if ($this->candias !== $v) {
        $this->candias = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CANDIAS;
      }
  
	} 
	
	public function setCanpasaj($v)
	{

    if ($this->canpasaj !== $v) {
        $this->canpasaj = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CANPASAJ;
      }
  
	} 
	
	public function setEquipaj($v)
	{

    if ($this->equipaj !== $v) {
        $this->equipaj = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::EQUIPAJ;
      }
  
	} 
	
	public function setInstrum($v)
	{

    if ($this->instrum !== $v) {
        $this->instrum = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::INSTRUM;
      }
  
	} 
	
	public function setBultos($v)
	{

    if ($this->bultos !== $v) {
        $this->bultos = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::BULTOS;
      }
  
	} 
	
	public function setConesper($v)
	{

    if ($this->conesper !== $v) {
        $this->conesper = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CONESPER;
      }
  
	} 
	
	public function setAdisposi($v)
	{

    if ($this->adisposi !== $v) {
        $this->adisposi = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::ADISPOSI;
      }
  
	} 
	
	public function setCodempusu($v)
	{

    if ($this->codempusu !== $v) {
        $this->codempusu = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODEMPUSU;
      }
  
	} 
	
	public function setCelemp($v)
	{

    if ($this->celemp !== $v) {
        $this->celemp = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CELEMP;
      }
  
	} 
	
	public function setTippas($v)
	{

    if ($this->tippas !== $v) {
        $this->tippas = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::TIPPAS;
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
      $this->modifiedColumns[] = ViasolviatraPeer::FECSAL;
    }

	} 
	
	public function setHorsalb($v)
	{

    if ($this->horsalb !== $v) {
        $this->horsalb = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::HORSALB;
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
      $this->modifiedColumns[] = ViasolviatraPeer::FECREG;
    }

	} 
	
	public function setHorreg($v)
	{

    if ($this->horreg !== $v) {
        $this->horreg = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::HORREG;
      }
  
	} 
	
	public function setItinerario($v)
	{

    if ($this->itinerario !== $v) {
        $this->itinerario = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::ITINERARIO;
      }
  
	} 
	
	public function setCodnivorg($v)
	{

    if ($this->codnivorg !== $v) {
        $this->codnivorg = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODNIVORG;
      }
  
	} 
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODMUN;
      }
  
	} 
	
	public function setStatusdir($v)
	{

    if ($this->statusdir !== $v) {
        $this->statusdir = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::STATUSDIR;
      }
  
	} 
	
	public function setLugsal($v)
	{

    if ($this->lugsal !== $v) {
        $this->lugsal = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::LUGSAL;
      }
  
	} 
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODPAI;
      }
  
	} 
	
	public function setStaren($v)
	{

    if ($this->staren !== $v || $v === '') {
        $this->staren = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::STAREN;
      }
  
	} 
	
	public function setHosped($v)
	{

    if ($this->hosped !== $v) {
        $this->hosped = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::HOSPED;
      }
  
	} 
	
	public function setObshos($v)
	{

    if ($this->obshos !== $v) {
        $this->obshos = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::OBSHOS;
      }
  
	} 
	
	public function setUsuapr($v)
	{

    if ($this->usuapr !== $v) {
        $this->usuapr = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::USUAPR;
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
      $this->modifiedColumns[] = ViasolviatraPeer::FECAPR;
    }

	} 
	
	public function setLogusu($v)
	{

    if ($this->logusu !== $v) {
        $this->logusu = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::LOGUSU;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::CODPRO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViasolviatraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->fecsol = $rs->getDate($startcol + 1, null);

      $this->tipvia = $rs->getString($startcol + 2);

      $this->codeve = $rs->getString($startcol + 3);

      $this->codemp = $rs->getString($startcol + 4);

      $this->codcat = $rs->getString($startcol + 5);

      $this->codniv = $rs->getString($startcol + 6);

      $this->codempaco = $rs->getString($startcol + 7);

      $this->codnivaco = $rs->getString($startcol + 8);

      $this->dessol = $rs->getString($startcol + 9);

      $this->codciu = $rs->getString($startcol + 10);

      $this->codnivapr = $rs->getString($startcol + 11);

      $this->codproced = $rs->getString($startcol + 12);

      $this->status = $rs->getString($startcol + 13);

      $this->fecdes = $rs->getDate($startcol + 14, null);

      $this->fechas = $rs->getDate($startcol + 15, null);

      $this->numdia = $rs->getInt($startcol + 16);

      $this->codfortra = $rs->getString($startcol + 17);

      $this->codempaut = $rs->getString($startcol + 18);

      $this->codcen = $rs->getString($startcol + 19);

      $this->codubi = $rs->getString($startcol + 20);

      $this->nomempe = $rs->getString($startcol + 21);

      $this->tipbol = $rs->getString($startcol + 22);

      $this->monbol = $rs->getFloat($startcol + 23);

      $this->fecanu = $rs->getDate($startcol + 24, null);

      $this->desanu = $rs->getString($startcol + 25);

      $this->coddirec = $rs->getString($startcol + 26);

      $this->esnoemp = $rs->getBoolean($startcol + 27);

      $this->numpas = $rs->getString($startcol + 28);

      $this->numvis = $rs->getString($startcol + 29);

      $this->numcel = $rs->getString($startcol + 30);

      $this->numext = $rs->getString($startcol + 31);

      $this->apepercon = $rs->getString($startcol + 32);

      $this->nompercon = $rs->getString($startcol + 33);

      $this->parpercon = $rs->getString($startcol + 34);

      $this->numhabpercon = $rs->getString($startcol + 35);

      $this->numcelpercon = $rs->getString($startcol + 36);

      $this->reqbolaer = $rs->getString($startcol + 37);

      $this->reqhospe = $rs->getString($startcol + 38);

      $this->reqtrater = $rs->getString($startcol + 39);

      $this->horsal = $rs->getTimestamp($startcol + 40, null);

      $this->horlle = $rs->getTimestamp($startcol + 41, null);

      $this->rutbolaer = $rs->getString($startcol + 42);

      $this->motviabol = $rs->getString($startcol + 43);

      $this->tipserv = $rs->getString($startcol + 44);

      $this->canvehi = $rs->getString($startcol + 45);

      $this->tipvehi = $rs->getString($startcol + 46);

      $this->candias = $rs->getString($startcol + 47);

      $this->canpasaj = $rs->getString($startcol + 48);

      $this->equipaj = $rs->getBoolean($startcol + 49);

      $this->instrum = $rs->getBoolean($startcol + 50);

      $this->bultos = $rs->getBoolean($startcol + 51);

      $this->conesper = $rs->getBoolean($startcol + 52);

      $this->adisposi = $rs->getBoolean($startcol + 53);

      $this->codempusu = $rs->getString($startcol + 54);

      $this->celemp = $rs->getString($startcol + 55);

      $this->tippas = $rs->getString($startcol + 56);

      $this->fecsal = $rs->getDate($startcol + 57, null);

      $this->horsalb = $rs->getString($startcol + 58);

      $this->fecreg = $rs->getDate($startcol + 59, null);

      $this->horreg = $rs->getString($startcol + 60);

      $this->itinerario = $rs->getString($startcol + 61);

      $this->codnivorg = $rs->getString($startcol + 62);

      $this->codmun = $rs->getString($startcol + 63);

      $this->statusdir = $rs->getString($startcol + 64);

      $this->lugsal = $rs->getString($startcol + 65);

      $this->codpai = $rs->getString($startcol + 66);

      $this->staren = $rs->getString($startcol + 67);

      $this->hosped = $rs->getString($startcol + 68);

      $this->obshos = $rs->getString($startcol + 69);

      $this->usuapr = $rs->getString($startcol + 70);

      $this->fecapr = $rs->getDate($startcol + 71, null);

      $this->logusu = $rs->getString($startcol + 72);

      $this->codpro = $rs->getString($startcol + 73);

      $this->id = $rs->getInt($startcol + 74);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 75; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viasolviatra object", $e);
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
			$con = Propel::getConnection(ViasolviatraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViasolviatraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViasolviatraPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ViasolviatraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViasolviatraPeer::doUpdate($this, $con);
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


			if (($retval = ViasolviatraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViasolviatraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getFecsol();
				break;
			case 2:
				return $this->getTipvia();
				break;
			case 3:
				return $this->getCodeve();
				break;
			case 4:
				return $this->getCodemp();
				break;
			case 5:
				return $this->getCodcat();
				break;
			case 6:
				return $this->getCodniv();
				break;
			case 7:
				return $this->getCodempaco();
				break;
			case 8:
				return $this->getCodnivaco();
				break;
			case 9:
				return $this->getDessol();
				break;
			case 10:
				return $this->getCodciu();
				break;
			case 11:
				return $this->getCodnivapr();
				break;
			case 12:
				return $this->getCodproced();
				break;
			case 13:
				return $this->getStatus();
				break;
			case 14:
				return $this->getFecdes();
				break;
			case 15:
				return $this->getFechas();
				break;
			case 16:
				return $this->getNumdia();
				break;
			case 17:
				return $this->getCodfortra();
				break;
			case 18:
				return $this->getCodempaut();
				break;
			case 19:
				return $this->getCodcen();
				break;
			case 20:
				return $this->getCodubi();
				break;
			case 21:
				return $this->getNomempe();
				break;
			case 22:
				return $this->getTipbol();
				break;
			case 23:
				return $this->getMonbol();
				break;
			case 24:
				return $this->getFecanu();
				break;
			case 25:
				return $this->getDesanu();
				break;
			case 26:
				return $this->getCoddirec();
				break;
			case 27:
				return $this->getEsnoemp();
				break;
			case 28:
				return $this->getNumpas();
				break;
			case 29:
				return $this->getNumvis();
				break;
			case 30:
				return $this->getNumcel();
				break;
			case 31:
				return $this->getNumext();
				break;
			case 32:
				return $this->getApepercon();
				break;
			case 33:
				return $this->getNompercon();
				break;
			case 34:
				return $this->getParpercon();
				break;
			case 35:
				return $this->getNumhabpercon();
				break;
			case 36:
				return $this->getNumcelpercon();
				break;
			case 37:
				return $this->getReqbolaer();
				break;
			case 38:
				return $this->getReqhospe();
				break;
			case 39:
				return $this->getReqtrater();
				break;
			case 40:
				return $this->getHorsal();
				break;
			case 41:
				return $this->getHorlle();
				break;
			case 42:
				return $this->getRutbolaer();
				break;
			case 43:
				return $this->getMotviabol();
				break;
			case 44:
				return $this->getTipserv();
				break;
			case 45:
				return $this->getCanvehi();
				break;
			case 46:
				return $this->getTipvehi();
				break;
			case 47:
				return $this->getCandias();
				break;
			case 48:
				return $this->getCanpasaj();
				break;
			case 49:
				return $this->getEquipaj();
				break;
			case 50:
				return $this->getInstrum();
				break;
			case 51:
				return $this->getBultos();
				break;
			case 52:
				return $this->getConesper();
				break;
			case 53:
				return $this->getAdisposi();
				break;
			case 54:
				return $this->getCodempusu();
				break;
			case 55:
				return $this->getCelemp();
				break;
			case 56:
				return $this->getTippas();
				break;
			case 57:
				return $this->getFecsal();
				break;
			case 58:
				return $this->getHorsalb();
				break;
			case 59:
				return $this->getFecreg();
				break;
			case 60:
				return $this->getHorreg();
				break;
			case 61:
				return $this->getItinerario();
				break;
			case 62:
				return $this->getCodnivorg();
				break;
			case 63:
				return $this->getCodmun();
				break;
			case 64:
				return $this->getStatusdir();
				break;
			case 65:
				return $this->getLugsal();
				break;
			case 66:
				return $this->getCodpai();
				break;
			case 67:
				return $this->getStaren();
				break;
			case 68:
				return $this->getHosped();
				break;
			case 69:
				return $this->getObshos();
				break;
			case 70:
				return $this->getUsuapr();
				break;
			case 71:
				return $this->getFecapr();
				break;
			case 72:
				return $this->getLogusu();
				break;
			case 73:
				return $this->getCodpro();
				break;
			case 74:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViasolviatraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getFecsol(),
			$keys[2] => $this->getTipvia(),
			$keys[3] => $this->getCodeve(),
			$keys[4] => $this->getCodemp(),
			$keys[5] => $this->getCodcat(),
			$keys[6] => $this->getCodniv(),
			$keys[7] => $this->getCodempaco(),
			$keys[8] => $this->getCodnivaco(),
			$keys[9] => $this->getDessol(),
			$keys[10] => $this->getCodciu(),
			$keys[11] => $this->getCodnivapr(),
			$keys[12] => $this->getCodproced(),
			$keys[13] => $this->getStatus(),
			$keys[14] => $this->getFecdes(),
			$keys[15] => $this->getFechas(),
			$keys[16] => $this->getNumdia(),
			$keys[17] => $this->getCodfortra(),
			$keys[18] => $this->getCodempaut(),
			$keys[19] => $this->getCodcen(),
			$keys[20] => $this->getCodubi(),
			$keys[21] => $this->getNomempe(),
			$keys[22] => $this->getTipbol(),
			$keys[23] => $this->getMonbol(),
			$keys[24] => $this->getFecanu(),
			$keys[25] => $this->getDesanu(),
			$keys[26] => $this->getCoddirec(),
			$keys[27] => $this->getEsnoemp(),
			$keys[28] => $this->getNumpas(),
			$keys[29] => $this->getNumvis(),
			$keys[30] => $this->getNumcel(),
			$keys[31] => $this->getNumext(),
			$keys[32] => $this->getApepercon(),
			$keys[33] => $this->getNompercon(),
			$keys[34] => $this->getParpercon(),
			$keys[35] => $this->getNumhabpercon(),
			$keys[36] => $this->getNumcelpercon(),
			$keys[37] => $this->getReqbolaer(),
			$keys[38] => $this->getReqhospe(),
			$keys[39] => $this->getReqtrater(),
			$keys[40] => $this->getHorsal(),
			$keys[41] => $this->getHorlle(),
			$keys[42] => $this->getRutbolaer(),
			$keys[43] => $this->getMotviabol(),
			$keys[44] => $this->getTipserv(),
			$keys[45] => $this->getCanvehi(),
			$keys[46] => $this->getTipvehi(),
			$keys[47] => $this->getCandias(),
			$keys[48] => $this->getCanpasaj(),
			$keys[49] => $this->getEquipaj(),
			$keys[50] => $this->getInstrum(),
			$keys[51] => $this->getBultos(),
			$keys[52] => $this->getConesper(),
			$keys[53] => $this->getAdisposi(),
			$keys[54] => $this->getCodempusu(),
			$keys[55] => $this->getCelemp(),
			$keys[56] => $this->getTippas(),
			$keys[57] => $this->getFecsal(),
			$keys[58] => $this->getHorsalb(),
			$keys[59] => $this->getFecreg(),
			$keys[60] => $this->getHorreg(),
			$keys[61] => $this->getItinerario(),
			$keys[62] => $this->getCodnivorg(),
			$keys[63] => $this->getCodmun(),
			$keys[64] => $this->getStatusdir(),
			$keys[65] => $this->getLugsal(),
			$keys[66] => $this->getCodpai(),
			$keys[67] => $this->getStaren(),
			$keys[68] => $this->getHosped(),
			$keys[69] => $this->getObshos(),
			$keys[70] => $this->getUsuapr(),
			$keys[71] => $this->getFecapr(),
			$keys[72] => $this->getLogusu(),
			$keys[73] => $this->getCodpro(),
			$keys[74] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViasolviatraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setFecsol($value);
				break;
			case 2:
				$this->setTipvia($value);
				break;
			case 3:
				$this->setCodeve($value);
				break;
			case 4:
				$this->setCodemp($value);
				break;
			case 5:
				$this->setCodcat($value);
				break;
			case 6:
				$this->setCodniv($value);
				break;
			case 7:
				$this->setCodempaco($value);
				break;
			case 8:
				$this->setCodnivaco($value);
				break;
			case 9:
				$this->setDessol($value);
				break;
			case 10:
				$this->setCodciu($value);
				break;
			case 11:
				$this->setCodnivapr($value);
				break;
			case 12:
				$this->setCodproced($value);
				break;
			case 13:
				$this->setStatus($value);
				break;
			case 14:
				$this->setFecdes($value);
				break;
			case 15:
				$this->setFechas($value);
				break;
			case 16:
				$this->setNumdia($value);
				break;
			case 17:
				$this->setCodfortra($value);
				break;
			case 18:
				$this->setCodempaut($value);
				break;
			case 19:
				$this->setCodcen($value);
				break;
			case 20:
				$this->setCodubi($value);
				break;
			case 21:
				$this->setNomempe($value);
				break;
			case 22:
				$this->setTipbol($value);
				break;
			case 23:
				$this->setMonbol($value);
				break;
			case 24:
				$this->setFecanu($value);
				break;
			case 25:
				$this->setDesanu($value);
				break;
			case 26:
				$this->setCoddirec($value);
				break;
			case 27:
				$this->setEsnoemp($value);
				break;
			case 28:
				$this->setNumpas($value);
				break;
			case 29:
				$this->setNumvis($value);
				break;
			case 30:
				$this->setNumcel($value);
				break;
			case 31:
				$this->setNumext($value);
				break;
			case 32:
				$this->setApepercon($value);
				break;
			case 33:
				$this->setNompercon($value);
				break;
			case 34:
				$this->setParpercon($value);
				break;
			case 35:
				$this->setNumhabpercon($value);
				break;
			case 36:
				$this->setNumcelpercon($value);
				break;
			case 37:
				$this->setReqbolaer($value);
				break;
			case 38:
				$this->setReqhospe($value);
				break;
			case 39:
				$this->setReqtrater($value);
				break;
			case 40:
				$this->setHorsal($value);
				break;
			case 41:
				$this->setHorlle($value);
				break;
			case 42:
				$this->setRutbolaer($value);
				break;
			case 43:
				$this->setMotviabol($value);
				break;
			case 44:
				$this->setTipserv($value);
				break;
			case 45:
				$this->setCanvehi($value);
				break;
			case 46:
				$this->setTipvehi($value);
				break;
			case 47:
				$this->setCandias($value);
				break;
			case 48:
				$this->setCanpasaj($value);
				break;
			case 49:
				$this->setEquipaj($value);
				break;
			case 50:
				$this->setInstrum($value);
				break;
			case 51:
				$this->setBultos($value);
				break;
			case 52:
				$this->setConesper($value);
				break;
			case 53:
				$this->setAdisposi($value);
				break;
			case 54:
				$this->setCodempusu($value);
				break;
			case 55:
				$this->setCelemp($value);
				break;
			case 56:
				$this->setTippas($value);
				break;
			case 57:
				$this->setFecsal($value);
				break;
			case 58:
				$this->setHorsalb($value);
				break;
			case 59:
				$this->setFecreg($value);
				break;
			case 60:
				$this->setHorreg($value);
				break;
			case 61:
				$this->setItinerario($value);
				break;
			case 62:
				$this->setCodnivorg($value);
				break;
			case 63:
				$this->setCodmun($value);
				break;
			case 64:
				$this->setStatusdir($value);
				break;
			case 65:
				$this->setLugsal($value);
				break;
			case 66:
				$this->setCodpai($value);
				break;
			case 67:
				$this->setStaren($value);
				break;
			case 68:
				$this->setHosped($value);
				break;
			case 69:
				$this->setObshos($value);
				break;
			case 70:
				$this->setUsuapr($value);
				break;
			case 71:
				$this->setFecapr($value);
				break;
			case 72:
				$this->setLogusu($value);
				break;
			case 73:
				$this->setCodpro($value);
				break;
			case 74:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViasolviatraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipvia($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodeve($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodcat($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodniv($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodempaco($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodnivaco($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDessol($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodciu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodnivapr($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodproced($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStatus($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFecdes($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFechas($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNumdia($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCodfortra($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCodempaut($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCodcen($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodubi($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setNomempe($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setTipbol($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setMonbol($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setFecanu($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDesanu($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCoddirec($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setEsnoemp($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setNumpas($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setNumvis($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setNumcel($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setNumext($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setApepercon($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setNompercon($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setParpercon($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setNumhabpercon($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setNumcelpercon($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setReqbolaer($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setReqhospe($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setReqtrater($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setHorsal($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setHorlle($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setRutbolaer($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setMotviabol($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setTipserv($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setCanvehi($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setTipvehi($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setCandias($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setCanpasaj($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setEquipaj($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setInstrum($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setBultos($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setConesper($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setAdisposi($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setCodempusu($arr[$keys[54]]);
		if (array_key_exists($keys[55], $arr)) $this->setCelemp($arr[$keys[55]]);
		if (array_key_exists($keys[56], $arr)) $this->setTippas($arr[$keys[56]]);
		if (array_key_exists($keys[57], $arr)) $this->setFecsal($arr[$keys[57]]);
		if (array_key_exists($keys[58], $arr)) $this->setHorsalb($arr[$keys[58]]);
		if (array_key_exists($keys[59], $arr)) $this->setFecreg($arr[$keys[59]]);
		if (array_key_exists($keys[60], $arr)) $this->setHorreg($arr[$keys[60]]);
		if (array_key_exists($keys[61], $arr)) $this->setItinerario($arr[$keys[61]]);
		if (array_key_exists($keys[62], $arr)) $this->setCodnivorg($arr[$keys[62]]);
		if (array_key_exists($keys[63], $arr)) $this->setCodmun($arr[$keys[63]]);
		if (array_key_exists($keys[64], $arr)) $this->setStatusdir($arr[$keys[64]]);
		if (array_key_exists($keys[65], $arr)) $this->setLugsal($arr[$keys[65]]);
		if (array_key_exists($keys[66], $arr)) $this->setCodpai($arr[$keys[66]]);
		if (array_key_exists($keys[67], $arr)) $this->setStaren($arr[$keys[67]]);
		if (array_key_exists($keys[68], $arr)) $this->setHosped($arr[$keys[68]]);
		if (array_key_exists($keys[69], $arr)) $this->setObshos($arr[$keys[69]]);
		if (array_key_exists($keys[70], $arr)) $this->setUsuapr($arr[$keys[70]]);
		if (array_key_exists($keys[71], $arr)) $this->setFecapr($arr[$keys[71]]);
		if (array_key_exists($keys[72], $arr)) $this->setLogusu($arr[$keys[72]]);
		if (array_key_exists($keys[73], $arr)) $this->setCodpro($arr[$keys[73]]);
		if (array_key_exists($keys[74], $arr)) $this->setId($arr[$keys[74]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViasolviatraPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViasolviatraPeer::NUMSOL)) $criteria->add(ViasolviatraPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(ViasolviatraPeer::FECSOL)) $criteria->add(ViasolviatraPeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(ViasolviatraPeer::TIPVIA)) $criteria->add(ViasolviatraPeer::TIPVIA, $this->tipvia);
		if ($this->isColumnModified(ViasolviatraPeer::CODEVE)) $criteria->add(ViasolviatraPeer::CODEVE, $this->codeve);
		if ($this->isColumnModified(ViasolviatraPeer::CODEMP)) $criteria->add(ViasolviatraPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(ViasolviatraPeer::CODCAT)) $criteria->add(ViasolviatraPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ViasolviatraPeer::CODNIV)) $criteria->add(ViasolviatraPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(ViasolviatraPeer::CODEMPACO)) $criteria->add(ViasolviatraPeer::CODEMPACO, $this->codempaco);
		if ($this->isColumnModified(ViasolviatraPeer::CODNIVACO)) $criteria->add(ViasolviatraPeer::CODNIVACO, $this->codnivaco);
		if ($this->isColumnModified(ViasolviatraPeer::DESSOL)) $criteria->add(ViasolviatraPeer::DESSOL, $this->dessol);
		if ($this->isColumnModified(ViasolviatraPeer::CODCIU)) $criteria->add(ViasolviatraPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(ViasolviatraPeer::CODNIVAPR)) $criteria->add(ViasolviatraPeer::CODNIVAPR, $this->codnivapr);
		if ($this->isColumnModified(ViasolviatraPeer::CODPROCED)) $criteria->add(ViasolviatraPeer::CODPROCED, $this->codproced);
		if ($this->isColumnModified(ViasolviatraPeer::STATUS)) $criteria->add(ViasolviatraPeer::STATUS, $this->status);
		if ($this->isColumnModified(ViasolviatraPeer::FECDES)) $criteria->add(ViasolviatraPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(ViasolviatraPeer::FECHAS)) $criteria->add(ViasolviatraPeer::FECHAS, $this->fechas);
		if ($this->isColumnModified(ViasolviatraPeer::NUMDIA)) $criteria->add(ViasolviatraPeer::NUMDIA, $this->numdia);
		if ($this->isColumnModified(ViasolviatraPeer::CODFORTRA)) $criteria->add(ViasolviatraPeer::CODFORTRA, $this->codfortra);
		if ($this->isColumnModified(ViasolviatraPeer::CODEMPAUT)) $criteria->add(ViasolviatraPeer::CODEMPAUT, $this->codempaut);
		if ($this->isColumnModified(ViasolviatraPeer::CODCEN)) $criteria->add(ViasolviatraPeer::CODCEN, $this->codcen);
		if ($this->isColumnModified(ViasolviatraPeer::CODUBI)) $criteria->add(ViasolviatraPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(ViasolviatraPeer::NOMEMPE)) $criteria->add(ViasolviatraPeer::NOMEMPE, $this->nomempe);
		if ($this->isColumnModified(ViasolviatraPeer::TIPBOL)) $criteria->add(ViasolviatraPeer::TIPBOL, $this->tipbol);
		if ($this->isColumnModified(ViasolviatraPeer::MONBOL)) $criteria->add(ViasolviatraPeer::MONBOL, $this->monbol);
		if ($this->isColumnModified(ViasolviatraPeer::FECANU)) $criteria->add(ViasolviatraPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(ViasolviatraPeer::DESANU)) $criteria->add(ViasolviatraPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(ViasolviatraPeer::CODDIREC)) $criteria->add(ViasolviatraPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(ViasolviatraPeer::ESNOEMP)) $criteria->add(ViasolviatraPeer::ESNOEMP, $this->esnoemp);
		if ($this->isColumnModified(ViasolviatraPeer::NUMPAS)) $criteria->add(ViasolviatraPeer::NUMPAS, $this->numpas);
		if ($this->isColumnModified(ViasolviatraPeer::NUMVIS)) $criteria->add(ViasolviatraPeer::NUMVIS, $this->numvis);
		if ($this->isColumnModified(ViasolviatraPeer::NUMCEL)) $criteria->add(ViasolviatraPeer::NUMCEL, $this->numcel);
		if ($this->isColumnModified(ViasolviatraPeer::NUMEXT)) $criteria->add(ViasolviatraPeer::NUMEXT, $this->numext);
		if ($this->isColumnModified(ViasolviatraPeer::APEPERCON)) $criteria->add(ViasolviatraPeer::APEPERCON, $this->apepercon);
		if ($this->isColumnModified(ViasolviatraPeer::NOMPERCON)) $criteria->add(ViasolviatraPeer::NOMPERCON, $this->nompercon);
		if ($this->isColumnModified(ViasolviatraPeer::PARPERCON)) $criteria->add(ViasolviatraPeer::PARPERCON, $this->parpercon);
		if ($this->isColumnModified(ViasolviatraPeer::NUMHABPERCON)) $criteria->add(ViasolviatraPeer::NUMHABPERCON, $this->numhabpercon);
		if ($this->isColumnModified(ViasolviatraPeer::NUMCELPERCON)) $criteria->add(ViasolviatraPeer::NUMCELPERCON, $this->numcelpercon);
		if ($this->isColumnModified(ViasolviatraPeer::REQBOLAER)) $criteria->add(ViasolviatraPeer::REQBOLAER, $this->reqbolaer);
		if ($this->isColumnModified(ViasolviatraPeer::REQHOSPE)) $criteria->add(ViasolviatraPeer::REQHOSPE, $this->reqhospe);
		if ($this->isColumnModified(ViasolviatraPeer::REQTRATER)) $criteria->add(ViasolviatraPeer::REQTRATER, $this->reqtrater);
		if ($this->isColumnModified(ViasolviatraPeer::HORSAL)) $criteria->add(ViasolviatraPeer::HORSAL, $this->horsal);
		if ($this->isColumnModified(ViasolviatraPeer::HORLLE)) $criteria->add(ViasolviatraPeer::HORLLE, $this->horlle);
		if ($this->isColumnModified(ViasolviatraPeer::RUTBOLAER)) $criteria->add(ViasolviatraPeer::RUTBOLAER, $this->rutbolaer);
		if ($this->isColumnModified(ViasolviatraPeer::MOTVIABOL)) $criteria->add(ViasolviatraPeer::MOTVIABOL, $this->motviabol);
		if ($this->isColumnModified(ViasolviatraPeer::TIPSERV)) $criteria->add(ViasolviatraPeer::TIPSERV, $this->tipserv);
		if ($this->isColumnModified(ViasolviatraPeer::CANVEHI)) $criteria->add(ViasolviatraPeer::CANVEHI, $this->canvehi);
		if ($this->isColumnModified(ViasolviatraPeer::TIPVEHI)) $criteria->add(ViasolviatraPeer::TIPVEHI, $this->tipvehi);
		if ($this->isColumnModified(ViasolviatraPeer::CANDIAS)) $criteria->add(ViasolviatraPeer::CANDIAS, $this->candias);
		if ($this->isColumnModified(ViasolviatraPeer::CANPASAJ)) $criteria->add(ViasolviatraPeer::CANPASAJ, $this->canpasaj);
		if ($this->isColumnModified(ViasolviatraPeer::EQUIPAJ)) $criteria->add(ViasolviatraPeer::EQUIPAJ, $this->equipaj);
		if ($this->isColumnModified(ViasolviatraPeer::INSTRUM)) $criteria->add(ViasolviatraPeer::INSTRUM, $this->instrum);
		if ($this->isColumnModified(ViasolviatraPeer::BULTOS)) $criteria->add(ViasolviatraPeer::BULTOS, $this->bultos);
		if ($this->isColumnModified(ViasolviatraPeer::CONESPER)) $criteria->add(ViasolviatraPeer::CONESPER, $this->conesper);
		if ($this->isColumnModified(ViasolviatraPeer::ADISPOSI)) $criteria->add(ViasolviatraPeer::ADISPOSI, $this->adisposi);
		if ($this->isColumnModified(ViasolviatraPeer::CODEMPUSU)) $criteria->add(ViasolviatraPeer::CODEMPUSU, $this->codempusu);
		if ($this->isColumnModified(ViasolviatraPeer::CELEMP)) $criteria->add(ViasolviatraPeer::CELEMP, $this->celemp);
		if ($this->isColumnModified(ViasolviatraPeer::TIPPAS)) $criteria->add(ViasolviatraPeer::TIPPAS, $this->tippas);
		if ($this->isColumnModified(ViasolviatraPeer::FECSAL)) $criteria->add(ViasolviatraPeer::FECSAL, $this->fecsal);
		if ($this->isColumnModified(ViasolviatraPeer::HORSALB)) $criteria->add(ViasolviatraPeer::HORSALB, $this->horsalb);
		if ($this->isColumnModified(ViasolviatraPeer::FECREG)) $criteria->add(ViasolviatraPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(ViasolviatraPeer::HORREG)) $criteria->add(ViasolviatraPeer::HORREG, $this->horreg);
		if ($this->isColumnModified(ViasolviatraPeer::ITINERARIO)) $criteria->add(ViasolviatraPeer::ITINERARIO, $this->itinerario);
		if ($this->isColumnModified(ViasolviatraPeer::CODNIVORG)) $criteria->add(ViasolviatraPeer::CODNIVORG, $this->codnivorg);
		if ($this->isColumnModified(ViasolviatraPeer::CODMUN)) $criteria->add(ViasolviatraPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(ViasolviatraPeer::STATUSDIR)) $criteria->add(ViasolviatraPeer::STATUSDIR, $this->statusdir);
		if ($this->isColumnModified(ViasolviatraPeer::LUGSAL)) $criteria->add(ViasolviatraPeer::LUGSAL, $this->lugsal);
		if ($this->isColumnModified(ViasolviatraPeer::CODPAI)) $criteria->add(ViasolviatraPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(ViasolviatraPeer::STAREN)) $criteria->add(ViasolviatraPeer::STAREN, $this->staren);
		if ($this->isColumnModified(ViasolviatraPeer::HOSPED)) $criteria->add(ViasolviatraPeer::HOSPED, $this->hosped);
		if ($this->isColumnModified(ViasolviatraPeer::OBSHOS)) $criteria->add(ViasolviatraPeer::OBSHOS, $this->obshos);
		if ($this->isColumnModified(ViasolviatraPeer::USUAPR)) $criteria->add(ViasolviatraPeer::USUAPR, $this->usuapr);
		if ($this->isColumnModified(ViasolviatraPeer::FECAPR)) $criteria->add(ViasolviatraPeer::FECAPR, $this->fecapr);
		if ($this->isColumnModified(ViasolviatraPeer::LOGUSU)) $criteria->add(ViasolviatraPeer::LOGUSU, $this->logusu);
		if ($this->isColumnModified(ViasolviatraPeer::CODPRO)) $criteria->add(ViasolviatraPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(ViasolviatraPeer::ID)) $criteria->add(ViasolviatraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViasolviatraPeer::DATABASE_NAME);

		$criteria->add(ViasolviatraPeer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setFecsol($this->fecsol);

		$copyObj->setTipvia($this->tipvia);

		$copyObj->setCodeve($this->codeve);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setCodempaco($this->codempaco);

		$copyObj->setCodnivaco($this->codnivaco);

		$copyObj->setDessol($this->dessol);

		$copyObj->setCodciu($this->codciu);

		$copyObj->setCodnivapr($this->codnivapr);

		$copyObj->setCodproced($this->codproced);

		$copyObj->setStatus($this->status);

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setFechas($this->fechas);

		$copyObj->setNumdia($this->numdia);

		$copyObj->setCodfortra($this->codfortra);

		$copyObj->setCodempaut($this->codempaut);

		$copyObj->setCodcen($this->codcen);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setNomempe($this->nomempe);

		$copyObj->setTipbol($this->tipbol);

		$copyObj->setMonbol($this->monbol);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setCoddirec($this->coddirec);

		$copyObj->setEsnoemp($this->esnoemp);

		$copyObj->setNumpas($this->numpas);

		$copyObj->setNumvis($this->numvis);

		$copyObj->setNumcel($this->numcel);

		$copyObj->setNumext($this->numext);

		$copyObj->setApepercon($this->apepercon);

		$copyObj->setNompercon($this->nompercon);

		$copyObj->setParpercon($this->parpercon);

		$copyObj->setNumhabpercon($this->numhabpercon);

		$copyObj->setNumcelpercon($this->numcelpercon);

		$copyObj->setReqbolaer($this->reqbolaer);

		$copyObj->setReqhospe($this->reqhospe);

		$copyObj->setReqtrater($this->reqtrater);

		$copyObj->setHorsal($this->horsal);

		$copyObj->setHorlle($this->horlle);

		$copyObj->setRutbolaer($this->rutbolaer);

		$copyObj->setMotviabol($this->motviabol);

		$copyObj->setTipserv($this->tipserv);

		$copyObj->setCanvehi($this->canvehi);

		$copyObj->setTipvehi($this->tipvehi);

		$copyObj->setCandias($this->candias);

		$copyObj->setCanpasaj($this->canpasaj);

		$copyObj->setEquipaj($this->equipaj);

		$copyObj->setInstrum($this->instrum);

		$copyObj->setBultos($this->bultos);

		$copyObj->setConesper($this->conesper);

		$copyObj->setAdisposi($this->adisposi);

		$copyObj->setCodempusu($this->codempusu);

		$copyObj->setCelemp($this->celemp);

		$copyObj->setTippas($this->tippas);

		$copyObj->setFecsal($this->fecsal);

		$copyObj->setHorsalb($this->horsalb);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setHorreg($this->horreg);

		$copyObj->setItinerario($this->itinerario);

		$copyObj->setCodnivorg($this->codnivorg);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setStatusdir($this->statusdir);

		$copyObj->setLugsal($this->lugsal);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setStaren($this->staren);

		$copyObj->setHosped($this->hosped);

		$copyObj->setObshos($this->obshos);

		$copyObj->setUsuapr($this->usuapr);

		$copyObj->setFecapr($this->fecapr);

		$copyObj->setLogusu($this->logusu);

		$copyObj->setCodpro($this->codpro);


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
			self::$peer = new ViasolviatraPeer();
		}
		return self::$peer;
	}

} 