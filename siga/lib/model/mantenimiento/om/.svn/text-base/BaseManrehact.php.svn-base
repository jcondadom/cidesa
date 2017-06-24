<?php


abstract class BaseManrehact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codact;


	
	protected $codcar;


	
	protected $canrec;


	
	protected $canhor;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getCanrec()
  {

    return $this->canrec;

  }
  
  public function getCanhor()
  {

    return $this->canhor;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = ManrehactPeer::CODACT;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = ManrehactPeer::CODCAR;
      }
  
	} 
	
	public function setCanrec($v)
	{

    if ($this->canrec !== $v) {
        $this->canrec = $v;
        $this->modifiedColumns[] = ManrehactPeer::CANREC;
      }
  
	} 
	
	public function setCanhor($v)
	{

    if ($this->canhor !== $v) {
        $this->canhor = $v;
        $this->modifiedColumns[] = ManrehactPeer::CANHOR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ManrehactPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codact = $rs->getString($startcol + 0);

      $this->codcar = $rs->getString($startcol + 1);

      $this->canrec = $rs->getInt($startcol + 2);

      $this->canhor = $rs->getInt($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Manrehact object", $e);
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
			$con = Propel::getConnection(ManrehactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ManrehactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ManrehactPeer::DATABASE_NAME);
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
					$pk = ManrehactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ManrehactPeer::doUpdate($this, $con);
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


			if (($retval = ManrehactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManrehactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodact();
				break;
			case 1:
				return $this->getCodcar();
				break;
			case 2:
				return $this->getCanrec();
				break;
			case 3:
				return $this->getCanhor();
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
		$keys = ManrehactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodact(),
			$keys[1] => $this->getCodcar(),
			$keys[2] => $this->getCanrec(),
			$keys[3] => $this->getCanhor(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManrehactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodact($value);
				break;
			case 1:
				$this->setCodcar($value);
				break;
			case 2:
				$this->setCanrec($value);
				break;
			case 3:
				$this->setCanhor($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ManrehactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanrec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanhor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ManrehactPeer::DATABASE_NAME);

		if ($this->isColumnModified(ManrehactPeer::CODACT)) $criteria->add(ManrehactPeer::CODACT, $this->codact);
		if ($this->isColumnModified(ManrehactPeer::CODCAR)) $criteria->add(ManrehactPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(ManrehactPeer::CANREC)) $criteria->add(ManrehactPeer::CANREC, $this->canrec);
		if ($this->isColumnModified(ManrehactPeer::CANHOR)) $criteria->add(ManrehactPeer::CANHOR, $this->canhor);
		if ($this->isColumnModified(ManrehactPeer::ID)) $criteria->add(ManrehactPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ManrehactPeer::DATABASE_NAME);

		$criteria->add(ManrehactPeer::ID, $this->id);

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

		$copyObj->setCodact($this->codact);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCanrec($this->canrec);

		$copyObj->setCanhor($this->canhor);


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
			self::$peer = new ManrehactPeer();
		}
		return self::$peer;
	}

} 