<?php


abstract class BaseCiliqing extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refliq;


	
	protected $fecliq;


	
	protected $desliq;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefliq()
  {

    return trim($this->refliq);

  }
  
  public function getFecliq($format = 'Y-m-d')
  {

    if ($this->fecliq === null || $this->fecliq === '') {
      return null;
    } elseif (!is_int($this->fecliq)) {
            $ts = adodb_strtotime($this->fecliq);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecliq] as date/time value: " . var_export($this->fecliq, true));
      }
    } else {
      $ts = $this->fecliq;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesliq()
  {

    return trim($this->desliq);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefliq($v)
	{

    if ($this->refliq !== $v) {
        $this->refliq = $v;
        $this->modifiedColumns[] = CiliqingPeer::REFLIQ;
      }
  
	} 
	
	public function setFecliq($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecliq] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecliq !== $ts) {
      $this->fecliq = $ts;
      $this->modifiedColumns[] = CiliqingPeer::FECLIQ;
    }

	} 
	
	public function setDesliq($v)
	{

    if ($this->desliq !== $v) {
        $this->desliq = $v;
        $this->modifiedColumns[] = CiliqingPeer::DESLIQ;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CiliqingPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refliq = $rs->getString($startcol + 0);

      $this->fecliq = $rs->getDate($startcol + 1, null);

      $this->desliq = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ciliqing object", $e);
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

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CiliqingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CiliqingPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CiliqingPeer::DATABASE_NAME);
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
					$pk = CiliqingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CiliqingPeer::doUpdate($this, $con);
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


			if (($retval = CiliqingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CiliqingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefliq();
				break;
			case 1:
				return $this->getFecliq();
				break;
			case 2:
				return $this->getDesliq();
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
		$keys = CiliqingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefliq(),
			$keys[1] => $this->getFecliq(),
			$keys[2] => $this->getDesliq(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CiliqingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefliq($value);
				break;
			case 1:
				$this->setFecliq($value);
				break;
			case 2:
				$this->setDesliq($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CiliqingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefliq($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecliq($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesliq($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CiliqingPeer::DATABASE_NAME);

		if ($this->isColumnModified(CiliqingPeer::REFLIQ)) $criteria->add(CiliqingPeer::REFLIQ, $this->refliq);
		if ($this->isColumnModified(CiliqingPeer::FECLIQ)) $criteria->add(CiliqingPeer::FECLIQ, $this->fecliq);
		if ($this->isColumnModified(CiliqingPeer::DESLIQ)) $criteria->add(CiliqingPeer::DESLIQ, $this->desliq);
		if ($this->isColumnModified(CiliqingPeer::ID)) $criteria->add(CiliqingPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CiliqingPeer::DATABASE_NAME);

		$criteria->add(CiliqingPeer::ID, $this->id);

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

		$copyObj->setRefliq($this->refliq);

		$copyObj->setFecliq($this->fecliq);

		$copyObj->setDesliq($this->desliq);


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
			self::$peer = new CiliqingPeer();
		}
		return self::$peer;
	}

} 