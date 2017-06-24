<?php


abstract class BaseMantiplub extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtlu;


	
	protected $destlu;


	
	protected $lubric;


	
	protected $codume;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtlu()
  {

    return trim($this->codtlu);

  }
  
  public function getDestlu()
  {

    return trim($this->destlu);

  }
  
  public function getLubric()
  {

    return trim($this->lubric);

  }
  
  public function getCodume()
  {

    return trim($this->codume);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtlu($v)
	{

    if ($this->codtlu !== $v) {
        $this->codtlu = $v;
        $this->modifiedColumns[] = MantiplubPeer::CODTLU;
      }
  
	} 
	
	public function setDestlu($v)
	{

    if ($this->destlu !== $v) {
        $this->destlu = $v;
        $this->modifiedColumns[] = MantiplubPeer::DESTLU;
      }
  
	} 
	
	public function setLubric($v)
	{

    if ($this->lubric !== $v) {
        $this->lubric = $v;
        $this->modifiedColumns[] = MantiplubPeer::LUBRIC;
      }
  
	} 
	
	public function setCodume($v)
	{

    if ($this->codume !== $v) {
        $this->codume = $v;
        $this->modifiedColumns[] = MantiplubPeer::CODUME;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = MantiplubPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtlu = $rs->getString($startcol + 0);

      $this->destlu = $rs->getString($startcol + 1);

      $this->lubric = $rs->getString($startcol + 2);

      $this->codume = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Mantiplub object", $e);
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
			$con = Propel::getConnection(MantiplubPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MantiplubPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(MantiplubPeer::DATABASE_NAME);
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
					$pk = MantiplubPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MantiplubPeer::doUpdate($this, $con);
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


			if (($retval = MantiplubPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MantiplubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtlu();
				break;
			case 1:
				return $this->getDestlu();
				break;
			case 2:
				return $this->getLubric();
				break;
			case 3:
				return $this->getCodume();
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
		$keys = MantiplubPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtlu(),
			$keys[1] => $this->getDestlu(),
			$keys[2] => $this->getLubric(),
			$keys[3] => $this->getCodume(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MantiplubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtlu($value);
				break;
			case 1:
				$this->setDestlu($value);
				break;
			case 2:
				$this->setLubric($value);
				break;
			case 3:
				$this->setCodume($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MantiplubPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtlu($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestlu($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLubric($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodume($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MantiplubPeer::DATABASE_NAME);

		if ($this->isColumnModified(MantiplubPeer::CODTLU)) $criteria->add(MantiplubPeer::CODTLU, $this->codtlu);
		if ($this->isColumnModified(MantiplubPeer::DESTLU)) $criteria->add(MantiplubPeer::DESTLU, $this->destlu);
		if ($this->isColumnModified(MantiplubPeer::LUBRIC)) $criteria->add(MantiplubPeer::LUBRIC, $this->lubric);
		if ($this->isColumnModified(MantiplubPeer::CODUME)) $criteria->add(MantiplubPeer::CODUME, $this->codume);
		if ($this->isColumnModified(MantiplubPeer::ID)) $criteria->add(MantiplubPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MantiplubPeer::DATABASE_NAME);

		$criteria->add(MantiplubPeer::ID, $this->id);

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

		$copyObj->setCodtlu($this->codtlu);

		$copyObj->setDestlu($this->destlu);

		$copyObj->setLubric($this->lubric);

		$copyObj->setCodume($this->codume);


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
			self::$peer = new MantiplubPeer();
		}
		return self::$peer;
	}

} 