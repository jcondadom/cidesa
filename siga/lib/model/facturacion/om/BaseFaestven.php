<?php


abstract class BaseFaestven extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $anoest;


	
	protected $mesest;


	
	protected $monest;


	
	protected $monfac;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAnoest()
  {

    return trim($this->anoest);

  }
  
  public function getMesest()
  {

    return trim($this->mesest);

  }
  
  public function getMonest($val=false)
  {

    if($val) return number_format($this->monest,2,',','.');
    else return $this->monest;

  }
  
  public function getMonfac($val=false)
  {

    if($val) return number_format($this->monfac,2,',','.');
    else return $this->monfac;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAnoest($v)
	{

    if ($this->anoest !== $v) {
        $this->anoest = $v;
        $this->modifiedColumns[] = FaestvenPeer::ANOEST;
      }
  
	} 
	
	public function setMesest($v)
	{

    if ($this->mesest !== $v) {
        $this->mesest = $v;
        $this->modifiedColumns[] = FaestvenPeer::MESEST;
      }
  
	} 
	
	public function setMonest($v)
	{

    if ($this->monest !== $v) {
        $this->monest = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaestvenPeer::MONEST;
      }
  
	} 
	
	public function setMonfac($v)
	{

    if ($this->monfac !== $v) {
        $this->monfac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaestvenPeer::MONFAC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaestvenPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->anoest = $rs->getString($startcol + 0);

      $this->mesest = $rs->getString($startcol + 1);

      $this->monest = $rs->getFloat($startcol + 2);

      $this->monfac = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faestven object", $e);
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
			$con = Propel::getConnection(FaestvenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaestvenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaestvenPeer::DATABASE_NAME);
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
					$pk = FaestvenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaestvenPeer::doUpdate($this, $con);
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


			if (($retval = FaestvenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaestvenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAnoest();
				break;
			case 1:
				return $this->getMesest();
				break;
			case 2:
				return $this->getMonest();
				break;
			case 3:
				return $this->getMonfac();
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
		$keys = FaestvenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAnoest(),
			$keys[1] => $this->getMesest(),
			$keys[2] => $this->getMonest(),
			$keys[3] => $this->getMonfac(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaestvenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAnoest($value);
				break;
			case 1:
				$this->setMesest($value);
				break;
			case 2:
				$this->setMonest($value);
				break;
			case 3:
				$this->setMonfac($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaestvenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAnoest($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMesest($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonest($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonfac($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaestvenPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaestvenPeer::ANOEST)) $criteria->add(FaestvenPeer::ANOEST, $this->anoest);
		if ($this->isColumnModified(FaestvenPeer::MESEST)) $criteria->add(FaestvenPeer::MESEST, $this->mesest);
		if ($this->isColumnModified(FaestvenPeer::MONEST)) $criteria->add(FaestvenPeer::MONEST, $this->monest);
		if ($this->isColumnModified(FaestvenPeer::MONFAC)) $criteria->add(FaestvenPeer::MONFAC, $this->monfac);
		if ($this->isColumnModified(FaestvenPeer::ID)) $criteria->add(FaestvenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaestvenPeer::DATABASE_NAME);

		$criteria->add(FaestvenPeer::ID, $this->id);

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

		$copyObj->setAnoest($this->anoest);

		$copyObj->setMesest($this->mesest);

		$copyObj->setMonest($this->monest);

		$copyObj->setMonfac($this->monfac);


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
			self::$peer = new FaestvenPeer();
		}
		return self::$peer;
	}

} 