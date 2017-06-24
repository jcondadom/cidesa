<?php


abstract class BaseMancarlub extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numequ;


	
	protected $fecreg;


	
	protected $codtlu;


	
	protected $cancar;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumequ()
  {

    return trim($this->numequ);

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodtlu()
  {

    return trim($this->codtlu);

  }
  
  public function getCancar()
  {

    return $this->cancar;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumequ($v)
	{

    if ($this->numequ !== $v) {
        $this->numequ = $v;
        $this->modifiedColumns[] = MancarlubPeer::NUMEQU;
      }
  
	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = MancarlubPeer::FECREG;
    }

	} 
	
	public function setCodtlu($v)
	{

    if ($this->codtlu !== $v) {
        $this->codtlu = $v;
        $this->modifiedColumns[] = MancarlubPeer::CODTLU;
      }
  
	} 
	
	public function setCancar($v)
	{

    if ($this->cancar !== $v) {
        $this->cancar = $v;
        $this->modifiedColumns[] = MancarlubPeer::CANCAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = MancarlubPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numequ = $rs->getString($startcol + 0);

      $this->fecreg = $rs->getDate($startcol + 1, null);

      $this->codtlu = $rs->getString($startcol + 2);

      $this->cancar = $rs->getInt($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Mancarlub object", $e);
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
			$con = Propel::getConnection(MancarlubPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MancarlubPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(MancarlubPeer::DATABASE_NAME);
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
					$pk = MancarlubPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MancarlubPeer::doUpdate($this, $con);
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


			if (($retval = MancarlubPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MancarlubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumequ();
				break;
			case 1:
				return $this->getFecreg();
				break;
			case 2:
				return $this->getCodtlu();
				break;
			case 3:
				return $this->getCancar();
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
		$keys = MancarlubPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumequ(),
			$keys[1] => $this->getFecreg(),
			$keys[2] => $this->getCodtlu(),
			$keys[3] => $this->getCancar(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MancarlubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumequ($value);
				break;
			case 1:
				$this->setFecreg($value);
				break;
			case 2:
				$this->setCodtlu($value);
				break;
			case 3:
				$this->setCancar($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MancarlubPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumequ($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecreg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodtlu($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCancar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MancarlubPeer::DATABASE_NAME);

		if ($this->isColumnModified(MancarlubPeer::NUMEQU)) $criteria->add(MancarlubPeer::NUMEQU, $this->numequ);
		if ($this->isColumnModified(MancarlubPeer::FECREG)) $criteria->add(MancarlubPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(MancarlubPeer::CODTLU)) $criteria->add(MancarlubPeer::CODTLU, $this->codtlu);
		if ($this->isColumnModified(MancarlubPeer::CANCAR)) $criteria->add(MancarlubPeer::CANCAR, $this->cancar);
		if ($this->isColumnModified(MancarlubPeer::ID)) $criteria->add(MancarlubPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MancarlubPeer::DATABASE_NAME);

		$criteria->add(MancarlubPeer::ID, $this->id);

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

		$copyObj->setNumequ($this->numequ);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setCodtlu($this->codtlu);

		$copyObj->setCancar($this->cancar);


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
			self::$peer = new MancarlubPeer();
		}
		return self::$peer;
	}

} 