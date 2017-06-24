<?php


abstract class BaseFaordtra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reford;


	
	protected $fecord;


	
	protected $refcot;


	
	protected $refpre;


	
	protected $codcli;


	
	protected $codsed;


	
	protected $codemb;


	
	protected $desord;


	
	protected $diacul;


	
	protected $reapor;


	
	protected $aprordtra = 'N';


	
	protected $usuaprord;


	
	protected $fecaprord;


	
	protected $obsaprord;


	
	protected $recordtra = 'N';


	
	protected $usurecord;


	
	protected $fecrecord;


	
	protected $obsrecord;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReford()
  {

    return trim($this->reford);

  }
  
  public function getFecord($format = 'Y-m-d')
  {

    if ($this->fecord === null || $this->fecord === '') {
      return null;
    } elseif (!is_int($this->fecord)) {
            $ts = adodb_strtotime($this->fecord);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecord] as date/time value: " . var_export($this->fecord, true));
      }
    } else {
      $ts = $this->fecord;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRefcot()
  {

    return trim($this->refcot);

  }
  
  public function getRefpre()
  {

    return trim($this->refpre);

  }
  
  public function getCodcli()
  {

    return trim($this->codcli);

  }
  
  public function getCodsed()
  {

    return trim($this->codsed);

  }
  
  public function getCodemb()
  {

    return trim($this->codemb);

  }
  
  public function getDesord()
  {

    return trim($this->desord);

  }
  
  public function getDiacul()
  {

    return $this->diacul;

  }
  
  public function getReapor()
  {

    return trim($this->reapor);

  }
  
  public function getAprordtra()
  {

    return trim($this->aprordtra);

  }
  
  public function getUsuaprord()
  {

    return trim($this->usuaprord);

  }
  
  public function getFecaprord($format = 'Y-m-d')
  {

    if ($this->fecaprord === null || $this->fecaprord === '') {
      return null;
    } elseif (!is_int($this->fecaprord)) {
            $ts = adodb_strtotime($this->fecaprord);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecaprord] as date/time value: " . var_export($this->fecaprord, true));
      }
    } else {
      $ts = $this->fecaprord;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getObsaprord()
  {

    return trim($this->obsaprord);

  }
  
  public function getRecordtra()
  {

    return trim($this->recordtra);

  }
  
  public function getUsurecord()
  {

    return trim($this->usurecord);

  }
  
  public function getFecrecord($format = 'Y-m-d')
  {

    if ($this->fecrecord === null || $this->fecrecord === '') {
      return null;
    } elseif (!is_int($this->fecrecord)) {
            $ts = adodb_strtotime($this->fecrecord);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrecord] as date/time value: " . var_export($this->fecrecord, true));
      }
    } else {
      $ts = $this->fecrecord;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getObsrecord()
  {

    return trim($this->obsrecord);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReford($v)
	{

    if ($this->reford !== $v) {
        $this->reford = $v;
        $this->modifiedColumns[] = FaordtraPeer::REFORD;
      }
  
	} 
	
	public function setFecord($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecord] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecord !== $ts) {
      $this->fecord = $ts;
      $this->modifiedColumns[] = FaordtraPeer::FECORD;
    }

	} 
	
	public function setRefcot($v)
	{

    if ($this->refcot !== $v) {
        $this->refcot = $v;
        $this->modifiedColumns[] = FaordtraPeer::REFCOT;
      }
  
	} 
	
	public function setRefpre($v)
	{

    if ($this->refpre !== $v) {
        $this->refpre = $v;
        $this->modifiedColumns[] = FaordtraPeer::REFPRE;
      }
  
	} 
	
	public function setCodcli($v)
	{

    if ($this->codcli !== $v) {
        $this->codcli = $v;
        $this->modifiedColumns[] = FaordtraPeer::CODCLI;
      }
  
	} 
	
	public function setCodsed($v)
	{

    if ($this->codsed !== $v) {
        $this->codsed = $v;
        $this->modifiedColumns[] = FaordtraPeer::CODSED;
      }
  
	} 
	
	public function setCodemb($v)
	{

    if ($this->codemb !== $v) {
        $this->codemb = $v;
        $this->modifiedColumns[] = FaordtraPeer::CODEMB;
      }
  
	} 
	
	public function setDesord($v)
	{

    if ($this->desord !== $v) {
        $this->desord = $v;
        $this->modifiedColumns[] = FaordtraPeer::DESORD;
      }
  
	} 
	
	public function setDiacul($v)
	{

    if ($this->diacul !== $v) {
        $this->diacul = $v;
        $this->modifiedColumns[] = FaordtraPeer::DIACUL;
      }
  
	} 
	
	public function setReapor($v)
	{

    if ($this->reapor !== $v) {
        $this->reapor = $v;
        $this->modifiedColumns[] = FaordtraPeer::REAPOR;
      }
  
	} 
	
	public function setAprordtra($v)
	{

    if ($this->aprordtra !== $v || $v === 'N') {
        $this->aprordtra = $v;
        $this->modifiedColumns[] = FaordtraPeer::APRORDTRA;
      }
  
	} 
	
	public function setUsuaprord($v)
	{

    if ($this->usuaprord !== $v) {
        $this->usuaprord = $v;
        $this->modifiedColumns[] = FaordtraPeer::USUAPRORD;
      }
  
	} 
	
	public function setFecaprord($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecaprord] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecaprord !== $ts) {
      $this->fecaprord = $ts;
      $this->modifiedColumns[] = FaordtraPeer::FECAPRORD;
    }

	} 
	
	public function setObsaprord($v)
	{

    if ($this->obsaprord !== $v) {
        $this->obsaprord = $v;
        $this->modifiedColumns[] = FaordtraPeer::OBSAPRORD;
      }
  
	} 
	
	public function setRecordtra($v)
	{

    if ($this->recordtra !== $v || $v === 'N') {
        $this->recordtra = $v;
        $this->modifiedColumns[] = FaordtraPeer::RECORDTRA;
      }
  
	} 
	
	public function setUsurecord($v)
	{

    if ($this->usurecord !== $v) {
        $this->usurecord = $v;
        $this->modifiedColumns[] = FaordtraPeer::USURECORD;
      }
  
	} 
	
	public function setFecrecord($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrecord] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrecord !== $ts) {
      $this->fecrecord = $ts;
      $this->modifiedColumns[] = FaordtraPeer::FECRECORD;
    }

	} 
	
	public function setObsrecord($v)
	{

    if ($this->obsrecord !== $v) {
        $this->obsrecord = $v;
        $this->modifiedColumns[] = FaordtraPeer::OBSRECORD;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaordtraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reford = $rs->getString($startcol + 0);

      $this->fecord = $rs->getDate($startcol + 1, null);

      $this->refcot = $rs->getString($startcol + 2);

      $this->refpre = $rs->getString($startcol + 3);

      $this->codcli = $rs->getString($startcol + 4);

      $this->codsed = $rs->getString($startcol + 5);

      $this->codemb = $rs->getString($startcol + 6);

      $this->desord = $rs->getString($startcol + 7);

      $this->diacul = $rs->getInt($startcol + 8);

      $this->reapor = $rs->getString($startcol + 9);

      $this->aprordtra = $rs->getString($startcol + 10);

      $this->usuaprord = $rs->getString($startcol + 11);

      $this->fecaprord = $rs->getDate($startcol + 12, null);

      $this->obsaprord = $rs->getString($startcol + 13);

      $this->recordtra = $rs->getString($startcol + 14);

      $this->usurecord = $rs->getString($startcol + 15);

      $this->fecrecord = $rs->getDate($startcol + 16, null);

      $this->obsrecord = $rs->getString($startcol + 17);

      $this->id = $rs->getInt($startcol + 18);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 19; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faordtra object", $e);
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
			$con = Propel::getConnection(FaordtraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaordtraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaordtraPeer::DATABASE_NAME);
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
					$pk = FaordtraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaordtraPeer::doUpdate($this, $con);
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


			if (($retval = FaordtraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaordtraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReford();
				break;
			case 1:
				return $this->getFecord();
				break;
			case 2:
				return $this->getRefcot();
				break;
			case 3:
				return $this->getRefpre();
				break;
			case 4:
				return $this->getCodcli();
				break;
			case 5:
				return $this->getCodsed();
				break;
			case 6:
				return $this->getCodemb();
				break;
			case 7:
				return $this->getDesord();
				break;
			case 8:
				return $this->getDiacul();
				break;
			case 9:
				return $this->getReapor();
				break;
			case 10:
				return $this->getAprordtra();
				break;
			case 11:
				return $this->getUsuaprord();
				break;
			case 12:
				return $this->getFecaprord();
				break;
			case 13:
				return $this->getObsaprord();
				break;
			case 14:
				return $this->getRecordtra();
				break;
			case 15:
				return $this->getUsurecord();
				break;
			case 16:
				return $this->getFecrecord();
				break;
			case 17:
				return $this->getObsrecord();
				break;
			case 18:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaordtraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReford(),
			$keys[1] => $this->getFecord(),
			$keys[2] => $this->getRefcot(),
			$keys[3] => $this->getRefpre(),
			$keys[4] => $this->getCodcli(),
			$keys[5] => $this->getCodsed(),
			$keys[6] => $this->getCodemb(),
			$keys[7] => $this->getDesord(),
			$keys[8] => $this->getDiacul(),
			$keys[9] => $this->getReapor(),
			$keys[10] => $this->getAprordtra(),
			$keys[11] => $this->getUsuaprord(),
			$keys[12] => $this->getFecaprord(),
			$keys[13] => $this->getObsaprord(),
			$keys[14] => $this->getRecordtra(),
			$keys[15] => $this->getUsurecord(),
			$keys[16] => $this->getFecrecord(),
			$keys[17] => $this->getObsrecord(),
			$keys[18] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaordtraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReford($value);
				break;
			case 1:
				$this->setFecord($value);
				break;
			case 2:
				$this->setRefcot($value);
				break;
			case 3:
				$this->setRefpre($value);
				break;
			case 4:
				$this->setCodcli($value);
				break;
			case 5:
				$this->setCodsed($value);
				break;
			case 6:
				$this->setCodemb($value);
				break;
			case 7:
				$this->setDesord($value);
				break;
			case 8:
				$this->setDiacul($value);
				break;
			case 9:
				$this->setReapor($value);
				break;
			case 10:
				$this->setAprordtra($value);
				break;
			case 11:
				$this->setUsuaprord($value);
				break;
			case 12:
				$this->setFecaprord($value);
				break;
			case 13:
				$this->setObsaprord($value);
				break;
			case 14:
				$this->setRecordtra($value);
				break;
			case 15:
				$this->setUsurecord($value);
				break;
			case 16:
				$this->setFecrecord($value);
				break;
			case 17:
				$this->setObsrecord($value);
				break;
			case 18:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaordtraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReford($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecord($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRefcot($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefpre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodcli($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodsed($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodemb($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDesord($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDiacul($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setReapor($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAprordtra($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUsuaprord($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecaprord($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setObsaprord($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setRecordtra($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUsurecord($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecrecord($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setObsrecord($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaordtraPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaordtraPeer::REFORD)) $criteria->add(FaordtraPeer::REFORD, $this->reford);
		if ($this->isColumnModified(FaordtraPeer::FECORD)) $criteria->add(FaordtraPeer::FECORD, $this->fecord);
		if ($this->isColumnModified(FaordtraPeer::REFCOT)) $criteria->add(FaordtraPeer::REFCOT, $this->refcot);
		if ($this->isColumnModified(FaordtraPeer::REFPRE)) $criteria->add(FaordtraPeer::REFPRE, $this->refpre);
		if ($this->isColumnModified(FaordtraPeer::CODCLI)) $criteria->add(FaordtraPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(FaordtraPeer::CODSED)) $criteria->add(FaordtraPeer::CODSED, $this->codsed);
		if ($this->isColumnModified(FaordtraPeer::CODEMB)) $criteria->add(FaordtraPeer::CODEMB, $this->codemb);
		if ($this->isColumnModified(FaordtraPeer::DESORD)) $criteria->add(FaordtraPeer::DESORD, $this->desord);
		if ($this->isColumnModified(FaordtraPeer::DIACUL)) $criteria->add(FaordtraPeer::DIACUL, $this->diacul);
		if ($this->isColumnModified(FaordtraPeer::REAPOR)) $criteria->add(FaordtraPeer::REAPOR, $this->reapor);
		if ($this->isColumnModified(FaordtraPeer::APRORDTRA)) $criteria->add(FaordtraPeer::APRORDTRA, $this->aprordtra);
		if ($this->isColumnModified(FaordtraPeer::USUAPRORD)) $criteria->add(FaordtraPeer::USUAPRORD, $this->usuaprord);
		if ($this->isColumnModified(FaordtraPeer::FECAPRORD)) $criteria->add(FaordtraPeer::FECAPRORD, $this->fecaprord);
		if ($this->isColumnModified(FaordtraPeer::OBSAPRORD)) $criteria->add(FaordtraPeer::OBSAPRORD, $this->obsaprord);
		if ($this->isColumnModified(FaordtraPeer::RECORDTRA)) $criteria->add(FaordtraPeer::RECORDTRA, $this->recordtra);
		if ($this->isColumnModified(FaordtraPeer::USURECORD)) $criteria->add(FaordtraPeer::USURECORD, $this->usurecord);
		if ($this->isColumnModified(FaordtraPeer::FECRECORD)) $criteria->add(FaordtraPeer::FECRECORD, $this->fecrecord);
		if ($this->isColumnModified(FaordtraPeer::OBSRECORD)) $criteria->add(FaordtraPeer::OBSRECORD, $this->obsrecord);
		if ($this->isColumnModified(FaordtraPeer::ID)) $criteria->add(FaordtraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaordtraPeer::DATABASE_NAME);

		$criteria->add(FaordtraPeer::ID, $this->id);

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

		$copyObj->setReford($this->reford);

		$copyObj->setFecord($this->fecord);

		$copyObj->setRefcot($this->refcot);

		$copyObj->setRefpre($this->refpre);

		$copyObj->setCodcli($this->codcli);

		$copyObj->setCodsed($this->codsed);

		$copyObj->setCodemb($this->codemb);

		$copyObj->setDesord($this->desord);

		$copyObj->setDiacul($this->diacul);

		$copyObj->setReapor($this->reapor);

		$copyObj->setAprordtra($this->aprordtra);

		$copyObj->setUsuaprord($this->usuaprord);

		$copyObj->setFecaprord($this->fecaprord);

		$copyObj->setObsaprord($this->obsaprord);

		$copyObj->setRecordtra($this->recordtra);

		$copyObj->setUsurecord($this->usurecord);

		$copyObj->setFecrecord($this->fecrecord);

		$copyObj->setObsrecord($this->obsrecord);


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
			self::$peer = new FaordtraPeer();
		}
		return self::$peer;
	}

} 