<?php


abstract class BaseRuta extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $descripcion;


	
	protected $atestados_id;


	
	protected $atmunicipios_id;


	
	protected $atparroquias_id;


	
	protected $zona_limi_desde;


	
	protected $zona_limi_hasta;


	
	protected $dia_visita;


	
	protected $dia_despacho;


	
	protected $status;


	
	protected $id;

	
	protected $collRadarventass;

	
	protected $lastRadarventasCriteria = null;

	
	protected $collRutaclientes;

	
	protected $lastRutaclienteCriteria = null;

	
	protected $collRutavendedoress;

	
	protected $lastRutavendedoresCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDescripcion()
  {

    return trim($this->descripcion);

  }
  
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
  
  public function getZonaLimiDesde()
  {

    return trim($this->zona_limi_desde);

  }
  
  public function getZonaLimiHasta()
  {

    return trim($this->zona_limi_hasta);

  }
  
  public function getDiaVisita()
  {

    return $this->dia_visita;

  }
  
  public function getDiaDespacho()
  {

    return $this->dia_despacho;

  }
  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDescripcion($v)
	{

    if ($this->descripcion !== $v) {
        $this->descripcion = $v;
        $this->modifiedColumns[] = RutaPeer::DESCRIPCION;
      }
  
	} 
	
	public function setAtestadosId($v)
	{

    if ($this->atestados_id !== $v) {
        $this->atestados_id = $v;
        $this->modifiedColumns[] = RutaPeer::ATESTADOS_ID;
      }
  
	} 
	
	public function setAtmunicipiosId($v)
	{

    if ($this->atmunicipios_id !== $v) {
        $this->atmunicipios_id = $v;
        $this->modifiedColumns[] = RutaPeer::ATMUNICIPIOS_ID;
      }
  
	} 
	
	public function setAtparroquiasId($v)
	{

    if ($this->atparroquias_id !== $v) {
        $this->atparroquias_id = $v;
        $this->modifiedColumns[] = RutaPeer::ATPARROQUIAS_ID;
      }
  
	} 
	
	public function setZonaLimiDesde($v)
	{

    if ($this->zona_limi_desde !== $v) {
        $this->zona_limi_desde = $v;
        $this->modifiedColumns[] = RutaPeer::ZONA_LIMI_DESDE;
      }
  
	} 
	
	public function setZonaLimiHasta($v)
	{

    if ($this->zona_limi_hasta !== $v) {
        $this->zona_limi_hasta = $v;
        $this->modifiedColumns[] = RutaPeer::ZONA_LIMI_HASTA;
      }
  
	} 
	
	public function setDiaVisita($v)
	{

    if ($this->dia_visita !== $v) {
        $this->dia_visita = $v;
        $this->modifiedColumns[] = RutaPeer::DIA_VISITA;
      }
  
	} 
	
	public function setDiaDespacho($v)
	{

    if ($this->dia_despacho !== $v) {
        $this->dia_despacho = $v;
        $this->modifiedColumns[] = RutaPeer::DIA_DESPACHO;
      }
  
	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = RutaPeer::STATUS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = RutaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->descripcion = $rs->getString($startcol + 0);

      $this->atestados_id = $rs->getInt($startcol + 1);

      $this->atmunicipios_id = $rs->getInt($startcol + 2);

      $this->atparroquias_id = $rs->getInt($startcol + 3);

      $this->zona_limi_desde = $rs->getString($startcol + 4);

      $this->zona_limi_hasta = $rs->getString($startcol + 5);

      $this->dia_visita = $rs->getInt($startcol + 6);

      $this->dia_despacho = $rs->getInt($startcol + 7);

      $this->status = $rs->getString($startcol + 8);

      $this->id = $rs->getInt($startcol + 9);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 10; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ruta object", $e);
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
			$con = Propel::getConnection(RutaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RutaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RutaPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RutaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RutaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collRadarventass !== null) {
				foreach($this->collRadarventass as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRutaclientes !== null) {
				foreach($this->collRutaclientes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRutavendedoress !== null) {
				foreach($this->collRutavendedoress as $referrerFK) {
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


			if (($retval = RutaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRadarventass !== null) {
					foreach($this->collRadarventass as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRutaclientes !== null) {
					foreach($this->collRutaclientes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRutavendedoress !== null) {
					foreach($this->collRutavendedoress as $referrerFK) {
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
		$pos = RutaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDescripcion();
				break;
			case 1:
				return $this->getAtestadosId();
				break;
			case 2:
				return $this->getAtmunicipiosId();
				break;
			case 3:
				return $this->getAtparroquiasId();
				break;
			case 4:
				return $this->getZonaLimiDesde();
				break;
			case 5:
				return $this->getZonaLimiHasta();
				break;
			case 6:
				return $this->getDiaVisita();
				break;
			case 7:
				return $this->getDiaDespacho();
				break;
			case 8:
				return $this->getStatus();
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
		$keys = RutaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDescripcion(),
			$keys[1] => $this->getAtestadosId(),
			$keys[2] => $this->getAtmunicipiosId(),
			$keys[3] => $this->getAtparroquiasId(),
			$keys[4] => $this->getZonaLimiDesde(),
			$keys[5] => $this->getZonaLimiHasta(),
			$keys[6] => $this->getDiaVisita(),
			$keys[7] => $this->getDiaDespacho(),
			$keys[8] => $this->getStatus(),
			$keys[9] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RutaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDescripcion($value);
				break;
			case 1:
				$this->setAtestadosId($value);
				break;
			case 2:
				$this->setAtmunicipiosId($value);
				break;
			case 3:
				$this->setAtparroquiasId($value);
				break;
			case 4:
				$this->setZonaLimiDesde($value);
				break;
			case 5:
				$this->setZonaLimiHasta($value);
				break;
			case 6:
				$this->setDiaVisita($value);
				break;
			case 7:
				$this->setDiaDespacho($value);
				break;
			case 8:
				$this->setStatus($value);
				break;
			case 9:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RutaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDescripcion($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAtestadosId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAtmunicipiosId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAtparroquiasId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setZonaLimiDesde($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setZonaLimiHasta($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDiaVisita($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDiaDespacho($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setStatus($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setId($arr[$keys[9]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RutaPeer::DATABASE_NAME);

		if ($this->isColumnModified(RutaPeer::DESCRIPCION)) $criteria->add(RutaPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(RutaPeer::ATESTADOS_ID)) $criteria->add(RutaPeer::ATESTADOS_ID, $this->atestados_id);
		if ($this->isColumnModified(RutaPeer::ATMUNICIPIOS_ID)) $criteria->add(RutaPeer::ATMUNICIPIOS_ID, $this->atmunicipios_id);
		if ($this->isColumnModified(RutaPeer::ATPARROQUIAS_ID)) $criteria->add(RutaPeer::ATPARROQUIAS_ID, $this->atparroquias_id);
		if ($this->isColumnModified(RutaPeer::ZONA_LIMI_DESDE)) $criteria->add(RutaPeer::ZONA_LIMI_DESDE, $this->zona_limi_desde);
		if ($this->isColumnModified(RutaPeer::ZONA_LIMI_HASTA)) $criteria->add(RutaPeer::ZONA_LIMI_HASTA, $this->zona_limi_hasta);
		if ($this->isColumnModified(RutaPeer::DIA_VISITA)) $criteria->add(RutaPeer::DIA_VISITA, $this->dia_visita);
		if ($this->isColumnModified(RutaPeer::DIA_DESPACHO)) $criteria->add(RutaPeer::DIA_DESPACHO, $this->dia_despacho);
		if ($this->isColumnModified(RutaPeer::STATUS)) $criteria->add(RutaPeer::STATUS, $this->status);
		if ($this->isColumnModified(RutaPeer::ID)) $criteria->add(RutaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RutaPeer::DATABASE_NAME);

		$criteria->add(RutaPeer::ID, $this->id);

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

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setAtestadosId($this->atestados_id);

		$copyObj->setAtmunicipiosId($this->atmunicipios_id);

		$copyObj->setAtparroquiasId($this->atparroquias_id);

		$copyObj->setZonaLimiDesde($this->zona_limi_desde);

		$copyObj->setZonaLimiHasta($this->zona_limi_hasta);

		$copyObj->setDiaVisita($this->dia_visita);

		$copyObj->setDiaDespacho($this->dia_despacho);

		$copyObj->setStatus($this->status);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getRadarventass() as $relObj) {
				$copyObj->addRadarventas($relObj->copy($deepCopy));
			}

			foreach($this->getRutaclientes() as $relObj) {
				$copyObj->addRutacliente($relObj->copy($deepCopy));
			}

			foreach($this->getRutavendedoress() as $relObj) {
				$copyObj->addRutavendedores($relObj->copy($deepCopy));
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
			self::$peer = new RutaPeer();
		}
		return self::$peer;
	}

	
	public function initRadarventass()
	{
		if ($this->collRadarventass === null) {
			$this->collRadarventass = array();
		}
	}

	
	public function getRadarventass($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRadarventasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRadarventass === null) {
			if ($this->isNew()) {
			   $this->collRadarventass = array();
			} else {

				$criteria->add(RadarventasPeer::RUTA_ID, $this->getId());

				RadarventasPeer::addSelectColumns($criteria);
				$this->collRadarventass = RadarventasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RadarventasPeer::RUTA_ID, $this->getId());

				RadarventasPeer::addSelectColumns($criteria);
				if (!isset($this->lastRadarventasCriteria) || !$this->lastRadarventasCriteria->equals($criteria)) {
					$this->collRadarventass = RadarventasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRadarventasCriteria = $criteria;
		return $this->collRadarventass;
	}

	
	public function countRadarventass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRadarventasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RadarventasPeer::RUTA_ID, $this->getId());

		return RadarventasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRadarventas(Radarventas $l)
	{
		$this->collRadarventass[] = $l;
		$l->setRuta($this);
	}

	
	public function initRutaclientes()
	{
		if ($this->collRutaclientes === null) {
			$this->collRutaclientes = array();
		}
	}

	
	public function getRutaclientes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRutaclientePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRutaclientes === null) {
			if ($this->isNew()) {
			   $this->collRutaclientes = array();
			} else {

				$criteria->add(RutaclientePeer::RUTA_ID, $this->getId());

				RutaclientePeer::addSelectColumns($criteria);
				$this->collRutaclientes = RutaclientePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RutaclientePeer::RUTA_ID, $this->getId());

				RutaclientePeer::addSelectColumns($criteria);
				if (!isset($this->lastRutaclienteCriteria) || !$this->lastRutaclienteCriteria->equals($criteria)) {
					$this->collRutaclientes = RutaclientePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRutaclienteCriteria = $criteria;
		return $this->collRutaclientes;
	}

	
	public function countRutaclientes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRutaclientePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RutaclientePeer::RUTA_ID, $this->getId());

		return RutaclientePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRutacliente(Rutacliente $l)
	{
		$this->collRutaclientes[] = $l;
		$l->setRuta($this);
	}

	
	public function initRutavendedoress()
	{
		if ($this->collRutavendedoress === null) {
			$this->collRutavendedoress = array();
		}
	}

	
	public function getRutavendedoress($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRutavendedoresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRutavendedoress === null) {
			if ($this->isNew()) {
			   $this->collRutavendedoress = array();
			} else {

				$criteria->add(RutavendedoresPeer::RUTA_ID, $this->getId());

				RutavendedoresPeer::addSelectColumns($criteria);
				$this->collRutavendedoress = RutavendedoresPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RutavendedoresPeer::RUTA_ID, $this->getId());

				RutavendedoresPeer::addSelectColumns($criteria);
				if (!isset($this->lastRutavendedoresCriteria) || !$this->lastRutavendedoresCriteria->equals($criteria)) {
					$this->collRutavendedoress = RutavendedoresPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRutavendedoresCriteria = $criteria;
		return $this->collRutavendedoress;
	}

	
	public function countRutavendedoress($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRutavendedoresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RutavendedoresPeer::RUTA_ID, $this->getId());

		return RutavendedoresPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRutavendedores(Rutavendedores $l)
	{
		$this->collRutavendedoress[] = $l;
		$l->setRuta($this);
	}


	
	public function getRutavendedoressJoinVendedores($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRutavendedoresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRutavendedoress === null) {
			if ($this->isNew()) {
				$this->collRutavendedoress = array();
			} else {

				$criteria->add(RutavendedoresPeer::RUTA_ID, $this->getId());

				$this->collRutavendedoress = RutavendedoresPeer::doSelectJoinVendedores($criteria, $con);
			}
		} else {
									
			$criteria->add(RutavendedoresPeer::RUTA_ID, $this->getId());

			if (!isset($this->lastRutavendedoresCriteria) || !$this->lastRutavendedoresCriteria->equals($criteria)) {
				$this->collRutavendedoress = RutavendedoresPeer::doSelectJoinVendedores($criteria, $con);
			}
		}
		$this->lastRutavendedoresCriteria = $criteria;

		return $this->collRutavendedoress;
	}

} 