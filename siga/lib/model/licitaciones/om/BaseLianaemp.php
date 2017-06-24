<?php


abstract class BaseLianaemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numanaemp;


	
	protected $numplie;


	
	protected $numexp;


	
	protected $codempadm;


	
	protected $coduniadm;


	
	protected $codempeje;


	
	protected $coduniste;


	
	protected $codpro;


	
	protected $fecreg;


	
	protected $dias;


	
	protected $fecven;


	
	protected $docane1;


	
	protected $docane2;


	
	protected $docane3;


	
	protected $prepor;


	
	protected $cargopre;


	
	protected $lisicact_id;


	
	protected $detdecmod;


	
	protected $anapor;


	
	protected $cargoana;


	
	protected $status;


	
	protected $fecdecla;


	
	protected $porleg;


	
	protected $portec;


	
	protected $porfin;


	
	protected $portot;


	
	protected $tipconpub;


	
	protected $id;

	
	protected $aLisicact;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumanaemp()
  {

    return trim($this->numanaemp);

  }
  
  public function getNumplie()
  {

    return trim($this->numplie);

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
  
  public function getCargopre()
  {

    return trim($this->cargopre);

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
  
  public function getCargoana()
  {

    return trim($this->cargoana);

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
  
  public function getPortec($val=false)
  {

    if($val) return number_format($this->portec,2,',','.');
    else return $this->portec;

  }
  
  public function getPorfin($val=false)
  {

    if($val) return number_format($this->porfin,2,',','.');
    else return $this->porfin;

  }
  
  public function getPortot($val=false)
  {

    if($val) return number_format($this->portot,2,',','.');
    else return $this->portot;

  }
  
  public function getTipconpub()
  {

    return trim($this->tipconpub);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumanaemp($v)
	{

    if ($this->numanaemp !== $v) {
        $this->numanaemp = $v;
        $this->modifiedColumns[] = LianaempPeer::NUMANAEMP;
      }
  
	} 
	
	public function setNumplie($v)
	{

    if ($this->numplie !== $v) {
        $this->numplie = $v;
        $this->modifiedColumns[] = LianaempPeer::NUMPLIE;
      }
  
	} 
	
	public function setNumexp($v)
	{

    if ($this->numexp !== $v) {
        $this->numexp = $v;
        $this->modifiedColumns[] = LianaempPeer::NUMEXP;
      }
  
	} 
	
	public function setCodempadm($v)
	{

    if ($this->codempadm !== $v) {
        $this->codempadm = $v;
        $this->modifiedColumns[] = LianaempPeer::CODEMPADM;
      }
  
	} 
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = LianaempPeer::CODUNIADM;
      }
  
	} 
	
	public function setCodempeje($v)
	{

    if ($this->codempeje !== $v) {
        $this->codempeje = $v;
        $this->modifiedColumns[] = LianaempPeer::CODEMPEJE;
      }
  
	} 
	
	public function setCoduniste($v)
	{

    if ($this->coduniste !== $v) {
        $this->coduniste = $v;
        $this->modifiedColumns[] = LianaempPeer::CODUNISTE;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = LianaempPeer::CODPRO;
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
      $this->modifiedColumns[] = LianaempPeer::FECREG;
    }

	} 
	
	public function setDias($v)
	{

    if ($this->dias !== $v) {
        $this->dias = $v;
        $this->modifiedColumns[] = LianaempPeer::DIAS;
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
      $this->modifiedColumns[] = LianaempPeer::FECVEN;
    }

	} 
	
	public function setDocane1($v)
	{

    if ($this->docane1 !== $v) {
        $this->docane1 = $v;
        $this->modifiedColumns[] = LianaempPeer::DOCANE1;
      }
  
	} 
	
	public function setDocane2($v)
	{

    if ($this->docane2 !== $v) {
        $this->docane2 = $v;
        $this->modifiedColumns[] = LianaempPeer::DOCANE2;
      }
  
	} 
	
	public function setDocane3($v)
	{

    if ($this->docane3 !== $v) {
        $this->docane3 = $v;
        $this->modifiedColumns[] = LianaempPeer::DOCANE3;
      }
  
	} 
	
	public function setPrepor($v)
	{

    if ($this->prepor !== $v) {
        $this->prepor = $v;
        $this->modifiedColumns[] = LianaempPeer::PREPOR;
      }
  
	} 
	
	public function setCargopre($v)
	{

    if ($this->cargopre !== $v) {
        $this->cargopre = $v;
        $this->modifiedColumns[] = LianaempPeer::CARGOPRE;
      }
  
	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LianaempPeer::LISICACT_ID;
      }
  
		if ($this->aLisicact !== null && $this->aLisicact->getId() !== $v) {
			$this->aLisicact = null;
		}

	} 
	
	public function setDetdecmod($v)
	{

    if ($this->detdecmod !== $v) {
        $this->detdecmod = $v;
        $this->modifiedColumns[] = LianaempPeer::DETDECMOD;
      }
  
	} 
	
	public function setAnapor($v)
	{

    if ($this->anapor !== $v) {
        $this->anapor = $v;
        $this->modifiedColumns[] = LianaempPeer::ANAPOR;
      }
  
	} 
	
	public function setCargoana($v)
	{

    if ($this->cargoana !== $v) {
        $this->cargoana = $v;
        $this->modifiedColumns[] = LianaempPeer::CARGOANA;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = LianaempPeer::STATUS;
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
      $this->modifiedColumns[] = LianaempPeer::FECDECLA;
    }

	} 
	
	public function setPorleg($v)
	{

    if ($this->porleg !== $v) {
        $this->porleg = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LianaempPeer::PORLEG;
      }
  
	} 
	
	public function setPortec($v)
	{

    if ($this->portec !== $v) {
        $this->portec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LianaempPeer::PORTEC;
      }
  
	} 
	
	public function setPorfin($v)
	{

    if ($this->porfin !== $v) {
        $this->porfin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LianaempPeer::PORFIN;
      }
  
	} 
	
	public function setPortot($v)
	{

    if ($this->portot !== $v) {
        $this->portot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LianaempPeer::PORTOT;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LianaempPeer::TIPCONPUB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LianaempPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numanaemp = $rs->getString($startcol + 0);

      $this->numplie = $rs->getString($startcol + 1);

      $this->numexp = $rs->getString($startcol + 2);

      $this->codempadm = $rs->getString($startcol + 3);

      $this->coduniadm = $rs->getString($startcol + 4);

      $this->codempeje = $rs->getString($startcol + 5);

      $this->coduniste = $rs->getString($startcol + 6);

      $this->codpro = $rs->getString($startcol + 7);

      $this->fecreg = $rs->getDate($startcol + 8, null);

      $this->dias = $rs->getInt($startcol + 9);

      $this->fecven = $rs->getDate($startcol + 10, null);

      $this->docane1 = $rs->getString($startcol + 11);

      $this->docane2 = $rs->getString($startcol + 12);

      $this->docane3 = $rs->getString($startcol + 13);

      $this->prepor = $rs->getString($startcol + 14);

      $this->cargopre = $rs->getString($startcol + 15);

      $this->lisicact_id = $rs->getInt($startcol + 16);

      $this->detdecmod = $rs->getString($startcol + 17);

      $this->anapor = $rs->getString($startcol + 18);

      $this->cargoana = $rs->getString($startcol + 19);

      $this->status = $rs->getString($startcol + 20);

      $this->fecdecla = $rs->getDate($startcol + 21, null);

      $this->porleg = $rs->getFloat($startcol + 22);

      $this->portec = $rs->getFloat($startcol + 23);

      $this->porfin = $rs->getFloat($startcol + 24);

      $this->portot = $rs->getFloat($startcol + 25);

      $this->tipconpub = $rs->getString($startcol + 26);

      $this->id = $rs->getInt($startcol + 27);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 28; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lianaemp object", $e);
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
			$con = Propel::getConnection(LianaempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LianaempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LianaempPeer::DATABASE_NAME);
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
					$pk = LianaempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LianaempPeer::doUpdate($this, $con);
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


			if (($retval = LianaempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LianaempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumanaemp();
				break;
			case 1:
				return $this->getNumplie();
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
				return $this->getCodpro();
				break;
			case 8:
				return $this->getFecreg();
				break;
			case 9:
				return $this->getDias();
				break;
			case 10:
				return $this->getFecven();
				break;
			case 11:
				return $this->getDocane1();
				break;
			case 12:
				return $this->getDocane2();
				break;
			case 13:
				return $this->getDocane3();
				break;
			case 14:
				return $this->getPrepor();
				break;
			case 15:
				return $this->getCargopre();
				break;
			case 16:
				return $this->getLisicactId();
				break;
			case 17:
				return $this->getDetdecmod();
				break;
			case 18:
				return $this->getAnapor();
				break;
			case 19:
				return $this->getCargoana();
				break;
			case 20:
				return $this->getStatus();
				break;
			case 21:
				return $this->getFecdecla();
				break;
			case 22:
				return $this->getPorleg();
				break;
			case 23:
				return $this->getPortec();
				break;
			case 24:
				return $this->getPorfin();
				break;
			case 25:
				return $this->getPortot();
				break;
			case 26:
				return $this->getTipconpub();
				break;
			case 27:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LianaempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumanaemp(),
			$keys[1] => $this->getNumplie(),
			$keys[2] => $this->getNumexp(),
			$keys[3] => $this->getCodempadm(),
			$keys[4] => $this->getCoduniadm(),
			$keys[5] => $this->getCodempeje(),
			$keys[6] => $this->getCoduniste(),
			$keys[7] => $this->getCodpro(),
			$keys[8] => $this->getFecreg(),
			$keys[9] => $this->getDias(),
			$keys[10] => $this->getFecven(),
			$keys[11] => $this->getDocane1(),
			$keys[12] => $this->getDocane2(),
			$keys[13] => $this->getDocane3(),
			$keys[14] => $this->getPrepor(),
			$keys[15] => $this->getCargopre(),
			$keys[16] => $this->getLisicactId(),
			$keys[17] => $this->getDetdecmod(),
			$keys[18] => $this->getAnapor(),
			$keys[19] => $this->getCargoana(),
			$keys[20] => $this->getStatus(),
			$keys[21] => $this->getFecdecla(),
			$keys[22] => $this->getPorleg(),
			$keys[23] => $this->getPortec(),
			$keys[24] => $this->getPorfin(),
			$keys[25] => $this->getPortot(),
			$keys[26] => $this->getTipconpub(),
			$keys[27] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LianaempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumanaemp($value);
				break;
			case 1:
				$this->setNumplie($value);
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
				$this->setCodpro($value);
				break;
			case 8:
				$this->setFecreg($value);
				break;
			case 9:
				$this->setDias($value);
				break;
			case 10:
				$this->setFecven($value);
				break;
			case 11:
				$this->setDocane1($value);
				break;
			case 12:
				$this->setDocane2($value);
				break;
			case 13:
				$this->setDocane3($value);
				break;
			case 14:
				$this->setPrepor($value);
				break;
			case 15:
				$this->setCargopre($value);
				break;
			case 16:
				$this->setLisicactId($value);
				break;
			case 17:
				$this->setDetdecmod($value);
				break;
			case 18:
				$this->setAnapor($value);
				break;
			case 19:
				$this->setCargoana($value);
				break;
			case 20:
				$this->setStatus($value);
				break;
			case 21:
				$this->setFecdecla($value);
				break;
			case 22:
				$this->setPorleg($value);
				break;
			case 23:
				$this->setPortec($value);
				break;
			case 24:
				$this->setPorfin($value);
				break;
			case 25:
				$this->setPortot($value);
				break;
			case 26:
				$this->setTipconpub($value);
				break;
			case 27:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LianaempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumanaemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumplie($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumexp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodempadm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoduniadm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodempeje($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoduniste($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodpro($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecreg($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDias($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecven($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDocane1($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDocane2($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDocane3($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setPrepor($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCargopre($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setLisicactId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setDetdecmod($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setAnapor($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCargoana($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setStatus($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFecdecla($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setPorleg($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setPortec($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setPorfin($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setPortot($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setTipconpub($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setId($arr[$keys[27]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LianaempPeer::DATABASE_NAME);

		if ($this->isColumnModified(LianaempPeer::NUMANAEMP)) $criteria->add(LianaempPeer::NUMANAEMP, $this->numanaemp);
		if ($this->isColumnModified(LianaempPeer::NUMPLIE)) $criteria->add(LianaempPeer::NUMPLIE, $this->numplie);
		if ($this->isColumnModified(LianaempPeer::NUMEXP)) $criteria->add(LianaempPeer::NUMEXP, $this->numexp);
		if ($this->isColumnModified(LianaempPeer::CODEMPADM)) $criteria->add(LianaempPeer::CODEMPADM, $this->codempadm);
		if ($this->isColumnModified(LianaempPeer::CODUNIADM)) $criteria->add(LianaempPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(LianaempPeer::CODEMPEJE)) $criteria->add(LianaempPeer::CODEMPEJE, $this->codempeje);
		if ($this->isColumnModified(LianaempPeer::CODUNISTE)) $criteria->add(LianaempPeer::CODUNISTE, $this->coduniste);
		if ($this->isColumnModified(LianaempPeer::CODPRO)) $criteria->add(LianaempPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(LianaempPeer::FECREG)) $criteria->add(LianaempPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LianaempPeer::DIAS)) $criteria->add(LianaempPeer::DIAS, $this->dias);
		if ($this->isColumnModified(LianaempPeer::FECVEN)) $criteria->add(LianaempPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(LianaempPeer::DOCANE1)) $criteria->add(LianaempPeer::DOCANE1, $this->docane1);
		if ($this->isColumnModified(LianaempPeer::DOCANE2)) $criteria->add(LianaempPeer::DOCANE2, $this->docane2);
		if ($this->isColumnModified(LianaempPeer::DOCANE3)) $criteria->add(LianaempPeer::DOCANE3, $this->docane3);
		if ($this->isColumnModified(LianaempPeer::PREPOR)) $criteria->add(LianaempPeer::PREPOR, $this->prepor);
		if ($this->isColumnModified(LianaempPeer::CARGOPRE)) $criteria->add(LianaempPeer::CARGOPRE, $this->cargopre);
		if ($this->isColumnModified(LianaempPeer::LISICACT_ID)) $criteria->add(LianaempPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LianaempPeer::DETDECMOD)) $criteria->add(LianaempPeer::DETDECMOD, $this->detdecmod);
		if ($this->isColumnModified(LianaempPeer::ANAPOR)) $criteria->add(LianaempPeer::ANAPOR, $this->anapor);
		if ($this->isColumnModified(LianaempPeer::CARGOANA)) $criteria->add(LianaempPeer::CARGOANA, $this->cargoana);
		if ($this->isColumnModified(LianaempPeer::STATUS)) $criteria->add(LianaempPeer::STATUS, $this->status);
		if ($this->isColumnModified(LianaempPeer::FECDECLA)) $criteria->add(LianaempPeer::FECDECLA, $this->fecdecla);
		if ($this->isColumnModified(LianaempPeer::PORLEG)) $criteria->add(LianaempPeer::PORLEG, $this->porleg);
		if ($this->isColumnModified(LianaempPeer::PORTEC)) $criteria->add(LianaempPeer::PORTEC, $this->portec);
		if ($this->isColumnModified(LianaempPeer::PORFIN)) $criteria->add(LianaempPeer::PORFIN, $this->porfin);
		if ($this->isColumnModified(LianaempPeer::PORTOT)) $criteria->add(LianaempPeer::PORTOT, $this->portot);
		if ($this->isColumnModified(LianaempPeer::TIPCONPUB)) $criteria->add(LianaempPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LianaempPeer::ID)) $criteria->add(LianaempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LianaempPeer::DATABASE_NAME);

		$criteria->add(LianaempPeer::ID, $this->id);

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

		$copyObj->setNumanaemp($this->numanaemp);

		$copyObj->setNumplie($this->numplie);

		$copyObj->setNumexp($this->numexp);

		$copyObj->setCodempadm($this->codempadm);

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setCodempeje($this->codempeje);

		$copyObj->setCoduniste($this->coduniste);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setDias($this->dias);

		$copyObj->setFecven($this->fecven);

		$copyObj->setDocane1($this->docane1);

		$copyObj->setDocane2($this->docane2);

		$copyObj->setDocane3($this->docane3);

		$copyObj->setPrepor($this->prepor);

		$copyObj->setCargopre($this->cargopre);

		$copyObj->setLisicactId($this->lisicact_id);

		$copyObj->setDetdecmod($this->detdecmod);

		$copyObj->setAnapor($this->anapor);

		$copyObj->setCargoana($this->cargoana);

		$copyObj->setStatus($this->status);

		$copyObj->setFecdecla($this->fecdecla);

		$copyObj->setPorleg($this->porleg);

		$copyObj->setPortec($this->portec);

		$copyObj->setPorfin($this->porfin);

		$copyObj->setPortot($this->portot);

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
			self::$peer = new LianaempPeer();
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