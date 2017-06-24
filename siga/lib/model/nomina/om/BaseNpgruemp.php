<?php


abstract class BaseNpgruemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codgru;


	
	protected $codnom;


	
	protected $codemp;


	
	protected $codcar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodgru()
  {

    return trim($this->codgru);

  }
  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodgru($v)
	{

    if ($this->codgru !== $v) {
        $this->codgru = $v;
        $this->modifiedColumns[] = NpgruempPeer::CODGRU;
      }
  
	} 
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpgruempPeer::CODNOM;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpgruempPeer::CODEMP;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NpgruempPeer::CODCAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpgruempPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codgru = $rs->getString($startcol + 0);

      $this->codnom = $rs->getString($startcol + 1);

      $this->codemp = $rs->getString($startcol + 2);

      $this->codcar = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npgruemp object", $e);
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
			$con = Propel::getConnection(NpgruempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpgruempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpgruempPeer::DATABASE_NAME);
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
					$pk = NpgruempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpgruempPeer::doUpdate($this, $con);
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


			if (($retval = NpgruempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpgruempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodgru();
				break;
			case 1:
				return $this->getCodnom();
				break;
			case 2:
				return $this->getCodemp();
				break;
			case 3:
				return $this->getCodcar();
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
		$keys = NpgruempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodgru(),
			$keys[1] => $this->getCodnom(),
			$keys[2] => $this->getCodemp(),
			$keys[3] => $this->getCodcar(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpgruempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodgru($value);
				break;
			case 1:
				$this->setCodnom($value);
				break;
			case 2:
				$this->setCodemp($value);
				break;
			case 3:
				$this->setCodcar($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpgruempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodgru($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodnom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpgruempPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpgruempPeer::CODGRU)) $criteria->add(NpgruempPeer::CODGRU, $this->codgru);
		if ($this->isColumnModified(NpgruempPeer::CODNOM)) $criteria->add(NpgruempPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpgruempPeer::CODEMP)) $criteria->add(NpgruempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpgruempPeer::CODCAR)) $criteria->add(NpgruempPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpgruempPeer::ID)) $criteria->add(NpgruempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpgruempPeer::DATABASE_NAME);

		$criteria->add(NpgruempPeer::ID, $this->id);

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

		$copyObj->setCodgru($this->codgru);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcar($this->codcar);


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
			self::$peer = new NpgruempPeer();
		}
		return self::$peer;
	}

} 