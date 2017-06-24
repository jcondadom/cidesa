<?php


abstract class BaseTsdetpagele extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refpag;


	
	protected $numord;


	
	protected $fecval;


	
	protected $estord;


	
	protected $numcom;


	
	protected $refmovlib;


	
	protected $refpagpre;


	
	protected $monord;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefpag()
  {

    return trim($this->refpag);

  }
  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getFecval($format = 'Y-m-d')
  {

    if ($this->fecval === null || $this->fecval === '') {
      return null;
    } elseif (!is_int($this->fecval)) {
            $ts = adodb_strtotime($this->fecval);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecval] as date/time value: " . var_export($this->fecval, true));
      }
    } else {
      $ts = $this->fecval;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getEstord()
  {

    return trim($this->estord);

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getRefmovlib()
  {

    return trim($this->refmovlib);

  }
  
  public function getRefpagpre()
  {

    return trim($this->refpagpre);

  }
  
  public function getMonord($val=false)
  {

    if($val) return number_format($this->monord,2,',','.');
    else return $this->monord;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefpag($v)
	{

    if ($this->refpag !== $v) {
        $this->refpag = $v;
        $this->modifiedColumns[] = TsdetpagelePeer::REFPAG;
      }
  
	} 
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = TsdetpagelePeer::NUMORD;
      }
  
	} 
	
	public function setFecval($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecval] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecval !== $ts) {
      $this->fecval = $ts;
      $this->modifiedColumns[] = TsdetpagelePeer::FECVAL;
    }

	} 
	
	public function setEstord($v)
	{

    if ($this->estord !== $v) {
        $this->estord = $v;
        $this->modifiedColumns[] = TsdetpagelePeer::ESTORD;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = TsdetpagelePeer::NUMCOM;
      }
  
	} 
	
	public function setRefmovlib($v)
	{

    if ($this->refmovlib !== $v) {
        $this->refmovlib = $v;
        $this->modifiedColumns[] = TsdetpagelePeer::REFMOVLIB;
      }
  
	} 
	
	public function setRefpagpre($v)
	{

    if ($this->refpagpre !== $v) {
        $this->refpagpre = $v;
        $this->modifiedColumns[] = TsdetpagelePeer::REFPAGPRE;
      }
  
	} 
	
	public function setMonord($v)
	{

    if ($this->monord !== $v) {
        $this->monord = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsdetpagelePeer::MONORD;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsdetpagelePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refpag = $rs->getString($startcol + 0);

      $this->numord = $rs->getString($startcol + 1);

      $this->fecval = $rs->getDate($startcol + 2, null);

      $this->estord = $rs->getString($startcol + 3);

      $this->numcom = $rs->getString($startcol + 4);

      $this->refmovlib = $rs->getString($startcol + 5);

      $this->refpagpre = $rs->getString($startcol + 6);

      $this->monord = $rs->getFloat($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsdetpagele object", $e);
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
			$con = Propel::getConnection(TsdetpagelePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsdetpagelePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsdetpagelePeer::DATABASE_NAME);
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
					$pk = TsdetpagelePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsdetpagelePeer::doUpdate($this, $con);
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


			if (($retval = TsdetpagelePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdetpagelePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefpag();
				break;
			case 1:
				return $this->getNumord();
				break;
			case 2:
				return $this->getFecval();
				break;
			case 3:
				return $this->getEstord();
				break;
			case 4:
				return $this->getNumcom();
				break;
			case 5:
				return $this->getRefmovlib();
				break;
			case 6:
				return $this->getRefpagpre();
				break;
			case 7:
				return $this->getMonord();
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
		$keys = TsdetpagelePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefpag(),
			$keys[1] => $this->getNumord(),
			$keys[2] => $this->getFecval(),
			$keys[3] => $this->getEstord(),
			$keys[4] => $this->getNumcom(),
			$keys[5] => $this->getRefmovlib(),
			$keys[6] => $this->getRefpagpre(),
			$keys[7] => $this->getMonord(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdetpagelePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefpag($value);
				break;
			case 1:
				$this->setNumord($value);
				break;
			case 2:
				$this->setFecval($value);
				break;
			case 3:
				$this->setEstord($value);
				break;
			case 4:
				$this->setNumcom($value);
				break;
			case 5:
				$this->setRefmovlib($value);
				break;
			case 6:
				$this->setRefpagpre($value);
				break;
			case 7:
				$this->setMonord($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdetpagelePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefpag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumord($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecval($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEstord($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumcom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRefmovlib($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRefpagpre($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonord($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsdetpagelePeer::DATABASE_NAME);

		if ($this->isColumnModified(TsdetpagelePeer::REFPAG)) $criteria->add(TsdetpagelePeer::REFPAG, $this->refpag);
		if ($this->isColumnModified(TsdetpagelePeer::NUMORD)) $criteria->add(TsdetpagelePeer::NUMORD, $this->numord);
		if ($this->isColumnModified(TsdetpagelePeer::FECVAL)) $criteria->add(TsdetpagelePeer::FECVAL, $this->fecval);
		if ($this->isColumnModified(TsdetpagelePeer::ESTORD)) $criteria->add(TsdetpagelePeer::ESTORD, $this->estord);
		if ($this->isColumnModified(TsdetpagelePeer::NUMCOM)) $criteria->add(TsdetpagelePeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(TsdetpagelePeer::REFMOVLIB)) $criteria->add(TsdetpagelePeer::REFMOVLIB, $this->refmovlib);
		if ($this->isColumnModified(TsdetpagelePeer::REFPAGPRE)) $criteria->add(TsdetpagelePeer::REFPAGPRE, $this->refpagpre);
		if ($this->isColumnModified(TsdetpagelePeer::MONORD)) $criteria->add(TsdetpagelePeer::MONORD, $this->monord);
		if ($this->isColumnModified(TsdetpagelePeer::ID)) $criteria->add(TsdetpagelePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsdetpagelePeer::DATABASE_NAME);

		$criteria->add(TsdetpagelePeer::ID, $this->id);

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

		$copyObj->setRefpag($this->refpag);

		$copyObj->setNumord($this->numord);

		$copyObj->setFecval($this->fecval);

		$copyObj->setEstord($this->estord);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setRefmovlib($this->refmovlib);

		$copyObj->setRefpagpre($this->refpagpre);

		$copyObj->setMonord($this->monord);


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
			self::$peer = new TsdetpagelePeer();
		}
		return self::$peer;
	}

} 