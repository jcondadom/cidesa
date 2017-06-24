<?php


abstract class BaseCadefunimed extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codunimed;


	
	protected $desunimed;


	
	protected $abrunimed;


	
	protected $tipunimed;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodunimed()
  {

    return trim($this->codunimed);

  }
  
  public function getDesunimed()
  {

    return trim($this->desunimed);

  }
  
  public function getAbrunimed()
  {

    return trim($this->abrunimed);

  }
  
  public function getTipunimed()
  {

    return trim($this->tipunimed);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodunimed($v)
	{

    if ($this->codunimed !== $v) {
        $this->codunimed = $v;
        $this->modifiedColumns[] = CadefunimedPeer::CODUNIMED;
      }
  
	} 
	
	public function setDesunimed($v)
	{

    if ($this->desunimed !== $v) {
        $this->desunimed = $v;
        $this->modifiedColumns[] = CadefunimedPeer::DESUNIMED;
      }
  
	} 
	
	public function setAbrunimed($v)
	{

    if ($this->abrunimed !== $v) {
        $this->abrunimed = $v;
        $this->modifiedColumns[] = CadefunimedPeer::ABRUNIMED;
      }
  
	} 
	
	public function setTipunimed($v)
	{

    if ($this->tipunimed !== $v) {
        $this->tipunimed = $v;
        $this->modifiedColumns[] = CadefunimedPeer::TIPUNIMED;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadefunimedPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codunimed = $rs->getString($startcol + 0);

      $this->desunimed = $rs->getString($startcol + 1);

      $this->abrunimed = $rs->getString($startcol + 2);

      $this->tipunimed = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadefunimed object", $e);
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
			$con = Propel::getConnection(CadefunimedPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadefunimedPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadefunimedPeer::DATABASE_NAME);
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
					$pk = CadefunimedPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadefunimedPeer::doUpdate($this, $con);
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


			if (($retval = CadefunimedPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefunimedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodunimed();
				break;
			case 1:
				return $this->getDesunimed();
				break;
			case 2:
				return $this->getAbrunimed();
				break;
			case 3:
				return $this->getTipunimed();
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
		$keys = CadefunimedPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodunimed(),
			$keys[1] => $this->getDesunimed(),
			$keys[2] => $this->getAbrunimed(),
			$keys[3] => $this->getTipunimed(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefunimedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodunimed($value);
				break;
			case 1:
				$this->setDesunimed($value);
				break;
			case 2:
				$this->setAbrunimed($value);
				break;
			case 3:
				$this->setTipunimed($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefunimedPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodunimed($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesunimed($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAbrunimed($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipunimed($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadefunimedPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadefunimedPeer::CODUNIMED)) $criteria->add(CadefunimedPeer::CODUNIMED, $this->codunimed);
		if ($this->isColumnModified(CadefunimedPeer::DESUNIMED)) $criteria->add(CadefunimedPeer::DESUNIMED, $this->desunimed);
		if ($this->isColumnModified(CadefunimedPeer::ABRUNIMED)) $criteria->add(CadefunimedPeer::ABRUNIMED, $this->abrunimed);
		if ($this->isColumnModified(CadefunimedPeer::TIPUNIMED)) $criteria->add(CadefunimedPeer::TIPUNIMED, $this->tipunimed);
		if ($this->isColumnModified(CadefunimedPeer::ID)) $criteria->add(CadefunimedPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadefunimedPeer::DATABASE_NAME);

		$criteria->add(CadefunimedPeer::ID, $this->id);

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

		$copyObj->setCodunimed($this->codunimed);

		$copyObj->setDesunimed($this->desunimed);

		$copyObj->setAbrunimed($this->abrunimed);

		$copyObj->setTipunimed($this->tipunimed);


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
			self::$peer = new CadefunimedPeer();
		}
		return self::$peer;
	}

} 