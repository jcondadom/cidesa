<?php


abstract class BaseFadonacion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nrodon;


	
	protected $fecdon;


	
	protected $codpro;


	
	protected $desdon;


	
	protected $mondon;


	
	protected $reapor;


	
	protected $status;


	
	protected $id;

	
	protected $aFacliente;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNrodon()
  {

    return trim($this->nrodon);

  }
  
  public function getFecdon($format = 'Y-m-d')
  {

    if ($this->fecdon === null || $this->fecdon === '') {
      return null;
    } elseif (!is_int($this->fecdon)) {
            $ts = adodb_strtotime($this->fecdon);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdon] as date/time value: " . var_export($this->fecdon, true));
      }
    } else {
      $ts = $this->fecdon;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getDesdon()
  {

    return trim($this->desdon);

  }
  
  public function getMondon($val=false)
  {

    if($val) return number_format($this->mondon,2,',','.');
    else return $this->mondon;

  }
  
  public function getReapor()
  {

    return trim($this->reapor);

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNrodon($v)
	{

    if ($this->nrodon !== $v) {
        $this->nrodon = $v;
        $this->modifiedColumns[] = FadonacionPeer::NRODON;
      }
  
	} 
	
	public function setFecdon($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdon] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdon !== $ts) {
      $this->fecdon = $ts;
      $this->modifiedColumns[] = FadonacionPeer::FECDON;
    }

	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = FadonacionPeer::CODPRO;
      }
  
		if ($this->aFacliente !== null && $this->aFacliente->getCodpro() !== $v) {
			$this->aFacliente = null;
		}

	} 
	
	public function setDesdon($v)
	{

    if ($this->desdon !== $v) {
        $this->desdon = $v;
        $this->modifiedColumns[] = FadonacionPeer::DESDON;
      }
  
	} 
	
	public function setMondon($v)
	{

    if ($this->mondon !== $v) {
        $this->mondon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadonacionPeer::MONDON;
      }
  
	} 
	
	public function setReapor($v)
	{

    if ($this->reapor !== $v) {
        $this->reapor = $v;
        $this->modifiedColumns[] = FadonacionPeer::REAPOR;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = FadonacionPeer::STATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FadonacionPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nrodon = $rs->getString($startcol + 0);

      $this->fecdon = $rs->getDate($startcol + 1, null);

      $this->codpro = $rs->getString($startcol + 2);

      $this->desdon = $rs->getString($startcol + 3);

      $this->mondon = $rs->getFloat($startcol + 4);

      $this->reapor = $rs->getString($startcol + 5);

      $this->status = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fadonacion object", $e);
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
			$con = Propel::getConnection(FadonacionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FadonacionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FadonacionPeer::DATABASE_NAME);
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


												
			if ($this->aFacliente !== null) {
				if ($this->aFacliente->isModified()) {
					$affectedRows += $this->aFacliente->save($con);
				}
				$this->setFacliente($this->aFacliente);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FadonacionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FadonacionPeer::doUpdate($this, $con);
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


												
			if ($this->aFacliente !== null) {
				if (!$this->aFacliente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFacliente->getValidationFailures());
				}
			}


			if (($retval = FadonacionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadonacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNrodon();
				break;
			case 1:
				return $this->getFecdon();
				break;
			case 2:
				return $this->getCodpro();
				break;
			case 3:
				return $this->getDesdon();
				break;
			case 4:
				return $this->getMondon();
				break;
			case 5:
				return $this->getReapor();
				break;
			case 6:
				return $this->getStatus();
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
		$keys = FadonacionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNrodon(),
			$keys[1] => $this->getFecdon(),
			$keys[2] => $this->getCodpro(),
			$keys[3] => $this->getDesdon(),
			$keys[4] => $this->getMondon(),
			$keys[5] => $this->getReapor(),
			$keys[6] => $this->getStatus(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FadonacionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNrodon($value);
				break;
			case 1:
				$this->setFecdon($value);
				break;
			case 2:
				$this->setCodpro($value);
				break;
			case 3:
				$this->setDesdon($value);
				break;
			case 4:
				$this->setMondon($value);
				break;
			case 5:
				$this->setReapor($value);
				break;
			case 6:
				$this->setStatus($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FadonacionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNrodon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecdon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesdon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMondon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setReapor($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setStatus($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FadonacionPeer::DATABASE_NAME);

		if ($this->isColumnModified(FadonacionPeer::NRODON)) $criteria->add(FadonacionPeer::NRODON, $this->nrodon);
		if ($this->isColumnModified(FadonacionPeer::FECDON)) $criteria->add(FadonacionPeer::FECDON, $this->fecdon);
		if ($this->isColumnModified(FadonacionPeer::CODPRO)) $criteria->add(FadonacionPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FadonacionPeer::DESDON)) $criteria->add(FadonacionPeer::DESDON, $this->desdon);
		if ($this->isColumnModified(FadonacionPeer::MONDON)) $criteria->add(FadonacionPeer::MONDON, $this->mondon);
		if ($this->isColumnModified(FadonacionPeer::REAPOR)) $criteria->add(FadonacionPeer::REAPOR, $this->reapor);
		if ($this->isColumnModified(FadonacionPeer::STATUS)) $criteria->add(FadonacionPeer::STATUS, $this->status);
		if ($this->isColumnModified(FadonacionPeer::ID)) $criteria->add(FadonacionPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FadonacionPeer::DATABASE_NAME);

		$criteria->add(FadonacionPeer::ID, $this->id);

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

		$copyObj->setNrodon($this->nrodon);

		$copyObj->setFecdon($this->fecdon);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setDesdon($this->desdon);

		$copyObj->setMondon($this->mondon);

		$copyObj->setReapor($this->reapor);

		$copyObj->setStatus($this->status);


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
			self::$peer = new FadonacionPeer();
		}
		return self::$peer;
	}

	
	public function setFacliente($v)
	{


		if ($v === null) {
			$this->setCodpro(NULL);
		} else {
			$this->setCodpro($v->getCodpro());
		}


		$this->aFacliente = $v;
	}


	
	public function getFacliente($con = null)
	{
		if ($this->aFacliente === null && (($this->codpro !== "" && $this->codpro !== null))) {
						include_once 'lib/model/facturacion/om/BaseFaclientePeer.php';

      $c = new Criteria();
      $c->add(FaclientePeer::CODPRO,$this->codpro);
      
			$this->aFacliente = FaclientePeer::doSelectOne($c, $con);

			
		}
		return $this->aFacliente;
	}

} 