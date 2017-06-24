<?php


abstract class BaseCaentpda extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ordcom;


	
	protected $codart;


	
	protected $desart;


	
	protected $canart;


	
	protected $fecent;


	
	protected $tiptra;


	
	protected $dirori;


	
	protected $observ;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getOrdcom()
  {

    return trim($this->ordcom);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getDesart()
  {

    return trim($this->desart);

  }
  
  public function getCanart($val=false)
  {

    if($val) return number_format($this->canart,2,',','.');
    else return $this->canart;

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

  
  public function getTiptra()
  {

    return trim($this->tiptra);

  }
  
  public function getDirori()
  {

    return trim($this->dirori);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setOrdcom($v)
	{

    if ($this->ordcom !== $v) {
        $this->ordcom = $v;
        $this->modifiedColumns[] = CaentpdaPeer::ORDCOM;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CaentpdaPeer::CODART;
      }
  
	} 
	
	public function setDesart($v)
	{

    if ($this->desart !== $v) {
        $this->desart = $v;
        $this->modifiedColumns[] = CaentpdaPeer::DESART;
      }
  
	} 
	
	public function setCanart($v)
	{

    if ($this->canart !== $v) {
        $this->canart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaentpdaPeer::CANART;
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
      $this->modifiedColumns[] = CaentpdaPeer::FECENT;
    }

	} 
	
	public function setTiptra($v)
	{

    if ($this->tiptra !== $v) {
        $this->tiptra = $v;
        $this->modifiedColumns[] = CaentpdaPeer::TIPTRA;
      }
  
	} 
	
	public function setDirori($v)
	{

    if ($this->dirori !== $v) {
        $this->dirori = $v;
        $this->modifiedColumns[] = CaentpdaPeer::DIRORI;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CaentpdaPeer::OBSERV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CaentpdaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->ordcom = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->desart = $rs->getString($startcol + 2);

      $this->canart = $rs->getFloat($startcol + 3);

      $this->fecent = $rs->getDate($startcol + 4, null);

      $this->tiptra = $rs->getString($startcol + 5);

      $this->dirori = $rs->getString($startcol + 6);

      $this->observ = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Caentpda object", $e);
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
			$con = Propel::getConnection(CaentpdaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaentpdaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaentpdaPeer::DATABASE_NAME);
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
					$pk = CaentpdaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CaentpdaPeer::doUpdate($this, $con);
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


			if (($retval = CaentpdaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaentpdaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getOrdcom();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getDesart();
				break;
			case 3:
				return $this->getCanart();
				break;
			case 4:
				return $this->getFecent();
				break;
			case 5:
				return $this->getTiptra();
				break;
			case 6:
				return $this->getDirori();
				break;
			case 7:
				return $this->getObserv();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaentpdaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOrdcom(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getDesart(),
			$keys[3] => $this->getCanart(),
			$keys[4] => $this->getFecent(),
			$keys[5] => $this->getTiptra(),
			$keys[6] => $this->getDirori(),
			$keys[7] => $this->getObserv(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaentpdaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setOrdcom($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setDesart($value);
				break;
			case 3:
				$this->setCanart($value);
				break;
			case 4:
				$this->setFecent($value);
				break;
			case 5:
				$this->setTiptra($value);
				break;
			case 6:
				$this->setDirori($value);
				break;
			case 7:
				$this->setObserv($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaentpdaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOrdcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanart($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecent($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTiptra($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDirori($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setObserv($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaentpdaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaentpdaPeer::ORDCOM)) $criteria->add(CaentpdaPeer::ORDCOM, $this->ordcom);
		if ($this->isColumnModified(CaentpdaPeer::CODART)) $criteria->add(CaentpdaPeer::CODART, $this->codart);
		if ($this->isColumnModified(CaentpdaPeer::DESART)) $criteria->add(CaentpdaPeer::DESART, $this->desart);
		if ($this->isColumnModified(CaentpdaPeer::CANART)) $criteria->add(CaentpdaPeer::CANART, $this->canart);
		if ($this->isColumnModified(CaentpdaPeer::FECENT)) $criteria->add(CaentpdaPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(CaentpdaPeer::TIPTRA)) $criteria->add(CaentpdaPeer::TIPTRA, $this->tiptra);
		if ($this->isColumnModified(CaentpdaPeer::DIRORI)) $criteria->add(CaentpdaPeer::DIRORI, $this->dirori);
		if ($this->isColumnModified(CaentpdaPeer::OBSERV)) $criteria->add(CaentpdaPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CaentpdaPeer::ID)) $criteria->add(CaentpdaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaentpdaPeer::DATABASE_NAME);

		$criteria->add(CaentpdaPeer::ID, $this->id);

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

		$copyObj->setOrdcom($this->ordcom);

		$copyObj->setCodart($this->codart);

		$copyObj->setDesart($this->desart);

		$copyObj->setCanart($this->canart);

		$copyObj->setFecent($this->fecent);

		$copyObj->setTiptra($this->tiptra);

		$copyObj->setDirori($this->dirori);

		$copyObj->setObserv($this->observ);


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
			self::$peer = new CaentpdaPeer();
		}
		return self::$peer;
	}

} 