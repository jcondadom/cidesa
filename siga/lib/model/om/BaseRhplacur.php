<?php


abstract class BaseRhplacur extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codplacur;


	
	protected $desplacur;


	
	protected $codcur;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodplacur()
  {

    return trim($this->codplacur);

  }
  
  public function getDesplacur()
  {

    return trim($this->desplacur);

  }
  
  public function getCodcur()
  {

    return trim($this->codcur);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodplacur($v)
	{

    if ($this->codplacur !== $v) {
        $this->codplacur = $v;
        $this->modifiedColumns[] = RhplacurPeer::CODPLACUR;
      }
  
	} 
	
	public function setDesplacur($v)
	{

    if ($this->desplacur !== $v) {
        $this->desplacur = $v;
        $this->modifiedColumns[] = RhplacurPeer::DESPLACUR;
      }
  
	} 
	
	public function setCodcur($v)
	{

    if ($this->codcur !== $v) {
        $this->codcur = $v;
        $this->modifiedColumns[] = RhplacurPeer::CODCUR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RhplacurPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codplacur = $rs->getString($startcol + 0);

      $this->desplacur = $rs->getString($startcol + 1);

      $this->codcur = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Rhplacur object", $e);
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
			$con = Propel::getConnection(RhplacurPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhplacurPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhplacurPeer::DATABASE_NAME);
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
					$pk = RhplacurPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RhplacurPeer::doUpdate($this, $con);
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


			if (($retval = RhplacurPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhplacurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodplacur();
				break;
			case 1:
				return $this->getDesplacur();
				break;
			case 2:
				return $this->getCodcur();
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
		$keys = RhplacurPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodplacur(),
			$keys[1] => $this->getDesplacur(),
			$keys[2] => $this->getCodcur(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhplacurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodplacur($value);
				break;
			case 1:
				$this->setDesplacur($value);
				break;
			case 2:
				$this->setCodcur($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhplacurPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodplacur($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesplacur($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcur($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhplacurPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhplacurPeer::CODPLACUR)) $criteria->add(RhplacurPeer::CODPLACUR, $this->codplacur);
		if ($this->isColumnModified(RhplacurPeer::DESPLACUR)) $criteria->add(RhplacurPeer::DESPLACUR, $this->desplacur);
		if ($this->isColumnModified(RhplacurPeer::CODCUR)) $criteria->add(RhplacurPeer::CODCUR, $this->codcur);
		if ($this->isColumnModified(RhplacurPeer::ID)) $criteria->add(RhplacurPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhplacurPeer::DATABASE_NAME);

		$criteria->add(RhplacurPeer::ID, $this->id);

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

		$copyObj->setCodplacur($this->codplacur);

		$copyObj->setDesplacur($this->desplacur);

		$copyObj->setCodcur($this->codcur);


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
			self::$peer = new RhplacurPeer();
		}
		return self::$peer;
	}

} 