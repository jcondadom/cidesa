<?php


abstract class BaseFaartpvp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codart;


	
	protected $codbar;


	
	protected $pvpart;


	
	protected $despvp;


	
	protected $fecdes;


	
	protected $fechas;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodbar()
  {

    return trim($this->codbar);

  }
  
  public function getPvpart($val=false)
  {

    if($val) return number_format($this->pvpart,2,',','.');
    else return $this->pvpart;

  }
  
  public function getDespvp()
  {

    return trim($this->despvp);

  }
  
  public function getFecdes($format = 'Y-m-d')
  {

    if ($this->fecdes === null || $this->fecdes === '') {
      return null;
    } elseif (!is_int($this->fecdes)) {
            $ts = adodb_strtotime($this->fecdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdes] as date/time value: " . var_export($this->fecdes, true));
      }
    } else {
      $ts = $this->fecdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechas($format = 'Y-m-d')
  {

    if ($this->fechas === null || $this->fechas === '') {
      return null;
    } elseif (!is_int($this->fechas)) {
            $ts = adodb_strtotime($this->fechas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechas] as date/time value: " . var_export($this->fechas, true));
      }
    } else {
      $ts = $this->fechas;
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
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FaartpvpPeer::CODART;
      }
  
	} 
	
	public function setCodbar($v)
	{

    if ($this->codbar !== $v) {
        $this->codbar = $v;
        $this->modifiedColumns[] = FaartpvpPeer::CODBAR;
      }
  
	} 
	
	public function setPvpart($v)
	{

    if ($this->pvpart !== $v) {
        $this->pvpart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartpvpPeer::PVPART;
      }
  
	} 
	
	public function setDespvp($v)
	{

    if ($this->despvp !== $v) {
        $this->despvp = $v;
        $this->modifiedColumns[] = FaartpvpPeer::DESPVP;
      }
  
	} 
	
	public function setFecdes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdes !== $ts) {
      $this->fecdes = $ts;
      $this->modifiedColumns[] = FaartpvpPeer::FECDES;
    }

	} 
	
	public function setFechas($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechas !== $ts) {
      $this->fechas = $ts;
      $this->modifiedColumns[] = FaartpvpPeer::FECHAS;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaartpvpPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codart = $rs->getString($startcol + 0);

      $this->codbar = $rs->getString($startcol + 1);

      $this->pvpart = $rs->getFloat($startcol + 2);

      $this->despvp = $rs->getString($startcol + 3);

      $this->fecdes = $rs->getDate($startcol + 4, null);

      $this->fechas = $rs->getDate($startcol + 5, null);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faartpvp object", $e);
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
			$con = Propel::getConnection(FaartpvpPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaartpvpPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaartpvpPeer::DATABASE_NAME);
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
					$pk = FaartpvpPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaartpvpPeer::doUpdate($this, $con);
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


			if (($retval = FaartpvpPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartpvpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodart();
				break;
			case 1:
				return $this->getCodbar();
				break;
			case 2:
				return $this->getPvpart();
				break;
			case 3:
				return $this->getDespvp();
				break;
			case 4:
				return $this->getFecdes();
				break;
			case 5:
				return $this->getFechas();
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
		$keys = FaartpvpPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodart(),
			$keys[1] => $this->getCodbar(),
			$keys[2] => $this->getPvpart(),
			$keys[3] => $this->getDespvp(),
			$keys[4] => $this->getFecdes(),
			$keys[5] => $this->getFechas(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartpvpPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodart($value);
				break;
			case 1:
				$this->setCodbar($value);
				break;
			case 2:
				$this->setPvpart($value);
				break;
			case 3:
				$this->setDespvp($value);
				break;
			case 4:
				$this->setFecdes($value);
				break;
			case 5:
				$this->setFechas($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaartpvpPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodbar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPvpart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDespvp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecdes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFechas($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaartpvpPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaartpvpPeer::CODART)) $criteria->add(FaartpvpPeer::CODART, $this->codart);
		if ($this->isColumnModified(FaartpvpPeer::CODBAR)) $criteria->add(FaartpvpPeer::CODBAR, $this->codbar);
		if ($this->isColumnModified(FaartpvpPeer::PVPART)) $criteria->add(FaartpvpPeer::PVPART, $this->pvpart);
		if ($this->isColumnModified(FaartpvpPeer::DESPVP)) $criteria->add(FaartpvpPeer::DESPVP, $this->despvp);
		if ($this->isColumnModified(FaartpvpPeer::FECDES)) $criteria->add(FaartpvpPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(FaartpvpPeer::FECHAS)) $criteria->add(FaartpvpPeer::FECHAS, $this->fechas);
		if ($this->isColumnModified(FaartpvpPeer::ID)) $criteria->add(FaartpvpPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaartpvpPeer::DATABASE_NAME);

		$criteria->add(FaartpvpPeer::ID, $this->id);

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

		$copyObj->setCodart($this->codart);

		$copyObj->setCodbar($this->codbar);

		$copyObj->setPvpart($this->pvpart);

		$copyObj->setDespvp($this->despvp);

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setFechas($this->fechas);


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
			self::$peer = new FaartpvpPeer();
		}
		return self::$peer;
	}

} 