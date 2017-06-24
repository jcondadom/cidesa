<?php


abstract class BaseNpfuncarptocta extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numpta;


	
	protected $codcar;


	
	protected $codniv;


	
	protected $desfun;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumpta()
  {

    return trim($this->numpta);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getDesfun()
  {

    return trim($this->desfun);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumpta($v)
	{

    if ($this->numpta !== $v) {
        $this->numpta = $v;
        $this->modifiedColumns[] = NpfuncarptoctaPeer::NUMPTA;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NpfuncarptoctaPeer::CODCAR;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = NpfuncarptoctaPeer::CODNIV;
      }
  
	} 
	
	public function setDesfun($v)
	{

    if ($this->desfun !== $v) {
        $this->desfun = $v;
        $this->modifiedColumns[] = NpfuncarptoctaPeer::DESFUN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpfuncarptoctaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numpta = $rs->getString($startcol + 0);

      $this->codcar = $rs->getString($startcol + 1);

      $this->codniv = $rs->getString($startcol + 2);

      $this->desfun = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npfuncarptocta object", $e);
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
			$con = Propel::getConnection(NpfuncarptoctaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpfuncarptoctaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpfuncarptoctaPeer::DATABASE_NAME);
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
					$pk = NpfuncarptoctaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpfuncarptoctaPeer::doUpdate($this, $con);
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


			if (($retval = NpfuncarptoctaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpfuncarptoctaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumpta();
				break;
			case 1:
				return $this->getCodcar();
				break;
			case 2:
				return $this->getCodniv();
				break;
			case 3:
				return $this->getDesfun();
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
		$keys = NpfuncarptoctaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumpta(),
			$keys[1] => $this->getCodcar(),
			$keys[2] => $this->getCodniv(),
			$keys[3] => $this->getDesfun(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpfuncarptoctaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumpta($value);
				break;
			case 1:
				$this->setCodcar($value);
				break;
			case 2:
				$this->setCodniv($value);
				break;
			case 3:
				$this->setDesfun($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpfuncarptoctaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumpta($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodniv($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesfun($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpfuncarptoctaPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpfuncarptoctaPeer::NUMPTA)) $criteria->add(NpfuncarptoctaPeer::NUMPTA, $this->numpta);
		if ($this->isColumnModified(NpfuncarptoctaPeer::CODCAR)) $criteria->add(NpfuncarptoctaPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpfuncarptoctaPeer::CODNIV)) $criteria->add(NpfuncarptoctaPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(NpfuncarptoctaPeer::DESFUN)) $criteria->add(NpfuncarptoctaPeer::DESFUN, $this->desfun);
		if ($this->isColumnModified(NpfuncarptoctaPeer::ID)) $criteria->add(NpfuncarptoctaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpfuncarptoctaPeer::DATABASE_NAME);

		$criteria->add(NpfuncarptoctaPeer::ID, $this->id);

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

		$copyObj->setNumpta($this->numpta);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCodniv($this->codniv);

		$copyObj->setDesfun($this->desfun);


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
			self::$peer = new NpfuncarptoctaPeer();
		}
		return self::$peer;
	}

} 