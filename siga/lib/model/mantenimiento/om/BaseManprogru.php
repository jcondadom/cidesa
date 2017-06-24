<?php


abstract class BaseManprogru extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codgru;


	
	protected $fecini;


	
	protected $candia;


	
	protected $fecult;


	
	protected $fecprx;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodgru()
  {

    return trim($this->codgru);

  }
  
  public function getFecini($format = 'Y-m-d')
  {

    if ($this->fecini === null || $this->fecini === '') {
      return null;
    } elseif (!is_int($this->fecini)) {
            $ts = adodb_strtotime($this->fecini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
      }
    } else {
      $ts = $this->fecini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCandia()
  {

    return $this->candia;

  }
  
  public function getFecult($format = 'Y-m-d')
  {

    if ($this->fecult === null || $this->fecult === '') {
      return null;
    } elseif (!is_int($this->fecult)) {
            $ts = adodb_strtotime($this->fecult);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecult] as date/time value: " . var_export($this->fecult, true));
      }
    } else {
      $ts = $this->fecult;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecprx($format = 'Y-m-d')
  {

    if ($this->fecprx === null || $this->fecprx === '') {
      return null;
    } elseif (!is_int($this->fecprx)) {
            $ts = adodb_strtotime($this->fecprx);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecprx] as date/time value: " . var_export($this->fecprx, true));
      }
    } else {
      $ts = $this->fecprx;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodgru($v)
	{

    if ($this->codgru !== $v) {
        $this->codgru = $v;
        $this->modifiedColumns[] = ManprogruPeer::CODGRU;
      }
  
	} 
	
	public function setFecini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = ManprogruPeer::FECINI;
    }

	} 
	
	public function setCandia($v)
	{

    if ($this->candia !== $v) {
        $this->candia = $v;
        $this->modifiedColumns[] = ManprogruPeer::CANDIA;
      }
  
	} 
	
	public function setFecult($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecult] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecult !== $ts) {
      $this->fecult = $ts;
      $this->modifiedColumns[] = ManprogruPeer::FECULT;
    }

	} 
	
	public function setFecprx($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecprx] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecprx !== $ts) {
      $this->fecprx = $ts;
      $this->modifiedColumns[] = ManprogruPeer::FECPRX;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ManprogruPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codgru = $rs->getString($startcol + 0);

      $this->fecini = $rs->getDate($startcol + 1, null);

      $this->candia = $rs->getInt($startcol + 2);

      $this->fecult = $rs->getDate($startcol + 3, null);

      $this->fecprx = $rs->getDate($startcol + 4, null);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Manprogru object", $e);
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
			$con = Propel::getConnection(ManprogruPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ManprogruPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ManprogruPeer::DATABASE_NAME);
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
					$pk = ManprogruPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ManprogruPeer::doUpdate($this, $con);
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


			if (($retval = ManprogruPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManprogruPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodgru();
				break;
			case 1:
				return $this->getFecini();
				break;
			case 2:
				return $this->getCandia();
				break;
			case 3:
				return $this->getFecult();
				break;
			case 4:
				return $this->getFecprx();
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
		$keys = ManprogruPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodgru(),
			$keys[1] => $this->getFecini(),
			$keys[2] => $this->getCandia(),
			$keys[3] => $this->getFecult(),
			$keys[4] => $this->getFecprx(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManprogruPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodgru($value);
				break;
			case 1:
				$this->setFecini($value);
				break;
			case 2:
				$this->setCandia($value);
				break;
			case 3:
				$this->setFecult($value);
				break;
			case 4:
				$this->setFecprx($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ManprogruPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodgru($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecini($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCandia($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecult($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecprx($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ManprogruPeer::DATABASE_NAME);

		if ($this->isColumnModified(ManprogruPeer::CODGRU)) $criteria->add(ManprogruPeer::CODGRU, $this->codgru);
		if ($this->isColumnModified(ManprogruPeer::FECINI)) $criteria->add(ManprogruPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(ManprogruPeer::CANDIA)) $criteria->add(ManprogruPeer::CANDIA, $this->candia);
		if ($this->isColumnModified(ManprogruPeer::FECULT)) $criteria->add(ManprogruPeer::FECULT, $this->fecult);
		if ($this->isColumnModified(ManprogruPeer::FECPRX)) $criteria->add(ManprogruPeer::FECPRX, $this->fecprx);
		if ($this->isColumnModified(ManprogruPeer::ID)) $criteria->add(ManprogruPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ManprogruPeer::DATABASE_NAME);

		$criteria->add(ManprogruPeer::ID, $this->id);

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

		$copyObj->setCodgru($this->codgru);

		$copyObj->setFecini($this->fecini);

		$copyObj->setCandia($this->candia);

		$copyObj->setFecult($this->fecult);

		$copyObj->setFecprx($this->fecprx);


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
			self::$peer = new ManprogruPeer();
		}
		return self::$peer;
	}

} 