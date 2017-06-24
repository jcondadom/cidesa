<?php


abstract class BaseCideping extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refing;


	
	protected $numdep;


	
	protected $numcue;


	
	protected $tipmov;


	
	protected $fecha;


	
	protected $mondep;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefing()
  {

    return trim($this->refing);

  }
  
  public function getNumdep()
  {

    return trim($this->numdep);

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getTipmov()
  {

    return trim($this->tipmov);

  }
  
  public function getFecha($format = 'Y-m-d')
  {

    if ($this->fecha === null || $this->fecha === '') {
      return null;
    } elseif (!is_int($this->fecha)) {
            $ts = adodb_strtotime($this->fecha);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
      }
    } else {
      $ts = $this->fecha;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMondep($val=false)
  {

    if($val) return number_format($this->mondep,2,',','.');
    else return $this->mondep;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefing($v)
	{

    if ($this->refing !== $v) {
        $this->refing = $v;
        $this->modifiedColumns[] = CidepingPeer::REFING;
      }
  
	} 
	
	public function setNumdep($v)
	{

    if ($this->numdep !== $v) {
        $this->numdep = $v;
        $this->modifiedColumns[] = CidepingPeer::NUMDEP;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = CidepingPeer::NUMCUE;
      }
  
	} 
	
	public function setTipmov($v)
	{

    if ($this->tipmov !== $v) {
        $this->tipmov = $v;
        $this->modifiedColumns[] = CidepingPeer::TIPMOV;
      }
  
	} 
	
	public function setFecha($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha !== $ts) {
      $this->fecha = $ts;
      $this->modifiedColumns[] = CidepingPeer::FECHA;
    }

	} 
	
	public function setMondep($v)
	{

    if ($this->mondep !== $v) {
        $this->mondep = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CidepingPeer::MONDEP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CidepingPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refing = $rs->getString($startcol + 0);

      $this->numdep = $rs->getString($startcol + 1);

      $this->numcue = $rs->getString($startcol + 2);

      $this->tipmov = $rs->getString($startcol + 3);

      $this->fecha = $rs->getDate($startcol + 4, null);

      $this->mondep = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cideping object", $e);
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
			$con = Propel::getConnection(CidepingPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CidepingPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CidepingPeer::DATABASE_NAME);
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
					$pk = CidepingPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CidepingPeer::doUpdate($this, $con);
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


			if (($retval = CidepingPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CidepingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefing();
				break;
			case 1:
				return $this->getNumdep();
				break;
			case 2:
				return $this->getNumcue();
				break;
			case 3:
				return $this->getTipmov();
				break;
			case 4:
				return $this->getFecha();
				break;
			case 5:
				return $this->getMondep();
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
		$keys = CidepingPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefing(),
			$keys[1] => $this->getNumdep(),
			$keys[2] => $this->getNumcue(),
			$keys[3] => $this->getTipmov(),
			$keys[4] => $this->getFecha(),
			$keys[5] => $this->getMondep(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CidepingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefing($value);
				break;
			case 1:
				$this->setNumdep($value);
				break;
			case 2:
				$this->setNumcue($value);
				break;
			case 3:
				$this->setTipmov($value);
				break;
			case 4:
				$this->setFecha($value);
				break;
			case 5:
				$this->setMondep($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CidepingPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefing($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumdep($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumcue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipmov($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecha($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMondep($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CidepingPeer::DATABASE_NAME);

		if ($this->isColumnModified(CidepingPeer::REFING)) $criteria->add(CidepingPeer::REFING, $this->refing);
		if ($this->isColumnModified(CidepingPeer::NUMDEP)) $criteria->add(CidepingPeer::NUMDEP, $this->numdep);
		if ($this->isColumnModified(CidepingPeer::NUMCUE)) $criteria->add(CidepingPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(CidepingPeer::TIPMOV)) $criteria->add(CidepingPeer::TIPMOV, $this->tipmov);
		if ($this->isColumnModified(CidepingPeer::FECHA)) $criteria->add(CidepingPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(CidepingPeer::MONDEP)) $criteria->add(CidepingPeer::MONDEP, $this->mondep);
		if ($this->isColumnModified(CidepingPeer::ID)) $criteria->add(CidepingPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CidepingPeer::DATABASE_NAME);

		$criteria->add(CidepingPeer::ID, $this->id);

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

		$copyObj->setRefing($this->refing);

		$copyObj->setNumdep($this->numdep);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setTipmov($this->tipmov);

		$copyObj->setFecha($this->fecha);

		$copyObj->setMondep($this->mondep);


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
			self::$peer = new CidepingPeer();
		}
		return self::$peer;
	}

} 