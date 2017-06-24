<?php


abstract class BaseMangenpla extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codgru;


	
	protected $fecgen;


	
	protected $imprep = 'N';


	
	protected $staapr = 'N';


	
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

  
  public function getImprep()
  {

    return trim($this->imprep);

  }
  
  public function getStaapr()
  {

    return trim($this->staapr);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodgru($v)
	{

    if ($this->codgru !== $v) {
        $this->codgru = $v;
        $this->modifiedColumns[] = MangenplaPeer::CODGRU;
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
      $this->modifiedColumns[] = MangenplaPeer::FECGEN;
    }

	} 
	
	public function setImprep($v)
	{

    if ($this->imprep !== $v || $v === 'N') {
        $this->imprep = $v;
        $this->modifiedColumns[] = MangenplaPeer::IMPREP;
      }
  
	} 
	
	public function setStaapr($v)
	{

    if ($this->staapr !== $v || $v === 'N') {
        $this->staapr = $v;
        $this->modifiedColumns[] = MangenplaPeer::STAAPR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = MangenplaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codgru = $rs->getString($startcol + 0);

      $this->fecgen = $rs->getDate($startcol + 1, null);

      $this->imprep = $rs->getString($startcol + 2);

      $this->staapr = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Mangenpla object", $e);
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
			$con = Propel::getConnection(MangenplaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MangenplaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(MangenplaPeer::DATABASE_NAME);
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
					$pk = MangenplaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MangenplaPeer::doUpdate($this, $con);
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


			if (($retval = MangenplaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MangenplaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getImprep();
				break;
			case 3:
				return $this->getStaapr();
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
		$keys = MangenplaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodgru(),
			$keys[1] => $this->getFecgen(),
			$keys[2] => $this->getImprep(),
			$keys[3] => $this->getStaapr(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MangenplaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setImprep($value);
				break;
			case 3:
				$this->setStaapr($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MangenplaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodgru($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecgen($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setImprep($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStaapr($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MangenplaPeer::DATABASE_NAME);

		if ($this->isColumnModified(MangenplaPeer::CODGRU)) $criteria->add(MangenplaPeer::CODGRU, $this->codgru);
		if ($this->isColumnModified(MangenplaPeer::FECGEN)) $criteria->add(MangenplaPeer::FECGEN, $this->fecgen);
		if ($this->isColumnModified(MangenplaPeer::IMPREP)) $criteria->add(MangenplaPeer::IMPREP, $this->imprep);
		if ($this->isColumnModified(MangenplaPeer::STAAPR)) $criteria->add(MangenplaPeer::STAAPR, $this->staapr);
		if ($this->isColumnModified(MangenplaPeer::ID)) $criteria->add(MangenplaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MangenplaPeer::DATABASE_NAME);

		$criteria->add(MangenplaPeer::ID, $this->id);

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

		$copyObj->setImprep($this->imprep);

		$copyObj->setStaapr($this->staapr);


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
			self::$peer = new MangenplaPeer();
		}
		return self::$peer;
	}

} 