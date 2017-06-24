<?php


abstract class BaseNpdefinsext extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedins;


	
	protected $nomins;


	
	protected $carins;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedins()
  {

    return trim($this->cedins);

  }
  
  public function getNomins()
  {

    return trim($this->nomins);

  }
  
  public function getCarins()
  {

    return trim($this->carins);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedins($v)
	{

    if ($this->cedins !== $v) {
        $this->cedins = $v;
        $this->modifiedColumns[] = NpdefinsextPeer::CEDINS;
      }
  
	} 
	
	public function setNomins($v)
	{

    if ($this->nomins !== $v) {
        $this->nomins = $v;
        $this->modifiedColumns[] = NpdefinsextPeer::NOMINS;
      }
  
	} 
	
	public function setCarins($v)
	{

    if ($this->carins !== $v) {
        $this->carins = $v;
        $this->modifiedColumns[] = NpdefinsextPeer::CARINS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpdefinsextPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedins = $rs->getString($startcol + 0);

      $this->nomins = $rs->getString($startcol + 1);

      $this->carins = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npdefinsext object", $e);
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
			$con = Propel::getConnection(NpdefinsextPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdefinsextPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdefinsextPeer::DATABASE_NAME);
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
					$pk = NpdefinsextPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpdefinsextPeer::doUpdate($this, $con);
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


			if (($retval = NpdefinsextPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefinsextPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedins();
				break;
			case 1:
				return $this->getNomins();
				break;
			case 2:
				return $this->getCarins();
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
		$keys = NpdefinsextPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedins(),
			$keys[1] => $this->getNomins(),
			$keys[2] => $this->getCarins(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefinsextPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedins($value);
				break;
			case 1:
				$this->setNomins($value);
				break;
			case 2:
				$this->setCarins($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefinsextPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedins($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomins($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCarins($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdefinsextPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdefinsextPeer::CEDINS)) $criteria->add(NpdefinsextPeer::CEDINS, $this->cedins);
		if ($this->isColumnModified(NpdefinsextPeer::NOMINS)) $criteria->add(NpdefinsextPeer::NOMINS, $this->nomins);
		if ($this->isColumnModified(NpdefinsextPeer::CARINS)) $criteria->add(NpdefinsextPeer::CARINS, $this->carins);
		if ($this->isColumnModified(NpdefinsextPeer::ID)) $criteria->add(NpdefinsextPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdefinsextPeer::DATABASE_NAME);

		$criteria->add(NpdefinsextPeer::ID, $this->id);

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

		$copyObj->setCedins($this->cedins);

		$copyObj->setNomins($this->nomins);

		$copyObj->setCarins($this->carins);


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
			self::$peer = new NpdefinsextPeer();
		}
		return self::$peer;
	}

} 