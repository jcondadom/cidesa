<?php


abstract class BaseManesttra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codest;


	
	protected $desest;


	
	protected $codgru;


	
	protected $numsec;


	
	protected $codsis;


	
	protected $feccre;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodest()
  {

    return trim($this->codest);

  }
  
  public function getDesest()
  {

    return trim($this->desest);

  }
  
  public function getCodgru()
  {

    return trim($this->codgru);

  }
  
  public function getNumsec($val=false)
  {

    if($val) return number_format($this->numsec,2,',','.');
    else return $this->numsec;

  }
  
  public function getCodsis()
  {

    return trim($this->codsis);

  }
  
  public function getFeccre($format = 'Y-m-d')
  {

    if ($this->feccre === null || $this->feccre === '') {
      return null;
    } elseif (!is_int($this->feccre)) {
            $ts = adodb_strtotime($this->feccre);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccre] as date/time value: " . var_export($this->feccre, true));
      }
    } else {
      $ts = $this->feccre;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodest($v)
	{

    if ($this->codest !== $v) {
        $this->codest = $v;
        $this->modifiedColumns[] = ManesttraPeer::CODEST;
      }
  
	} 
	
	public function setDesest($v)
	{

    if ($this->desest !== $v) {
        $this->desest = $v;
        $this->modifiedColumns[] = ManesttraPeer::DESEST;
      }
  
	} 
	
	public function setCodgru($v)
	{

    if ($this->codgru !== $v) {
        $this->codgru = $v;
        $this->modifiedColumns[] = ManesttraPeer::CODGRU;
      }
  
	} 
	
	public function setNumsec($v)
	{

    if ($this->numsec !== $v) {
        $this->numsec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ManesttraPeer::NUMSEC;
      }
  
	} 
	
	public function setCodsis($v)
	{

    if ($this->codsis !== $v) {
        $this->codsis = $v;
        $this->modifiedColumns[] = ManesttraPeer::CODSIS;
      }
  
	} 
	
	public function setFeccre($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccre] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccre !== $ts) {
      $this->feccre = $ts;
      $this->modifiedColumns[] = ManesttraPeer::FECCRE;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ManesttraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codest = $rs->getString($startcol + 0);

      $this->desest = $rs->getString($startcol + 1);

      $this->codgru = $rs->getString($startcol + 2);

      $this->numsec = $rs->getFloat($startcol + 3);

      $this->codsis = $rs->getString($startcol + 4);

      $this->feccre = $rs->getDate($startcol + 5, null);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Manesttra object", $e);
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
			$con = Propel::getConnection(ManesttraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ManesttraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ManesttraPeer::DATABASE_NAME);
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
					$pk = ManesttraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ManesttraPeer::doUpdate($this, $con);
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


			if (($retval = ManesttraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManesttraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodest();
				break;
			case 1:
				return $this->getDesest();
				break;
			case 2:
				return $this->getCodgru();
				break;
			case 3:
				return $this->getNumsec();
				break;
			case 4:
				return $this->getCodsis();
				break;
			case 5:
				return $this->getFeccre();
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
		$keys = ManesttraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodest(),
			$keys[1] => $this->getDesest(),
			$keys[2] => $this->getCodgru(),
			$keys[3] => $this->getNumsec(),
			$keys[4] => $this->getCodsis(),
			$keys[5] => $this->getFeccre(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ManesttraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodest($value);
				break;
			case 1:
				$this->setDesest($value);
				break;
			case 2:
				$this->setCodgru($value);
				break;
			case 3:
				$this->setNumsec($value);
				break;
			case 4:
				$this->setCodsis($value);
				break;
			case 5:
				$this->setFeccre($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ManesttraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodest($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesest($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodgru($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumsec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodsis($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFeccre($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ManesttraPeer::DATABASE_NAME);

		if ($this->isColumnModified(ManesttraPeer::CODEST)) $criteria->add(ManesttraPeer::CODEST, $this->codest);
		if ($this->isColumnModified(ManesttraPeer::DESEST)) $criteria->add(ManesttraPeer::DESEST, $this->desest);
		if ($this->isColumnModified(ManesttraPeer::CODGRU)) $criteria->add(ManesttraPeer::CODGRU, $this->codgru);
		if ($this->isColumnModified(ManesttraPeer::NUMSEC)) $criteria->add(ManesttraPeer::NUMSEC, $this->numsec);
		if ($this->isColumnModified(ManesttraPeer::CODSIS)) $criteria->add(ManesttraPeer::CODSIS, $this->codsis);
		if ($this->isColumnModified(ManesttraPeer::FECCRE)) $criteria->add(ManesttraPeer::FECCRE, $this->feccre);
		if ($this->isColumnModified(ManesttraPeer::ID)) $criteria->add(ManesttraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ManesttraPeer::DATABASE_NAME);

		$criteria->add(ManesttraPeer::ID, $this->id);

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

		$copyObj->setCodest($this->codest);

		$copyObj->setDesest($this->desest);

		$copyObj->setCodgru($this->codgru);

		$copyObj->setNumsec($this->numsec);

		$copyObj->setCodsis($this->codsis);

		$copyObj->setFeccre($this->feccre);


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
			self::$peer = new ManesttraPeer();
		}
		return self::$peer;
	}

} 