<?php


abstract class BaseFarinstedu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codinst;


	
	protected $nominst;


	
	protected $dirinst;


	
	protected $telinst;


	
	protected $faxinst;


	
	protected $emailinst;


	
	protected $codedo;


	
	protected $codciu;


	
	protected $codmun;


	
	protected $matinst;


	
	protected $persona;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodinst()
  {

    return trim($this->codinst);

  }
  
  public function getNominst()
  {

    return trim($this->nominst);

  }
  
  public function getDirinst()
  {

    return trim($this->dirinst);

  }
  
  public function getTelinst()
  {

    return trim($this->telinst);

  }
  
  public function getFaxinst()
  {

    return trim($this->faxinst);

  }
  
  public function getEmailinst()
  {

    return trim($this->emailinst);

  }
  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getCodciu()
  {

    return trim($this->codciu);

  }
  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getMatinst()
  {

    return trim($this->matinst);

  }
  
  public function getPersona()
  {

    return trim($this->persona);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodinst($v)
	{

    if ($this->codinst !== $v) {
        $this->codinst = $v;
        $this->modifiedColumns[] = FarinsteduPeer::CODINST;
      }
  
	} 
	
	public function setNominst($v)
	{

    if ($this->nominst !== $v) {
        $this->nominst = $v;
        $this->modifiedColumns[] = FarinsteduPeer::NOMINST;
      }
  
	} 
	
	public function setDirinst($v)
	{

    if ($this->dirinst !== $v) {
        $this->dirinst = $v;
        $this->modifiedColumns[] = FarinsteduPeer::DIRINST;
      }
  
	} 
	
	public function setTelinst($v)
	{

    if ($this->telinst !== $v) {
        $this->telinst = $v;
        $this->modifiedColumns[] = FarinsteduPeer::TELINST;
      }
  
	} 
	
	public function setFaxinst($v)
	{

    if ($this->faxinst !== $v) {
        $this->faxinst = $v;
        $this->modifiedColumns[] = FarinsteduPeer::FAXINST;
      }
  
	} 
	
	public function setEmailinst($v)
	{

    if ($this->emailinst !== $v) {
        $this->emailinst = $v;
        $this->modifiedColumns[] = FarinsteduPeer::EMAILINST;
      }
  
	} 
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = FarinsteduPeer::CODEDO;
      }
  
	} 
	
	public function setCodciu($v)
	{

    if ($this->codciu !== $v) {
        $this->codciu = $v;
        $this->modifiedColumns[] = FarinsteduPeer::CODCIU;
      }
  
	} 
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = FarinsteduPeer::CODMUN;
      }
  
	} 
	
	public function setMatinst($v)
	{

    if ($this->matinst !== $v) {
        $this->matinst = $v;
        $this->modifiedColumns[] = FarinsteduPeer::MATINST;
      }
  
	} 
	
	public function setPersona($v)
	{

    if ($this->persona !== $v) {
        $this->persona = $v;
        $this->modifiedColumns[] = FarinsteduPeer::PERSONA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FarinsteduPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codinst = $rs->getString($startcol + 0);

      $this->nominst = $rs->getString($startcol + 1);

      $this->dirinst = $rs->getString($startcol + 2);

      $this->telinst = $rs->getString($startcol + 3);

      $this->faxinst = $rs->getString($startcol + 4);

      $this->emailinst = $rs->getString($startcol + 5);

      $this->codedo = $rs->getString($startcol + 6);

      $this->codciu = $rs->getString($startcol + 7);

      $this->codmun = $rs->getString($startcol + 8);

      $this->matinst = $rs->getString($startcol + 9);

      $this->persona = $rs->getString($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Farinstedu object", $e);
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
			$con = Propel::getConnection(FarinsteduPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FarinsteduPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FarinsteduPeer::DATABASE_NAME);
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
					$pk = FarinsteduPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FarinsteduPeer::doUpdate($this, $con);
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


			if (($retval = FarinsteduPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FarinsteduPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodinst();
				break;
			case 1:
				return $this->getNominst();
				break;
			case 2:
				return $this->getDirinst();
				break;
			case 3:
				return $this->getTelinst();
				break;
			case 4:
				return $this->getFaxinst();
				break;
			case 5:
				return $this->getEmailinst();
				break;
			case 6:
				return $this->getCodedo();
				break;
			case 7:
				return $this->getCodciu();
				break;
			case 8:
				return $this->getCodmun();
				break;
			case 9:
				return $this->getMatinst();
				break;
			case 10:
				return $this->getPersona();
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
		$keys = FarinsteduPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodinst(),
			$keys[1] => $this->getNominst(),
			$keys[2] => $this->getDirinst(),
			$keys[3] => $this->getTelinst(),
			$keys[4] => $this->getFaxinst(),
			$keys[5] => $this->getEmailinst(),
			$keys[6] => $this->getCodedo(),
			$keys[7] => $this->getCodciu(),
			$keys[8] => $this->getCodmun(),
			$keys[9] => $this->getMatinst(),
			$keys[10] => $this->getPersona(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FarinsteduPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodinst($value);
				break;
			case 1:
				$this->setNominst($value);
				break;
			case 2:
				$this->setDirinst($value);
				break;
			case 3:
				$this->setTelinst($value);
				break;
			case 4:
				$this->setFaxinst($value);
				break;
			case 5:
				$this->setEmailinst($value);
				break;
			case 6:
				$this->setCodedo($value);
				break;
			case 7:
				$this->setCodciu($value);
				break;
			case 8:
				$this->setCodmun($value);
				break;
			case 9:
				$this->setMatinst($value);
				break;
			case 10:
				$this->setPersona($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FarinsteduPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodinst($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNominst($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDirinst($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelinst($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFaxinst($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEmailinst($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodedo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodciu($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodmun($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMatinst($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPersona($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FarinsteduPeer::DATABASE_NAME);

		if ($this->isColumnModified(FarinsteduPeer::CODINST)) $criteria->add(FarinsteduPeer::CODINST, $this->codinst);
		if ($this->isColumnModified(FarinsteduPeer::NOMINST)) $criteria->add(FarinsteduPeer::NOMINST, $this->nominst);
		if ($this->isColumnModified(FarinsteduPeer::DIRINST)) $criteria->add(FarinsteduPeer::DIRINST, $this->dirinst);
		if ($this->isColumnModified(FarinsteduPeer::TELINST)) $criteria->add(FarinsteduPeer::TELINST, $this->telinst);
		if ($this->isColumnModified(FarinsteduPeer::FAXINST)) $criteria->add(FarinsteduPeer::FAXINST, $this->faxinst);
		if ($this->isColumnModified(FarinsteduPeer::EMAILINST)) $criteria->add(FarinsteduPeer::EMAILINST, $this->emailinst);
		if ($this->isColumnModified(FarinsteduPeer::CODEDO)) $criteria->add(FarinsteduPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(FarinsteduPeer::CODCIU)) $criteria->add(FarinsteduPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(FarinsteduPeer::CODMUN)) $criteria->add(FarinsteduPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(FarinsteduPeer::MATINST)) $criteria->add(FarinsteduPeer::MATINST, $this->matinst);
		if ($this->isColumnModified(FarinsteduPeer::PERSONA)) $criteria->add(FarinsteduPeer::PERSONA, $this->persona);
		if ($this->isColumnModified(FarinsteduPeer::ID)) $criteria->add(FarinsteduPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FarinsteduPeer::DATABASE_NAME);

		$criteria->add(FarinsteduPeer::ID, $this->id);

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

		$copyObj->setCodinst($this->codinst);

		$copyObj->setNominst($this->nominst);

		$copyObj->setDirinst($this->dirinst);

		$copyObj->setTelinst($this->telinst);

		$copyObj->setFaxinst($this->faxinst);

		$copyObj->setEmailinst($this->emailinst);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodciu($this->codciu);

		$copyObj->setCodmun($this->codmun);

		$copyObj->setMatinst($this->matinst);

		$copyObj->setPersona($this->persona);


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
			self::$peer = new FarinsteduPeer();
		}
		return self::$peer;
	}

} 