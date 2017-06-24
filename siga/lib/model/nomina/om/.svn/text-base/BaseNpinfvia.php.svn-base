<?php


abstract class BaseNpinfvia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $fecvia;


	
	protected $motvia;


	
	protected $monpag;


	
	protected $modpag;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getFecvia($format = 'Y-m-d')
  {

    if ($this->fecvia === null || $this->fecvia === '') {
      return null;
    } elseif (!is_int($this->fecvia)) {
            $ts = adodb_strtotime($this->fecvia);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecvia] as date/time value: " . var_export($this->fecvia, true));
      }
    } else {
      $ts = $this->fecvia;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMotvia()
  {

    return trim($this->motvia);

  }
  
  public function getMonpag($val=false)
  {

    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
  public function getModpag()
  {

    return trim($this->modpag);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpinfviaPeer::CODEMP;
      }
  
	} 
	
	public function setFecvia($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecvia] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecvia !== $ts) {
      $this->fecvia = $ts;
      $this->modifiedColumns[] = NpinfviaPeer::FECVIA;
    }

	} 
	
	public function setMotvia($v)
	{

    if ($this->motvia !== $v) {
        $this->motvia = $v;
        $this->modifiedColumns[] = NpinfviaPeer::MOTVIA;
      }
  
	} 
	
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpinfviaPeer::MONPAG;
      }
  
	} 
	
	public function setModpag($v)
	{

    if ($this->modpag !== $v) {
        $this->modpag = $v;
        $this->modifiedColumns[] = NpinfviaPeer::MODPAG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpinfviaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->fecvia = $rs->getDate($startcol + 1, null);

      $this->motvia = $rs->getString($startcol + 2);

      $this->monpag = $rs->getFloat($startcol + 3);

      $this->modpag = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npinfvia object", $e);
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
			$con = Propel::getConnection(NpinfviaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinfviaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinfviaPeer::DATABASE_NAME);
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
					$pk = NpinfviaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpinfviaPeer::doUpdate($this, $con);
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


			if (($retval = NpinfviaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFecvia();
				break;
			case 2:
				return $this->getMotvia();
				break;
			case 3:
				return $this->getMonpag();
				break;
			case 4:
				return $this->getModpag();
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
		$keys = NpinfviaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFecvia(),
			$keys[2] => $this->getMotvia(),
			$keys[3] => $this->getMonpag(),
			$keys[4] => $this->getModpag(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFecvia($value);
				break;
			case 2:
				$this->setMotvia($value);
				break;
			case 3:
				$this->setMonpag($value);
				break;
			case 4:
				$this->setModpag($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfviaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecvia($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMotvia($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonpag($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setModpag($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinfviaPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinfviaPeer::CODEMP)) $criteria->add(NpinfviaPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinfviaPeer::FECVIA)) $criteria->add(NpinfviaPeer::FECVIA, $this->fecvia);
		if ($this->isColumnModified(NpinfviaPeer::MOTVIA)) $criteria->add(NpinfviaPeer::MOTVIA, $this->motvia);
		if ($this->isColumnModified(NpinfviaPeer::MONPAG)) $criteria->add(NpinfviaPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(NpinfviaPeer::MODPAG)) $criteria->add(NpinfviaPeer::MODPAG, $this->modpag);
		if ($this->isColumnModified(NpinfviaPeer::ID)) $criteria->add(NpinfviaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinfviaPeer::DATABASE_NAME);

		$criteria->add(NpinfviaPeer::ID, $this->id);

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

		$copyObj->setFecvia($this->fecvia);

		$copyObj->setMotvia($this->motvia);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setModpag($this->modpag);


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
			self::$peer = new NpinfviaPeer();
		}
		return self::$peer;
	}

} 