<?php


abstract class BaseViarensolvia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numren;


	
	protected $fecren;


	
	protected $numsol;


	
	protected $lugvis;


	
	protected $actrea;


	
	protected $resobt;


	
	protected $benins;


	
	protected $conrec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumren()
  {

    return trim($this->numren);

  }
  
  public function getFecren($format = 'Y-m-d')
  {

    if ($this->fecren === null || $this->fecren === '') {
      return null;
    } elseif (!is_int($this->fecren)) {
            $ts = adodb_strtotime($this->fecren);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecren] as date/time value: " . var_export($this->fecren, true));
      }
    } else {
      $ts = $this->fecren;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getLugvis()
  {

    return trim($this->lugvis);

  }
  
  public function getActrea()
  {

    return trim($this->actrea);

  }
  
  public function getResobt()
  {

    return trim($this->resobt);

  }
  
  public function getBenins()
  {

    return trim($this->benins);

  }
  
  public function getConrec()
  {

    return trim($this->conrec);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumren($v)
	{

    if ($this->numren !== $v) {
        $this->numren = $v;
        $this->modifiedColumns[] = ViarensolviaPeer::NUMREN;
      }
  
	} 
	
	public function setFecren($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecren] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecren !== $ts) {
      $this->fecren = $ts;
      $this->modifiedColumns[] = ViarensolviaPeer::FECREN;
    }

	} 
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = ViarensolviaPeer::NUMSOL;
      }
  
	} 
	
	public function setLugvis($v)
	{

    if ($this->lugvis !== $v) {
        $this->lugvis = $v;
        $this->modifiedColumns[] = ViarensolviaPeer::LUGVIS;
      }
  
	} 
	
	public function setActrea($v)
	{

    if ($this->actrea !== $v) {
        $this->actrea = $v;
        $this->modifiedColumns[] = ViarensolviaPeer::ACTREA;
      }
  
	} 
	
	public function setResobt($v)
	{

    if ($this->resobt !== $v) {
        $this->resobt = $v;
        $this->modifiedColumns[] = ViarensolviaPeer::RESOBT;
      }
  
	} 
	
	public function setBenins($v)
	{

    if ($this->benins !== $v) {
        $this->benins = $v;
        $this->modifiedColumns[] = ViarensolviaPeer::BENINS;
      }
  
	} 
	
	public function setConrec($v)
	{

    if ($this->conrec !== $v) {
        $this->conrec = $v;
        $this->modifiedColumns[] = ViarensolviaPeer::CONREC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ViarensolviaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numren = $rs->getString($startcol + 0);

      $this->fecren = $rs->getDate($startcol + 1, null);

      $this->numsol = $rs->getString($startcol + 2);

      $this->lugvis = $rs->getString($startcol + 3);

      $this->actrea = $rs->getString($startcol + 4);

      $this->resobt = $rs->getString($startcol + 5);

      $this->benins = $rs->getString($startcol + 6);

      $this->conrec = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Viarensolvia object", $e);
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
			$con = Propel::getConnection(ViarensolviaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ViarensolviaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ViarensolviaPeer::DATABASE_NAME);
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
					$pk = ViarensolviaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ViarensolviaPeer::doUpdate($this, $con);
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


			if (($retval = ViarensolviaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViarensolviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumren();
				break;
			case 1:
				return $this->getFecren();
				break;
			case 2:
				return $this->getNumsol();
				break;
			case 3:
				return $this->getLugvis();
				break;
			case 4:
				return $this->getActrea();
				break;
			case 5:
				return $this->getResobt();
				break;
			case 6:
				return $this->getBenins();
				break;
			case 7:
				return $this->getConrec();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViarensolviaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumren(),
			$keys[1] => $this->getFecren(),
			$keys[2] => $this->getNumsol(),
			$keys[3] => $this->getLugvis(),
			$keys[4] => $this->getActrea(),
			$keys[5] => $this->getResobt(),
			$keys[6] => $this->getBenins(),
			$keys[7] => $this->getConrec(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ViarensolviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumren($value);
				break;
			case 1:
				$this->setFecren($value);
				break;
			case 2:
				$this->setNumsol($value);
				break;
			case 3:
				$this->setLugvis($value);
				break;
			case 4:
				$this->setActrea($value);
				break;
			case 5:
				$this->setResobt($value);
				break;
			case 6:
				$this->setBenins($value);
				break;
			case 7:
				$this->setConrec($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ViarensolviaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumren($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecren($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumsol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLugvis($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setActrea($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setResobt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBenins($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setConrec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ViarensolviaPeer::DATABASE_NAME);

		if ($this->isColumnModified(ViarensolviaPeer::NUMREN)) $criteria->add(ViarensolviaPeer::NUMREN, $this->numren);
		if ($this->isColumnModified(ViarensolviaPeer::FECREN)) $criteria->add(ViarensolviaPeer::FECREN, $this->fecren);
		if ($this->isColumnModified(ViarensolviaPeer::NUMSOL)) $criteria->add(ViarensolviaPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(ViarensolviaPeer::LUGVIS)) $criteria->add(ViarensolviaPeer::LUGVIS, $this->lugvis);
		if ($this->isColumnModified(ViarensolviaPeer::ACTREA)) $criteria->add(ViarensolviaPeer::ACTREA, $this->actrea);
		if ($this->isColumnModified(ViarensolviaPeer::RESOBT)) $criteria->add(ViarensolviaPeer::RESOBT, $this->resobt);
		if ($this->isColumnModified(ViarensolviaPeer::BENINS)) $criteria->add(ViarensolviaPeer::BENINS, $this->benins);
		if ($this->isColumnModified(ViarensolviaPeer::CONREC)) $criteria->add(ViarensolviaPeer::CONREC, $this->conrec);
		if ($this->isColumnModified(ViarensolviaPeer::ID)) $criteria->add(ViarensolviaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ViarensolviaPeer::DATABASE_NAME);

		$criteria->add(ViarensolviaPeer::ID, $this->id);

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

		$copyObj->setNumren($this->numren);

		$copyObj->setFecren($this->fecren);

		$copyObj->setNumsol($this->numsol);

		$copyObj->setLugvis($this->lugvis);

		$copyObj->setActrea($this->actrea);

		$copyObj->setResobt($this->resobt);

		$copyObj->setBenins($this->benins);

		$copyObj->setConrec($this->conrec);


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
			self::$peer = new ViarensolviaPeer();
		}
		return self::$peer;
	}

} 