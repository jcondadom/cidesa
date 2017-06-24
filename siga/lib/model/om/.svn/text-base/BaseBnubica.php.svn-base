<?php


abstract class BaseBnubica extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codubi;


	
	protected $desubi;


	
	protected $stacod;


	
	protected $cedemp;


	
	protected $nomemp;


	
	protected $nomcar;


	
	protected $nomjef;


	
	protected $corpta;


	
	protected $prepta;


	
	protected $carjefuni;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getDesubi()
  {

    return trim($this->desubi);

  }
  
  public function getStacod()
  {

    return trim($this->stacod);

  }
  
  public function getCedemp()
  {

    return trim($this->cedemp);

  }
  
  public function getNomemp()
  {

    return trim($this->nomemp);

  }
  
  public function getNomcar()
  {

    return trim($this->nomcar);

  }
  
  public function getNomjef()
  {

    return trim($this->nomjef);

  }
  
  public function getCorpta()
  {

    return $this->corpta;

  }
  
  public function getPrepta()
  {

    return trim($this->prepta);

  }
  
  public function getCarjefuni()
  {

    return trim($this->carjefuni);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = strtoupper($v);
        $this->modifiedColumns[] = BnubicaPeer::CODUBI;
      }
  
	} 
	
	public function setDesubi($v)
	{

    if ($this->desubi !== $v) {
        $this->desubi = strtoupper($v);
        $this->modifiedColumns[] = BnubicaPeer::DESUBI;
      }
  
	} 
	
	public function setStacod($v)
	{

    if ($this->stacod !== $v) {
        $this->stacod = strtoupper($v);
        $this->modifiedColumns[] = BnubicaPeer::STACOD;
      }
  
	} 
	
	public function setCedemp($v)
	{

    if ($this->cedemp !== $v) {
        $this->cedemp = strtoupper($v);
        $this->modifiedColumns[] = BnubicaPeer::CEDEMP;
      }
  
	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = strtoupper($v);
        $this->modifiedColumns[] = BnubicaPeer::NOMEMP;
      }
  
	} 
	
	public function setNomcar($v)
	{

    if ($this->nomcar !== $v) {
        $this->nomcar = strtoupper($v);
        $this->modifiedColumns[] = BnubicaPeer::NOMCAR;
      }
  
	} 
	
	public function setNomjef($v)
	{

    if ($this->nomjef !== $v) {
        $this->nomjef = strtoupper($v);
        $this->modifiedColumns[] = BnubicaPeer::NOMJEF;
      }
  
	} 
	
	public function setCorpta($v)
	{

    if ($this->corpta !== $v) {
        $this->corpta = $v;
        $this->modifiedColumns[] = BnubicaPeer::CORPTA;
      }
  
	} 
	
	public function setPrepta($v)
	{

    if ($this->prepta !== $v) {
        $this->prepta = strtoupper($v);
        $this->modifiedColumns[] = BnubicaPeer::PREPTA;
      }
  
	} 
	
	public function setCarjefuni($v)
	{

    if ($this->carjefuni !== $v) {
        $this->carjefuni = strtoupper($v);
        $this->modifiedColumns[] = BnubicaPeer::CARJEFUNI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BnubicaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codubi = $rs->getString($startcol + 0);

      $this->desubi = $rs->getString($startcol + 1);

      $this->stacod = $rs->getString($startcol + 2);

      $this->cedemp = $rs->getString($startcol + 3);

      $this->nomemp = $rs->getString($startcol + 4);

      $this->nomcar = $rs->getString($startcol + 5);

      $this->nomjef = $rs->getString($startcol + 6);

      $this->corpta = $rs->getInt($startcol + 7);

      $this->prepta = $rs->getString($startcol + 8);

      $this->carjefuni = $rs->getString($startcol + 9);

      $this->id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bnubica object", $e);
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
			$con = Propel::getConnection(BnubicaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BnubicaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BnubicaPeer::DATABASE_NAME);
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
					$pk = BnubicaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BnubicaPeer::doUpdate($this, $con);
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


			if (($retval = BnubicaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnubicaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodubi();
				break;
			case 1:
				return $this->getDesubi();
				break;
			case 2:
				return $this->getStacod();
				break;
			case 3:
				return $this->getCedemp();
				break;
			case 4:
				return $this->getNomemp();
				break;
			case 5:
				return $this->getNomcar();
				break;
			case 6:
				return $this->getNomjef();
				break;
			case 7:
				return $this->getCorpta();
				break;
			case 8:
				return $this->getPrepta();
				break;
			case 9:
				return $this->getCarjefuni();
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
		$keys = BnubicaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodubi(),
			$keys[1] => $this->getDesubi(),
			$keys[2] => $this->getStacod(),
			$keys[3] => $this->getCedemp(),
			$keys[4] => $this->getNomemp(),
			$keys[5] => $this->getNomcar(),
			$keys[6] => $this->getNomjef(),
			$keys[7] => $this->getCorpta(),
			$keys[8] => $this->getPrepta(),
			$keys[9] => $this->getCarjefuni(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BnubicaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodubi($value);
				break;
			case 1:
				$this->setDesubi($value);
				break;
			case 2:
				$this->setStacod($value);
				break;
			case 3:
				$this->setCedemp($value);
				break;
			case 4:
				$this->setNomemp($value);
				break;
			case 5:
				$this->setNomcar($value);
				break;
			case 6:
				$this->setNomjef($value);
				break;
			case 7:
				$this->setCorpta($value);
				break;
			case 8:
				$this->setPrepta($value);
				break;
			case 9:
				$this->setCarjefuni($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BnubicaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodubi($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesubi($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStacod($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCedemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNomemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNomcar($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNomjef($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCorpta($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPrepta($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCarjefuni($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BnubicaPeer::DATABASE_NAME);

		if ($this->isColumnModified(BnubicaPeer::CODUBI)) $criteria->add(BnubicaPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(BnubicaPeer::DESUBI)) $criteria->add(BnubicaPeer::DESUBI, $this->desubi);
		if ($this->isColumnModified(BnubicaPeer::STACOD)) $criteria->add(BnubicaPeer::STACOD, $this->stacod);
		if ($this->isColumnModified(BnubicaPeer::CEDEMP)) $criteria->add(BnubicaPeer::CEDEMP, $this->cedemp);
		if ($this->isColumnModified(BnubicaPeer::NOMEMP)) $criteria->add(BnubicaPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(BnubicaPeer::NOMCAR)) $criteria->add(BnubicaPeer::NOMCAR, $this->nomcar);
		if ($this->isColumnModified(BnubicaPeer::NOMJEF)) $criteria->add(BnubicaPeer::NOMJEF, $this->nomjef);
		if ($this->isColumnModified(BnubicaPeer::CORPTA)) $criteria->add(BnubicaPeer::CORPTA, $this->corpta);
		if ($this->isColumnModified(BnubicaPeer::PREPTA)) $criteria->add(BnubicaPeer::PREPTA, $this->prepta);
		if ($this->isColumnModified(BnubicaPeer::CARJEFUNI)) $criteria->add(BnubicaPeer::CARJEFUNI, $this->carjefuni);
		if ($this->isColumnModified(BnubicaPeer::ID)) $criteria->add(BnubicaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BnubicaPeer::DATABASE_NAME);

		$criteria->add(BnubicaPeer::ID, $this->id);

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

		$copyObj->setCodubi($this->codubi);

		$copyObj->setDesubi($this->desubi);

		$copyObj->setStacod($this->stacod);

		$copyObj->setCedemp($this->cedemp);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setNomcar($this->nomcar);

		$copyObj->setNomjef($this->nomjef);

		$copyObj->setCorpta($this->corpta);

		$copyObj->setPrepta($this->prepta);

		$copyObj->setCarjefuni($this->carjefuni);


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
			self::$peer = new BnubicaPeer();
		}
		return self::$peer;
	}

} 