<?php


abstract class BaseFadefsed extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsed;


	
	protected $dessed;


	
	protected $corsed;


	
	protected $corsed1;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodsed()
  {

    return trim($this->codsed);

  }
  
  public function getDessed()
  {

    return trim($this->dessed);

  }
  
  public function getCorsed($val=false)
  {

    if($val) return number_format($this->corsed,2,',','.');
    else return $this->corsed;

  }
  
  public function getCorsed1($val=false)
  {

    if($val) return number_format($this->corsed1,2,',','.');
    else return $this->corsed1;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodsed($v)
	{

    if ($this->codsed !== $v) {
        $this->codsed = $v;
        $this->modifiedColumns[] = FadefsedPeer::CODSED;
      }
  
	} 
	
	public function setDessed($v)
	{

    if ($this->dessed !== $v) {
        $this->dessed = $v;
        $this->modifiedColumns[] = FadefsedPeer::DESSED;
      }
  
	} 
	
	public function setCorsed($v)
	{

    if ($this->corsed !== $v) {
        $this->corsed = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadefsedPeer::CORSED;
      }
  
	} 
	
	public function setCorsed1($v)
	{

    if ($this->corsed1 !== $v) {
        $this->corsed1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadefsedPeer::CORSED1;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FadefsedPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codsed = $rs->getString($startcol + 0);

      $this->dessed = $rs->getString($startcol + 1);

      $this->corsed = $rs->getFloat($startcol + 2);

      $this->corsed1 = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fadefsed object", $e);
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
			$con = Propel::getConnection(FadefsedPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadefsedPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadefsedPeer::DATABASE_NAME);
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
					$pk = FadefsedPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FadefsedPeer::doUpdate($this, $con);
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


			if (($retval = FadefsedPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadefsedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsed();
				break;
			case 1:
				return $this->getDessed();
				break;
			case 2:
				return $this->getCorsed();
				break;
			case 3:
				return $this->getCorsed1();
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
		$keys = FadefsedPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsed(),
			$keys[1] => $this->getDessed(),
			$keys[2] => $this->getCorsed(),
			$keys[3] => $this->getCorsed1(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadefsedPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsed($value);
				break;
			case 1:
				$this->setDessed($value);
				break;
			case 2:
				$this->setCorsed($value);
				break;
			case 3:
				$this->setCorsed1($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadefsedPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsed($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDessed($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCorsed($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCorsed1($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadefsedPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadefsedPeer::CODSED)) $criteria->add(FadefsedPeer::CODSED, $this->codsed);
		if ($this->isColumnModified(FadefsedPeer::DESSED)) $criteria->add(FadefsedPeer::DESSED, $this->dessed);
		if ($this->isColumnModified(FadefsedPeer::CORSED)) $criteria->add(FadefsedPeer::CORSED, $this->corsed);
		if ($this->isColumnModified(FadefsedPeer::CORSED1)) $criteria->add(FadefsedPeer::CORSED1, $this->corsed1);
		if ($this->isColumnModified(FadefsedPeer::ID)) $criteria->add(FadefsedPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadefsedPeer::DATABASE_NAME);

		$criteria->add(FadefsedPeer::ID, $this->id);

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

		$copyObj->setCodsed($this->codsed);

		$copyObj->setDessed($this->dessed);

		$copyObj->setCorsed($this->corsed);

		$copyObj->setCorsed1($this->corsed1);


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
			self::$peer = new FadefsedPeer();
		}
		return self::$peer;
	}

} 