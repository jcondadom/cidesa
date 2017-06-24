<?php


abstract class BaseBnregpolcer extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpol;


	
	protected $fecpol;


	
	protected $numrec;


	
	protected $fecini;


	
	protected $fecven;


	
	protected $numsolpag;


	
	protected $numsol;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumpol()
  {

    return trim($this->numpol);

  }
  
  public function getFecpol($format = 'Y-m-d')
  {

    if ($this->fecpol === null || $this->fecpol === '') {
      return null;
    } elseif (!is_int($this->fecpol)) {
            $ts = adodb_strtotime($this->fecpol);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpol] as date/time value: " . var_export($this->fecpol, true));
      }
    } else {
      $ts = $this->fecpol;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumrec()
  {

    return trim($this->numrec);

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

  
  public function getNumsolpag()
  {

    return trim($this->numsolpag);

  }
  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumpol($v)
	{

    if ($this->numpol !== $v) {
        $this->numpol = strtoupper($v);
        $this->modifiedColumns[] = BnregpolcerPeer::NUMPOL;
      }
  
	} 
	
	public function setFecpol($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpol] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpol !== $ts) {
      $this->fecpol = $ts;
      $this->modifiedColumns[] = BnregpolcerPeer::FECPOL;
    }

	} 
	
	public function setNumrec($v)
	{

    if ($this->numrec !== $v) {
        $this->numrec = strtoupper($v);
        $this->modifiedColumns[] = BnregpolcerPeer::NUMREC;
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
      $this->modifiedColumns[] = BnregpolcerPeer::FECINI;
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
      $this->modifiedColumns[] = BnregpolcerPeer::FECVEN;
    }

	} 
	
	public function setNumsolpag($v)
	{

    if ($this->numsolpag !== $v) {
        $this->numsolpag = strtoupper($v);
        $this->modifiedColumns[] = BnregpolcerPeer::NUMSOLPAG;
      }
  
	} 
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = strtoupper($v);
        $this->modifiedColumns[] = BnregpolcerPeer::NUMSOL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BnregpolcerPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpol = $rs->getString($startcol + 0);

      $this->fecpol = $rs->getDate($startcol + 1, null);

      $this->numrec = $rs->getString($startcol + 2);

      $this->fecini = $rs->getDate($startcol + 3, null);

      $this->fecven = $rs->getDate($startcol + 4, null);

      $this->numsolpag = $rs->getString($startcol + 5);

      $this->numsol = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bnregpolcer object", $e);
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
			$con = Propel::getConnection(BnregpolcerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnregpolcerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnregpolcerPeer::DATABASE_NAME);
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
					$pk = BnregpolcerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BnregpolcerPeer::doUpdate($this, $con);
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


			if (($retval = BnregpolcerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnregpolcerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpol();
				break;
			case 1:
				return $this->getFecpol();
				break;
			case 2:
				return $this->getNumrec();
				break;
			case 3:
				return $this->getFecini();
				break;
			case 4:
				return $this->getFecven();
				break;
			case 5:
				return $this->getNumsolpag();
				break;
			case 6:
				return $this->getNumsol();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnregpolcerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpol(),
			$keys[1] => $this->getFecpol(),
			$keys[2] => $this->getNumrec(),
			$keys[3] => $this->getFecini(),
			$keys[4] => $this->getFecven(),
			$keys[5] => $this->getNumsolpag(),
			$keys[6] => $this->getNumsol(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnregpolcerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpol($value);
				break;
			case 1:
				$this->setFecpol($value);
				break;
			case 2:
				$this->setNumrec($value);
				break;
			case 3:
				$this->setFecini($value);
				break;
			case 4:
				$this->setFecven($value);
				break;
			case 5:
				$this->setNumsolpag($value);
				break;
			case 6:
				$this->setNumsol($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnregpolcerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecpol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumrec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecini($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecven($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumsolpag($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumsol($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnregpolcerPeer::DATABASE_NAME);

		if ($this->isColumnModified(BnregpolcerPeer::NUMPOL)) $criteria->add(BnregpolcerPeer::NUMPOL, $this->numpol);
		if ($this->isColumnModified(BnregpolcerPeer::FECPOL)) $criteria->add(BnregpolcerPeer::FECPOL, $this->fecpol);
		if ($this->isColumnModified(BnregpolcerPeer::NUMREC)) $criteria->add(BnregpolcerPeer::NUMREC, $this->numrec);
		if ($this->isColumnModified(BnregpolcerPeer::FECINI)) $criteria->add(BnregpolcerPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(BnregpolcerPeer::FECVEN)) $criteria->add(BnregpolcerPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(BnregpolcerPeer::NUMSOLPAG)) $criteria->add(BnregpolcerPeer::NUMSOLPAG, $this->numsolpag);
		if ($this->isColumnModified(BnregpolcerPeer::NUMSOL)) $criteria->add(BnregpolcerPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(BnregpolcerPeer::ID)) $criteria->add(BnregpolcerPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnregpolcerPeer::DATABASE_NAME);

		$criteria->add(BnregpolcerPeer::ID, $this->id);

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

		$copyObj->setNumpol($this->numpol);

		$copyObj->setFecpol($this->fecpol);

		$copyObj->setNumrec($this->numrec);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecven($this->fecven);

		$copyObj->setNumsolpag($this->numsolpag);

		$copyObj->setNumsol($this->numsol);


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
			self::$peer = new BnregpolcerPeer();
		}
		return self::$peer;
	}

} 