<?php


abstract class BaseFaproduc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $rifprod;


	
	protected $nomprod;


	
	protected $dirprod;


	
	protected $telprod;


	
	protected $emaprod;


	
	protected $porcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRifprod()
  {

    return trim($this->rifprod);

  }
  
  public function getNomprod()
  {

    return trim($this->nomprod);

  }
  
  public function getDirprod()
  {

    return trim($this->dirprod);

  }
  
  public function getTelprod()
  {

    return trim($this->telprod);

  }
  
  public function getEmaprod()
  {

    return trim($this->emaprod);

  }
  
  public function getPorcom($val=false)
  {

    if($val) return number_format($this->porcom,2,',','.');
    else return $this->porcom;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRifprod($v)
	{

    if ($this->rifprod !== $v) {
        $this->rifprod = $v;
        $this->modifiedColumns[] = FaproducPeer::RIFPROD;
      }
  
	} 
	
	public function setNomprod($v)
	{

    if ($this->nomprod !== $v) {
        $this->nomprod = $v;
        $this->modifiedColumns[] = FaproducPeer::NOMPROD;
      }
  
	} 
	
	public function setDirprod($v)
	{

    if ($this->dirprod !== $v) {
        $this->dirprod = $v;
        $this->modifiedColumns[] = FaproducPeer::DIRPROD;
      }
  
	} 
	
	public function setTelprod($v)
	{

    if ($this->telprod !== $v) {
        $this->telprod = $v;
        $this->modifiedColumns[] = FaproducPeer::TELPROD;
      }
  
	} 
	
	public function setEmaprod($v)
	{

    if ($this->emaprod !== $v) {
        $this->emaprod = $v;
        $this->modifiedColumns[] = FaproducPeer::EMAPROD;
      }
  
	} 
	
	public function setPorcom($v)
	{

    if ($this->porcom !== $v) {
        $this->porcom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaproducPeer::PORCOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaproducPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->rifprod = $rs->getString($startcol + 0);

      $this->nomprod = $rs->getString($startcol + 1);

      $this->dirprod = $rs->getString($startcol + 2);

      $this->telprod = $rs->getString($startcol + 3);

      $this->emaprod = $rs->getString($startcol + 4);

      $this->porcom = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faproduc object", $e);
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
			$con = Propel::getConnection(FaproducPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaproducPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaproducPeer::DATABASE_NAME);
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
					$pk = FaproducPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaproducPeer::doUpdate($this, $con);
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


			if (($retval = FaproducPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaproducPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRifprod();
				break;
			case 1:
				return $this->getNomprod();
				break;
			case 2:
				return $this->getDirprod();
				break;
			case 3:
				return $this->getTelprod();
				break;
			case 4:
				return $this->getEmaprod();
				break;
			case 5:
				return $this->getPorcom();
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
		$keys = FaproducPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRifprod(),
			$keys[1] => $this->getNomprod(),
			$keys[2] => $this->getDirprod(),
			$keys[3] => $this->getTelprod(),
			$keys[4] => $this->getEmaprod(),
			$keys[5] => $this->getPorcom(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaproducPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRifprod($value);
				break;
			case 1:
				$this->setNomprod($value);
				break;
			case 2:
				$this->setDirprod($value);
				break;
			case 3:
				$this->setTelprod($value);
				break;
			case 4:
				$this->setEmaprod($value);
				break;
			case 5:
				$this->setPorcom($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaproducPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRifprod($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomprod($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDirprod($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelprod($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEmaprod($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPorcom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaproducPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaproducPeer::RIFPROD)) $criteria->add(FaproducPeer::RIFPROD, $this->rifprod);
		if ($this->isColumnModified(FaproducPeer::NOMPROD)) $criteria->add(FaproducPeer::NOMPROD, $this->nomprod);
		if ($this->isColumnModified(FaproducPeer::DIRPROD)) $criteria->add(FaproducPeer::DIRPROD, $this->dirprod);
		if ($this->isColumnModified(FaproducPeer::TELPROD)) $criteria->add(FaproducPeer::TELPROD, $this->telprod);
		if ($this->isColumnModified(FaproducPeer::EMAPROD)) $criteria->add(FaproducPeer::EMAPROD, $this->emaprod);
		if ($this->isColumnModified(FaproducPeer::PORCOM)) $criteria->add(FaproducPeer::PORCOM, $this->porcom);
		if ($this->isColumnModified(FaproducPeer::ID)) $criteria->add(FaproducPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaproducPeer::DATABASE_NAME);

		$criteria->add(FaproducPeer::ID, $this->id);

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

		$copyObj->setRifprod($this->rifprod);

		$copyObj->setNomprod($this->nomprod);

		$copyObj->setDirprod($this->dirprod);

		$copyObj->setTelprod($this->telprod);

		$copyObj->setEmaprod($this->emaprod);

		$copyObj->setPorcom($this->porcom);


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
			self::$peer = new FaproducPeer();
		}
		return self::$peer;
	}

} 