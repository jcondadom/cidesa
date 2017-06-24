<?php


abstract class BaseCaporressoc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $mondes;


	
	protected $monhas;


	
	protected $porres;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getMonhas($val=false)
  {

    if($val) return number_format($this->monhas,2,',','.');
    else return $this->monhas;

  }
  
  public function getPorres($val=false)
  {

    if($val) return number_format($this->porres,2,',','.');
    else return $this->porres;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaporressocPeer::MONDES;
      }
  
	} 
	
	public function setMonhas($v)
	{

    if ($this->monhas !== $v) {
        $this->monhas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaporressocPeer::MONHAS;
      }
  
	} 
	
	public function setPorres($v)
	{

    if ($this->porres !== $v) {
        $this->porres = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaporressocPeer::PORRES;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CaporressocPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->mondes = $rs->getFloat($startcol + 0);

      $this->monhas = $rs->getFloat($startcol + 1);

      $this->porres = $rs->getFloat($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Caporressoc object", $e);
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
			$con = Propel::getConnection(CaporressocPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaporressocPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaporressocPeer::DATABASE_NAME);
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
					$pk = CaporressocPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CaporressocPeer::doUpdate($this, $con);
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


			if (($retval = CaporressocPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaporressocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMondes();
				break;
			case 1:
				return $this->getMonhas();
				break;
			case 2:
				return $this->getPorres();
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
		$keys = CaporressocPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMondes(),
			$keys[1] => $this->getMonhas(),
			$keys[2] => $this->getPorres(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaporressocPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMondes($value);
				break;
			case 1:
				$this->setMonhas($value);
				break;
			case 2:
				$this->setPorres($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaporressocPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMondes($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMonhas($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPorres($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaporressocPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaporressocPeer::MONDES)) $criteria->add(CaporressocPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(CaporressocPeer::MONHAS)) $criteria->add(CaporressocPeer::MONHAS, $this->monhas);
		if ($this->isColumnModified(CaporressocPeer::PORRES)) $criteria->add(CaporressocPeer::PORRES, $this->porres);
		if ($this->isColumnModified(CaporressocPeer::ID)) $criteria->add(CaporressocPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaporressocPeer::DATABASE_NAME);

		$criteria->add(CaporressocPeer::ID, $this->id);

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

		$copyObj->setMondes($this->mondes);

		$copyObj->setMonhas($this->monhas);

		$copyObj->setPorres($this->porres);


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
			self::$peer = new CaporressocPeer();
		}
		return self::$peer;
	}

} 