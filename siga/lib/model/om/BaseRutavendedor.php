<?php


abstract class BaseRutavendedor extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $atestados_id;


	
	protected $atmunicipios_id;


	
	protected $atparroquias_id;


	
	protected $facliente_id;


	
	protected $vendedores_id;


	
	protected $fecha_visita;


	
	protected $fecha_despacho;


	
	protected $status;


	
	protected $id;

	
	protected $aVendedores;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAtestadosId()
  {

    return $this->atestados_id;

  }
  
  public function getAtmunicipiosId()
  {

    return $this->atmunicipios_id;

  }
  
  public function getAtparroquiasId()
  {

    return $this->atparroquias_id;

  }
  
  public function getFaclienteId()
  {

    return $this->facliente_id;

  }
  
  public function getVendedoresId()
  {

    return $this->vendedores_id;

  }
  
  public function getFechaVisita($format = 'Y-m-d')
  {

    if ($this->fecha_visita === null || $this->fecha_visita === '') {
      return null;
    } elseif (!is_int($this->fecha_visita)) {
            $ts = adodb_strtotime($this->fecha_visita);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha_visita] as date/time value: " . var_export($this->fecha_visita, true));
      }
    } else {
      $ts = $this->fecha_visita;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechaDespacho($format = 'Y-m-d')
  {

    if ($this->fecha_despacho === null || $this->fecha_despacho === '') {
      return null;
    } elseif (!is_int($this->fecha_despacho)) {
            $ts = adodb_strtotime($this->fecha_despacho);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha_despacho] as date/time value: " . var_export($this->fecha_despacho, true));
      }
    } else {
      $ts = $this->fecha_despacho;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAtestadosId($v)
	{

    if ($this->atestados_id !== $v) {
        $this->atestados_id = $v;
        $this->modifiedColumns[] = RutavendedorPeer::ATESTADOS_ID;
      }
  
	} 
	
	public function setAtmunicipiosId($v)
	{

    if ($this->atmunicipios_id !== $v) {
        $this->atmunicipios_id = $v;
        $this->modifiedColumns[] = RutavendedorPeer::ATMUNICIPIOS_ID;
      }
  
	} 
	
	public function setAtparroquiasId($v)
	{

    if ($this->atparroquias_id !== $v) {
        $this->atparroquias_id = $v;
        $this->modifiedColumns[] = RutavendedorPeer::ATPARROQUIAS_ID;
      }
  
	} 
	
	public function setFaclienteId($v)
	{

    if ($this->facliente_id !== $v) {
        $this->facliente_id = $v;
        $this->modifiedColumns[] = RutavendedorPeer::FACLIENTE_ID;
      }
  
	} 
	
	public function setVendedoresId($v)
	{

    if ($this->vendedores_id !== $v) {
        $this->vendedores_id = $v;
        $this->modifiedColumns[] = RutavendedorPeer::VENDEDORES_ID;
      }
  
		if ($this->aVendedores !== null && $this->aVendedores->getId() !== $v) {
			$this->aVendedores = null;
		}

	} 
	
	public function setFechaVisita($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha_visita] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha_visita !== $ts) {
      $this->fecha_visita = $ts;
      $this->modifiedColumns[] = RutavendedorPeer::FECHA_VISITA;
    }

	} 
	
	public function setFechaDespacho($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha_despacho] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha_despacho !== $ts) {
      $this->fecha_despacho = $ts;
      $this->modifiedColumns[] = RutavendedorPeer::FECHA_DESPACHO;
    }

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = RutavendedorPeer::STATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RutavendedorPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->atestados_id = $rs->getInt($startcol + 0);

      $this->atmunicipios_id = $rs->getInt($startcol + 1);

      $this->atparroquias_id = $rs->getInt($startcol + 2);

      $this->facliente_id = $rs->getInt($startcol + 3);

      $this->vendedores_id = $rs->getInt($startcol + 4);

      $this->fecha_visita = $rs->getDate($startcol + 5, null);

      $this->fecha_despacho = $rs->getDate($startcol + 6, null);

      $this->status = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Rutavendedor object", $e);
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
			$con = Propel::getConnection(RutavendedorPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RutavendedorPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RutavendedorPeer::DATABASE_NAME);
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


												
			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}

			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}

			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}

			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}

			if ($this->aVendedores !== null) {
				if ($this->aVendedores->isModified()) {
					$affectedRows += $this->aVendedores->save($con);
				}
				$this->setVendedores($this->aVendedores);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RutavendedorPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RutavendedorPeer::doUpdate($this, $con);
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


												
			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}

			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}

			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}

			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}

			if ($this->aVendedores !== null) {
				if (!$this->aVendedores->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aVendedores->getValidationFailures());
				}
			}


			if (($retval = RutavendedorPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RutavendedorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAtestadosId();
				break;
			case 1:
				return $this->getAtmunicipiosId();
				break;
			case 2:
				return $this->getAtparroquiasId();
				break;
			case 3:
				return $this->getFaclienteId();
				break;
			case 4:
				return $this->getVendedoresId();
				break;
			case 5:
				return $this->getFechaVisita();
				break;
			case 6:
				return $this->getFechaDespacho();
				break;
			case 7:
				return $this->getStatus();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RutavendedorPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAtestadosId(),
			$keys[1] => $this->getAtmunicipiosId(),
			$keys[2] => $this->getAtparroquiasId(),
			$keys[3] => $this->getFaclienteId(),
			$keys[4] => $this->getVendedoresId(),
			$keys[5] => $this->getFechaVisita(),
			$keys[6] => $this->getFechaDespacho(),
			$keys[7] => $this->getStatus(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RutavendedorPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAtestadosId($value);
				break;
			case 1:
				$this->setAtmunicipiosId($value);
				break;
			case 2:
				$this->setAtparroquiasId($value);
				break;
			case 3:
				$this->setFaclienteId($value);
				break;
			case 4:
				$this->setVendedoresId($value);
				break;
			case 5:
				$this->setFechaVisita($value);
				break;
			case 6:
				$this->setFechaDespacho($value);
				break;
			case 7:
				$this->setStatus($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RutavendedorPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAtestadosId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAtmunicipiosId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAtparroquiasId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFaclienteId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setVendedoresId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFechaVisita($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFechaDespacho($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setStatus($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RutavendedorPeer::DATABASE_NAME);

		if ($this->isColumnModified(RutavendedorPeer::ATESTADOS_ID)) $criteria->add(RutavendedorPeer::ATESTADOS_ID, $this->atestados_id);
		if ($this->isColumnModified(RutavendedorPeer::ATMUNICIPIOS_ID)) $criteria->add(RutavendedorPeer::ATMUNICIPIOS_ID, $this->atmunicipios_id);
		if ($this->isColumnModified(RutavendedorPeer::ATPARROQUIAS_ID)) $criteria->add(RutavendedorPeer::ATPARROQUIAS_ID, $this->atparroquias_id);
		if ($this->isColumnModified(RutavendedorPeer::FACLIENTE_ID)) $criteria->add(RutavendedorPeer::FACLIENTE_ID, $this->facliente_id);
		if ($this->isColumnModified(RutavendedorPeer::VENDEDORES_ID)) $criteria->add(RutavendedorPeer::VENDEDORES_ID, $this->vendedores_id);
		if ($this->isColumnModified(RutavendedorPeer::FECHA_VISITA)) $criteria->add(RutavendedorPeer::FECHA_VISITA, $this->fecha_visita);
		if ($this->isColumnModified(RutavendedorPeer::FECHA_DESPACHO)) $criteria->add(RutavendedorPeer::FECHA_DESPACHO, $this->fecha_despacho);
		if ($this->isColumnModified(RutavendedorPeer::STATUS)) $criteria->add(RutavendedorPeer::STATUS, $this->status);
		if ($this->isColumnModified(RutavendedorPeer::ID)) $criteria->add(RutavendedorPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RutavendedorPeer::DATABASE_NAME);

		$criteria->add(RutavendedorPeer::ID, $this->id);

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

		$copyObj->setAtestadosId($this->atestados_id);

		$copyObj->setAtmunicipiosId($this->atmunicipios_id);

		$copyObj->setAtparroquiasId($this->atparroquias_id);

		$copyObj->setFaclienteId($this->facliente_id);

		$copyObj->setVendedoresId($this->vendedores_id);

		$copyObj->setFechaVisita($this->fecha_visita);

		$copyObj->setFechaDespacho($this->fecha_despacho);

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
			self::$peer = new RutavendedorPeer();
		}
		return self::$peer;
	}

	
	public function setVendedores($v)
	{


		if ($v === null) {
			$this->setVendedoresId(NULL);
		} else {
			$this->setVendedoresId($v->getId());
		}


		$this->aVendedores = $v;
	}


	
	public function getVendedores($con = null)
	{
		if ($this->aVendedores === null && ($this->vendedores_id !== null)) {
						include_once 'lib/model/om/BaseVendedoresPeer.php';

      $c = new Criteria();
      $c->add(VendedoresPeer::ID,$this->vendedores_id);
      
			$this->aVendedores = VendedoresPeer::doSelectOne($c, $con);

			
		}
		return $this->aVendedores;
	}

} 