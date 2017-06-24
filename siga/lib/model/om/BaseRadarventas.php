<?php


abstract class BaseRadarventas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ruta_id;


	
	protected $facliente_id;


	
	protected $vendedores_id;


	
	protected $fafactur_id;


	
	protected $fecha;


	
	protected $status;


	
	protected $id;

	
	protected $aRuta;

	
	protected $aVendedores;

	
	protected $collDetradarventass;

	
	protected $lastDetradarventasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRutaId()
  {

    return $this->ruta_id;

  }
  
  public function getFaclienteId()
  {

    return $this->facliente_id;

  }
  
  public function getVendedoresId()
  {

    return $this->vendedores_id;

  }
  
  public function getFafacturId()
  {

    return $this->fafactur_id;

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

  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRutaId($v)
	{

    if ($this->ruta_id !== $v) {
        $this->ruta_id = $v;
        $this->modifiedColumns[] = RadarventasPeer::RUTA_ID;
      }
  
		if ($this->aRuta !== null && $this->aRuta->getId() !== $v) {
			$this->aRuta = null;
		}

	} 
	
	public function setFaclienteId($v)
	{

    if ($this->facliente_id !== $v) {
        $this->facliente_id = $v;
        $this->modifiedColumns[] = RadarventasPeer::FACLIENTE_ID;
      }
  
	} 
	
	public function setVendedoresId($v)
	{

    if ($this->vendedores_id !== $v) {
        $this->vendedores_id = $v;
        $this->modifiedColumns[] = RadarventasPeer::VENDEDORES_ID;
      }
  
		if ($this->aVendedores !== null && $this->aVendedores->getId() !== $v) {
			$this->aVendedores = null;
		}

	} 
	
	public function setFafacturId($v)
	{

    if ($this->fafactur_id !== $v) {
        $this->fafactur_id = $v;
        $this->modifiedColumns[] = RadarventasPeer::FAFACTUR_ID;
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
      $this->modifiedColumns[] = RadarventasPeer::FECHA;
    }

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = RadarventasPeer::STATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RadarventasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->ruta_id = $rs->getInt($startcol + 0);

      $this->facliente_id = $rs->getInt($startcol + 1);

      $this->vendedores_id = $rs->getInt($startcol + 2);

      $this->fafactur_id = $rs->getInt($startcol + 3);

      $this->fecha = $rs->getDate($startcol + 4, null);

      $this->status = $rs->getString($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Radarventas object", $e);
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
			$con = Propel::getConnection(RadarventasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RadarventasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RadarventasPeer::DATABASE_NAME);
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


												
			if ($this->aRuta !== null) {
				if ($this->aRuta->isModified()) {
					$affectedRows += $this->aRuta->save($con);
				}
				$this->setRuta($this->aRuta);
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

			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RadarventasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RadarventasPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collDetradarventass !== null) {
				foreach($this->collDetradarventass as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aRuta !== null) {
				if (!$this->aRuta->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRuta->getValidationFailures());
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

			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}


			if (($retval = RadarventasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDetradarventass !== null) {
					foreach($this->collDetradarventass as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RadarventasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRutaId();
				break;
			case 1:
				return $this->getFaclienteId();
				break;
			case 2:
				return $this->getVendedoresId();
				break;
			case 3:
				return $this->getFafacturId();
				break;
			case 4:
				return $this->getFecha();
				break;
			case 5:
				return $this->getStatus();
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
		$keys = RadarventasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRutaId(),
			$keys[1] => $this->getFaclienteId(),
			$keys[2] => $this->getVendedoresId(),
			$keys[3] => $this->getFafacturId(),
			$keys[4] => $this->getFecha(),
			$keys[5] => $this->getStatus(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RadarventasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRutaId($value);
				break;
			case 1:
				$this->setFaclienteId($value);
				break;
			case 2:
				$this->setVendedoresId($value);
				break;
			case 3:
				$this->setFafacturId($value);
				break;
			case 4:
				$this->setFecha($value);
				break;
			case 5:
				$this->setStatus($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RadarventasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRutaId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFaclienteId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setVendedoresId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFafacturId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecha($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RadarventasPeer::DATABASE_NAME);

		if ($this->isColumnModified(RadarventasPeer::RUTA_ID)) $criteria->add(RadarventasPeer::RUTA_ID, $this->ruta_id);
		if ($this->isColumnModified(RadarventasPeer::FACLIENTE_ID)) $criteria->add(RadarventasPeer::FACLIENTE_ID, $this->facliente_id);
		if ($this->isColumnModified(RadarventasPeer::VENDEDORES_ID)) $criteria->add(RadarventasPeer::VENDEDORES_ID, $this->vendedores_id);
		if ($this->isColumnModified(RadarventasPeer::FAFACTUR_ID)) $criteria->add(RadarventasPeer::FAFACTUR_ID, $this->fafactur_id);
		if ($this->isColumnModified(RadarventasPeer::FECHA)) $criteria->add(RadarventasPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(RadarventasPeer::STATUS)) $criteria->add(RadarventasPeer::STATUS, $this->status);
		if ($this->isColumnModified(RadarventasPeer::ID)) $criteria->add(RadarventasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RadarventasPeer::DATABASE_NAME);

		$criteria->add(RadarventasPeer::ID, $this->id);

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

		$copyObj->setRutaId($this->ruta_id);

		$copyObj->setFaclienteId($this->facliente_id);

		$copyObj->setVendedoresId($this->vendedores_id);

		$copyObj->setFafacturId($this->fafactur_id);

		$copyObj->setFecha($this->fecha);

		$copyObj->setStatus($this->status);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getDetradarventass() as $relObj) {
				$copyObj->addDetradarventas($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new RadarventasPeer();
		}
		return self::$peer;
	}

	
	public function setRuta($v)
	{


		if ($v === null) {
			$this->setRutaId(NULL);
		} else {
			$this->setRutaId($v->getId());
		}


		$this->aRuta = $v;
	}


	
	public function getRuta($con = null)
	{
		if ($this->aRuta === null && ($this->ruta_id !== null)) {
						include_once 'lib/model/om/BaseRutaPeer.php';

      $c = new Criteria();
      $c->add(RutaPeer::ID,$this->ruta_id);
      
			$this->aRuta = RutaPeer::doSelectOne($c, $con);

			
		}
		return $this->aRuta;
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

	
	public function initDetradarventass()
	{
		if ($this->collDetradarventass === null) {
			$this->collDetradarventass = array();
		}
	}

	
	public function getDetradarventass($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDetradarventasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetradarventass === null) {
			if ($this->isNew()) {
			   $this->collDetradarventass = array();
			} else {

				$criteria->add(DetradarventasPeer::RADARVENTAS_ID, $this->getId());

				DetradarventasPeer::addSelectColumns($criteria);
				$this->collDetradarventass = DetradarventasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetradarventasPeer::RADARVENTAS_ID, $this->getId());

				DetradarventasPeer::addSelectColumns($criteria);
				if (!isset($this->lastDetradarventasCriteria) || !$this->lastDetradarventasCriteria->equals($criteria)) {
					$this->collDetradarventass = DetradarventasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDetradarventasCriteria = $criteria;
		return $this->collDetradarventass;
	}

	
	public function countDetradarventass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDetradarventasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DetradarventasPeer::RADARVENTAS_ID, $this->getId());

		return DetradarventasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDetradarventas(Detradarventas $l)
	{
		$this->collDetradarventass[] = $l;
		$l->setRadarventas($this);
	}

} 