<?php


abstract class BaseFatartra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reftar;


	
	protected $fectar;


	
	protected $reford;


	
	protected $codemp;


	
	protected $destar;


	
	protected $areres;


	
	protected $diacul;


	
	protected $reapor;


	
	protected $aprordtra = 'N';


	
	protected $usuaprord;


	
	protected $fecaprord;


	
	protected $obsaprord;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReftar()
  {

    return trim($this->reftar);

  }
  
  public function getFectar($format = 'Y-m-d')
  {

    if ($this->fectar === null || $this->fectar === '') {
      return null;
    } elseif (!is_int($this->fectar)) {
            $ts = adodb_strtotime($this->fectar);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fectar] as date/time value: " . var_export($this->fectar, true));
      }
    } else {
      $ts = $this->fectar;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getReford()
  {

    return trim($this->reford);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getDestar()
  {

    return trim($this->destar);

  }
  
  public function getAreres()
  {

    return trim($this->areres);

  }
  
  public function getDiacul()
  {

    return $this->diacul;

  }
  
  public function getReapor()
  {

    return trim($this->reapor);

  }
  
  public function getAprordtra()
  {

    return trim($this->aprordtra);

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

  
  public function getObsaprord()
  {

    return trim($this->obsaprord);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReftar($v)
	{

    if ($this->reftar !== $v) {
        $this->reftar = $v;
        $this->modifiedColumns[] = FatartraPeer::REFTAR;
      }
  
	} 
	
	public function setFectar($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fectar] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fectar !== $ts) {
      $this->fectar = $ts;
      $this->modifiedColumns[] = FatartraPeer::FECTAR;
    }

	} 
	
	public function setReford($v)
	{

    if ($this->reford !== $v) {
        $this->reford = $v;
        $this->modifiedColumns[] = FatartraPeer::REFORD;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = FatartraPeer::CODEMP;
      }
  
	} 
	
	public function setDestar($v)
	{

    if ($this->destar !== $v) {
        $this->destar = $v;
        $this->modifiedColumns[] = FatartraPeer::DESTAR;
      }
  
	} 
	
	public function setAreres($v)
	{

    if ($this->areres !== $v) {
        $this->areres = $v;
        $this->modifiedColumns[] = FatartraPeer::ARERES;
      }
  
	} 
	
	public function setDiacul($v)
	{

    if ($this->diacul !== $v) {
        $this->diacul = $v;
        $this->modifiedColumns[] = FatartraPeer::DIACUL;
      }
  
	} 
	
	public function setReapor($v)
	{

    if ($this->reapor !== $v) {
        $this->reapor = $v;
        $this->modifiedColumns[] = FatartraPeer::REAPOR;
      }
  
	} 
	
	public function setAprordtra($v)
	{

    if ($this->aprordtra !== $v || $v === 'N') {
        $this->aprordtra = $v;
        $this->modifiedColumns[] = FatartraPeer::APRORDTRA;
      }
  
	} 
	
	public function setUsuaprord($v)
	{

    if ($this->usuaprord !== $v) {
        $this->usuaprord = $v;
        $this->modifiedColumns[] = FatartraPeer::USUAPRORD;
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
      $this->modifiedColumns[] = FatartraPeer::FECAPRORD;
    }

	} 
	
	public function setObsaprord($v)
	{

    if ($this->obsaprord !== $v) {
        $this->obsaprord = $v;
        $this->modifiedColumns[] = FatartraPeer::OBSAPRORD;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FatartraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reftar = $rs->getString($startcol + 0);

      $this->fectar = $rs->getDate($startcol + 1, null);

      $this->reford = $rs->getString($startcol + 2);

      $this->codemp = $rs->getString($startcol + 3);

      $this->destar = $rs->getString($startcol + 4);

      $this->areres = $rs->getString($startcol + 5);

      $this->diacul = $rs->getInt($startcol + 6);

      $this->reapor = $rs->getString($startcol + 7);

      $this->aprordtra = $rs->getString($startcol + 8);

      $this->usuaprord = $rs->getString($startcol + 9);

      $this->fecaprord = $rs->getDate($startcol + 10, null);

      $this->obsaprord = $rs->getString($startcol + 11);

      $this->id = $rs->getInt($startcol + 12);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 13; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fatartra object", $e);
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
			$con = Propel::getConnection(FatartraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FatartraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FatartraPeer::DATABASE_NAME);
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
					$pk = FatartraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FatartraPeer::doUpdate($this, $con);
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


			if (($retval = FatartraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FatartraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReftar();
				break;
			case 1:
				return $this->getFectar();
				break;
			case 2:
				return $this->getReford();
				break;
			case 3:
				return $this->getCodemp();
				break;
			case 4:
				return $this->getDestar();
				break;
			case 5:
				return $this->getAreres();
				break;
			case 6:
				return $this->getDiacul();
				break;
			case 7:
				return $this->getReapor();
				break;
			case 8:
				return $this->getAprordtra();
				break;
			case 9:
				return $this->getUsuaprord();
				break;
			case 10:
				return $this->getFecaprord();
				break;
			case 11:
				return $this->getObsaprord();
				break;
			case 12:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FatartraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReftar(),
			$keys[1] => $this->getFectar(),
			$keys[2] => $this->getReford(),
			$keys[3] => $this->getCodemp(),
			$keys[4] => $this->getDestar(),
			$keys[5] => $this->getAreres(),
			$keys[6] => $this->getDiacul(),
			$keys[7] => $this->getReapor(),
			$keys[8] => $this->getAprordtra(),
			$keys[9] => $this->getUsuaprord(),
			$keys[10] => $this->getFecaprord(),
			$keys[11] => $this->getObsaprord(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FatartraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReftar($value);
				break;
			case 1:
				$this->setFectar($value);
				break;
			case 2:
				$this->setReford($value);
				break;
			case 3:
				$this->setCodemp($value);
				break;
			case 4:
				$this->setDestar($value);
				break;
			case 5:
				$this->setAreres($value);
				break;
			case 6:
				$this->setDiacul($value);
				break;
			case 7:
				$this->setReapor($value);
				break;
			case 8:
				$this->setAprordtra($value);
				break;
			case 9:
				$this->setUsuaprord($value);
				break;
			case 10:
				$this->setFecaprord($value);
				break;
			case 11:
				$this->setObsaprord($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FatartraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReftar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFectar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setReford($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDestar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAreres($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDiacul($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setReapor($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAprordtra($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUsuaprord($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecaprord($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setObsaprord($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FatartraPeer::DATABASE_NAME);

		if ($this->isColumnModified(FatartraPeer::REFTAR)) $criteria->add(FatartraPeer::REFTAR, $this->reftar);
		if ($this->isColumnModified(FatartraPeer::FECTAR)) $criteria->add(FatartraPeer::FECTAR, $this->fectar);
		if ($this->isColumnModified(FatartraPeer::REFORD)) $criteria->add(FatartraPeer::REFORD, $this->reford);
		if ($this->isColumnModified(FatartraPeer::CODEMP)) $criteria->add(FatartraPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(FatartraPeer::DESTAR)) $criteria->add(FatartraPeer::DESTAR, $this->destar);
		if ($this->isColumnModified(FatartraPeer::ARERES)) $criteria->add(FatartraPeer::ARERES, $this->areres);
		if ($this->isColumnModified(FatartraPeer::DIACUL)) $criteria->add(FatartraPeer::DIACUL, $this->diacul);
		if ($this->isColumnModified(FatartraPeer::REAPOR)) $criteria->add(FatartraPeer::REAPOR, $this->reapor);
		if ($this->isColumnModified(FatartraPeer::APRORDTRA)) $criteria->add(FatartraPeer::APRORDTRA, $this->aprordtra);
		if ($this->isColumnModified(FatartraPeer::USUAPRORD)) $criteria->add(FatartraPeer::USUAPRORD, $this->usuaprord);
		if ($this->isColumnModified(FatartraPeer::FECAPRORD)) $criteria->add(FatartraPeer::FECAPRORD, $this->fecaprord);
		if ($this->isColumnModified(FatartraPeer::OBSAPRORD)) $criteria->add(FatartraPeer::OBSAPRORD, $this->obsaprord);
		if ($this->isColumnModified(FatartraPeer::ID)) $criteria->add(FatartraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FatartraPeer::DATABASE_NAME);

		$criteria->add(FatartraPeer::ID, $this->id);

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

		$copyObj->setReftar($this->reftar);

		$copyObj->setFectar($this->fectar);

		$copyObj->setReford($this->reford);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setDestar($this->destar);

		$copyObj->setAreres($this->areres);

		$copyObj->setDiacul($this->diacul);

		$copyObj->setReapor($this->reapor);

		$copyObj->setAprordtra($this->aprordtra);

		$copyObj->setUsuaprord($this->usuaprord);

		$copyObj->setFecaprord($this->fecaprord);

		$copyObj->setObsaprord($this->obsaprord);


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
			self::$peer = new FatartraPeer();
		}
		return self::$peer;
	}

} 