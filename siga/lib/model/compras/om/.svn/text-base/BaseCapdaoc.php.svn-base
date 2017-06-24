<?php


abstract class BaseCapdaoc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpda;


	
	protected $fecpda;


	
	protected $despda;


	
	protected $monpda;


	
	protected $stapad;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefpda()
  {

    return trim($this->refpda);

  }
  
  public function getFecpda($format = 'Y-m-d')
  {

    if ($this->fecpda === null || $this->fecpda === '') {
      return null;
    } elseif (!is_int($this->fecpda)) {
            $ts = adodb_strtotime($this->fecpda);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpda] as date/time value: " . var_export($this->fecpda, true));
      }
    } else {
      $ts = $this->fecpda;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDespda()
  {

    return trim($this->despda);

  }
  
  public function getMonpda($val=false)
  {

    if($val) return number_format($this->monpda,2,',','.');
    else return $this->monpda;

  }
  
  public function getStapad()
  {

    return trim($this->stapad);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefpda($v)
	{

    if ($this->refpda !== $v) {
        $this->refpda = $v;
        $this->modifiedColumns[] = CapdaocPeer::REFPDA;
      }
  
	} 
	
	public function setFecpda($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpda] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpda !== $ts) {
      $this->fecpda = $ts;
      $this->modifiedColumns[] = CapdaocPeer::FECPDA;
    }

	} 
	
	public function setDespda($v)
	{

    if ($this->despda !== $v) {
        $this->despda = $v;
        $this->modifiedColumns[] = CapdaocPeer::DESPDA;
      }
  
	} 
	
	public function setMonpda($v)
	{

    if ($this->monpda !== $v) {
        $this->monpda = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CapdaocPeer::MONPDA;
      }
  
	} 
	
	public function setStapad($v)
	{

    if ($this->stapad !== $v) {
        $this->stapad = $v;
        $this->modifiedColumns[] = CapdaocPeer::STAPAD;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CapdaocPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refpda = $rs->getString($startcol + 0);

      $this->fecpda = $rs->getDate($startcol + 1, null);

      $this->despda = $rs->getString($startcol + 2);

      $this->monpda = $rs->getFloat($startcol + 3);

      $this->stapad = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Capdaoc object", $e);
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
			$con = Propel::getConnection(CapdaocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CapdaocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CapdaocPeer::DATABASE_NAME);
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
					$pk = CapdaocPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CapdaocPeer::doUpdate($this, $con);
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


			if (($retval = CapdaocPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CapdaocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefpda();
				break;
			case 1:
				return $this->getFecpda();
				break;
			case 2:
				return $this->getDespda();
				break;
			case 3:
				return $this->getMonpda();
				break;
			case 4:
				return $this->getStapad();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CapdaocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpda(),
			$keys[1] => $this->getFecpda(),
			$keys[2] => $this->getDespda(),
			$keys[3] => $this->getMonpda(),
			$keys[4] => $this->getStapad(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CapdaocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefpda($value);
				break;
			case 1:
				$this->setFecpda($value);
				break;
			case 2:
				$this->setDespda($value);
				break;
			case 3:
				$this->setMonpda($value);
				break;
			case 4:
				$this->setStapad($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CapdaocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpda($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecpda($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDespda($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonpda($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStapad($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CapdaocPeer::DATABASE_NAME);

		if ($this->isColumnModified(CapdaocPeer::REFPDA)) $criteria->add(CapdaocPeer::REFPDA, $this->refpda);
		if ($this->isColumnModified(CapdaocPeer::FECPDA)) $criteria->add(CapdaocPeer::FECPDA, $this->fecpda);
		if ($this->isColumnModified(CapdaocPeer::DESPDA)) $criteria->add(CapdaocPeer::DESPDA, $this->despda);
		if ($this->isColumnModified(CapdaocPeer::MONPDA)) $criteria->add(CapdaocPeer::MONPDA, $this->monpda);
		if ($this->isColumnModified(CapdaocPeer::STAPAD)) $criteria->add(CapdaocPeer::STAPAD, $this->stapad);
		if ($this->isColumnModified(CapdaocPeer::ID)) $criteria->add(CapdaocPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CapdaocPeer::DATABASE_NAME);

		$criteria->add(CapdaocPeer::ID, $this->id);

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

		$copyObj->setRefpda($this->refpda);

		$copyObj->setFecpda($this->fecpda);

		$copyObj->setDespda($this->despda);

		$copyObj->setMonpda($this->monpda);

		$copyObj->setStapad($this->stapad);


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
			self::$peer = new CapdaocPeer();
		}
		return self::$peer;
	}

} 