<?php


abstract class BaseLiordcomsolegr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numord;


	
	protected $numcomint;


	
	protected $numsol;


	
	protected $codpre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getNumcomint()
  {

    return trim($this->numcomint);

  }
  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = LiordcomsolegrPeer::NUMORD;
      }
  
	} 
	
	public function setNumcomint($v)
	{

    if ($this->numcomint !== $v) {
        $this->numcomint = $v;
        $this->modifiedColumns[] = LiordcomsolegrPeer::NUMCOMINT;
      }
  
	} 
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = LiordcomsolegrPeer::NUMSOL;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = LiordcomsolegrPeer::CODPRE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiordcomsolegrPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numord = $rs->getString($startcol + 0);

      $this->numcomint = $rs->getString($startcol + 1);

      $this->numsol = $rs->getString($startcol + 2);

      $this->codpre = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liordcomsolegr object", $e);
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
			$con = Propel::getConnection(LiordcomsolegrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiordcomsolegrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiordcomsolegrPeer::DATABASE_NAME);
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
					$pk = LiordcomsolegrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiordcomsolegrPeer::doUpdate($this, $con);
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


			if (($retval = LiordcomsolegrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiordcomsolegrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumord();
				break;
			case 1:
				return $this->getNumcomint();
				break;
			case 2:
				return $this->getNumsol();
				break;
			case 3:
				return $this->getCodpre();
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
		$keys = LiordcomsolegrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumord(),
			$keys[1] => $this->getNumcomint(),
			$keys[2] => $this->getNumsol(),
			$keys[3] => $this->getCodpre(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiordcomsolegrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumord($value);
				break;
			case 1:
				$this->setNumcomint($value);
				break;
			case 2:
				$this->setNumsol($value);
				break;
			case 3:
				$this->setCodpre($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiordcomsolegrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumord($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcomint($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumsol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiordcomsolegrPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiordcomsolegrPeer::NUMORD)) $criteria->add(LiordcomsolegrPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(LiordcomsolegrPeer::NUMCOMINT)) $criteria->add(LiordcomsolegrPeer::NUMCOMINT, $this->numcomint);
		if ($this->isColumnModified(LiordcomsolegrPeer::NUMSOL)) $criteria->add(LiordcomsolegrPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(LiordcomsolegrPeer::CODPRE)) $criteria->add(LiordcomsolegrPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(LiordcomsolegrPeer::ID)) $criteria->add(LiordcomsolegrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiordcomsolegrPeer::DATABASE_NAME);

		$criteria->add(LiordcomsolegrPeer::ID, $this->id);

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

		$copyObj->setNumord($this->numord);

		$copyObj->setNumcomint($this->numcomint);

		$copyObj->setNumsol($this->numsol);

		$copyObj->setCodpre($this->codpre);


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
			self::$peer = new LiordcomsolegrPeer();
		}
		return self::$peer;
	}

} 