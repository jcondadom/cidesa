<?php


abstract class BaseViarelvia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numrel;


	
	protected $fecrel;


	
	protected $tipcom;


	
	protected $desrel;


	
	protected $refcom;


	
	protected $codmon;


	
	protected $valmon;


	
	protected $codemp;


	
	protected $monbol;


	
	protected $totfac;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumrel()
  {

    return trim($this->numrel);

  }
  
  public function getFecrel($format = 'Y-m-d')
  {

    if ($this->fecrel === null || $this->fecrel === '') {
      return null;
    } elseif (!is_int($this->fecrel)) {
            $ts = adodb_strtotime($this->fecrel);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrel] as date/time value: " . var_export($this->fecrel, true));
      }
    } else {
      $ts = $this->fecrel;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getDesrel()
  {

    return trim($this->desrel);

  }
  
  public function getRefcom()
  {

    return trim($this->refcom);

  }
  
  public function getCodmon()
  {

    return trim($this->codmon);

  }
  
  public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,2,',','.');
    else return $this->valmon;

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getMonbol($val=false)
  {

    if($val) return number_format($this->monbol,2,',','.');
    else return $this->monbol;

  }
  
  public function getTotfac($val=false)
  {

    if($val) return number_format($this->totfac,2,',','.');
    else return $this->totfac;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumrel($v)
	{

    if ($this->numrel !== $v) {
        $this->numrel = $v;
        $this->modifiedColumns[] = ViarelviaPeer::NUMREL;
      }
  
	} 
	
	public function setFecrel($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrel] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrel !== $ts) {
      $this->fecrel = $ts;
      $this->modifiedColumns[] = ViarelviaPeer::FECREL;
    }

	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = ViarelviaPeer::TIPCOM;
      }
  
	} 
	
	public function setDesrel($v)
	{

    if ($this->desrel !== $v) {
        $this->desrel = $v;
        $this->modifiedColumns[] = ViarelviaPeer::DESREL;
      }
  
	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = ViarelviaPeer::REFCOM;
      }
  
	} 
	
	public function setCodmon($v)
	{

    if ($this->codmon !== $v) {
        $this->codmon = $v;
        $this->modifiedColumns[] = ViarelviaPeer::CODMON;
      }
  
	} 
	
	public function setValmon($v)
	{

    if ($this->valmon !== $v) {
        $this->valmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViarelviaPeer::VALMON;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = ViarelviaPeer::CODEMP;
      }
  
	} 
	
	public function setMonbol($v)
	{

    if ($this->monbol !== $v) {
        $this->monbol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViarelviaPeer::MONBOL;
      }
  
	} 
	
	public function setTotfac($v)
	{

    if ($this->totfac !== $v) {
        $this->totfac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViarelviaPeer::TOTFAC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViarelviaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numrel = $rs->getString($startcol + 0);

      $this->fecrel = $rs->getDate($startcol + 1, null);

      $this->tipcom = $rs->getString($startcol + 2);

      $this->desrel = $rs->getString($startcol + 3);

      $this->refcom = $rs->getString($startcol + 4);

      $this->codmon = $rs->getString($startcol + 5);

      $this->valmon = $rs->getFloat($startcol + 6);

      $this->codemp = $rs->getString($startcol + 7);

      $this->monbol = $rs->getFloat($startcol + 8);

      $this->totfac = $rs->getFloat($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viarelvia object", $e);
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
			$con = Propel::getConnection(ViarelviaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViarelviaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViarelviaPeer::DATABASE_NAME);
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
					$pk = ViarelviaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViarelviaPeer::doUpdate($this, $con);
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


			if (($retval = ViarelviaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViarelviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumrel();
				break;
			case 1:
				return $this->getFecrel();
				break;
			case 2:
				return $this->getTipcom();
				break;
			case 3:
				return $this->getDesrel();
				break;
			case 4:
				return $this->getRefcom();
				break;
			case 5:
				return $this->getCodmon();
				break;
			case 6:
				return $this->getValmon();
				break;
			case 7:
				return $this->getCodemp();
				break;
			case 8:
				return $this->getMonbol();
				break;
			case 9:
				return $this->getTotfac();
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
		$keys = ViarelviaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumrel(),
			$keys[1] => $this->getFecrel(),
			$keys[2] => $this->getTipcom(),
			$keys[3] => $this->getDesrel(),
			$keys[4] => $this->getRefcom(),
			$keys[5] => $this->getCodmon(),
			$keys[6] => $this->getValmon(),
			$keys[7] => $this->getCodemp(),
			$keys[8] => $this->getMonbol(),
			$keys[9] => $this->getTotfac(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViarelviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumrel($value);
				break;
			case 1:
				$this->setFecrel($value);
				break;
			case 2:
				$this->setTipcom($value);
				break;
			case 3:
				$this->setDesrel($value);
				break;
			case 4:
				$this->setRefcom($value);
				break;
			case 5:
				$this->setCodmon($value);
				break;
			case 6:
				$this->setValmon($value);
				break;
			case 7:
				$this->setCodemp($value);
				break;
			case 8:
				$this->setMonbol($value);
				break;
			case 9:
				$this->setTotfac($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViarelviaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumrel($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecrel($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipcom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesrel($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRefcom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodmon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setValmon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodemp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonbol($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTotfac($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViarelviaPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViarelviaPeer::NUMREL)) $criteria->add(ViarelviaPeer::NUMREL, $this->numrel);
		if ($this->isColumnModified(ViarelviaPeer::FECREL)) $criteria->add(ViarelviaPeer::FECREL, $this->fecrel);
		if ($this->isColumnModified(ViarelviaPeer::TIPCOM)) $criteria->add(ViarelviaPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(ViarelviaPeer::DESREL)) $criteria->add(ViarelviaPeer::DESREL, $this->desrel);
		if ($this->isColumnModified(ViarelviaPeer::REFCOM)) $criteria->add(ViarelviaPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(ViarelviaPeer::CODMON)) $criteria->add(ViarelviaPeer::CODMON, $this->codmon);
		if ($this->isColumnModified(ViarelviaPeer::VALMON)) $criteria->add(ViarelviaPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(ViarelviaPeer::CODEMP)) $criteria->add(ViarelviaPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(ViarelviaPeer::MONBOL)) $criteria->add(ViarelviaPeer::MONBOL, $this->monbol);
		if ($this->isColumnModified(ViarelviaPeer::TOTFAC)) $criteria->add(ViarelviaPeer::TOTFAC, $this->totfac);
		if ($this->isColumnModified(ViarelviaPeer::ID)) $criteria->add(ViarelviaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViarelviaPeer::DATABASE_NAME);

		$criteria->add(ViarelviaPeer::ID, $this->id);

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

		$copyObj->setNumrel($this->numrel);

		$copyObj->setFecrel($this->fecrel);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setDesrel($this->desrel);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setCodmon($this->codmon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setMonbol($this->monbol);

		$copyObj->setTotfac($this->totfac);


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
			self::$peer = new ViarelviaPeer();
		}
		return self::$peer;
	}

} 