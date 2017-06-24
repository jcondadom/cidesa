<?php


abstract class BaseContadettit extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtitdet;


	
	protected $codtit;


	
	protected $destitdet;


	
	protected $ordtitdet;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtitdet()
  {

    return trim($this->codtitdet);

  }
  
  public function getCodtit()
  {

    return trim($this->codtit);

  }
  
  public function getDestitdet()
  {

    return trim($this->destitdet);

  }
  
  public function getOrdtitdet($val=false)
  {

    if($val) return number_format($this->ordtitdet,2,',','.');
    else return $this->ordtitdet;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtitdet($v)
	{

    if ($this->codtitdet !== $v) {
        $this->codtitdet = $v;
        $this->modifiedColumns[] = ContadettitPeer::CODTITDET;
      }
  
	} 
	
	public function setCodtit($v)
	{

    if ($this->codtit !== $v) {
        $this->codtit = $v;
        $this->modifiedColumns[] = ContadettitPeer::CODTIT;
      }
  
	} 
	
	public function setDestitdet($v)
	{

    if ($this->destitdet !== $v) {
        $this->destitdet = $v;
        $this->modifiedColumns[] = ContadettitPeer::DESTITDET;
      }
  
	} 
	
	public function setOrdtitdet($v)
	{

    if ($this->ordtitdet !== $v) {
        $this->ordtitdet = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ContadettitPeer::ORDTITDET;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ContadettitPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtitdet = $rs->getString($startcol + 0);

      $this->codtit = $rs->getString($startcol + 1);

      $this->destitdet = $rs->getString($startcol + 2);

      $this->ordtitdet = $rs->getFloat($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Contadettit object", $e);
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
			$con = Propel::getConnection(ContadettitPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ContadettitPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ContadettitPeer::DATABASE_NAME);
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
					$pk = ContadettitPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ContadettitPeer::doUpdate($this, $con);
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


			if (($retval = ContadettitPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContadettitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtitdet();
				break;
			case 1:
				return $this->getCodtit();
				break;
			case 2:
				return $this->getDestitdet();
				break;
			case 3:
				return $this->getOrdtitdet();
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
		$keys = ContadettitPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtitdet(),
			$keys[1] => $this->getCodtit(),
			$keys[2] => $this->getDestitdet(),
			$keys[3] => $this->getOrdtitdet(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContadettitPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtitdet($value);
				break;
			case 1:
				$this->setCodtit($value);
				break;
			case 2:
				$this->setDestitdet($value);
				break;
			case 3:
				$this->setOrdtitdet($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContadettitPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtitdet($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodtit($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDestitdet($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOrdtitdet($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ContadettitPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContadettitPeer::CODTITDET)) $criteria->add(ContadettitPeer::CODTITDET, $this->codtitdet);
		if ($this->isColumnModified(ContadettitPeer::CODTIT)) $criteria->add(ContadettitPeer::CODTIT, $this->codtit);
		if ($this->isColumnModified(ContadettitPeer::DESTITDET)) $criteria->add(ContadettitPeer::DESTITDET, $this->destitdet);
		if ($this->isColumnModified(ContadettitPeer::ORDTITDET)) $criteria->add(ContadettitPeer::ORDTITDET, $this->ordtitdet);
		if ($this->isColumnModified(ContadettitPeer::ID)) $criteria->add(ContadettitPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ContadettitPeer::DATABASE_NAME);

		$criteria->add(ContadettitPeer::ID, $this->id);

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

		$copyObj->setCodtitdet($this->codtitdet);

		$copyObj->setCodtit($this->codtit);

		$copyObj->setDestitdet($this->destitdet);

		$copyObj->setOrdtitdet($this->ordtitdet);


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
			self::$peer = new ContadettitPeer();
		}
		return self::$peer;
	}

} 