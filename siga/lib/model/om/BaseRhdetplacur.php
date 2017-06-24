<?php


abstract class BaseRhdetplacur extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codplacur;


	
	protected $codemp;


	
	protected $codcar;


	
	protected $tipper;


	
	protected $codgru;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodplacur()
  {

    return trim($this->codplacur);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getTipper()
  {

    return trim($this->tipper);

  }
  
  public function getCodgru()
  {

    return trim($this->codgru);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodplacur($v)
	{

    if ($this->codplacur !== $v) {
        $this->codplacur = $v;
        $this->modifiedColumns[] = RhdetplacurPeer::CODPLACUR;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = RhdetplacurPeer::CODEMP;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = RhdetplacurPeer::CODCAR;
      }
  
	} 
	
	public function setTipper($v)
	{

    if ($this->tipper !== $v) {
        $this->tipper = $v;
        $this->modifiedColumns[] = RhdetplacurPeer::TIPPER;
      }
  
	} 
	
	public function setCodgru($v)
	{

    if ($this->codgru !== $v) {
        $this->codgru = $v;
        $this->modifiedColumns[] = RhdetplacurPeer::CODGRU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RhdetplacurPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codplacur = $rs->getString($startcol + 0);

      $this->codemp = $rs->getString($startcol + 1);

      $this->codcar = $rs->getString($startcol + 2);

      $this->tipper = $rs->getString($startcol + 3);

      $this->codgru = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Rhdetplacur object", $e);
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
			$con = Propel::getConnection(RhdetplacurPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RhdetplacurPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RhdetplacurPeer::DATABASE_NAME);
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
					$pk = RhdetplacurPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RhdetplacurPeer::doUpdate($this, $con);
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


			if (($retval = RhdetplacurPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdetplacurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodplacur();
				break;
			case 1:
				return $this->getCodemp();
				break;
			case 2:
				return $this->getCodcar();
				break;
			case 3:
				return $this->getTipper();
				break;
			case 4:
				return $this->getCodgru();
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
		$keys = RhdetplacurPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodplacur(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getCodcar(),
			$keys[3] => $this->getTipper(),
			$keys[4] => $this->getCodgru(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RhdetplacurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodplacur($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setCodcar($value);
				break;
			case 3:
				$this->setTipper($value);
				break;
			case 4:
				$this->setCodgru($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RhdetplacurPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodplacur($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipper($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodgru($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RhdetplacurPeer::DATABASE_NAME);

		if ($this->isColumnModified(RhdetplacurPeer::CODPLACUR)) $criteria->add(RhdetplacurPeer::CODPLACUR, $this->codplacur);
		if ($this->isColumnModified(RhdetplacurPeer::CODEMP)) $criteria->add(RhdetplacurPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(RhdetplacurPeer::CODCAR)) $criteria->add(RhdetplacurPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(RhdetplacurPeer::TIPPER)) $criteria->add(RhdetplacurPeer::TIPPER, $this->tipper);
		if ($this->isColumnModified(RhdetplacurPeer::CODGRU)) $criteria->add(RhdetplacurPeer::CODGRU, $this->codgru);
		if ($this->isColumnModified(RhdetplacurPeer::ID)) $criteria->add(RhdetplacurPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RhdetplacurPeer::DATABASE_NAME);

		$criteria->add(RhdetplacurPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setTipper($this->tipper);

		$copyObj->setCodgru($this->codgru);


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
			self::$peer = new RhdetplacurPeer();
		}
		return self::$peer;
	}

} 