<?php


abstract class BaseLitipact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipact;


	
	protected $nomtipact;


	
	protected $dettipact;


	
	protected $id;

	
	protected $collLiactass;

	
	protected $lastLiactasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtipact()
  {

    return trim($this->codtipact);

  }
  
  public function getNomtipact()
  {

    return trim($this->nomtipact);

  }
  
  public function getDettipact()
  {

    return trim($this->dettipact);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtipact($v)
	{

    if ($this->codtipact !== $v) {
        $this->codtipact = $v;
        $this->modifiedColumns[] = LitipactPeer::CODTIPACT;
      }
  
	} 
	
	public function setNomtipact($v)
	{

    if ($this->nomtipact !== $v) {
        $this->nomtipact = $v;
        $this->modifiedColumns[] = LitipactPeer::NOMTIPACT;
      }
  
	} 
	
	public function setDettipact($v)
	{

    if ($this->dettipact !== $v) {
        $this->dettipact = $v;
        $this->modifiedColumns[] = LitipactPeer::DETTIPACT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LitipactPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtipact = $rs->getString($startcol + 0);

      $this->nomtipact = $rs->getString($startcol + 1);

      $this->dettipact = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Litipact object", $e);
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
			$con = Propel::getConnection(LitipactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LitipactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LitipactPeer::DATABASE_NAME);
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
					$pk = LitipactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LitipactPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLiactass !== null) {
				foreach($this->collLiactass as $referrerFK) {
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


			if (($retval = LitipactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLiactass !== null) {
					foreach($this->collLiactass as $referrerFK) {
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
		$pos = LitipactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipact();
				break;
			case 1:
				return $this->getNomtipact();
				break;
			case 2:
				return $this->getDettipact();
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
		$keys = LitipactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipact(),
			$keys[1] => $this->getNomtipact(),
			$keys[2] => $this->getDettipact(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LitipactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipact($value);
				break;
			case 1:
				$this->setNomtipact($value);
				break;
			case 2:
				$this->setDettipact($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LitipactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipact($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtipact($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDettipact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LitipactPeer::DATABASE_NAME);

		if ($this->isColumnModified(LitipactPeer::CODTIPACT)) $criteria->add(LitipactPeer::CODTIPACT, $this->codtipact);
		if ($this->isColumnModified(LitipactPeer::NOMTIPACT)) $criteria->add(LitipactPeer::NOMTIPACT, $this->nomtipact);
		if ($this->isColumnModified(LitipactPeer::DETTIPACT)) $criteria->add(LitipactPeer::DETTIPACT, $this->dettipact);
		if ($this->isColumnModified(LitipactPeer::ID)) $criteria->add(LitipactPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LitipactPeer::DATABASE_NAME);

		$criteria->add(LitipactPeer::ID, $this->id);

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

		$copyObj->setCodtipact($this->codtipact);

		$copyObj->setNomtipact($this->nomtipact);

		$copyObj->setDettipact($this->dettipact);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLiactass() as $relObj) {
				$copyObj->addLiactas($relObj->copy($deepCopy));
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
			self::$peer = new LitipactPeer();
		}
		return self::$peer;
	}

	
	public function initLiactass()
	{
		if ($this->collLiactass === null) {
			$this->collLiactass = array();
		}
	}

	
	public function getLiactass($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactass === null) {
			if ($this->isNew()) {
			   $this->collLiactass = array();
			} else {

				$criteria->add(LiactasPeer::CODTIPACT, $this->getCodtipact());

				LiactasPeer::addSelectColumns($criteria);
				$this->collLiactass = LiactasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiactasPeer::CODTIPACT, $this->getCodtipact());

				LiactasPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiactasCriteria) || !$this->lastLiactasCriteria->equals($criteria)) {
					$this->collLiactass = LiactasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiactasCriteria = $criteria;
		return $this->collLiactass;
	}

	
	public function countLiactass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiactasPeer::CODTIPACT, $this->getCodtipact());

		return LiactasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiactas(Liactas $l)
	{
		$this->collLiactass[] = $l;
		$l->setLitipact($this);
	}


	
	public function getLiactassJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactass === null) {
			if ($this->isNew()) {
				$this->collLiactass = array();
			} else {

				$criteria->add(LiactasPeer::CODTIPACT, $this->getCodtipact());

				$this->collLiactass = LiactasPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::CODTIPACT, $this->getCodtipact());

			if (!isset($this->lastLiactasCriteria) || !$this->lastLiactasCriteria->equals($criteria)) {
				$this->collLiactass = LiactasPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLiactasCriteria = $criteria;

		return $this->collLiactass;
	}


	
	public function getLiactassJoinLidatstedetRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactass === null) {
			if ($this->isNew()) {
				$this->collLiactass = array();
			} else {

				$criteria->add(LiactasPeer::CODTIPACT, $this->getCodtipact());

				$this->collLiactass = LiactasPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::CODTIPACT, $this->getCodtipact());

			if (!isset($this->lastLiactasCriteria) || !$this->lastLiactasCriteria->equals($criteria)) {
				$this->collLiactass = LiactasPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		}
		$this->lastLiactasCriteria = $criteria;

		return $this->collLiactass;
	}


	
	public function getLiactassJoinLidatstedetRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactass === null) {
			if ($this->isNew()) {
				$this->collLiactass = array();
			} else {

				$criteria->add(LiactasPeer::CODTIPACT, $this->getCodtipact());

				$this->collLiactass = LiactasPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::CODTIPACT, $this->getCodtipact());

			if (!isset($this->lastLiactasCriteria) || !$this->lastLiactasCriteria->equals($criteria)) {
				$this->collLiactass = LiactasPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLiactasCriteria = $criteria;

		return $this->collLiactass;
	}


	
	public function getLiactassJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLiactasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiactass === null) {
			if ($this->isNew()) {
				$this->collLiactass = array();
			} else {

				$criteria->add(LiactasPeer::CODTIPACT, $this->getCodtipact());

				$this->collLiactass = LiactasPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LiactasPeer::CODTIPACT, $this->getCodtipact());

			if (!isset($this->lastLiactasCriteria) || !$this->lastLiactasCriteria->equals($criteria)) {
				$this->collLiactass = LiactasPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLiactasCriteria = $criteria;

		return $this->collLiactass;
	}

} 