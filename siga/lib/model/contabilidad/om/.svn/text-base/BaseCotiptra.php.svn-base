<?php


abstract class BaseCotiptra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtiptra;


	
	protected $destiptra;


	
	protected $modtiptra;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtiptra()
  {

    return trim($this->codtiptra);

  }
  
  public function getDestiptra()
  {

    return trim($this->destiptra);

  }
  
  public function getModtiptra()
  {

    return $this->modtiptra;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtiptra($v)
	{

    if ($this->codtiptra !== $v) {
        $this->codtiptra = $v;
        $this->modifiedColumns[] = CotiptraPeer::CODTIPTRA;
      }
  
	} 
	
	public function setDestiptra($v)
	{

    if ($this->destiptra !== $v) {
        $this->destiptra = $v;
        $this->modifiedColumns[] = CotiptraPeer::DESTIPTRA;
      }
  
	} 
	
	public function setModtiptra($v)
	{

    if ($this->modtiptra !== $v) {
        $this->modtiptra = $v;
        $this->modifiedColumns[] = CotiptraPeer::MODTIPTRA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CotiptraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtiptra = $rs->getString($startcol + 0);

      $this->destiptra = $rs->getString($startcol + 1);

      $this->modtiptra = $rs->getBoolean($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cotiptra object", $e);
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
			$con = Propel::getConnection(CotiptraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CotiptraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CotiptraPeer::DATABASE_NAME);
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
					$pk = CotiptraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CotiptraPeer::doUpdate($this, $con);
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


			if (($retval = CotiptraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CotiptraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtiptra();
				break;
			case 1:
				return $this->getDestiptra();
				break;
			case 2:
				return $this->getModtiptra();
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
		$keys = CotiptraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtiptra(),
			$keys[1] => $this->getDestiptra(),
			$keys[2] => $this->getModtiptra(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CotiptraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtiptra($value);
				break;
			case 1:
				$this->setDestiptra($value);
				break;
			case 2:
				$this->setModtiptra($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CotiptraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtiptra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestiptra($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setModtiptra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CotiptraPeer::DATABASE_NAME);

		if ($this->isColumnModified(CotiptraPeer::CODTIPTRA)) $criteria->add(CotiptraPeer::CODTIPTRA, $this->codtiptra);
		if ($this->isColumnModified(CotiptraPeer::DESTIPTRA)) $criteria->add(CotiptraPeer::DESTIPTRA, $this->destiptra);
		if ($this->isColumnModified(CotiptraPeer::MODTIPTRA)) $criteria->add(CotiptraPeer::MODTIPTRA, $this->modtiptra);
		if ($this->isColumnModified(CotiptraPeer::ID)) $criteria->add(CotiptraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CotiptraPeer::DATABASE_NAME);

		$criteria->add(CotiptraPeer::ID, $this->id);

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

		$copyObj->setCodtiptra($this->codtiptra);

		$copyObj->setDestiptra($this->destiptra);

		$copyObj->setModtiptra($this->modtiptra);


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
			self::$peer = new CotiptraPeer();
		}
		return self::$peer;
	}

} 