<?php


abstract class BaseFarecmatart extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codart;


	
	protected $codmat;


	
	protected $unimat;


	
	protected $canmat;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodmat()
  {

    return trim($this->codmat);

  }
  
  public function getUnimat()
  {

    return trim($this->unimat);

  }
  
  public function getCanmat($val=false)
  {

    if($val) return number_format($this->canmat,2,',','.');
    else return $this->canmat;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FarecmatartPeer::CODART;
      }
  
	} 
	
	public function setCodmat($v)
	{

    if ($this->codmat !== $v) {
        $this->codmat = $v;
        $this->modifiedColumns[] = FarecmatartPeer::CODMAT;
      }
  
	} 
	
	public function setUnimat($v)
	{

    if ($this->unimat !== $v) {
        $this->unimat = $v;
        $this->modifiedColumns[] = FarecmatartPeer::UNIMAT;
      }
  
	} 
	
	public function setCanmat($v)
	{

    if ($this->canmat !== $v) {
        $this->canmat = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FarecmatartPeer::CANMAT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FarecmatartPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codart = $rs->getString($startcol + 0);

      $this->codmat = $rs->getString($startcol + 1);

      $this->unimat = $rs->getString($startcol + 2);

      $this->canmat = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Farecmatart object", $e);
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
			$con = Propel::getConnection(FarecmatartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FarecmatartPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FarecmatartPeer::DATABASE_NAME);
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
					$pk = FarecmatartPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FarecmatartPeer::doUpdate($this, $con);
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


			if (($retval = FarecmatartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FarecmatartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodart();
				break;
			case 1:
				return $this->getCodmat();
				break;
			case 2:
				return $this->getUnimat();
				break;
			case 3:
				return $this->getCanmat();
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
		$keys = FarecmatartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodart(),
			$keys[1] => $this->getCodmat(),
			$keys[2] => $this->getUnimat(),
			$keys[3] => $this->getCanmat(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FarecmatartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodart($value);
				break;
			case 1:
				$this->setCodmat($value);
				break;
			case 2:
				$this->setUnimat($value);
				break;
			case 3:
				$this->setCanmat($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FarecmatartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmat($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUnimat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanmat($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FarecmatartPeer::DATABASE_NAME);

		if ($this->isColumnModified(FarecmatartPeer::CODART)) $criteria->add(FarecmatartPeer::CODART, $this->codart);
		if ($this->isColumnModified(FarecmatartPeer::CODMAT)) $criteria->add(FarecmatartPeer::CODMAT, $this->codmat);
		if ($this->isColumnModified(FarecmatartPeer::UNIMAT)) $criteria->add(FarecmatartPeer::UNIMAT, $this->unimat);
		if ($this->isColumnModified(FarecmatartPeer::CANMAT)) $criteria->add(FarecmatartPeer::CANMAT, $this->canmat);
		if ($this->isColumnModified(FarecmatartPeer::ID)) $criteria->add(FarecmatartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FarecmatartPeer::DATABASE_NAME);

		$criteria->add(FarecmatartPeer::ID, $this->id);

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

		$copyObj->setCodart($this->codart);

		$copyObj->setCodmat($this->codmat);

		$copyObj->setUnimat($this->unimat);

		$copyObj->setCanmat($this->canmat);


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
			self::$peer = new FarecmatartPeer();
		}
		return self::$peer;
	}

} 