<?php


abstract class BaseCaranrot extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tiprot;


	
	protected $desde;


	
	protected $hasta;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTiprot()
  {

    return trim($this->tiprot);

  }
  
  public function getDesde()
  {

    return $this->desde;

  }
  
  public function getHasta()
  {

    return $this->hasta;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setTiprot($v)
	{

    if ($this->tiprot !== $v) {
        $this->tiprot = $v;
        $this->modifiedColumns[] = CaranrotPeer::TIPROT;
      }
  
	} 
	
	public function setDesde($v)
	{

    if ($this->desde !== $v) {
        $this->desde = $v;
        $this->modifiedColumns[] = CaranrotPeer::DESDE;
      }
  
	} 
	
	public function setHasta($v)
	{

    if ($this->hasta !== $v) {
        $this->hasta = $v;
        $this->modifiedColumns[] = CaranrotPeer::HASTA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CaranrotPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->tiprot = $rs->getString($startcol + 0);

      $this->desde = $rs->getInt($startcol + 1);

      $this->hasta = $rs->getInt($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Caranrot object", $e);
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
			$con = Propel::getConnection(CaranrotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaranrotPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaranrotPeer::DATABASE_NAME);
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
					$pk = CaranrotPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CaranrotPeer::doUpdate($this, $con);
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


			if (($retval = CaranrotPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaranrotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTiprot();
				break;
			case 1:
				return $this->getDesde();
				break;
			case 2:
				return $this->getHasta();
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
		$keys = CaranrotPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTiprot(),
			$keys[1] => $this->getDesde(),
			$keys[2] => $this->getHasta(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaranrotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTiprot($value);
				break;
			case 1:
				$this->setDesde($value);
				break;
			case 2:
				$this->setHasta($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaranrotPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTiprot($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesde($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setHasta($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaranrotPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaranrotPeer::TIPROT)) $criteria->add(CaranrotPeer::TIPROT, $this->tiprot);
		if ($this->isColumnModified(CaranrotPeer::DESDE)) $criteria->add(CaranrotPeer::DESDE, $this->desde);
		if ($this->isColumnModified(CaranrotPeer::HASTA)) $criteria->add(CaranrotPeer::HASTA, $this->hasta);
		if ($this->isColumnModified(CaranrotPeer::ID)) $criteria->add(CaranrotPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaranrotPeer::DATABASE_NAME);

		$criteria->add(CaranrotPeer::ID, $this->id);

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

		$copyObj->setTiprot($this->tiprot);

		$copyObj->setDesde($this->desde);

		$copyObj->setHasta($this->hasta);


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
			self::$peer = new CaranrotPeer();
		}
		return self::$peer;
	}

} 