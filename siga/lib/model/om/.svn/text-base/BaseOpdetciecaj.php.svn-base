<?php


abstract class BaseOpdetciecaj extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numref;


	
	protected $codpre;


	
	protected $moncom;


	
	protected $refsal;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumref()
  {

    return trim($this->numref);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getMoncom($val=false)
  {

    if($val) return number_format($this->moncom,2,',','.');
    else return $this->moncom;

  }
  
  public function getRefsal()
  {

    return trim($this->refsal);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumref($v)
	{

    if ($this->numref !== $v) {
        $this->numref = $v;
        $this->modifiedColumns[] = OpdetciecajPeer::NUMREF;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = OpdetciecajPeer::CODPRE;
      }
  
	} 
	
	public function setMoncom($v)
	{

    if ($this->moncom !== $v) {
        $this->moncom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpdetciecajPeer::MONCOM;
      }
  
	} 
	
	public function setRefsal($v)
	{

    if ($this->refsal !== $v) {
        $this->refsal = $v;
        $this->modifiedColumns[] = OpdetciecajPeer::REFSAL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpdetciecajPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numref = $rs->getString($startcol + 0);

      $this->codpre = $rs->getString($startcol + 1);

      $this->moncom = $rs->getFloat($startcol + 2);

      $this->refsal = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opdetciecaj object", $e);
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
			$con = Propel::getConnection(OpdetciecajPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpdetciecajPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpdetciecajPeer::DATABASE_NAME);
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
					$pk = OpdetciecajPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpdetciecajPeer::doUpdate($this, $con);
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


			if (($retval = OpdetciecajPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdetciecajPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumref();
				break;
			case 1:
				return $this->getCodpre();
				break;
			case 2:
				return $this->getMoncom();
				break;
			case 3:
				return $this->getRefsal();
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
		$keys = OpdetciecajPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumref(),
			$keys[1] => $this->getCodpre(),
			$keys[2] => $this->getMoncom(),
			$keys[3] => $this->getRefsal(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdetciecajPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumref($value);
				break;
			case 1:
				$this->setCodpre($value);
				break;
			case 2:
				$this->setMoncom($value);
				break;
			case 3:
				$this->setRefsal($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpdetciecajPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumref($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpre($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMoncom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRefsal($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpdetciecajPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpdetciecajPeer::NUMREF)) $criteria->add(OpdetciecajPeer::NUMREF, $this->numref);
		if ($this->isColumnModified(OpdetciecajPeer::CODPRE)) $criteria->add(OpdetciecajPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(OpdetciecajPeer::MONCOM)) $criteria->add(OpdetciecajPeer::MONCOM, $this->moncom);
		if ($this->isColumnModified(OpdetciecajPeer::REFSAL)) $criteria->add(OpdetciecajPeer::REFSAL, $this->refsal);
		if ($this->isColumnModified(OpdetciecajPeer::ID)) $criteria->add(OpdetciecajPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpdetciecajPeer::DATABASE_NAME);

		$criteria->add(OpdetciecajPeer::ID, $this->id);

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

		$copyObj->setNumref($this->numref);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setRefsal($this->refsal);


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
			self::$peer = new OpdetciecajPeer();
		}
		return self::$peer;
	}

} 