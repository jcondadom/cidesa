<?php


abstract class BaseFapreequart extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpre;


	
	protected $codart;


	
	protected $codequ;


	
	protected $uniequ;


	
	protected $canequ;


	
	protected $cosequ;


	
	protected $totequ;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefpre()
  {

    return trim($this->refpre);

  }
  
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
  
  public function getCosequ($val=false)
  {

    if($val) return number_format($this->cosequ,2,',','.');
    else return $this->cosequ;

  }
  
  public function getTotequ($val=false)
  {

    if($val) return number_format($this->totequ,2,',','.');
    else return $this->totequ;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefpre($v)
	{

    if ($this->refpre !== $v) {
        $this->refpre = $v;
        $this->modifiedColumns[] = FapreequartPeer::REFPRE;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FapreequartPeer::CODART;
      }
  
	} 
	
	public function setCodequ($v)
	{

    if ($this->codequ !== $v) {
        $this->codequ = $v;
        $this->modifiedColumns[] = FapreequartPeer::CODEQU;
      }
  
	} 
	
	public function setUniequ($v)
	{

    if ($this->uniequ !== $v) {
        $this->uniequ = $v;
        $this->modifiedColumns[] = FapreequartPeer::UNIEQU;
      }
  
	} 
	
	public function setCanequ($v)
	{

    if ($this->canequ !== $v) {
        $this->canequ = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapreequartPeer::CANEQU;
      }
  
	} 
	
	public function setCosequ($v)
	{

    if ($this->cosequ !== $v) {
        $this->cosequ = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapreequartPeer::COSEQU;
      }
  
	} 
	
	public function setTotequ($v)
	{

    if ($this->totequ !== $v) {
        $this->totequ = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapreequartPeer::TOTEQU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FapreequartPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refpre = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->codequ = $rs->getString($startcol + 2);

      $this->uniequ = $rs->getString($startcol + 3);

      $this->canequ = $rs->getFloat($startcol + 4);

      $this->cosequ = $rs->getFloat($startcol + 5);

      $this->totequ = $rs->getFloat($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fapreequart object", $e);
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
			$con = Propel::getConnection(FapreequartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FapreequartPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FapreequartPeer::DATABASE_NAME);
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
					$pk = FapreequartPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FapreequartPeer::doUpdate($this, $con);
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


			if (($retval = FapreequartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FapreequartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefpre();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodequ();
				break;
			case 3:
				return $this->getUniequ();
				break;
			case 4:
				return $this->getCanequ();
				break;
			case 5:
				return $this->getCosequ();
				break;
			case 6:
				return $this->getTotequ();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FapreequartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpre(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodequ(),
			$keys[3] => $this->getUniequ(),
			$keys[4] => $this->getCanequ(),
			$keys[5] => $this->getCosequ(),
			$keys[6] => $this->getTotequ(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FapreequartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefpre($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodequ($value);
				break;
			case 3:
				$this->setUniequ($value);
				break;
			case 4:
				$this->setCanequ($value);
				break;
			case 5:
				$this->setCosequ($value);
				break;
			case 6:
				$this->setTotequ($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FapreequartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodequ($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUniequ($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanequ($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCosequ($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotequ($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FapreequartPeer::DATABASE_NAME);

		if ($this->isColumnModified(FapreequartPeer::REFPRE)) $criteria->add(FapreequartPeer::REFPRE, $this->refpre);
		if ($this->isColumnModified(FapreequartPeer::CODART)) $criteria->add(FapreequartPeer::CODART, $this->codart);
		if ($this->isColumnModified(FapreequartPeer::CODEQU)) $criteria->add(FapreequartPeer::CODEQU, $this->codequ);
		if ($this->isColumnModified(FapreequartPeer::UNIEQU)) $criteria->add(FapreequartPeer::UNIEQU, $this->uniequ);
		if ($this->isColumnModified(FapreequartPeer::CANEQU)) $criteria->add(FapreequartPeer::CANEQU, $this->canequ);
		if ($this->isColumnModified(FapreequartPeer::COSEQU)) $criteria->add(FapreequartPeer::COSEQU, $this->cosequ);
		if ($this->isColumnModified(FapreequartPeer::TOTEQU)) $criteria->add(FapreequartPeer::TOTEQU, $this->totequ);
		if ($this->isColumnModified(FapreequartPeer::ID)) $criteria->add(FapreequartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FapreequartPeer::DATABASE_NAME);

		$criteria->add(FapreequartPeer::ID, $this->id);

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

		$copyObj->setRefpre($this->refpre);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodequ($this->codequ);

		$copyObj->setUniequ($this->uniequ);

		$copyObj->setCanequ($this->canequ);

		$copyObj->setCosequ($this->cosequ);

		$copyObj->setTotequ($this->totequ);


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
			self::$peer = new FapreequartPeer();
		}
		return self::$peer;
	}

} 