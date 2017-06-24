<?php


abstract class BaseFafactur extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reffac;


	
	protected $fecfac;


	
	protected $codcli;


	
	protected $desfac;


	
	protected $tipref;


	
	protected $monfac;


	
	protected $mondesc;


	
	protected $codconpag;


	
	protected $numcom;


	
	protected $reapor;


	
	protected $fecanu;


	
	protected $status;


	
	protected $observ;


	
	protected $tipmon;


	
	protected $valmon;


	
	protected $numcomord;


	
	protected $numcominv;


	
	protected $sucursal;


	
	protected $motanu;


	
	protected $vuelto;


	
	protected $codcaj;


	
	protected $numcontrol;


	
	protected $proform;


	
	protected $codubi;


	
	protected $tipoven;


	
	protected $obsfac;


	
	protected $codcenaco;


	
	protected $staent;


	
	protected $fecent;


	
	protected $usuent;


	
	protected $codcon;


	
	protected $btufin;


	
	protected $puedph;


	
	protected $puedes;


	
	protected $buque;


	
	protected $fadescripfac_id;


	
	protected $codprg;


	
	protected $conpag;


	
	protected $codalmusu;


	
	protected $nroordfac;


	
	protected $codpropat;


	
	protected $codprorad;


	
	protected $rifprod;


	
	protected $version;


	
	protected $fectrades;


	
	protected $fectrahas;


	
	protected $frectra;


	
	protected $duracion;


	
	protected $obstra;


	
	protected $muelle;


	
	protected $buque2;


	
	protected $expedi;


	
	protected $bele;


	
	protected $factura;


	
	protected $embarca;


	
	protected $descarga;


	
	protected $canbul;


	
	protected $codprod;


	
	protected $tmdesc;


	
	protected $fecatra;


	
	protected $fecinidesc;


	
	protected $fecfindesc;


	
	protected $valcifs;


	
	protected $fecper1;


	
	protected $fecper2;


	
	protected $coddirec;


	
	protected $impfissta;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $created_by_user;


	
	protected $updated_by_user;


	
	protected $id;

	
	protected $aFacliente;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReffac()
  {

    return trim($this->reffac);

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

  
  public function getCodcli()
  {

    return trim($this->codcli);

  }
  
  public function getDesfac()
  {

    return trim($this->desfac);

  }
  
  public function getTipref()
  {

    return trim($this->tipref);

  }
  
  public function getMonfac($val=false)
  {

    if($val) return number_format($this->monfac,2,',','.');
    else return $this->monfac;

  }
  
  public function getMondesc($val=false)
  {

    if($val) return number_format($this->mondesc,2,',','.');
    else return $this->mondesc;

  }
  
  public function getCodconpag()
  {

    return $this->codconpag;

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getReapor()
  {

    return trim($this->reapor);

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

  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

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
  
  public function getNumcomord()
  {

    return trim($this->numcomord);

  }
  
  public function getNumcominv()
  {

    return trim($this->numcominv);

  }
  
  public function getSucursal()
  {

    return trim($this->sucursal);

  }
  
  public function getMotanu()
  {

    return trim($this->motanu);

  }
  
  public function getVuelto($val=false)
  {

    if($val) return number_format($this->vuelto,2,',','.');
    else return $this->vuelto;

  }
  
  public function getCodcaj()
  {

    return $this->codcaj;

  }
  
  public function getNumcontrol()
  {

    return trim($this->numcontrol);

  }
  
  public function getProform()
  {

    return trim($this->proform);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getTipoven()
  {

    return trim($this->tipoven);

  }
  
  public function getObsfac()
  {

    return trim($this->obsfac);

  }
  
  public function getCodcenaco()
  {

    return trim($this->codcenaco);

  }
  
  public function getStaent()
  {

    return trim($this->staent);

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

  
  public function getUsuent()
  {

    return trim($this->usuent);

  }
  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getBtufin($val=false)
  {

    if($val) return number_format($this->btufin,2,',','.');
    else return $this->btufin;

  }
  
  public function getPuedph()
  {

    return trim($this->puedph);

  }
  
  public function getPuedes()
  {

    return trim($this->puedes);

  }
  
  public function getBuque()
  {

    return trim($this->buque);

  }
  
  public function getFadescripfacId()
  {

    return $this->fadescripfac_id;

  }
  
  public function getCodprg()
  {

    return trim($this->codprg);

  }
  
  public function getConpag()
  {

    return $this->conpag;

  }
  
  public function getCodalmusu()
  {

    return trim($this->codalmusu);

  }
  
  public function getNroordfac()
  {

    return trim($this->nroordfac);

  }
  
  public function getCodpropat()
  {

    return trim($this->codpropat);

  }
  
  public function getCodprorad()
  {

    return trim($this->codprorad);

  }
  
  public function getRifprod()
  {

    return trim($this->rifprod);

  }
  
  public function getVersion()
  {

    return trim($this->version);

  }
  
  public function getFectrades($format = 'Y-m-d')
  {

    if ($this->fectrades === null || $this->fectrades === '') {
      return null;
    } elseif (!is_int($this->fectrades)) {
            $ts = adodb_strtotime($this->fectrades);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fectrades] as date/time value: " . var_export($this->fectrades, true));
      }
    } else {
      $ts = $this->fectrades;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFectrahas($format = 'Y-m-d')
  {

    if ($this->fectrahas === null || $this->fectrahas === '') {
      return null;
    } elseif (!is_int($this->fectrahas)) {
            $ts = adodb_strtotime($this->fectrahas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fectrahas] as date/time value: " . var_export($this->fectrahas, true));
      }
    } else {
      $ts = $this->fectrahas;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFrectra()
  {

    return trim($this->frectra);

  }
  
  public function getDuracion()
  {

    return trim($this->duracion);

  }
  
  public function getObstra()
  {

    return trim($this->obstra);

  }
  
  public function getMuelle()
  {

    return trim($this->muelle);

  }
  
  public function getBuque2()
  {

    return trim($this->buque2);

  }
  
  public function getExpedi()
  {

    return trim($this->expedi);

  }
  
  public function getBele()
  {

    return trim($this->bele);

  }
  
  public function getFactura()
  {

    return trim($this->factura);

  }
  
  public function getEmbarca()
  {

    return trim($this->embarca);

  }
  
  public function getDescarga()
  {

    return trim($this->descarga);

  }
  
  public function getCanbul($val=false)
  {

    if($val) return number_format($this->canbul,2,',','.');
    else return $this->canbul;

  }
  
  public function getCodprod()
  {

    return trim($this->codprod);

  }
  
  public function getTmdesc($val=false)
  {

    if($val) return number_format($this->tmdesc,2,',','.');
    else return $this->tmdesc;

  }
  
  public function getFecatra($format = 'Y-m-d')
  {

    if ($this->fecatra === null || $this->fecatra === '') {
      return null;
    } elseif (!is_int($this->fecatra)) {
            $ts = adodb_strtotime($this->fecatra);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecatra] as date/time value: " . var_export($this->fecatra, true));
      }
    } else {
      $ts = $this->fecatra;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecinidesc($format = 'Y-m-d')
  {

    if ($this->fecinidesc === null || $this->fecinidesc === '') {
      return null;
    } elseif (!is_int($this->fecinidesc)) {
            $ts = adodb_strtotime($this->fecinidesc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecinidesc] as date/time value: " . var_export($this->fecinidesc, true));
      }
    } else {
      $ts = $this->fecinidesc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecfindesc($format = 'Y-m-d')
  {

    if ($this->fecfindesc === null || $this->fecfindesc === '') {
      return null;
    } elseif (!is_int($this->fecfindesc)) {
            $ts = adodb_strtotime($this->fecfindesc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfindesc] as date/time value: " . var_export($this->fecfindesc, true));
      }
    } else {
      $ts = $this->fecfindesc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getValcifs($val=false)
  {

    if($val) return number_format($this->valcifs,2,',','.');
    else return $this->valcifs;

  }
  
  public function getFecper1($format = 'Y-m-d')
  {

    if ($this->fecper1 === null || $this->fecper1 === '') {
      return null;
    } elseif (!is_int($this->fecper1)) {
            $ts = adodb_strtotime($this->fecper1);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecper1] as date/time value: " . var_export($this->fecper1, true));
      }
    } else {
      $ts = $this->fecper1;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecper2($format = 'Y-m-d')
  {

    if ($this->fecper2 === null || $this->fecper2 === '') {
      return null;
    } elseif (!is_int($this->fecper2)) {
            $ts = adodb_strtotime($this->fecper2);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecper2] as date/time value: " . var_export($this->fecper2, true));
      }
    } else {
      $ts = $this->fecper2;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getImpfissta()
  {

    return trim($this->impfissta);

  }
  
  public function getCreatedAt($format = 'Y-m-d H:i:s')
  {

    if ($this->created_at === null || $this->created_at === '') {
      return null;
    } elseif (!is_int($this->created_at)) {
            $ts = adodb_strtotime($this->created_at);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
      }
    } else {
      $ts = $this->created_at;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUpdatedAt($format = 'Y-m-d H:i:s')
  {

    if ($this->updated_at === null || $this->updated_at === '') {
      return null;
    } elseif (!is_int($this->updated_at)) {
            $ts = adodb_strtotime($this->updated_at);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
      }
    } else {
      $ts = $this->updated_at;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCreatedByUser()
  {

    if($this->created_by_user=='') $this->setCreatedByUser(sfContext::getInstance()->getUser()->getAttribute('loguse'));
    return $this->created_by_user;

  }
  
  public function getUpdatedByUser()
  {

    $this->setUpdatedByUser(sfContext::getInstance()->getUser()->getAttribute('loguse'));
    return $this->updated_by_user;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReffac($v)
	{

    if ($this->reffac !== $v) {
        $this->reffac = $v;
        $this->modifiedColumns[] = FafacturPeer::REFFAC;
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
      $this->modifiedColumns[] = FafacturPeer::FECFAC;
    }

	} 
	
	public function setCodcli($v)
	{

    if ($this->codcli !== $v) {
        $this->codcli = $v;
        $this->modifiedColumns[] = FafacturPeer::CODCLI;
      }
  
		if ($this->aFacliente !== null && $this->aFacliente->getCodpro() !== $v) {
			$this->aFacliente = null;
		}

	} 
	
	public function setDesfac($v)
	{

    if ($this->desfac !== $v) {
        $this->desfac = $v;
        $this->modifiedColumns[] = FafacturPeer::DESFAC;
      }
  
	} 
	
	public function setTipref($v)
	{

    if ($this->tipref !== $v) {
        $this->tipref = $v;
        $this->modifiedColumns[] = FafacturPeer::TIPREF;
      }
  
	} 
	
	public function setMonfac($v)
	{

    if ($this->monfac !== $v) {
        $this->monfac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturPeer::MONFAC;
      }
  
	} 
	
	public function setMondesc($v)
	{

    if ($this->mondesc !== $v) {
        $this->mondesc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturPeer::MONDESC;
      }
  
	} 
	
	public function setCodconpag($v)
	{

    if ($this->codconpag !== $v) {
        $this->codconpag = $v;
        $this->modifiedColumns[] = FafacturPeer::CODCONPAG;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = FafacturPeer::NUMCOM;
      }
  
	} 
	
	public function setReapor($v)
	{

    if ($this->reapor !== $v) {
        $this->reapor = $v;
        $this->modifiedColumns[] = FafacturPeer::REAPOR;
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
      $this->modifiedColumns[] = FafacturPeer::FECANU;
    }

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = FafacturPeer::STATUS;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = FafacturPeer::OBSERV;
      }
  
	} 
	
	public function setTipmon($v)
	{

    if ($this->tipmon !== $v) {
        $this->tipmon = $v;
        $this->modifiedColumns[] = FafacturPeer::TIPMON;
      }
  
	} 
	
	public function setValmon($v)
	{

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturPeer::VALMON;
      }
  
	} 
	
	public function setNumcomord($v)
	{

    if ($this->numcomord !== $v) {
        $this->numcomord = $v;
        $this->modifiedColumns[] = FafacturPeer::NUMCOMORD;
      }
  
	} 
	
	public function setNumcominv($v)
	{

    if ($this->numcominv !== $v) {
        $this->numcominv = $v;
        $this->modifiedColumns[] = FafacturPeer::NUMCOMINV;
      }
  
	} 
	
	public function setSucursal($v)
	{

    if ($this->sucursal !== $v) {
        $this->sucursal = $v;
        $this->modifiedColumns[] = FafacturPeer::SUCURSAL;
      }
  
	} 
	
	public function setMotanu($v)
	{

    if ($this->motanu !== $v) {
        $this->motanu = $v;
        $this->modifiedColumns[] = FafacturPeer::MOTANU;
      }
  
	} 
	
	public function setVuelto($v)
	{

    if ($this->vuelto !== $v) {
        $this->vuelto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturPeer::VUELTO;
      }
  
	} 
	
	public function setCodcaj($v)
	{

    if ($this->codcaj !== $v) {
        $this->codcaj = $v;
        $this->modifiedColumns[] = FafacturPeer::CODCAJ;
      }
  
	} 
	
	public function setNumcontrol($v)
	{

    if ($this->numcontrol !== $v) {
        $this->numcontrol = $v;
        $this->modifiedColumns[] = FafacturPeer::NUMCONTROL;
      }
  
	} 
	
	public function setProform($v)
	{

    if ($this->proform !== $v) {
        $this->proform = $v;
        $this->modifiedColumns[] = FafacturPeer::PROFORM;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = FafacturPeer::CODUBI;
      }
  
	} 
	
	public function setTipoven($v)
	{

    if ($this->tipoven !== $v) {
        $this->tipoven = $v;
        $this->modifiedColumns[] = FafacturPeer::TIPOVEN;
      }
  
	} 
	
	public function setObsfac($v)
	{

    if ($this->obsfac !== $v) {
        $this->obsfac = $v;
        $this->modifiedColumns[] = FafacturPeer::OBSFAC;
      }
  
	} 
	
	public function setCodcenaco($v)
	{

    if ($this->codcenaco !== $v) {
        $this->codcenaco = $v;
        $this->modifiedColumns[] = FafacturPeer::CODCENACO;
      }
  
	} 
	
	public function setStaent($v)
	{

    if ($this->staent !== $v) {
        $this->staent = $v;
        $this->modifiedColumns[] = FafacturPeer::STAENT;
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
      $this->modifiedColumns[] = FafacturPeer::FECENT;
    }

	} 
	
	public function setUsuent($v)
	{

    if ($this->usuent !== $v) {
        $this->usuent = $v;
        $this->modifiedColumns[] = FafacturPeer::USUENT;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = FafacturPeer::CODCON;
      }
  
	} 
	
	public function setBtufin($v)
	{

    if ($this->btufin !== $v) {
        $this->btufin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturPeer::BTUFIN;
      }
  
	} 
	
	public function setPuedph($v)
	{

    if ($this->puedph !== $v) {
        $this->puedph = $v;
        $this->modifiedColumns[] = FafacturPeer::PUEDPH;
      }
  
	} 
	
	public function setPuedes($v)
	{

    if ($this->puedes !== $v) {
        $this->puedes = $v;
        $this->modifiedColumns[] = FafacturPeer::PUEDES;
      }
  
	} 
	
	public function setBuque($v)
	{

    if ($this->buque !== $v) {
        $this->buque = $v;
        $this->modifiedColumns[] = FafacturPeer::BUQUE;
      }
  
	} 
	
	public function setFadescripfacId($v)
	{

    if ($this->fadescripfac_id !== $v) {
        $this->fadescripfac_id = $v;
        $this->modifiedColumns[] = FafacturPeer::FADESCRIPFAC_ID;
      }
  
	} 
	
	public function setCodprg($v)
	{

    if ($this->codprg !== $v) {
        $this->codprg = $v;
        $this->modifiedColumns[] = FafacturPeer::CODPRG;
      }
  
	} 
	
	public function setConpag($v)
	{

    if ($this->conpag !== $v) {
        $this->conpag = $v;
        $this->modifiedColumns[] = FafacturPeer::CONPAG;
      }
  
	} 
	
	public function setCodalmusu($v)
	{

    if ($this->codalmusu !== $v) {
        $this->codalmusu = $v;
        $this->modifiedColumns[] = FafacturPeer::CODALMUSU;
      }
  
	} 
	
	public function setNroordfac($v)
	{

    if ($this->nroordfac !== $v) {
        $this->nroordfac = $v;
        $this->modifiedColumns[] = FafacturPeer::NROORDFAC;
      }
  
	} 
	
	public function setCodpropat($v)
	{

    if ($this->codpropat !== $v) {
        $this->codpropat = $v;
        $this->modifiedColumns[] = FafacturPeer::CODPROPAT;
      }
  
	} 
	
	public function setCodprorad($v)
	{

    if ($this->codprorad !== $v) {
        $this->codprorad = $v;
        $this->modifiedColumns[] = FafacturPeer::CODPRORAD;
      }
  
	} 
	
	public function setRifprod($v)
	{

    if ($this->rifprod !== $v) {
        $this->rifprod = $v;
        $this->modifiedColumns[] = FafacturPeer::RIFPROD;
      }
  
	} 
	
	public function setVersion($v)
	{

    if ($this->version !== $v) {
        $this->version = $v;
        $this->modifiedColumns[] = FafacturPeer::VERSION;
      }
  
	} 
	
	public function setFectrades($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fectrades] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fectrades !== $ts) {
      $this->fectrades = $ts;
      $this->modifiedColumns[] = FafacturPeer::FECTRADES;
    }

	} 
	
	public function setFectrahas($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fectrahas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fectrahas !== $ts) {
      $this->fectrahas = $ts;
      $this->modifiedColumns[] = FafacturPeer::FECTRAHAS;
    }

	} 
	
	public function setFrectra($v)
	{

    if ($this->frectra !== $v) {
        $this->frectra = $v;
        $this->modifiedColumns[] = FafacturPeer::FRECTRA;
      }
  
	} 
	
	public function setDuracion($v)
	{

    if ($this->duracion !== $v) {
        $this->duracion = $v;
        $this->modifiedColumns[] = FafacturPeer::DURACION;
      }
  
	} 
	
	public function setObstra($v)
	{

    if ($this->obstra !== $v) {
        $this->obstra = $v;
        $this->modifiedColumns[] = FafacturPeer::OBSTRA;
      }
  
	} 
	
	public function setMuelle($v)
	{

    if ($this->muelle !== $v) {
        $this->muelle = $v;
        $this->modifiedColumns[] = FafacturPeer::MUELLE;
      }
  
	} 
	
	public function setBuque2($v)
	{

    if ($this->buque2 !== $v) {
        $this->buque2 = $v;
        $this->modifiedColumns[] = FafacturPeer::BUQUE2;
      }
  
	} 
	
	public function setExpedi($v)
	{

    if ($this->expedi !== $v) {
        $this->expedi = $v;
        $this->modifiedColumns[] = FafacturPeer::EXPEDI;
      }
  
	} 
	
	public function setBele($v)
	{

    if ($this->bele !== $v) {
        $this->bele = $v;
        $this->modifiedColumns[] = FafacturPeer::BELE;
      }
  
	} 
	
	public function setFactura($v)
	{

    if ($this->factura !== $v) {
        $this->factura = $v;
        $this->modifiedColumns[] = FafacturPeer::FACTURA;
      }
  
	} 
	
	public function setEmbarca($v)
	{

    if ($this->embarca !== $v) {
        $this->embarca = $v;
        $this->modifiedColumns[] = FafacturPeer::EMBARCA;
      }
  
	} 
	
	public function setDescarga($v)
	{

    if ($this->descarga !== $v) {
        $this->descarga = $v;
        $this->modifiedColumns[] = FafacturPeer::DESCARGA;
      }
  
	} 
	
	public function setCanbul($v)
	{

    if ($this->canbul !== $v) {
        $this->canbul = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturPeer::CANBUL;
      }
  
	} 
	
	public function setCodprod($v)
	{

    if ($this->codprod !== $v) {
        $this->codprod = $v;
        $this->modifiedColumns[] = FafacturPeer::CODPROD;
      }
  
	} 
	
	public function setTmdesc($v)
	{

    if ($this->tmdesc !== $v) {
        $this->tmdesc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturPeer::TMDESC;
      }
  
	} 
	
	public function setFecatra($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecatra] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecatra !== $ts) {
      $this->fecatra = $ts;
      $this->modifiedColumns[] = FafacturPeer::FECATRA;
    }

	} 
	
	public function setFecinidesc($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecinidesc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecinidesc !== $ts) {
      $this->fecinidesc = $ts;
      $this->modifiedColumns[] = FafacturPeer::FECINIDESC;
    }

	} 
	
	public function setFecfindesc($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfindesc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfindesc !== $ts) {
      $this->fecfindesc = $ts;
      $this->modifiedColumns[] = FafacturPeer::FECFINDESC;
    }

	} 
	
	public function setValcifs($v)
	{

    if ($this->valcifs !== $v) {
        $this->valcifs = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FafacturPeer::VALCIFS;
      }
  
	} 
	
	public function setFecper1($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecper1] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecper1 !== $ts) {
      $this->fecper1 = $ts;
      $this->modifiedColumns[] = FafacturPeer::FECPER1;
    }

	} 
	
	public function setFecper2($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecper2] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecper2 !== $ts) {
      $this->fecper2 = $ts;
      $this->modifiedColumns[] = FafacturPeer::FECPER2;
    }

	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = FafacturPeer::CODDIREC;
      }
  
	} 
	
	public function setImpfissta($v)
	{

    if ($this->impfissta !== $v) {
        $this->impfissta = $v;
        $this->modifiedColumns[] = FafacturPeer::IMPFISSTA;
      }
  
	} 
	
	public function setCreatedAt($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->created_at !== $ts) {
      $this->created_at = $ts;
      $this->modifiedColumns[] = FafacturPeer::CREATED_AT;
    }

	} 
	
	public function setUpdatedAt($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->updated_at !== $ts) {
      $this->updated_at = $ts;
      $this->modifiedColumns[] = FafacturPeer::UPDATED_AT;
    }

	} 
	
	public function setCreatedByUser($v)
	{

    if ($this->created_by_user !== $v) {
        $this->created_by_user = $v;
        $this->modifiedColumns[] = FafacturPeer::CREATED_BY_USER;
      }
  
	} 
	
	public function setUpdatedByUser($v)
	{

    if ($this->updated_by_user !== $v) {
        $this->updated_by_user = $v;
        $this->modifiedColumns[] = FafacturPeer::UPDATED_BY_USER;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FafacturPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reffac = $rs->getString($startcol + 0);

      $this->fecfac = $rs->getDate($startcol + 1, null);

      $this->codcli = $rs->getString($startcol + 2);

      $this->desfac = $rs->getString($startcol + 3);

      $this->tipref = $rs->getString($startcol + 4);

      $this->monfac = $rs->getFloat($startcol + 5);

      $this->mondesc = $rs->getFloat($startcol + 6);

      $this->codconpag = $rs->getInt($startcol + 7);

      $this->numcom = $rs->getString($startcol + 8);

      $this->reapor = $rs->getString($startcol + 9);

      $this->fecanu = $rs->getDate($startcol + 10, null);

      $this->status = $rs->getString($startcol + 11);

      $this->observ = $rs->getString($startcol + 12);

      $this->tipmon = $rs->getString($startcol + 13);

      $this->valmon = $rs->getFloat($startcol + 14);

      $this->numcomord = $rs->getString($startcol + 15);

      $this->numcominv = $rs->getString($startcol + 16);

      $this->sucursal = $rs->getString($startcol + 17);

      $this->motanu = $rs->getString($startcol + 18);

      $this->vuelto = $rs->getFloat($startcol + 19);

      $this->codcaj = $rs->getInt($startcol + 20);

      $this->numcontrol = $rs->getString($startcol + 21);

      $this->proform = $rs->getString($startcol + 22);

      $this->codubi = $rs->getString($startcol + 23);

      $this->tipoven = $rs->getString($startcol + 24);

      $this->obsfac = $rs->getString($startcol + 25);

      $this->codcenaco = $rs->getString($startcol + 26);

      $this->staent = $rs->getString($startcol + 27);

      $this->fecent = $rs->getDate($startcol + 28, null);

      $this->usuent = $rs->getString($startcol + 29);

      $this->codcon = $rs->getString($startcol + 30);

      $this->btufin = $rs->getFloat($startcol + 31);

      $this->puedph = $rs->getString($startcol + 32);

      $this->puedes = $rs->getString($startcol + 33);

      $this->buque = $rs->getString($startcol + 34);

      $this->fadescripfac_id = $rs->getInt($startcol + 35);

      $this->codprg = $rs->getString($startcol + 36);

      $this->conpag = $rs->getInt($startcol + 37);

      $this->codalmusu = $rs->getString($startcol + 38);

      $this->nroordfac = $rs->getString($startcol + 39);

      $this->codpropat = $rs->getString($startcol + 40);

      $this->codprorad = $rs->getString($startcol + 41);

      $this->rifprod = $rs->getString($startcol + 42);

      $this->version = $rs->getString($startcol + 43);

      $this->fectrades = $rs->getDate($startcol + 44, null);

      $this->fectrahas = $rs->getDate($startcol + 45, null);

      $this->frectra = $rs->getString($startcol + 46);

      $this->duracion = $rs->getString($startcol + 47);

      $this->obstra = $rs->getString($startcol + 48);

      $this->muelle = $rs->getString($startcol + 49);

      $this->buque2 = $rs->getString($startcol + 50);

      $this->expedi = $rs->getString($startcol + 51);

      $this->bele = $rs->getString($startcol + 52);

      $this->factura = $rs->getString($startcol + 53);

      $this->embarca = $rs->getString($startcol + 54);

      $this->descarga = $rs->getString($startcol + 55);

      $this->canbul = $rs->getFloat($startcol + 56);

      $this->codprod = $rs->getString($startcol + 57);

      $this->tmdesc = $rs->getFloat($startcol + 58);

      $this->fecatra = $rs->getDate($startcol + 59, null);

      $this->fecinidesc = $rs->getDate($startcol + 60, null);

      $this->fecfindesc = $rs->getDate($startcol + 61, null);

      $this->valcifs = $rs->getFloat($startcol + 62);

      $this->fecper1 = $rs->getDate($startcol + 63, null);

      $this->fecper2 = $rs->getDate($startcol + 64, null);

      $this->coddirec = $rs->getString($startcol + 65);

      $this->impfissta = $rs->getString($startcol + 66);

      $this->created_at = $rs->getTimestamp($startcol + 67, null);

      $this->updated_at = $rs->getTimestamp($startcol + 68, null);

      $this->created_by_user = $rs->getString($startcol + 69);

      $this->updated_by_user = $rs->getString($startcol + 70);

      $this->id = $rs->getInt($startcol + 71);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 72; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fafactur object", $e);
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
			$con = Propel::getConnection(FafacturPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FafacturPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(FafacturPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(FafacturPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

    if ($this->isNew() && !$this->isColumnModified(FafacturPeer::CREATED_BY_USER))
    {
      $this->setCreatedByUser(sfContext::getInstance()->getUser()->getAttribute('loguse','Sin Usuario'));
    }

    if ($this->isModified() && !$this->isColumnModified(FafacturPeer::UPDATED_BY_USER))
    {
      $this->setUpdatedByUser(sfContext::getInstance()->getUser()->getAttribute('loguse','Sin Usuario'));
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FafacturPeer::DATABASE_NAME);
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


												
			if ($this->aFacliente !== null) {
				if ($this->aFacliente->isModified()) {
					$affectedRows += $this->aFacliente->save($con);
				}
				$this->setFacliente($this->aFacliente);
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FafacturPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FafacturPeer::doUpdate($this, $con);
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


												
			if ($this->aFacliente !== null) {
				if (!$this->aFacliente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFacliente->getValidationFailures());
				}
			}

			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}


			if (($retval = FafacturPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FafacturPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReffac();
				break;
			case 1:
				return $this->getFecfac();
				break;
			case 2:
				return $this->getCodcli();
				break;
			case 3:
				return $this->getDesfac();
				break;
			case 4:
				return $this->getTipref();
				break;
			case 5:
				return $this->getMonfac();
				break;
			case 6:
				return $this->getMondesc();
				break;
			case 7:
				return $this->getCodconpag();
				break;
			case 8:
				return $this->getNumcom();
				break;
			case 9:
				return $this->getReapor();
				break;
			case 10:
				return $this->getFecanu();
				break;
			case 11:
				return $this->getStatus();
				break;
			case 12:
				return $this->getObserv();
				break;
			case 13:
				return $this->getTipmon();
				break;
			case 14:
				return $this->getValmon();
				break;
			case 15:
				return $this->getNumcomord();
				break;
			case 16:
				return $this->getNumcominv();
				break;
			case 17:
				return $this->getSucursal();
				break;
			case 18:
				return $this->getMotanu();
				break;
			case 19:
				return $this->getVuelto();
				break;
			case 20:
				return $this->getCodcaj();
				break;
			case 21:
				return $this->getNumcontrol();
				break;
			case 22:
				return $this->getProform();
				break;
			case 23:
				return $this->getCodubi();
				break;
			case 24:
				return $this->getTipoven();
				break;
			case 25:
				return $this->getObsfac();
				break;
			case 26:
				return $this->getCodcenaco();
				break;
			case 27:
				return $this->getStaent();
				break;
			case 28:
				return $this->getFecent();
				break;
			case 29:
				return $this->getUsuent();
				break;
			case 30:
				return $this->getCodcon();
				break;
			case 31:
				return $this->getBtufin();
				break;
			case 32:
				return $this->getPuedph();
				break;
			case 33:
				return $this->getPuedes();
				break;
			case 34:
				return $this->getBuque();
				break;
			case 35:
				return $this->getFadescripfacId();
				break;
			case 36:
				return $this->getCodprg();
				break;
			case 37:
				return $this->getConpag();
				break;
			case 38:
				return $this->getCodalmusu();
				break;
			case 39:
				return $this->getNroordfac();
				break;
			case 40:
				return $this->getCodpropat();
				break;
			case 41:
				return $this->getCodprorad();
				break;
			case 42:
				return $this->getRifprod();
				break;
			case 43:
				return $this->getVersion();
				break;
			case 44:
				return $this->getFectrades();
				break;
			case 45:
				return $this->getFectrahas();
				break;
			case 46:
				return $this->getFrectra();
				break;
			case 47:
				return $this->getDuracion();
				break;
			case 48:
				return $this->getObstra();
				break;
			case 49:
				return $this->getMuelle();
				break;
			case 50:
				return $this->getBuque2();
				break;
			case 51:
				return $this->getExpedi();
				break;
			case 52:
				return $this->getBele();
				break;
			case 53:
				return $this->getFactura();
				break;
			case 54:
				return $this->getEmbarca();
				break;
			case 55:
				return $this->getDescarga();
				break;
			case 56:
				return $this->getCanbul();
				break;
			case 57:
				return $this->getCodprod();
				break;
			case 58:
				return $this->getTmdesc();
				break;
			case 59:
				return $this->getFecatra();
				break;
			case 60:
				return $this->getFecinidesc();
				break;
			case 61:
				return $this->getFecfindesc();
				break;
			case 62:
				return $this->getValcifs();
				break;
			case 63:
				return $this->getFecper1();
				break;
			case 64:
				return $this->getFecper2();
				break;
			case 65:
				return $this->getCoddirec();
				break;
			case 66:
				return $this->getImpfissta();
				break;
			case 67:
				return $this->getCreatedAt();
				break;
			case 68:
				return $this->getUpdatedAt();
				break;
			case 69:
				return $this->getCreatedByUser();
				break;
			case 70:
				return $this->getUpdatedByUser();
				break;
			case 71:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FafacturPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReffac(),
			$keys[1] => $this->getFecfac(),
			$keys[2] => $this->getCodcli(),
			$keys[3] => $this->getDesfac(),
			$keys[4] => $this->getTipref(),
			$keys[5] => $this->getMonfac(),
			$keys[6] => $this->getMondesc(),
			$keys[7] => $this->getCodconpag(),
			$keys[8] => $this->getNumcom(),
			$keys[9] => $this->getReapor(),
			$keys[10] => $this->getFecanu(),
			$keys[11] => $this->getStatus(),
			$keys[12] => $this->getObserv(),
			$keys[13] => $this->getTipmon(),
			$keys[14] => $this->getValmon(),
			$keys[15] => $this->getNumcomord(),
			$keys[16] => $this->getNumcominv(),
			$keys[17] => $this->getSucursal(),
			$keys[18] => $this->getMotanu(),
			$keys[19] => $this->getVuelto(),
			$keys[20] => $this->getCodcaj(),
			$keys[21] => $this->getNumcontrol(),
			$keys[22] => $this->getProform(),
			$keys[23] => $this->getCodubi(),
			$keys[24] => $this->getTipoven(),
			$keys[25] => $this->getObsfac(),
			$keys[26] => $this->getCodcenaco(),
			$keys[27] => $this->getStaent(),
			$keys[28] => $this->getFecent(),
			$keys[29] => $this->getUsuent(),
			$keys[30] => $this->getCodcon(),
			$keys[31] => $this->getBtufin(),
			$keys[32] => $this->getPuedph(),
			$keys[33] => $this->getPuedes(),
			$keys[34] => $this->getBuque(),
			$keys[35] => $this->getFadescripfacId(),
			$keys[36] => $this->getCodprg(),
			$keys[37] => $this->getConpag(),
			$keys[38] => $this->getCodalmusu(),
			$keys[39] => $this->getNroordfac(),
			$keys[40] => $this->getCodpropat(),
			$keys[41] => $this->getCodprorad(),
			$keys[42] => $this->getRifprod(),
			$keys[43] => $this->getVersion(),
			$keys[44] => $this->getFectrades(),
			$keys[45] => $this->getFectrahas(),
			$keys[46] => $this->getFrectra(),
			$keys[47] => $this->getDuracion(),
			$keys[48] => $this->getObstra(),
			$keys[49] => $this->getMuelle(),
			$keys[50] => $this->getBuque2(),
			$keys[51] => $this->getExpedi(),
			$keys[52] => $this->getBele(),
			$keys[53] => $this->getFactura(),
			$keys[54] => $this->getEmbarca(),
			$keys[55] => $this->getDescarga(),
			$keys[56] => $this->getCanbul(),
			$keys[57] => $this->getCodprod(),
			$keys[58] => $this->getTmdesc(),
			$keys[59] => $this->getFecatra(),
			$keys[60] => $this->getFecinidesc(),
			$keys[61] => $this->getFecfindesc(),
			$keys[62] => $this->getValcifs(),
			$keys[63] => $this->getFecper1(),
			$keys[64] => $this->getFecper2(),
			$keys[65] => $this->getCoddirec(),
			$keys[66] => $this->getImpfissta(),
			$keys[67] => $this->getCreatedAt(),
			$keys[68] => $this->getUpdatedAt(),
			$keys[69] => $this->getCreatedByUser(),
			$keys[70] => $this->getUpdatedByUser(),
			$keys[71] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FafacturPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReffac($value);
				break;
			case 1:
				$this->setFecfac($value);
				break;
			case 2:
				$this->setCodcli($value);
				break;
			case 3:
				$this->setDesfac($value);
				break;
			case 4:
				$this->setTipref($value);
				break;
			case 5:
				$this->setMonfac($value);
				break;
			case 6:
				$this->setMondesc($value);
				break;
			case 7:
				$this->setCodconpag($value);
				break;
			case 8:
				$this->setNumcom($value);
				break;
			case 9:
				$this->setReapor($value);
				break;
			case 10:
				$this->setFecanu($value);
				break;
			case 11:
				$this->setStatus($value);
				break;
			case 12:
				$this->setObserv($value);
				break;
			case 13:
				$this->setTipmon($value);
				break;
			case 14:
				$this->setValmon($value);
				break;
			case 15:
				$this->setNumcomord($value);
				break;
			case 16:
				$this->setNumcominv($value);
				break;
			case 17:
				$this->setSucursal($value);
				break;
			case 18:
				$this->setMotanu($value);
				break;
			case 19:
				$this->setVuelto($value);
				break;
			case 20:
				$this->setCodcaj($value);
				break;
			case 21:
				$this->setNumcontrol($value);
				break;
			case 22:
				$this->setProform($value);
				break;
			case 23:
				$this->setCodubi($value);
				break;
			case 24:
				$this->setTipoven($value);
				break;
			case 25:
				$this->setObsfac($value);
				break;
			case 26:
				$this->setCodcenaco($value);
				break;
			case 27:
				$this->setStaent($value);
				break;
			case 28:
				$this->setFecent($value);
				break;
			case 29:
				$this->setUsuent($value);
				break;
			case 30:
				$this->setCodcon($value);
				break;
			case 31:
				$this->setBtufin($value);
				break;
			case 32:
				$this->setPuedph($value);
				break;
			case 33:
				$this->setPuedes($value);
				break;
			case 34:
				$this->setBuque($value);
				break;
			case 35:
				$this->setFadescripfacId($value);
				break;
			case 36:
				$this->setCodprg($value);
				break;
			case 37:
				$this->setConpag($value);
				break;
			case 38:
				$this->setCodalmusu($value);
				break;
			case 39:
				$this->setNroordfac($value);
				break;
			case 40:
				$this->setCodpropat($value);
				break;
			case 41:
				$this->setCodprorad($value);
				break;
			case 42:
				$this->setRifprod($value);
				break;
			case 43:
				$this->setVersion($value);
				break;
			case 44:
				$this->setFectrades($value);
				break;
			case 45:
				$this->setFectrahas($value);
				break;
			case 46:
				$this->setFrectra($value);
				break;
			case 47:
				$this->setDuracion($value);
				break;
			case 48:
				$this->setObstra($value);
				break;
			case 49:
				$this->setMuelle($value);
				break;
			case 50:
				$this->setBuque2($value);
				break;
			case 51:
				$this->setExpedi($value);
				break;
			case 52:
				$this->setBele($value);
				break;
			case 53:
				$this->setFactura($value);
				break;
			case 54:
				$this->setEmbarca($value);
				break;
			case 55:
				$this->setDescarga($value);
				break;
			case 56:
				$this->setCanbul($value);
				break;
			case 57:
				$this->setCodprod($value);
				break;
			case 58:
				$this->setTmdesc($value);
				break;
			case 59:
				$this->setFecatra($value);
				break;
			case 60:
				$this->setFecinidesc($value);
				break;
			case 61:
				$this->setFecfindesc($value);
				break;
			case 62:
				$this->setValcifs($value);
				break;
			case 63:
				$this->setFecper1($value);
				break;
			case 64:
				$this->setFecper2($value);
				break;
			case 65:
				$this->setCoddirec($value);
				break;
			case 66:
				$this->setImpfissta($value);
				break;
			case 67:
				$this->setCreatedAt($value);
				break;
			case 68:
				$this->setUpdatedAt($value);
				break;
			case 69:
				$this->setCreatedByUser($value);
				break;
			case 70:
				$this->setUpdatedByUser($value);
				break;
			case 71:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FafacturPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReffac($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecfac($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcli($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesfac($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipref($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonfac($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMondesc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodconpag($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumcom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setReapor($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecanu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStatus($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setObserv($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTipmon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setValmon($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setNumcomord($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNumcominv($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setSucursal($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setMotanu($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setVuelto($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodcaj($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setNumcontrol($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setProform($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCodubi($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setTipoven($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setObsfac($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCodcenaco($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setStaent($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setFecent($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setUsuent($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCodcon($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setBtufin($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setPuedph($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setPuedes($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setBuque($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setFadescripfacId($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setCodprg($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setConpag($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setCodalmusu($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setNroordfac($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setCodpropat($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setCodprorad($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setRifprod($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setVersion($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setFectrades($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setFectrahas($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setFrectra($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setDuracion($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setObstra($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setMuelle($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setBuque2($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setExpedi($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setBele($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setFactura($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setEmbarca($arr[$keys[54]]);
		if (array_key_exists($keys[55], $arr)) $this->setDescarga($arr[$keys[55]]);
		if (array_key_exists($keys[56], $arr)) $this->setCanbul($arr[$keys[56]]);
		if (array_key_exists($keys[57], $arr)) $this->setCodprod($arr[$keys[57]]);
		if (array_key_exists($keys[58], $arr)) $this->setTmdesc($arr[$keys[58]]);
		if (array_key_exists($keys[59], $arr)) $this->setFecatra($arr[$keys[59]]);
		if (array_key_exists($keys[60], $arr)) $this->setFecinidesc($arr[$keys[60]]);
		if (array_key_exists($keys[61], $arr)) $this->setFecfindesc($arr[$keys[61]]);
		if (array_key_exists($keys[62], $arr)) $this->setValcifs($arr[$keys[62]]);
		if (array_key_exists($keys[63], $arr)) $this->setFecper1($arr[$keys[63]]);
		if (array_key_exists($keys[64], $arr)) $this->setFecper2($arr[$keys[64]]);
		if (array_key_exists($keys[65], $arr)) $this->setCoddirec($arr[$keys[65]]);
		if (array_key_exists($keys[66], $arr)) $this->setImpfissta($arr[$keys[66]]);
		if (array_key_exists($keys[67], $arr)) $this->setCreatedAt($arr[$keys[67]]);
		if (array_key_exists($keys[68], $arr)) $this->setUpdatedAt($arr[$keys[68]]);
		if (array_key_exists($keys[69], $arr)) $this->setCreatedByUser($arr[$keys[69]]);
		if (array_key_exists($keys[70], $arr)) $this->setUpdatedByUser($arr[$keys[70]]);
		if (array_key_exists($keys[71], $arr)) $this->setId($arr[$keys[71]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FafacturPeer::DATABASE_NAME);

		if ($this->isColumnModified(FafacturPeer::REFFAC)) $criteria->add(FafacturPeer::REFFAC, $this->reffac);
		if ($this->isColumnModified(FafacturPeer::FECFAC)) $criteria->add(FafacturPeer::FECFAC, $this->fecfac);
		if ($this->isColumnModified(FafacturPeer::CODCLI)) $criteria->add(FafacturPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(FafacturPeer::DESFAC)) $criteria->add(FafacturPeer::DESFAC, $this->desfac);
		if ($this->isColumnModified(FafacturPeer::TIPREF)) $criteria->add(FafacturPeer::TIPREF, $this->tipref);
		if ($this->isColumnModified(FafacturPeer::MONFAC)) $criteria->add(FafacturPeer::MONFAC, $this->monfac);
		if ($this->isColumnModified(FafacturPeer::MONDESC)) $criteria->add(FafacturPeer::MONDESC, $this->mondesc);
		if ($this->isColumnModified(FafacturPeer::CODCONPAG)) $criteria->add(FafacturPeer::CODCONPAG, $this->codconpag);
		if ($this->isColumnModified(FafacturPeer::NUMCOM)) $criteria->add(FafacturPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(FafacturPeer::REAPOR)) $criteria->add(FafacturPeer::REAPOR, $this->reapor);
		if ($this->isColumnModified(FafacturPeer::FECANU)) $criteria->add(FafacturPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(FafacturPeer::STATUS)) $criteria->add(FafacturPeer::STATUS, $this->status);
		if ($this->isColumnModified(FafacturPeer::OBSERV)) $criteria->add(FafacturPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(FafacturPeer::TIPMON)) $criteria->add(FafacturPeer::TIPMON, $this->tipmon);
		if ($this->isColumnModified(FafacturPeer::VALMON)) $criteria->add(FafacturPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(FafacturPeer::NUMCOMORD)) $criteria->add(FafacturPeer::NUMCOMORD, $this->numcomord);
		if ($this->isColumnModified(FafacturPeer::NUMCOMINV)) $criteria->add(FafacturPeer::NUMCOMINV, $this->numcominv);
		if ($this->isColumnModified(FafacturPeer::SUCURSAL)) $criteria->add(FafacturPeer::SUCURSAL, $this->sucursal);
		if ($this->isColumnModified(FafacturPeer::MOTANU)) $criteria->add(FafacturPeer::MOTANU, $this->motanu);
		if ($this->isColumnModified(FafacturPeer::VUELTO)) $criteria->add(FafacturPeer::VUELTO, $this->vuelto);
		if ($this->isColumnModified(FafacturPeer::CODCAJ)) $criteria->add(FafacturPeer::CODCAJ, $this->codcaj);
		if ($this->isColumnModified(FafacturPeer::NUMCONTROL)) $criteria->add(FafacturPeer::NUMCONTROL, $this->numcontrol);
		if ($this->isColumnModified(FafacturPeer::PROFORM)) $criteria->add(FafacturPeer::PROFORM, $this->proform);
		if ($this->isColumnModified(FafacturPeer::CODUBI)) $criteria->add(FafacturPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(FafacturPeer::TIPOVEN)) $criteria->add(FafacturPeer::TIPOVEN, $this->tipoven);
		if ($this->isColumnModified(FafacturPeer::OBSFAC)) $criteria->add(FafacturPeer::OBSFAC, $this->obsfac);
		if ($this->isColumnModified(FafacturPeer::CODCENACO)) $criteria->add(FafacturPeer::CODCENACO, $this->codcenaco);
		if ($this->isColumnModified(FafacturPeer::STAENT)) $criteria->add(FafacturPeer::STAENT, $this->staent);
		if ($this->isColumnModified(FafacturPeer::FECENT)) $criteria->add(FafacturPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(FafacturPeer::USUENT)) $criteria->add(FafacturPeer::USUENT, $this->usuent);
		if ($this->isColumnModified(FafacturPeer::CODCON)) $criteria->add(FafacturPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(FafacturPeer::BTUFIN)) $criteria->add(FafacturPeer::BTUFIN, $this->btufin);
		if ($this->isColumnModified(FafacturPeer::PUEDPH)) $criteria->add(FafacturPeer::PUEDPH, $this->puedph);
		if ($this->isColumnModified(FafacturPeer::PUEDES)) $criteria->add(FafacturPeer::PUEDES, $this->puedes);
		if ($this->isColumnModified(FafacturPeer::BUQUE)) $criteria->add(FafacturPeer::BUQUE, $this->buque);
		if ($this->isColumnModified(FafacturPeer::FADESCRIPFAC_ID)) $criteria->add(FafacturPeer::FADESCRIPFAC_ID, $this->fadescripfac_id);
		if ($this->isColumnModified(FafacturPeer::CODPRG)) $criteria->add(FafacturPeer::CODPRG, $this->codprg);
		if ($this->isColumnModified(FafacturPeer::CONPAG)) $criteria->add(FafacturPeer::CONPAG, $this->conpag);
		if ($this->isColumnModified(FafacturPeer::CODALMUSU)) $criteria->add(FafacturPeer::CODALMUSU, $this->codalmusu);
		if ($this->isColumnModified(FafacturPeer::NROORDFAC)) $criteria->add(FafacturPeer::NROORDFAC, $this->nroordfac);
		if ($this->isColumnModified(FafacturPeer::CODPROPAT)) $criteria->add(FafacturPeer::CODPROPAT, $this->codpropat);
		if ($this->isColumnModified(FafacturPeer::CODPRORAD)) $criteria->add(FafacturPeer::CODPRORAD, $this->codprorad);
		if ($this->isColumnModified(FafacturPeer::RIFPROD)) $criteria->add(FafacturPeer::RIFPROD, $this->rifprod);
		if ($this->isColumnModified(FafacturPeer::VERSION)) $criteria->add(FafacturPeer::VERSION, $this->version);
		if ($this->isColumnModified(FafacturPeer::FECTRADES)) $criteria->add(FafacturPeer::FECTRADES, $this->fectrades);
		if ($this->isColumnModified(FafacturPeer::FECTRAHAS)) $criteria->add(FafacturPeer::FECTRAHAS, $this->fectrahas);
		if ($this->isColumnModified(FafacturPeer::FRECTRA)) $criteria->add(FafacturPeer::FRECTRA, $this->frectra);
		if ($this->isColumnModified(FafacturPeer::DURACION)) $criteria->add(FafacturPeer::DURACION, $this->duracion);
		if ($this->isColumnModified(FafacturPeer::OBSTRA)) $criteria->add(FafacturPeer::OBSTRA, $this->obstra);
		if ($this->isColumnModified(FafacturPeer::MUELLE)) $criteria->add(FafacturPeer::MUELLE, $this->muelle);
		if ($this->isColumnModified(FafacturPeer::BUQUE2)) $criteria->add(FafacturPeer::BUQUE2, $this->buque2);
		if ($this->isColumnModified(FafacturPeer::EXPEDI)) $criteria->add(FafacturPeer::EXPEDI, $this->expedi);
		if ($this->isColumnModified(FafacturPeer::BELE)) $criteria->add(FafacturPeer::BELE, $this->bele);
		if ($this->isColumnModified(FafacturPeer::FACTURA)) $criteria->add(FafacturPeer::FACTURA, $this->factura);
		if ($this->isColumnModified(FafacturPeer::EMBARCA)) $criteria->add(FafacturPeer::EMBARCA, $this->embarca);
		if ($this->isColumnModified(FafacturPeer::DESCARGA)) $criteria->add(FafacturPeer::DESCARGA, $this->descarga);
		if ($this->isColumnModified(FafacturPeer::CANBUL)) $criteria->add(FafacturPeer::CANBUL, $this->canbul);
		if ($this->isColumnModified(FafacturPeer::CODPROD)) $criteria->add(FafacturPeer::CODPROD, $this->codprod);
		if ($this->isColumnModified(FafacturPeer::TMDESC)) $criteria->add(FafacturPeer::TMDESC, $this->tmdesc);
		if ($this->isColumnModified(FafacturPeer::FECATRA)) $criteria->add(FafacturPeer::FECATRA, $this->fecatra);
		if ($this->isColumnModified(FafacturPeer::FECINIDESC)) $criteria->add(FafacturPeer::FECINIDESC, $this->fecinidesc);
		if ($this->isColumnModified(FafacturPeer::FECFINDESC)) $criteria->add(FafacturPeer::FECFINDESC, $this->fecfindesc);
		if ($this->isColumnModified(FafacturPeer::VALCIFS)) $criteria->add(FafacturPeer::VALCIFS, $this->valcifs);
		if ($this->isColumnModified(FafacturPeer::FECPER1)) $criteria->add(FafacturPeer::FECPER1, $this->fecper1);
		if ($this->isColumnModified(FafacturPeer::FECPER2)) $criteria->add(FafacturPeer::FECPER2, $this->fecper2);
		if ($this->isColumnModified(FafacturPeer::CODDIREC)) $criteria->add(FafacturPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(FafacturPeer::IMPFISSTA)) $criteria->add(FafacturPeer::IMPFISSTA, $this->impfissta);
		if ($this->isColumnModified(FafacturPeer::CREATED_AT)) $criteria->add(FafacturPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(FafacturPeer::UPDATED_AT)) $criteria->add(FafacturPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(FafacturPeer::CREATED_BY_USER)) $criteria->add(FafacturPeer::CREATED_BY_USER, $this->created_by_user);
		if ($this->isColumnModified(FafacturPeer::UPDATED_BY_USER)) $criteria->add(FafacturPeer::UPDATED_BY_USER, $this->updated_by_user);
		if ($this->isColumnModified(FafacturPeer::ID)) $criteria->add(FafacturPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FafacturPeer::DATABASE_NAME);

		$criteria->add(FafacturPeer::ID, $this->id);

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

		$copyObj->setReffac($this->reffac);

		$copyObj->setFecfac($this->fecfac);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setDesfac($this->desfac);

		$copyObj->setTipref($this->tipref);

		$copyObj->setMonfac($this->monfac);

		$copyObj->setMondesc($this->mondesc);

		$copyObj->setCodconpag($this->codconpag);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setReapor($this->reapor);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setStatus($this->status);

		$copyObj->setObserv($this->observ);

		$copyObj->setTipmon($this->tipmon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setNumcomord($this->numcomord);

		$copyObj->setNumcominv($this->numcominv);

		$copyObj->setSucursal($this->sucursal);

		$copyObj->setMotanu($this->motanu);

		$copyObj->setVuelto($this->vuelto);

		$copyObj->setCodcaj($this->codcaj);

		$copyObj->setNumcontrol($this->numcontrol);

		$copyObj->setProform($this->proform);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setTipoven($this->tipoven);

		$copyObj->setObsfac($this->obsfac);

		$copyObj->setCodcenaco($this->codcenaco);

		$copyObj->setStaent($this->staent);

		$copyObj->setFecent($this->fecent);

		$copyObj->setUsuent($this->usuent);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setBtufin($this->btufin);

		$copyObj->setPuedph($this->puedph);

		$copyObj->setPuedes($this->puedes);

		$copyObj->setBuque($this->buque);

		$copyObj->setFadescripfacId($this->fadescripfac_id);

		$copyObj->setCodprg($this->codprg);

		$copyObj->setConpag($this->conpag);

		$copyObj->setCodalmusu($this->codalmusu);

		$copyObj->setNroordfac($this->nroordfac);

		$copyObj->setCodpropat($this->codpropat);

		$copyObj->setCodprorad($this->codprorad);

		$copyObj->setRifprod($this->rifprod);

		$copyObj->setVersion($this->version);

		$copyObj->setFectrades($this->fectrades);

		$copyObj->setFectrahas($this->fectrahas);

		$copyObj->setFrectra($this->frectra);

		$copyObj->setDuracion($this->duracion);

		$copyObj->setObstra($this->obstra);

		$copyObj->setMuelle($this->muelle);

		$copyObj->setBuque2($this->buque2);

		$copyObj->setExpedi($this->expedi);

		$copyObj->setBele($this->bele);

		$copyObj->setFactura($this->factura);

		$copyObj->setEmbarca($this->embarca);

		$copyObj->setDescarga($this->descarga);

		$copyObj->setCanbul($this->canbul);

		$copyObj->setCodprod($this->codprod);

		$copyObj->setTmdesc($this->tmdesc);

		$copyObj->setFecatra($this->fecatra);

		$copyObj->setFecinidesc($this->fecinidesc);

		$copyObj->setFecfindesc($this->fecfindesc);

		$copyObj->setValcifs($this->valcifs);

		$copyObj->setFecper1($this->fecper1);

		$copyObj->setFecper2($this->fecper2);

		$copyObj->setCoddirec($this->coddirec);

		$copyObj->setImpfissta($this->impfissta);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setCreatedByUser($this->created_by_user);

		$copyObj->setUpdatedByUser($this->updated_by_user);


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
			self::$peer = new FafacturPeer();
		}
		return self::$peer;
	}

	
	public function setFacliente($v)
	{


		if ($v === null) {
			$this->setCodcli(NULL);
		} else {
			$this->setCodcli($v->getCodpro());
		}


		$this->aFacliente = $v;
	}


	
	public function getFacliente($con = null)
	{
		if ($this->aFacliente === null && (($this->codcli !== "" && $this->codcli !== null))) {
						include_once 'lib/model/facturacion/om/BaseFaclientePeer.php';

      $c = new Criteria();
      $c->add(FaclientePeer::CODPRO,$this->codcli);
      
			$this->aFacliente = FaclientePeer::doSelectOne($c, $con);

			
		}
		return $this->aFacliente;
	}

} 