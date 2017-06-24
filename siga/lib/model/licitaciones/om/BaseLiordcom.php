<?php


abstract class BaseLiordcom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numord;


	
	protected $resolu;


	
	protected $fecrel;


	
	protected $fecreg;


	
	protected $dias;


	
	protected $fecven;


	
	protected $numptocuecon;


	
	protected $numexp;


	
	protected $codempadm;


	
	protected $coduniadm;


	
	protected $codempeje;


	
	protected $coduniste;


	
	protected $codpro;


	
	protected $numofe;


	
	protected $objcont;


	
	protected $tipdesc;


	
	protected $conpag;


	
	protected $sancio;


	
	protected $garant;


	
	protected $status;


	
	protected $docane1;


	
	protected $docane2;


	
	protected $docane3;


	
	protected $prepor;


	
	protected $preporcar;


	
	protected $lisicact_id;


	
	protected $fecdecla;


	
	protected $detdecmod;


	
	protected $anapor;


	
	protected $anaporcar;


	
	protected $codmedcom;


	
	protected $codprocom;


	
	protected $numpro;


	
	protected $codpai;


	
	protected $codest;


	
	protected $codmun;


	
	protected $de4000;


	
	protected $de3798;


	
	protected $numsig;


	
	protected $fecsig;


	
	protected $expdie;


	
	protected $monpro;


	
	protected $id;

	
	protected $aLisicact;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumord()
  {

    return trim($this->numord);

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

  
  public function getNumptocuecon()
  {

    return trim($this->numptocuecon);

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
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getNumofe()
  {

    return trim($this->numofe);

  }
  
  public function getObjcont()
  {

    return trim($this->objcont);

  }
  
  public function getTipdesc()
  {

    return trim($this->tipdesc);

  }
  
  public function getConpag()
  {

    return trim($this->conpag);

  }
  
  public function getSancio()
  {

    return trim($this->sancio);

  }
  
  public function getGarant()
  {

    return trim($this->garant);

  }
  
  public function getStatus()
  {

    return trim($this->status);

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
  
  public function getCodmedcom()
  {

    return trim($this->codmedcom);

  }
  
  public function getCodprocom()
  {

    return trim($this->codprocom);

  }
  
  public function getNumpro()
  {

    return trim($this->numpro);

  }
  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getCodest()
  {

    return trim($this->codest);

  }
  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getDe4000()
  {

    return trim($this->de4000);

  }
  
  public function getDe3798()
  {

    return trim($this->de3798);

  }
  
  public function getNumsig()
  {

    return trim($this->numsig);

  }
  
  public function getFecsig($format = 'Y-m-d')
  {

    if ($this->fecsig === null || $this->fecsig === '') {
      return null;
    } elseif (!is_int($this->fecsig)) {
            $ts = adodb_strtotime($this->fecsig);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsig] as date/time value: " . var_export($this->fecsig, true));
      }
    } else {
      $ts = $this->fecsig;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getExpdie()
  {

    return trim($this->expdie);

  }
  
  public function getMonpro($val=false)
  {

    if($val) return number_format($this->monpro,2,',','.');
    else return $this->monpro;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = LiordcomPeer::NUMORD;
      }
  
	} 
	
	public function setResolu($v)
	{

    if ($this->resolu !== $v) {
        $this->resolu = $v;
        $this->modifiedColumns[] = LiordcomPeer::RESOLU;
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
      $this->modifiedColumns[] = LiordcomPeer::FECREL;
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
      $this->modifiedColumns[] = LiordcomPeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LiordcomPeer::DIAS;
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
      $this->modifiedColumns[] = LiordcomPeer::FECVEN;
    }

	} 
	
	public function setNumptocuecon($v)
	{

    if ($this->numptocuecon !== $v) {
        $this->numptocuecon = $v;
        $this->modifiedColumns[] = LiordcomPeer::NUMPTOCUECON;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LiordcomPeer::NUMEXP;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LiordcomPeer::CODEMPADM;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LiordcomPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LiordcomPeer::CODEMPEJE;
      }
  
	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LiordcomPeer::CODUNISTE;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = LiordcomPeer::CODPRO;
      }
  
	} 
	
	public function setNumofe($v)
	{

    if ($this->numofe !== $v) {
        $this->numofe = $v;
        $this->modifiedColumns[] = LiordcomPeer::NUMOFE;
      }
  
	} 
	
	public function setObjcont($v)
	{

    if ($this->objcont !== $v) {
        $this->objcont = $v;
        $this->modifiedColumns[] = LiordcomPeer::OBJCONT;
      }
  
	} 
	
	public function setTipdesc($v)
	{

    if ($this->tipdesc !== $v) {
        $this->tipdesc = $v;
        $this->modifiedColumns[] = LiordcomPeer::TIPDESC;
      }
  
	} 
	
	public function setConpag($v)
	{

    if ($this->conpag !== $v) {
        $this->conpag = $v;
        $this->modifiedColumns[] = LiordcomPeer::CONPAG;
      }
  
	} 
	
	public function setSancio($v)
	{

    if ($this->sancio !== $v) {
        $this->sancio = $v;
        $this->modifiedColumns[] = LiordcomPeer::SANCIO;
      }
  
	} 
	
	public function setGarant($v)
	{

    if ($this->garant !== $v) {
        $this->garant = $v;
        $this->modifiedColumns[] = LiordcomPeer::GARANT;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LiordcomPeer::STATUS;
      }
  
	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LiordcomPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LiordcomPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LiordcomPeer::DOCANE3;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LiordcomPeer::PREPOR;
      }
  
	} 
	
	public function setPreporcar($v)
	{

    if ($this->preporcar !== $v) {
        $this->preporcar = $v;
        $this->modifiedColumns[] = LiordcomPeer::PREPORCAR;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LiordcomPeer::LISICACT_ID;
      }
  
		if ($this->aLisicact !== null && $this->aLisicact->getId() !== $v) {
			$this->aLisicact = null;
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
      $this->modifiedColumns[] = LiordcomPeer::FECDECLA;
    }

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LiordcomPeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LiordcomPeer::ANAPOR;
      }
  
	} 
	
	public function setAnaporcar($v)
	{

    if ($this->anaporcar !== $v) {
        $this->anaporcar = $v;
        $this->modifiedColumns[] = LiordcomPeer::ANAPORCAR;
      }
  
	} 
	
	public function setCodmedcom($v)
	{

    if ($this->codmedcom !== $v) {
        $this->codmedcom = $v;
        $this->modifiedColumns[] = LiordcomPeer::CODMEDCOM;
      }
  
	} 
	
	public function setCodprocom($v)
	{

    if ($this->codprocom !== $v) {
        $this->codprocom = $v;
        $this->modifiedColumns[] = LiordcomPeer::CODPROCOM;
      }
  
	} 
	
	public function setNumpro($v)
	{

    if ($this->numpro !== $v) {
        $this->numpro = $v;
        $this->modifiedColumns[] = LiordcomPeer::NUMPRO;
      }
  
	} 
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = LiordcomPeer::CODPAI;
      }
  
	} 
	
	public function setCodest($v)
	{

    if ($this->codest !== $v) {
        $this->codest = $v;
        $this->modifiedColumns[] = LiordcomPeer::CODEST;
      }
  
	} 
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = LiordcomPeer::CODMUN;
      }
  
	} 
	
	public function setDe4000($v)
	{

    if ($this->de4000 !== $v) {
        $this->de4000 = $v;
        $this->modifiedColumns[] = LiordcomPeer::DE4000;
      }
  
	} 
	
	public function setDe3798($v)
	{

    if ($this->de3798 !== $v) {
        $this->de3798 = $v;
        $this->modifiedColumns[] = LiordcomPeer::DE3798;
      }
  
	} 
	
	public function setNumsig($v)
	{

    if ($this->numsig !== $v) {
        $this->numsig = $v;
        $this->modifiedColumns[] = LiordcomPeer::NUMSIG;
      }
  
	} 
	
	public function setFecsig($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsig] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsig !== $ts) {
      $this->fecsig = $ts;
      $this->modifiedColumns[] = LiordcomPeer::FECSIG;
    }

	} 
	
	public function setExpdie($v)
	{

    if ($this->expdie !== $v) {
        $this->expdie = $v;
        $this->modifiedColumns[] = LiordcomPeer::EXPDIE;
      }
  
	} 
	
	public function setMonpro($v)
	{

    if ($this->monpro !== $v) {
        $this->monpro = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiordcomPeer::MONPRO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiordcomPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numord = $rs->getString($startcol + 0);

      $this->resolu = $rs->getString($startcol + 1);

      $this->fecrel = $rs->getDate($startcol + 2, null);

      $this->fecreg = $rs->getDate($startcol + 3, null);

      $this->dias = $rs->getInt($startcol + 4);

      $this->fecven = $rs->getDate($startcol + 5, null);

      $this->numptocuecon = $rs->getString($startcol + 6);

      $this->numexp = $rs->getString($startcol + 7);

      $this->codempadm = $rs->getString($startcol + 8);

      $this->coduniadm = $rs->getString($startcol + 9);

      $this->codempeje = $rs->getString($startcol + 10);

      $this->coduniste = $rs->getString($startcol + 11);

      $this->codpro = $rs->getString($startcol + 12);

      $this->numofe = $rs->getString($startcol + 13);

      $this->objcont = $rs->getString($startcol + 14);

      $this->tipdesc = $rs->getString($startcol + 15);

      $this->conpag = $rs->getString($startcol + 16);

      $this->sancio = $rs->getString($startcol + 17);

      $this->garant = $rs->getString($startcol + 18);

      $this->status = $rs->getString($startcol + 19);

      $this->docane1 = $rs->getString($startcol + 20);

      $this->docane2 = $rs->getString($startcol + 21);

      $this->docane3 = $rs->getString($startcol + 22);

      $this->prepor = $rs->getString($startcol + 23);

      $this->preporcar = $rs->getString($startcol + 24);

      $this->lisicact_id = $rs->getInt($startcol + 25);

      $this->fecdecla = $rs->getDate($startcol + 26, null);

      $this->detdecmod = $rs->getString($startcol + 27);

      $this->anapor = $rs->getString($startcol + 28);

      $this->anaporcar = $rs->getString($startcol + 29);

      $this->codmedcom = $rs->getString($startcol + 30);

      $this->codprocom = $rs->getString($startcol + 31);

      $this->numpro = $rs->getString($startcol + 32);

      $this->codpai = $rs->getString($startcol + 33);

      $this->codest = $rs->getString($startcol + 34);

      $this->codmun = $rs->getString($startcol + 35);

      $this->de4000 = $rs->getString($startcol + 36);

      $this->de3798 = $rs->getString($startcol + 37);

      $this->numsig = $rs->getString($startcol + 38);

      $this->fecsig = $rs->getDate($startcol + 39, null);

      $this->expdie = $rs->getString($startcol + 40);

      $this->monpro = $rs->getFloat($startcol + 41);

      $this->id = $rs->getInt($startcol + 42);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 43; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liordcom object", $e);
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
			$con = Propel::getConnection(LiordcomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiordcomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiordcomPeer::DATABASE_NAME);
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
					$pk = LiordcomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiordcomPeer::doUpdate($this, $con);
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


			if (($retval = LiordcomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiordcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumord();
				break;
			case 1:
				return $this->getResolu();
				break;
			case 2:
				return $this->getFecrel();
				break;
			case 3:
				return $this->getFecreg();
				break;
			case 4:
				return $this->getDias();
				break;
			case 5:
				return $this->getFecven();
				break;
			case 6:
				return $this->getNumptocuecon();
				break;
			case 7:
				return $this->getNumexp();
				break;
			case 8:
				return $this->getCodempadm();
				break;
			case 9:
				return $this->getCoduniadm();
				break;
			case 10:
				return $this->getCodempeje();
				break;
			case 11:
				return $this->getCoduniste();
				break;
			case 12:
				return $this->getCodpro();
				break;
			case 13:
				return $this->getNumofe();
				break;
			case 14:
				return $this->getObjcont();
				break;
			case 15:
				return $this->getTipdesc();
				break;
			case 16:
				return $this->getConpag();
				break;
			case 17:
				return $this->getSancio();
				break;
			case 18:
				return $this->getGarant();
				break;
			case 19:
				return $this->getStatus();
				break;
			case 20:
				return $this->getDocane1();
				break;
			case 21:
				return $this->getDocane2();
				break;
			case 22:
				return $this->getDocane3();
				break;
			case 23:
				return $this->getPrepor();
				break;
			case 24:
				return $this->getPreporcar();
				break;
			case 25:
				return $this->getLisicactId();
				break;
			case 26:
				return $this->getFecdecla();
				break;
			case 27:
				return $this->getDetdecmod();
				break;
			case 28:
				return $this->getAnapor();
				break;
			case 29:
				return $this->getAnaporcar();
				break;
			case 30:
				return $this->getCodmedcom();
				break;
			case 31:
				return $this->getCodprocom();
				break;
			case 32:
				return $this->getNumpro();
				break;
			case 33:
				return $this->getCodpai();
				break;
			case 34:
				return $this->getCodest();
				break;
			case 35:
				return $this->getCodmun();
				break;
			case 36:
				return $this->getDe4000();
				break;
			case 37:
				return $this->getDe3798();
				break;
			case 38:
				return $this->getNumsig();
				break;
			case 39:
				return $this->getFecsig();
				break;
			case 40:
				return $this->getExpdie();
				break;
			case 41:
				return $this->getMonpro();
				break;
			case 42:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiordcomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumord(),
			$keys[1] => $this->getResolu(),
			$keys[2] => $this->getFecrel(),
			$keys[3] => $this->getFecreg(),
			$keys[4] => $this->getDias(),
			$keys[5] => $this->getFecven(),
			$keys[6] => $this->getNumptocuecon(),
			$keys[7] => $this->getNumexp(),
			$keys[8] => $this->getCodempadm(),
			$keys[9] => $this->getCoduniadm(),
			$keys[10] => $this->getCodempeje(),
			$keys[11] => $this->getCoduniste(),
			$keys[12] => $this->getCodpro(),
			$keys[13] => $this->getNumofe(),
			$keys[14] => $this->getObjcont(),
			$keys[15] => $this->getTipdesc(),
			$keys[16] => $this->getConpag(),
			$keys[17] => $this->getSancio(),
			$keys[18] => $this->getGarant(),
			$keys[19] => $this->getStatus(),
			$keys[20] => $this->getDocane1(),
			$keys[21] => $this->getDocane2(),
			$keys[22] => $this->getDocane3(),
			$keys[23] => $this->getPrepor(),
			$keys[24] => $this->getPreporcar(),
			$keys[25] => $this->getLisicactId(),
			$keys[26] => $this->getFecdecla(),
			$keys[27] => $this->getDetdecmod(),
			$keys[28] => $this->getAnapor(),
			$keys[29] => $this->getAnaporcar(),
			$keys[30] => $this->getCodmedcom(),
			$keys[31] => $this->getCodprocom(),
			$keys[32] => $this->getNumpro(),
			$keys[33] => $this->getCodpai(),
			$keys[34] => $this->getCodest(),
			$keys[35] => $this->getCodmun(),
			$keys[36] => $this->getDe4000(),
			$keys[37] => $this->getDe3798(),
			$keys[38] => $this->getNumsig(),
			$keys[39] => $this->getFecsig(),
			$keys[40] => $this->getExpdie(),
			$keys[41] => $this->getMonpro(),
			$keys[42] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiordcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumord($value);
				break;
			case 1:
				$this->setResolu($value);
				break;
			case 2:
				$this->setFecrel($value);
				break;
			case 3:
				$this->setFecreg($value);
				break;
			case 4:
				$this->setDias($value);
				break;
			case 5:
				$this->setFecven($value);
				break;
			case 6:
				$this->setNumptocuecon($value);
				break;
			case 7:
				$this->setNumexp($value);
				break;
			case 8:
				$this->setCodempadm($value);
				break;
			case 9:
				$this->setCoduniadm($value);
				break;
			case 10:
				$this->setCodempeje($value);
				break;
			case 11:
				$this->setCoduniste($value);
				break;
			case 12:
				$this->setCodpro($value);
				break;
			case 13:
				$this->setNumofe($value);
				break;
			case 14:
				$this->setObjcont($value);
				break;
			case 15:
				$this->setTipdesc($value);
				break;
			case 16:
				$this->setConpag($value);
				break;
			case 17:
				$this->setSancio($value);
				break;
			case 18:
				$this->setGarant($value);
				break;
			case 19:
				$this->setStatus($value);
				break;
			case 20:
				$this->setDocane1($value);
				break;
			case 21:
				$this->setDocane2($value);
				break;
			case 22:
				$this->setDocane3($value);
				break;
			case 23:
				$this->setPrepor($value);
				break;
			case 24:
				$this->setPreporcar($value);
				break;
			case 25:
				$this->setLisicactId($value);
				break;
			case 26:
				$this->setFecdecla($value);
				break;
			case 27:
				$this->setDetdecmod($value);
				break;
			case 28:
				$this->setAnapor($value);
				break;
			case 29:
				$this->setAnaporcar($value);
				break;
			case 30:
				$this->setCodmedcom($value);
				break;
			case 31:
				$this->setCodprocom($value);
				break;
			case 32:
				$this->setNumpro($value);
				break;
			case 33:
				$this->setCodpai($value);
				break;
			case 34:
				$this->setCodest($value);
				break;
			case 35:
				$this->setCodmun($value);
				break;
			case 36:
				$this->setDe4000($value);
				break;
			case 37:
				$this->setDe3798($value);
				break;
			case 38:
				$this->setNumsig($value);
				break;
			case 39:
				$this->setFecsig($value);
				break;
			case 40:
				$this->setExpdie($value);
				break;
			case 41:
				$this->setMonpro($value);
				break;
			case 42:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiordcomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumord($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setResolu($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecrel($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecreg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDias($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecven($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumptocuecon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumexp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodempadm($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCoduniadm($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodempeje($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCoduniste($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodpro($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setNumofe($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setObjcont($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTipdesc($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setConpag($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setSancio($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setGarant($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setStatus($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDocane1($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDocane2($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setDocane3($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setPrepor($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setPreporcar($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setLisicactId($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setFecdecla($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setDetdecmod($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setAnapor($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setAnaporcar($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCodmedcom($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCodprocom($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setNumpro($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setCodpai($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setCodest($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setCodmun($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setDe4000($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setDe3798($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setNumsig($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setFecsig($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setExpdie($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setMonpro($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setId($arr[$keys[42]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiordcomPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiordcomPeer::NUMORD)) $criteria->add(LiordcomPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(LiordcomPeer::RESOLU)) $criteria->add(LiordcomPeer::RESOLU, $this->resolu);
		if ($this->isColumnModified(LiordcomPeer::FECREL)) $criteria->add(LiordcomPeer::FECREL, $this->fecrel);
		if ($this->isColumnModified(LiordcomPeer::FECREG)) $criteria->add(LiordcomPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LiordcomPeer::DIAS)) $criteria->add(LiordcomPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LiordcomPeer::FECVEN)) $criteria->add(LiordcomPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LiordcomPeer::NUMPTOCUECON)) $criteria->add(LiordcomPeer::NUMPTOCUECON, $this->numptocuecon);
		if ($this->isColumnModified(LiordcomPeer::NUMEXP)) $criteria->add(LiordcomPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LiordcomPeer::CODEMPADM)) $criteria->add(LiordcomPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LiordcomPeer::CODUNIADM)) $criteria->add(LiordcomPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LiordcomPeer::CODEMPEJE)) $criteria->add(LiordcomPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LiordcomPeer::CODUNISTE)) $criteria->add(LiordcomPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LiordcomPeer::CODPRO)) $criteria->add(LiordcomPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(LiordcomPeer::NUMOFE)) $criteria->add(LiordcomPeer::NUMOFE, $this->numofe);
		if ($this->isColumnModified(LiordcomPeer::OBJCONT)) $criteria->add(LiordcomPeer::OBJCONT, $this->objcont);
		if ($this->isColumnModified(LiordcomPeer::TIPDESC)) $criteria->add(LiordcomPeer::TIPDESC, $this->tipdesc);
		if ($this->isColumnModified(LiordcomPeer::CONPAG)) $criteria->add(LiordcomPeer::CONPAG, $this->conpag);
		if ($this->isColumnModified(LiordcomPeer::SANCIO)) $criteria->add(LiordcomPeer::SANCIO, $this->sancio);
		if ($this->isColumnModified(LiordcomPeer::GARANT)) $criteria->add(LiordcomPeer::GARANT, $this->garant);
		if ($this->isColumnModified(LiordcomPeer::STATUS)) $criteria->add(LiordcomPeer::STATUS, $this->status);
		if ($this->isColumnModified(LiordcomPeer::DOCANE1)) $criteria->add(LiordcomPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LiordcomPeer::DOCANE2)) $criteria->add(LiordcomPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LiordcomPeer::DOCANE3)) $criteria->add(LiordcomPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LiordcomPeer::PREPOR)) $criteria->add(LiordcomPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LiordcomPeer::PREPORCAR)) $criteria->add(LiordcomPeer::PREPORCAR, $this->preporcar);
		if ($this->isColumnModified(LiordcomPeer::LISICACT_ID)) $criteria->add(LiordcomPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LiordcomPeer::FECDECLA)) $criteria->add(LiordcomPeer::FECDECLA, $this->fecdecla);
		if ($this->isColumnModified(LiordcomPeer::DETDECMOD)) $criteria->add(LiordcomPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LiordcomPeer::ANAPOR)) $criteria->add(LiordcomPeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LiordcomPeer::ANAPORCAR)) $criteria->add(LiordcomPeer::ANAPORCAR, $this->anaporcar);
		if ($this->isColumnModified(LiordcomPeer::CODMEDCOM)) $criteria->add(LiordcomPeer::CODMEDCOM, $this->codmedcom);
		if ($this->isColumnModified(LiordcomPeer::CODPROCOM)) $criteria->add(LiordcomPeer::CODPROCOM, $this->codprocom);
		if ($this->isColumnModified(LiordcomPeer::NUMPRO)) $criteria->add(LiordcomPeer::NUMPRO, $this->numpro);
		if ($this->isColumnModified(LiordcomPeer::CODPAI)) $criteria->add(LiordcomPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(LiordcomPeer::CODEST)) $criteria->add(LiordcomPeer::CODEST, $this->codest);
		if ($this->isColumnModified(LiordcomPeer::CODMUN)) $criteria->add(LiordcomPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(LiordcomPeer::DE4000)) $criteria->add(LiordcomPeer::DE4000, $this->de4000);
		if ($this->isColumnModified(LiordcomPeer::DE3798)) $criteria->add(LiordcomPeer::DE3798, $this->de3798);
		if ($this->isColumnModified(LiordcomPeer::NUMSIG)) $criteria->add(LiordcomPeer::NUMSIG, $this->numsig);
		if ($this->isColumnModified(LiordcomPeer::FECSIG)) $criteria->add(LiordcomPeer::FECSIG, $this->fecsig);
		if ($this->isColumnModified(LiordcomPeer::EXPDIE)) $criteria->add(LiordcomPeer::EXPDIE, $this->expdie);
		if ($this->isColumnModified(LiordcomPeer::MONPRO)) $criteria->add(LiordcomPeer::MONPRO, $this->monpro);
		if ($this->isColumnModified(LiordcomPeer::ID)) $criteria->add(LiordcomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiordcomPeer::DATABASE_NAME);

		$criteria->add(LiordcomPeer::ID, $this->id);

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

		$copyObj->setResolu($this->resolu);

		$copyObj->setFecrel($this->fecrel);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDias($this->dias);

		$copyObj->setFecven($this->fecven);

		$copyObj->setNumptocuecon($this->numptocuecon);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setCodempadm($this->codempadm);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCodempeje($this->codempeje);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setNumofe($this->numofe);

		$copyObj->setObjcont($this->objcont);

		$copyObj->setTipdesc($this->tipdesc);

		$copyObj->setConpag($this->conpag);

		$copyObj->setSancio($this->sancio);

		$copyObj->setGarant($this->garant);

		$copyObj->setStatus($this->status);

		$copyObj->setDocane1($this->docane1);

		$copyObj->setDocane2($this->docane2);

		$copyObj->setDocane3($this->docane3);

		$copyObj->setPrepor($this->prepor);

		$copyObj->setPreporcar($this->preporcar);

		$copyObj->setLisicactId($this->lisicact_id);

		$copyObj->setFecdecla($this->fecdecla);

		$copyObj->setDetdecmod($this->detdecmod);

		$copyObj->setAnapor($this->anapor);

		$copyObj->setAnaporcar($this->anaporcar);

		$copyObj->setCodmedcom($this->codmedcom);

		$copyObj->setCodprocom($this->codprocom);

		$copyObj->setNumpro($this->numpro);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setCodest($this->codest);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setDe4000($this->de4000);

		$copyObj->setDe3798($this->de3798);

		$copyObj->setNumsig($this->numsig);

		$copyObj->setFecsig($this->fecsig);

		$copyObj->setExpdie($this->expdie);

		$copyObj->setMonpro($this->monpro);


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
			self::$peer = new LiordcomPeer();
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