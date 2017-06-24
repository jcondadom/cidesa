<?php


abstract class BaseNpturemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtur;


	
	protected $codnom;


	
	protected $codemp;


	
	protected $codcar;


	
	protected $fecini;


	
	protected $fecfin;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtur()
  {

    return trim($this->codtur);

  }
  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getFecini($format = 'Y-m-d')
  {

    if ($this->fecini === null || $this->fecini === '') {
      return null;
    } elseif (!is_int($this->fecini)) {
            $ts = adodb_strtotime($this->fecini);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
      }
    } else {
      $ts = $this->fecini;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecfin($format = 'Y-m-d')
  {

    if ($this->fecfin === null || $this->fecfin === '') {
      return null;
    } elseif (!is_int($this->fecfin)) {
            $ts = adodb_strtotime($this->fecfin);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfin] as date/time value: " . var_export($this->fecfin, true));
      }
    } else {
      $ts = $this->fecfin;
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
	
	public function setCodtur($v)
	{

    if ($this->codtur !== $v) {
        $this->codtur = $v;
        $this->modifiedColumns[] = NpturempPeer::CODTUR;
      }
  
	} 
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpturempPeer::CODNOM;
      }
  
	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpturempPeer::CODEMP;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NpturempPeer::CODCAR;
      }
  
	} 
	
	public function setFecini($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = NpturempPeer::FECINI;
    }

	} 
	
	public function setFecfin($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfin] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfin !== $ts) {
      $this->fecfin = $ts;
      $this->modifiedColumns[] = NpturempPeer::FECFIN;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpturempPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtur = $rs->getString($startcol + 0);

      $this->codnom = $rs->getString($startcol + 1);

      $this->codemp = $rs->getString($startcol + 2);

      $this->codcar = $rs->getString($startcol + 3);

      $this->fecini = $rs->getDate($startcol + 4, null);

      $this->fecfin = $rs->getDate($startcol + 5, null);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npturemp object", $e);
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
			$con = Propel::getConnection(NpturempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpturempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpturempPeer::DATABASE_NAME);
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
					$pk = NpturempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpturempPeer::doUpdate($this, $con);
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


			if (($retval = NpturempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpturempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtur();
				break;
			case 1:
				return $this->getCodnom();
				break;
			case 2:
				return $this->getCodemp();
				break;
			case 3:
				return $this->getCodcar();
				break;
			case 4:
				return $this->getFecini();
				break;
			case 5:
				return $this->getFecfin();
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
		$keys = NpturempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtur(),
			$keys[1] => $this->getCodnom(),
			$keys[2] => $this->getCodemp(),
			$keys[3] => $this->getCodcar(),
			$keys[4] => $this->getFecini(),
			$keys[5] => $this->getFecfin(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpturempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtur($value);
				break;
			case 1:
				$this->setCodnom($value);
				break;
			case 2:
				$this->setCodemp($value);
				break;
			case 3:
				$this->setCodcar($value);
				break;
			case 4:
				$this->setFecini($value);
				break;
			case 5:
				$this->setFecfin($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpturempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtur($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodnom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodemp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecini($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecfin($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpturempPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpturempPeer::CODTUR)) $criteria->add(NpturempPeer::CODTUR, $this->codtur);
		if ($this->isColumnModified(NpturempPeer::CODNOM)) $criteria->add(NpturempPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpturempPeer::CODEMP)) $criteria->add(NpturempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpturempPeer::CODCAR)) $criteria->add(NpturempPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpturempPeer::FECINI)) $criteria->add(NpturempPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(NpturempPeer::FECFIN)) $criteria->add(NpturempPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(NpturempPeer::ID)) $criteria->add(NpturempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpturempPeer::DATABASE_NAME);

		$criteria->add(NpturempPeer::ID, $this->id);

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

		$copyObj->setCodtur($this->codtur);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecfin($this->fecfin);


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
			self::$peer = new NpturempPeer();
		}
		return self::$peer;
	}

} 