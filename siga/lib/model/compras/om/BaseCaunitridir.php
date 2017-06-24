<?php


abstract class BaseCaunitridir extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddirec;


	
	protected $fecvig;


	
	protected $canunitri;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getFecvig($format = 'Y-m-d')
  {

    if ($this->fecvig === null || $this->fecvig === '') {
      return null;
    } elseif (!is_int($this->fecvig)) {
            $ts = adodb_strtotime($this->fecvig);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecvig] as date/time value: " . var_export($this->fecvig, true));
      }
    } else {
      $ts = $this->fecvig;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCanunitri()
  {

    return $this->canunitri;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = CaunitridirPeer::CODDIREC;
      }
  
	} 
	
	public function setFecvig($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecvig] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecvig !== $ts) {
      $this->fecvig = $ts;
      $this->modifiedColumns[] = CaunitridirPeer::FECVIG;
    }

	} 
	
	public function setCanunitri($v)
	{

    if ($this->canunitri !== $v) {
        $this->canunitri = $v;
        $this->modifiedColumns[] = CaunitridirPeer::CANUNITRI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CaunitridirPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coddirec = $rs->getString($startcol + 0);

      $this->fecvig = $rs->getDate($startcol + 1, null);

      $this->canunitri = $rs->getInt($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Caunitridir object", $e);
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
			$con = Propel::getConnection(CaunitridirPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaunitridirPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaunitridirPeer::DATABASE_NAME);
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
					$pk = CaunitridirPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CaunitridirPeer::doUpdate($this, $con);
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


			if (($retval = CaunitridirPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaunitridirPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddirec();
				break;
			case 1:
				return $this->getFecvig();
				break;
			case 2:
				return $this->getCanunitri();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaunitridirPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddirec(),
			$keys[1] => $this->getFecvig(),
			$keys[2] => $this->getCanunitri(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaunitridirPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddirec($value);
				break;
			case 1:
				$this->setFecvig($value);
				break;
			case 2:
				$this->setCanunitri($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaunitridirPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddirec($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecvig($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanunitri($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaunitridirPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaunitridirPeer::CODDIREC)) $criteria->add(CaunitridirPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(CaunitridirPeer::FECVIG)) $criteria->add(CaunitridirPeer::FECVIG, $this->fecvig);
		if ($this->isColumnModified(CaunitridirPeer::CANUNITRI)) $criteria->add(CaunitridirPeer::CANUNITRI, $this->canunitri);
		if ($this->isColumnModified(CaunitridirPeer::ID)) $criteria->add(CaunitridirPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaunitridirPeer::DATABASE_NAME);

		$criteria->add(CaunitridirPeer::ID, $this->id);

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

		$copyObj->setCoddirec($this->coddirec);

		$copyObj->setFecvig($this->fecvig);

		$copyObj->setCanunitri($this->canunitri);


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
			self::$peer = new CaunitridirPeer();
		}
		return self::$peer;
	}

} 