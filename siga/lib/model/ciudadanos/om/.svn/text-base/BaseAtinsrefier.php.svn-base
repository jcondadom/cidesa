<?php


abstract class BaseAtinsrefier extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $desinsref;


	
	protected $percon;


	
	protected $telefono;


	
	protected $correo;


	
	protected $cargo;


	
	protected $id;

	
	protected $collAtciudadanos;

	
	protected $lastAtciudadanoCriteria = null;

	
	protected $collAtayudass;

	
	protected $lastAtayudasCriteria = null;

	
	protected $collAtdenunciass;

	
	protected $lastAtdenunciasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDesinsref()
  {

    return trim($this->desinsref);

  }
  
  public function getPercon()
  {

    return trim($this->percon);

  }
  
  public function getTelefono()
  {

    return trim($this->telefono);

  }
  
  public function getCorreo()
  {

    return trim($this->correo);

  }
  
  public function getCargo()
  {

    return trim($this->cargo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDesinsref($v)
	{

    if ($this->desinsref !== $v) {
        $this->desinsref = $v;
        $this->modifiedColumns[] = AtinsrefierPeer::DESINSREF;
      }
  
	} 
	
	public function setPercon($v)
	{

    if ($this->percon !== $v) {
        $this->percon = $v;
        $this->modifiedColumns[] = AtinsrefierPeer::PERCON;
      }
  
	} 
	
	public function setTelefono($v)
	{

    if ($this->telefono !== $v) {
        $this->telefono = $v;
        $this->modifiedColumns[] = AtinsrefierPeer::TELEFONO;
      }
  
	} 
	
	public function setCorreo($v)
	{

    if ($this->correo !== $v) {
        $this->correo = $v;
        $this->modifiedColumns[] = AtinsrefierPeer::CORREO;
      }
  
	} 
	
	public function setCargo($v)
	{

    if ($this->cargo !== $v) {
        $this->cargo = $v;
        $this->modifiedColumns[] = AtinsrefierPeer::CARGO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtinsrefierPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->desinsref = $rs->getString($startcol + 0);

      $this->percon = $rs->getString($startcol + 1);

      $this->telefono = $rs->getString($startcol + 2);

      $this->correo = $rs->getString($startcol + 3);

      $this->cargo = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atinsrefier object", $e);
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
			$con = Propel::getConnection(AtinsrefierPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtinsrefierPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtinsrefierPeer::DATABASE_NAME);
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
					$pk = AtinsrefierPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtinsrefierPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtciudadanos !== null) {
				foreach($this->collAtciudadanos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtayudass !== null) {
				foreach($this->collAtayudass as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtdenunciass !== null) {
				foreach($this->collAtdenunciass as $referrerFK) {
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


			if (($retval = AtinsrefierPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtciudadanos !== null) {
					foreach($this->collAtciudadanos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtayudass !== null) {
					foreach($this->collAtayudass as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtdenunciass !== null) {
					foreach($this->collAtdenunciass as $referrerFK) {
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
		$pos = AtinsrefierPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDesinsref();
				break;
			case 1:
				return $this->getPercon();
				break;
			case 2:
				return $this->getTelefono();
				break;
			case 3:
				return $this->getCorreo();
				break;
			case 4:
				return $this->getCargo();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtinsrefierPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDesinsref(),
			$keys[1] => $this->getPercon(),
			$keys[2] => $this->getTelefono(),
			$keys[3] => $this->getCorreo(),
			$keys[4] => $this->getCargo(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtinsrefierPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDesinsref($value);
				break;
			case 1:
				$this->setPercon($value);
				break;
			case 2:
				$this->setTelefono($value);
				break;
			case 3:
				$this->setCorreo($value);
				break;
			case 4:
				$this->setCargo($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtinsrefierPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDesinsref($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPercon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTelefono($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCorreo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCargo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtinsrefierPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtinsrefierPeer::DESINSREF)) $criteria->add(AtinsrefierPeer::DESINSREF, $this->desinsref);
		if ($this->isColumnModified(AtinsrefierPeer::PERCON)) $criteria->add(AtinsrefierPeer::PERCON, $this->percon);
		if ($this->isColumnModified(AtinsrefierPeer::TELEFONO)) $criteria->add(AtinsrefierPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(AtinsrefierPeer::CORREO)) $criteria->add(AtinsrefierPeer::CORREO, $this->correo);
		if ($this->isColumnModified(AtinsrefierPeer::CARGO)) $criteria->add(AtinsrefierPeer::CARGO, $this->cargo);
		if ($this->isColumnModified(AtinsrefierPeer::ID)) $criteria->add(AtinsrefierPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtinsrefierPeer::DATABASE_NAME);

		$criteria->add(AtinsrefierPeer::ID, $this->id);

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

		$copyObj->setDesinsref($this->desinsref);

		$copyObj->setPercon($this->percon);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setCorreo($this->correo);

		$copyObj->setCargo($this->cargo);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtciudadanos() as $relObj) {
				$copyObj->addAtciudadano($relObj->copy($deepCopy));
			}

			foreach($this->getAtayudass() as $relObj) {
				$copyObj->addAtayudas($relObj->copy($deepCopy));
			}

			foreach($this->getAtdenunciass() as $relObj) {
				$copyObj->addAtdenuncias($relObj->copy($deepCopy));
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
			self::$peer = new AtinsrefierPeer();
		}
		return self::$peer;
	}

	
	public function initAtciudadanos()
	{
		if ($this->collAtciudadanos === null) {
			$this->collAtciudadanos = array();
		}
	}

	
	public function getAtciudadanos($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
			   $this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

				AtciudadanoPeer::addSelectColumns($criteria);
				$this->collAtciudadanos = AtciudadanoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

				AtciudadanoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
					$this->collAtciudadanos = AtciudadanoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;
		return $this->collAtciudadanos;
	}

	
	public function countAtciudadanos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

		return AtciudadanoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtciudadano(Atciudadano $l)
	{
		$this->collAtciudadanos[] = $l;
		$l->setAtinsrefier($this);
	}


	
	public function getAtciudadanosJoinAtestados($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtestados($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtestados($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAtmunicipios($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtmunicipios($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtmunicipios($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAtparroquias($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtparroquias($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtparroquias($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAttiping($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttiping($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttiping($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAttipproviv($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttipproviv($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttipproviv($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAttipviv($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttipviv($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttipviv($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAtmisiones($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtmisiones($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtmisiones($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}

	
	public function initAtayudass()
	{
		if ($this->collAtayudass === null) {
			$this->collAtayudass = array();
		}
	}

	
	public function getAtayudass($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
			   $this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATINSREFIER_ID, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				$this->collAtayudass = AtayudasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtayudasPeer::ATINSREFIER_ID, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
					$this->collAtayudass = AtayudasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtayudasCriteria = $criteria;
		return $this->collAtayudass;
	}

	
	public function countAtayudass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtayudasPeer::ATINSREFIER_ID, $this->getId());

		return AtayudasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtayudas(Atayudas $l)
	{
		$this->collAtayudass[] = $l;
		$l->setAtinsrefier($this);
	}

	
	public function initAtdenunciass()
	{
		if ($this->collAtdenunciass === null) {
			$this->collAtdenunciass = array();
		}
	}

	
	public function getAtdenunciass($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdenunciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdenunciass === null) {
			if ($this->isNew()) {
			   $this->collAtdenunciass = array();
			} else {

				$criteria->add(AtdenunciasPeer::ATINSREFIER_ID, $this->getId());

				AtdenunciasPeer::addSelectColumns($criteria);
				$this->collAtdenunciass = AtdenunciasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtdenunciasPeer::ATINSREFIER_ID, $this->getId());

				AtdenunciasPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtdenunciasCriteria) || !$this->lastAtdenunciasCriteria->equals($criteria)) {
					$this->collAtdenunciass = AtdenunciasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtdenunciasCriteria = $criteria;
		return $this->collAtdenunciass;
	}

	
	public function countAtdenunciass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdenunciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtdenunciasPeer::ATINSREFIER_ID, $this->getId());

		return AtdenunciasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtdenuncias(Atdenuncias $l)
	{
		$this->collAtdenunciass[] = $l;
		$l->setAtinsrefier($this);
	}


	
	public function getAtdenunciassJoinAtciudadano($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdenunciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdenunciass === null) {
			if ($this->isNew()) {
				$this->collAtdenunciass = array();
			} else {

				$criteria->add(AtdenunciasPeer::ATINSREFIER_ID, $this->getId());

				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtciudadano($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdenunciasPeer::ATINSREFIER_ID, $this->getId());

			if (!isset($this->lastAtdenunciasCriteria) || !$this->lastAtdenunciasCriteria->equals($criteria)) {
				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtciudadano($criteria, $con);
			}
		}
		$this->lastAtdenunciasCriteria = $criteria;

		return $this->collAtdenunciass;
	}


	
	public function getAtdenunciassJoinAtunidades($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdenunciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdenunciass === null) {
			if ($this->isNew()) {
				$this->collAtdenunciass = array();
			} else {

				$criteria->add(AtdenunciasPeer::ATINSREFIER_ID, $this->getId());

				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtunidades($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdenunciasPeer::ATINSREFIER_ID, $this->getId());

			if (!isset($this->lastAtdenunciasCriteria) || !$this->lastAtdenunciasCriteria->equals($criteria)) {
				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtunidades($criteria, $con);
			}
		}
		$this->lastAtdenunciasCriteria = $criteria;

		return $this->collAtdenunciass;
	}


	
	public function getAtdenunciassJoinAttipsol($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdenunciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdenunciass === null) {
			if ($this->isNew()) {
				$this->collAtdenunciass = array();
			} else {

				$criteria->add(AtdenunciasPeer::ATINSREFIER_ID, $this->getId());

				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAttipsol($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdenunciasPeer::ATINSREFIER_ID, $this->getId());

			if (!isset($this->lastAtdenunciasCriteria) || !$this->lastAtdenunciasCriteria->equals($criteria)) {
				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAttipsol($criteria, $con);
			}
		}
		$this->lastAtdenunciasCriteria = $criteria;

		return $this->collAtdenunciass;
	}


	
	public function getAtdenunciassJoinAtestayu($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdenunciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdenunciass === null) {
			if ($this->isNew()) {
				$this->collAtdenunciass = array();
			} else {

				$criteria->add(AtdenunciasPeer::ATINSREFIER_ID, $this->getId());

				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdenunciasPeer::ATINSREFIER_ID, $this->getId());

			if (!isset($this->lastAtdenunciasCriteria) || !$this->lastAtdenunciasCriteria->equals($criteria)) {
				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		}
		$this->lastAtdenunciasCriteria = $criteria;

		return $this->collAtdenunciass;
	}

} 