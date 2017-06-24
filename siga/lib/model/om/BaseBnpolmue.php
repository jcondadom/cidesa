<?php


abstract class BaseBnpolmue extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $codmue;


	
	protected $numcue;


	
	protected $numdep;


	
	protected $fecdepseg;


	
	protected $codtip;


	
	protected $monpag;


	
	protected $porpri;


	
	protected $monpri;


	
	protected $numcom;


	
	protected $deprec;


	
	protected $segnom;


	
	protected $monnom;


	
	protected $frenom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getCodmue()
  {

    return trim($this->codmue);

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getNumdep()
  {

    return trim($this->numdep);

  }
  
  public function getFecdepseg($format = 'Y-m-d')
  {

    if ($this->fecdepseg === null || $this->fecdepseg === '') {
      return null;
    } elseif (!is_int($this->fecdepseg)) {
            $ts = adodb_strtotime($this->fecdepseg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdepseg] as date/time value: " . var_export($this->fecdepseg, true));
      }
    } else {
      $ts = $this->fecdepseg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getPorpri($val=false)
  {

    if($val) return number_format($this->porpri,2,',','.');
    else return $this->porpri;

  }
  
  public function getMonpri($val=false)
  {

    if($val) return number_format($this->monpri,2,',','.');
    else return $this->monpri;

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getDeprec()
  {

    return trim($this->deprec);

  }
  
  public function getSegnom()
  {

    return trim($this->segnom);

  }
  
  public function getMonnom($val=false)
  {

    if($val) return number_format($this->monnom,2,',','.');
    else return $this->monnom;

  }
  
  public function getFrenom()
  {

    return trim($this->frenom);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = strtoupper($v);
        $this->modifiedColumns[] = BnpolmuePeer::CODACT;
      }
  
	} 
	
	public function setCodmue($v)
	{

    if ($this->codmue !== $v) {
        $this->codmue = strtoupper($v);
        $this->modifiedColumns[] = BnpolmuePeer::CODMUE;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = strtoupper($v);
        $this->modifiedColumns[] = BnpolmuePeer::NUMCUE;
      }
  
	} 
	
	public function setNumdep($v)
	{

    if ($this->numdep !== $v) {
        $this->numdep = strtoupper($v);
        $this->modifiedColumns[] = BnpolmuePeer::NUMDEP;
      }
  
	} 
	
	public function setFecdepseg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdepseg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdepseg !== $ts) {
      $this->fecdepseg = $ts;
      $this->modifiedColumns[] = BnpolmuePeer::FECDEPSEG;
    }

	} 
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = strtoupper($v);
        $this->modifiedColumns[] = BnpolmuePeer::CODTIP;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnpolmuePeer::MONPAG;
      }
  
	} 
	
	public function setPorpri($v)
	{

    if ($this->porpri !== $v) {
        $this->porpri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnpolmuePeer::PORPRI;
      }
  
	} 
	
	public function setMonpri($v)
	{

    if ($this->monpri !== $v) {
        $this->monpri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnpolmuePeer::MONPRI;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = strtoupper($v);
        $this->modifiedColumns[] = BnpolmuePeer::NUMCOM;
      }
  
	} 
	
	public function setDeprec($v)
	{

    if ($this->deprec !== $v) {
        $this->deprec = strtoupper($v);
        $this->modifiedColumns[] = BnpolmuePeer::DEPREC;
      }
  
	} 
	
	public function setSegnom($v)
	{

    if ($this->segnom !== $v) {
        $this->segnom = strtoupper($v);
        $this->modifiedColumns[] = BnpolmuePeer::SEGNOM;
      }
  
	} 
	
	public function setMonnom($v)
	{

    if ($this->monnom !== $v) {
        $this->monnom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = BnpolmuePeer::MONNOM;
      }
  
	} 
	
	public function setFrenom($v)
	{

    if ($this->frenom !== $v) {
        $this->frenom = strtoupper($v);
        $this->modifiedColumns[] = BnpolmuePeer::FRENOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BnpolmuePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codact = $rs->getString($startcol + 0);

      $this->codmue = $rs->getString($startcol + 1);

      $this->numcue = $rs->getString($startcol + 2);

      $this->numdep = $rs->getString($startcol + 3);

      $this->fecdepseg = $rs->getDate($startcol + 4, null);

      $this->codtip = $rs->getString($startcol + 5);

      $this->monpag = $rs->getFloat($startcol + 6);

      $this->porpri = $rs->getFloat($startcol + 7);

      $this->monpri = $rs->getFloat($startcol + 8);

      $this->numcom = $rs->getString($startcol + 9);

      $this->deprec = $rs->getString($startcol + 10);

      $this->segnom = $rs->getString($startcol + 11);

      $this->monnom = $rs->getFloat($startcol + 12);

      $this->frenom = $rs->getString($startcol + 13);

      $this->id = $rs->getInt($startcol + 14);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 15; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bnpolmue object", $e);
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
			$con = Propel::getConnection(BnpolmuePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnpolmuePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnpolmuePeer::DATABASE_NAME);
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
					$pk = BnpolmuePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BnpolmuePeer::doUpdate($this, $con);
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


			if (($retval = BnpolmuePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnpolmuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getCodmue();
				break;
			case 2:
				return $this->getNumcue();
				break;
			case 3:
				return $this->getNumdep();
				break;
			case 4:
				return $this->getFecdepseg();
				break;
			case 5:
				return $this->getCodtip();
				break;
			case 6:
				return $this->getMonpag();
				break;
			case 7:
				return $this->getPorpri();
				break;
			case 8:
				return $this->getMonpri();
				break;
			case 9:
				return $this->getNumcom();
				break;
			case 10:
				return $this->getDeprec();
				break;
			case 11:
				return $this->getSegnom();
				break;
			case 12:
				return $this->getMonnom();
				break;
			case 13:
				return $this->getFrenom();
				break;
			case 14:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnpolmuePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getCodmue(),
			$keys[2] => $this->getNumcue(),
			$keys[3] => $this->getNumdep(),
			$keys[4] => $this->getFecdepseg(),
			$keys[5] => $this->getCodtip(),
			$keys[6] => $this->getMonpag(),
			$keys[7] => $this->getPorpri(),
			$keys[8] => $this->getMonpri(),
			$keys[9] => $this->getNumcom(),
			$keys[10] => $this->getDeprec(),
			$keys[11] => $this->getSegnom(),
			$keys[12] => $this->getMonnom(),
			$keys[13] => $this->getFrenom(),
			$keys[14] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnpolmuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setCodmue($value);
				break;
			case 2:
				$this->setNumcue($value);
				break;
			case 3:
				$this->setNumdep($value);
				break;
			case 4:
				$this->setFecdepseg($value);
				break;
			case 5:
				$this->setCodtip($value);
				break;
			case 6:
				$this->setMonpag($value);
				break;
			case 7:
				$this->setPorpri($value);
				break;
			case 8:
				$this->setMonpri($value);
				break;
			case 9:
				$this->setNumcom($value);
				break;
			case 10:
				$this->setDeprec($value);
				break;
			case 11:
				$this->setSegnom($value);
				break;
			case 12:
				$this->setMonnom($value);
				break;
			case 13:
				$this->setFrenom($value);
				break;
			case 14:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnpolmuePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumcue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumdep($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecdepseg($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodtip($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonpag($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPorpri($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonpri($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumcom($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDeprec($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSegnom($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMonnom($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFrenom($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnpolmuePeer::DATABASE_NAME);

		if ($this->isColumnModified(BnpolmuePeer::CODACT)) $criteria->add(BnpolmuePeer::CODACT, $this->codact);
		if ($this->isColumnModified(BnpolmuePeer::CODMUE)) $criteria->add(BnpolmuePeer::CODMUE, $this->codmue);
		if ($this->isColumnModified(BnpolmuePeer::NUMCUE)) $criteria->add(BnpolmuePeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(BnpolmuePeer::NUMDEP)) $criteria->add(BnpolmuePeer::NUMDEP, $this->numdep);
		if ($this->isColumnModified(BnpolmuePeer::FECDEPSEG)) $criteria->add(BnpolmuePeer::FECDEPSEG, $this->fecdepseg);
		if ($this->isColumnModified(BnpolmuePeer::CODTIP)) $criteria->add(BnpolmuePeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(BnpolmuePeer::MONPAG)) $criteria->add(BnpolmuePeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(BnpolmuePeer::PORPRI)) $criteria->add(BnpolmuePeer::PORPRI, $this->porpri);
		if ($this->isColumnModified(BnpolmuePeer::MONPRI)) $criteria->add(BnpolmuePeer::MONPRI, $this->monpri);
		if ($this->isColumnModified(BnpolmuePeer::NUMCOM)) $criteria->add(BnpolmuePeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(BnpolmuePeer::DEPREC)) $criteria->add(BnpolmuePeer::DEPREC, $this->deprec);
		if ($this->isColumnModified(BnpolmuePeer::SEGNOM)) $criteria->add(BnpolmuePeer::SEGNOM, $this->segnom);
		if ($this->isColumnModified(BnpolmuePeer::MONNOM)) $criteria->add(BnpolmuePeer::MONNOM, $this->monnom);
		if ($this->isColumnModified(BnpolmuePeer::FRENOM)) $criteria->add(BnpolmuePeer::FRENOM, $this->frenom);
		if ($this->isColumnModified(BnpolmuePeer::ID)) $criteria->add(BnpolmuePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnpolmuePeer::DATABASE_NAME);

		$criteria->add(BnpolmuePeer::ID, $this->id);

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

		$copyObj->setCodact($this->codact);

		$copyObj->setCodmue($this->codmue);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setNumdep($this->numdep);

		$copyObj->setFecdepseg($this->fecdepseg);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setPorpri($this->porpri);

		$copyObj->setMonpri($this->monpri);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setDeprec($this->deprec);

		$copyObj->setSegnom($this->segnom);

		$copyObj->setMonnom($this->monnom);

		$copyObj->setFrenom($this->frenom);


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
			self::$peer = new BnpolmuePeer();
		}
		return self::$peer;
	}

} 