<?php


abstract class BaseLiplieesphis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numplie;


	
	protected $numcomint;


	
	protected $numexp;


	
	protected $codempadm;


	
	protected $coduniadm;


	
	protected $codempeje;


	
	protected $coduniste;


	
	protected $fecreg;


	
	protected $dias;


	
	protected $fecven;


	
	protected $idioma;


	
	protected $cosplie;


	
	protected $resolu;


	
	protected $fecrel;


	
	protected $decret;


	
	protected $fecdec;


	
	protected $descrip;


	
	protected $docane1;


	
	protected $docane2;


	
	protected $docane3;


	
	protected $prepor;


	
	protected $preporcar;


	
	protected $lisicact_id;


	
	protected $detdecmod;


	
	protected $anapor;


	
	protected $anaporcar;


	
	protected $status;


	
	protected $fecdecla;


	
	protected $porleg;


	
	protected $minleg;


	
	protected $portec;


	
	protected $mintec;


	
	protected $porfin;


	
	protected $minfin;


	
	protected $porfia;


	
	protected $minfia;


	
	protected $portipemp;


	
	protected $mintipemp;


	
	protected $tipconpub;


	
	protected $id;

	
	protected $aLisicact;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumplie()
  {

    return trim($this->numplie);

  }
  
  public function getNumcomint()
  {

    return trim($this->numcomint);

  }
  
  public function getNumexp()
  {

    return trim($this->numexp);

  }
  
  public function getCodempadm()
  {

    return trim($this->codempadm);

  }
  
  public function getCoduniadm()
  {

    return trim($this->coduniadm);

  }
  
  public function getCodempeje()
  {

    return trim($this->codempeje);

  }
  
  public function getCoduniste()
  {

    return trim($this->coduniste);

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

  
  public function getDias()
  {

    return $this->dias;

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

  
  public function getIdioma()
  {

    return trim($this->idioma);

  }
  
  public function getCosplie($val=false)
  {

    if($val) return number_format($this->cosplie,2,',','.');
    else return $this->cosplie;

  }
  
  public function getResolu()
  {

    return trim($this->resolu);

  }
  
  public function getFecrel($format = 'Y-m-d')
  {

    if ($this->fecrel === null || $this->fecrel === '') {
      return null;
    } elseif (!is_int($this->fecrel)) {
            $ts = adodb_strtotime($this->fecrel);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrel] as date/time value: " . var_export($this->fecrel, true));
      }
    } else {
      $ts = $this->fecrel;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDecret()
  {

    return trim($this->decret);

  }
  
  public function getFecdec($format = 'Y-m-d')
  {

    if ($this->fecdec === null || $this->fecdec === '') {
      return null;
    } elseif (!is_int($this->fecdec)) {
            $ts = adodb_strtotime($this->fecdec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdec] as date/time value: " . var_export($this->fecdec, true));
      }
    } else {
      $ts = $this->fecdec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDescrip()
  {

    return trim($this->descrip);

  }
  
  public function getDocane1()
  {

    return trim($this->docane1);

  }
  
  public function getDocane2()
  {

    return trim($this->docane2);

  }
  
  public function getDocane3()
  {

    return trim($this->docane3);

  }
  
  public function getPrepor()
  {

    return trim($this->prepor);

  }
  
  public function getPreporcar()
  {

    return trim($this->preporcar);

  }
  
  public function getLisicactId()
  {

    return $this->lisicact_id;

  }
  
  public function getDetdecmod()
  {

    return trim($this->detdecmod);

  }
  
  public function getAnapor()
  {

    return trim($this->anapor);

  }
  
  public function getAnaporcar()
  {

    return trim($this->anaporcar);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getFecdecla($format = 'Y-m-d')
  {

    if ($this->fecdecla === null || $this->fecdecla === '') {
      return null;
    } elseif (!is_int($this->fecdecla)) {
            $ts = adodb_strtotime($this->fecdecla);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdecla] as date/time value: " . var_export($this->fecdecla, true));
      }
    } else {
      $ts = $this->fecdecla;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getPorleg($val=false)
  {

    if($val) return number_format($this->porleg,2,',','.');
    else return $this->porleg;

  }
  
  public function getMinleg($val=false)
  {

    if($val) return number_format($this->minleg,2,',','.');
    else return $this->minleg;

  }
  
  public function getPortec($val=false)
  {

    if($val) return number_format($this->portec,2,',','.');
    else return $this->portec;

  }
  
  public function getMintec($val=false)
  {

    if($val) return number_format($this->mintec,2,',','.');
    else return $this->mintec;

  }
  
  public function getPorfin($val=false)
  {

    if($val) return number_format($this->porfin,2,',','.');
    else return $this->porfin;

  }
  
  public function getMinfin($val=false)
  {

    if($val) return number_format($this->minfin,2,',','.');
    else return $this->minfin;

  }
  
  public function getPorfia($val=false)
  {

    if($val) return number_format($this->porfia,2,',','.');
    else return $this->porfia;

  }
  
  public function getMinfia($val=false)
  {

    if($val) return number_format($this->minfia,2,',','.');
    else return $this->minfia;

  }
  
  public function getPortipemp($val=false)
  {

    if($val) return number_format($this->portipemp,2,',','.');
    else return $this->portipemp;

  }
  
  public function getMintipemp($val=false)
  {

    if($val) return number_format($this->mintipemp,2,',','.');
    else return $this->mintipemp;

  }
  
  public function getTipconpub()
  {

    return trim($this->tipconpub);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumplie($v)
	{

    if ($this->numplie !== $v) {
        $this->numplie = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::NUMPLIE;
      }
  
	} 
	
	public function setNumcomint($v)
	{

    if ($this->numcomint !== $v) {
        $this->numcomint = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::NUMCOMINT;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::NUMEXP;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::CODEMPADM;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::CODEMPEJE;
      }
  
	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::CODUNISTE;
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
      $this->modifiedColumns[] = LiplieesphisPeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::DIAS;
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
      $this->modifiedColumns[] = LiplieesphisPeer::FECVEN;
    }

	} 
	
	public function setIdioma($v)
	{

    if ($this->idioma !== $v) {
        $this->idioma = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::IDIOMA;
      }
  
	} 
	
	public function setCosplie($v)
	{

    if ($this->cosplie !== $v) {
        $this->cosplie = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiplieesphisPeer::COSPLIE;
      }
  
	} 
	
	public function setResolu($v)
	{

    if ($this->resolu !== $v) {
        $this->resolu = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::RESOLU;
      }
  
	} 
	
	public function setFecrel($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrel] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrel !== $ts) {
      $this->fecrel = $ts;
      $this->modifiedColumns[] = LiplieesphisPeer::FECREL;
    }

	} 
	
	public function setDecret($v)
	{

    if ($this->decret !== $v) {
        $this->decret = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::DECRET;
      }
  
	} 
	
	public function setFecdec($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdec !== $ts) {
      $this->fecdec = $ts;
      $this->modifiedColumns[] = LiplieesphisPeer::FECDEC;
    }

	} 
	
	public function setDescrip($v)
	{

    if ($this->descrip !== $v) {
        $this->descrip = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::DESCRIP;
      }
  
	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::DOCANE3;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::PREPOR;
      }
  
	} 
	
	public function setPreporcar($v)
	{

    if ($this->preporcar !== $v) {
        $this->preporcar = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::PREPORCAR;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::LISICACT_ID;
      }
  
		if ($this->aLisicact !== null && $this->aLisicact->getId() !== $v) {
			$this->aLisicact = null;
		}

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::ANAPOR;
      }
  
	} 
	
	public function setAnaporcar($v)
	{

    if ($this->anaporcar !== $v) {
        $this->anaporcar = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::ANAPORCAR;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::STATUS;
      }
  
	} 
	
	public function setFecdecla($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdecla] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdecla !== $ts) {
      $this->fecdecla = $ts;
      $this->modifiedColumns[] = LiplieesphisPeer::FECDECLA;
    }

	} 
	
	public function setPorleg($v)
	{

    if ($this->porleg !== $v) {
        $this->porleg = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiplieesphisPeer::PORLEG;
      }
  
	} 
	
	public function setMinleg($v)
	{

    if ($this->minleg !== $v) {
        $this->minleg = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiplieesphisPeer::MINLEG;
      }
  
	} 
	
	public function setPortec($v)
	{

    if ($this->portec !== $v) {
        $this->portec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiplieesphisPeer::PORTEC;
      }
  
	} 
	
	public function setMintec($v)
	{

    if ($this->mintec !== $v) {
        $this->mintec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiplieesphisPeer::MINTEC;
      }
  
	} 
	
	public function setPorfin($v)
	{

    if ($this->porfin !== $v) {
        $this->porfin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiplieesphisPeer::PORFIN;
      }
  
	} 
	
	public function setMinfin($v)
	{

    if ($this->minfin !== $v) {
        $this->minfin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiplieesphisPeer::MINFIN;
      }
  
	} 
	
	public function setPorfia($v)
	{

    if ($this->porfia !== $v) {
        $this->porfia = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiplieesphisPeer::PORFIA;
      }
  
	} 
	
	public function setMinfia($v)
	{

    if ($this->minfia !== $v) {
        $this->minfia = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiplieesphisPeer::MINFIA;
      }
  
	} 
	
	public function setPortipemp($v)
	{

    if ($this->portipemp !== $v) {
        $this->portipemp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiplieesphisPeer::PORTIPEMP;
      }
  
	} 
	
	public function setMintipemp($v)
	{

    if ($this->mintipemp !== $v) {
        $this->mintipemp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiplieesphisPeer::MINTIPEMP;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::TIPCONPUB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiplieesphisPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numplie = $rs->getString($startcol + 0);

      $this->numcomint = $rs->getString($startcol + 1);

      $this->numexp = $rs->getString($startcol + 2);

      $this->codempadm = $rs->getString($startcol + 3);

      $this->coduniadm = $rs->getString($startcol + 4);

      $this->codempeje = $rs->getString($startcol + 5);

      $this->coduniste = $rs->getString($startcol + 6);

      $this->fecreg = $rs->getDate($startcol + 7, null);

      $this->dias = $rs->getInt($startcol + 8);

      $this->fecven = $rs->getDate($startcol + 9, null);

      $this->idioma = $rs->getString($startcol + 10);

      $this->cosplie = $rs->getFloat($startcol + 11);

      $this->resolu = $rs->getString($startcol + 12);

      $this->fecrel = $rs->getDate($startcol + 13, null);

      $this->decret = $rs->getString($startcol + 14);

      $this->fecdec = $rs->getDate($startcol + 15, null);

      $this->descrip = $rs->getString($startcol + 16);

      $this->docane1 = $rs->getString($startcol + 17);

      $this->docane2 = $rs->getString($startcol + 18);

      $this->docane3 = $rs->getString($startcol + 19);

      $this->prepor = $rs->getString($startcol + 20);

      $this->preporcar = $rs->getString($startcol + 21);

      $this->lisicact_id = $rs->getInt($startcol + 22);

      $this->detdecmod = $rs->getString($startcol + 23);

      $this->anapor = $rs->getString($startcol + 24);

      $this->anaporcar = $rs->getString($startcol + 25);

      $this->status = $rs->getString($startcol + 26);

      $this->fecdecla = $rs->getDate($startcol + 27, null);

      $this->porleg = $rs->getFloat($startcol + 28);

      $this->minleg = $rs->getFloat($startcol + 29);

      $this->portec = $rs->getFloat($startcol + 30);

      $this->mintec = $rs->getFloat($startcol + 31);

      $this->porfin = $rs->getFloat($startcol + 32);

      $this->minfin = $rs->getFloat($startcol + 33);

      $this->porfia = $rs->getFloat($startcol + 34);

      $this->minfia = $rs->getFloat($startcol + 35);

      $this->portipemp = $rs->getFloat($startcol + 36);

      $this->mintipemp = $rs->getFloat($startcol + 37);

      $this->tipconpub = $rs->getString($startcol + 38);

      $this->id = $rs->getInt($startcol + 39);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 40; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liplieesphis object", $e);
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
			$con = Propel::getConnection(LiplieesphisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiplieesphisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiplieesphisPeer::DATABASE_NAME);
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


												
			if ($this->aLisicact !== null) {
				if ($this->aLisicact->isModified()) {
					$affectedRows += $this->aLisicact->save($con);
				}
				$this->setLisicact($this->aLisicact);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LiplieesphisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiplieesphisPeer::doUpdate($this, $con);
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


												
			if ($this->aLisicact !== null) {
				if (!$this->aLisicact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLisicact->getValidationFailures());
				}
			}


			if (($retval = LiplieesphisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiplieesphisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumplie();
				break;
			case 1:
				return $this->getNumcomint();
				break;
			case 2:
				return $this->getNumexp();
				break;
			case 3:
				return $this->getCodempadm();
				break;
			case 4:
				return $this->getCoduniadm();
				break;
			case 5:
				return $this->getCodempeje();
				break;
			case 6:
				return $this->getCoduniste();
				break;
			case 7:
				return $this->getFecreg();
				break;
			case 8:
				return $this->getDias();
				break;
			case 9:
				return $this->getFecven();
				break;
			case 10:
				return $this->getIdioma();
				break;
			case 11:
				return $this->getCosplie();
				break;
			case 12:
				return $this->getResolu();
				break;
			case 13:
				return $this->getFecrel();
				break;
			case 14:
				return $this->getDecret();
				break;
			case 15:
				return $this->getFecdec();
				break;
			case 16:
				return $this->getDescrip();
				break;
			case 17:
				return $this->getDocane1();
				break;
			case 18:
				return $this->getDocane2();
				break;
			case 19:
				return $this->getDocane3();
				break;
			case 20:
				return $this->getPrepor();
				break;
			case 21:
				return $this->getPreporcar();
				break;
			case 22:
				return $this->getLisicactId();
				break;
			case 23:
				return $this->getDetdecmod();
				break;
			case 24:
				return $this->getAnapor();
				break;
			case 25:
				return $this->getAnaporcar();
				break;
			case 26:
				return $this->getStatus();
				break;
			case 27:
				return $this->getFecdecla();
				break;
			case 28:
				return $this->getPorleg();
				break;
			case 29:
				return $this->getMinleg();
				break;
			case 30:
				return $this->getPortec();
				break;
			case 31:
				return $this->getMintec();
				break;
			case 32:
				return $this->getPorfin();
				break;
			case 33:
				return $this->getMinfin();
				break;
			case 34:
				return $this->getPorfia();
				break;
			case 35:
				return $this->getMinfia();
				break;
			case 36:
				return $this->getPortipemp();
				break;
			case 37:
				return $this->getMintipemp();
				break;
			case 38:
				return $this->getTipconpub();
				break;
			case 39:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiplieesphisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumplie(),
			$keys[1] => $this->getNumcomint(),
			$keys[2] => $this->getNumexp(),
			$keys[3] => $this->getCodempadm(),
			$keys[4] => $this->getCoduniadm(),
			$keys[5] => $this->getCodempeje(),
			$keys[6] => $this->getCoduniste(),
			$keys[7] => $this->getFecreg(),
			$keys[8] => $this->getDias(),
			$keys[9] => $this->getFecven(),
			$keys[10] => $this->getIdioma(),
			$keys[11] => $this->getCosplie(),
			$keys[12] => $this->getResolu(),
			$keys[13] => $this->getFecrel(),
			$keys[14] => $this->getDecret(),
			$keys[15] => $this->getFecdec(),
			$keys[16] => $this->getDescrip(),
			$keys[17] => $this->getDocane1(),
			$keys[18] => $this->getDocane2(),
			$keys[19] => $this->getDocane3(),
			$keys[20] => $this->getPrepor(),
			$keys[21] => $this->getPreporcar(),
			$keys[22] => $this->getLisicactId(),
			$keys[23] => $this->getDetdecmod(),
			$keys[24] => $this->getAnapor(),
			$keys[25] => $this->getAnaporcar(),
			$keys[26] => $this->getStatus(),
			$keys[27] => $this->getFecdecla(),
			$keys[28] => $this->getPorleg(),
			$keys[29] => $this->getMinleg(),
			$keys[30] => $this->getPortec(),
			$keys[31] => $this->getMintec(),
			$keys[32] => $this->getPorfin(),
			$keys[33] => $this->getMinfin(),
			$keys[34] => $this->getPorfia(),
			$keys[35] => $this->getMinfia(),
			$keys[36] => $this->getPortipemp(),
			$keys[37] => $this->getMintipemp(),
			$keys[38] => $this->getTipconpub(),
			$keys[39] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiplieesphisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumplie($value);
				break;
			case 1:
				$this->setNumcomint($value);
				break;
			case 2:
				$this->setNumexp($value);
				break;
			case 3:
				$this->setCodempadm($value);
				break;
			case 4:
				$this->setCoduniadm($value);
				break;
			case 5:
				$this->setCodempeje($value);
				break;
			case 6:
				$this->setCoduniste($value);
				break;
			case 7:
				$this->setFecreg($value);
				break;
			case 8:
				$this->setDias($value);
				break;
			case 9:
				$this->setFecven($value);
				break;
			case 10:
				$this->setIdioma($value);
				break;
			case 11:
				$this->setCosplie($value);
				break;
			case 12:
				$this->setResolu($value);
				break;
			case 13:
				$this->setFecrel($value);
				break;
			case 14:
				$this->setDecret($value);
				break;
			case 15:
				$this->setFecdec($value);
				break;
			case 16:
				$this->setDescrip($value);
				break;
			case 17:
				$this->setDocane1($value);
				break;
			case 18:
				$this->setDocane2($value);
				break;
			case 19:
				$this->setDocane3($value);
				break;
			case 20:
				$this->setPrepor($value);
				break;
			case 21:
				$this->setPreporcar($value);
				break;
			case 22:
				$this->setLisicactId($value);
				break;
			case 23:
				$this->setDetdecmod($value);
				break;
			case 24:
				$this->setAnapor($value);
				break;
			case 25:
				$this->setAnaporcar($value);
				break;
			case 26:
				$this->setStatus($value);
				break;
			case 27:
				$this->setFecdecla($value);
				break;
			case 28:
				$this->setPorleg($value);
				break;
			case 29:
				$this->setMinleg($value);
				break;
			case 30:
				$this->setPortec($value);
				break;
			case 31:
				$this->setMintec($value);
				break;
			case 32:
				$this->setPorfin($value);
				break;
			case 33:
				$this->setMinfin($value);
				break;
			case 34:
				$this->setPorfia($value);
				break;
			case 35:
				$this->setMinfia($value);
				break;
			case 36:
				$this->setPortipemp($value);
				break;
			case 37:
				$this->setMintipemp($value);
				break;
			case 38:
				$this->setTipconpub($value);
				break;
			case 39:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiplieesphisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumplie($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcomint($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumexp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodempadm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoduniadm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodempeje($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoduniste($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecreg($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDias($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecven($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setIdioma($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCosplie($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setResolu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecrel($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDecret($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFecdec($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDescrip($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDocane1($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDocane2($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDocane3($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setPrepor($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setPreporcar($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setLisicactId($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDetdecmod($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setAnapor($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setAnaporcar($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setStatus($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setFecdecla($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setPorleg($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setMinleg($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setPortec($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setMintec($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setPorfin($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setMinfin($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setPorfia($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setMinfia($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setPortipemp($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setMintipemp($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setTipconpub($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setId($arr[$keys[39]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiplieesphisPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiplieesphisPeer::NUMPLIE)) $criteria->add(LiplieesphisPeer::NUMPLIE, $this->numplie);
		if ($this->isColumnModified(LiplieesphisPeer::NUMCOMINT)) $criteria->add(LiplieesphisPeer::NUMCOMINT, $this->numcomint);
		if ($this->isColumnModified(LiplieesphisPeer::NUMEXP)) $criteria->add(LiplieesphisPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LiplieesphisPeer::CODEMPADM)) $criteria->add(LiplieesphisPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LiplieesphisPeer::CODUNIADM)) $criteria->add(LiplieesphisPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LiplieesphisPeer::CODEMPEJE)) $criteria->add(LiplieesphisPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LiplieesphisPeer::CODUNISTE)) $criteria->add(LiplieesphisPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LiplieesphisPeer::FECREG)) $criteria->add(LiplieesphisPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LiplieesphisPeer::DIAS)) $criteria->add(LiplieesphisPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LiplieesphisPeer::FECVEN)) $criteria->add(LiplieesphisPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LiplieesphisPeer::IDIOMA)) $criteria->add(LiplieesphisPeer::IDIOMA, $this->idioma);
		if ($this->isColumnModified(LiplieesphisPeer::COSPLIE)) $criteria->add(LiplieesphisPeer::COSPLIE, $this->cosplie);
		if ($this->isColumnModified(LiplieesphisPeer::RESOLU)) $criteria->add(LiplieesphisPeer::RESOLU, $this->resolu);
		if ($this->isColumnModified(LiplieesphisPeer::FECREL)) $criteria->add(LiplieesphisPeer::FECREL, $this->fecrel);
		if ($this->isColumnModified(LiplieesphisPeer::DECRET)) $criteria->add(LiplieesphisPeer::DECRET, $this->decret);
		if ($this->isColumnModified(LiplieesphisPeer::FECDEC)) $criteria->add(LiplieesphisPeer::FECDEC, $this->fecdec);
		if ($this->isColumnModified(LiplieesphisPeer::DESCRIP)) $criteria->add(LiplieesphisPeer::DESCRIP, $this->descrip);
		if ($this->isColumnModified(LiplieesphisPeer::DOCANE1)) $criteria->add(LiplieesphisPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LiplieesphisPeer::DOCANE2)) $criteria->add(LiplieesphisPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LiplieesphisPeer::DOCANE3)) $criteria->add(LiplieesphisPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LiplieesphisPeer::PREPOR)) $criteria->add(LiplieesphisPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LiplieesphisPeer::PREPORCAR)) $criteria->add(LiplieesphisPeer::PREPORCAR, $this->preporcar);
		if ($this->isColumnModified(LiplieesphisPeer::LISICACT_ID)) $criteria->add(LiplieesphisPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LiplieesphisPeer::DETDECMOD)) $criteria->add(LiplieesphisPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LiplieesphisPeer::ANAPOR)) $criteria->add(LiplieesphisPeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LiplieesphisPeer::ANAPORCAR)) $criteria->add(LiplieesphisPeer::ANAPORCAR, $this->anaporcar);
		if ($this->isColumnModified(LiplieesphisPeer::STATUS)) $criteria->add(LiplieesphisPeer::STATUS, $this->status);
		if ($this->isColumnModified(LiplieesphisPeer::FECDECLA)) $criteria->add(LiplieesphisPeer::FECDECLA, $this->fecdecla);
		if ($this->isColumnModified(LiplieesphisPeer::PORLEG)) $criteria->add(LiplieesphisPeer::PORLEG, $this->porleg);
		if ($this->isColumnModified(LiplieesphisPeer::MINLEG)) $criteria->add(LiplieesphisPeer::MINLEG, $this->minleg);
		if ($this->isColumnModified(LiplieesphisPeer::PORTEC)) $criteria->add(LiplieesphisPeer::PORTEC, $this->portec);
		if ($this->isColumnModified(LiplieesphisPeer::MINTEC)) $criteria->add(LiplieesphisPeer::MINTEC, $this->mintec);
		if ($this->isColumnModified(LiplieesphisPeer::PORFIN)) $criteria->add(LiplieesphisPeer::PORFIN, $this->porfin);
		if ($this->isColumnModified(LiplieesphisPeer::MINFIN)) $criteria->add(LiplieesphisPeer::MINFIN, $this->minfin);
		if ($this->isColumnModified(LiplieesphisPeer::PORFIA)) $criteria->add(LiplieesphisPeer::PORFIA, $this->porfia);
		if ($this->isColumnModified(LiplieesphisPeer::MINFIA)) $criteria->add(LiplieesphisPeer::MINFIA, $this->minfia);
		if ($this->isColumnModified(LiplieesphisPeer::PORTIPEMP)) $criteria->add(LiplieesphisPeer::PORTIPEMP, $this->portipemp);
		if ($this->isColumnModified(LiplieesphisPeer::MINTIPEMP)) $criteria->add(LiplieesphisPeer::MINTIPEMP, $this->mintipemp);
		if ($this->isColumnModified(LiplieesphisPeer::TIPCONPUB)) $criteria->add(LiplieesphisPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LiplieesphisPeer::ID)) $criteria->add(LiplieesphisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiplieesphisPeer::DATABASE_NAME);

		$criteria->add(LiplieesphisPeer::ID, $this->id);

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

		$copyObj->setNumplie($this->numplie);

		$copyObj->setNumcomint($this->numcomint);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setCodempadm($this->codempadm);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCodempeje($this->codempeje);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDias($this->dias);

		$copyObj->setFecven($this->fecven);

		$copyObj->setIdioma($this->idioma);

		$copyObj->setCosplie($this->cosplie);

		$copyObj->setResolu($this->resolu);

		$copyObj->setFecrel($this->fecrel);

		$copyObj->setDecret($this->decret);

		$copyObj->setFecdec($this->fecdec);

		$copyObj->setDescrip($this->descrip);

		$copyObj->setDocane1($this->docane1);

		$copyObj->setDocane2($this->docane2);

		$copyObj->setDocane3($this->docane3);

		$copyObj->setPrepor($this->prepor);

		$copyObj->setPreporcar($this->preporcar);

		$copyObj->setLisicactId($this->lisicact_id);

		$copyObj->setDetdecmod($this->detdecmod);

		$copyObj->setAnapor($this->anapor);

		$copyObj->setAnaporcar($this->anaporcar);

		$copyObj->setStatus($this->status);

		$copyObj->setFecdecla($this->fecdecla);

		$copyObj->setPorleg($this->porleg);

		$copyObj->setMinleg($this->minleg);

		$copyObj->setPortec($this->portec);

		$copyObj->setMintec($this->mintec);

		$copyObj->setPorfin($this->porfin);

		$copyObj->setMinfin($this->minfin);

		$copyObj->setPorfia($this->porfia);

		$copyObj->setMinfia($this->minfia);

		$copyObj->setPortipemp($this->portipemp);

		$copyObj->setMintipemp($this->mintipemp);

		$copyObj->setTipconpub($this->tipconpub);


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
			self::$peer = new LiplieesphisPeer();
		}
		return self::$peer;
	}

	
	public function setLisicact($v)
	{


		if ($v === null) {
			$this->setLisicactId(NULL);
		} else {
			$this->setLisicactId($v->getId());
		}


		$this->aLisicact = $v;
	}


	
	public function getLisicact($con = null)
	{
		if ($this->aLisicact === null && ($this->lisicact_id !== null)) {
						include_once 'lib/model/licitaciones/om/BaseLisicactPeer.php';

      $c = new Criteria();
      $c->add(LisicactPeer::ID,$this->lisicact_id);
      
			$this->aLisicact = LisicactPeer::doSelectOne($c, $con);

			
		}
		return $this->aLisicact;
	}

} 