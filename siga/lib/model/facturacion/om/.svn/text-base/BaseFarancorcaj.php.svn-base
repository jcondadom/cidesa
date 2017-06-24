<?php


abstract class BaseFarancorcaj extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcaj;


	
	protected $cordes;


	
	protected $corhas;


	
	protected $coract;


	
	protected $activo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcaj()
  {

    return $this->codcaj;

  }
  
  public function getCordes()
  {

    return $this->cordes;

  }
  
  public function getCorhas()
  {

    return $this->corhas;

  }
  
  public function getCoract()
  {

    return $this->coract;

  }
  
  public function getActivo()
  {

    return $this->activo;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcaj($v)
	{

    if ($this->codcaj !== $v) {
        $this->codcaj = $v;
        $this->modifiedColumns[] = FarancorcajPeer::CODCAJ;
      }
  
	} 
	
	public function setCordes($v)
	{

    if ($this->cordes !== $v) {
        $this->cordes = $v;
        $this->modifiedColumns[] = FarancorcajPeer::CORDES;
      }
  
	} 
	
	public function setCorhas($v)
	{

    if ($this->corhas !== $v) {
        $this->corhas = $v;
        $this->modifiedColumns[] = FarancorcajPeer::CORHAS;
      }
  
	} 
	
	public function setCoract($v)
	{

    if ($this->coract !== $v) {
        $this->coract = $v;
        $this->modifiedColumns[] = FarancorcajPeer::CORACT;
      }
  
	} 
	
	public function setActivo($v)
	{

    if ($this->activo !== $v) {
        $this->activo = $v;
        $this->modifiedColumns[] = FarancorcajPeer::ACTIVO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FarancorcajPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcaj = $rs->getInt($startcol + 0);

      $this->cordes = $rs->getInt($startcol + 1);

      $this->corhas = $rs->getInt($startcol + 2);

      $this->coract = $rs->getInt($startcol + 3);

      $this->activo = $rs->getBoolean($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Farancorcaj object", $e);
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
			$con = Propel::getConnection(FarancorcajPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FarancorcajPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FarancorcajPeer::DATABASE_NAME);
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
					$pk = FarancorcajPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FarancorcajPeer::doUpdate($this, $con);
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


			if (($retval = FarancorcajPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FarancorcajPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcaj();
				break;
			case 1:
				return $this->getCordes();
				break;
			case 2:
				return $this->getCorhas();
				break;
			case 3:
				return $this->getCoract();
				break;
			case 4:
				return $this->getActivo();
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
		$keys = FarancorcajPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcaj(),
			$keys[1] => $this->getCordes(),
			$keys[2] => $this->getCorhas(),
			$keys[3] => $this->getCoract(),
			$keys[4] => $this->getActivo(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FarancorcajPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcaj($value);
				break;
			case 1:
				$this->setCordes($value);
				break;
			case 2:
				$this->setCorhas($value);
				break;
			case 3:
				$this->setCoract($value);
				break;
			case 4:
				$this->setActivo($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FarancorcajPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcaj($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCordes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCorhas($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCoract($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setActivo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FarancorcajPeer::DATABASE_NAME);

		if ($this->isColumnModified(FarancorcajPeer::CODCAJ)) $criteria->add(FarancorcajPeer::CODCAJ, $this->codcaj);
		if ($this->isColumnModified(FarancorcajPeer::CORDES)) $criteria->add(FarancorcajPeer::CORDES, $this->cordes);
		if ($this->isColumnModified(FarancorcajPeer::CORHAS)) $criteria->add(FarancorcajPeer::CORHAS, $this->corhas);
		if ($this->isColumnModified(FarancorcajPeer::CORACT)) $criteria->add(FarancorcajPeer::CORACT, $this->coract);
		if ($this->isColumnModified(FarancorcajPeer::ACTIVO)) $criteria->add(FarancorcajPeer::ACTIVO, $this->activo);
		if ($this->isColumnModified(FarancorcajPeer::ID)) $criteria->add(FarancorcajPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FarancorcajPeer::DATABASE_NAME);

		$criteria->add(FarancorcajPeer::ID, $this->id);

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

		$copyObj->setCodcaj($this->codcaj);

		$copyObj->setCordes($this->cordes);

		$copyObj->setCorhas($this->corhas);

		$copyObj->setCoract($this->coract);

		$copyObj->setActivo($this->activo);


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
			self::$peer = new FarancorcajPeer();
		}
		return self::$peer;
	}

} 