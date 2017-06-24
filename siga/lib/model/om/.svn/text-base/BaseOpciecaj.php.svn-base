<?php


abstract class BaseOpciecaj extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numref;


	
	protected $feccie;


	
	protected $descon;


	
	protected $codubi;


	
	protected $codfin;


	
	protected $codcajchi;


	
	protected $loguse;


	
	protected $moncie;


	
	protected $refcom;


	
	protected $refpag;


	
	protected $numcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumref()
  {

    return trim($this->numref);

  }
  
  public function getFeccie($format = 'Y-m-d')
  {

    if ($this->feccie === null || $this->feccie === '') {
      return null;
    } elseif (!is_int($this->feccie)) {
            $ts = adodb_strtotime($this->feccie);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccie] as date/time value: " . var_export($this->feccie, true));
      }
    } else {
      $ts = $this->feccie;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDescon()
  {

    return trim($this->descon);

  }
  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getCodfin()
  {

    return trim($this->codfin);

  }
  
  public function getCodcajchi()
  {

    return trim($this->codcajchi);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getMoncie($val=false)
  {

    if($val) return number_format($this->moncie,2,',','.');
    else return $this->moncie;

  }
  
  public function getRefcom()
  {

    return trim($this->refcom);

  }
  
  public function getRefpag()
  {

    return trim($this->refpag);

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumref($v)
	{

    if ($this->numref !== $v) {
        $this->numref = $v;
        $this->modifiedColumns[] = OpciecajPeer::NUMREF;
      }
  
	} 
	
	public function setFeccie($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccie] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccie !== $ts) {
      $this->feccie = $ts;
      $this->modifiedColumns[] = OpciecajPeer::FECCIE;
    }

	} 
	
	public function setDescon($v)
	{

    if ($this->descon !== $v) {
        $this->descon = $v;
        $this->modifiedColumns[] = OpciecajPeer::DESCON;
      }
  
	} 
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = OpciecajPeer::CODUBI;
      }
  
	} 
	
	public function setCodfin($v)
	{

    if ($this->codfin !== $v) {
        $this->codfin = $v;
        $this->modifiedColumns[] = OpciecajPeer::CODFIN;
      }
  
	} 
	
	public function setCodcajchi($v)
	{

    if ($this->codcajchi !== $v) {
        $this->codcajchi = $v;
        $this->modifiedColumns[] = OpciecajPeer::CODCAJCHI;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = OpciecajPeer::LOGUSE;
      }
  
	} 
	
	public function setMoncie($v)
	{

    if ($this->moncie !== $v) {
        $this->moncie = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpciecajPeer::MONCIE;
      }
  
	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = OpciecajPeer::REFCOM;
      }
  
	} 
	
	public function setRefpag($v)
	{

    if ($this->refpag !== $v) {
        $this->refpag = $v;
        $this->modifiedColumns[] = OpciecajPeer::REFPAG;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = OpciecajPeer::NUMCOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpciecajPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numref = $rs->getString($startcol + 0);

      $this->feccie = $rs->getDate($startcol + 1, null);

      $this->descon = $rs->getString($startcol + 2);

      $this->codubi = $rs->getString($startcol + 3);

      $this->codfin = $rs->getString($startcol + 4);

      $this->codcajchi = $rs->getString($startcol + 5);

      $this->loguse = $rs->getString($startcol + 6);

      $this->moncie = $rs->getFloat($startcol + 7);

      $this->refcom = $rs->getString($startcol + 8);

      $this->refpag = $rs->getString($startcol + 9);

      $this->numcom = $rs->getString($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opciecaj object", $e);
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
			$con = Propel::getConnection(OpciecajPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpciecajPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpciecajPeer::DATABASE_NAME);
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
					$pk = OpciecajPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpciecajPeer::doUpdate($this, $con);
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


			if (($retval = OpciecajPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpciecajPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumref();
				break;
			case 1:
				return $this->getFeccie();
				break;
			case 2:
				return $this->getDescon();
				break;
			case 3:
				return $this->getCodubi();
				break;
			case 4:
				return $this->getCodfin();
				break;
			case 5:
				return $this->getCodcajchi();
				break;
			case 6:
				return $this->getLoguse();
				break;
			case 7:
				return $this->getMoncie();
				break;
			case 8:
				return $this->getRefcom();
				break;
			case 9:
				return $this->getRefpag();
				break;
			case 10:
				return $this->getNumcom();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpciecajPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumref(),
			$keys[1] => $this->getFeccie(),
			$keys[2] => $this->getDescon(),
			$keys[3] => $this->getCodubi(),
			$keys[4] => $this->getCodfin(),
			$keys[5] => $this->getCodcajchi(),
			$keys[6] => $this->getLoguse(),
			$keys[7] => $this->getMoncie(),
			$keys[8] => $this->getRefcom(),
			$keys[9] => $this->getRefpag(),
			$keys[10] => $this->getNumcom(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpciecajPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumref($value);
				break;
			case 1:
				$this->setFeccie($value);
				break;
			case 2:
				$this->setDescon($value);
				break;
			case 3:
				$this->setCodubi($value);
				break;
			case 4:
				$this->setCodfin($value);
				break;
			case 5:
				$this->setCodcajchi($value);
				break;
			case 6:
				$this->setLoguse($value);
				break;
			case 7:
				$this->setMoncie($value);
				break;
			case 8:
				$this->setRefcom($value);
				break;
			case 9:
				$this->setRefpag($value);
				break;
			case 10:
				$this->setNumcom($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpciecajPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumref($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccie($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodubi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodfin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodcajchi($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLoguse($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMoncie($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRefcom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRefpag($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNumcom($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpciecajPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpciecajPeer::NUMREF)) $criteria->add(OpciecajPeer::NUMREF, $this->numref);
		if ($this->isColumnModified(OpciecajPeer::FECCIE)) $criteria->add(OpciecajPeer::FECCIE, $this->feccie);
		if ($this->isColumnModified(OpciecajPeer::DESCON)) $criteria->add(OpciecajPeer::DESCON, $this->descon);
		if ($this->isColumnModified(OpciecajPeer::CODUBI)) $criteria->add(OpciecajPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(OpciecajPeer::CODFIN)) $criteria->add(OpciecajPeer::CODFIN, $this->codfin);
		if ($this->isColumnModified(OpciecajPeer::CODCAJCHI)) $criteria->add(OpciecajPeer::CODCAJCHI, $this->codcajchi);
		if ($this->isColumnModified(OpciecajPeer::LOGUSE)) $criteria->add(OpciecajPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(OpciecajPeer::MONCIE)) $criteria->add(OpciecajPeer::MONCIE, $this->moncie);
		if ($this->isColumnModified(OpciecajPeer::REFCOM)) $criteria->add(OpciecajPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(OpciecajPeer::REFPAG)) $criteria->add(OpciecajPeer::REFPAG, $this->refpag);
		if ($this->isColumnModified(OpciecajPeer::NUMCOM)) $criteria->add(OpciecajPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(OpciecajPeer::ID)) $criteria->add(OpciecajPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpciecajPeer::DATABASE_NAME);

		$criteria->add(OpciecajPeer::ID, $this->id);

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

		$copyObj->setNumref($this->numref);

		$copyObj->setFeccie($this->feccie);

		$copyObj->setDescon($this->descon);

		$copyObj->setCodubi($this->codubi);

		$copyObj->setCodfin($this->codfin);

		$copyObj->setCodcajchi($this->codcajchi);

		$copyObj->setLoguse($this->loguse);

		$copyObj->setMoncie($this->moncie);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setRefpag($this->refpag);

		$copyObj->setNumcom($this->numcom);


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
			self::$peer = new OpciecajPeer();
		}
		return self::$peer;
	}

} 