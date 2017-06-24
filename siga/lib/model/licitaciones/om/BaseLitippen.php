<?php


abstract class BaseLitippen extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtippen;


	
	protected $nomtippen;


	
	protected $dettippen;


	
	protected $id;

	
	protected $collLipenalizacioness;

	
	protected $lastLipenalizacionesCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtippen()
  {

    return trim($this->codtippen);

  }
  
  public function getNomtippen()
  {

    return trim($this->nomtippen);

  }
  
  public function getDettippen()
  {

    return trim($this->dettippen);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtippen($v)
	{

    if ($this->codtippen !== $v) {
        $this->codtippen = $v;
        $this->modifiedColumns[] = LitippenPeer::CODTIPPEN;
      }
  
	} 
	
	public function setNomtippen($v)
	{

    if ($this->nomtippen !== $v) {
        $this->nomtippen = $v;
        $this->modifiedColumns[] = LitippenPeer::NOMTIPPEN;
      }
  
	} 
	
	public function setDettippen($v)
	{

    if ($this->dettippen !== $v) {
        $this->dettippen = $v;
        $this->modifiedColumns[] = LitippenPeer::DETTIPPEN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LitippenPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtippen = $rs->getString($startcol + 0);

      $this->nomtippen = $rs->getString($startcol + 1);

      $this->dettippen = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Litippen object", $e);
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
			$con = Propel::getConnection(LitippenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LitippenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LitippenPeer::DATABASE_NAME);
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
					$pk = LitippenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LitippenPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLipenalizacioness !== null) {
				foreach($this->collLipenalizacioness as $referrerFK) {
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


			if (($retval = LitippenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLipenalizacioness !== null) {
					foreach($this->collLipenalizacioness as $referrerFK) {
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
		$pos = LitippenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtippen();
				break;
			case 1:
				return $this->getNomtippen();
				break;
			case 2:
				return $this->getDettippen();
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
		$keys = LitippenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtippen(),
			$keys[1] => $this->getNomtippen(),
			$keys[2] => $this->getDettippen(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LitippenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtippen($value);
				break;
			case 1:
				$this->setNomtippen($value);
				break;
			case 2:
				$this->setDettippen($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LitippenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtippen($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtippen($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDettippen($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LitippenPeer::DATABASE_NAME);

		if ($this->isColumnModified(LitippenPeer::CODTIPPEN)) $criteria->add(LitippenPeer::CODTIPPEN, $this->codtippen);
		if ($this->isColumnModified(LitippenPeer::NOMTIPPEN)) $criteria->add(LitippenPeer::NOMTIPPEN, $this->nomtippen);
		if ($this->isColumnModified(LitippenPeer::DETTIPPEN)) $criteria->add(LitippenPeer::DETTIPPEN, $this->dettippen);
		if ($this->isColumnModified(LitippenPeer::ID)) $criteria->add(LitippenPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LitippenPeer::DATABASE_NAME);

		$criteria->add(LitippenPeer::ID, $this->id);

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

		$copyObj->setCodtippen($this->codtippen);

		$copyObj->setNomtippen($this->nomtippen);

		$copyObj->setDettippen($this->dettippen);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLipenalizacioness() as $relObj) {
				$copyObj->addLipenalizaciones($relObj->copy($deepCopy));
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
			self::$peer = new LitippenPeer();
		}
		return self::$peer;
	}

	
	public function initLipenalizacioness()
	{
		if ($this->collLipenalizacioness === null) {
			$this->collLipenalizacioness = array();
		}
	}

	
	public function getLipenalizacioness($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacioness === null) {
			if ($this->isNew()) {
			   $this->collLipenalizacioness = array();
			} else {

				$criteria->add(LipenalizacionesPeer::CODTIPPEN, $this->getCodtippen());

				LipenalizacionesPeer::addSelectColumns($criteria);
				$this->collLipenalizacioness = LipenalizacionesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LipenalizacionesPeer::CODTIPPEN, $this->getCodtippen());

				LipenalizacionesPeer::addSelectColumns($criteria);
				if (!isset($this->lastLipenalizacionesCriteria) || !$this->lastLipenalizacionesCriteria->equals($criteria)) {
					$this->collLipenalizacioness = LipenalizacionesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLipenalizacionesCriteria = $criteria;
		return $this->collLipenalizacioness;
	}

	
	public function countLipenalizacioness($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LipenalizacionesPeer::CODTIPPEN, $this->getCodtippen());

		return LipenalizacionesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLipenalizaciones(Lipenalizaciones $l)
	{
		$this->collLipenalizacioness[] = $l;
		$l->setLitippen($this);
	}


	
	public function getLipenalizacionessJoinLicontrat($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacioness === null) {
			if ($this->isNew()) {
				$this->collLipenalizacioness = array();
			} else {

				$criteria->add(LipenalizacionesPeer::CODTIPPEN, $this->getCodtippen());

				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLicontrat($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::CODTIPPEN, $this->getCodtippen());

			if (!isset($this->lastLipenalizacionesCriteria) || !$this->lastLipenalizacionesCriteria->equals($criteria)) {
				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLicontrat($criteria, $con);
			}
		}
		$this->lastLipenalizacionesCriteria = $criteria;

		return $this->collLipenalizacioness;
	}


	
	public function getLipenalizacionessJoinLidatstedetRelatedByCodempadm($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacioness === null) {
			if ($this->isNew()) {
				$this->collLipenalizacioness = array();
			} else {

				$criteria->add(LipenalizacionesPeer::CODTIPPEN, $this->getCodtippen());

				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::CODTIPPEN, $this->getCodtippen());

			if (!isset($this->lastLipenalizacionesCriteria) || !$this->lastLipenalizacionesCriteria->equals($criteria)) {
				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLidatstedetRelatedByCodempadm($criteria, $con);
			}
		}
		$this->lastLipenalizacionesCriteria = $criteria;

		return $this->collLipenalizacioness;
	}


	
	public function getLipenalizacionessJoinLidatstedetRelatedByCodempeje($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacioness === null) {
			if ($this->isNew()) {
				$this->collLipenalizacioness = array();
			} else {

				$criteria->add(LipenalizacionesPeer::CODTIPPEN, $this->getCodtippen());

				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::CODTIPPEN, $this->getCodtippen());

			if (!isset($this->lastLipenalizacionesCriteria) || !$this->lastLipenalizacionesCriteria->equals($criteria)) {
				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLidatstedetRelatedByCodempeje($criteria, $con);
			}
		}
		$this->lastLipenalizacionesCriteria = $criteria;

		return $this->collLipenalizacioness;
	}


	
	public function getLipenalizacionessJoinLisicact($criteria = null, $con = null)
	{
				include_once 'lib/model/licitaciones/om/BaseLipenalizacionesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLipenalizacioness === null) {
			if ($this->isNew()) {
				$this->collLipenalizacioness = array();
			} else {

				$criteria->add(LipenalizacionesPeer::CODTIPPEN, $this->getCodtippen());

				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		} else {
									
			$criteria->add(LipenalizacionesPeer::CODTIPPEN, $this->getCodtippen());

			if (!isset($this->lastLipenalizacionesCriteria) || !$this->lastLipenalizacionesCriteria->equals($criteria)) {
				$this->collLipenalizacioness = LipenalizacionesPeer::doSelectJoinLisicact($criteria, $con);
			}
		}
		$this->lastLipenalizacionesCriteria = $criteria;

		return $this->collLipenalizacioness;
	}

} 