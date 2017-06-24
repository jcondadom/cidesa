<?php


abstract class BaseCobdestra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numtra;


	
	protected $refdoc;


	
	protected $codcli;


	
	protected $coddes;


	
	protected $fecdes;


	
	protected $mondes;


	
	protected $monret;


	
	protected $monant;


	
	protected $numcomret;


	
	protected $feccomret;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumtra()
  {

    return trim($this->numtra);

  }
  
  public function getRefdoc()
  {

    return trim($this->refdoc);

  }
  
  public function getCodcli()
  {

    return trim($this->codcli);

  }
  
  public function getCoddes()
  {

    return trim($this->coddes);

  }
  
  public function getFecdes($format = 'Y-m-d')
  {

    if ($this->fecdes === null || $this->fecdes === '') {
      return null;
    } elseif (!is_int($this->fecdes)) {
            $ts = adodb_strtotime($this->fecdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdes] as date/time value: " . var_export($this->fecdes, true));
      }
    } else {
      $ts = $this->fecdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getMonret($val=false)
  {

    if($val) return number_format($this->monret,2,',','.');
    else return $this->monret;

  }
  
  public function getMonant($val=false)
  {

    if($val) return number_format($this->monant,2,',','.');
    else return $this->monant;

  }
  
  public function getNumcomret()
  {

    return trim($this->numcomret);

  }
  
  public function getFeccomret($format = 'Y-m-d')
  {

    if ($this->feccomret === null || $this->feccomret === '') {
      return null;
    } elseif (!is_int($this->feccomret)) {
            $ts = adodb_strtotime($this->feccomret);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccomret] as date/time value: " . var_export($this->feccomret, true));
      }
    } else {
      $ts = $this->feccomret;
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
	
	public function setNumtra($v)
	{

    if ($this->numtra !== $v) {
        $this->numtra = $v;
        $this->modifiedColumns[] = CobdestraPeer::NUMTRA;
      }
  
	} 
	
	public function setRefdoc($v)
	{

    if ($this->refdoc !== $v) {
        $this->refdoc = $v;
        $this->modifiedColumns[] = CobdestraPeer::REFDOC;
      }
  
	} 
	
	public function setCodcli($v)
	{

    if ($this->codcli !== $v) {
        $this->codcli = $v;
        $this->modifiedColumns[] = CobdestraPeer::CODCLI;
      }
  
	} 
	
	public function setCoddes($v)
	{

    if ($this->coddes !== $v) {
        $this->coddes = $v;
        $this->modifiedColumns[] = CobdestraPeer::CODDES;
      }
  
	} 
	
	public function setFecdes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdes !== $ts) {
      $this->fecdes = $ts;
      $this->modifiedColumns[] = CobdestraPeer::FECDES;
    }

	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CobdestraPeer::MONDES;
      }
  
	} 
	
	public function setMonret($v)
	{

    if ($this->monret !== $v) {
        $this->monret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CobdestraPeer::MONRET;
      }
  
	} 
	
	public function setMonant($v)
	{

    if ($this->monant !== $v) {
        $this->monant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CobdestraPeer::MONANT;
      }
  
	} 
	
	public function setNumcomret($v)
	{

    if ($this->numcomret !== $v) {
        $this->numcomret = $v;
        $this->modifiedColumns[] = CobdestraPeer::NUMCOMRET;
      }
  
	} 
	
	public function setFeccomret($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccomret] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccomret !== $ts) {
      $this->feccomret = $ts;
      $this->modifiedColumns[] = CobdestraPeer::FECCOMRET;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CobdestraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numtra = $rs->getString($startcol + 0);

      $this->refdoc = $rs->getString($startcol + 1);

      $this->codcli = $rs->getString($startcol + 2);

      $this->coddes = $rs->getString($startcol + 3);

      $this->fecdes = $rs->getDate($startcol + 4, null);

      $this->mondes = $rs->getFloat($startcol + 5);

      $this->monret = $rs->getFloat($startcol + 6);

      $this->monant = $rs->getFloat($startcol + 7);

      $this->numcomret = $rs->getString($startcol + 8);

      $this->feccomret = $rs->getDate($startcol + 9, null);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cobdestra object", $e);
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
			$con = Propel::getConnection(CobdestraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CobdestraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CobdestraPeer::DATABASE_NAME);
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
					$pk = CobdestraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CobdestraPeer::doUpdate($this, $con);
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


			if (($retval = CobdestraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobdestraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumtra();
				break;
			case 1:
				return $this->getRefdoc();
				break;
			case 2:
				return $this->getCodcli();
				break;
			case 3:
				return $this->getCoddes();
				break;
			case 4:
				return $this->getFecdes();
				break;
			case 5:
				return $this->getMondes();
				break;
			case 6:
				return $this->getMonret();
				break;
			case 7:
				return $this->getMonant();
				break;
			case 8:
				return $this->getNumcomret();
				break;
			case 9:
				return $this->getFeccomret();
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
		$keys = CobdestraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumtra(),
			$keys[1] => $this->getRefdoc(),
			$keys[2] => $this->getCodcli(),
			$keys[3] => $this->getCoddes(),
			$keys[4] => $this->getFecdes(),
			$keys[5] => $this->getMondes(),
			$keys[6] => $this->getMonret(),
			$keys[7] => $this->getMonant(),
			$keys[8] => $this->getNumcomret(),
			$keys[9] => $this->getFeccomret(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobdestraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumtra($value);
				break;
			case 1:
				$this->setRefdoc($value);
				break;
			case 2:
				$this->setCodcli($value);
				break;
			case 3:
				$this->setCoddes($value);
				break;
			case 4:
				$this->setFecdes($value);
				break;
			case 5:
				$this->setMondes($value);
				break;
			case 6:
				$this->setMonret($value);
				break;
			case 7:
				$this->setMonant($value);
				break;
			case 8:
				$this->setNumcomret($value);
				break;
			case 9:
				$this->setFeccomret($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobdestraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumtra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRefdoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcli($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCoddes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecdes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMondes($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonret($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonant($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumcomret($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFeccomret($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CobdestraPeer::DATABASE_NAME);

		if ($this->isColumnModified(CobdestraPeer::NUMTRA)) $criteria->add(CobdestraPeer::NUMTRA, $this->numtra);
		if ($this->isColumnModified(CobdestraPeer::REFDOC)) $criteria->add(CobdestraPeer::REFDOC, $this->refdoc);
		if ($this->isColumnModified(CobdestraPeer::CODCLI)) $criteria->add(CobdestraPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(CobdestraPeer::CODDES)) $criteria->add(CobdestraPeer::CODDES, $this->coddes);
		if ($this->isColumnModified(CobdestraPeer::FECDES)) $criteria->add(CobdestraPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(CobdestraPeer::MONDES)) $criteria->add(CobdestraPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(CobdestraPeer::MONRET)) $criteria->add(CobdestraPeer::MONRET, $this->monret);
		if ($this->isColumnModified(CobdestraPeer::MONANT)) $criteria->add(CobdestraPeer::MONANT, $this->monant);
		if ($this->isColumnModified(CobdestraPeer::NUMCOMRET)) $criteria->add(CobdestraPeer::NUMCOMRET, $this->numcomret);
		if ($this->isColumnModified(CobdestraPeer::FECCOMRET)) $criteria->add(CobdestraPeer::FECCOMRET, $this->feccomret);
		if ($this->isColumnModified(CobdestraPeer::ID)) $criteria->add(CobdestraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CobdestraPeer::DATABASE_NAME);

		$criteria->add(CobdestraPeer::ID, $this->id);

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

		$copyObj->setNumtra($this->numtra);

		$copyObj->setRefdoc($this->refdoc);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setCoddes($this->coddes);

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setMondes($this->mondes);

		$copyObj->setMonret($this->monret);

		$copyObj->setMonant($this->monant);

		$copyObj->setNumcomret($this->numcomret);

		$copyObj->setFeccomret($this->feccomret);


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
			self::$peer = new CobdestraPeer();
		}
		return self::$peer;
	}

} 