<?php


abstract class BaseHccarava extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcar;


	
	protected $codemp;


	
	protected $cedfam;


	
	protected $rifpro;


	
	protected $feccar;


	
	protected $concar;


	
	protected $moncar;


	
	protected $observ;


	
	protected $numpre;


	
	protected $fecpre;


	
	protected $loguse;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcar()
  {

    return trim($this->numcar);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCedfam()
  {

    return trim($this->cedfam);

  }
  
  public function getRifpro()
  {

    return trim($this->rifpro);

  }
  
  public function getFeccar($format = 'Y-m-d H:i:s')
  {

    if ($this->feccar === null || $this->feccar === '') {
      return null;
    } elseif (!is_int($this->feccar)) {
            $ts = adodb_strtotime($this->feccar);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccar] as date/time value: " . var_export($this->feccar, true));
      }
    } else {
      $ts = $this->feccar;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getConcar()
  {

    return trim($this->concar);

  }
  
  public function getMoncar($val=false)
  {

    if($val) return number_format($this->moncar,2,',','.');
    else return $this->moncar;

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getNumpre()
  {

    return trim($this->numpre);

  }
  
  public function getFecpre($format = 'Y-m-d H:i:s')
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

  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcar($v)
	{

    if ($this->numcar !== $v) {
        $this->numcar = $v;
        $this->modifiedColumns[] = HccaravaPeer::NUMCAR;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = HccaravaPeer::CODEMP;
      }
  
	} 
	
	public function setCedfam($v)
	{

    if ($this->cedfam !== $v) {
        $this->cedfam = $v;
        $this->modifiedColumns[] = HccaravaPeer::CEDFAM;
      }
  
	} 
	
	public function setRifpro($v)
	{

    if ($this->rifpro !== $v) {
        $this->rifpro = $v;
        $this->modifiedColumns[] = HccaravaPeer::RIFPRO;
      }
  
	} 
	
	public function setFeccar($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccar] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccar !== $ts) {
      $this->feccar = $ts;
      $this->modifiedColumns[] = HccaravaPeer::FECCAR;
    }

	} 
	
	public function setConcar($v)
	{

    if ($this->concar !== $v) {
        $this->concar = $v;
        $this->modifiedColumns[] = HccaravaPeer::CONCAR;
      }
  
	} 
	
	public function setMoncar($v)
	{

    if ($this->moncar !== $v) {
        $this->moncar = Herramientas::toFloat($v);
        $this->modifiedColumns[] = HccaravaPeer::MONCAR;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = HccaravaPeer::OBSERV;
      }
  
	} 
	
	public function setNumpre($v)
	{

    if ($this->numpre !== $v) {
        $this->numpre = $v;
        $this->modifiedColumns[] = HccaravaPeer::NUMPRE;
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
      $this->modifiedColumns[] = HccaravaPeer::FECPRE;
    }

	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = HccaravaPeer::LOGUSE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = HccaravaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcar = $rs->getString($startcol + 0);

      $this->codemp = $rs->getString($startcol + 1);

      $this->cedfam = $rs->getString($startcol + 2);

      $this->rifpro = $rs->getString($startcol + 3);

      $this->feccar = $rs->getTimestamp($startcol + 4, null);

      $this->concar = $rs->getString($startcol + 5);

      $this->moncar = $rs->getFloat($startcol + 6);

      $this->observ = $rs->getString($startcol + 7);

      $this->numpre = $rs->getString($startcol + 8);

      $this->fecpre = $rs->getTimestamp($startcol + 9, null);

      $this->loguse = $rs->getString($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Hccarava object", $e);
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
			$con = Propel::getConnection(HccaravaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HccaravaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HccaravaPeer::DATABASE_NAME);
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
					$pk = HccaravaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HccaravaPeer::doUpdate($this, $con);
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


			if (($retval = HccaravaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HccaravaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcar();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getCedfam();
				break;
			case 3:
				return $this->getRifpro();
				break;
			case 4:
				return $this->getFeccar();
				break;
			case 5:
				return $this->getConcar();
				break;
			case 6:
				return $this->getMoncar();
				break;
			case 7:
				return $this->getObserv();
				break;
			case 8:
				return $this->getNumpre();
				break;
			case 9:
				return $this->getFecpre();
				break;
			case 10:
				return $this->getLoguse();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HccaravaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcar(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getCedfam(),
			$keys[3] => $this->getRifpro(),
			$keys[4] => $this->getFeccar(),
			$keys[5] => $this->getConcar(),
			$keys[6] => $this->getMoncar(),
			$keys[7] => $this->getObserv(),
			$keys[8] => $this->getNumpre(),
			$keys[9] => $this->getFecpre(),
			$keys[10] => $this->getLoguse(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HccaravaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcar($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setCedfam($value);
				break;
			case 3:
				$this->setRifpro($value);
				break;
			case 4:
				$this->setFeccar($value);
				break;
			case 5:
				$this->setConcar($value);
				break;
			case 6:
				$this->setMoncar($value);
				break;
			case 7:
				$this->setObserv($value);
				break;
			case 8:
				$this->setNumpre($value);
				break;
			case 9:
				$this->setFecpre($value);
				break;
			case 10:
				$this->setLoguse($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HccaravaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedfam($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRifpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFeccar($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setConcar($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMoncar($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setObserv($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumpre($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecpre($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setLoguse($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HccaravaPeer::DATABASE_NAME);

		if ($this->isColumnModified(HccaravaPeer::NUMCAR)) $criteria->add(HccaravaPeer::NUMCAR, $this->numcar);
		if ($this->isColumnModified(HccaravaPeer::CODEMP)) $criteria->add(HccaravaPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(HccaravaPeer::CEDFAM)) $criteria->add(HccaravaPeer::CEDFAM, $this->cedfam);
		if ($this->isColumnModified(HccaravaPeer::RIFPRO)) $criteria->add(HccaravaPeer::RIFPRO, $this->rifpro);
		if ($this->isColumnModified(HccaravaPeer::FECCAR)) $criteria->add(HccaravaPeer::FECCAR, $this->feccar);
		if ($this->isColumnModified(HccaravaPeer::CONCAR)) $criteria->add(HccaravaPeer::CONCAR, $this->concar);
		if ($this->isColumnModified(HccaravaPeer::MONCAR)) $criteria->add(HccaravaPeer::MONCAR, $this->moncar);
		if ($this->isColumnModified(HccaravaPeer::OBSERV)) $criteria->add(HccaravaPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(HccaravaPeer::NUMPRE)) $criteria->add(HccaravaPeer::NUMPRE, $this->numpre);
		if ($this->isColumnModified(HccaravaPeer::FECPRE)) $criteria->add(HccaravaPeer::FECPRE, $this->fecpre);
		if ($this->isColumnModified(HccaravaPeer::LOGUSE)) $criteria->add(HccaravaPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(HccaravaPeer::ID)) $criteria->add(HccaravaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HccaravaPeer::DATABASE_NAME);

		$criteria->add(HccaravaPeer::ID, $this->id);

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

		$copyObj->setNumcar($this->numcar);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCedfam($this->cedfam);

		$copyObj->setRifpro($this->rifpro);

		$copyObj->setFeccar($this->feccar);

		$copyObj->setConcar($this->concar);

		$copyObj->setMoncar($this->moncar);

		$copyObj->setObserv($this->observ);

		$copyObj->setNumpre($this->numpre);

		$copyObj->setFecpre($this->fecpre);

		$copyObj->setLoguse($this->loguse);


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
			self::$peer = new HccaravaPeer();
		}
		return self::$peer;
	}

} 