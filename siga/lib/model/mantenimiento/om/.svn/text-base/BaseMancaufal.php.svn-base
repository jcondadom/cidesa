<?php


abstract class BaseMancaufal extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcfa;


	
	protected $descfa;


	
	protected $coddfa;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcfa()
  {

    return trim($this->codcfa);

  }
  
  public function getDescfa()
  {

    return trim($this->descfa);

  }
  
  public function getCoddfa()
  {

    return trim($this->coddfa);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcfa($v)
	{

    if ($this->codcfa !== $v) {
        $this->codcfa = $v;
        $this->modifiedColumns[] = MancaufalPeer::CODCFA;
      }
  
	} 
	
	public function setDescfa($v)
	{

    if ($this->descfa !== $v) {
        $this->descfa = $v;
        $this->modifiedColumns[] = MancaufalPeer::DESCFA;
      }
  
	} 
	
	public function setCoddfa($v)
	{

    if ($this->coddfa !== $v) {
        $this->coddfa = $v;
        $this->modifiedColumns[] = MancaufalPeer::CODDFA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = MancaufalPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcfa = $rs->getString($startcol + 0);

      $this->descfa = $rs->getString($startcol + 1);

      $this->coddfa = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Mancaufal object", $e);
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
			$con = Propel::getConnection(MancaufalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MancaufalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(MancaufalPeer::DATABASE_NAME);
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
					$pk = MancaufalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MancaufalPeer::doUpdate($this, $con);
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


			if (($retval = MancaufalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MancaufalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcfa();
				break;
			case 1:
				return $this->getDescfa();
				break;
			case 2:
				return $this->getCoddfa();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MancaufalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcfa(),
			$keys[1] => $this->getDescfa(),
			$keys[2] => $this->getCoddfa(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MancaufalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcfa($value);
				break;
			case 1:
				$this->setDescfa($value);
				break;
			case 2:
				$this->setCoddfa($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MancaufalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcfa($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescfa($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoddfa($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MancaufalPeer::DATABASE_NAME);

		if ($this->isColumnModified(MancaufalPeer::CODCFA)) $criteria->add(MancaufalPeer::CODCFA, $this->codcfa);
		if ($this->isColumnModified(MancaufalPeer::DESCFA)) $criteria->add(MancaufalPeer::DESCFA, $this->descfa);
		if ($this->isColumnModified(MancaufalPeer::CODDFA)) $criteria->add(MancaufalPeer::CODDFA, $this->coddfa);
		if ($this->isColumnModified(MancaufalPeer::ID)) $criteria->add(MancaufalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MancaufalPeer::DATABASE_NAME);

		$criteria->add(MancaufalPeer::ID, $this->id);

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

		$copyObj->setCodcfa($this->codcfa);

		$copyObj->setDescfa($this->descfa);

		$copyObj->setCoddfa($this->coddfa);


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
			self::$peer = new MancaufalPeer();
		}
		return self::$peer;
	}

} 