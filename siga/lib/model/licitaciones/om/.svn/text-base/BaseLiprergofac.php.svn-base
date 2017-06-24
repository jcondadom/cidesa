<?php


abstract class BaseLiprergofac extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpre;


	
	protected $codrgo;


	
	protected $monrgo;


	
	protected $tipconpub;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumpre()
  {

    return trim($this->numpre);

  }
  
  public function getCodrgo()
  {

    return trim($this->codrgo);

  }
  
  public function getMonrgo($val=false)
  {

    if($val) return number_format($this->monrgo,2,',','.');
    else return $this->monrgo;

  }
  
  public function getTipconpub()
  {

    return trim($this->tipconpub);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumpre($v)
	{

    if ($this->numpre !== $v) {
        $this->numpre = $v;
        $this->modifiedColumns[] = LiprergofacPeer::NUMPRE;
      }
  
	} 
	
	public function setCodrgo($v)
	{

    if ($this->codrgo !== $v) {
        $this->codrgo = $v;
        $this->modifiedColumns[] = LiprergofacPeer::CODRGO;
      }
  
	} 
	
	public function setMonrgo($v)
	{

    if ($this->monrgo !== $v) {
        $this->monrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LiprergofacPeer::MONRGO;
      }
  
	} 
	
	public function setTipconpub($v)
	{

    if ($this->tipconpub !== $v) {
        $this->tipconpub = $v;
        $this->modifiedColumns[] = LiprergofacPeer::TIPCONPUB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiprergofacPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpre = $rs->getString($startcol + 0);

      $this->codrgo = $rs->getString($startcol + 1);

      $this->monrgo = $rs->getFloat($startcol + 2);

      $this->tipconpub = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liprergofac object", $e);
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
			$con = Propel::getConnection(LiprergofacPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiprergofacPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiprergofacPeer::DATABASE_NAME);
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
					$pk = LiprergofacPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiprergofacPeer::doUpdate($this, $con);
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


			if (($retval = LiprergofacPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiprergofacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpre();
				break;
			case 1:
				return $this->getCodrgo();
				break;
			case 2:
				return $this->getMonrgo();
				break;
			case 3:
				return $this->getTipconpub();
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
		$keys = LiprergofacPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpre(),
			$keys[1] => $this->getCodrgo(),
			$keys[2] => $this->getMonrgo(),
			$keys[3] => $this->getTipconpub(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiprergofacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpre($value);
				break;
			case 1:
				$this->setCodrgo($value);
				break;
			case 2:
				$this->setMonrgo($value);
				break;
			case 3:
				$this->setTipconpub($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiprergofacPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpre($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodrgo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonrgo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipconpub($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiprergofacPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiprergofacPeer::NUMPRE)) $criteria->add(LiprergofacPeer::NUMPRE, $this->numpre);
		if ($this->isColumnModified(LiprergofacPeer::CODRGO)) $criteria->add(LiprergofacPeer::CODRGO, $this->codrgo);
		if ($this->isColumnModified(LiprergofacPeer::MONRGO)) $criteria->add(LiprergofacPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(LiprergofacPeer::TIPCONPUB)) $criteria->add(LiprergofacPeer::TIPCONPUB, $this->tipconpub);
		if ($this->isColumnModified(LiprergofacPeer::ID)) $criteria->add(LiprergofacPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiprergofacPeer::DATABASE_NAME);

		$criteria->add(LiprergofacPeer::ID, $this->id);

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

		$copyObj->setNumpre($this->numpre);

		$copyObj->setCodrgo($this->codrgo);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setTipconpub($this->tipconpub);


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
			self::$peer = new LiprergofacPeer();
		}
		return self::$peer;
	}

} 