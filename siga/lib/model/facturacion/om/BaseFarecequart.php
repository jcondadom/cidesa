<?php


abstract class BaseFarecequart extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codart;


	
	protected $codequ;


	
	protected $uniequ;


	
	protected $canequ;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodequ()
  {

    return trim($this->codequ);

  }
  
  public function getUniequ()
  {

    return trim($this->uniequ);

  }
  
  public function getCanequ($val=false)
  {

    if($val) return number_format($this->canequ,2,',','.');
    else return $this->canequ;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FarecequartPeer::CODART;
      }
  
	} 
	
	public function setCodequ($v)
	{

    if ($this->codequ !== $v) {
        $this->codequ = $v;
        $this->modifiedColumns[] = FarecequartPeer::CODEQU;
      }
  
	} 
	
	public function setUniequ($v)
	{

    if ($this->uniequ !== $v) {
        $this->uniequ = $v;
        $this->modifiedColumns[] = FarecequartPeer::UNIEQU;
      }
  
	} 
	
	public function setCanequ($v)
	{

    if ($this->canequ !== $v) {
        $this->canequ = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FarecequartPeer::CANEQU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FarecequartPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codart = $rs->getString($startcol + 0);

      $this->codequ = $rs->getString($startcol + 1);

      $this->uniequ = $rs->getString($startcol + 2);

      $this->canequ = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Farecequart object", $e);
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
			$con = Propel::getConnection(FarecequartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FarecequartPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FarecequartPeer::DATABASE_NAME);
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
					$pk = FarecequartPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FarecequartPeer::doUpdate($this, $con);
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


			if (($retval = FarecequartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FarecequartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodart();
				break;
			case 1:
				return $this->getCodequ();
				break;
			case 2:
				return $this->getUniequ();
				break;
			case 3:
				return $this->getCanequ();
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
		$keys = FarecequartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodart(),
			$keys[1] => $this->getCodequ(),
			$keys[2] => $this->getUniequ(),
			$keys[3] => $this->getCanequ(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FarecequartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodart($value);
				break;
			case 1:
				$this->setCodequ($value);
				break;
			case 2:
				$this->setUniequ($value);
				break;
			case 3:
				$this->setCanequ($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FarecequartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodequ($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUniequ($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanequ($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FarecequartPeer::DATABASE_NAME);

		if ($this->isColumnModified(FarecequartPeer::CODART)) $criteria->add(FarecequartPeer::CODART, $this->codart);
		if ($this->isColumnModified(FarecequartPeer::CODEQU)) $criteria->add(FarecequartPeer::CODEQU, $this->codequ);
		if ($this->isColumnModified(FarecequartPeer::UNIEQU)) $criteria->add(FarecequartPeer::UNIEQU, $this->uniequ);
		if ($this->isColumnModified(FarecequartPeer::CANEQU)) $criteria->add(FarecequartPeer::CANEQU, $this->canequ);
		if ($this->isColumnModified(FarecequartPeer::ID)) $criteria->add(FarecequartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FarecequartPeer::DATABASE_NAME);

		$criteria->add(FarecequartPeer::ID, $this->id);

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

		$copyObj->setCodequ($this->codequ);

		$copyObj->setUniequ($this->uniequ);

		$copyObj->setCanequ($this->canequ);


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
			self::$peer = new FarecequartPeer();
		}
		return self::$peer;
	}

} 