<?php


abstract class BaseNpinfemb extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $fecemb;


	
	protected $tribem;


	
	protected $motemb;


	
	protected $benemb;


	
	protected $monemb;


	
	protected $observ;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getFecemb($format = 'Y-m-d')
  {

    if ($this->fecemb === null || $this->fecemb === '') {
      return null;
    } elseif (!is_int($this->fecemb)) {
            $ts = adodb_strtotime($this->fecemb);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecemb] as date/time value: " . var_export($this->fecemb, true));
      }
    } else {
      $ts = $this->fecemb;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTribem()
  {

    return trim($this->tribem);

  }
  
  public function getMotemb()
  {

    return trim($this->motemb);

  }
  
  public function getBenemb()
  {

    return trim($this->benemb);

  }
  
  public function getMonemb($val=false)
  {

    if($val) return number_format($this->monemb,2,',','.');
    else return $this->monemb;

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpinfembPeer::CODEMP;
      }
  
	} 
	
	public function setFecemb($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecemb] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecemb !== $ts) {
      $this->fecemb = $ts;
      $this->modifiedColumns[] = NpinfembPeer::FECEMB;
    }

	} 
	
	public function setTribem($v)
	{

    if ($this->tribem !== $v) {
        $this->tribem = $v;
        $this->modifiedColumns[] = NpinfembPeer::TRIBEM;
      }
  
	} 
	
	public function setMotemb($v)
	{

    if ($this->motemb !== $v) {
        $this->motemb = $v;
        $this->modifiedColumns[] = NpinfembPeer::MOTEMB;
      }
  
	} 
	
	public function setBenemb($v)
	{

    if ($this->benemb !== $v) {
        $this->benemb = $v;
        $this->modifiedColumns[] = NpinfembPeer::BENEMB;
      }
  
	} 
	
	public function setMonemb($v)
	{

    if ($this->monemb !== $v) {
        $this->monemb = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpinfembPeer::MONEMB;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = NpinfembPeer::OBSERV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpinfembPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->fecemb = $rs->getDate($startcol + 1, null);

      $this->tribem = $rs->getString($startcol + 2);

      $this->motemb = $rs->getString($startcol + 3);

      $this->benemb = $rs->getString($startcol + 4);

      $this->monemb = $rs->getFloat($startcol + 5);

      $this->observ = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npinfemb object", $e);
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
			$con = Propel::getConnection(NpinfembPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinfembPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinfembPeer::DATABASE_NAME);
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
					$pk = NpinfembPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpinfembPeer::doUpdate($this, $con);
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


			if (($retval = NpinfembPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfembPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getFecemb();
				break;
			case 2:
				return $this->getTribem();
				break;
			case 3:
				return $this->getMotemb();
				break;
			case 4:
				return $this->getBenemb();
				break;
			case 5:
				return $this->getMonemb();
				break;
			case 6:
				return $this->getObserv();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfembPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getFecemb(),
			$keys[2] => $this->getTribem(),
			$keys[3] => $this->getMotemb(),
			$keys[4] => $this->getBenemb(),
			$keys[5] => $this->getMonemb(),
			$keys[6] => $this->getObserv(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfembPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setFecemb($value);
				break;
			case 2:
				$this->setTribem($value);
				break;
			case 3:
				$this->setMotemb($value);
				break;
			case 4:
				$this->setBenemb($value);
				break;
			case 5:
				$this->setMonemb($value);
				break;
			case 6:
				$this->setObserv($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfembPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecemb($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTribem($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMotemb($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBenemb($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonemb($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setObserv($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinfembPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinfembPeer::CODEMP)) $criteria->add(NpinfembPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinfembPeer::FECEMB)) $criteria->add(NpinfembPeer::FECEMB, $this->fecemb);
		if ($this->isColumnModified(NpinfembPeer::TRIBEM)) $criteria->add(NpinfembPeer::TRIBEM, $this->tribem);
		if ($this->isColumnModified(NpinfembPeer::MOTEMB)) $criteria->add(NpinfembPeer::MOTEMB, $this->motemb);
		if ($this->isColumnModified(NpinfembPeer::BENEMB)) $criteria->add(NpinfembPeer::BENEMB, $this->benemb);
		if ($this->isColumnModified(NpinfembPeer::MONEMB)) $criteria->add(NpinfembPeer::MONEMB, $this->monemb);
		if ($this->isColumnModified(NpinfembPeer::OBSERV)) $criteria->add(NpinfembPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(NpinfembPeer::ID)) $criteria->add(NpinfembPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinfembPeer::DATABASE_NAME);

		$criteria->add(NpinfembPeer::ID, $this->id);

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

		$copyObj->setFecemb($this->fecemb);

		$copyObj->setTribem($this->tribem);

		$copyObj->setMotemb($this->motemb);

		$copyObj->setBenemb($this->benemb);

		$copyObj->setMonemb($this->monemb);

		$copyObj->setObserv($this->observ);


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
			self::$peer = new NpinfembPeer();
		}
		return self::$peer;
	}

} 