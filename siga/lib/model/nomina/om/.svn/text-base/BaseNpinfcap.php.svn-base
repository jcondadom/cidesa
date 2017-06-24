<?php


abstract class BaseNpinfcap extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $entdid;


	
	protected $nomact;


	
	protected $fecact;


	
	protected $nrohor;


	
	protected $nivcur;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getEntdid()
  {

    return trim($this->entdid);

  }
  
  public function getNomact()
  {

    return trim($this->nomact);

  }
  
  public function getFecact($format = 'Y-m-d')
  {

    if ($this->fecact === null || $this->fecact === '') {
      return null;
    } elseif (!is_int($this->fecact)) {
            $ts = adodb_strtotime($this->fecact);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecact] as date/time value: " . var_export($this->fecact, true));
      }
    } else {
      $ts = $this->fecact;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNrohor()
  {

    return $this->nrohor;

  }
  
  public function getNivcur()
  {

    return trim($this->nivcur);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpinfcapPeer::CODEMP;
      }
  
	} 
	
	public function setEntdid($v)
	{

    if ($this->entdid !== $v) {
        $this->entdid = $v;
        $this->modifiedColumns[] = NpinfcapPeer::ENTDID;
      }
  
	} 
	
	public function setNomact($v)
	{

    if ($this->nomact !== $v) {
        $this->nomact = $v;
        $this->modifiedColumns[] = NpinfcapPeer::NOMACT;
      }
  
	} 
	
	public function setFecact($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecact] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecact !== $ts) {
      $this->fecact = $ts;
      $this->modifiedColumns[] = NpinfcapPeer::FECACT;
    }

	} 
	
	public function setNrohor($v)
	{

    if ($this->nrohor !== $v) {
        $this->nrohor = $v;
        $this->modifiedColumns[] = NpinfcapPeer::NROHOR;
      }
  
	} 
	
	public function setNivcur($v)
	{

    if ($this->nivcur !== $v) {
        $this->nivcur = $v;
        $this->modifiedColumns[] = NpinfcapPeer::NIVCUR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpinfcapPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->entdid = $rs->getString($startcol + 1);

      $this->nomact = $rs->getString($startcol + 2);

      $this->fecact = $rs->getDate($startcol + 3, null);

      $this->nrohor = $rs->getInt($startcol + 4);

      $this->nivcur = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npinfcap object", $e);
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
			$con = Propel::getConnection(NpinfcapPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpinfcapPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpinfcapPeer::DATABASE_NAME);
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
					$pk = NpinfcapPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpinfcapPeer::doUpdate($this, $con);
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


			if (($retval = NpinfcapPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfcapPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getEntdid();
				break;
			case 2:
				return $this->getNomact();
				break;
			case 3:
				return $this->getFecact();
				break;
			case 4:
				return $this->getNrohor();
				break;
			case 5:
				return $this->getNivcur();
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
		$keys = NpinfcapPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getEntdid(),
			$keys[2] => $this->getNomact(),
			$keys[3] => $this->getFecact(),
			$keys[4] => $this->getNrohor(),
			$keys[5] => $this->getNivcur(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpinfcapPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setEntdid($value);
				break;
			case 2:
				$this->setNomact($value);
				break;
			case 3:
				$this->setFecact($value);
				break;
			case 4:
				$this->setNrohor($value);
				break;
			case 5:
				$this->setNivcur($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpinfcapPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEntdid($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecact($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNrohor($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNivcur($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpinfcapPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpinfcapPeer::CODEMP)) $criteria->add(NpinfcapPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpinfcapPeer::ENTDID)) $criteria->add(NpinfcapPeer::ENTDID, $this->entdid);
		if ($this->isColumnModified(NpinfcapPeer::NOMACT)) $criteria->add(NpinfcapPeer::NOMACT, $this->nomact);
		if ($this->isColumnModified(NpinfcapPeer::FECACT)) $criteria->add(NpinfcapPeer::FECACT, $this->fecact);
		if ($this->isColumnModified(NpinfcapPeer::NROHOR)) $criteria->add(NpinfcapPeer::NROHOR, $this->nrohor);
		if ($this->isColumnModified(NpinfcapPeer::NIVCUR)) $criteria->add(NpinfcapPeer::NIVCUR, $this->nivcur);
		if ($this->isColumnModified(NpinfcapPeer::ID)) $criteria->add(NpinfcapPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpinfcapPeer::DATABASE_NAME);

		$criteria->add(NpinfcapPeer::ID, $this->id);

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

		$copyObj->setEntdid($this->entdid);

		$copyObj->setNomact($this->nomact);

		$copyObj->setFecact($this->fecact);

		$copyObj->setNrohor($this->nrohor);

		$copyObj->setNivcur($this->nivcur);


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
			self::$peer = new NpinfcapPeer();
		}
		return self::$peer;
	}

} 