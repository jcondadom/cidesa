<?php


abstract class BaseCasolcot extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsolcot;


	
	protected $fecsolcot;


	
	protected $reqart;


	
	protected $dessolcot;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsolcot()
  {

    return trim($this->numsolcot);

  }
  
  public function getFecsolcot($format = 'Y-m-d')
  {

    if ($this->fecsolcot === null || $this->fecsolcot === '') {
      return null;
    } elseif (!is_int($this->fecsolcot)) {
            $ts = adodb_strtotime($this->fecsolcot);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsolcot] as date/time value: " . var_export($this->fecsolcot, true));
      }
    } else {
      $ts = $this->fecsolcot;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getReqart()
  {

    return trim($this->reqart);

  }
  
  public function getDessolcot()
  {

    return trim($this->dessolcot);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsolcot($v)
	{

    if ($this->numsolcot !== $v) {
        $this->numsolcot = $v;
        $this->modifiedColumns[] = CasolcotPeer::NUMSOLCOT;
      }
  
	} 
	
	public function setFecsolcot($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsolcot] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsolcot !== $ts) {
      $this->fecsolcot = $ts;
      $this->modifiedColumns[] = CasolcotPeer::FECSOLCOT;
    }

	} 
	
	public function setReqart($v)
	{

    if ($this->reqart !== $v) {
        $this->reqart = $v;
        $this->modifiedColumns[] = CasolcotPeer::REQART;
      }
  
	} 
	
	public function setDessolcot($v)
	{

    if ($this->dessolcot !== $v) {
        $this->dessolcot = $v;
        $this->modifiedColumns[] = CasolcotPeer::DESSOLCOT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CasolcotPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsolcot = $rs->getString($startcol + 0);

      $this->fecsolcot = $rs->getDate($startcol + 1, null);

      $this->reqart = $rs->getString($startcol + 2);

      $this->dessolcot = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Casolcot object", $e);
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
			$con = Propel::getConnection(CasolcotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CasolcotPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CasolcotPeer::DATABASE_NAME);
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
					$pk = CasolcotPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CasolcotPeer::doUpdate($this, $con);
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


			if (($retval = CasolcotPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CasolcotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsolcot();
				break;
			case 1:
				return $this->getFecsolcot();
				break;
			case 2:
				return $this->getReqart();
				break;
			case 3:
				return $this->getDessolcot();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CasolcotPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsolcot(),
			$keys[1] => $this->getFecsolcot(),
			$keys[2] => $this->getReqart(),
			$keys[3] => $this->getDessolcot(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CasolcotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsolcot($value);
				break;
			case 1:
				$this->setFecsolcot($value);
				break;
			case 2:
				$this->setReqart($value);
				break;
			case 3:
				$this->setDessolcot($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CasolcotPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsolcot($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecsolcot($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setReqart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDessolcot($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CasolcotPeer::DATABASE_NAME);

		if ($this->isColumnModified(CasolcotPeer::NUMSOLCOT)) $criteria->add(CasolcotPeer::NUMSOLCOT, $this->numsolcot);
		if ($this->isColumnModified(CasolcotPeer::FECSOLCOT)) $criteria->add(CasolcotPeer::FECSOLCOT, $this->fecsolcot);
		if ($this->isColumnModified(CasolcotPeer::REQART)) $criteria->add(CasolcotPeer::REQART, $this->reqart);
		if ($this->isColumnModified(CasolcotPeer::DESSOLCOT)) $criteria->add(CasolcotPeer::DESSOLCOT, $this->dessolcot);
		if ($this->isColumnModified(CasolcotPeer::ID)) $criteria->add(CasolcotPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CasolcotPeer::DATABASE_NAME);

		$criteria->add(CasolcotPeer::ID, $this->id);

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

		$copyObj->setNumsolcot($this->numsolcot);

		$copyObj->setFecsolcot($this->fecsolcot);

		$copyObj->setReqart($this->reqart);

		$copyObj->setDessolcot($this->dessolcot);


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
			self::$peer = new CasolcotPeer();
		}
		return self::$peer;
	}

} 