<?php


abstract class BaseMandetesttra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codest;


	
	protected $codart;


	
	protected $canins;


	
	protected $canreq;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodest()
  {

    return trim($this->codest);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCanins($val=false)
  {

    if($val) return number_format($this->canins,2,',','.');
    else return $this->canins;

  }
  
  public function getCanreq($val=false)
  {

    if($val) return number_format($this->canreq,2,',','.');
    else return $this->canreq;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodest($v)
	{

    if ($this->codest !== $v) {
        $this->codest = $v;
        $this->modifiedColumns[] = MandetesttraPeer::CODEST;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = MandetesttraPeer::CODART;
      }
  
	} 
	
	public function setCanins($v)
	{

    if ($this->canins !== $v) {
        $this->canins = Herramientas::toFloat($v);
        $this->modifiedColumns[] = MandetesttraPeer::CANINS;
      }
  
	} 
	
	public function setCanreq($v)
	{

    if ($this->canreq !== $v) {
        $this->canreq = Herramientas::toFloat($v);
        $this->modifiedColumns[] = MandetesttraPeer::CANREQ;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = MandetesttraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codest = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->canins = $rs->getFloat($startcol + 2);

      $this->canreq = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Mandetesttra object", $e);
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
			$con = Propel::getConnection(MandetesttraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MandetesttraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(MandetesttraPeer::DATABASE_NAME);
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
					$pk = MandetesttraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MandetesttraPeer::doUpdate($this, $con);
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


			if (($retval = MandetesttraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MandetesttraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodest();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCanins();
				break;
			case 3:
				return $this->getCanreq();
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
		$keys = MandetesttraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodest(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCanins(),
			$keys[3] => $this->getCanreq(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MandetesttraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodest($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCanins($value);
				break;
			case 3:
				$this->setCanreq($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MandetesttraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodest($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanins($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanreq($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MandetesttraPeer::DATABASE_NAME);

		if ($this->isColumnModified(MandetesttraPeer::CODEST)) $criteria->add(MandetesttraPeer::CODEST, $this->codest);
		if ($this->isColumnModified(MandetesttraPeer::CODART)) $criteria->add(MandetesttraPeer::CODART, $this->codart);
		if ($this->isColumnModified(MandetesttraPeer::CANINS)) $criteria->add(MandetesttraPeer::CANINS, $this->canins);
		if ($this->isColumnModified(MandetesttraPeer::CANREQ)) $criteria->add(MandetesttraPeer::CANREQ, $this->canreq);
		if ($this->isColumnModified(MandetesttraPeer::ID)) $criteria->add(MandetesttraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MandetesttraPeer::DATABASE_NAME);

		$criteria->add(MandetesttraPeer::ID, $this->id);

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

		$copyObj->setCodest($this->codest);

		$copyObj->setCodart($this->codart);

		$copyObj->setCanins($this->canins);

		$copyObj->setCanreq($this->canreq);


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
			self::$peer = new MandetesttraPeer();
		}
		return self::$peer;
	}

} 