<?php


abstract class BaseOptipdes extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtde;


	
	protected $destde;


	
	protected $codcta;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtde()
  {

    return trim($this->codtde);

  }
  
  public function getDestde()
  {

    return trim($this->destde);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtde($v)
	{

    if ($this->codtde !== $v) {
        $this->codtde = $v;
        $this->modifiedColumns[] = OptipdesPeer::CODTDE;
      }
  
	} 
	
	public function setDestde($v)
	{

    if ($this->destde !== $v) {
        $this->destde = $v;
        $this->modifiedColumns[] = OptipdesPeer::DESTDE;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = OptipdesPeer::CODCTA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OptipdesPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtde = $rs->getString($startcol + 0);

      $this->destde = $rs->getString($startcol + 1);

      $this->codcta = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Optipdes object", $e);
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
			$con = Propel::getConnection(OptipdesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OptipdesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OptipdesPeer::DATABASE_NAME);
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
					$pk = OptipdesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OptipdesPeer::doUpdate($this, $con);
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


			if (($retval = OptipdesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OptipdesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtde();
				break;
			case 1:
				return $this->getDestde();
				break;
			case 2:
				return $this->getCodcta();
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
		$keys = OptipdesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtde(),
			$keys[1] => $this->getDestde(),
			$keys[2] => $this->getCodcta(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OptipdesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtde($value);
				break;
			case 1:
				$this->setDestde($value);
				break;
			case 2:
				$this->setCodcta($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OptipdesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtde($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestde($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcta($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OptipdesPeer::DATABASE_NAME);

		if ($this->isColumnModified(OptipdesPeer::CODTDE)) $criteria->add(OptipdesPeer::CODTDE, $this->codtde);
		if ($this->isColumnModified(OptipdesPeer::DESTDE)) $criteria->add(OptipdesPeer::DESTDE, $this->destde);
		if ($this->isColumnModified(OptipdesPeer::CODCTA)) $criteria->add(OptipdesPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(OptipdesPeer::ID)) $criteria->add(OptipdesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OptipdesPeer::DATABASE_NAME);

		$criteria->add(OptipdesPeer::ID, $this->id);

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

		$copyObj->setCodtde($this->codtde);

		$copyObj->setDestde($this->destde);

		$copyObj->setCodcta($this->codcta);


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
			self::$peer = new OptipdesPeer();
		}
		return self::$peer;
	}

} 