<?php


abstract class BaseFaprematart extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpre;


	
	protected $codart;


	
	protected $codmat;


	
	protected $unimat;


	
	protected $canmat;


	
	protected $cosmat;


	
	protected $totmat;


	
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
  
  public function getCosmat($val=false)
  {

    if($val) return number_format($this->cosmat,2,',','.');
    else return $this->cosmat;

  }
  
  public function getTotmat($val=false)
  {

    if($val) return number_format($this->totmat,2,',','.');
    else return $this->totmat;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefpre($v)
	{

    if ($this->refpre !== $v) {
        $this->refpre = $v;
        $this->modifiedColumns[] = FaprematartPeer::REFPRE;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FaprematartPeer::CODART;
      }
  
	} 
	
	public function setCodmat($v)
	{

    if ($this->codmat !== $v) {
        $this->codmat = $v;
        $this->modifiedColumns[] = FaprematartPeer::CODMAT;
      }
  
	} 
	
	public function setUnimat($v)
	{

    if ($this->unimat !== $v) {
        $this->unimat = $v;
        $this->modifiedColumns[] = FaprematartPeer::UNIMAT;
      }
  
	} 
	
	public function setCanmat($v)
	{

    if ($this->canmat !== $v) {
        $this->canmat = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaprematartPeer::CANMAT;
      }
  
	} 
	
	public function setCosmat($v)
	{

    if ($this->cosmat !== $v) {
        $this->cosmat = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaprematartPeer::COSMAT;
      }
  
	} 
	
	public function setTotmat($v)
	{

    if ($this->totmat !== $v) {
        $this->totmat = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaprematartPeer::TOTMAT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaprematartPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refpre = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->codmat = $rs->getString($startcol + 2);

      $this->unimat = $rs->getString($startcol + 3);

      $this->canmat = $rs->getFloat($startcol + 4);

      $this->cosmat = $rs->getFloat($startcol + 5);

      $this->totmat = $rs->getFloat($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faprematart object", $e);
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
			$con = Propel::getConnection(FaprematartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaprematartPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaprematartPeer::DATABASE_NAME);
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
					$pk = FaprematartPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaprematartPeer::doUpdate($this, $con);
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


			if (($retval = FaprematartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaprematartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCodmat();
				break;
			case 3:
				return $this->getUnimat();
				break;
			case 4:
				return $this->getCanmat();
				break;
			case 5:
				return $this->getCosmat();
				break;
			case 6:
				return $this->getTotmat();
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
		$keys = FaprematartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpre(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodmat(),
			$keys[3] => $this->getUnimat(),
			$keys[4] => $this->getCanmat(),
			$keys[5] => $this->getCosmat(),
			$keys[6] => $this->getTotmat(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaprematartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCodmat($value);
				break;
			case 3:
				$this->setUnimat($value);
				break;
			case 4:
				$this->setCanmat($value);
				break;
			case 5:
				$this->setCosmat($value);
				break;
			case 6:
				$this->setTotmat($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaprematartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUnimat($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanmat($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCosmat($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTotmat($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaprematartPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaprematartPeer::REFPRE)) $criteria->add(FaprematartPeer::REFPRE, $this->refpre);
		if ($this->isColumnModified(FaprematartPeer::CODART)) $criteria->add(FaprematartPeer::CODART, $this->codart);
		if ($this->isColumnModified(FaprematartPeer::CODMAT)) $criteria->add(FaprematartPeer::CODMAT, $this->codmat);
		if ($this->isColumnModified(FaprematartPeer::UNIMAT)) $criteria->add(FaprematartPeer::UNIMAT, $this->unimat);
		if ($this->isColumnModified(FaprematartPeer::CANMAT)) $criteria->add(FaprematartPeer::CANMAT, $this->canmat);
		if ($this->isColumnModified(FaprematartPeer::COSMAT)) $criteria->add(FaprematartPeer::COSMAT, $this->cosmat);
		if ($this->isColumnModified(FaprematartPeer::TOTMAT)) $criteria->add(FaprematartPeer::TOTMAT, $this->totmat);
		if ($this->isColumnModified(FaprematartPeer::ID)) $criteria->add(FaprematartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaprematartPeer::DATABASE_NAME);

		$criteria->add(FaprematartPeer::ID, $this->id);

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

		$copyObj->setCodmat($this->codmat);

		$copyObj->setUnimat($this->unimat);

		$copyObj->setCanmat($this->canmat);

		$copyObj->setCosmat($this->cosmat);

		$copyObj->setTotmat($this->totmat);


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
			self::$peer = new FaprematartPeer();
		}
		return self::$peer;
	}

} 