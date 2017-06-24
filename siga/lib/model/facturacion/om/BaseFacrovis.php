<?php


abstract class BaseFacrovis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fecvis;


	
	protected $rifven;


	
	protected $rifpro;


	
	protected $resvis;


	
	protected $estvis;


	
	protected $obsvis;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getFecvis($format = 'Y-m-d')
  {

    if ($this->fecvis === null || $this->fecvis === '') {
      return null;
    } elseif (!is_int($this->fecvis)) {
            $ts = adodb_strtotime($this->fecvis);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecvis] as date/time value: " . var_export($this->fecvis, true));
      }
    } else {
      $ts = $this->fecvis;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getRifven()
  {

    return trim($this->rifven);

  }
  
  public function getRifpro()
  {

    return trim($this->rifpro);

  }
  
  public function getResvis()
  {

    return trim($this->resvis);

  }
  
  public function getEstvis()
  {

    return trim($this->estvis);

  }
  
  public function getObsvis()
  {

    return trim($this->obsvis);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setFecvis($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecvis] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecvis !== $ts) {
      $this->fecvis = $ts;
      $this->modifiedColumns[] = FacrovisPeer::FECVIS;
    }

	} 
	
	public function setRifven($v)
	{

    if ($this->rifven !== $v) {
        $this->rifven = $v;
        $this->modifiedColumns[] = FacrovisPeer::RIFVEN;
      }
  
	} 
	
	public function setRifpro($v)
	{

    if ($this->rifpro !== $v) {
        $this->rifpro = $v;
        $this->modifiedColumns[] = FacrovisPeer::RIFPRO;
      }
  
	} 
	
	public function setResvis($v)
	{

    if ($this->resvis !== $v) {
        $this->resvis = $v;
        $this->modifiedColumns[] = FacrovisPeer::RESVIS;
      }
  
	} 
	
	public function setEstvis($v)
	{

    if ($this->estvis !== $v) {
        $this->estvis = $v;
        $this->modifiedColumns[] = FacrovisPeer::ESTVIS;
      }
  
	} 
	
	public function setObsvis($v)
	{

    if ($this->obsvis !== $v) {
        $this->obsvis = $v;
        $this->modifiedColumns[] = FacrovisPeer::OBSVIS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FacrovisPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->fecvis = $rs->getDate($startcol + 0, null);

      $this->rifven = $rs->getString($startcol + 1);

      $this->rifpro = $rs->getString($startcol + 2);

      $this->resvis = $rs->getString($startcol + 3);

      $this->estvis = $rs->getString($startcol + 4);

      $this->obsvis = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Facrovis object", $e);
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
			$con = Propel::getConnection(FacrovisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FacrovisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FacrovisPeer::DATABASE_NAME);
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
					$pk = FacrovisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FacrovisPeer::doUpdate($this, $con);
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


			if (($retval = FacrovisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacrovisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFecvis();
				break;
			case 1:
				return $this->getRifven();
				break;
			case 2:
				return $this->getRifpro();
				break;
			case 3:
				return $this->getResvis();
				break;
			case 4:
				return $this->getEstvis();
				break;
			case 5:
				return $this->getObsvis();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FacrovisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFecvis(),
			$keys[1] => $this->getRifven(),
			$keys[2] => $this->getRifpro(),
			$keys[3] => $this->getResvis(),
			$keys[4] => $this->getEstvis(),
			$keys[5] => $this->getObsvis(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FacrovisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFecvis($value);
				break;
			case 1:
				$this->setRifven($value);
				break;
			case 2:
				$this->setRifpro($value);
				break;
			case 3:
				$this->setResvis($value);
				break;
			case 4:
				$this->setEstvis($value);
				break;
			case 5:
				$this->setObsvis($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FacrovisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFecvis($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRifven($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRifpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setResvis($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEstvis($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setObsvis($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FacrovisPeer::DATABASE_NAME);

		if ($this->isColumnModified(FacrovisPeer::FECVIS)) $criteria->add(FacrovisPeer::FECVIS, $this->fecvis);
		if ($this->isColumnModified(FacrovisPeer::RIFVEN)) $criteria->add(FacrovisPeer::RIFVEN, $this->rifven);
		if ($this->isColumnModified(FacrovisPeer::RIFPRO)) $criteria->add(FacrovisPeer::RIFPRO, $this->rifpro);
		if ($this->isColumnModified(FacrovisPeer::RESVIS)) $criteria->add(FacrovisPeer::RESVIS, $this->resvis);
		if ($this->isColumnModified(FacrovisPeer::ESTVIS)) $criteria->add(FacrovisPeer::ESTVIS, $this->estvis);
		if ($this->isColumnModified(FacrovisPeer::OBSVIS)) $criteria->add(FacrovisPeer::OBSVIS, $this->obsvis);
		if ($this->isColumnModified(FacrovisPeer::ID)) $criteria->add(FacrovisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FacrovisPeer::DATABASE_NAME);

		$criteria->add(FacrovisPeer::ID, $this->id);

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

		$copyObj->setFecvis($this->fecvis);

		$copyObj->setRifven($this->rifven);

		$copyObj->setRifpro($this->rifpro);

		$copyObj->setResvis($this->resvis);

		$copyObj->setEstvis($this->estvis);

		$copyObj->setObsvis($this->obsvis);


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
			self::$peer = new FacrovisPeer();
		}
		return self::$peer;
	}

} 