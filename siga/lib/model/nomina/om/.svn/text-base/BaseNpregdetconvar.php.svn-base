<?php


abstract class BaseNpregdetconvar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $codnom;


	
	protected $fecnom;


	
	protected $codemp;


	
	protected $fecreg;


	
	protected $moncon;


	
	protected $cantidad;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getFecnom($format = 'Y-m-d')
  {

    if ($this->fecnom === null || $this->fecnom === '') {
      return null;
    } elseif (!is_int($this->fecnom)) {
            $ts = adodb_strtotime($this->fecnom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnom] as date/time value: " . var_export($this->fecnom, true));
      }
    } else {
      $ts = $this->fecnom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMoncon($val=false)
  {

    if($val) return number_format($this->moncon,2,',','.');
    else return $this->moncon;

  }
  
  public function getCantidad()
  {

    return $this->cantidad;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = NpregdetconvarPeer::CODCON;
      }
  
	} 
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpregdetconvarPeer::CODNOM;
      }
  
	} 
	
	public function setFecnom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnom !== $ts) {
      $this->fecnom = $ts;
      $this->modifiedColumns[] = NpregdetconvarPeer::FECNOM;
    }

	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = NpregdetconvarPeer::CODEMP;
      }
  
	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = NpregdetconvarPeer::FECREG;
    }

	} 
	
	public function setMoncon($v)
	{

    if ($this->moncon !== $v) {
        $this->moncon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpregdetconvarPeer::MONCON;
      }
  
	} 
	
	public function setCantidad($v)
	{

    if ($this->cantidad !== $v) {
        $this->cantidad = $v;
        $this->modifiedColumns[] = NpregdetconvarPeer::CANTIDAD;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpregdetconvarPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcon = $rs->getString($startcol + 0);

      $this->codnom = $rs->getString($startcol + 1);

      $this->fecnom = $rs->getDate($startcol + 2, null);

      $this->codemp = $rs->getString($startcol + 3);

      $this->fecreg = $rs->getDate($startcol + 4, null);

      $this->moncon = $rs->getFloat($startcol + 5);

      $this->cantidad = $rs->getInt($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npregdetconvar object", $e);
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
			$con = Propel::getConnection(NpregdetconvarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpregdetconvarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpregdetconvarPeer::DATABASE_NAME);
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
					$pk = NpregdetconvarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpregdetconvarPeer::doUpdate($this, $con);
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


			if (($retval = NpregdetconvarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpregdetconvarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getCodnom();
				break;
			case 2:
				return $this->getFecnom();
				break;
			case 3:
				return $this->getCodemp();
				break;
			case 4:
				return $this->getFecreg();
				break;
			case 5:
				return $this->getMoncon();
				break;
			case 6:
				return $this->getCantidad();
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
		$keys = NpregdetconvarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getCodnom(),
			$keys[2] => $this->getFecnom(),
			$keys[3] => $this->getCodemp(),
			$keys[4] => $this->getFecreg(),
			$keys[5] => $this->getMoncon(),
			$keys[6] => $this->getCantidad(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpregdetconvarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setCodnom($value);
				break;
			case 2:
				$this->setFecnom($value);
				break;
			case 3:
				$this->setCodemp($value);
				break;
			case 4:
				$this->setFecreg($value);
				break;
			case 5:
				$this->setMoncon($value);
				break;
			case 6:
				$this->setCantidad($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpregdetconvarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodnom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecnom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecreg($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMoncon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCantidad($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpregdetconvarPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpregdetconvarPeer::CODCON)) $criteria->add(NpregdetconvarPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpregdetconvarPeer::CODNOM)) $criteria->add(NpregdetconvarPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpregdetconvarPeer::FECNOM)) $criteria->add(NpregdetconvarPeer::FECNOM, $this->fecnom);
		if ($this->isColumnModified(NpregdetconvarPeer::CODEMP)) $criteria->add(NpregdetconvarPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpregdetconvarPeer::FECREG)) $criteria->add(NpregdetconvarPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(NpregdetconvarPeer::MONCON)) $criteria->add(NpregdetconvarPeer::MONCON, $this->moncon);
		if ($this->isColumnModified(NpregdetconvarPeer::CANTIDAD)) $criteria->add(NpregdetconvarPeer::CANTIDAD, $this->cantidad);
		if ($this->isColumnModified(NpregdetconvarPeer::ID)) $criteria->add(NpregdetconvarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpregdetconvarPeer::DATABASE_NAME);

		$criteria->add(NpregdetconvarPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setFecnom($this->fecnom);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setMoncon($this->moncon);

		$copyObj->setCantidad($this->cantidad);


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
			self::$peer = new NpregdetconvarPeer();
		}
		return self::$peer;
	}

} 