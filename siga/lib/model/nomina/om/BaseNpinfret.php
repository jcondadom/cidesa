<?php


abstract class BaseNpinfret extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $tipret;


	
	protected $fecret;


	
	protected $monret;


	
	protected $obsret;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getTipret()
  {

    return trim($this->tipret);

  }
  
  public function getFecret()
  {

    return trim($this->fecret);

  }
  
  public function getMonret($val=false)
  {

    if($val) return number_format($this->monret,2,',','.');
    else return $this->monret;

  }
  
  public function getObsret()
  {

    return trim($this->obsret);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpinfretPeer::CODEMP;
      }
  
	} 
	
	public function setTipret($v)
	{

    if ($this->tipret !== $v) {
        $this->tipret = $v;
        $this->modifiedColumns[] = NpinfretPeer::TIPRET;
      }
  
	} 
	
	public function setFecret($v)
	{

    if ($this->fecret !== $v) {
        $this->fecret = $v;
        $this->modifiedColumns[] = NpinfretPeer::FECRET;
      }
  
	} 
	
	public function setMonret($v)
	{

    if ($this->monret !== $v) {
        $this->monret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpinfretPeer::MONRET;
      }
  
	} 
	
	public function setObsret($v)
	{

    if ($this->obsret !== $v) {
        $this->obsret = $v;
        $this->modifiedColumns[] = NpinfretPeer::OBSRET;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpinfretPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->tipret = $rs->getString($startcol + 1);

      $this->fecret = $rs->getString($startcol + 2);

      $this->monret = $rs->getFloat($startcol + 3);

      $this->obsret = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npinfret object", $e);
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

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpinfretPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinfretPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinfretPeer::DATABASE_NAME);
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
					$pk = NpinfretPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpinfretPeer::doUpdate($this, $con);
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


			if (($retval = NpinfretPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfretPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getTipret();
				break;
			case 2:
				return $this->getFecret();
				break;
			case 3:
				return $this->getMonret();
				break;
			case 4:
				return $this->getObsret();
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
		$keys = NpinfretPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getTipret(),
			$keys[2] => $this->getFecret(),
			$keys[3] => $this->getMonret(),
			$keys[4] => $this->getObsret(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfretPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setTipret($value);
				break;
			case 2:
				$this->setFecret($value);
				break;
			case 3:
				$this->setMonret($value);
				break;
			case 4:
				$this->setObsret($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfretPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipret($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecret($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonret($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObsret($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinfretPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinfretPeer::CODEMP)) $criteria->add(NpinfretPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinfretPeer::TIPRET)) $criteria->add(NpinfretPeer::TIPRET, $this->tipret);
		if ($this->isColumnModified(NpinfretPeer::FECRET)) $criteria->add(NpinfretPeer::FECRET, $this->fecret);
		if ($this->isColumnModified(NpinfretPeer::MONRET)) $criteria->add(NpinfretPeer::MONRET, $this->monret);
		if ($this->isColumnModified(NpinfretPeer::OBSRET)) $criteria->add(NpinfretPeer::OBSRET, $this->obsret);
		if ($this->isColumnModified(NpinfretPeer::ID)) $criteria->add(NpinfretPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinfretPeer::DATABASE_NAME);

		$criteria->add(NpinfretPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setTipret($this->tipret);

		$copyObj->setFecret($this->fecret);

		$copyObj->setMonret($this->monret);

		$copyObj->setObsret($this->obsret);


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
			self::$peer = new NpinfretPeer();
		}
		return self::$peer;
	}

} 