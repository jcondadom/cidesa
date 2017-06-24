<?php


abstract class BaseFaregvend extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $rifven;


	
	protected $nomven;


	
	protected $dirven;


	
	protected $telven;


	
	protected $emaven;


	
	protected $percon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRifven()
  {

    return trim($this->rifven);

  }
  
  public function getNomven()
  {

    return trim($this->nomven);

  }
  
  public function getDirven()
  {

    return trim($this->dirven);

  }
  
  public function getTelven()
  {

    return trim($this->telven);

  }
  
  public function getEmaven()
  {

    return trim($this->emaven);

  }
  
  public function getPercon()
  {

    return trim($this->percon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRifven($v)
	{

    if ($this->rifven !== $v) {
        $this->rifven = $v;
        $this->modifiedColumns[] = FaregvendPeer::RIFVEN;
      }
  
	} 
	
	public function setNomven($v)
	{

    if ($this->nomven !== $v) {
        $this->nomven = $v;
        $this->modifiedColumns[] = FaregvendPeer::NOMVEN;
      }
  
	} 
	
	public function setDirven($v)
	{

    if ($this->dirven !== $v) {
        $this->dirven = $v;
        $this->modifiedColumns[] = FaregvendPeer::DIRVEN;
      }
  
	} 
	
	public function setTelven($v)
	{

    if ($this->telven !== $v) {
        $this->telven = $v;
        $this->modifiedColumns[] = FaregvendPeer::TELVEN;
      }
  
	} 
	
	public function setEmaven($v)
	{

    if ($this->emaven !== $v) {
        $this->emaven = $v;
        $this->modifiedColumns[] = FaregvendPeer::EMAVEN;
      }
  
	} 
	
	public function setPercon($v)
	{

    if ($this->percon !== $v) {
        $this->percon = $v;
        $this->modifiedColumns[] = FaregvendPeer::PERCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaregvendPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->rifven = $rs->getString($startcol + 0);

      $this->nomven = $rs->getString($startcol + 1);

      $this->dirven = $rs->getString($startcol + 2);

      $this->telven = $rs->getString($startcol + 3);

      $this->emaven = $rs->getString($startcol + 4);

      $this->percon = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faregvend object", $e);
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
			$con = Propel::getConnection(FaregvendPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaregvendPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaregvendPeer::DATABASE_NAME);
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
					$pk = FaregvendPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaregvendPeer::doUpdate($this, $con);
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


			if (($retval = FaregvendPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaregvendPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRifven();
				break;
			case 1:
				return $this->getNomven();
				break;
			case 2:
				return $this->getDirven();
				break;
			case 3:
				return $this->getTelven();
				break;
			case 4:
				return $this->getEmaven();
				break;
			case 5:
				return $this->getPercon();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaregvendPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRifven(),
			$keys[1] => $this->getNomven(),
			$keys[2] => $this->getDirven(),
			$keys[3] => $this->getTelven(),
			$keys[4] => $this->getEmaven(),
			$keys[5] => $this->getPercon(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaregvendPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRifven($value);
				break;
			case 1:
				$this->setNomven($value);
				break;
			case 2:
				$this->setDirven($value);
				break;
			case 3:
				$this->setTelven($value);
				break;
			case 4:
				$this->setEmaven($value);
				break;
			case 5:
				$this->setPercon($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaregvendPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRifven($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomven($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDirven($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelven($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEmaven($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPercon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaregvendPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaregvendPeer::RIFVEN)) $criteria->add(FaregvendPeer::RIFVEN, $this->rifven);
		if ($this->isColumnModified(FaregvendPeer::NOMVEN)) $criteria->add(FaregvendPeer::NOMVEN, $this->nomven);
		if ($this->isColumnModified(FaregvendPeer::DIRVEN)) $criteria->add(FaregvendPeer::DIRVEN, $this->dirven);
		if ($this->isColumnModified(FaregvendPeer::TELVEN)) $criteria->add(FaregvendPeer::TELVEN, $this->telven);
		if ($this->isColumnModified(FaregvendPeer::EMAVEN)) $criteria->add(FaregvendPeer::EMAVEN, $this->emaven);
		if ($this->isColumnModified(FaregvendPeer::PERCON)) $criteria->add(FaregvendPeer::PERCON, $this->percon);
		if ($this->isColumnModified(FaregvendPeer::ID)) $criteria->add(FaregvendPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaregvendPeer::DATABASE_NAME);

		$criteria->add(FaregvendPeer::ID, $this->id);

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

		$copyObj->setRifven($this->rifven);

		$copyObj->setNomven($this->nomven);

		$copyObj->setDirven($this->dirven);

		$copyObj->setTelven($this->telven);

		$copyObj->setEmaven($this->emaven);

		$copyObj->setPercon($this->percon);


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
			self::$peer = new FaregvendPeer();
		}
		return self::$peer;
	}

} 