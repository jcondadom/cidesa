<?php


abstract class BaseFaconsignatario extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $telcon;


	
	protected $faxcon;


	
	protected $email;


	
	protected $percon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getDircon()
  {

    return trim($this->dircon);

  }
  
  public function getTelcon()
  {

    return trim($this->telcon);

  }
  
  public function getFaxcon()
  {

    return trim($this->faxcon);

  }
  
  public function getEmail()
  {

    return trim($this->email);

  }
  
  public function getPercon()
  {

    return trim($this->percon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = FaconsignatarioPeer::CODCON;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = FaconsignatarioPeer::NOMCON;
      }
  
	} 
	
	public function setDircon($v)
	{

    if ($this->dircon !== $v) {
        $this->dircon = $v;
        $this->modifiedColumns[] = FaconsignatarioPeer::DIRCON;
      }
  
	} 
	
	public function setTelcon($v)
	{

    if ($this->telcon !== $v) {
        $this->telcon = $v;
        $this->modifiedColumns[] = FaconsignatarioPeer::TELCON;
      }
  
	} 
	
	public function setFaxcon($v)
	{

    if ($this->faxcon !== $v) {
        $this->faxcon = $v;
        $this->modifiedColumns[] = FaconsignatarioPeer::FAXCON;
      }
  
	} 
	
	public function setEmail($v)
	{

    if ($this->email !== $v) {
        $this->email = $v;
        $this->modifiedColumns[] = FaconsignatarioPeer::EMAIL;
      }
  
	} 
	
	public function setPercon($v)
	{

    if ($this->percon !== $v) {
        $this->percon = $v;
        $this->modifiedColumns[] = FaconsignatarioPeer::PERCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaconsignatarioPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcon = $rs->getString($startcol + 0);

      $this->nomcon = $rs->getString($startcol + 1);

      $this->dircon = $rs->getString($startcol + 2);

      $this->telcon = $rs->getString($startcol + 3);

      $this->faxcon = $rs->getString($startcol + 4);

      $this->email = $rs->getString($startcol + 5);

      $this->percon = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faconsignatario object", $e);
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
			$con = Propel::getConnection(FaconsignatarioPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaconsignatarioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaconsignatarioPeer::DATABASE_NAME);
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
					$pk = FaconsignatarioPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaconsignatarioPeer::doUpdate($this, $con);
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


			if (($retval = FaconsignatarioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaconsignatarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getNomcon();
				break;
			case 2:
				return $this->getDircon();
				break;
			case 3:
				return $this->getTelcon();
				break;
			case 4:
				return $this->getFaxcon();
				break;
			case 5:
				return $this->getEmail();
				break;
			case 6:
				return $this->getPercon();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaconsignatarioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getNomcon(),
			$keys[2] => $this->getDircon(),
			$keys[3] => $this->getTelcon(),
			$keys[4] => $this->getFaxcon(),
			$keys[5] => $this->getEmail(),
			$keys[6] => $this->getPercon(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaconsignatarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setNomcon($value);
				break;
			case 2:
				$this->setDircon($value);
				break;
			case 3:
				$this->setTelcon($value);
				break;
			case 4:
				$this->setFaxcon($value);
				break;
			case 5:
				$this->setEmail($value);
				break;
			case 6:
				$this->setPercon($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaconsignatarioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDircon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFaxcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEmail($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPercon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaconsignatarioPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaconsignatarioPeer::CODCON)) $criteria->add(FaconsignatarioPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(FaconsignatarioPeer::NOMCON)) $criteria->add(FaconsignatarioPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FaconsignatarioPeer::DIRCON)) $criteria->add(FaconsignatarioPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FaconsignatarioPeer::TELCON)) $criteria->add(FaconsignatarioPeer::TELCON, $this->telcon);
		if ($this->isColumnModified(FaconsignatarioPeer::FAXCON)) $criteria->add(FaconsignatarioPeer::FAXCON, $this->faxcon);
		if ($this->isColumnModified(FaconsignatarioPeer::EMAIL)) $criteria->add(FaconsignatarioPeer::EMAIL, $this->email);
		if ($this->isColumnModified(FaconsignatarioPeer::PERCON)) $criteria->add(FaconsignatarioPeer::PERCON, $this->percon);
		if ($this->isColumnModified(FaconsignatarioPeer::ID)) $criteria->add(FaconsignatarioPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaconsignatarioPeer::DATABASE_NAME);

		$criteria->add(FaconsignatarioPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setTelcon($this->telcon);

		$copyObj->setFaxcon($this->faxcon);

		$copyObj->setEmail($this->email);

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
			self::$peer = new FaconsignatarioPeer();
		}
		return self::$peer;
	}

} 