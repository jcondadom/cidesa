<?php


abstract class BaseNpptocta extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpta;


	
	protected $fecpta;


	
	protected $codempa;


	
	protected $codempp;


	
	protected $tippto;


	
	protected $loguse;


	
	protected $codemp;


	
	protected $codnom;


	
	protected $codcar;


	
	protected $aprpto;


	
	protected $usuapr;


	
	protected $fecapr;


	
	protected $ptousa;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumpta()
  {

    return trim($this->numpta);

  }
  
  public function getFecpta($format = 'Y-m-d')
  {

    if ($this->fecpta === null || $this->fecpta === '') {
      return null;
    } elseif (!is_int($this->fecpta)) {
            $ts = adodb_strtotime($this->fecpta);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpta] as date/time value: " . var_export($this->fecpta, true));
      }
    } else {
      $ts = $this->fecpta;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodempa()
  {

    return trim($this->codempa);

  }
  
  public function getCodempp()
  {

    return trim($this->codempp);

  }
  
  public function getTippto()
  {

    return trim($this->tippto);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getAprpto()
  {

    return trim($this->aprpto);

  }
  
  public function getUsuapr()
  {

    return trim($this->usuapr);

  }
  
  public function getFecapr($format = 'Y-m-d')
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

  
  public function getPtousa()
  {

    return trim($this->ptousa);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumpta($v)
	{

    if ($this->numpta !== $v) {
        $this->numpta = $v;
        $this->modifiedColumns[] = NpptoctaPeer::NUMPTA;
      }
  
	} 
	
	public function setFecpta($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpta] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpta !== $ts) {
      $this->fecpta = $ts;
      $this->modifiedColumns[] = NpptoctaPeer::FECPTA;
    }

	} 
	
	public function setCodempa($v)
	{

    if ($this->codempa !== $v) {
        $this->codempa = $v;
        $this->modifiedColumns[] = NpptoctaPeer::CODEMPA;
      }
  
	} 
	
	public function setCodempp($v)
	{

    if ($this->codempp !== $v) {
        $this->codempp = $v;
        $this->modifiedColumns[] = NpptoctaPeer::CODEMPP;
      }
  
	} 
	
	public function setTippto($v)
	{

    if ($this->tippto !== $v) {
        $this->tippto = $v;
        $this->modifiedColumns[] = NpptoctaPeer::TIPPTO;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = NpptoctaPeer::LOGUSE;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpptoctaPeer::CODEMP;
      }
  
	} 
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpptoctaPeer::CODNOM;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NpptoctaPeer::CODCAR;
      }
  
	} 
	
	public function setAprpto($v)
	{

    if ($this->aprpto !== $v) {
        $this->aprpto = $v;
        $this->modifiedColumns[] = NpptoctaPeer::APRPTO;
      }
  
	} 
	
	public function setUsuapr($v)
	{

    if ($this->usuapr !== $v) {
        $this->usuapr = $v;
        $this->modifiedColumns[] = NpptoctaPeer::USUAPR;
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
      $this->modifiedColumns[] = NpptoctaPeer::FECAPR;
    }

	} 
	
	public function setPtousa($v)
	{

    if ($this->ptousa !== $v) {
        $this->ptousa = $v;
        $this->modifiedColumns[] = NpptoctaPeer::PTOUSA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpptoctaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpta = $rs->getString($startcol + 0);

      $this->fecpta = $rs->getDate($startcol + 1, null);

      $this->codempa = $rs->getString($startcol + 2);

      $this->codempp = $rs->getString($startcol + 3);

      $this->tippto = $rs->getString($startcol + 4);

      $this->loguse = $rs->getString($startcol + 5);

      $this->codemp = $rs->getString($startcol + 6);

      $this->codnom = $rs->getString($startcol + 7);

      $this->codcar = $rs->getString($startcol + 8);

      $this->aprpto = $rs->getString($startcol + 9);

      $this->usuapr = $rs->getString($startcol + 10);

      $this->fecapr = $rs->getDate($startcol + 11, null);

      $this->ptousa = $rs->getString($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npptocta object", $e);
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
			$con = Propel::getConnection(NpptoctaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpptoctaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpptoctaPeer::DATABASE_NAME);
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
					$pk = NpptoctaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpptoctaPeer::doUpdate($this, $con);
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


			if (($retval = NpptoctaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpptoctaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpta();
				break;
			case 1:
				return $this->getFecpta();
				break;
			case 2:
				return $this->getCodempa();
				break;
			case 3:
				return $this->getCodempp();
				break;
			case 4:
				return $this->getTippto();
				break;
			case 5:
				return $this->getLoguse();
				break;
			case 6:
				return $this->getCodemp();
				break;
			case 7:
				return $this->getCodnom();
				break;
			case 8:
				return $this->getCodcar();
				break;
			case 9:
				return $this->getAprpto();
				break;
			case 10:
				return $this->getUsuapr();
				break;
			case 11:
				return $this->getFecapr();
				break;
			case 12:
				return $this->getPtousa();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpptoctaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpta(),
			$keys[1] => $this->getFecpta(),
			$keys[2] => $this->getCodempa(),
			$keys[3] => $this->getCodempp(),
			$keys[4] => $this->getTippto(),
			$keys[5] => $this->getLoguse(),
			$keys[6] => $this->getCodemp(),
			$keys[7] => $this->getCodnom(),
			$keys[8] => $this->getCodcar(),
			$keys[9] => $this->getAprpto(),
			$keys[10] => $this->getUsuapr(),
			$keys[11] => $this->getFecapr(),
			$keys[12] => $this->getPtousa(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpptoctaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpta($value);
				break;
			case 1:
				$this->setFecpta($value);
				break;
			case 2:
				$this->setCodempa($value);
				break;
			case 3:
				$this->setCodempp($value);
				break;
			case 4:
				$this->setTippto($value);
				break;
			case 5:
				$this->setLoguse($value);
				break;
			case 6:
				$this->setCodemp($value);
				break;
			case 7:
				$this->setCodnom($value);
				break;
			case 8:
				$this->setCodcar($value);
				break;
			case 9:
				$this->setAprpto($value);
				break;
			case 10:
				$this->setUsuapr($value);
				break;
			case 11:
				$this->setFecapr($value);
				break;
			case 12:
				$this->setPtousa($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpptoctaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpta($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecpta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodempa($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodempp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTippto($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLoguse($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodemp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodnom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodcar($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAprpto($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUsuapr($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecapr($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPtousa($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpptoctaPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpptoctaPeer::NUMPTA)) $criteria->add(NpptoctaPeer::NUMPTA, $this->numpta);
		if ($this->isColumnModified(NpptoctaPeer::FECPTA)) $criteria->add(NpptoctaPeer::FECPTA, $this->fecpta);
		if ($this->isColumnModified(NpptoctaPeer::CODEMPA)) $criteria->add(NpptoctaPeer::CODEMPA, $this->codempa);
		if ($this->isColumnModified(NpptoctaPeer::CODEMPP)) $criteria->add(NpptoctaPeer::CODEMPP, $this->codempp);
		if ($this->isColumnModified(NpptoctaPeer::TIPPTO)) $criteria->add(NpptoctaPeer::TIPPTO, $this->tippto);
		if ($this->isColumnModified(NpptoctaPeer::LOGUSE)) $criteria->add(NpptoctaPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(NpptoctaPeer::CODEMP)) $criteria->add(NpptoctaPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpptoctaPeer::CODNOM)) $criteria->add(NpptoctaPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpptoctaPeer::CODCAR)) $criteria->add(NpptoctaPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpptoctaPeer::APRPTO)) $criteria->add(NpptoctaPeer::APRPTO, $this->aprpto);
		if ($this->isColumnModified(NpptoctaPeer::USUAPR)) $criteria->add(NpptoctaPeer::USUAPR, $this->usuapr);
		if ($this->isColumnModified(NpptoctaPeer::FECAPR)) $criteria->add(NpptoctaPeer::FECAPR, $this->fecapr);
		if ($this->isColumnModified(NpptoctaPeer::PTOUSA)) $criteria->add(NpptoctaPeer::PTOUSA, $this->ptousa);
		if ($this->isColumnModified(NpptoctaPeer::ID)) $criteria->add(NpptoctaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpptoctaPeer::DATABASE_NAME);

		$criteria->add(NpptoctaPeer::ID, $this->id);

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

		$copyObj->setNumpta($this->numpta);

		$copyObj->setFecpta($this->fecpta);

		$copyObj->setCodempa($this->codempa);

		$copyObj->setCodempp($this->codempp);

		$copyObj->setTippto($this->tippto);

		$copyObj->setLoguse($this->loguse);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setAprpto($this->aprpto);

		$copyObj->setUsuapr($this->usuapr);

		$copyObj->setFecapr($this->fecapr);

		$copyObj->setPtousa($this->ptousa);


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
			self::$peer = new NpptoctaPeer();
		}
		return self::$peer;
	}

} 