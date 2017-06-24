<?php


abstract class BaseCadefdivi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddivi;


	
	protected $desdivi;


	
	protected $coddirec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoddivi()
  {

    return trim($this->coddivi);

  }
  
  public function getDesdivi()
  {

    return trim($this->desdivi);

  }
  
  public function getCoddirec()
  {

    return trim($this->coddirec);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoddivi($v)
	{

    if ($this->coddivi !== $v) {
        $this->coddivi = $v;
        $this->modifiedColumns[] = CadefdiviPeer::CODDIVI;
      }
  
	} 
	
	public function setDesdivi($v)
	{

    if ($this->desdivi !== $v) {
        $this->desdivi = $v;
        $this->modifiedColumns[] = CadefdiviPeer::DESDIVI;
      }
  
	} 
	
	public function setCoddirec($v)
	{

    if ($this->coddirec !== $v) {
        $this->coddirec = $v;
        $this->modifiedColumns[] = CadefdiviPeer::CODDIREC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadefdiviPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coddivi = $rs->getString($startcol + 0);

      $this->desdivi = $rs->getString($startcol + 1);

      $this->coddirec = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadefdivi object", $e);
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
			$con = Propel::getConnection(CadefdiviPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadefdiviPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadefdiviPeer::DATABASE_NAME);
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
					$pk = CadefdiviPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadefdiviPeer::doUpdate($this, $con);
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


			if (($retval = CadefdiviPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefdiviPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddivi();
				break;
			case 1:
				return $this->getDesdivi();
				break;
			case 2:
				return $this->getCoddirec();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefdiviPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddivi(),
			$keys[1] => $this->getDesdivi(),
			$keys[2] => $this->getCoddirec(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefdiviPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddivi($value);
				break;
			case 1:
				$this->setDesdivi($value);
				break;
			case 2:
				$this->setCoddirec($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefdiviPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddivi($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesdivi($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoddirec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadefdiviPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadefdiviPeer::CODDIVI)) $criteria->add(CadefdiviPeer::CODDIVI, $this->coddivi);
		if ($this->isColumnModified(CadefdiviPeer::DESDIVI)) $criteria->add(CadefdiviPeer::DESDIVI, $this->desdivi);
		if ($this->isColumnModified(CadefdiviPeer::CODDIREC)) $criteria->add(CadefdiviPeer::CODDIREC, $this->coddirec);
		if ($this->isColumnModified(CadefdiviPeer::ID)) $criteria->add(CadefdiviPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadefdiviPeer::DATABASE_NAME);

		$criteria->add(CadefdiviPeer::ID, $this->id);

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

		$copyObj->setCoddivi($this->coddivi);

		$copyObj->setDesdivi($this->desdivi);

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
			self::$peer = new CadefdiviPeer();
		}
		return self::$peer;
	}

} 