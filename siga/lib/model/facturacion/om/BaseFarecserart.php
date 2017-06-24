<?php


abstract class BaseFarecserart extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codart;


	
	protected $codser;


	
	protected $uniser;


	
	protected $canser;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodser()
  {

    return trim($this->codser);

  }
  
  public function getUniser()
  {

    return trim($this->uniser);

  }
  
  public function getCanser($val=false)
  {

    if($val) return number_format($this->canser,2,',','.');
    else return $this->canser;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FarecserartPeer::CODART;
      }
  
	} 
	
	public function setCodser($v)
	{

    if ($this->codser !== $v) {
        $this->codser = $v;
        $this->modifiedColumns[] = FarecserartPeer::CODSER;
      }
  
	} 
	
	public function setUniser($v)
	{

    if ($this->uniser !== $v) {
        $this->uniser = $v;
        $this->modifiedColumns[] = FarecserartPeer::UNISER;
      }
  
	} 
	
	public function setCanser($v)
	{

    if ($this->canser !== $v) {
        $this->canser = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FarecserartPeer::CANSER;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FarecserartPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codart = $rs->getString($startcol + 0);

      $this->codser = $rs->getString($startcol + 1);

      $this->uniser = $rs->getString($startcol + 2);

      $this->canser = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Farecserart object", $e);
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
			$con = Propel::getConnection(FarecserartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FarecserartPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FarecserartPeer::DATABASE_NAME);
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
					$pk = FarecserartPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FarecserartPeer::doUpdate($this, $con);
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


			if (($retval = FarecserartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FarecserartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodart();
				break;
			case 1:
				return $this->getCodser();
				break;
			case 2:
				return $this->getUniser();
				break;
			case 3:
				return $this->getCanser();
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
		$keys = FarecserartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodart(),
			$keys[1] => $this->getCodser(),
			$keys[2] => $this->getUniser(),
			$keys[3] => $this->getCanser(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FarecserartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodart($value);
				break;
			case 1:
				$this->setCodser($value);
				break;
			case 2:
				$this->setUniser($value);
				break;
			case 3:
				$this->setCanser($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FarecserartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodser($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUniser($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanser($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FarecserartPeer::DATABASE_NAME);

		if ($this->isColumnModified(FarecserartPeer::CODART)) $criteria->add(FarecserartPeer::CODART, $this->codart);
		if ($this->isColumnModified(FarecserartPeer::CODSER)) $criteria->add(FarecserartPeer::CODSER, $this->codser);
		if ($this->isColumnModified(FarecserartPeer::UNISER)) $criteria->add(FarecserartPeer::UNISER, $this->uniser);
		if ($this->isColumnModified(FarecserartPeer::CANSER)) $criteria->add(FarecserartPeer::CANSER, $this->canser);
		if ($this->isColumnModified(FarecserartPeer::ID)) $criteria->add(FarecserartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FarecserartPeer::DATABASE_NAME);

		$criteria->add(FarecserartPeer::ID, $this->id);

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

		$copyObj->setCodser($this->codser);

		$copyObj->setUniser($this->uniser);

		$copyObj->setCanser($this->canser);


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
			self::$peer = new FarecserartPeer();
		}
		return self::$peer;
	}

} 