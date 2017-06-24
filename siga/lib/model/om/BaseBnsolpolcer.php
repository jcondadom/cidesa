<?php


abstract class BaseBnsolpolcer extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $tipsol;


	
	protected $fecsol;


	
	protected $dessol;


	
	protected $fecini;


	
	protected $fecven;


	
	protected $numref;


	
	protected $codcom;


	
	protected $codubi;


	
	protected $codcob;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getTipsol()
  {

    return trim($this->tipsol);

  }
  
  public function getFecsol($format = 'Y-m-d')
  {

    if ($this->fecsol === null || $this->fecsol === '') {
      return null;
    } elseif (!is_int($this->fecsol)) {
            $ts = adodb_strtotime($this->fecsol);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsol] as date/time value: " . var_export($this->fecsol, true));
      }
    } else {
      $ts = $this->fecsol;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDessol()
  {

    return trim($this->dessol);

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

  
  public function getNumref()
  {

    return trim($this->numref);

  }
  
  public function getCodcom()
  {

    return trim($this->codcom);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getCodcob()
  {

    return trim($this->codcob);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = strtoupper($v);
        $this->modifiedColumns[] = BnsolpolcerPeer::NUMSOL;
      }
  
	} 
	
	public function setTipsol($v)
	{

    if ($this->tipsol !== $v) {
        $this->tipsol = strtoupper($v);
        $this->modifiedColumns[] = BnsolpolcerPeer::TIPSOL;
      }
  
	} 
	
	public function setFecsol($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsol] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsol !== $ts) {
      $this->fecsol = $ts;
      $this->modifiedColumns[] = BnsolpolcerPeer::FECSOL;
    }

	} 
	
	public function setDessol($v)
	{

    if ($this->dessol !== $v) {
        $this->dessol = strtoupper($v);
        $this->modifiedColumns[] = BnsolpolcerPeer::DESSOL;
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
      $this->modifiedColumns[] = BnsolpolcerPeer::FECINI;
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
      $this->modifiedColumns[] = BnsolpolcerPeer::FECVEN;
    }

	} 
	
	public function setNumref($v)
	{

    if ($this->numref !== $v) {
        $this->numref = strtoupper($v);
        $this->modifiedColumns[] = BnsolpolcerPeer::NUMREF;
      }
  
	} 
	
	public function setCodcom($v)
	{

    if ($this->codcom !== $v) {
        $this->codcom = strtoupper($v);
        $this->modifiedColumns[] = BnsolpolcerPeer::CODCOM;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = strtoupper($v);
        $this->modifiedColumns[] = BnsolpolcerPeer::CODUBI;
      }
  
	} 
	
	public function setCodcob($v)
	{

    if ($this->codcob !== $v) {
        $this->codcob = strtoupper($v);
        $this->modifiedColumns[] = BnsolpolcerPeer::CODCOB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BnsolpolcerPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->tipsol = $rs->getString($startcol + 1);

      $this->fecsol = $rs->getDate($startcol + 2, null);

      $this->dessol = $rs->getString($startcol + 3);

      $this->fecini = $rs->getDate($startcol + 4, null);

      $this->fecven = $rs->getDate($startcol + 5, null);

      $this->numref = $rs->getString($startcol + 6);

      $this->codcom = $rs->getString($startcol + 7);

      $this->codubi = $rs->getString($startcol + 8);

      $this->codcob = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bnsolpolcer object", $e);
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
			$con = Propel::getConnection(BnsolpolcerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnsolpolcerPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnsolpolcerPeer::DATABASE_NAME);
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
					$pk = BnsolpolcerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BnsolpolcerPeer::doUpdate($this, $con);
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


			if (($retval = BnsolpolcerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnsolpolcerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getTipsol();
				break;
			case 2:
				return $this->getFecsol();
				break;
			case 3:
				return $this->getDessol();
				break;
			case 4:
				return $this->getFecini();
				break;
			case 5:
				return $this->getFecven();
				break;
			case 6:
				return $this->getNumref();
				break;
			case 7:
				return $this->getCodcom();
				break;
			case 8:
				return $this->getCodubi();
				break;
			case 9:
				return $this->getCodcob();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnsolpolcerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getTipsol(),
			$keys[2] => $this->getFecsol(),
			$keys[3] => $this->getDessol(),
			$keys[4] => $this->getFecini(),
			$keys[5] => $this->getFecven(),
			$keys[6] => $this->getNumref(),
			$keys[7] => $this->getCodcom(),
			$keys[8] => $this->getCodubi(),
			$keys[9] => $this->getCodcob(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnsolpolcerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setTipsol($value);
				break;
			case 2:
				$this->setFecsol($value);
				break;
			case 3:
				$this->setDessol($value);
				break;
			case 4:
				$this->setFecini($value);
				break;
			case 5:
				$this->setFecven($value);
				break;
			case 6:
				$this->setNumref($value);
				break;
			case 7:
				$this->setCodcom($value);
				break;
			case 8:
				$this->setCodubi($value);
				break;
			case 9:
				$this->setCodcob($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnsolpolcerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecsol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDessol($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecini($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecven($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumref($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodcom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodubi($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodcob($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnsolpolcerPeer::DATABASE_NAME);

		if ($this->isColumnModified(BnsolpolcerPeer::NUMSOL)) $criteria->add(BnsolpolcerPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(BnsolpolcerPeer::TIPSOL)) $criteria->add(BnsolpolcerPeer::TIPSOL, $this->tipsol);
		if ($this->isColumnModified(BnsolpolcerPeer::FECSOL)) $criteria->add(BnsolpolcerPeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(BnsolpolcerPeer::DESSOL)) $criteria->add(BnsolpolcerPeer::DESSOL, $this->dessol);
		if ($this->isColumnModified(BnsolpolcerPeer::FECINI)) $criteria->add(BnsolpolcerPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(BnsolpolcerPeer::FECVEN)) $criteria->add(BnsolpolcerPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(BnsolpolcerPeer::NUMREF)) $criteria->add(BnsolpolcerPeer::NUMREF, $this->numref);
		if ($this->isColumnModified(BnsolpolcerPeer::CODCOM)) $criteria->add(BnsolpolcerPeer::CODCOM, $this->codcom);
		if ($this->isColumnModified(BnsolpolcerPeer::CODUBI)) $criteria->add(BnsolpolcerPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(BnsolpolcerPeer::CODCOB)) $criteria->add(BnsolpolcerPeer::CODCOB, $this->codcob);
		if ($this->isColumnModified(BnsolpolcerPeer::ID)) $criteria->add(BnsolpolcerPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnsolpolcerPeer::DATABASE_NAME);

		$criteria->add(BnsolpolcerPeer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setTipsol($this->tipsol);

		$copyObj->setFecsol($this->fecsol);

		$copyObj->setDessol($this->dessol);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecven($this->fecven);

		$copyObj->setNumref($this->numref);

		$copyObj->setCodcom($this->codcom);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setCodcob($this->codcob);


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
			self::$peer = new BnsolpolcerPeer();
		}
		return self::$peer;
	}

} 