<?php


abstract class BaseHcgasfun extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codgas;


	
	protected $codemp;


	
	protected $cedfam;


	
	protected $fecgas;


	
	protected $mongas;


	
	protected $obsgas;


	
	protected $nrofac;


	
	protected $fecfac;


	
	protected $fecrecfac;


	
	protected $genop;


	
	protected $titpro;


	
	protected $rifpro;


	
	protected $loguse;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodgas()
  {

    return trim($this->codgas);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCedfam()
  {

    return trim($this->cedfam);

  }
  
  public function getFecgas($format = 'Y-m-d H:i:s')
  {

    if ($this->fecgas === null || $this->fecgas === '') {
      return null;
    } elseif (!is_int($this->fecgas)) {
            $ts = adodb_strtotime($this->fecgas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecgas] as date/time value: " . var_export($this->fecgas, true));
      }
    } else {
      $ts = $this->fecgas;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMongas($val=false)
  {

    if($val) return number_format($this->mongas,2,',','.');
    else return $this->mongas;

  }
  
  public function getObsgas()
  {

    return trim($this->obsgas);

  }
  
  public function getNrofac()
  {

    return trim($this->nrofac);

  }
  
  public function getFecfac($format = 'Y-m-d H:i:s')
  {

    if ($this->fecfac === null || $this->fecfac === '') {
      return null;
    } elseif (!is_int($this->fecfac)) {
            $ts = adodb_strtotime($this->fecfac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfac] as date/time value: " . var_export($this->fecfac, true));
      }
    } else {
      $ts = $this->fecfac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecrecfac($format = 'Y-m-d H:i:s')
  {

    if ($this->fecrecfac === null || $this->fecrecfac === '') {
      return null;
    } elseif (!is_int($this->fecrecfac)) {
            $ts = adodb_strtotime($this->fecrecfac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrecfac] as date/time value: " . var_export($this->fecrecfac, true));
      }
    } else {
      $ts = $this->fecrecfac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getGenop()
  {

    return $this->genop;

  }
  
  public function getTitpro()
  {

    return $this->titpro;

  }
  
  public function getRifpro()
  {

    return trim($this->rifpro);

  }
  
  public function getLoguse()
  {

    return trim($this->loguse);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodgas($v)
	{

    if ($this->codgas !== $v) {
        $this->codgas = $v;
        $this->modifiedColumns[] = HcgasfunPeer::CODGAS;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = HcgasfunPeer::CODEMP;
      }
  
	} 
	
	public function setCedfam($v)
	{

    if ($this->cedfam !== $v) {
        $this->cedfam = $v;
        $this->modifiedColumns[] = HcgasfunPeer::CEDFAM;
      }
  
	} 
	
	public function setFecgas($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecgas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecgas !== $ts) {
      $this->fecgas = $ts;
      $this->modifiedColumns[] = HcgasfunPeer::FECGAS;
    }

	} 
	
	public function setMongas($v)
	{

    if ($this->mongas !== $v) {
        $this->mongas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = HcgasfunPeer::MONGAS;
      }
  
	} 
	
	public function setObsgas($v)
	{

    if ($this->obsgas !== $v) {
        $this->obsgas = $v;
        $this->modifiedColumns[] = HcgasfunPeer::OBSGAS;
      }
  
	} 
	
	public function setNrofac($v)
	{

    if ($this->nrofac !== $v) {
        $this->nrofac = $v;
        $this->modifiedColumns[] = HcgasfunPeer::NROFAC;
      }
  
	} 
	
	public function setFecfac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfac !== $ts) {
      $this->fecfac = $ts;
      $this->modifiedColumns[] = HcgasfunPeer::FECFAC;
    }

	} 
	
	public function setFecrecfac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrecfac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrecfac !== $ts) {
      $this->fecrecfac = $ts;
      $this->modifiedColumns[] = HcgasfunPeer::FECRECFAC;
    }

	} 
	
	public function setGenop($v)
	{

    if ($this->genop !== $v) {
        $this->genop = $v;
        $this->modifiedColumns[] = HcgasfunPeer::GENOP;
      }
  
	} 
	
	public function setTitpro($v)
	{

    if ($this->titpro !== $v) {
        $this->titpro = $v;
        $this->modifiedColumns[] = HcgasfunPeer::TITPRO;
      }
  
	} 
	
	public function setRifpro($v)
	{

    if ($this->rifpro !== $v) {
        $this->rifpro = $v;
        $this->modifiedColumns[] = HcgasfunPeer::RIFPRO;
      }
  
	} 
	
	public function setLoguse($v)
	{

    if ($this->loguse !== $v) {
        $this->loguse = $v;
        $this->modifiedColumns[] = HcgasfunPeer::LOGUSE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = HcgasfunPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codgas = $rs->getString($startcol + 0);

      $this->codemp = $rs->getString($startcol + 1);

      $this->cedfam = $rs->getString($startcol + 2);

      $this->fecgas = $rs->getTimestamp($startcol + 3, null);

      $this->mongas = $rs->getFloat($startcol + 4);

      $this->obsgas = $rs->getString($startcol + 5);

      $this->nrofac = $rs->getString($startcol + 6);

      $this->fecfac = $rs->getTimestamp($startcol + 7, null);

      $this->fecrecfac = $rs->getTimestamp($startcol + 8, null);

      $this->genop = $rs->getBoolean($startcol + 9);

      $this->titpro = $rs->getBoolean($startcol + 10);

      $this->rifpro = $rs->getString($startcol + 11);

      $this->loguse = $rs->getString($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Hcgasfun object", $e);
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
			$con = Propel::getConnection(HcgasfunPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			HcgasfunPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(HcgasfunPeer::DATABASE_NAME);
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
					$pk = HcgasfunPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += HcgasfunPeer::doUpdate($this, $con);
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


			if (($retval = HcgasfunPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HcgasfunPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodgas();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getCedfam();
				break;
			case 3:
				return $this->getFecgas();
				break;
			case 4:
				return $this->getMongas();
				break;
			case 5:
				return $this->getObsgas();
				break;
			case 6:
				return $this->getNrofac();
				break;
			case 7:
				return $this->getFecfac();
				break;
			case 8:
				return $this->getFecrecfac();
				break;
			case 9:
				return $this->getGenop();
				break;
			case 10:
				return $this->getTitpro();
				break;
			case 11:
				return $this->getRifpro();
				break;
			case 12:
				return $this->getLoguse();
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
		$keys = HcgasfunPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodgas(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getCedfam(),
			$keys[3] => $this->getFecgas(),
			$keys[4] => $this->getMongas(),
			$keys[5] => $this->getObsgas(),
			$keys[6] => $this->getNrofac(),
			$keys[7] => $this->getFecfac(),
			$keys[8] => $this->getFecrecfac(),
			$keys[9] => $this->getGenop(),
			$keys[10] => $this->getTitpro(),
			$keys[11] => $this->getRifpro(),
			$keys[12] => $this->getLoguse(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HcgasfunPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodgas($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setCedfam($value);
				break;
			case 3:
				$this->setFecgas($value);
				break;
			case 4:
				$this->setMongas($value);
				break;
			case 5:
				$this->setObsgas($value);
				break;
			case 6:
				$this->setNrofac($value);
				break;
			case 7:
				$this->setFecfac($value);
				break;
			case 8:
				$this->setFecrecfac($value);
				break;
			case 9:
				$this->setGenop($value);
				break;
			case 10:
				$this->setTitpro($value);
				break;
			case 11:
				$this->setRifpro($value);
				break;
			case 12:
				$this->setLoguse($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HcgasfunPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodgas($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedfam($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecgas($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMongas($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObsgas($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNrofac($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecfac($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFecrecfac($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setGenop($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTitpro($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setRifpro($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setLoguse($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(HcgasfunPeer::DATABASE_NAME);

		if ($this->isColumnModified(HcgasfunPeer::CODGAS)) $criteria->add(HcgasfunPeer::CODGAS, $this->codgas);
		if ($this->isColumnModified(HcgasfunPeer::CODEMP)) $criteria->add(HcgasfunPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(HcgasfunPeer::CEDFAM)) $criteria->add(HcgasfunPeer::CEDFAM, $this->cedfam);
		if ($this->isColumnModified(HcgasfunPeer::FECGAS)) $criteria->add(HcgasfunPeer::FECGAS, $this->fecgas);
		if ($this->isColumnModified(HcgasfunPeer::MONGAS)) $criteria->add(HcgasfunPeer::MONGAS, $this->mongas);
		if ($this->isColumnModified(HcgasfunPeer::OBSGAS)) $criteria->add(HcgasfunPeer::OBSGAS, $this->obsgas);
		if ($this->isColumnModified(HcgasfunPeer::NROFAC)) $criteria->add(HcgasfunPeer::NROFAC, $this->nrofac);
		if ($this->isColumnModified(HcgasfunPeer::FECFAC)) $criteria->add(HcgasfunPeer::FECFAC, $this->fecfac);
		if ($this->isColumnModified(HcgasfunPeer::FECRECFAC)) $criteria->add(HcgasfunPeer::FECRECFAC, $this->fecrecfac);
		if ($this->isColumnModified(HcgasfunPeer::GENOP)) $criteria->add(HcgasfunPeer::GENOP, $this->genop);
		if ($this->isColumnModified(HcgasfunPeer::TITPRO)) $criteria->add(HcgasfunPeer::TITPRO, $this->titpro);
		if ($this->isColumnModified(HcgasfunPeer::RIFPRO)) $criteria->add(HcgasfunPeer::RIFPRO, $this->rifpro);
		if ($this->isColumnModified(HcgasfunPeer::LOGUSE)) $criteria->add(HcgasfunPeer::LOGUSE, $this->loguse);
		if ($this->isColumnModified(HcgasfunPeer::ID)) $criteria->add(HcgasfunPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HcgasfunPeer::DATABASE_NAME);

		$criteria->add(HcgasfunPeer::ID, $this->id);

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

		$copyObj->setCodgas($this->codgas);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCedfam($this->cedfam);

		$copyObj->setFecgas($this->fecgas);

		$copyObj->setMongas($this->mongas);

		$copyObj->setObsgas($this->obsgas);

		$copyObj->setNrofac($this->nrofac);

		$copyObj->setFecfac($this->fecfac);

		$copyObj->setFecrecfac($this->fecrecfac);

		$copyObj->setGenop($this->genop);

		$copyObj->setTitpro($this->titpro);

		$copyObj->setRifpro($this->rifpro);

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
			self::$peer = new HcgasfunPeer();
		}
		return self::$peer;
	}

} 