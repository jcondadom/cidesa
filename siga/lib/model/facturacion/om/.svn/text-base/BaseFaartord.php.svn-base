<?php


abstract class BaseFaartord extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ordcom;


	
	protected $codart;


	
	protected $codunimed;


	
	protected $canord;


	
	protected $canrec;


	
	protected $preart;


	
	protected $monrgo;


	
	protected $porrgo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getOrdcom()
  {

    return trim($this->ordcom);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodunimed()
  {

    return trim($this->codunimed);

  }
  
  public function getCanord($val=false)
  {

    if($val) return number_format($this->canord,2,',','.');
    else return $this->canord;

  }
  
  public function getCanrec($val=false)
  {

    if($val) return number_format($this->canrec,2,',','.');
    else return $this->canrec;

  }
  
  public function getPreart($val=false)
  {

    if($val) return number_format($this->preart,2,',','.');
    else return $this->preart;

  }
  
  public function getMonrgo($val=false)
  {

    if($val) return number_format($this->monrgo,2,',','.');
    else return $this->monrgo;

  }
  
  public function getPorrgo($val=false)
  {

    if($val) return number_format($this->porrgo,2,',','.');
    else return $this->porrgo;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setOrdcom($v)
	{

    if ($this->ordcom !== $v) {
        $this->ordcom = $v;
        $this->modifiedColumns[] = FaartordPeer::ORDCOM;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FaartordPeer::CODART;
      }
  
	} 
	
	public function setCodunimed($v)
	{

    if ($this->codunimed !== $v) {
        $this->codunimed = $v;
        $this->modifiedColumns[] = FaartordPeer::CODUNIMED;
      }
  
	} 
	
	public function setCanord($v)
	{

    if ($this->canord !== $v) {
        $this->canord = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartordPeer::CANORD;
      }
  
	} 
	
	public function setCanrec($v)
	{

    if ($this->canrec !== $v) {
        $this->canrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartordPeer::CANREC;
      }
  
	} 
	
	public function setPreart($v)
	{

    if ($this->preart !== $v) {
        $this->preart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartordPeer::PREART;
      }
  
	} 
	
	public function setMonrgo($v)
	{

    if ($this->monrgo !== $v) {
        $this->monrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartordPeer::MONRGO;
      }
  
	} 
	
	public function setPorrgo($v)
	{

    if ($this->porrgo !== $v) {
        $this->porrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartordPeer::PORRGO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaartordPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->ordcom = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->codunimed = $rs->getString($startcol + 2);

      $this->canord = $rs->getFloat($startcol + 3);

      $this->canrec = $rs->getFloat($startcol + 4);

      $this->preart = $rs->getFloat($startcol + 5);

      $this->monrgo = $rs->getFloat($startcol + 6);

      $this->porrgo = $rs->getFloat($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faartord object", $e);
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
			$con = Propel::getConnection(FaartordPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaartordPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaartordPeer::DATABASE_NAME);
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
					$pk = FaartordPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaartordPeer::doUpdate($this, $con);
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


			if (($retval = FaartordPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getOrdcom();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodunimed();
				break;
			case 3:
				return $this->getCanord();
				break;
			case 4:
				return $this->getCanrec();
				break;
			case 5:
				return $this->getPreart();
				break;
			case 6:
				return $this->getMonrgo();
				break;
			case 7:
				return $this->getPorrgo();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaartordPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOrdcom(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodunimed(),
			$keys[3] => $this->getCanord(),
			$keys[4] => $this->getCanrec(),
			$keys[5] => $this->getPreart(),
			$keys[6] => $this->getMonrgo(),
			$keys[7] => $this->getPorrgo(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setOrdcom($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodunimed($value);
				break;
			case 3:
				$this->setCanord($value);
				break;
			case 4:
				$this->setCanrec($value);
				break;
			case 5:
				$this->setPreart($value);
				break;
			case 6:
				$this->setMonrgo($value);
				break;
			case 7:
				$this->setPorrgo($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaartordPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOrdcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodunimed($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanord($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanrec($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPreart($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonrgo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPorrgo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaartordPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaartordPeer::ORDCOM)) $criteria->add(FaartordPeer::ORDCOM, $this->ordcom);
		if ($this->isColumnModified(FaartordPeer::CODART)) $criteria->add(FaartordPeer::CODART, $this->codart);
		if ($this->isColumnModified(FaartordPeer::CODUNIMED)) $criteria->add(FaartordPeer::CODUNIMED, $this->codunimed);
		if ($this->isColumnModified(FaartordPeer::CANORD)) $criteria->add(FaartordPeer::CANORD, $this->canord);
		if ($this->isColumnModified(FaartordPeer::CANREC)) $criteria->add(FaartordPeer::CANREC, $this->canrec);
		if ($this->isColumnModified(FaartordPeer::PREART)) $criteria->add(FaartordPeer::PREART, $this->preart);
		if ($this->isColumnModified(FaartordPeer::MONRGO)) $criteria->add(FaartordPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(FaartordPeer::PORRGO)) $criteria->add(FaartordPeer::PORRGO, $this->porrgo);
		if ($this->isColumnModified(FaartordPeer::ID)) $criteria->add(FaartordPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaartordPeer::DATABASE_NAME);

		$criteria->add(FaartordPeer::ID, $this->id);

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

		$copyObj->setOrdcom($this->ordcom);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodunimed($this->codunimed);

		$copyObj->setCanord($this->canord);

		$copyObj->setCanrec($this->canrec);

		$copyObj->setPreart($this->preart);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setPorrgo($this->porrgo);


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
			self::$peer = new FaartordPeer();
		}
		return self::$peer;
	}

} 