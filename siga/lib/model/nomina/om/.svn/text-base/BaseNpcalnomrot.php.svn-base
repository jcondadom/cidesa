<?php


abstract class BaseNpcalnomrot extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtur;


	
	protected $codgru;


	
	protected $codnom;


	
	protected $fecjor;


	
	protected $codjor;


	
	protected $numdia;


	
	protected $diasem;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtur()
  {

    return trim($this->codtur);

  }
  
  public function getCodgru()
  {

    return trim($this->codgru);

  }
  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getFecjor($format = 'Y-m-d')
  {

    if ($this->fecjor === null || $this->fecjor === '') {
      return null;
    } elseif (!is_int($this->fecjor)) {
            $ts = adodb_strtotime($this->fecjor);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecjor] as date/time value: " . var_export($this->fecjor, true));
      }
    } else {
      $ts = $this->fecjor;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodjor()
  {

    return trim($this->codjor);

  }
  
  public function getNumdia()
  {

    return $this->numdia;

  }
  
  public function getDiasem()
  {

    return trim($this->diasem);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtur($v)
	{

    if ($this->codtur !== $v) {
        $this->codtur = $v;
        $this->modifiedColumns[] = NpcalnomrotPeer::CODTUR;
      }
  
	} 
	
	public function setCodgru($v)
	{

    if ($this->codgru !== $v) {
        $this->codgru = $v;
        $this->modifiedColumns[] = NpcalnomrotPeer::CODGRU;
      }
  
	} 
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpcalnomrotPeer::CODNOM;
      }
  
	} 
	
	public function setFecjor($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecjor] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecjor !== $ts) {
      $this->fecjor = $ts;
      $this->modifiedColumns[] = NpcalnomrotPeer::FECJOR;
    }

	} 
	
	public function setCodjor($v)
	{

    if ($this->codjor !== $v) {
        $this->codjor = $v;
        $this->modifiedColumns[] = NpcalnomrotPeer::CODJOR;
      }
  
	} 
	
	public function setNumdia($v)
	{

    if ($this->numdia !== $v) {
        $this->numdia = $v;
        $this->modifiedColumns[] = NpcalnomrotPeer::NUMDIA;
      }
  
	} 
	
	public function setDiasem($v)
	{

    if ($this->diasem !== $v) {
        $this->diasem = $v;
        $this->modifiedColumns[] = NpcalnomrotPeer::DIASEM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpcalnomrotPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtur = $rs->getString($startcol + 0);

      $this->codgru = $rs->getString($startcol + 1);

      $this->codnom = $rs->getString($startcol + 2);

      $this->fecjor = $rs->getDate($startcol + 3, null);

      $this->codjor = $rs->getString($startcol + 4);

      $this->numdia = $rs->getInt($startcol + 5);

      $this->diasem = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npcalnomrot object", $e);
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
			$con = Propel::getConnection(NpcalnomrotPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcalnomrotPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcalnomrotPeer::DATABASE_NAME);
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
					$pk = NpcalnomrotPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpcalnomrotPeer::doUpdate($this, $con);
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


			if (($retval = NpcalnomrotPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcalnomrotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtur();
				break;
			case 1:
				return $this->getCodgru();
				break;
			case 2:
				return $this->getCodnom();
				break;
			case 3:
				return $this->getFecjor();
				break;
			case 4:
				return $this->getCodjor();
				break;
			case 5:
				return $this->getNumdia();
				break;
			case 6:
				return $this->getDiasem();
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
		$keys = NpcalnomrotPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtur(),
			$keys[1] => $this->getCodgru(),
			$keys[2] => $this->getCodnom(),
			$keys[3] => $this->getFecjor(),
			$keys[4] => $this->getCodjor(),
			$keys[5] => $this->getNumdia(),
			$keys[6] => $this->getDiasem(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcalnomrotPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtur($value);
				break;
			case 1:
				$this->setCodgru($value);
				break;
			case 2:
				$this->setCodnom($value);
				break;
			case 3:
				$this->setFecjor($value);
				break;
			case 4:
				$this->setCodjor($value);
				break;
			case 5:
				$this->setNumdia($value);
				break;
			case 6:
				$this->setDiasem($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcalnomrotPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtur($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodgru($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodnom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecjor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodjor($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumdia($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDiasem($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcalnomrotPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcalnomrotPeer::CODTUR)) $criteria->add(NpcalnomrotPeer::CODTUR, $this->codtur);
		if ($this->isColumnModified(NpcalnomrotPeer::CODGRU)) $criteria->add(NpcalnomrotPeer::CODGRU, $this->codgru);
		if ($this->isColumnModified(NpcalnomrotPeer::CODNOM)) $criteria->add(NpcalnomrotPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpcalnomrotPeer::FECJOR)) $criteria->add(NpcalnomrotPeer::FECJOR, $this->fecjor);
		if ($this->isColumnModified(NpcalnomrotPeer::CODJOR)) $criteria->add(NpcalnomrotPeer::CODJOR, $this->codjor);
		if ($this->isColumnModified(NpcalnomrotPeer::NUMDIA)) $criteria->add(NpcalnomrotPeer::NUMDIA, $this->numdia);
		if ($this->isColumnModified(NpcalnomrotPeer::DIASEM)) $criteria->add(NpcalnomrotPeer::DIASEM, $this->diasem);
		if ($this->isColumnModified(NpcalnomrotPeer::ID)) $criteria->add(NpcalnomrotPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcalnomrotPeer::DATABASE_NAME);

		$criteria->add(NpcalnomrotPeer::ID, $this->id);

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

		$copyObj->setCodgru($this->codgru);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setFecjor($this->fecjor);

		$copyObj->setCodjor($this->codjor);

		$copyObj->setNumdia($this->numdia);

		$copyObj->setDiasem($this->diasem);


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
			self::$peer = new NpcalnomrotPeer();
		}
		return self::$peer;
	}

} 