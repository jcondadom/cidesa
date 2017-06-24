<?php


abstract class BaseHcliqree extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codliq;


	
	protected $codemp;


	
	protected $cedfam;


	
	protected $tipliq;


	
	protected $fecliq;


	
	protected $monsol;


	
	protected $monliq;


	
	protected $obsliq;


	
	protected $status;


	
	protected $fecapr;


	
	protected $usrapr;


	
	protected $stacie;


	
	protected $stacpr;


	
	protected $fecaprcp;


	
	protected $usraprcp;


	
	protected $codcie;


	
	protected $loguse;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodliq()
  {

    return trim($this->codliq);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCedfam()
  {

    return trim($this->cedfam);

  }
  
  public function getTipliq()
  {

    return trim($this->tipliq);

  }
  
  public function getFecliq($format = 'Y-m-d H:i:s')
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

  
  public function getMonsol($val=false)
  {

    if($val) return number_format($this->monsol,2,',','.');
    else return $this->monsol;

  }
  
  public function getMonliq($val=false)
  {

    if($val) return number_format($this->monliq,2,',','.');
    else return $this->monliq;

  }
  
  public function getObsliq()
  {

    return trim($this->obsliq);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getFecapr($format = 'Y-m-d H:i:s')
  {

    if ($this->fecapr === null || $this->fecapr === '') {
      return null;
    } elseif (!is_int($this->fecapr)) {
            $ts = adodb_strtotime($this->fecapr);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecapr] as date/time value: " . var_export($this->fecapr, true));
      }
    } else {
      $ts = $this->fecapr;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUsrapr()
  {

    return trim($this->usrapr);

  }
  
  public function getStacie()
  {

    return trim($this->stacie);

  }
  
  public function getStacpr()
  {

    return trim($this->stacpr);

  }
  
  public function getFecaprcp($format = 'Y-m-d H:i:s')
  {

    if ($this->fecaprcp === null || $this->fecaprcp === '') {
      return null;
    } elseif (!is_int($this->fecaprcp)) {
            $ts = adodb_strtotime($this->fecaprcp);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaprcp] as date/time value: " . var_export($this->fecaprcp, true));
      }
    } else {
      $ts = $this->fecaprcp;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUsraprcp()
  {

    return trim($this->usraprcp);

  }
  
  public function getCodcie()
  {

    return trim($this->codcie);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodliq($v)
	{

    if ($this->codliq !== $v) {
        $this->codliq = $v;
        $this->modifiedColumns[] = HcliqreePeer::CODLIQ;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = HcliqreePeer::CODEMP;
      }
  
	} 
	
	public function setCedfam($v)
	{

    if ($this->cedfam !== $v) {
        $this->cedfam = $v;
        $this->modifiedColumns[] = HcliqreePeer::CEDFAM;
      }
  
	} 
	
	public function setTipliq($v)
	{

    if ($this->tipliq !== $v) {
        $this->tipliq = $v;
        $this->modifiedColumns[] = HcliqreePeer::TIPLIQ;
      }
  
	} 
	
	public function setFecliq($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecliq] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecliq !== $ts) {
      $this->fecliq = $ts;
      $this->modifiedColumns[] = HcliqreePeer::FECLIQ;
    }

	} 
	
	public function setMonsol($v)
	{

    if ($this->monsol !== $v) {
        $this->monsol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = HcliqreePeer::MONSOL;
      }
  
	} 
	
	public function setMonliq($v)
	{

    if ($this->monliq !== $v) {
        $this->monliq = Herramientas::toFloat($v);
        $this->modifiedColumns[] = HcliqreePeer::MONLIQ;
      }
  
	} 
	
	public function setObsliq($v)
	{

    if ($this->obsliq !== $v) {
        $this->obsliq = $v;
        $this->modifiedColumns[] = HcliqreePeer::OBSLIQ;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = HcliqreePeer::STATUS;
      }
  
	} 
	
	public function setFecapr($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecapr] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecapr !== $ts) {
      $this->fecapr = $ts;
      $this->modifiedColumns[] = HcliqreePeer::FECAPR;
    }

	} 
	
	public function setUsrapr($v)
	{

    if ($this->usrapr !== $v) {
        $this->usrapr = $v;
        $this->modifiedColumns[] = HcliqreePeer::USRAPR;
      }
  
	} 
	
	public function setStacie($v)
	{

    if ($this->stacie !== $v) {
        $this->stacie = $v;
        $this->modifiedColumns[] = HcliqreePeer::STACIE;
      }
  
	} 
	
	public function setStacpr($v)
	{

    if ($this->stacpr !== $v) {
        $this->stacpr = $v;
        $this->modifiedColumns[] = HcliqreePeer::STACPR;
      }
  
	} 
	
	public function setFecaprcp($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaprcp] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaprcp !== $ts) {
      $this->fecaprcp = $ts;
      $this->modifiedColumns[] = HcliqreePeer::FECAPRCP;
    }

	} 
	
	public function setUsraprcp($v)
	{

    if ($this->usraprcp !== $v) {
        $this->usraprcp = $v;
        $this->modifiedColumns[] = HcliqreePeer::USRAPRCP;
      }
  
	} 
	
	public function setCodcie($v)
	{

    if ($this->codcie !== $v) {
        $this->codcie = $v;
        $this->modifiedColumns[] = HcliqreePeer::CODCIE;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = HcliqreePeer::LOGUSE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = HcliqreePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codliq = $rs->getString($startcol + 0);

      $this->codemp = $rs->getString($startcol + 1);

      $this->cedfam = $rs->getString($startcol + 2);

      $this->tipliq = $rs->getString($startcol + 3);

      $this->fecliq = $rs->getTimestamp($startcol + 4, null);

      $this->monsol = $rs->getFloat($startcol + 5);

      $this->monliq = $rs->getFloat($startcol + 6);

      $this->obsliq = $rs->getString($startcol + 7);

      $this->status = $rs->getString($startcol + 8);

      $this->fecapr = $rs->getTimestamp($startcol + 9, null);

      $this->usrapr = $rs->getString($startcol + 10);

      $this->stacie = $rs->getString($startcol + 11);

      $this->stacpr = $rs->getString($startcol + 12);

      $this->fecaprcp = $rs->getTimestamp($startcol + 13, null);

      $this->usraprcp = $rs->getString($startcol + 14);

      $this->codcie = $rs->getString($startcol + 15);

      $this->loguse = $rs->getString($startcol + 16);

      $this->id = $rs->getInt($startcol + 17);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 17; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Hcliqree object", $e);
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
			$con = Propel::getConnection(HcliqreePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HcliqreePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HcliqreePeer::DATABASE_NAME);
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
					$pk = HcliqreePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HcliqreePeer::doUpdate($this, $con);
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


			if (($retval = HcliqreePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HcliqreePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodliq();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getCedfam();
				break;
			case 3:
				return $this->getTipliq();
				break;
			case 4:
				return $this->getFecliq();
				break;
			case 5:
				return $this->getMonsol();
				break;
			case 6:
				return $this->getMonliq();
				break;
			case 7:
				return $this->getObsliq();
				break;
			case 8:
				return $this->getStatus();
				break;
			case 9:
				return $this->getFecapr();
				break;
			case 10:
				return $this->getUsrapr();
				break;
			case 11:
				return $this->getStacie();
				break;
			case 12:
				return $this->getStacpr();
				break;
			case 13:
				return $this->getFecaprcp();
				break;
			case 14:
				return $this->getUsraprcp();
				break;
			case 15:
				return $this->getCodcie();
				break;
			case 16:
				return $this->getLoguse();
				break;
			case 17:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HcliqreePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodliq(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getCedfam(),
			$keys[3] => $this->getTipliq(),
			$keys[4] => $this->getFecliq(),
			$keys[5] => $this->getMonsol(),
			$keys[6] => $this->getMonliq(),
			$keys[7] => $this->getObsliq(),
			$keys[8] => $this->getStatus(),
			$keys[9] => $this->getFecapr(),
			$keys[10] => $this->getUsrapr(),
			$keys[11] => $this->getStacie(),
			$keys[12] => $this->getStacpr(),
			$keys[13] => $this->getFecaprcp(),
			$keys[14] => $this->getUsraprcp(),
			$keys[15] => $this->getCodcie(),
                        $keys[16] => $this->getLoguse(),
			$keys[17] => $this->getId(),

		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HcliqreePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodliq($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setCedfam($value);
				break;
			case 3:
				$this->setTipliq($value);
				break;
			case 4:
				$this->setFecliq($value);
				break;
			case 5:
				$this->setMonsol($value);
				break;
			case 6:
				$this->setMonliq($value);
				break;
			case 7:
				$this->setObsliq($value);
				break;
			case 8:
				$this->setStatus($value);
				break;
			case 9:
				$this->setFecapr($value);
				break;
			case 10:
				$this->setUsrapr($value);
				break;
			case 11:
				$this->setStacie($value);
				break;
			case 12:
				$this->setStacpr($value);
				break;
			case 13:
				$this->setFecaprcp($value);
				break;
			case 14:
				$this->setUsraprcp($value);
				break;
			case 15:
				$this->setCodcie($value);
				break;
			case 16:
				$this->setLoguse($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HcliqreePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodliq($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedfam($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipliq($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecliq($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonsol($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonliq($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setObsliq($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStatus($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecapr($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUsrapr($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStacie($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setStacpr($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecaprcp($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUsraprcp($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCodcie($arr[$keys[15]]);
                if (array_key_exists($keys[16], $arr)) $this->setLoguse($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HcliqreePeer::DATABASE_NAME);

		if ($this->isColumnModified(HcliqreePeer::CODLIQ)) $criteria->add(HcliqreePeer::CODLIQ, $this->codliq);
		if ($this->isColumnModified(HcliqreePeer::CODEMP)) $criteria->add(HcliqreePeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(HcliqreePeer::CEDFAM)) $criteria->add(HcliqreePeer::CEDFAM, $this->cedfam);
		if ($this->isColumnModified(HcliqreePeer::TIPLIQ)) $criteria->add(HcliqreePeer::TIPLIQ, $this->tipliq);
		if ($this->isColumnModified(HcliqreePeer::FECLIQ)) $criteria->add(HcliqreePeer::FECLIQ, $this->fecliq);
		if ($this->isColumnModified(HcliqreePeer::MONSOL)) $criteria->add(HcliqreePeer::MONSOL, $this->monsol);
		if ($this->isColumnModified(HcliqreePeer::MONLIQ)) $criteria->add(HcliqreePeer::MONLIQ, $this->monliq);
		if ($this->isColumnModified(HcliqreePeer::OBSLIQ)) $criteria->add(HcliqreePeer::OBSLIQ, $this->obsliq);
		if ($this->isColumnModified(HcliqreePeer::STATUS)) $criteria->add(HcliqreePeer::STATUS, $this->status);
		if ($this->isColumnModified(HcliqreePeer::FECAPR)) $criteria->add(HcliqreePeer::FECAPR, $this->fecapr);
		if ($this->isColumnModified(HcliqreePeer::USRAPR)) $criteria->add(HcliqreePeer::USRAPR, $this->usrapr);
		if ($this->isColumnModified(HcliqreePeer::STACIE)) $criteria->add(HcliqreePeer::STACIE, $this->stacie);
		if ($this->isColumnModified(HcliqreePeer::STACPR)) $criteria->add(HcliqreePeer::STACPR, $this->stacpr);
		if ($this->isColumnModified(HcliqreePeer::FECAPRCP)) $criteria->add(HcliqreePeer::FECAPRCP, $this->fecaprcp);
		if ($this->isColumnModified(HcliqreePeer::USRAPRCP)) $criteria->add(HcliqreePeer::USRAPRCP, $this->usraprcp);
		if ($this->isColumnModified(HcliqreePeer::CODCIE)) $criteria->add(HcliqreePeer::CODCIE, $this->codcie);
		if ($this->isColumnModified(HcliqreePeer::LOGUSE)) $criteria->add(HcliqreePeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(HcliqreePeer::ID)) $criteria->add(HcliqreePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HcliqreePeer::DATABASE_NAME);

		$criteria->add(HcliqreePeer::ID, $this->id);

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

		$copyObj->setCodliq($this->codliq);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCedfam($this->cedfam);

		$copyObj->setTipliq($this->tipliq);

		$copyObj->setFecliq($this->fecliq);

		$copyObj->setMonsol($this->monsol);

		$copyObj->setMonliq($this->monliq);

		$copyObj->setObsliq($this->obsliq);

		$copyObj->setStatus($this->status);

		$copyObj->setFecapr($this->fecapr);

		$copyObj->setUsrapr($this->usrapr);

		$copyObj->setStacie($this->stacie);

		$copyObj->setStacpr($this->stacpr);

		$copyObj->setFecaprcp($this->fecaprcp);

		$copyObj->setUsraprcp($this->usraprcp);

		$copyObj->setCodcie($this->codcie);

		$copyObj->setLoguse($this->loguse);


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
			self::$peer = new HcliqreePeer();
		}
		return self::$peer;
	}

} 