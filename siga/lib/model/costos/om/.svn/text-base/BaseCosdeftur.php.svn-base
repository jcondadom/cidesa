<?php


abstract class BaseCosdeftur extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtur;


	
	protected $destur;


	
	protected $initur;


	
	protected $fintur;


	
	protected $cappro;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtur()
  {

    return trim($this->codtur);

  }
  
  public function getDestur()
  {

    return trim($this->destur);

  }
  
  public function getInitur()
  {

    return trim($this->initur);

  }
  
  public function getFintur()
  {

    return trim($this->fintur);

  }
  
  public function getCappro($val=false)
  {

    if($val) return number_format($this->cappro,2,',','.');
    else return $this->cappro;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtur($v)
	{

    if ($this->codtur !== $v) {
        $this->codtur = $v;
        $this->modifiedColumns[] = CosdefturPeer::CODTUR;
      }
  
	} 
	
	public function setDestur($v)
	{

    if ($this->destur !== $v) {
        $this->destur = $v;
        $this->modifiedColumns[] = CosdefturPeer::DESTUR;
      }
  
	} 
	
	public function setInitur($v)
	{

    if ($this->initur !== $v) {
        $this->initur = $v;
        $this->modifiedColumns[] = CosdefturPeer::INITUR;
      }
  
	} 
	
	public function setFintur($v)
	{

    if ($this->fintur !== $v) {
        $this->fintur = $v;
        $this->modifiedColumns[] = CosdefturPeer::FINTUR;
      }
  
	} 
	
	public function setCappro($v)
	{

    if ($this->cappro !== $v) {
        $this->cappro = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CosdefturPeer::CAPPRO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CosdefturPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtur = $rs->getString($startcol + 0);

      $this->destur = $rs->getString($startcol + 1);

      $this->initur = $rs->getString($startcol + 2);

      $this->fintur = $rs->getString($startcol + 3);

      $this->cappro = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cosdeftur object", $e);
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
			$con = Propel::getConnection(CosdefturPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CosdefturPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CosdefturPeer::DATABASE_NAME);
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
					$pk = CosdefturPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CosdefturPeer::doUpdate($this, $con);
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


			if (($retval = CosdefturPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CosdefturPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtur();
				break;
			case 1:
				return $this->getDestur();
				break;
			case 2:
				return $this->getInitur();
				break;
			case 3:
				return $this->getFintur();
				break;
			case 4:
				return $this->getCappro();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CosdefturPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtur(),
			$keys[1] => $this->getDestur(),
			$keys[2] => $this->getInitur(),
			$keys[3] => $this->getFintur(),
			$keys[4] => $this->getCappro(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CosdefturPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtur($value);
				break;
			case 1:
				$this->setDestur($value);
				break;
			case 2:
				$this->setInitur($value);
				break;
			case 3:
				$this->setFintur($value);
				break;
			case 4:
				$this->setCappro($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CosdefturPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtur($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestur($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setInitur($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFintur($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCappro($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CosdefturPeer::DATABASE_NAME);

		if ($this->isColumnModified(CosdefturPeer::CODTUR)) $criteria->add(CosdefturPeer::CODTUR, $this->codtur);
		if ($this->isColumnModified(CosdefturPeer::DESTUR)) $criteria->add(CosdefturPeer::DESTUR, $this->destur);
		if ($this->isColumnModified(CosdefturPeer::INITUR)) $criteria->add(CosdefturPeer::INITUR, $this->initur);
		if ($this->isColumnModified(CosdefturPeer::FINTUR)) $criteria->add(CosdefturPeer::FINTUR, $this->fintur);
		if ($this->isColumnModified(CosdefturPeer::CAPPRO)) $criteria->add(CosdefturPeer::CAPPRO, $this->cappro);
		if ($this->isColumnModified(CosdefturPeer::ID)) $criteria->add(CosdefturPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CosdefturPeer::DATABASE_NAME);

		$criteria->add(CosdefturPeer::ID, $this->id);

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

		$copyObj->setCodtur($this->codtur);

		$copyObj->setDestur($this->destur);

		$copyObj->setInitur($this->initur);

		$copyObj->setFintur($this->fintur);

		$copyObj->setCappro($this->cappro);


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
			self::$peer = new CosdefturPeer();
		}
		return self::$peer;
	}

} 