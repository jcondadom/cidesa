<?php


abstract class BaseBncatest extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedest;


	
	protected $nomapeest;


	
	protected $direst;


	
	protected $telest;


	
	protected $cedrep;


	
	protected $nomaperep;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedest()
  {

    return trim($this->cedest);

  }
  
  public function getNomapeest()
  {

    return trim($this->nomapeest);

  }
  
  public function getDirest()
  {

    return trim($this->direst);

  }
  
  public function getTelest()
  {

    return trim($this->telest);

  }
  
  public function getCedrep()
  {

    return trim($this->cedrep);

  }
  
  public function getNomaperep()
  {

    return trim($this->nomaperep);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedest($v)
	{

    if ($this->cedest !== $v) {
        $this->cedest = strtoupper($v);
        $this->modifiedColumns[] = BncatestPeer::CEDEST;
      }
  
	} 
	
	public function setNomapeest($v)
	{

    if ($this->nomapeest !== $v) {
        $this->nomapeest = strtoupper($v);
        $this->modifiedColumns[] = BncatestPeer::NOMAPEEST;
      }
  
	} 
	
	public function setDirest($v)
	{

    if ($this->direst !== $v) {
        $this->direst = strtoupper($v);
        $this->modifiedColumns[] = BncatestPeer::DIREST;
      }
  
	} 
	
	public function setTelest($v)
	{

    if ($this->telest !== $v) {
        $this->telest = strtoupper($v);
        $this->modifiedColumns[] = BncatestPeer::TELEST;
      }
  
	} 
	
	public function setCedrep($v)
	{

    if ($this->cedrep !== $v) {
        $this->cedrep = strtoupper($v);
        $this->modifiedColumns[] = BncatestPeer::CEDREP;
      }
  
	} 
	
	public function setNomaperep($v)
	{

    if ($this->nomaperep !== $v) {
        $this->nomaperep = strtoupper($v);
        $this->modifiedColumns[] = BncatestPeer::NOMAPEREP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = BncatestPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedest = $rs->getString($startcol + 0);

      $this->nomapeest = $rs->getString($startcol + 1);

      $this->direst = $rs->getString($startcol + 2);

      $this->telest = $rs->getString($startcol + 3);

      $this->cedrep = $rs->getString($startcol + 4);

      $this->nomaperep = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Bncatest object", $e);
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
			$con = Propel::getConnection(BncatestPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			BncatestPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(BncatestPeer::DATABASE_NAME);
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
					$pk = BncatestPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += BncatestPeer::doUpdate($this, $con);
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


			if (($retval = BncatestPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BncatestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedest();
				break;
			case 1:
				return $this->getNomapeest();
				break;
			case 2:
				return $this->getDirest();
				break;
			case 3:
				return $this->getTelest();
				break;
			case 4:
				return $this->getCedrep();
				break;
			case 5:
				return $this->getNomaperep();
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
		$keys = BncatestPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedest(),
			$keys[1] => $this->getNomapeest(),
			$keys[2] => $this->getDirest(),
			$keys[3] => $this->getTelest(),
			$keys[4] => $this->getCedrep(),
			$keys[5] => $this->getNomaperep(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = BncatestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedest($value);
				break;
			case 1:
				$this->setNomapeest($value);
				break;
			case 2:
				$this->setDirest($value);
				break;
			case 3:
				$this->setTelest($value);
				break;
			case 4:
				$this->setCedrep($value);
				break;
			case 5:
				$this->setNomaperep($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = BncatestPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedest($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomapeest($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDirest($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelest($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCedrep($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNomaperep($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(BncatestPeer::DATABASE_NAME);

		if ($this->isColumnModified(BncatestPeer::CEDEST)) $criteria->add(BncatestPeer::CEDEST, $this->cedest);
		if ($this->isColumnModified(BncatestPeer::NOMAPEEST)) $criteria->add(BncatestPeer::NOMAPEEST, $this->nomapeest);
		if ($this->isColumnModified(BncatestPeer::DIREST)) $criteria->add(BncatestPeer::DIREST, $this->direst);
		if ($this->isColumnModified(BncatestPeer::TELEST)) $criteria->add(BncatestPeer::TELEST, $this->telest);
		if ($this->isColumnModified(BncatestPeer::CEDREP)) $criteria->add(BncatestPeer::CEDREP, $this->cedrep);
		if ($this->isColumnModified(BncatestPeer::NOMAPEREP)) $criteria->add(BncatestPeer::NOMAPEREP, $this->nomaperep);
		if ($this->isColumnModified(BncatestPeer::ID)) $criteria->add(BncatestPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(BncatestPeer::DATABASE_NAME);

		$criteria->add(BncatestPeer::ID, $this->id);

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

		$copyObj->setCedest($this->cedest);

		$copyObj->setNomapeest($this->nomapeest);

		$copyObj->setDirest($this->direst);

		$copyObj->setTelest($this->telest);

		$copyObj->setCedrep($this->cedrep);

		$copyObj->setNomaperep($this->nomaperep);


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
			self::$peer = new BncatestPeer();
		}
		return self::$peer;
	}

} 