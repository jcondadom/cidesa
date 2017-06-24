<?php


abstract class BaseFadettar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reftar;


	
	protected $codart;


	
	protected $desart;


	
	protected $nuitem;


	
	protected $fecpla;


	
	protected $fecini;


	
	protected $feccul;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReftar()
  {

    return trim($this->reftar);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getDesart()
  {

    return trim($this->desart);

  }
  
  public function getNuitem()
  {

    return trim($this->nuitem);

  }
  
  public function getFecpla($format = 'Y-m-d')
  {

    if ($this->fecpla === null || $this->fecpla === '') {
      return null;
    } elseif (!is_int($this->fecpla)) {
            $ts = adodb_strtotime($this->fecpla);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpla] as date/time value: " . var_export($this->fecpla, true));
      }
    } else {
      $ts = $this->fecpla;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
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

  
  public function getFeccul($format = 'Y-m-d')
  {

    if ($this->feccul === null || $this->feccul === '') {
      return null;
    } elseif (!is_int($this->feccul)) {
            $ts = adodb_strtotime($this->feccul);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccul] as date/time value: " . var_export($this->feccul, true));
      }
    } else {
      $ts = $this->feccul;
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
	
	public function setReftar($v)
	{

    if ($this->reftar !== $v) {
        $this->reftar = $v;
        $this->modifiedColumns[] = FadettarPeer::REFTAR;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FadettarPeer::CODART;
      }
  
	} 
	
	public function setDesart($v)
	{

    if ($this->desart !== $v) {
        $this->desart = $v;
        $this->modifiedColumns[] = FadettarPeer::DESART;
      }
  
	} 
	
	public function setNuitem($v)
	{

    if ($this->nuitem !== $v) {
        $this->nuitem = $v;
        $this->modifiedColumns[] = FadettarPeer::NUITEM;
      }
  
	} 
	
	public function setFecpla($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpla] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpla !== $ts) {
      $this->fecpla = $ts;
      $this->modifiedColumns[] = FadettarPeer::FECPLA;
    }

	} 
	
	public function setFecini($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecini !== $ts) {
      $this->fecini = $ts;
      $this->modifiedColumns[] = FadettarPeer::FECINI;
    }

	} 
	
	public function setFeccul($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccul] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccul !== $ts) {
      $this->feccul = $ts;
      $this->modifiedColumns[] = FadettarPeer::FECCUL;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FadettarPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reftar = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->desart = $rs->getString($startcol + 2);

      $this->nuitem = $rs->getString($startcol + 3);

      $this->fecpla = $rs->getDate($startcol + 4, null);

      $this->fecini = $rs->getDate($startcol + 5, null);

      $this->feccul = $rs->getDate($startcol + 6, null);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fadettar object", $e);
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
			$con = Propel::getConnection(FadettarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadettarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadettarPeer::DATABASE_NAME);
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
					$pk = FadettarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FadettarPeer::doUpdate($this, $con);
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


			if (($retval = FadettarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadettarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReftar();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getDesart();
				break;
			case 3:
				return $this->getNuitem();
				break;
			case 4:
				return $this->getFecpla();
				break;
			case 5:
				return $this->getFecini();
				break;
			case 6:
				return $this->getFeccul();
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
		$keys = FadettarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReftar(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getDesart(),
			$keys[3] => $this->getNuitem(),
			$keys[4] => $this->getFecpla(),
			$keys[5] => $this->getFecini(),
			$keys[6] => $this->getFeccul(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadettarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReftar($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setDesart($value);
				break;
			case 3:
				$this->setNuitem($value);
				break;
			case 4:
				$this->setFecpla($value);
				break;
			case 5:
				$this->setFecini($value);
				break;
			case 6:
				$this->setFeccul($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadettarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReftar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNuitem($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecpla($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecini($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFeccul($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadettarPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadettarPeer::REFTAR)) $criteria->add(FadettarPeer::REFTAR, $this->reftar);
		if ($this->isColumnModified(FadettarPeer::CODART)) $criteria->add(FadettarPeer::CODART, $this->codart);
		if ($this->isColumnModified(FadettarPeer::DESART)) $criteria->add(FadettarPeer::DESART, $this->desart);
		if ($this->isColumnModified(FadettarPeer::NUITEM)) $criteria->add(FadettarPeer::NUITEM, $this->nuitem);
		if ($this->isColumnModified(FadettarPeer::FECPLA)) $criteria->add(FadettarPeer::FECPLA, $this->fecpla);
		if ($this->isColumnModified(FadettarPeer::FECINI)) $criteria->add(FadettarPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(FadettarPeer::FECCUL)) $criteria->add(FadettarPeer::FECCUL, $this->feccul);
		if ($this->isColumnModified(FadettarPeer::ID)) $criteria->add(FadettarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadettarPeer::DATABASE_NAME);

		$criteria->add(FadettarPeer::ID, $this->id);

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

		$copyObj->setReftar($this->reftar);

		$copyObj->setCodart($this->codart);

		$copyObj->setDesart($this->desart);

		$copyObj->setNuitem($this->nuitem);

		$copyObj->setFecpla($this->fecpla);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFeccul($this->feccul);


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
			self::$peer = new FadettarPeer();
		}
		return self::$peer;
	}

} 