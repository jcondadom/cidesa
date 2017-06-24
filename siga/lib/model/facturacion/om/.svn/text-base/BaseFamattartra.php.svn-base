<?php


abstract class BaseFamattartra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reftar;


	
	protected $codart;


	
	protected $codmat;


	
	protected $numpla;


	
	protected $docref;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReftar()
  {

    return trim($this->reftar);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodmat()
  {

    return trim($this->codmat);

  }
  
  public function getNumpla()
  {

    return trim($this->numpla);

  }
  
  public function getDocref()
  {

    return trim($this->docref);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReftar($v)
	{

    if ($this->reftar !== $v) {
        $this->reftar = $v;
        $this->modifiedColumns[] = FamattartraPeer::REFTAR;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FamattartraPeer::CODART;
      }
  
	} 
	
	public function setCodmat($v)
	{

    if ($this->codmat !== $v) {
        $this->codmat = $v;
        $this->modifiedColumns[] = FamattartraPeer::CODMAT;
      }
  
	} 
	
	public function setNumpla($v)
	{

    if ($this->numpla !== $v) {
        $this->numpla = $v;
        $this->modifiedColumns[] = FamattartraPeer::NUMPLA;
      }
  
	} 
	
	public function setDocref($v)
	{

    if ($this->docref !== $v) {
        $this->docref = $v;
        $this->modifiedColumns[] = FamattartraPeer::DOCREF;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FamattartraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reftar = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->codmat = $rs->getString($startcol + 2);

      $this->numpla = $rs->getString($startcol + 3);

      $this->docref = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Famattartra object", $e);
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
			$con = Propel::getConnection(FamattartraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FamattartraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FamattartraPeer::DATABASE_NAME);
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
					$pk = FamattartraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FamattartraPeer::doUpdate($this, $con);
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


			if (($retval = FamattartraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FamattartraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReftar();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodmat();
				break;
			case 3:
				return $this->getNumpla();
				break;
			case 4:
				return $this->getDocref();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FamattartraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReftar(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodmat(),
			$keys[3] => $this->getNumpla(),
			$keys[4] => $this->getDocref(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FamattartraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReftar($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodmat($value);
				break;
			case 3:
				$this->setNumpla($value);
				break;
			case 4:
				$this->setDocref($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FamattartraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReftar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumpla($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDocref($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FamattartraPeer::DATABASE_NAME);

		if ($this->isColumnModified(FamattartraPeer::REFTAR)) $criteria->add(FamattartraPeer::REFTAR, $this->reftar);
		if ($this->isColumnModified(FamattartraPeer::CODART)) $criteria->add(FamattartraPeer::CODART, $this->codart);
		if ($this->isColumnModified(FamattartraPeer::CODMAT)) $criteria->add(FamattartraPeer::CODMAT, $this->codmat);
		if ($this->isColumnModified(FamattartraPeer::NUMPLA)) $criteria->add(FamattartraPeer::NUMPLA, $this->numpla);
		if ($this->isColumnModified(FamattartraPeer::DOCREF)) $criteria->add(FamattartraPeer::DOCREF, $this->docref);
		if ($this->isColumnModified(FamattartraPeer::ID)) $criteria->add(FamattartraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FamattartraPeer::DATABASE_NAME);

		$criteria->add(FamattartraPeer::ID, $this->id);

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

		$copyObj->setReftar($this->reftar);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodmat($this->codmat);

		$copyObj->setNumpla($this->numpla);

		$copyObj->setDocref($this->docref);


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
			self::$peer = new FamattartraPeer();
		}
		return self::$peer;
	}

} 