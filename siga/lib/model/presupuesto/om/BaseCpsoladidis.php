<?php


abstract class BaseCpsoladidis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $despre;


	
	protected $justificacion;


	
	protected $enunciado;


	
	protected $refadi;


	
	protected $fecadi;


	
	protected $anoadi;


	
	protected $desadi;


	
	protected $desanu;


	
	protected $fecanu;


	
	protected $totadi;


	
	protected $staadi;


	
	protected $adidis;


	
	protected $codart;


	
	protected $stacon;


	
	protected $stagob;


	
	protected $stapre;


	
	protected $staniv4;


	
	protected $staniv5;


	
	protected $staniv6;


	
	protected $fecpre;


	
	protected $feccon;


	
	protected $descon;


	
	protected $fecgob;


	
	protected $desgob;


	
	protected $fecniv4;


	
	protected $desniv4;


	
	protected $fecniv5;


	
	protected $desniv5;


	
	protected $fecniv6;


	
	protected $desniv6;


	
	protected $numofi;


	
	protected $fecofi;


	
	protected $coddirec;


	
	protected $iniana;


	
	protected $id;

	
	protected $aCpartley;

	
	protected $collCpsolmovadis;

	
	protected $lastCpsolmovadiCriteria = null;

	
	protected $collCpsolmovadipers;

	
	protected $lastCpsolmovadiperCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDespre()
  {

    return trim($this->despre);

  }
  
  public function getJustificacion()
  {

    return trim($this->justificacion);

  }
  
  public function getEnunciado()
  {

    return trim($this->enunciado);

  }
  
  public function getRefadi()
  {

    return trim($this->refadi);

  }
  
  public function getFecadi($format = 'Y-m-d')
  {

    if ($this->fecadi === null || $this->fecadi === '') {
      return null;
    } elseif (!is_int($this->fecadi)) {
            $ts = adodb_strtotime($this->fecadi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecadi] as date/time value: " . var_export($this->fecadi, true));
      }
    } else {
      $ts = $this->fecadi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnoadi()
  {

    return trim($this->anoadi);

  }
  
  public function getDesadi()
  {

    return trim($this->desadi);

  }
  
  public function getDesanu()
  {

    return trim($this->desanu);

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

  
  public function getTotadi($val=false)
  {

    if($val) return number_format($this->totadi,2,',','.');
    else return $this->totadi;

  }
  
  public function getStaadi()
  {

    return trim($this->staadi);

  }
  
  public function getAdidis()
  {

    return trim($this->adidis);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getStacon()
  {

    return trim($this->stacon);

  }
  
  public function getStagob()
  {

    return trim($this->stagob);

  }
  
  public function getStapre()
  {

    return trim($this->stapre);

  }
  
  public function getStaniv4()
  {

    return trim($this->staniv4);

  }
  
  public function getStaniv5()
  {

    return trim($this->staniv5);

  }
  
  public function getStaniv6()
  {

    return trim($this->staniv6);

  }
  
  public function getFecpre($format = 'Y-m-d')
  {

    if ($this->fecpre === null || $this->fecpre === '') {
      return null;
    } elseif (!is_int($this->fecpre)) {
            $ts = adodb_strtotime($this->fecpre);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpre] as date/time value: " . var_export($this->fecpre, true));
      }
    } else {
      $ts = $this->fecpre;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
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

  
  public function getDescon()
  {

    return trim($this->descon);

  }
  
  public function getFecgob($format = 'Y-m-d')
  {

    if ($this->fecgob === null || $this->fecgob === '') {
      return null;
    } elseif (!is_int($this->fecgob)) {
            $ts = adodb_strtotime($this->fecgob);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecgob] as date/time value: " . var_export($this->fecgob, true));
      }
    } else {
      $ts = $this->fecgob;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesgob()
  {

    return trim($this->desgob);

  }
  
  public function getFecniv4($format = 'Y-m-d')
  {

    if ($this->fecniv4 === null || $this->fecniv4 === '') {
      return null;
    } elseif (!is_int($this->fecniv4)) {
            $ts = adodb_strtotime($this->fecniv4);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecniv4] as date/time value: " . var_export($this->fecniv4, true));
      }
    } else {
      $ts = $this->fecniv4;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesniv4()
  {

    return trim($this->desniv4);

  }
  
  public function getFecniv5($format = 'Y-m-d')
  {

    if ($this->fecniv5 === null || $this->fecniv5 === '') {
      return null;
    } elseif (!is_int($this->fecniv5)) {
            $ts = adodb_strtotime($this->fecniv5);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecniv5] as date/time value: " . var_export($this->fecniv5, true));
      }
    } else {
      $ts = $this->fecniv5;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesniv5()
  {

    return trim($this->desniv5);

  }
  
  public function getFecniv6($format = 'Y-m-d')
  {

    if ($this->fecniv6 === null || $this->fecniv6 === '') {
      return null;
    } elseif (!is_int($this->fecniv6)) {
            $ts = adodb_strtotime($this->fecniv6);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecniv6] as date/time value: " . var_export($this->fecniv6, true));
      }
    } else {
      $ts = $this->fecniv6;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesniv6()
  {

    return trim($this->desniv6);

  }
  
  public function getNumofi()
  {

    return trim($this->numofi);

  }
  
  public function getFecofi($format = 'Y-m-d')
  {

    if ($this->fecofi === null || $this->fecofi === '') {
      return null;
    } elseif (!is_int($this->fecofi)) {
            $ts = adodb_strtotime($this->fecofi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecofi] as date/time value: " . var_export($this->fecofi, true));
      }
    } else {
      $ts = $this->fecofi;
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
  
  public function getIniana()
  {

    return trim($this->iniana);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDespre($v)
	{

    if ($this->despre !== $v) {
        $this->despre = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::DESPRE;
      }
  
	} 
	
	public function setJustificacion($v)
	{

    if ($this->justificacion !== $v) {
        $this->justificacion = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::JUSTIFICACION;
      }
  
	} 
	
	public function setEnunciado($v)
	{

    if ($this->enunciado !== $v) {
        $this->enunciado = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::ENUNCIADO;
      }
  
	} 
	
	public function setRefadi($v)
	{

    if ($this->refadi !== $v) {
        $this->refadi = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::REFADI;
      }
  
	} 
	
	public function setFecadi($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecadi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecadi !== $ts) {
      $this->fecadi = $ts;
      $this->modifiedColumns[] = CpsoladidisPeer::FECADI;
    }

	} 
	
	public function setAnoadi($v)
	{

    if ($this->anoadi !== $v) {
        $this->anoadi = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::ANOADI;
      }
  
	} 
	
	public function setDesadi($v)
	{

    if ($this->desadi !== $v) {
        $this->desadi = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::DESADI;
      }
  
	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::DESANU;
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
      $this->modifiedColumns[] = CpsoladidisPeer::FECANU;
    }

	} 
	
	public function setTotadi($v)
	{

    if ($this->totadi !== $v) {
        $this->totadi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpsoladidisPeer::TOTADI;
      }
  
	} 
	
	public function setStaadi($v)
	{

    if ($this->staadi !== $v) {
        $this->staadi = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::STAADI;
      }
  
	} 
	
	public function setAdidis($v)
	{

    if ($this->adidis !== $v) {
        $this->adidis = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::ADIDIS;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::CODART;
      }
  
		if ($this->aCpartley !== null && $this->aCpartley->getCodart() !== $v) {
			$this->aCpartley = null;
		}

	} 
	
	public function setStacon($v)
	{

    if ($this->stacon !== $v) {
        $this->stacon = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::STACON;
      }
  
	} 
	
	public function setStagob($v)
	{

    if ($this->stagob !== $v) {
        $this->stagob = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::STAGOB;
      }
  
	} 
	
	public function setStapre($v)
	{

    if ($this->stapre !== $v) {
        $this->stapre = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::STAPRE;
      }
  
	} 
	
	public function setStaniv4($v)
	{

    if ($this->staniv4 !== $v) {
        $this->staniv4 = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::STANIV4;
      }
  
	} 
	
	public function setStaniv5($v)
	{

    if ($this->staniv5 !== $v) {
        $this->staniv5 = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::STANIV5;
      }
  
	} 
	
	public function setStaniv6($v)
	{

    if ($this->staniv6 !== $v) {
        $this->staniv6 = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::STANIV6;
      }
  
	} 
	
	public function setFecpre($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpre] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpre !== $ts) {
      $this->fecpre = $ts;
      $this->modifiedColumns[] = CpsoladidisPeer::FECPRE;
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
      $this->modifiedColumns[] = CpsoladidisPeer::FECCON;
    }

	} 
	
	public function setDescon($v)
	{

    if ($this->descon !== $v) {
        $this->descon = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::DESCON;
      }
  
	} 
	
	public function setFecgob($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecgob] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecgob !== $ts) {
      $this->fecgob = $ts;
      $this->modifiedColumns[] = CpsoladidisPeer::FECGOB;
    }

	} 
	
	public function setDesgob($v)
	{

    if ($this->desgob !== $v) {
        $this->desgob = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::DESGOB;
      }
  
	} 
	
	public function setFecniv4($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecniv4] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecniv4 !== $ts) {
      $this->fecniv4 = $ts;
      $this->modifiedColumns[] = CpsoladidisPeer::FECNIV4;
    }

	} 
	
	public function setDesniv4($v)
	{

    if ($this->desniv4 !== $v) {
        $this->desniv4 = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::DESNIV4;
      }
  
	} 
	
	public function setFecniv5($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecniv5] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecniv5 !== $ts) {
      $this->fecniv5 = $ts;
      $this->modifiedColumns[] = CpsoladidisPeer::FECNIV5;
    }

	} 
	
	public function setDesniv5($v)
	{

    if ($this->desniv5 !== $v) {
        $this->desniv5 = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::DESNIV5;
      }
  
	} 
	
	public function setFecniv6($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecniv6] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecniv6 !== $ts) {
      $this->fecniv6 = $ts;
      $this->modifiedColumns[] = CpsoladidisPeer::FECNIV6;
    }

	} 
	
	public function setDesniv6($v)
	{

    if ($this->desniv6 !== $v) {
        $this->desniv6 = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::DESNIV6;
      }
  
	} 
	
	public function setNumofi($v)
	{

    if ($this->numofi !== $v) {
        $this->numofi = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::NUMOFI;
      }
  
	} 
	
	public function setFecofi($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecofi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecofi !== $ts) {
      $this->fecofi = $ts;
      $this->modifiedColumns[] = CpsoladidisPeer::FECOFI;
    }

	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::CODDIREC;
      }
  
	} 
	
	public function setIniana($v)
	{

    if ($this->iniana !== $v) {
        $this->iniana = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::INIANA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpsoladidisPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->despre = $rs->getString($startcol + 0);

      $this->justificacion = $rs->getString($startcol + 1);

      $this->enunciado = $rs->getString($startcol + 2);

      $this->refadi = $rs->getString($startcol + 3);

      $this->fecadi = $rs->getDate($startcol + 4, null);

      $this->anoadi = $rs->getString($startcol + 5);

      $this->desadi = $rs->getString($startcol + 6);

      $this->desanu = $rs->getString($startcol + 7);

      $this->fecanu = $rs->getDate($startcol + 8, null);

      $this->totadi = $rs->getFloat($startcol + 9);

      $this->staadi = $rs->getString($startcol + 10);

      $this->adidis = $rs->getString($startcol + 11);

      $this->codart = $rs->getString($startcol + 12);

      $this->stacon = $rs->getString($startcol + 13);

      $this->stagob = $rs->getString($startcol + 14);

      $this->stapre = $rs->getString($startcol + 15);

      $this->staniv4 = $rs->getString($startcol + 16);

      $this->staniv5 = $rs->getString($startcol + 17);

      $this->staniv6 = $rs->getString($startcol + 18);

      $this->fecpre = $rs->getDate($startcol + 19, null);

      $this->feccon = $rs->getDate($startcol + 20, null);

      $this->descon = $rs->getString($startcol + 21);

      $this->fecgob = $rs->getDate($startcol + 22, null);

      $this->desgob = $rs->getString($startcol + 23);

      $this->fecniv4 = $rs->getDate($startcol + 24, null);

      $this->desniv4 = $rs->getString($startcol + 25);

      $this->fecniv5 = $rs->getDate($startcol + 26, null);

      $this->desniv5 = $rs->getString($startcol + 27);

      $this->fecniv6 = $rs->getDate($startcol + 28, null);

      $this->desniv6 = $rs->getString($startcol + 29);

      $this->numofi = $rs->getString($startcol + 30);

      $this->fecofi = $rs->getDate($startcol + 31, null);

      $this->coddirec = $rs->getString($startcol + 32);

      $this->iniana = $rs->getString($startcol + 33);

      $this->id = $rs->getInt($startcol + 34);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 35; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpsoladidis object", $e);
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
			$con = Propel::getConnection(CpsoladidisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpsoladidisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpsoladidisPeer::DATABASE_NAME);
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


												
			if ($this->aCpartley !== null) {
				if ($this->aCpartley->isModified()) {
					$affectedRows += $this->aCpartley->save($con);
				}
				$this->setCpartley($this->aCpartley);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CpsoladidisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpsoladidisPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCpsolmovadis !== null) {
				foreach($this->collCpsolmovadis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCpsolmovadipers !== null) {
				foreach($this->collCpsolmovadipers as $referrerFK) {
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


												
			if ($this->aCpartley !== null) {
				if (!$this->aCpartley->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpartley->getValidationFailures());
				}
			}


			if (($retval = CpsoladidisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCpsolmovadis !== null) {
					foreach($this->collCpsolmovadis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCpsolmovadipers !== null) {
					foreach($this->collCpsolmovadipers as $referrerFK) {
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
		$pos = CpsoladidisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDespre();
				break;
			case 1:
				return $this->getJustificacion();
				break;
			case 2:
				return $this->getEnunciado();
				break;
			case 3:
				return $this->getRefadi();
				break;
			case 4:
				return $this->getFecadi();
				break;
			case 5:
				return $this->getAnoadi();
				break;
			case 6:
				return $this->getDesadi();
				break;
			case 7:
				return $this->getDesanu();
				break;
			case 8:
				return $this->getFecanu();
				break;
			case 9:
				return $this->getTotadi();
				break;
			case 10:
				return $this->getStaadi();
				break;
			case 11:
				return $this->getAdidis();
				break;
			case 12:
				return $this->getCodart();
				break;
			case 13:
				return $this->getStacon();
				break;
			case 14:
				return $this->getStagob();
				break;
			case 15:
				return $this->getStapre();
				break;
			case 16:
				return $this->getStaniv4();
				break;
			case 17:
				return $this->getStaniv5();
				break;
			case 18:
				return $this->getStaniv6();
				break;
			case 19:
				return $this->getFecpre();
				break;
			case 20:
				return $this->getFeccon();
				break;
			case 21:
				return $this->getDescon();
				break;
			case 22:
				return $this->getFecgob();
				break;
			case 23:
				return $this->getDesgob();
				break;
			case 24:
				return $this->getFecniv4();
				break;
			case 25:
				return $this->getDesniv4();
				break;
			case 26:
				return $this->getFecniv5();
				break;
			case 27:
				return $this->getDesniv5();
				break;
			case 28:
				return $this->getFecniv6();
				break;
			case 29:
				return $this->getDesniv6();
				break;
			case 30:
				return $this->getNumofi();
				break;
			case 31:
				return $this->getFecofi();
				break;
			case 32:
				return $this->getCoddirec();
				break;
			case 33:
				return $this->getIniana();
				break;
			case 34:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpsoladidisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDespre(),
			$keys[1] => $this->getJustificacion(),
			$keys[2] => $this->getEnunciado(),
			$keys[3] => $this->getRefadi(),
			$keys[4] => $this->getFecadi(),
			$keys[5] => $this->getAnoadi(),
			$keys[6] => $this->getDesadi(),
			$keys[7] => $this->getDesanu(),
			$keys[8] => $this->getFecanu(),
			$keys[9] => $this->getTotadi(),
			$keys[10] => $this->getStaadi(),
			$keys[11] => $this->getAdidis(),
			$keys[12] => $this->getCodart(),
			$keys[13] => $this->getStacon(),
			$keys[14] => $this->getStagob(),
			$keys[15] => $this->getStapre(),
			$keys[16] => $this->getStaniv4(),
			$keys[17] => $this->getStaniv5(),
			$keys[18] => $this->getStaniv6(),
			$keys[19] => $this->getFecpre(),
			$keys[20] => $this->getFeccon(),
			$keys[21] => $this->getDescon(),
			$keys[22] => $this->getFecgob(),
			$keys[23] => $this->getDesgob(),
			$keys[24] => $this->getFecniv4(),
			$keys[25] => $this->getDesniv4(),
			$keys[26] => $this->getFecniv5(),
			$keys[27] => $this->getDesniv5(),
			$keys[28] => $this->getFecniv6(),
			$keys[29] => $this->getDesniv6(),
			$keys[30] => $this->getNumofi(),
			$keys[31] => $this->getFecofi(),
			$keys[32] => $this->getCoddirec(),
			$keys[33] => $this->getIniana(),
			$keys[34] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpsoladidisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDespre($value);
				break;
			case 1:
				$this->setJustificacion($value);
				break;
			case 2:
				$this->setEnunciado($value);
				break;
			case 3:
				$this->setRefadi($value);
				break;
			case 4:
				$this->setFecadi($value);
				break;
			case 5:
				$this->setAnoadi($value);
				break;
			case 6:
				$this->setDesadi($value);
				break;
			case 7:
				$this->setDesanu($value);
				break;
			case 8:
				$this->setFecanu($value);
				break;
			case 9:
				$this->setTotadi($value);
				break;
			case 10:
				$this->setStaadi($value);
				break;
			case 11:
				$this->setAdidis($value);
				break;
			case 12:
				$this->setCodart($value);
				break;
			case 13:
				$this->setStacon($value);
				break;
			case 14:
				$this->setStagob($value);
				break;
			case 15:
				$this->setStapre($value);
				break;
			case 16:
				$this->setStaniv4($value);
				break;
			case 17:
				$this->setStaniv5($value);
				break;
			case 18:
				$this->setStaniv6($value);
				break;
			case 19:
				$this->setFecpre($value);
				break;
			case 20:
				$this->setFeccon($value);
				break;
			case 21:
				$this->setDescon($value);
				break;
			case 22:
				$this->setFecgob($value);
				break;
			case 23:
				$this->setDesgob($value);
				break;
			case 24:
				$this->setFecniv4($value);
				break;
			case 25:
				$this->setDesniv4($value);
				break;
			case 26:
				$this->setFecniv5($value);
				break;
			case 27:
				$this->setDesniv5($value);
				break;
			case 28:
				$this->setFecniv6($value);
				break;
			case 29:
				$this->setDesniv6($value);
				break;
			case 30:
				$this->setNumofi($value);
				break;
			case 31:
				$this->setFecofi($value);
				break;
			case 32:
				$this->setCoddirec($value);
				break;
			case 33:
				$this->setIniana($value);
				break;
			case 34:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpsoladidisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDespre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setJustificacion($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEnunciado($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefadi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecadi($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAnoadi($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDesadi($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDesanu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecanu($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTotadi($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStaadi($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAdidis($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodart($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStacon($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setStagob($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setStapre($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setStaniv4($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setStaniv5($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setStaniv6($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFecpre($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFeccon($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDescon($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFecgob($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDesgob($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setFecniv4($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDesniv4($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setFecniv5($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setDesniv5($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setFecniv6($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setDesniv6($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setNumofi($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setFecofi($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCoddirec($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setIniana($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setId($arr[$keys[34]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpsoladidisPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpsoladidisPeer::DESPRE)) $criteria->add(CpsoladidisPeer::DESPRE, $this->despre);
		if ($this->isColumnModified(CpsoladidisPeer::JUSTIFICACION)) $criteria->add(CpsoladidisPeer::JUSTIFICACION, $this->justificacion);
		if ($this->isColumnModified(CpsoladidisPeer::ENUNCIADO)) $criteria->add(CpsoladidisPeer::ENUNCIADO, $this->enunciado);
		if ($this->isColumnModified(CpsoladidisPeer::REFADI)) $criteria->add(CpsoladidisPeer::REFADI, $this->refadi);
		if ($this->isColumnModified(CpsoladidisPeer::FECADI)) $criteria->add(CpsoladidisPeer::FECADI, $this->fecadi);
		if ($this->isColumnModified(CpsoladidisPeer::ANOADI)) $criteria->add(CpsoladidisPeer::ANOADI, $this->anoadi);
		if ($this->isColumnModified(CpsoladidisPeer::DESADI)) $criteria->add(CpsoladidisPeer::DESADI, $this->desadi);
		if ($this->isColumnModified(CpsoladidisPeer::DESANU)) $criteria->add(CpsoladidisPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CpsoladidisPeer::FECANU)) $criteria->add(CpsoladidisPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CpsoladidisPeer::TOTADI)) $criteria->add(CpsoladidisPeer::TOTADI, $this->totadi);
		if ($this->isColumnModified(CpsoladidisPeer::STAADI)) $criteria->add(CpsoladidisPeer::STAADI, $this->staadi);
		if ($this->isColumnModified(CpsoladidisPeer::ADIDIS)) $criteria->add(CpsoladidisPeer::ADIDIS, $this->adidis);
		if ($this->isColumnModified(CpsoladidisPeer::CODART)) $criteria->add(CpsoladidisPeer::CODART, $this->codart);
		if ($this->isColumnModified(CpsoladidisPeer::STACON)) $criteria->add(CpsoladidisPeer::STACON, $this->stacon);
		if ($this->isColumnModified(CpsoladidisPeer::STAGOB)) $criteria->add(CpsoladidisPeer::STAGOB, $this->stagob);
		if ($this->isColumnModified(CpsoladidisPeer::STAPRE)) $criteria->add(CpsoladidisPeer::STAPRE, $this->stapre);
		if ($this->isColumnModified(CpsoladidisPeer::STANIV4)) $criteria->add(CpsoladidisPeer::STANIV4, $this->staniv4);
		if ($this->isColumnModified(CpsoladidisPeer::STANIV5)) $criteria->add(CpsoladidisPeer::STANIV5, $this->staniv5);
		if ($this->isColumnModified(CpsoladidisPeer::STANIV6)) $criteria->add(CpsoladidisPeer::STANIV6, $this->staniv6);
		if ($this->isColumnModified(CpsoladidisPeer::FECPRE)) $criteria->add(CpsoladidisPeer::FECPRE, $this->fecpre);
		if ($this->isColumnModified(CpsoladidisPeer::FECCON)) $criteria->add(CpsoladidisPeer::FECCON, $this->feccon);
		if ($this->isColumnModified(CpsoladidisPeer::DESCON)) $criteria->add(CpsoladidisPeer::DESCON, $this->descon);
		if ($this->isColumnModified(CpsoladidisPeer::FECGOB)) $criteria->add(CpsoladidisPeer::FECGOB, $this->fecgob);
		if ($this->isColumnModified(CpsoladidisPeer::DESGOB)) $criteria->add(CpsoladidisPeer::DESGOB, $this->desgob);
		if ($this->isColumnModified(CpsoladidisPeer::FECNIV4)) $criteria->add(CpsoladidisPeer::FECNIV4, $this->fecniv4);
		if ($this->isColumnModified(CpsoladidisPeer::DESNIV4)) $criteria->add(CpsoladidisPeer::DESNIV4, $this->desniv4);
		if ($this->isColumnModified(CpsoladidisPeer::FECNIV5)) $criteria->add(CpsoladidisPeer::FECNIV5, $this->fecniv5);
		if ($this->isColumnModified(CpsoladidisPeer::DESNIV5)) $criteria->add(CpsoladidisPeer::DESNIV5, $this->desniv5);
		if ($this->isColumnModified(CpsoladidisPeer::FECNIV6)) $criteria->add(CpsoladidisPeer::FECNIV6, $this->fecniv6);
		if ($this->isColumnModified(CpsoladidisPeer::DESNIV6)) $criteria->add(CpsoladidisPeer::DESNIV6, $this->desniv6);
		if ($this->isColumnModified(CpsoladidisPeer::NUMOFI)) $criteria->add(CpsoladidisPeer::NUMOFI, $this->numofi);
		if ($this->isColumnModified(CpsoladidisPeer::FECOFI)) $criteria->add(CpsoladidisPeer::FECOFI, $this->fecofi);
		if ($this->isColumnModified(CpsoladidisPeer::CODDIREC)) $criteria->add(CpsoladidisPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(CpsoladidisPeer::INIANA)) $criteria->add(CpsoladidisPeer::INIANA, $this->iniana);
		if ($this->isColumnModified(CpsoladidisPeer::ID)) $criteria->add(CpsoladidisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpsoladidisPeer::DATABASE_NAME);

		$criteria->add(CpsoladidisPeer::ID, $this->id);

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

		$copyObj->setDespre($this->despre);

		$copyObj->setJustificacion($this->justificacion);

		$copyObj->setEnunciado($this->enunciado);

		$copyObj->setRefadi($this->refadi);

		$copyObj->setFecadi($this->fecadi);

		$copyObj->setAnoadi($this->anoadi);

		$copyObj->setDesadi($this->desadi);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setTotadi($this->totadi);

		$copyObj->setStaadi($this->staadi);

		$copyObj->setAdidis($this->adidis);

		$copyObj->setCodart($this->codart);

		$copyObj->setStacon($this->stacon);

		$copyObj->setStagob($this->stagob);

		$copyObj->setStapre($this->stapre);

		$copyObj->setStaniv4($this->staniv4);

		$copyObj->setStaniv5($this->staniv5);

		$copyObj->setStaniv6($this->staniv6);

		$copyObj->setFecpre($this->fecpre);

		$copyObj->setFeccon($this->feccon);

		$copyObj->setDescon($this->descon);

		$copyObj->setFecgob($this->fecgob);

		$copyObj->setDesgob($this->desgob);

		$copyObj->setFecniv4($this->fecniv4);

		$copyObj->setDesniv4($this->desniv4);

		$copyObj->setFecniv5($this->fecniv5);

		$copyObj->setDesniv5($this->desniv5);

		$copyObj->setFecniv6($this->fecniv6);

		$copyObj->setDesniv6($this->desniv6);

		$copyObj->setNumofi($this->numofi);

		$copyObj->setFecofi($this->fecofi);

		$copyObj->setCoddirec($this->coddirec);

		$copyObj->setIniana($this->iniana);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCpsolmovadis() as $relObj) {
				$copyObj->addCpsolmovadi($relObj->copy($deepCopy));
			}

			foreach($this->getCpsolmovadipers() as $relObj) {
				$copyObj->addCpsolmovadiper($relObj->copy($deepCopy));
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
			self::$peer = new CpsoladidisPeer();
		}
		return self::$peer;
	}

	
	public function setCpartley($v)
	{


		if ($v === null) {
			$this->setCodart(NULL);
		} else {
			$this->setCodart($v->getCodart());
		}


		$this->aCpartley = $v;
	}


	
	public function getCpartley($con = null)
	{
		if ($this->aCpartley === null && (($this->codart !== "" && $this->codart !== null))) {
						include_once 'lib/model/presupuesto/om/BaseCpartleyPeer.php';

      $c = new Criteria();
      $c->add(CpartleyPeer::CODART,$this->codart);
      
			$this->aCpartley = CpartleyPeer::doSelectOne($c, $con);

			
		}
		return $this->aCpartley;
	}

	
	public function initCpsolmovadis()
	{
		if ($this->collCpsolmovadis === null) {
			$this->collCpsolmovadis = array();
		}
	}

	
	public function getCpsolmovadis($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsolmovadiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpsolmovadis === null) {
			if ($this->isNew()) {
			   $this->collCpsolmovadis = array();
			} else {

				$criteria->add(CpsolmovadiPeer::REFADI, $this->getRefadi());

				CpsolmovadiPeer::addSelectColumns($criteria);
				$this->collCpsolmovadis = CpsolmovadiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpsolmovadiPeer::REFADI, $this->getRefadi());

				CpsolmovadiPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpsolmovadiCriteria) || !$this->lastCpsolmovadiCriteria->equals($criteria)) {
					$this->collCpsolmovadis = CpsolmovadiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpsolmovadiCriteria = $criteria;
		return $this->collCpsolmovadis;
	}

	
	public function countCpsolmovadis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsolmovadiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpsolmovadiPeer::REFADI, $this->getRefadi());

		return CpsolmovadiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpsolmovadi(Cpsolmovadi $l)
	{
		$this->collCpsolmovadis[] = $l;
		$l->setCpsoladidis($this);
	}

	
	public function initCpsolmovadipers()
	{
		if ($this->collCpsolmovadipers === null) {
			$this->collCpsolmovadipers = array();
		}
	}

	
	public function getCpsolmovadipers($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsolmovadiperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpsolmovadipers === null) {
			if ($this->isNew()) {
			   $this->collCpsolmovadipers = array();
			} else {

				$criteria->add(CpsolmovadiperPeer::REFADI, $this->getRefadi());

				CpsolmovadiperPeer::addSelectColumns($criteria);
				$this->collCpsolmovadipers = CpsolmovadiperPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpsolmovadiperPeer::REFADI, $this->getRefadi());

				CpsolmovadiperPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpsolmovadiperCriteria) || !$this->lastCpsolmovadiperCriteria->equals($criteria)) {
					$this->collCpsolmovadipers = CpsolmovadiperPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpsolmovadiperCriteria = $criteria;
		return $this->collCpsolmovadipers;
	}

	
	public function countCpsolmovadipers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpsolmovadiperPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpsolmovadiperPeer::REFADI, $this->getRefadi());

		return CpsolmovadiperPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpsolmovadiper(Cpsolmovadiper $l)
	{
		$this->collCpsolmovadipers[] = $l;
		$l->setCpsoladidis($this);
	}

} 