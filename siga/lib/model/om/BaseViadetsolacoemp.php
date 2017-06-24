<?php


abstract class BaseViadetsolacoemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numsol;


	
	protected $codempaco;


	
	protected $codnivaco;


	
	protected $refcom;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getCodempaco()
  {

    return trim($this->codempaco);

  }
  
  public function getCodnivaco()
  {

    return trim($this->codnivaco);

  }
  
  public function getRefcom()
  {

    return trim($this->refcom);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = ViadetsolacoempPeer::NUMSOL;
      }
  
	} 
	
	public function setCodempaco($v)
	{

    if ($this->codempaco !== $v) {
        $this->codempaco = $v;
        $this->modifiedColumns[] = ViadetsolacoempPeer::CODEMPACO;
      }
  
	} 
	
	public function setCodnivaco($v)
	{

    if ($this->codnivaco !== $v) {
        $this->codnivaco = $v;
        $this->modifiedColumns[] = ViadetsolacoempPeer::CODNIVACO;
      }
  
	} 
	
	public function setRefcom($v)
	{

    if ($this->refcom !== $v) {
        $this->refcom = $v;
        $this->modifiedColumns[] = ViadetsolacoempPeer::REFCOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViadetsolacoempPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numsol = $rs->getString($startcol + 0);

      $this->codempaco = $rs->getString($startcol + 1);

      $this->codnivaco = $rs->getString($startcol + 2);

      $this->refcom = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viadetsolacoemp object", $e);
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
			$con = Propel::getConnection(ViadetsolacoempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViadetsolacoempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViadetsolacoempPeer::DATABASE_NAME);
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
					$pk = ViadetsolacoempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViadetsolacoempPeer::doUpdate($this, $con);
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


			if (($retval = ViadetsolacoempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadetsolacoempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumsol();
				break;
			case 1:
				return $this->getCodempaco();
				break;
			case 2:
				return $this->getCodnivaco();
				break;
			case 3:
				return $this->getRefcom();
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
		$keys = ViadetsolacoempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumsol(),
			$keys[1] => $this->getCodempaco(),
			$keys[2] => $this->getCodnivaco(),
			$keys[3] => $this->getRefcom(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadetsolacoempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumsol($value);
				break;
			case 1:
				$this->setCodempaco($value);
				break;
			case 2:
				$this->setCodnivaco($value);
				break;
			case 3:
				$this->setRefcom($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViadetsolacoempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodempaco($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodnivaco($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefcom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViadetsolacoempPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViadetsolacoempPeer::NUMSOL)) $criteria->add(ViadetsolacoempPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(ViadetsolacoempPeer::CODEMPACO)) $criteria->add(ViadetsolacoempPeer::CODEMPACO, $this->codempaco);
		if ($this->isColumnModified(ViadetsolacoempPeer::CODNIVACO)) $criteria->add(ViadetsolacoempPeer::CODNIVACO, $this->codnivaco);
		if ($this->isColumnModified(ViadetsolacoempPeer::REFCOM)) $criteria->add(ViadetsolacoempPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(ViadetsolacoempPeer::ID)) $criteria->add(ViadetsolacoempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViadetsolacoempPeer::DATABASE_NAME);

		$criteria->add(ViadetsolacoempPeer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setCodempaco($this->codempaco);

		$copyObj->setCodnivaco($this->codnivaco);

		$copyObj->setRefcom($this->refcom);


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
			self::$peer = new ViadetsolacoempPeer();
		}
		return self::$peer;
	}

} 