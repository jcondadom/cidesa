<?php


abstract class BaseHcexacon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nomcontra;


	
	protected $refexacon;


	
	protected $tipexacon;


	
	protected $fecexacon;


	
	protected $codemp;


	
	protected $cedfam;


	
	protected $codmedlab;


	
	protected $traexacon;


	
	protected $notexacon;


	
	protected $durexacon;


	
	protected $loguse;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNomcontra()
  {

    return trim($this->nomcontra);

  }
  
  public function getRefexacon()
  {

    return trim($this->refexacon);

  }
  
  public function getTipexacon()
  {

    return trim($this->tipexacon);

  }
  
  public function getFecexacon($format = 'Y-m-d H:i:s')
  {

    if ($this->fecexacon === null || $this->fecexacon === '') {
      return null;
    } elseif (!is_int($this->fecexacon)) {
            $ts = adodb_strtotime($this->fecexacon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecexacon] as date/time value: " . var_export($this->fecexacon, true));
      }
    } else {
      $ts = $this->fecexacon;
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
  
  public function getCedfam()
  {

    return trim($this->cedfam);

  }
  
  public function getCodmedlab()
  {

    return trim($this->codmedlab);

  }
  
  public function getTraexacon()
  {

    return trim($this->traexacon);

  }
  
  public function getNotexacon()
  {

    return trim($this->notexacon);

  }
  
  public function getDurexacon()
  {

    return trim($this->durexacon);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNomcontra($v)
	{

    if ($this->nomcontra !== $v) {
        $this->nomcontra = $v;
        $this->modifiedColumns[] = HcexaconPeer::NOMCONTRA;
      }
  
	} 
	
	public function setRefexacon($v)
	{

    if ($this->refexacon !== $v) {
        $this->refexacon = $v;
        $this->modifiedColumns[] = HcexaconPeer::REFEXACON;
      }
  
	} 
	
	public function setTipexacon($v)
	{

    if ($this->tipexacon !== $v) {
        $this->tipexacon = $v;
        $this->modifiedColumns[] = HcexaconPeer::TIPEXACON;
      }
  
	} 
	
	public function setFecexacon($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecexacon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecexacon !== $ts) {
      $this->fecexacon = $ts;
      $this->modifiedColumns[] = HcexaconPeer::FECEXACON;
    }

	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = HcexaconPeer::CODEMP;
      }
  
	} 
	
	public function setCedfam($v)
	{

    if ($this->cedfam !== $v) {
        $this->cedfam = $v;
        $this->modifiedColumns[] = HcexaconPeer::CEDFAM;
      }
  
	} 
	
	public function setCodmedlab($v)
	{

    if ($this->codmedlab !== $v) {
        $this->codmedlab = $v;
        $this->modifiedColumns[] = HcexaconPeer::CODMEDLAB;
      }
  
	} 
	
	public function setTraexacon($v)
	{

    if ($this->traexacon !== $v) {
        $this->traexacon = $v;
        $this->modifiedColumns[] = HcexaconPeer::TRAEXACON;
      }
  
	} 
	
	public function setNotexacon($v)
	{

    if ($this->notexacon !== $v) {
        $this->notexacon = $v;
        $this->modifiedColumns[] = HcexaconPeer::NOTEXACON;
      }
  
	} 
	
	public function setDurexacon($v)
	{

    if ($this->durexacon !== $v) {
        $this->durexacon = $v;
        $this->modifiedColumns[] = HcexaconPeer::DUREXACON;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = HcexaconPeer::LOGUSE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = HcexaconPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nomcontra = $rs->getString($startcol + 0);

      $this->refexacon = $rs->getString($startcol + 1);

      $this->tipexacon = $rs->getString($startcol + 2);

      $this->fecexacon = $rs->getTimestamp($startcol + 3, null);

      $this->codemp = $rs->getString($startcol + 4);

      $this->cedfam = $rs->getString($startcol + 5);

      $this->codmedlab = $rs->getString($startcol + 6);

      $this->traexacon = $rs->getString($startcol + 7);

      $this->notexacon = $rs->getString($startcol + 8);

      $this->durexacon = $rs->getString($startcol + 9);

      $this->loguse = $rs->getString($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Hcexacon object", $e);
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
			$con = Propel::getConnection(HcexaconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HcexaconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HcexaconPeer::DATABASE_NAME);
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
					$pk = HcexaconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HcexaconPeer::doUpdate($this, $con);
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


			if (($retval = HcexaconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HcexaconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNomcontra();
				break;
			case 1:
				return $this->getRefexacon();
				break;
			case 2:
				return $this->getTipexacon();
				break;
			case 3:
				return $this->getFecexacon();
				break;
			case 4:
				return $this->getCodemp();
				break;
			case 5:
				return $this->getCedfam();
				break;
			case 6:
				return $this->getCodmedlab();
				break;
			case 7:
				return $this->getTraexacon();
				break;
			case 8:
				return $this->getNotexacon();
				break;
			case 9:
				return $this->getDurexacon();
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
		$keys = HcexaconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNomcontra(),
			$keys[1] => $this->getRefexacon(),
			$keys[2] => $this->getTipexacon(),
			$keys[3] => $this->getFecexacon(),
			$keys[4] => $this->getCodemp(),
			$keys[5] => $this->getCedfam(),
			$keys[6] => $this->getCodmedlab(),
			$keys[7] => $this->getTraexacon(),
			$keys[8] => $this->getNotexacon(),
			$keys[9] => $this->getDurexacon(),
			$keys[10] => $this->getLoguse(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HcexaconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNomcontra($value);
				break;
			case 1:
				$this->setRefexacon($value);
				break;
			case 2:
				$this->setTipexacon($value);
				break;
			case 3:
				$this->setFecexacon($value);
				break;
			case 4:
				$this->setCodemp($value);
				break;
			case 5:
				$this->setCedfam($value);
				break;
			case 6:
				$this->setCodmedlab($value);
				break;
			case 7:
				$this->setTraexacon($value);
				break;
			case 8:
				$this->setNotexacon($value);
				break;
			case 9:
				$this->setDurexacon($value);
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
		$keys = HcexaconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNomcontra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRefexacon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipexacon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecexacon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCedfam($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodmedlab($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTraexacon($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNotexacon($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDurexacon($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setLoguse($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HcexaconPeer::DATABASE_NAME);

		if ($this->isColumnModified(HcexaconPeer::NOMCONTRA)) $criteria->add(HcexaconPeer::NOMCONTRA, $this->nomcontra);
		if ($this->isColumnModified(HcexaconPeer::REFEXACON)) $criteria->add(HcexaconPeer::REFEXACON, $this->refexacon);
		if ($this->isColumnModified(HcexaconPeer::TIPEXACON)) $criteria->add(HcexaconPeer::TIPEXACON, $this->tipexacon);
		if ($this->isColumnModified(HcexaconPeer::FECEXACON)) $criteria->add(HcexaconPeer::FECEXACON, $this->fecexacon);
		if ($this->isColumnModified(HcexaconPeer::CODEMP)) $criteria->add(HcexaconPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(HcexaconPeer::CEDFAM)) $criteria->add(HcexaconPeer::CEDFAM, $this->cedfam);
		if ($this->isColumnModified(HcexaconPeer::CODMEDLAB)) $criteria->add(HcexaconPeer::CODMEDLAB, $this->codmedlab);
		if ($this->isColumnModified(HcexaconPeer::TRAEXACON)) $criteria->add(HcexaconPeer::TRAEXACON, $this->traexacon);
		if ($this->isColumnModified(HcexaconPeer::NOTEXACON)) $criteria->add(HcexaconPeer::NOTEXACON, $this->notexacon);
		if ($this->isColumnModified(HcexaconPeer::DUREXACON)) $criteria->add(HcexaconPeer::DUREXACON, $this->durexacon);
		if ($this->isColumnModified(HcexaconPeer::LOGUSE)) $criteria->add(HcexaconPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(HcexaconPeer::ID)) $criteria->add(HcexaconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HcexaconPeer::DATABASE_NAME);

		$criteria->add(HcexaconPeer::ID, $this->id);

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

		$copyObj->setNomcontra($this->nomcontra);

		$copyObj->setRefexacon($this->refexacon);

		$copyObj->setTipexacon($this->tipexacon);

		$copyObj->setFecexacon($this->fecexacon);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCedfam($this->cedfam);

		$copyObj->setCodmedlab($this->codmedlab);

		$copyObj->setTraexacon($this->traexacon);

		$copyObj->setNotexacon($this->notexacon);

		$copyObj->setDurexacon($this->durexacon);

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
			self::$peer = new HcexaconPeer();
		}
		return self::$peer;
	}

} 