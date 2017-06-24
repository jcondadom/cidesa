<?php


abstract class BaseFadefbil extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codbil;


	
	protected $desbil;


	
	protected $denbil;


	
	protected $tipo;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodbil()
  {

    return trim($this->codbil);

  }
  
  public function getDesbil()
  {

    return trim($this->desbil);

  }
  
  public function getDenbil($val=false)
  {

    if($val) return number_format($this->denbil,2,',','.');
    else return $this->denbil;

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodbil($v)
	{

    if ($this->codbil !== $v) {
        $this->codbil = $v;
        $this->modifiedColumns[] = FadefbilPeer::CODBIL;
      }
  
	} 
	
	public function setDesbil($v)
	{

    if ($this->desbil !== $v) {
        $this->desbil = $v;
        $this->modifiedColumns[] = FadefbilPeer::DESBIL;
      }
  
	} 
	
	public function setDenbil($v)
	{

    if ($this->denbil !== $v) {
        $this->denbil = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadefbilPeer::DENBIL;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = FadefbilPeer::TIPO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FadefbilPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codbil = $rs->getString($startcol + 0);

      $this->desbil = $rs->getString($startcol + 1);

      $this->denbil = $rs->getFloat($startcol + 2);

      $this->tipo = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fadefbil object", $e);
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
			$con = Propel::getConnection(FadefbilPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadefbilPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadefbilPeer::DATABASE_NAME);
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
					$pk = FadefbilPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FadefbilPeer::doUpdate($this, $con);
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


			if (($retval = FadefbilPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadefbilPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodbil();
				break;
			case 1:
				return $this->getDesbil();
				break;
			case 2:
				return $this->getDenbil();
				break;
			case 3:
				return $this->getTipo();
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
		$keys = FadefbilPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodbil(),
			$keys[1] => $this->getDesbil(),
			$keys[2] => $this->getDenbil(),
			$keys[3] => $this->getTipo(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadefbilPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodbil($value);
				break;
			case 1:
				$this->setDesbil($value);
				break;
			case 2:
				$this->setDenbil($value);
				break;
			case 3:
				$this->setTipo($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadefbilPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodbil($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesbil($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDenbil($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadefbilPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadefbilPeer::CODBIL)) $criteria->add(FadefbilPeer::CODBIL, $this->codbil);
		if ($this->isColumnModified(FadefbilPeer::DESBIL)) $criteria->add(FadefbilPeer::DESBIL, $this->desbil);
		if ($this->isColumnModified(FadefbilPeer::DENBIL)) $criteria->add(FadefbilPeer::DENBIL, $this->denbil);
		if ($this->isColumnModified(FadefbilPeer::TIPO)) $criteria->add(FadefbilPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(FadefbilPeer::ID)) $criteria->add(FadefbilPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadefbilPeer::DATABASE_NAME);

		$criteria->add(FadefbilPeer::ID, $this->id);

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

		$copyObj->setCodbil($this->codbil);

		$copyObj->setDesbil($this->desbil);

		$copyObj->setDenbil($this->denbil);

		$copyObj->setTipo($this->tipo);


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
			self::$peer = new FadefbilPeer();
		}
		return self::$peer;
	}

} 