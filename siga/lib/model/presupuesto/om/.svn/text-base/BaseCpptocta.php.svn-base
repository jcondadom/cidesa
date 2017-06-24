<?php


abstract class BaseCpptocta extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpta;


	
	protected $fecpta;


	
	protected $codubiori;


	
	protected $codubides;


	
	protected $asunto;


	
	protected $motivo;


	
	protected $reccon;


	
	protected $loguse;


	
	protected $aprpto;


	
	protected $usuapr;


	
	protected $fecapr;


	
	protected $coddirec;


	
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

  
  public function getCodubiori()
  {

    return trim($this->codubiori);

  }
  
  public function getCodubides()
  {

    return trim($this->codubides);

  }
  
  public function getAsunto()
  {

    return trim($this->asunto);

  }
  
  public function getMotivo()
  {

    return trim($this->motivo);

  }
  
  public function getReccon()
  {

    return trim($this->reccon);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

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

  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumpta($v)
	{

    if ($this->numpta !== $v) {
        $this->numpta = $v;
        $this->modifiedColumns[] = CpptoctaPeer::NUMPTA;
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
      $this->modifiedColumns[] = CpptoctaPeer::FECPTA;
    }

	} 
	
	public function setCodubiori($v)
	{

    if ($this->codubiori !== $v) {
        $this->codubiori = $v;
        $this->modifiedColumns[] = CpptoctaPeer::CODUBIORI;
      }
  
	} 
	
	public function setCodubides($v)
	{

    if ($this->codubides !== $v) {
        $this->codubides = $v;
        $this->modifiedColumns[] = CpptoctaPeer::CODUBIDES;
      }
  
	} 
	
	public function setAsunto($v)
	{

    if ($this->asunto !== $v) {
        $this->asunto = $v;
        $this->modifiedColumns[] = CpptoctaPeer::ASUNTO;
      }
  
	} 
	
	public function setMotivo($v)
	{

    if ($this->motivo !== $v) {
        $this->motivo = $v;
        $this->modifiedColumns[] = CpptoctaPeer::MOTIVO;
      }
  
	} 
	
	public function setReccon($v)
	{

    if ($this->reccon !== $v) {
        $this->reccon = $v;
        $this->modifiedColumns[] = CpptoctaPeer::RECCON;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = CpptoctaPeer::LOGUSE;
      }
  
	} 
	
	public function setAprpto($v)
	{

    if ($this->aprpto !== $v) {
        $this->aprpto = $v;
        $this->modifiedColumns[] = CpptoctaPeer::APRPTO;
      }
  
	} 
	
	public function setUsuapr($v)
	{

    if ($this->usuapr !== $v) {
        $this->usuapr = $v;
        $this->modifiedColumns[] = CpptoctaPeer::USUAPR;
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
      $this->modifiedColumns[] = CpptoctaPeer::FECAPR;
    }

	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = CpptoctaPeer::CODDIREC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpptoctaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpta = $rs->getString($startcol + 0);

      $this->fecpta = $rs->getDate($startcol + 1, null);

      $this->codubiori = $rs->getString($startcol + 2);

      $this->codubides = $rs->getString($startcol + 3);

      $this->asunto = $rs->getString($startcol + 4);

      $this->motivo = $rs->getString($startcol + 5);

      $this->reccon = $rs->getString($startcol + 6);

      $this->loguse = $rs->getString($startcol + 7);

      $this->aprpto = $rs->getString($startcol + 8);

      $this->usuapr = $rs->getString($startcol + 9);

      $this->fecapr = $rs->getDate($startcol + 10, null);

      $this->coddirec = $rs->getString($startcol + 11);

      $this->id = $rs->getInt($startcol + 12);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 13; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpptocta object", $e);
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
			$con = Propel::getConnection(CpptoctaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpptoctaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpptoctaPeer::DATABASE_NAME);
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
					$pk = CpptoctaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpptoctaPeer::doUpdate($this, $con);
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


			if (($retval = CpptoctaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpptoctaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCodubiori();
				break;
			case 3:
				return $this->getCodubides();
				break;
			case 4:
				return $this->getAsunto();
				break;
			case 5:
				return $this->getMotivo();
				break;
			case 6:
				return $this->getReccon();
				break;
			case 7:
				return $this->getLoguse();
				break;
			case 8:
				return $this->getAprpto();
				break;
			case 9:
				return $this->getUsuapr();
				break;
			case 10:
				return $this->getFecapr();
				break;
			case 11:
				return $this->getCoddirec();
				break;
			case 12:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpptoctaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpta(),
			$keys[1] => $this->getFecpta(),
			$keys[2] => $this->getCodubiori(),
			$keys[3] => $this->getCodubides(),
			$keys[4] => $this->getAsunto(),
			$keys[5] => $this->getMotivo(),
			$keys[6] => $this->getReccon(),
			$keys[7] => $this->getLoguse(),
			$keys[8] => $this->getAprpto(),
			$keys[9] => $this->getUsuapr(),
			$keys[10] => $this->getFecapr(),
			$keys[11] => $this->getCoddirec(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpptoctaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCodubiori($value);
				break;
			case 3:
				$this->setCodubides($value);
				break;
			case 4:
				$this->setAsunto($value);
				break;
			case 5:
				$this->setMotivo($value);
				break;
			case 6:
				$this->setReccon($value);
				break;
			case 7:
				$this->setLoguse($value);
				break;
			case 8:
				$this->setAprpto($value);
				break;
			case 9:
				$this->setUsuapr($value);
				break;
			case 10:
				$this->setFecapr($value);
				break;
			case 11:
				$this->setCoddirec($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpptoctaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpta($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecpta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodubiori($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodubides($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAsunto($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMotivo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setReccon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setLoguse($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAprpto($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUsuapr($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecapr($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCoddirec($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpptoctaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpptoctaPeer::NUMPTA)) $criteria->add(CpptoctaPeer::NUMPTA, $this->numpta);
		if ($this->isColumnModified(CpptoctaPeer::FECPTA)) $criteria->add(CpptoctaPeer::FECPTA, $this->fecpta);
		if ($this->isColumnModified(CpptoctaPeer::CODUBIORI)) $criteria->add(CpptoctaPeer::CODUBIORI, $this->codubiori);
		if ($this->isColumnModified(CpptoctaPeer::CODUBIDES)) $criteria->add(CpptoctaPeer::CODUBIDES, $this->codubides);
		if ($this->isColumnModified(CpptoctaPeer::ASUNTO)) $criteria->add(CpptoctaPeer::ASUNTO, $this->asunto);
		if ($this->isColumnModified(CpptoctaPeer::MOTIVO)) $criteria->add(CpptoctaPeer::MOTIVO, $this->motivo);
		if ($this->isColumnModified(CpptoctaPeer::RECCON)) $criteria->add(CpptoctaPeer::RECCON, $this->reccon);
		if ($this->isColumnModified(CpptoctaPeer::LOGUSE)) $criteria->add(CpptoctaPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(CpptoctaPeer::APRPTO)) $criteria->add(CpptoctaPeer::APRPTO, $this->aprpto);
		if ($this->isColumnModified(CpptoctaPeer::USUAPR)) $criteria->add(CpptoctaPeer::USUAPR, $this->usuapr);
		if ($this->isColumnModified(CpptoctaPeer::FECAPR)) $criteria->add(CpptoctaPeer::FECAPR, $this->fecapr);
		if ($this->isColumnModified(CpptoctaPeer::CODDIREC)) $criteria->add(CpptoctaPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(CpptoctaPeer::ID)) $criteria->add(CpptoctaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpptoctaPeer::DATABASE_NAME);

		$criteria->add(CpptoctaPeer::ID, $this->id);

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

		$copyObj->setCodubiori($this->codubiori);

		$copyObj->setCodubides($this->codubides);

		$copyObj->setAsunto($this->asunto);

		$copyObj->setMotivo($this->motivo);

		$copyObj->setReccon($this->reccon);

		$copyObj->setLoguse($this->loguse);

		$copyObj->setAprpto($this->aprpto);

		$copyObj->setUsuapr($this->usuapr);

		$copyObj->setFecapr($this->fecapr);

		$copyObj->setCoddirec($this->coddirec);


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
			self::$peer = new CpptoctaPeer();
		}
		return self::$peer;
	}

} 