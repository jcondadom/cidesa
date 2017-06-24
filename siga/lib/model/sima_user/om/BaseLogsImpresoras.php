<?php


abstract class BaseLogsImpresoras extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $factura_id;


	
	protected $numero_factura;


	
	protected $numero_devolucion;


	
	protected $error;


	
	protected $serial_impresora;


	
	protected $fecha;


	
	protected $hora;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getFacturaId()
  {

    return $this->factura_id;

  }
  
  public function getNumeroFactura()
  {

    return trim($this->numero_factura);

  }
  
  public function getNumeroDevolucion()
  {

    return trim($this->numero_devolucion);

  }
  
  public function getError()
  {

    return trim($this->error);

  }
  
  public function getSerialImpresora()
  {

    return trim($this->serial_impresora);

  }
  
  public function getFecha()
  {

    return trim($this->fecha);

  }
  
  public function getHora()
  {

    return trim($this->hora);

  }
  
  public function getCreatedAt($format = 'Y-m-d H:i:s')
  {

    if ($this->created_at === null || $this->created_at === '') {
      return null;
    } elseif (!is_int($this->created_at)) {
            $ts = adodb_strtotime($this->created_at);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
      }
    } else {
      $ts = $this->created_at;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUpdatedAt($format = 'Y-m-d H:i:s')
  {

    if ($this->updated_at === null || $this->updated_at === '') {
      return null;
    } elseif (!is_int($this->updated_at)) {
            $ts = adodb_strtotime($this->updated_at);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
      }
    } else {
      $ts = $this->updated_at;
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
	
	public function setFacturaId($v)
	{

    if ($this->factura_id !== $v) {
        $this->factura_id = $v;
        $this->modifiedColumns[] = LogsImpresorasPeer::FACTURA_ID;
      }
  
	} 
	
	public function setNumeroFactura($v)
	{

    if ($this->numero_factura !== $v) {
        $this->numero_factura = $v;
        $this->modifiedColumns[] = LogsImpresorasPeer::NUMERO_FACTURA;
      }
  
	} 
	
	public function setNumeroDevolucion($v)
	{

    if ($this->numero_devolucion !== $v) {
        $this->numero_devolucion = $v;
        $this->modifiedColumns[] = LogsImpresorasPeer::NUMERO_DEVOLUCION;
      }
  
	} 
	
	public function setError($v)
	{

    if ($this->error !== $v) {
        $this->error = $v;
        $this->modifiedColumns[] = LogsImpresorasPeer::ERROR;
      }
  
	} 
	
	public function setSerialImpresora($v)
	{

    if ($this->serial_impresora !== $v) {
        $this->serial_impresora = $v;
        $this->modifiedColumns[] = LogsImpresorasPeer::SERIAL_IMPRESORA;
      }
  
	} 
	
	public function setFecha($v)
	{

    if ($this->fecha !== $v) {
        $this->fecha = $v;
        $this->modifiedColumns[] = LogsImpresorasPeer::FECHA;
      }
  
	} 
	
	public function setHora($v)
	{

    if ($this->hora !== $v) {
        $this->hora = $v;
        $this->modifiedColumns[] = LogsImpresorasPeer::HORA;
      }
  
	} 
	
	public function setCreatedAt($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->created_at !== $ts) {
      $this->created_at = $ts;
      $this->modifiedColumns[] = LogsImpresorasPeer::CREATED_AT;
    }

	} 
	
	public function setUpdatedAt($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->updated_at !== $ts) {
      $this->updated_at = $ts;
      $this->modifiedColumns[] = LogsImpresorasPeer::UPDATED_AT;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LogsImpresorasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->factura_id = $rs->getInt($startcol + 0);

      $this->numero_factura = $rs->getString($startcol + 1);

      $this->numero_devolucion = $rs->getString($startcol + 2);

      $this->error = $rs->getString($startcol + 3);

      $this->serial_impresora = $rs->getString($startcol + 4);

      $this->fecha = $rs->getString($startcol + 5);

      $this->hora = $rs->getString($startcol + 6);

      $this->created_at = $rs->getTimestamp($startcol + 7, null);

      $this->updated_at = $rs->getTimestamp($startcol + 8, null);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating LogsImpresoras object", $e);
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
			$con = Propel::getConnection(LogsImpresorasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LogsImpresorasPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(LogsImpresorasPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(LogsImpresorasPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LogsImpresorasPeer::DATABASE_NAME);
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
					$pk = LogsImpresorasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LogsImpresorasPeer::doUpdate($this, $con);
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


			if (($retval = LogsImpresorasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LogsImpresorasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFacturaId();
				break;
			case 1:
				return $this->getNumeroFactura();
				break;
			case 2:
				return $this->getNumeroDevolucion();
				break;
			case 3:
				return $this->getError();
				break;
			case 4:
				return $this->getSerialImpresora();
				break;
			case 5:
				return $this->getFecha();
				break;
			case 6:
				return $this->getHora();
				break;
			case 7:
				return $this->getCreatedAt();
				break;
			case 8:
				return $this->getUpdatedAt();
				break;
			case 9:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LogsImpresorasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFacturaId(),
			$keys[1] => $this->getNumeroFactura(),
			$keys[2] => $this->getNumeroDevolucion(),
			$keys[3] => $this->getError(),
			$keys[4] => $this->getSerialImpresora(),
			$keys[5] => $this->getFecha(),
			$keys[6] => $this->getHora(),
			$keys[7] => $this->getCreatedAt(),
			$keys[8] => $this->getUpdatedAt(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LogsImpresorasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFacturaId($value);
				break;
			case 1:
				$this->setNumeroFactura($value);
				break;
			case 2:
				$this->setNumeroDevolucion($value);
				break;
			case 3:
				$this->setError($value);
				break;
			case 4:
				$this->setSerialImpresora($value);
				break;
			case 5:
				$this->setFecha($value);
				break;
			case 6:
				$this->setHora($value);
				break;
			case 7:
				$this->setCreatedAt($value);
				break;
			case 8:
				$this->setUpdatedAt($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LogsImpresorasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFacturaId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumeroFactura($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumeroDevolucion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setError($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSerialImpresora($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecha($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setHora($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LogsImpresorasPeer::DATABASE_NAME);

		if ($this->isColumnModified(LogsImpresorasPeer::FACTURA_ID)) $criteria->add(LogsImpresorasPeer::FACTURA_ID, $this->factura_id);
		if ($this->isColumnModified(LogsImpresorasPeer::NUMERO_FACTURA)) $criteria->add(LogsImpresorasPeer::NUMERO_FACTURA, $this->numero_factura);
		if ($this->isColumnModified(LogsImpresorasPeer::NUMERO_DEVOLUCION)) $criteria->add(LogsImpresorasPeer::NUMERO_DEVOLUCION, $this->numero_devolucion);
		if ($this->isColumnModified(LogsImpresorasPeer::ERROR)) $criteria->add(LogsImpresorasPeer::ERROR, $this->error);
		if ($this->isColumnModified(LogsImpresorasPeer::SERIAL_IMPRESORA)) $criteria->add(LogsImpresorasPeer::SERIAL_IMPRESORA, $this->serial_impresora);
		if ($this->isColumnModified(LogsImpresorasPeer::FECHA)) $criteria->add(LogsImpresorasPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(LogsImpresorasPeer::HORA)) $criteria->add(LogsImpresorasPeer::HORA, $this->hora);
		if ($this->isColumnModified(LogsImpresorasPeer::CREATED_AT)) $criteria->add(LogsImpresorasPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(LogsImpresorasPeer::UPDATED_AT)) $criteria->add(LogsImpresorasPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(LogsImpresorasPeer::ID)) $criteria->add(LogsImpresorasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LogsImpresorasPeer::DATABASE_NAME);

		$criteria->add(LogsImpresorasPeer::ID, $this->id);

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

		$copyObj->setFacturaId($this->factura_id);

		$copyObj->setNumeroFactura($this->numero_factura);

		$copyObj->setNumeroDevolucion($this->numero_devolucion);

		$copyObj->setError($this->error);

		$copyObj->setSerialImpresora($this->serial_impresora);

		$copyObj->setFecha($this->fecha);

		$copyObj->setHora($this->hora);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


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
			self::$peer = new LogsImpresorasPeer();
		}
		return self::$peer;
	}

} 