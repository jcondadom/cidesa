<?php


abstract class BaseMandetpla extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codgru;


	
	protected $fecgen;


	
	protected $numequ;


	
	protected $destar;


	
	protected $feceje;


	
	protected $horequ;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodgru()
  {

    return trim($this->codgru);

  }
  
  public function getFecgen($format = 'Y-m-d')
  {

    if ($this->fecgen === null || $this->fecgen === '') {
      return null;
    } elseif (!is_int($this->fecgen)) {
            $ts = adodb_strtotime($this->fecgen);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecgen] as date/time value: " . var_export($this->fecgen, true));
      }
    } else {
      $ts = $this->fecgen;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumequ()
  {

    return trim($this->numequ);

  }
  
  public function getDestar()
  {

    return trim($this->destar);

  }
  
  public function getFeceje($format = 'Y-m-d')
  {

    if ($this->feceje === null || $this->feceje === '') {
      return null;
    } elseif (!is_int($this->feceje)) {
            $ts = adodb_strtotime($this->feceje);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feceje] as date/time value: " . var_export($this->feceje, true));
      }
    } else {
      $ts = $this->feceje;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHorequ($val=false)
  {

    if($val) return number_format($this->horequ,2,',','.');
    else return $this->horequ;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodgru($v)
	{

    if ($this->codgru !== $v) {
        $this->codgru = $v;
        $this->modifiedColumns[] = MandetplaPeer::CODGRU;
      }
  
	} 
	
	public function setFecgen($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecgen] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecgen !== $ts) {
      $this->fecgen = $ts;
      $this->modifiedColumns[] = MandetplaPeer::FECGEN;
    }

	} 
	
	public function setNumequ($v)
	{

    if ($this->numequ !== $v) {
        $this->numequ = $v;
        $this->modifiedColumns[] = MandetplaPeer::NUMEQU;
      }
  
	} 
	
	public function setDestar($v)
	{

    if ($this->destar !== $v) {
        $this->destar = $v;
        $this->modifiedColumns[] = MandetplaPeer::DESTAR;
      }
  
	} 
	
	public function setFeceje($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feceje] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feceje !== $ts) {
      $this->feceje = $ts;
      $this->modifiedColumns[] = MandetplaPeer::FECEJE;
    }

	} 
	
	public function setHorequ($v)
	{

    if ($this->horequ !== $v) {
        $this->horequ = Herramientas::toFloat($v);
        $this->modifiedColumns[] = MandetplaPeer::HOREQU;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = MandetplaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codgru = $rs->getString($startcol + 0);

      $this->fecgen = $rs->getDate($startcol + 1, null);

      $this->numequ = $rs->getString($startcol + 2);

      $this->destar = $rs->getString($startcol + 3);

      $this->feceje = $rs->getDate($startcol + 4, null);

      $this->horequ = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Mandetpla object", $e);
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
			$con = Propel::getConnection(MandetplaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MandetplaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(MandetplaPeer::DATABASE_NAME);
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
					$pk = MandetplaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MandetplaPeer::doUpdate($this, $con);
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


			if (($retval = MandetplaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MandetplaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodgru();
				break;
			case 1:
				return $this->getFecgen();
				break;
			case 2:
				return $this->getNumequ();
				break;
			case 3:
				return $this->getDestar();
				break;
			case 4:
				return $this->getFeceje();
				break;
			case 5:
				return $this->getHorequ();
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
		$keys = MandetplaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodgru(),
			$keys[1] => $this->getFecgen(),
			$keys[2] => $this->getNumequ(),
			$keys[3] => $this->getDestar(),
			$keys[4] => $this->getFeceje(),
			$keys[5] => $this->getHorequ(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MandetplaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodgru($value);
				break;
			case 1:
				$this->setFecgen($value);
				break;
			case 2:
				$this->setNumequ($value);
				break;
			case 3:
				$this->setDestar($value);
				break;
			case 4:
				$this->setFeceje($value);
				break;
			case 5:
				$this->setHorequ($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MandetplaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodgru($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecgen($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumequ($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDestar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFeceje($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setHorequ($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MandetplaPeer::DATABASE_NAME);

		if ($this->isColumnModified(MandetplaPeer::CODGRU)) $criteria->add(MandetplaPeer::CODGRU, $this->codgru);
		if ($this->isColumnModified(MandetplaPeer::FECGEN)) $criteria->add(MandetplaPeer::FECGEN, $this->fecgen);
		if ($this->isColumnModified(MandetplaPeer::NUMEQU)) $criteria->add(MandetplaPeer::NUMEQU, $this->numequ);
		if ($this->isColumnModified(MandetplaPeer::DESTAR)) $criteria->add(MandetplaPeer::DESTAR, $this->destar);
		if ($this->isColumnModified(MandetplaPeer::FECEJE)) $criteria->add(MandetplaPeer::FECEJE, $this->feceje);
		if ($this->isColumnModified(MandetplaPeer::HOREQU)) $criteria->add(MandetplaPeer::HOREQU, $this->horequ);
		if ($this->isColumnModified(MandetplaPeer::ID)) $criteria->add(MandetplaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MandetplaPeer::DATABASE_NAME);

		$criteria->add(MandetplaPeer::ID, $this->id);

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

		$copyObj->setCodgru($this->codgru);

		$copyObj->setFecgen($this->fecgen);

		$copyObj->setNumequ($this->numequ);

		$copyObj->setDestar($this->destar);

		$copyObj->setFeceje($this->feceje);

		$copyObj->setHorequ($this->horequ);


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
			self::$peer = new MandetplaPeer();
		}
		return self::$peer;
	}

} 