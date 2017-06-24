<?php


abstract class BaseNpinfadm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $fecact;


	
	protected $desact;


	
	protected $obsact;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getFecact()
  {

    return trim($this->fecact);

  }
  
  public function getDesact()
  {

    return trim($this->desact);

  }
  
  public function getObsact()
  {

    return trim($this->obsact);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpinfadmPeer::CODEMP;
      }
  
	} 
	
	public function setFecact($v)
	{

    if ($this->fecact !== $v) {
        $this->fecact = $v;
        $this->modifiedColumns[] = NpinfadmPeer::FECACT;
      }
  
	} 
	
	public function setDesact($v)
	{

    if ($this->desact !== $v) {
        $this->desact = $v;
        $this->modifiedColumns[] = NpinfadmPeer::DESACT;
      }
  
	} 
	
	public function setObsact($v)
	{

    if ($this->obsact !== $v) {
        $this->obsact = $v;
        $this->modifiedColumns[] = NpinfadmPeer::OBSACT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpinfadmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->fecact = $rs->getString($startcol + 1);

      $this->desact = $rs->getString($startcol + 2);

      $this->obsact = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npinfadm object", $e);
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

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpinfadmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinfadmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinfadmPeer::DATABASE_NAME);
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
					$pk = NpinfadmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpinfadmPeer::doUpdate($this, $con);
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


			if (($retval = NpinfadmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfadmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFecact();
				break;
			case 2:
				return $this->getDesact();
				break;
			case 3:
				return $this->getObsact();
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
		$keys = NpinfadmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFecact(),
			$keys[2] => $this->getDesact(),
			$keys[3] => $this->getObsact(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfadmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFecact($value);
				break;
			case 2:
				$this->setDesact($value);
				break;
			case 3:
				$this->setObsact($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfadmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecact($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObsact($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinfadmPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinfadmPeer::CODEMP)) $criteria->add(NpinfadmPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinfadmPeer::FECACT)) $criteria->add(NpinfadmPeer::FECACT, $this->fecact);
		if ($this->isColumnModified(NpinfadmPeer::DESACT)) $criteria->add(NpinfadmPeer::DESACT, $this->desact);
		if ($this->isColumnModified(NpinfadmPeer::OBSACT)) $criteria->add(NpinfadmPeer::OBSACT, $this->obsact);
		if ($this->isColumnModified(NpinfadmPeer::ID)) $criteria->add(NpinfadmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinfadmPeer::DATABASE_NAME);

		$criteria->add(NpinfadmPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setFecact($this->fecact);

		$copyObj->setDesact($this->desact);

		$copyObj->setObsact($this->obsact);


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
			self::$peer = new NpinfadmPeer();
		}
		return self::$peer;
	}

} 