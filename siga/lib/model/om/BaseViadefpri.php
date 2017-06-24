<?php


abstract class BaseViadefpri extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpri;


	
	protected $despri;


	
	protected $forcal;


	
	protected $sumres;


	
	protected $monfij;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpri()
  {

    return trim($this->codpri);

  }
  
  public function getDespri()
  {

    return trim($this->despri);

  }
  
  public function getForcal()
  {

    return trim($this->forcal);

  }
  
  public function getSumres()
  {

    return trim($this->sumres);

  }
  
  public function getMonfij($val=false)
  {

    if($val) return number_format($this->monfij,2,',','.');
    else return $this->monfij;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpri($v)
	{

    if ($this->codpri !== $v) {
        $this->codpri = $v;
        $this->modifiedColumns[] = ViadefpriPeer::CODPRI;
      }
  
	} 
	
	public function setDespri($v)
	{

    if ($this->despri !== $v) {
        $this->despri = $v;
        $this->modifiedColumns[] = ViadefpriPeer::DESPRI;
      }
  
	} 
	
	public function setForcal($v)
	{

    if ($this->forcal !== $v) {
        $this->forcal = $v;
        $this->modifiedColumns[] = ViadefpriPeer::FORCAL;
      }
  
	} 
	
	public function setSumres($v)
	{

    if ($this->sumres !== $v) {
        $this->sumres = $v;
        $this->modifiedColumns[] = ViadefpriPeer::SUMRES;
      }
  
	} 
	
	public function setMonfij($v)
	{

    if ($this->monfij !== $v) {
        $this->monfij = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ViadefpriPeer::MONFIJ;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViadefpriPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpri = $rs->getString($startcol + 0);

      $this->despri = $rs->getString($startcol + 1);

      $this->forcal = $rs->getString($startcol + 2);

      $this->sumres = $rs->getString($startcol + 3);

      $this->monfij = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viadefpri object", $e);
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
			$con = Propel::getConnection(ViadefpriPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViadefpriPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViadefpriPeer::DATABASE_NAME);
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
					$pk = ViadefpriPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViadefpriPeer::doUpdate($this, $con);
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


			if (($retval = ViadefpriPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadefpriPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpri();
				break;
			case 1:
				return $this->getDespri();
				break;
			case 2:
				return $this->getForcal();
				break;
			case 3:
				return $this->getSumres();
				break;
			case 4:
				return $this->getMonfij();
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
		$keys = ViadefpriPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpri(),
			$keys[1] => $this->getDespri(),
			$keys[2] => $this->getForcal(),
			$keys[3] => $this->getSumres(),
			$keys[4] => $this->getMonfij(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViadefpriPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpri($value);
				break;
			case 1:
				$this->setDespri($value);
				break;
			case 2:
				$this->setForcal($value);
				break;
			case 3:
				$this->setSumres($value);
				break;
			case 4:
				$this->setMonfij($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViadefpriPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpri($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDespri($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setForcal($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSumres($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonfij($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViadefpriPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViadefpriPeer::CODPRI)) $criteria->add(ViadefpriPeer::CODPRI, $this->codpri);
		if ($this->isColumnModified(ViadefpriPeer::DESPRI)) $criteria->add(ViadefpriPeer::DESPRI, $this->despri);
		if ($this->isColumnModified(ViadefpriPeer::FORCAL)) $criteria->add(ViadefpriPeer::FORCAL, $this->forcal);
		if ($this->isColumnModified(ViadefpriPeer::SUMRES)) $criteria->add(ViadefpriPeer::SUMRES, $this->sumres);
		if ($this->isColumnModified(ViadefpriPeer::MONFIJ)) $criteria->add(ViadefpriPeer::MONFIJ, $this->monfij);
		if ($this->isColumnModified(ViadefpriPeer::ID)) $criteria->add(ViadefpriPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViadefpriPeer::DATABASE_NAME);

		$criteria->add(ViadefpriPeer::ID, $this->id);

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

		$copyObj->setCodpri($this->codpri);

		$copyObj->setDespri($this->despri);

		$copyObj->setForcal($this->forcal);

		$copyObj->setSumres($this->sumres);

		$copyObj->setMonfij($this->monfij);


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
			self::$peer = new ViadefpriPeer();
		}
		return self::$peer;
	}

} 