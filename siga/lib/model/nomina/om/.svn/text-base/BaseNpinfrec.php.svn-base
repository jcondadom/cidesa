<?php


abstract class BaseNpinfrec extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $entrec;


	
	protected $nomrec;


	
	protected $fecrec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getEntrec()
  {

    return trim($this->entrec);

  }
  
  public function getNomrec()
  {

    return trim($this->nomrec);

  }
  
  public function getFecrec()
  {

    return trim($this->fecrec);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpinfrecPeer::CODEMP;
      }
  
	} 
	
	public function setEntrec($v)
	{

    if ($this->entrec !== $v) {
        $this->entrec = $v;
        $this->modifiedColumns[] = NpinfrecPeer::ENTREC;
      }
  
	} 
	
	public function setNomrec($v)
	{

    if ($this->nomrec !== $v) {
        $this->nomrec = $v;
        $this->modifiedColumns[] = NpinfrecPeer::NOMREC;
      }
  
	} 
	
	public function setFecrec($v)
	{

    if ($this->fecrec !== $v) {
        $this->fecrec = $v;
        $this->modifiedColumns[] = NpinfrecPeer::FECREC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpinfrecPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->entrec = $rs->getString($startcol + 1);

      $this->nomrec = $rs->getString($startcol + 2);

      $this->fecrec = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npinfrec object", $e);
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
			$con = Propel::getConnection(NpinfrecPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinfrecPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinfrecPeer::DATABASE_NAME);
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
					$pk = NpinfrecPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpinfrecPeer::doUpdate($this, $con);
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


			if (($retval = NpinfrecPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfrecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getEntrec();
				break;
			case 2:
				return $this->getNomrec();
				break;
			case 3:
				return $this->getFecrec();
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
		$keys = NpinfrecPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getEntrec(),
			$keys[2] => $this->getNomrec(),
			$keys[3] => $this->getFecrec(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfrecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setEntrec($value);
				break;
			case 2:
				$this->setNomrec($value);
				break;
			case 3:
				$this->setFecrec($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfrecPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEntrec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomrec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecrec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinfrecPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinfrecPeer::CODEMP)) $criteria->add(NpinfrecPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinfrecPeer::ENTREC)) $criteria->add(NpinfrecPeer::ENTREC, $this->entrec);
		if ($this->isColumnModified(NpinfrecPeer::NOMREC)) $criteria->add(NpinfrecPeer::NOMREC, $this->nomrec);
		if ($this->isColumnModified(NpinfrecPeer::FECREC)) $criteria->add(NpinfrecPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(NpinfrecPeer::ID)) $criteria->add(NpinfrecPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinfrecPeer::DATABASE_NAME);

		$criteria->add(NpinfrecPeer::ID, $this->id);

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

		$copyObj->setEntrec($this->entrec);

		$copyObj->setNomrec($this->nomrec);

		$copyObj->setFecrec($this->fecrec);


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
			self::$peer = new NpinfrecPeer();
		}
		return self::$peer;
	}

} 