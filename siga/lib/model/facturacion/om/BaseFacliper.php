<?php


abstract class BaseFacliper extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $nomper;


	
	protected $dirper;


	
	protected $telper;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getNomper()
  {

    return trim($this->nomper);

  }
  
  public function getDirper()
  {

    return trim($this->dirper);

  }
  
  public function getTelper()
  {

    return trim($this->telper);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = FacliperPeer::CODPRO;
      }
  
	} 
	
	public function setNomper($v)
	{

    if ($this->nomper !== $v) {
        $this->nomper = $v;
        $this->modifiedColumns[] = FacliperPeer::NOMPER;
      }
  
	} 
	
	public function setDirper($v)
	{

    if ($this->dirper !== $v) {
        $this->dirper = $v;
        $this->modifiedColumns[] = FacliperPeer::DIRPER;
      }
  
	} 
	
	public function setTelper($v)
	{

    if ($this->telper !== $v) {
        $this->telper = $v;
        $this->modifiedColumns[] = FacliperPeer::TELPER;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FacliperPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpro = $rs->getString($startcol + 0);

      $this->nomper = $rs->getString($startcol + 1);

      $this->dirper = $rs->getString($startcol + 2);

      $this->telper = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Facliper object", $e);
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
			$con = Propel::getConnection(FacliperPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FacliperPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FacliperPeer::DATABASE_NAME);
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
					$pk = FacliperPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FacliperPeer::doUpdate($this, $con);
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


			if (($retval = FacliperPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacliperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getNomper();
				break;
			case 2:
				return $this->getDirper();
				break;
			case 3:
				return $this->getTelper();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FacliperPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getNomper(),
			$keys[2] => $this->getDirper(),
			$keys[3] => $this->getTelper(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacliperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setNomper($value);
				break;
			case 2:
				$this->setDirper($value);
				break;
			case 3:
				$this->setTelper($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FacliperPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomper($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDirper($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelper($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FacliperPeer::DATABASE_NAME);

		if ($this->isColumnModified(FacliperPeer::CODPRO)) $criteria->add(FacliperPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FacliperPeer::NOMPER)) $criteria->add(FacliperPeer::NOMPER, $this->nomper);
		if ($this->isColumnModified(FacliperPeer::DIRPER)) $criteria->add(FacliperPeer::DIRPER, $this->dirper);
		if ($this->isColumnModified(FacliperPeer::TELPER)) $criteria->add(FacliperPeer::TELPER, $this->telper);
		if ($this->isColumnModified(FacliperPeer::ID)) $criteria->add(FacliperPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FacliperPeer::DATABASE_NAME);

		$criteria->add(FacliperPeer::ID, $this->id);

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

		$copyObj->setCodpro($this->codpro);

		$copyObj->setNomper($this->nomper);

		$copyObj->setDirper($this->dirper);

		$copyObj->setTelper($this->telper);


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
			self::$peer = new FacliperPeer();
		}
		return self::$peer;
	}

} 