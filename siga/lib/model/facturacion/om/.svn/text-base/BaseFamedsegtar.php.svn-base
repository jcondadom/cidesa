<?php


abstract class BaseFamedsegtar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reftar;


	
	protected $nuitem;


	
	protected $desmed;


	
	protected $obsmed;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReftar()
  {

    return trim($this->reftar);

  }
  
  public function getNuitem()
  {

    return trim($this->nuitem);

  }
  
  public function getDesmed()
  {

    return trim($this->desmed);

  }
  
  public function getObsmed()
  {

    return trim($this->obsmed);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReftar($v)
	{

    if ($this->reftar !== $v) {
        $this->reftar = $v;
        $this->modifiedColumns[] = FamedsegtarPeer::REFTAR;
      }
  
	} 
	
	public function setNuitem($v)
	{

    if ($this->nuitem !== $v) {
        $this->nuitem = $v;
        $this->modifiedColumns[] = FamedsegtarPeer::NUITEM;
      }
  
	} 
	
	public function setDesmed($v)
	{

    if ($this->desmed !== $v) {
        $this->desmed = $v;
        $this->modifiedColumns[] = FamedsegtarPeer::DESMED;
      }
  
	} 
	
	public function setObsmed($v)
	{

    if ($this->obsmed !== $v) {
        $this->obsmed = $v;
        $this->modifiedColumns[] = FamedsegtarPeer::OBSMED;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FamedsegtarPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reftar = $rs->getString($startcol + 0);

      $this->nuitem = $rs->getString($startcol + 1);

      $this->desmed = $rs->getString($startcol + 2);

      $this->obsmed = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Famedsegtar object", $e);
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
			$con = Propel::getConnection(FamedsegtarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FamedsegtarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FamedsegtarPeer::DATABASE_NAME);
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
					$pk = FamedsegtarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FamedsegtarPeer::doUpdate($this, $con);
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


			if (($retval = FamedsegtarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FamedsegtarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReftar();
				break;
			case 1:
				return $this->getNuitem();
				break;
			case 2:
				return $this->getDesmed();
				break;
			case 3:
				return $this->getObsmed();
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
		$keys = FamedsegtarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReftar(),
			$keys[1] => $this->getNuitem(),
			$keys[2] => $this->getDesmed(),
			$keys[3] => $this->getObsmed(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FamedsegtarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReftar($value);
				break;
			case 1:
				$this->setNuitem($value);
				break;
			case 2:
				$this->setDesmed($value);
				break;
			case 3:
				$this->setObsmed($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FamedsegtarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReftar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNuitem($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesmed($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setObsmed($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FamedsegtarPeer::DATABASE_NAME);

		if ($this->isColumnModified(FamedsegtarPeer::REFTAR)) $criteria->add(FamedsegtarPeer::REFTAR, $this->reftar);
		if ($this->isColumnModified(FamedsegtarPeer::NUITEM)) $criteria->add(FamedsegtarPeer::NUITEM, $this->nuitem);
		if ($this->isColumnModified(FamedsegtarPeer::DESMED)) $criteria->add(FamedsegtarPeer::DESMED, $this->desmed);
		if ($this->isColumnModified(FamedsegtarPeer::OBSMED)) $criteria->add(FamedsegtarPeer::OBSMED, $this->obsmed);
		if ($this->isColumnModified(FamedsegtarPeer::ID)) $criteria->add(FamedsegtarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FamedsegtarPeer::DATABASE_NAME);

		$criteria->add(FamedsegtarPeer::ID, $this->id);

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

		$copyObj->setReftar($this->reftar);

		$copyObj->setNuitem($this->nuitem);

		$copyObj->setDesmed($this->desmed);

		$copyObj->setObsmed($this->obsmed);


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
			self::$peer = new FamedsegtarPeer();
		}
		return self::$peer;
	}

} 