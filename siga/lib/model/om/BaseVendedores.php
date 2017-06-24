<?php


abstract class BaseVendedores extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $telcon;


	
	protected $faxcon;


	
	protected $email;


	
	protected $percon;


	
	protected $id;

	
	protected $collMetass;

	
	protected $lastMetasCriteria = null;

	
	protected $collRutavendedors;

	
	protected $lastRutavendedorCriteria = null;

	
	protected $collRadarventass;

	
	protected $lastRadarventasCriteria = null;

	
	protected $collRutavendedoress;

	
	protected $lastRutavendedoresCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcon()
  {

    return trim($this->codcon);

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getDircon()
  {

    return trim($this->dircon);

  }
  
  public function getTelcon()
  {

    return trim($this->telcon);

  }
  
  public function getFaxcon()
  {

    return trim($this->faxcon);

  }
  
  public function getEmail()
  {

    return trim($this->email);

  }
  
  public function getPercon()
  {

    return trim($this->percon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = VendedoresPeer::CODCON;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = VendedoresPeer::NOMCON;
      }
  
	} 
	
	public function setDircon($v)
	{

    if ($this->dircon !== $v) {
        $this->dircon = $v;
        $this->modifiedColumns[] = VendedoresPeer::DIRCON;
      }
  
	} 
	
	public function setTelcon($v)
	{

    if ($this->telcon !== $v) {
        $this->telcon = $v;
        $this->modifiedColumns[] = VendedoresPeer::TELCON;
      }
  
	} 
	
	public function setFaxcon($v)
	{

    if ($this->faxcon !== $v) {
        $this->faxcon = $v;
        $this->modifiedColumns[] = VendedoresPeer::FAXCON;
      }
  
	} 
	
	public function setEmail($v)
	{

    if ($this->email !== $v) {
        $this->email = $v;
        $this->modifiedColumns[] = VendedoresPeer::EMAIL;
      }
  
	} 
	
	public function setPercon($v)
	{

    if ($this->percon !== $v) {
        $this->percon = $v;
        $this->modifiedColumns[] = VendedoresPeer::PERCON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = VendedoresPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcon = $rs->getString($startcol + 0);

      $this->nomcon = $rs->getString($startcol + 1);

      $this->dircon = $rs->getString($startcol + 2);

      $this->telcon = $rs->getString($startcol + 3);

      $this->faxcon = $rs->getString($startcol + 4);

      $this->email = $rs->getString($startcol + 5);

      $this->percon = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Vendedores object", $e);
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
			$con = Propel::getConnection(VendedoresPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			VendedoresPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(VendedoresPeer::DATABASE_NAME);
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
					$pk = VendedoresPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += VendedoresPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collMetass !== null) {
				foreach($this->collMetass as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRutavendedors !== null) {
				foreach($this->collRutavendedors as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRadarventass !== null) {
				foreach($this->collRadarventass as $referrerFK) {
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


			if (($retval = VendedoresPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collMetass !== null) {
					foreach($this->collMetass as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRutavendedors !== null) {
					foreach($this->collRutavendedors as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRadarventass !== null) {
					foreach($this->collRadarventass as $referrerFK) {
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
		$pos = VendedoresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getNomcon();
				break;
			case 2:
				return $this->getDircon();
				break;
			case 3:
				return $this->getTelcon();
				break;
			case 4:
				return $this->getFaxcon();
				break;
			case 5:
				return $this->getEmail();
				break;
			case 6:
				return $this->getPercon();
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
		$keys = VendedoresPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getNomcon(),
			$keys[2] => $this->getDircon(),
			$keys[3] => $this->getTelcon(),
			$keys[4] => $this->getFaxcon(),
			$keys[5] => $this->getEmail(),
			$keys[6] => $this->getPercon(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = VendedoresPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setNomcon($value);
				break;
			case 2:
				$this->setDircon($value);
				break;
			case 3:
				$this->setTelcon($value);
				break;
			case 4:
				$this->setFaxcon($value);
				break;
			case 5:
				$this->setEmail($value);
				break;
			case 6:
				$this->setPercon($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = VendedoresPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDircon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelcon($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFaxcon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEmail($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPercon($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(VendedoresPeer::DATABASE_NAME);

		if ($this->isColumnModified(VendedoresPeer::CODCON)) $criteria->add(VendedoresPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(VendedoresPeer::NOMCON)) $criteria->add(VendedoresPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(VendedoresPeer::DIRCON)) $criteria->add(VendedoresPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(VendedoresPeer::TELCON)) $criteria->add(VendedoresPeer::TELCON, $this->telcon);
		if ($this->isColumnModified(VendedoresPeer::FAXCON)) $criteria->add(VendedoresPeer::FAXCON, $this->faxcon);
		if ($this->isColumnModified(VendedoresPeer::EMAIL)) $criteria->add(VendedoresPeer::EMAIL, $this->email);
		if ($this->isColumnModified(VendedoresPeer::PERCON)) $criteria->add(VendedoresPeer::PERCON, $this->percon);
		if ($this->isColumnModified(VendedoresPeer::ID)) $criteria->add(VendedoresPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(VendedoresPeer::DATABASE_NAME);

		$criteria->add(VendedoresPeer::ID, $this->id);

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

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setTelcon($this->telcon);

		$copyObj->setFaxcon($this->faxcon);

		$copyObj->setEmail($this->email);

		$copyObj->setPercon($this->percon);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getMetass() as $relObj) {
				$copyObj->addMetas($relObj->copy($deepCopy));
			}

			foreach($this->getRutavendedors() as $relObj) {
				$copyObj->addRutavendedor($relObj->copy($deepCopy));
			}

			foreach($this->getRadarventass() as $relObj) {
				$copyObj->addRadarventas($relObj->copy($deepCopy));
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
			self::$peer = new VendedoresPeer();
		}
		return self::$peer;
	}

	
	public function initMetass()
	{
		if ($this->collMetass === null) {
			$this->collMetass = array();
		}
	}

	
	public function getMetass($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMetasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMetass === null) {
			if ($this->isNew()) {
			   $this->collMetass = array();
			} else {

				$criteria->add(MetasPeer::VENDEDORES_ID, $this->getId());

				MetasPeer::addSelectColumns($criteria);
				$this->collMetass = MetasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MetasPeer::VENDEDORES_ID, $this->getId());

				MetasPeer::addSelectColumns($criteria);
				if (!isset($this->lastMetasCriteria) || !$this->lastMetasCriteria->equals($criteria)) {
					$this->collMetass = MetasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMetasCriteria = $criteria;
		return $this->collMetass;
	}

	
	public function countMetass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMetasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MetasPeer::VENDEDORES_ID, $this->getId());

		return MetasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMetas(Metas $l)
	{
		$this->collMetass[] = $l;
		$l->setVendedores($this);
	}


	
	public function getMetassJoinCatproductos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMetasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMetass === null) {
			if ($this->isNew()) {
				$this->collMetass = array();
			} else {

				$criteria->add(MetasPeer::VENDEDORES_ID, $this->getId());

				$this->collMetass = MetasPeer::doSelectJoinCatproductos($criteria, $con);
			}
		} else {
									
			$criteria->add(MetasPeer::VENDEDORES_ID, $this->getId());

			if (!isset($this->lastMetasCriteria) || !$this->lastMetasCriteria->equals($criteria)) {
				$this->collMetass = MetasPeer::doSelectJoinCatproductos($criteria, $con);
			}
		}
		$this->lastMetasCriteria = $criteria;

		return $this->collMetass;
	}

	
	public function initRutavendedors()
	{
		if ($this->collRutavendedors === null) {
			$this->collRutavendedors = array();
		}
	}

	
	public function getRutavendedors($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRutavendedorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRutavendedors === null) {
			if ($this->isNew()) {
			   $this->collRutavendedors = array();
			} else {

				$criteria->add(RutavendedorPeer::VENDEDORES_ID, $this->getId());

				RutavendedorPeer::addSelectColumns($criteria);
				$this->collRutavendedors = RutavendedorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RutavendedorPeer::VENDEDORES_ID, $this->getId());

				RutavendedorPeer::addSelectColumns($criteria);
				if (!isset($this->lastRutavendedorCriteria) || !$this->lastRutavendedorCriteria->equals($criteria)) {
					$this->collRutavendedors = RutavendedorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRutavendedorCriteria = $criteria;
		return $this->collRutavendedors;
	}

	
	public function countRutavendedors($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRutavendedorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RutavendedorPeer::VENDEDORES_ID, $this->getId());

		return RutavendedorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRutavendedor(Rutavendedor $l)
	{
		$this->collRutavendedors[] = $l;
		$l->setVendedores($this);
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

				$criteria->add(RadarventasPeer::VENDEDORES_ID, $this->getId());

				RadarventasPeer::addSelectColumns($criteria);
				$this->collRadarventass = RadarventasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RadarventasPeer::VENDEDORES_ID, $this->getId());

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

		$criteria->add(RadarventasPeer::VENDEDORES_ID, $this->getId());

		return RadarventasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRadarventas(Radarventas $l)
	{
		$this->collRadarventass[] = $l;
		$l->setVendedores($this);
	}


	
	public function getRadarventassJoinRuta($criteria = null, $con = null)
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

				$criteria->add(RadarventasPeer::VENDEDORES_ID, $this->getId());

				$this->collRadarventass = RadarventasPeer::doSelectJoinRuta($criteria, $con);
			}
		} else {
									
			$criteria->add(RadarventasPeer::VENDEDORES_ID, $this->getId());

			if (!isset($this->lastRadarventasCriteria) || !$this->lastRadarventasCriteria->equals($criteria)) {
				$this->collRadarventass = RadarventasPeer::doSelectJoinRuta($criteria, $con);
			}
		}
		$this->lastRadarventasCriteria = $criteria;

		return $this->collRadarventass;
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

				$criteria->add(RutavendedoresPeer::VENDEDORES_ID, $this->getId());

				RutavendedoresPeer::addSelectColumns($criteria);
				$this->collRutavendedoress = RutavendedoresPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RutavendedoresPeer::VENDEDORES_ID, $this->getId());

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

		$criteria->add(RutavendedoresPeer::VENDEDORES_ID, $this->getId());

		return RutavendedoresPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRutavendedores(Rutavendedores $l)
	{
		$this->collRutavendedoress[] = $l;
		$l->setVendedores($this);
	}


	
	public function getRutavendedoressJoinRuta($criteria = null, $con = null)
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

				$criteria->add(RutavendedoresPeer::VENDEDORES_ID, $this->getId());

				$this->collRutavendedoress = RutavendedoresPeer::doSelectJoinRuta($criteria, $con);
			}
		} else {
									
			$criteria->add(RutavendedoresPeer::VENDEDORES_ID, $this->getId());

			if (!isset($this->lastRutavendedoresCriteria) || !$this->lastRutavendedoresCriteria->equals($criteria)) {
				$this->collRutavendedoress = RutavendedoresPeer::doSelectJoinRuta($criteria, $con);
			}
		}
		$this->lastRutavendedoresCriteria = $criteria;

		return $this->collRutavendedoress;
	}

} 