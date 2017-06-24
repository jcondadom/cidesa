<?php


abstract class BaseFapreprocan extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codart;


	
	protected $codcan;


	
	protected $frecuen;


	
	protected $precio;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodcan()
  {

    return trim($this->codcan);

  }
  
  public function getFrecuen()
  {

    return trim($this->frecuen);

  }
  
  public function getPrecio($val=false)
  {

    if($val) return number_format($this->precio,2,',','.');
    else return $this->precio;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FapreprocanPeer::CODART;
      }
  
	} 
	
	public function setCodcan($v)
	{

    if ($this->codcan !== $v) {
        $this->codcan = $v;
        $this->modifiedColumns[] = FapreprocanPeer::CODCAN;
      }
  
	} 
	
	public function setFrecuen($v)
	{

    if ($this->frecuen !== $v) {
        $this->frecuen = $v;
        $this->modifiedColumns[] = FapreprocanPeer::FRECUEN;
      }
  
	} 
	
	public function setPrecio($v)
	{

    if ($this->precio !== $v) {
        $this->precio = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapreprocanPeer::PRECIO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FapreprocanPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codart = $rs->getString($startcol + 0);

      $this->codcan = $rs->getString($startcol + 1);

      $this->frecuen = $rs->getString($startcol + 2);

      $this->precio = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fapreprocan object", $e);
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
			$con = Propel::getConnection(FapreprocanPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FapreprocanPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FapreprocanPeer::DATABASE_NAME);
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
					$pk = FapreprocanPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FapreprocanPeer::doUpdate($this, $con);
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


			if (($retval = FapreprocanPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FapreprocanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodart();
				break;
			case 1:
				return $this->getCodcan();
				break;
			case 2:
				return $this->getFrecuen();
				break;
			case 3:
				return $this->getPrecio();
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
		$keys = FapreprocanPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodart(),
			$keys[1] => $this->getCodcan(),
			$keys[2] => $this->getFrecuen(),
			$keys[3] => $this->getPrecio(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FapreprocanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodart($value);
				break;
			case 1:
				$this->setCodcan($value);
				break;
			case 2:
				$this->setFrecuen($value);
				break;
			case 3:
				$this->setPrecio($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FapreprocanPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcan($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFrecuen($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPrecio($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FapreprocanPeer::DATABASE_NAME);

		if ($this->isColumnModified(FapreprocanPeer::CODART)) $criteria->add(FapreprocanPeer::CODART, $this->codart);
		if ($this->isColumnModified(FapreprocanPeer::CODCAN)) $criteria->add(FapreprocanPeer::CODCAN, $this->codcan);
		if ($this->isColumnModified(FapreprocanPeer::FRECUEN)) $criteria->add(FapreprocanPeer::FRECUEN, $this->frecuen);
		if ($this->isColumnModified(FapreprocanPeer::PRECIO)) $criteria->add(FapreprocanPeer::PRECIO, $this->precio);
		if ($this->isColumnModified(FapreprocanPeer::ID)) $criteria->add(FapreprocanPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FapreprocanPeer::DATABASE_NAME);

		$criteria->add(FapreprocanPeer::ID, $this->id);

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

		$copyObj->setCodcan($this->codcan);

		$copyObj->setFrecuen($this->frecuen);

		$copyObj->setPrecio($this->precio);


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
			self::$peer = new FapreprocanPeer();
		}
		return self::$peer;
	}

} 