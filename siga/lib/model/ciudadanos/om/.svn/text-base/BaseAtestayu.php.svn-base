<?php


abstract class BaseAtestayu extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codest;


	
	protected $desest;


	
	protected $comest;


	
	protected $id;

	
	protected $collAtayudass;

	
	protected $lastAtayudasCriteria = null;

	
	protected $collAtdenunciass;

	
	protected $lastAtdenunciasCriteria = null;

	
	protected $collAtdetestsRelatedByAtestayuDesde;

	
	protected $lastAtdetestRelatedByAtestayuDesdeCriteria = null;

	
	protected $collAtdetestsRelatedByAtestayuHasta;

	
	protected $lastAtdetestRelatedByAtestayuHastaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodest()
  {

    return trim($this->codest);

  }
  
  public function getDesest()
  {

    return trim($this->desest);

  }
  
  public function getComest()
  {

    return trim($this->comest);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodest($v)
	{

    if ($this->codest !== $v) {
        $this->codest = $v;
        $this->modifiedColumns[] = AtestayuPeer::CODEST;
      }
  
	} 
	
	public function setDesest($v)
	{

    if ($this->desest !== $v) {
        $this->desest = $v;
        $this->modifiedColumns[] = AtestayuPeer::DESEST;
      }
  
	} 
	
	public function setComest($v)
	{

    if ($this->comest !== $v) {
        $this->comest = $v;
        $this->modifiedColumns[] = AtestayuPeer::COMEST;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtestayuPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codest = $rs->getString($startcol + 0);

      $this->desest = $rs->getString($startcol + 1);

      $this->comest = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atestayu object", $e);
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
			$con = Propel::getConnection(AtestayuPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtestayuPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtestayuPeer::DATABASE_NAME);
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
					$pk = AtestayuPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtestayuPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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

			if ($this->collAtdetestsRelatedByAtestayuDesde !== null) {
				foreach($this->collAtdetestsRelatedByAtestayuDesde as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtdetestsRelatedByAtestayuHasta !== null) {
				foreach($this->collAtdetestsRelatedByAtestayuHasta as $referrerFK) {
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


			if (($retval = AtestayuPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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

				if ($this->collAtdetestsRelatedByAtestayuDesde !== null) {
					foreach($this->collAtdetestsRelatedByAtestayuDesde as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtdetestsRelatedByAtestayuHasta !== null) {
					foreach($this->collAtdetestsRelatedByAtestayuHasta as $referrerFK) {
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
		$pos = AtestayuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodest();
				break;
			case 1:
				return $this->getDesest();
				break;
			case 2:
				return $this->getComest();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtestayuPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodest(),
			$keys[1] => $this->getDesest(),
			$keys[2] => $this->getComest(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtestayuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodest($value);
				break;
			case 1:
				$this->setDesest($value);
				break;
			case 2:
				$this->setComest($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtestayuPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodest($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesest($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setComest($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtestayuPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtestayuPeer::CODEST)) $criteria->add(AtestayuPeer::CODEST, $this->codest);
		if ($this->isColumnModified(AtestayuPeer::DESEST)) $criteria->add(AtestayuPeer::DESEST, $this->desest);
		if ($this->isColumnModified(AtestayuPeer::COMEST)) $criteria->add(AtestayuPeer::COMEST, $this->comest);
		if ($this->isColumnModified(AtestayuPeer::ID)) $criteria->add(AtestayuPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtestayuPeer::DATABASE_NAME);

		$criteria->add(AtestayuPeer::ID, $this->id);

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

		$copyObj->setCodest($this->codest);

		$copyObj->setDesest($this->desest);

		$copyObj->setComest($this->comest);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtayudass() as $relObj) {
				$copyObj->addAtayudas($relObj->copy($deepCopy));
			}

			foreach($this->getAtdenunciass() as $relObj) {
				$copyObj->addAtdenuncias($relObj->copy($deepCopy));
			}

			foreach($this->getAtdetestsRelatedByAtestayuDesde() as $relObj) {
				$copyObj->addAtdetestRelatedByAtestayuDesde($relObj->copy($deepCopy));
			}

			foreach($this->getAtdetestsRelatedByAtestayuHasta() as $relObj) {
				$copyObj->addAtdetestRelatedByAtestayuHasta($relObj->copy($deepCopy));
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
			self::$peer = new AtestayuPeer();
		}
		return self::$peer;
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

				$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				$this->collAtayudass = AtayudasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

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

		$criteria->add(AtayudasPeer::ATESTAYU_ID, $this->getId());

		return AtayudasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtayudas(Atayudas $l)
	{
		$this->collAtayudass[] = $l;
		$l->setAtestayu($this);
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

				$criteria->add(AtdenunciasPeer::ATESTAYU_ID, $this->getId());

				AtdenunciasPeer::addSelectColumns($criteria);
				$this->collAtdenunciass = AtdenunciasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtdenunciasPeer::ATESTAYU_ID, $this->getId());

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

		$criteria->add(AtdenunciasPeer::ATESTAYU_ID, $this->getId());

		return AtdenunciasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtdenuncias(Atdenuncias $l)
	{
		$this->collAtdenunciass[] = $l;
		$l->setAtestayu($this);
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

				$criteria->add(AtdenunciasPeer::ATESTAYU_ID, $this->getId());

				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtciudadano($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdenunciasPeer::ATESTAYU_ID, $this->getId());

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

				$criteria->add(AtdenunciasPeer::ATESTAYU_ID, $this->getId());

				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtunidades($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdenunciasPeer::ATESTAYU_ID, $this->getId());

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

				$criteria->add(AtdenunciasPeer::ATESTAYU_ID, $this->getId());

				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAttipsol($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdenunciasPeer::ATESTAYU_ID, $this->getId());

			if (!isset($this->lastAtdenunciasCriteria) || !$this->lastAtdenunciasCriteria->equals($criteria)) {
				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAttipsol($criteria, $con);
			}
		}
		$this->lastAtdenunciasCriteria = $criteria;

		return $this->collAtdenunciass;
	}


	
	public function getAtdenunciassJoinAtinsrefier($criteria = null, $con = null)
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

				$criteria->add(AtdenunciasPeer::ATESTAYU_ID, $this->getId());

				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtinsrefier($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdenunciasPeer::ATESTAYU_ID, $this->getId());

			if (!isset($this->lastAtdenunciasCriteria) || !$this->lastAtdenunciasCriteria->equals($criteria)) {
				$this->collAtdenunciass = AtdenunciasPeer::doSelectJoinAtinsrefier($criteria, $con);
			}
		}
		$this->lastAtdenunciasCriteria = $criteria;

		return $this->collAtdenunciass;
	}

	
	public function initAtdetestsRelatedByAtestayuDesde()
	{
		if ($this->collAtdetestsRelatedByAtestayuDesde === null) {
			$this->collAtdetestsRelatedByAtestayuDesde = array();
		}
	}

	
	public function getAtdetestsRelatedByAtestayuDesde($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetestsRelatedByAtestayuDesde === null) {
			if ($this->isNew()) {
			   $this->collAtdetestsRelatedByAtestayuDesde = array();
			} else {

				$criteria->add(AtdetestPeer::ATESTAYU_DESDE, $this->getId());

				AtdetestPeer::addSelectColumns($criteria);
				$this->collAtdetestsRelatedByAtestayuDesde = AtdetestPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtdetestPeer::ATESTAYU_DESDE, $this->getId());

				AtdetestPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtdetestRelatedByAtestayuDesdeCriteria) || !$this->lastAtdetestRelatedByAtestayuDesdeCriteria->equals($criteria)) {
					$this->collAtdetestsRelatedByAtestayuDesde = AtdetestPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtdetestRelatedByAtestayuDesdeCriteria = $criteria;
		return $this->collAtdetestsRelatedByAtestayuDesde;
	}

	
	public function countAtdetestsRelatedByAtestayuDesde($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtdetestPeer::ATESTAYU_DESDE, $this->getId());

		return AtdetestPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtdetestRelatedByAtestayuDesde(Atdetest $l)
	{
		$this->collAtdetestsRelatedByAtestayuDesde[] = $l;
		$l->setAtestayuRelatedByAtestayuDesde($this);
	}


	
	public function getAtdetestsRelatedByAtestayuDesdeJoinAtayudas($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetestsRelatedByAtestayuDesde === null) {
			if ($this->isNew()) {
				$this->collAtdetestsRelatedByAtestayuDesde = array();
			} else {

				$criteria->add(AtdetestPeer::ATESTAYU_DESDE, $this->getId());

				$this->collAtdetestsRelatedByAtestayuDesde = AtdetestPeer::doSelectJoinAtayudas($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdetestPeer::ATESTAYU_DESDE, $this->getId());

			if (!isset($this->lastAtdetestRelatedByAtestayuDesdeCriteria) || !$this->lastAtdetestRelatedByAtestayuDesdeCriteria->equals($criteria)) {
				$this->collAtdetestsRelatedByAtestayuDesde = AtdetestPeer::doSelectJoinAtayudas($criteria, $con);
			}
		}
		$this->lastAtdetestRelatedByAtestayuDesdeCriteria = $criteria;

		return $this->collAtdetestsRelatedByAtestayuDesde;
	}


	
	public function getAtdetestsRelatedByAtestayuDesdeJoinAtdenuncias($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetestsRelatedByAtestayuDesde === null) {
			if ($this->isNew()) {
				$this->collAtdetestsRelatedByAtestayuDesde = array();
			} else {

				$criteria->add(AtdetestPeer::ATESTAYU_DESDE, $this->getId());

				$this->collAtdetestsRelatedByAtestayuDesde = AtdetestPeer::doSelectJoinAtdenuncias($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdetestPeer::ATESTAYU_DESDE, $this->getId());

			if (!isset($this->lastAtdetestRelatedByAtestayuDesdeCriteria) || !$this->lastAtdetestRelatedByAtestayuDesdeCriteria->equals($criteria)) {
				$this->collAtdetestsRelatedByAtestayuDesde = AtdetestPeer::doSelectJoinAtdenuncias($criteria, $con);
			}
		}
		$this->lastAtdetestRelatedByAtestayuDesdeCriteria = $criteria;

		return $this->collAtdetestsRelatedByAtestayuDesde;
	}

	
	public function initAtdetestsRelatedByAtestayuHasta()
	{
		if ($this->collAtdetestsRelatedByAtestayuHasta === null) {
			$this->collAtdetestsRelatedByAtestayuHasta = array();
		}
	}

	
	public function getAtdetestsRelatedByAtestayuHasta($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetestsRelatedByAtestayuHasta === null) {
			if ($this->isNew()) {
			   $this->collAtdetestsRelatedByAtestayuHasta = array();
			} else {

				$criteria->add(AtdetestPeer::ATESTAYU_HASTA, $this->getId());

				AtdetestPeer::addSelectColumns($criteria);
				$this->collAtdetestsRelatedByAtestayuHasta = AtdetestPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtdetestPeer::ATESTAYU_HASTA, $this->getId());

				AtdetestPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtdetestRelatedByAtestayuHastaCriteria) || !$this->lastAtdetestRelatedByAtestayuHastaCriteria->equals($criteria)) {
					$this->collAtdetestsRelatedByAtestayuHasta = AtdetestPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtdetestRelatedByAtestayuHastaCriteria = $criteria;
		return $this->collAtdetestsRelatedByAtestayuHasta;
	}

	
	public function countAtdetestsRelatedByAtestayuHasta($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtdetestPeer::ATESTAYU_HASTA, $this->getId());

		return AtdetestPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtdetestRelatedByAtestayuHasta(Atdetest $l)
	{
		$this->collAtdetestsRelatedByAtestayuHasta[] = $l;
		$l->setAtestayuRelatedByAtestayuHasta($this);
	}


	
	public function getAtdetestsRelatedByAtestayuHastaJoinAtayudas($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetestsRelatedByAtestayuHasta === null) {
			if ($this->isNew()) {
				$this->collAtdetestsRelatedByAtestayuHasta = array();
			} else {

				$criteria->add(AtdetestPeer::ATESTAYU_HASTA, $this->getId());

				$this->collAtdetestsRelatedByAtestayuHasta = AtdetestPeer::doSelectJoinAtayudas($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdetestPeer::ATESTAYU_HASTA, $this->getId());

			if (!isset($this->lastAtdetestRelatedByAtestayuHastaCriteria) || !$this->lastAtdetestRelatedByAtestayuHastaCriteria->equals($criteria)) {
				$this->collAtdetestsRelatedByAtestayuHasta = AtdetestPeer::doSelectJoinAtayudas($criteria, $con);
			}
		}
		$this->lastAtdetestRelatedByAtestayuHastaCriteria = $criteria;

		return $this->collAtdetestsRelatedByAtestayuHasta;
	}


	
	public function getAtdetestsRelatedByAtestayuHastaJoinAtdenuncias($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtdetestPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetestsRelatedByAtestayuHasta === null) {
			if ($this->isNew()) {
				$this->collAtdetestsRelatedByAtestayuHasta = array();
			} else {

				$criteria->add(AtdetestPeer::ATESTAYU_HASTA, $this->getId());

				$this->collAtdetestsRelatedByAtestayuHasta = AtdetestPeer::doSelectJoinAtdenuncias($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdetestPeer::ATESTAYU_HASTA, $this->getId());

			if (!isset($this->lastAtdetestRelatedByAtestayuHastaCriteria) || !$this->lastAtdetestRelatedByAtestayuHastaCriteria->equals($criteria)) {
				$this->collAtdetestsRelatedByAtestayuHasta = AtdetestPeer::doSelectJoinAtdenuncias($criteria, $con);
			}
		}
		$this->lastAtdetestRelatedByAtestayuHastaCriteria = $criteria;

		return $this->collAtdetestsRelatedByAtestayuHasta;
	}

} 